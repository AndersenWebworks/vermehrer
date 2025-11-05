/**
 * Tierliebe Edit Mode - Frontend WYSIWYG Editor for Admins
 * Version: 3.1.0 - Phase 2 Features (Field History, Inline Validation, Collaboration Hints)
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

    // Feature 5: Field History
    const MAX_HISTORY_PER_FIELD = 5;
    const HISTORY_TTL = 7 * 24 * 60 * 60 * 1000; // 7 days

    // Feature 8: Inline Validation
    const HEADLINE_WARNING_LENGTH = 60;
    const COMMON_EMOJIS = ['✨', '💔', '🐶', '🐱', '🐰', '🐹', '🐾', '❤️', '💡', '⚠️', '✓', '✗'];

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
            // Sanitize content before saving to draft
            contentMap[key] = sanitizeContentForJSON($(this).html());
        });

        const draftData = {
            content: contentMap,
            timestamp: Date.now()
        };

        try {
            const jsonString = JSON.stringify(draftData);
            // Validate JSON before saving
            JSON.parse(jsonString);
            localStorage.setItem('tierliebe_draft_' + pageSlug, jsonString);
            lastAutoSaveTime = Date.now();
            updateAutoSaveIndicator();
            console.log('Draft auto-saved for', pageSlug);
        } catch (e) {
            console.error('Failed to save draft - JSON corruption:', e);
            // Don't show error message for auto-save failures (silent fail)
        }
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

    // ============================================================
    // Feature 5: Field History
    // ============================================================

    function getFieldHistoryKey(pageSlug, fieldKey) {
        return `tierliebe_history_${pageSlug}_${fieldKey}`;
    }

    function saveToHistory(fieldKey, content) {
        const pageSlug = $('#tierliebe-page-slug').val();
        if (!pageSlug || !fieldKey) return;

        const historyKey = getFieldHistoryKey(pageSlug, fieldKey);
        let history = [];

        try {
            const stored = localStorage.getItem(historyKey);
            if (stored) {
                history = JSON.parse(stored);
            }
        } catch (e) {
            console.error('Failed to load history:', e);
            history = [];
        }

        // Add new entry
        history.unshift({
            content: content,
            timestamp: Date.now(),
            user: tierliebe_edit.current_user || 'Unknown'
        });

        // Limit to MAX_HISTORY_PER_FIELD entries
        if (history.length > MAX_HISTORY_PER_FIELD) {
            history = history.slice(0, MAX_HISTORY_PER_FIELD);
        }

        // Clean old entries (older than HISTORY_TTL)
        const now = Date.now();
        history = history.filter(entry => (now - entry.timestamp) < HISTORY_TTL);

        localStorage.setItem(historyKey, JSON.stringify(history));
    }

    function loadHistory(fieldKey) {
        const pageSlug = $('#tierliebe-page-slug').val();
        if (!pageSlug || !fieldKey) return [];

        const historyKey = getFieldHistoryKey(pageSlug, fieldKey);

        try {
            const stored = localStorage.getItem(historyKey);
            if (stored) {
                const history = JSON.parse(stored);
                // Clean old entries
                const now = Date.now();
                return history.filter(entry => (now - entry.timestamp) < HISTORY_TTL);
            }
        } catch (e) {
            console.error('Failed to load history:', e);
        }

        return [];
    }

    function showHistoryModal($element) {
        const key = $element.data('key');
        const history = loadHistory(key);

        if (history.length === 0) {
            showMessage('Keine History für dieses Feld', 'info');
            return;
        }

        // Create modal
        const $modal = $(`
            <div class="field-history-modal">
                <div class="field-history-box">
                    <h3>📜 Feld-Historie: ${key}</h3>
                    <div class="field-history-list"></div>
                    <div class="field-history-buttons">
                        <button class="btn-close">Schließen</button>
                    </div>
                </div>
            </div>
        `);

        // Populate history list
        const $list = $modal.find('.field-history-list');
        history.forEach((entry, index) => {
            const age = formatAge(Date.now() - entry.timestamp);
            const preview = stripHTML(entry.content).substring(0, 80) + '...';

            const $item = $(`
                <div class="history-item" data-index="${index}">
                    <div class="history-meta">
                        <span class="history-age">${age} alt</span>
                        <span class="history-user">von ${entry.user}</span>
                    </div>
                    <div class="history-preview">${preview}</div>
                    <button class="btn-restore" data-index="${index}">Wiederherstellen</button>
                </div>
            `);

            $item.find('.btn-restore').on('click', function() {
                $element.html(entry.content);
                markAsChanged($element);
                $modal.remove();
                showMessage('✓ Version wiederhergestellt', 'success');
            });

            $list.append($item);
        });

        $modal.find('.btn-close').on('click', function() {
            $modal.remove();
        });

        $modal.on('click', function(e) {
            if (e.target === this) $modal.remove();
        });

        $('body').append($modal);
    }

    function stripHTML(html) {
        const tmp = document.createElement('div');
        tmp.innerHTML = html;
        return tmp.textContent || tmp.innerText || '';
    }

    // ============================================================
    // Feature 8: Inline Validation
    // ============================================================

    function setupInlineValidation() {
        // Add character counter and emoji picker to editables
        $('.editable').each(function() {
            const $this = $(this);
            const key = $this.data('key');

            // Add validation indicators
            if (!$this.find('.field-tools').length) {
                const $tools = $(`
                    <div class="field-tools">
                        <span class="char-counter"></span>
                        <button class="emoji-picker-btn" title="Emoji einfügen">😊</button>
                    </div>
                `);

                $this.append($tools);

                // Emoji picker
                $tools.find('.emoji-picker-btn').on('click', function(e) {
                    e.stopPropagation();
                    showEmojiPicker($(this), $this);
                });
            }
        });

        // Update counters on focus
        $('.editable').on('focus', function() {
            updateCharCounter($(this));
        });

        $('.editable').on('input', function() {
            updateCharCounter($(this));
        });
    }

    function updateCharCounter($element) {
        const text = stripHTML($element.html());
        const length = text.length;
        const $counter = $element.find('.char-counter');

        if ($counter.length) {
            $counter.text(`${length} Zeichen`);

            // Warn if headline and too long
            const key = $element.data('key');
            if (key && (key.includes('headline') || key.includes('titel')) && length > HEADLINE_WARNING_LENGTH) {
                $counter.addClass('warning');
            } else {
                $counter.removeClass('warning');
            }
        }
    }

    function showEmojiPicker($button, $editable) {
        // Remove existing picker
        $('.emoji-picker-popup').remove();

        const $picker = $(`
            <div class="emoji-picker-popup">
                ${COMMON_EMOJIS.map(emoji => `<button class="emoji-btn">${emoji}</button>`).join('')}
            </div>
        `);

        // Position near button
        const offset = $button.offset();
        $picker.css({
            position: 'absolute',
            top: offset.top + $button.outerHeight() + 5,
            left: offset.left
        });

        // Insert emoji on click
        $picker.find('.emoji-btn').on('click', function(e) {
            e.stopPropagation();
            const emoji = $(this).text();

            // Insert at cursor or at end
            const selection = window.getSelection();
            if (selection.rangeCount > 0) {
                const range = selection.getRangeAt(0);
                range.deleteContents();
                range.insertNode(document.createTextNode(emoji));
            } else {
                $editable.append(emoji);
            }

            markAsChanged($editable);
            $picker.remove();
            $editable.focus();
        });

        // Close on click outside
        setTimeout(function() {
            $(document).one('click', function() {
                $picker.remove();
            });
        }, 100);

        $('body').append($picker);
    }

    function removeInlineValidation() {
        $('.field-tools').remove();
        $('.emoji-picker-popup').remove();
    }

    // ============================================================
    // Feature 13: Collaboration Hints
    // ============================================================

    function setupCollaborationHints() {
        // Add collaboration badge to each editable
        $('.editable').each(function() {
            const $this = $(this);
            const key = $this.data('key');

            if (!$this.find('.collab-badge').length) {
                const $badge = $('<div class="collab-badge"></div>');
                $this.prepend($badge);
                updateCollaborationBadge($this);
            }
        });
    }

    function updateCollaborationBadge($element) {
        const key = $element.data('key');
        const pageSlug = $('#tierliebe-page-slug').val();
        const $badge = $element.find('.collab-badge');

        if (!$badge.length || !key || !pageSlug) return;

        // Load last edit info from localStorage
        const metaKey = `tierliebe_meta_${pageSlug}_${key}`;
        const stored = localStorage.getItem(metaKey);

        if (stored) {
            try {
                const meta = JSON.parse(stored);
                const age = formatAge(Date.now() - meta.timestamp);
                $badge.text(`Zuletzt: ${meta.user} vor ${age}`);
                $badge.show();
            } catch (e) {
                $badge.hide();
            }
        } else {
            $badge.hide();
        }
    }

    function saveCollaborationMeta(fieldKey) {
        const pageSlug = $('#tierliebe-page-slug').val();
        if (!pageSlug || !fieldKey) return;

        const metaKey = `tierliebe_meta_${pageSlug}_${fieldKey}`;
        const meta = {
            user: tierliebe_edit.current_user || 'Admin',
            timestamp: Date.now()
        };

        localStorage.setItem(metaKey, JSON.stringify(meta));
    }

    function removeCollaborationHints() {
        $('.collab-badge').remove();
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

            // Feature 8: Setup inline validation
            setupInlineValidation();

            // Feature 13: Setup collaboration hints
            setupCollaborationHints();

            // Feature 5: Add history icon to editables
            $('.editable').each(function() {
                const $this = $(this);
                if (!$this.find('.history-icon').length) {
                    const $icon = $('<button class="history-icon" title="Feld-Historie anzeigen">📜</button>');
                    $icon.on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        showHistoryModal($this);
                    });
                    $this.prepend($icon);
                }
            });

            // Track changes for history on blur
            $('.editable').on('blur.history', function() {
                const $this = $(this);
                const key = $this.data('key');
                const content = $this.html();
                const original = originalContents[key] || '';

                if (content !== original) {
                    saveToHistory(key, content);
                    saveCollaborationMeta(key);
                }
            });

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

        // Feature 5: Remove history icons
        $('.history-icon').remove();
        $('.editable').off('blur.history');

        // Feature 8: Remove inline validation
        removeInlineValidation();

        // Feature 13: Remove collaboration hints
        removeCollaborationHints();

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
        let htmlContent;
        try {
            htmlContent = buildHTMLFromEditables();
        } catch (e) {
            // Re-enable button on error
            $('.tierliebe-save-btn').prop('disabled', false).text('💾 Speichern');
            console.error('Failed to build content:', e);
            return;
        }

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
                    // Enhanced error display with details
                    displayDetailedError(response.data);
                }
            },
            error: function(xhr, status, error) {
                showMessage('AJAX-Fehler: ' + error, 'error');
                console.error('AJAX Error:', xhr.responseText);
                console.error('Status:', status);
                console.error('Response:', xhr);
            },
            complete: function() {
                $('.tierliebe-save-btn').prop('disabled', false).text('💾 Speichern');
            }
        });
    }

    // Sanitize HTML content for safe JSON serialization
    function sanitizeContentForJSON(htmlContent) {
        // Create a temporary element to parse and normalize HTML
        const $temp = $('<div>').html(htmlContent);

        // Get the normalized HTML back
        let sanitized = $temp.html();

        // Remove zero-width spaces and other invisible characters that can corrupt JSON
        sanitized = sanitized.replace(/[\u200B-\u200D\uFEFF]/g, '');

        // Normalize curly quotes to straight quotes (contenteditable sometimes adds these)
        sanitized = sanitized.replace(/[\u201C\u201D]/g, '"');
        sanitized = sanitized.replace(/[\u2018\u2019]/g, "'");

        // Remove null bytes and other control characters
        sanitized = sanitized.replace(/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/g, '');

        // Trim and normalize whitespace
        sanitized = sanitized.trim();
        sanitized = sanitized.replace(/\s+/g, ' ');

        return sanitized;
    }

    // Build HTML content from editables (store as JSON-encoded HTML)
    function buildHTMLFromEditables() {
        let contentMap = {};

        $('.editable').each(function() {
            const key = $(this).data('key');
            let content = $(this).html();

            // Sanitize content for safe JSON serialization
            content = sanitizeContentForJSON(content);

            contentMap[key] = content;
        });

        // Validate JSON before returning to prevent corruption
        try {
            const jsonString = JSON.stringify(contentMap);

            // Try to parse it back to ensure it's valid JSON
            JSON.parse(jsonString);

            // Store as JSON in special format that won't be parsed as Markdown
            // Format: <!--TIERLIEBE_HTML_START-->{"key":"content"}<!--TIERLIEBE_HTML_END-->
            return '<!--TIERLIEBE_HTML_START-->' + jsonString + '<!--TIERLIEBE_HTML_END-->';
        } catch (e) {
            console.error('JSON serialization failed:', e);
            console.error('Content map:', contentMap);
            showMessage('❌ Fehler: Content konnte nicht gespeichert werden. JSON ist korrupt. Bitte Seite neu laden.', 'error');
            throw e;
        }
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

    // Display detailed error information
    function displayDetailedError(errorData) {
        // Close any existing error modals
        $('.error-detail-modal').remove();

        // Determine error message and details
        let errorMessage = 'Unbekannter Fehler';
        let errorDetails = '';
        let errorLog = '';

        if (typeof errorData === 'string') {
            errorMessage = errorData;
        } else if (typeof errorData === 'object') {
            errorMessage = errorData.error || errorData.message || 'Unbekannter Fehler';
            errorDetails = errorData.details || '';

            // Build detailed error log
            if (errorData.json_error) {
                errorLog += 'JSON Fehler: ' + errorData.json_error + '\n';
            }
            if (errorData.json_error_code) {
                errorLog += 'Fehler-Code: ' + errorData.json_error_code + '\n';
            }
            if (errorData.raw_sample) {
                errorLog += 'Daten-Sample: ' + errorData.raw_sample + '\n';
            }
        }

        // Create error modal
        const $modal = $(`
            <div class="error-detail-modal">
                <div class="error-detail-box">
                    <h3>⚠️ Speichern fehlgeschlagen</h3>
                    <div class="error-main">${escapeHtml(errorMessage)}</div>
                    ${errorDetails ? '<div class="error-details"><strong>Details:</strong> ' + escapeHtml(errorDetails) + '</div>' : ''}
                    ${errorLog ? '<div class="error-log"><strong>Technische Details:</strong><pre>' + escapeHtml(errorLog) + '</pre></div>' : ''}
                    <div class="error-help">
                        <p><strong>Was kannst du tun?</strong></p>
                        <ul>
                            <li>Prüfe die Browser-Console (F12) für weitere Details</li>
                            <li>Versuche, die Änderungen in kleineren Schritten zu speichern</li>
                            <li>Wenn das Problem weiterhin besteht, lade die Seite neu (Strg+R)</li>
                            <li>Dein Backup wurde automatisch wiederhergestellt</li>
                        </ul>
                    </div>
                    <div class="error-buttons">
                        <button class="btn-close-error">Verstanden</button>
                        <button class="btn-reload">Seite neu laden</button>
                    </div>
                </div>
            </div>
        `);

        // Log to console for debugging
        console.error('=== TIERLIEBE SAVE ERROR ===');
        console.error('Message:', errorMessage);
        console.error('Details:', errorDetails);
        console.error('Full Error Data:', errorData);
        console.error('===========================');

        // Event handlers
        $modal.find('.btn-close-error').on('click', function() {
            $modal.remove();
        });

        $modal.find('.btn-reload').on('click', function() {
            location.reload();
        });

        $modal.on('click', function(e) {
            if (e.target === this) $modal.remove();
        });

        $('body').append($modal);

        // Also show brief message
        showMessage('❌ Fehler beim Speichern (Details im Popup)', 'error');
    }

    // Escape HTML for safe display
    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return String(text).replace(/[&<>"']/g, function(m) { return map[m]; });
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
