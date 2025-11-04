/**
 * Tierliebe Edit Mode - Frontend WYSIWYG Editor for Admins
 * Version: 3.0.0 - Phase 1 Features (Undo/Redo, Shortcuts, Smart Highlighting, Auto-Save, Media Library)
 */

(function($) {
    'use strict';

    let isEditMode = false;
    let originalContents = {};
    let $currentEditable = null;
    let currentEditLink = null;

    // Feature 1: Undo/Redo System
    let undoStack = [];
    let redoStack = [];
    const MAX_UNDO_STACK = 50;

    // Feature 18: Auto-Save
    let autoSaveInterval = null;
    let lastAutoSaveTime = null;
    const AUTO_SAVE_DELAY = 30000; // 30 seconds

    // Initialize
    $(document).ready(function() {
        // Add Edit Button
        $('body').append('<button class="tierliebe-edit-btn" title="Texte bearbeiten">✏️</button>');
        $('body').append('<button class="tierliebe-save-btn">💾 Speichern</button>');

        // Feature 18: Auto-Save Indicator
        $('body').append('<div class="auto-save-indicator" style="display: none;">Letzter Auto-Save: nie</div>');

        // Add URL Edit Modal
        $('body').append(`
            <div class="url-edit-modal">
                <div class="url-edit-box">
                    <h3>🔗 Link bearbeiten</h3>
                    <label for="url-edit-input">URL:</label>
                    <input type="text" id="url-edit-input" placeholder="https://example.com oder /page">
                    <div class="url-edit-buttons">
                        <button class="btn-cancel">Abbrechen</button>
                        <button class="btn-save">Speichern</button>
                    </div>
                </div>
            </div>
        `);

        // Modal event handlers
        $('.url-edit-modal .btn-cancel').on('click', closeUrlModal);
        $('.url-edit-modal .btn-save').on('click', saveUrlFromModal);
        $('.url-edit-modal').on('click', function(e) {
            if (e.target === this) closeUrlModal();
        });

        // Enter key in modal
        $('#url-edit-input').on('keypress', function(e) {
            if (e.which === 13) saveUrlFromModal();
        });

        // Add Formatting Toolbar
        createFormattingToolbar();

        // Toggle Edit Mode
        $('.tierliebe-edit-btn').on('click', toggleEditMode);

        // Save Changes
        $('.tierliebe-save-btn').on('click', saveChanges);

        // Store original contents
        storeOriginalContents();

        // Keyboard shortcuts
        setupKeyboardShortcuts();

        // Feature 18: Try to restore draft on load
        tryRestoreDraft();
    });

    // Create Formatting Toolbar
    function createFormattingToolbar() {
        const toolbar = $(`
            <div class="tierliebe-format-toolbar" style="display: none;">
                <button type="button" class="format-btn" data-command="bold" title="Fett (Ctrl+B)">
                    <strong>B</strong>
                </button>
                <button type="button" class="format-btn" data-command="italic" title="Kursiv (Ctrl+I)">
                    <em>I</em>
                </button>
                <button type="button" class="format-btn" data-command="underline" title="Unterstrichen (Ctrl+U)">
                    <u>U</u>
                </button>
                <button type="button" class="format-btn" data-command="createLink" title="Link einfügen (Ctrl+K)">
                    🔗
                </button>
                <button type="button" class="format-btn" data-command="insertUnorderedList" title="Liste">
                    📝
                </button>
            </div>
        `);

        $('body').append(toolbar);

        // Handle format button clicks
        $('.format-btn').on('click', function(e) {
            e.preventDefault();
            const command = $(this).data('command');
            executeFormatCommand(command);
        });
    }

    // Execute formatting command
    function executeFormatCommand(command) {
        if (command === 'createLink') {
            const url = prompt('URL eingeben:');
            if (url) {
                document.execCommand(command, false, url);
            }
        } else {
            document.execCommand(command, false, null);
        }

        // Return focus to editable element
        if ($currentEditable) {
            $currentEditable.focus();
        }
    }

    // Setup keyboard shortcuts (Feature 4: Extended Shortcuts)
    function setupKeyboardShortcuts() {
        $(document).on('keydown', function(e) {
            // Feature 4: Ctrl+E = Toggle Edit Mode (works always)
            if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
                e.preventDefault();
                toggleEditMode();
                return;
            }

            if (!isEditMode) return;

            // Ctrl/Cmd + B = Bold
            if ((e.ctrlKey || e.metaKey) && e.key === 'b') {
                e.preventDefault();
                executeFormatCommand('bold');
            }

            // Ctrl/Cmd + I = Italic
            if ((e.ctrlKey || e.metaKey) && e.key === 'i') {
                e.preventDefault();
                executeFormatCommand('italic');
            }

            // Ctrl/Cmd + U = Underline
            if ((e.ctrlKey || e.metaKey) && e.key === 'u') {
                e.preventDefault();
                executeFormatCommand('underline');
            }

            // Ctrl/Cmd + K = Link
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                executeFormatCommand('createLink');
            }

            // Ctrl/Cmd + S = Save
            if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                e.preventDefault();
                saveChanges();
            }

            // Feature 1: Ctrl+Z = Undo
            if ((e.ctrlKey || e.metaKey) && e.key === 'z' && !e.shiftKey) {
                e.preventDefault();
                undo();
            }

            // Feature 1: Ctrl+Y or Ctrl+Shift+Z = Redo
            if ((e.ctrlKey || e.metaKey) && (e.key === 'y' || (e.key === 'z' && e.shiftKey))) {
                e.preventDefault();
                redo();
            }

            // Feature 4: Esc = Cancel edit and restore original
            if (e.key === 'Escape' && $currentEditable) {
                e.preventDefault();
                cancelCurrentEdit();
            }

            // Feature 4: Tab = Next editable field
            if (e.key === 'Tab' && !e.shiftKey && $currentEditable) {
                e.preventDefault();
                focusNextEditable();
            }

            // Feature 4: Shift+Tab = Previous editable field
            if (e.key === 'Tab' && e.shiftKey && $currentEditable) {
                e.preventDefault();
                focusPreviousEditable();
            }
        });
    }

    // Store original contents for reset
    function storeOriginalContents() {
        $('.editable').each(function() {
            const key = $(this).data('key');
            originalContents[key] = $(this).html();
        });
    }

    // ============================================================
    // Feature 1: Undo/Redo System
    // ============================================================

    function pushToUndo(key, oldValue, newValue) {
        undoStack.push({
            key: key,
            oldValue: oldValue,
            newValue: newValue,
            timestamp: Date.now()
        });

        // Limit stack size
        if (undoStack.length > MAX_UNDO_STACK) {
            undoStack.shift();
        }

        // Clear redo stack on new action
        redoStack = [];

        updateUndoRedoIndicator();
    }

    function undo() {
        if (undoStack.length === 0) {
            showMessage('Nichts zum Rückgängig machen', 'info');
            return;
        }

        const action = undoStack.pop();
        const $element = $('.editable[data-key="' + action.key + '"]');

        if ($element.length) {
            $element.html(action.oldValue);
            redoStack.push(action);
            markAsChanged($element);
            showMessage('↶ Rückgängig gemacht', 'info');
        }

        updateUndoRedoIndicator();
    }

    function redo() {
        if (redoStack.length === 0) {
            showMessage('Nichts zum Wiederherstellen', 'info');
            return;
        }

        const action = redoStack.pop();
        const $element = $('.editable[data-key="' + action.key + '"]');

        if ($element.length) {
            $element.html(action.newValue);
            undoStack.push(action);
            markAsChanged($element);
            showMessage('↷ Wiederhergestellt', 'info');
        }

        updateUndoRedoIndicator();
    }

    function updateUndoRedoIndicator() {
        const indicator = $('.edit-mode-indicator');
        if (indicator.length) {
            const undoCount = undoStack.length;
            const redoCount = redoStack.length;
            const undoText = undoCount > 0 ? `${undoCount} Undo` : '';
            const redoText = redoCount > 0 ? `${redoCount} Redo` : '';
            const stack = [undoText, redoText].filter(t => t).join(' | ');

            if (stack) {
                indicator.attr('data-undo-redo', stack);
            } else {
                indicator.removeAttr('data-undo-redo');
            }
        }
    }

    // Track changes for undo system
    function trackChange($element) {
        const key = $element.data('key');
        const oldValue = originalContents[key] || '';
        const newValue = $element.html();

        if (oldValue !== newValue) {
            pushToUndo(key, oldValue, newValue);
        }
    }

    // ============================================================
    // Feature 4: Extended Keyboard Shortcuts
    // ============================================================

    function cancelCurrentEdit() {
        if (!$currentEditable) return;

        const key = $currentEditable.data('key');
        const original = originalContents[key];

        if (original) {
            $currentEditable.html(original);
            markAsChanged($currentEditable);
            showMessage('✗ Änderung verworfen', 'info');
        }

        $currentEditable.blur();
    }

    function focusNextEditable() {
        const $editables = $('.editable');
        const currentIndex = $editables.index($currentEditable);
        const nextIndex = (currentIndex + 1) % $editables.length;
        $editables.eq(nextIndex).focus();
    }

    function focusPreviousEditable() {
        const $editables = $('.editable');
        const currentIndex = $editables.index($currentEditable);
        const prevIndex = (currentIndex - 1 + $editables.length) % $editables.length;
        $editables.eq(prevIndex).focus();
    }

    // ============================================================
    // Feature 7: Smart Highlighting
    // ============================================================

    function markAsChanged($element) {
        const key = $element.data('key');
        const original = originalContents[key] || '';
        const current = $element.html().trim();

        if (original.trim() !== current) {
            $element.addClass('field-changed');
        } else {
            $element.removeClass('field-changed');
        }

        updateChangeCounter();
    }

    function updateChangeCounter() {
        const count = $('.field-changed').length;
        if (count > 0) {
            $('.tierliebe-save-btn').text(`💾 Speichern (${count})`);
        } else {
            $('.tierliebe-save-btn').text('💾 Speichern');
        }
    }

    // ============================================================
    // Feature 18: Auto-Save Draft
    // ============================================================

    function startAutoSave() {
        // Clear any existing interval
        if (autoSaveInterval) {
            clearInterval(autoSaveInterval);
        }

        autoSaveInterval = setInterval(function() {
            saveDraft();
        }, AUTO_SAVE_DELAY);
    }

    function stopAutoSave() {
        if (autoSaveInterval) {
            clearInterval(autoSaveInterval);
            autoSaveInterval = null;
        }
    }

    function saveDraft() {
        const pageSlug = $('#tierliebe-page-slug').val();
        if (!pageSlug) return;

        const contentMap = {};

        $('.editable').each(function() {
            const key = $(this).data('key');
            contentMap[key] = $(this).html().trim();
        });

        const draftData = {
            content: contentMap,
            timestamp: Date.now()
        };

        localStorage.setItem('tierliebe_draft_' + pageSlug, JSON.stringify(draftData));
        lastAutoSaveTime = Date.now();

        updateAutoSaveIndicator();
        console.log('Draft auto-saved for', pageSlug);
    }

    function tryRestoreDraft() {
        const pageSlug = $('#tierliebe-page-slug').val();
        if (!pageSlug) return;

        const draftJson = localStorage.getItem('tierliebe_draft_' + pageSlug);
        if (!draftJson) return;

        try {
            const draft = JSON.parse(draftJson);
            const age = Date.now() - draft.timestamp;

            // Only offer restore if less than 24 hours old
            if (age < 86400000) {
                const ageText = formatAge(age);
                if (confirm(`Draft gefunden (${ageText} alt). Wiederherstellen?`)) {
                    Object.keys(draft.content).forEach(key => {
                        const $element = $('.editable[data-key="' + key + '"]');
                        if ($element.length) {
                            $element.html(draft.content[key]);
                        }
                    });
                    showMessage('✓ Draft wiederhergestellt', 'success');
                }
            }
        } catch (e) {
            console.error('Failed to restore draft:', e);
        }
    }

    function clearDraft() {
        const pageSlug = $('#tierliebe-page-slug').val();
        if (pageSlug) {
            localStorage.removeItem('tierliebe_draft_' + pageSlug);
        }
    }

    function updateAutoSaveIndicator() {
        if (!lastAutoSaveTime) return;

        const $indicator = $('.auto-save-indicator');
        const age = formatAge(Date.now() - lastAutoSaveTime);
        $indicator.text(`💾 Auto-Save: vor ${age}`).fadeIn();
    }

    function formatAge(ms) {
        const seconds = Math.floor(ms / 1000);
        const minutes = Math.floor(seconds / 60);
        const hours = Math.floor(minutes / 60);

        if (hours > 0) return `${hours}h`;
        if (minutes > 0) return `${minutes}min`;
        return `${seconds}s`;
    }

    // ============================================================
    // Feature 20b: Media Library Integration
    // ============================================================

    function setupMediaLibraryIntegration() {
        // Click on images in edit mode opens WordPress Media Library
        $('body').on('click.editmode-image', 'img', function(e) {
            if (!isEditMode) return;

            e.preventDefault();
            e.stopPropagation();

            const $img = $(this);
            openMediaLibraryForImage($img);
        });
    }

    function openMediaLibraryForImage($img) {
        // Check if wp.media is available
        if (typeof wp === 'undefined' || typeof wp.media === 'undefined') {
            alert('WordPress Media Library ist nicht verfügbar. Bitte Seite neu laden.');
            return;
        }

        // Create media frame
        const frame = wp.media({
            title: 'Bild auswählen',
            button: {
                text: 'Bild verwenden'
            },
            multiple: false,
            library: {
                type: 'image'
            }
        });

        // When image is selected
        frame.on('select', function() {
            const attachment = frame.state().get('selection').first().toJSON();

            // Update image src and alt
            $img.attr('src', attachment.url);
            $img.attr('alt', attachment.alt || attachment.title || '');

            // Mark parent editable as changed if inside one
            const $editable = $img.closest('.editable');
            if ($editable.length) {
                markAsChanged($editable);
            }

            showMessage('✓ Bild aktualisiert (nicht vergessen zu speichern!)', 'success');
        });

        frame.open();
    }

    // Toggle Edit Mode
    function toggleEditMode() {
        isEditMode = !isEditMode;

        if (isEditMode) {
            // Enter Edit Mode
            $('body').addClass('edit-mode');
            $('.tierliebe-edit-btn').addClass('active').attr('title', 'Bearbeiten beenden');

            // Add indicator with extended shortcuts info
            $('body').append('<div class="edit-mode-indicator">Bearbeitungsmodus aktiv - Shortcuts: Ctrl+E (Toggle), Ctrl+Z/Y (Undo/Redo), Tab (Weiter), Esc (Abbrechen)</div>');

            // Make elements editable
            $('.editable').attr('contenteditable', 'true');

            // Prevent ALL link navigation in edit mode
            $('a').on('click.editmode', function(e) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            });

            // Right-click on links with data-editable-url to edit URL
            $('a[data-editable-url]').on('contextmenu.editmode', function(e) {
                e.preventDefault();
                openUrlModal($(this));
                return false;
            });

            // Show toolbar on focus
            $('.editable').on('focus', function() {
                $currentEditable = $(this);
                showToolbarNear($(this));
            });

            // Hide toolbar on blur (with delay for clicking toolbar)
            $('.editable').on('blur', function() {
                setTimeout(function() {
                    if (!$('.tierliebe-format-toolbar:hover').length) {
                        $('.tierliebe-format-toolbar').fadeOut(200);
                    }
                }, 200);
            });

            // Feature 7: Track changes on input for smart highlighting
            $('.editable').on('input', function() {
                const $this = $(this);
                markAsChanged($this);
            });

            // Track changes on blur for undo system
            $('.editable').on('blur', function() {
                const $this = $(this);
                trackChange($this);
            });

            // Feature 18: Start auto-save
            startAutoSave();

            // Feature 20b: Setup media library integration
            setupMediaLibraryIntegration();

            // Clear undo/redo stacks on entering edit mode
            undoStack = [];
            redoStack = [];
        } else {
            // Exit Edit Mode
            exitEditMode();
        }
    }

    // Show toolbar near editable element
    function showToolbarNear($element) {
        const toolbar = $('.tierliebe-format-toolbar');
        const offset = $element.offset();
        const scrollTop = $(window).scrollTop();

        // Position toolbar above the element
        toolbar.css({
            position: 'absolute',
            top: (offset.top - scrollTop - 50) + 'px',
            left: offset.left + 'px',
            display: 'flex'
        });

        toolbar.fadeIn(200);
    }

    // Exit Edit Mode
    function exitEditMode() {
        $('body').removeClass('edit-mode');
        $('.tierliebe-edit-btn').removeClass('active').attr('title', 'Texte bearbeiten');
        $('.edit-mode-indicator').remove();
        $('.tierliebe-format-toolbar').hide();
        $('.editable').attr('contenteditable', 'false').off('focus blur input');

        // Re-enable link navigation
        $('a').off('click.editmode');
        $('a[data-editable-url]').off('contextmenu.editmode');

        // Feature 20b: Remove media library integration
        $('body').off('click.editmode-image');

        // Feature 18: Stop auto-save
        stopAutoSave();

        // Feature 7: Clear change highlighting
        $('.editable').removeClass('field-changed');
        updateChangeCounter();

        $currentEditable = null;
        isEditMode = false;
    }

    // Save Changes via AJAX
    function saveChanges() {
        const pageSlug = $('#tierliebe-page-slug').val();

        if (!pageSlug) {
            showMessage('Fehler: Page Slug nicht gefunden', 'error');
            return;
        }

        // Collect all content
        let allContent = [];

        $('.editable').each(function() {
            const key = $(this).data('key');
            const content = $(this).html();

            // Only add if changed
            if (originalContents[key] !== content) {
                allContent.push({
                    key: key,
                    content: content
                });
            }
        });

        if (allContent.length === 0) {
            showMessage('Keine Änderungen zum Speichern', 'error');
            return;
        }

        // Disable button
        $('.tierliebe-save-btn').prop('disabled', true).text('💾 Wird gespeichert...');

        // Build HTML content from current state
        const htmlContent = buildHTMLFromEditables();

        // Send AJAX request
        $.ajax({
            url: tierliebe_edit.ajax_url,
            type: 'POST',
            data: {
                action: 'tierliebe_save_text',
                nonce: tierliebe_edit.nonce,
                page_slug: pageSlug,
                content: htmlContent
            },
            success: function(response) {
                if (response.success) {
                    showMessage('✓ Änderungen gespeichert!', 'success');

                    // Update original contents
                    storeOriginalContents();

                    // Feature 18: Clear draft after successful save
                    clearDraft();

                    // Exit edit mode (no reload needed - changes are already visible)
                    exitEditMode();
                } else {
                    showMessage('Fehler: ' + response.data, 'error');
                }
            },
            error: function(xhr, status, error) {
                showMessage('AJAX-Fehler: ' + error, 'error');
                console.error('AJAX Error:', xhr.responseText);
            },
            complete: function() {
                $('.tierliebe-save-btn').prop('disabled', false).text('💾 Speichern');
            }
        });
    }

    // Build HTML content from editables (store as JSON-encoded HTML)
    function buildHTMLFromEditables() {
        let contentMap = {};

        $('.editable').each(function() {
            const key = $(this).data('key');
            let content = $(this).html();

            // Trim leading/trailing whitespace and normalize
            content = content.trim();

            // Remove excessive whitespace (multiple spaces/newlines)
            content = content.replace(/\s+/g, ' ');

            contentMap[key] = content;
        });

        // Store as JSON in special format that won't be parsed as Markdown
        // Format: <!--TIERLIEBE_HTML_START-->{"key":"content"}<!--TIERLIEBE_HTML_END-->
        return '<!--TIERLIEBE_HTML_START-->' + JSON.stringify(contentMap) + '<!--TIERLIEBE_HTML_END-->';
    }

    // Show Message
    function showMessage(text, type) {
        // Don't show duplicate messages
        if ($('.tierliebe-message:contains("' + text + '")').length) {
            return;
        }

        const $message = $('<div class="tierliebe-message ' + type + '">' + text + '</div>');
        $('body').append($message);

        setTimeout(function() {
            $message.fadeOut(function() {
                $(this).remove();
            });
        }, 3000);
    }

    // Open URL Edit Modal
    function openUrlModal($link) {
        currentEditLink = $link;
        const currentUrl = $link.attr('href');

        $('#url-edit-input').val(currentUrl);
        $('.url-edit-modal').addClass('active');

        // Focus input and select all
        setTimeout(function() {
            $('#url-edit-input').focus().select();
        }, 100);
    }

    // Close URL Edit Modal
    function closeUrlModal() {
        $('.url-edit-modal').removeClass('active');
        currentEditLink = null;
        $('#url-edit-input').val('');
    }

    // Save URL from Modal
    function saveUrlFromModal() {
        if (!currentEditLink) return;

        const newUrl = $('#url-edit-input').val().trim();
        const oldUrl = currentEditLink.attr('href');

        if (newUrl && newUrl !== oldUrl) {
            currentEditLink.attr('href', newUrl);
            showMessage('✓ URL geändert (nicht vergessen zu speichern!)', 'success');
        }

        closeUrlModal();
    }

})(jQuery);
