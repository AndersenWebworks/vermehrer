/**
 * Tierliebe Edit Mode - Frontend WYSIWYG Editor for Admins
 * Version: 2.2.0 - Fixed Straight Quotes Bug (Critical)
 */

(function($) {
    'use strict';

    let isEditMode = false;
    let originalContents = {};
    let $currentEditable = null;
    let currentEditLink = null;

    // Initialize
    $(document).ready(function() {
        // Add Edit Button
        $('body').append('<button class="tierliebe-edit-btn" title="Texte bearbeiten">✏️</button>');
        $('body').append('<button class="tierliebe-save-btn">💾 Speichern</button>');
        $('body').append('<button class="tierliebe-cache-clear-btn" title="Letzte Änderung rückgängig machen">↩️</button>');

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
        $('.tierliebe-edit-btn').on('click', function() {
            toggleEditMode();
        });

        // Save Changes
        $('.tierliebe-save-btn').on('click', function() {
            saveChanges();
        });

        // Clear Cache
        $('.tierliebe-cache-clear-btn').on('click', function() {
            clearCache();
        });

        // Store original contents
        storeOriginalContents();

        // Keyboard shortcuts
        setupKeyboardShortcuts();
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

    // Setup keyboard shortcuts
    function setupKeyboardShortcuts() {
        $(document).on('keydown', function(e) {
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
        });
    }

    // Store original contents for reset
    function storeOriginalContents() {
        // Store text content
        $('.editable').each(function() {
            const key = $(this).data('key');
            let content = $(this).html();

            // Decode HTML entities BEFORE storing (same as buildHTMLFromEditables)
            const textarea = document.createElement('textarea');
            textarea.innerHTML = content;
            content = textarea.value;

            // CRITICAL FIX: Replace straight quotes " with prime symbol ′
            // Prime (U+2032) looks similar but doesn't trigger JSON escaping
            content = content.replace(/"/g, '′');

            // Normalize whitespace same as buildHTMLFromEditables()
            content = content.trim();
            content = content.replace(/\s+/g, ' ');

            originalContents[key] = content;
        });

        // Store image IDs (from data-image-id attribute set by PHP)
        $('.editable-image').each(function() {
            const metaKey = $(this).data('image-meta');
            const $img = $(this).find('img');
            if (metaKey && $img.length) {
                // Extract attachment ID from image src or data attribute
                const attachmentId = $img.data('attachment-id') || extractAttachmentIdFromSrc($img.attr('src'));
                if (attachmentId) {
                    originalContents[metaKey] = attachmentId;
                }
            }
        });
    }

    // Helper: Extract attachment ID from WordPress image URL
    function extractAttachmentIdFromSrc(src) {
        // WordPress images have pattern: .../uploads/2023/01/image-123x456.jpg
        // We can't reliably extract ID from URL, so return null
        // Images will be tracked only when changed via media library
        return null;
    }

    // Toggle Edit Mode
    function toggleEditMode() {
        isEditMode = !isEditMode;

        if (isEditMode) {
            // FAIL-SAFE: Check if page has valid content before allowing edit
            const editableCount = $('.editable').length;
            if (editableCount < 10) {
                showMessage('FAIL-SAFE: Seite hat zu wenige editierbare Felder (' + editableCount + '). Edit-Mode blockiert. Seite neu laden!', 'error');
                isEditMode = false;
                return;
            }

            // FAIL-SAFE: Check if stored contents are valid
            const storedKeysCount = Object.keys(originalContents).length;
            if (storedKeysCount < 10) {
                showMessage('FAIL-SAFE: Original-Content hat zu wenige Keys (' + storedKeysCount + '). Edit-Mode blockiert. Seite neu laden!', 'error');
                isEditMode = false;
                return;
            }

            // Enter Edit Mode
            $('body').addClass('edit-mode');
            $('.tierliebe-edit-btn').addClass('active').attr('title', 'Bearbeiten beenden');

            // Add indicator
            $('body').append('<div class="edit-mode-indicator">Bearbeitungsmodus aktiv - Shortcuts: Ctrl+B (Fett), Ctrl+I (Kursiv), Ctrl+S (Speichern)</div>');

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

            // Click on images with data-image-meta to open Media Library
            $('.editable-image').on('click.editmode', function(e) {
                e.preventDefault();
                openMediaLibrary($(this));
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
        $('.editable').attr('contenteditable', 'false').off('focus blur');

        // Re-enable link navigation
        $('a').off('click.editmode');
        $('a[data-editable-url]').off('contextmenu.editmode');
        $('.editable-image').off('click.editmode');

        $currentEditable = null;
        isEditMode = false;
    }

    // Save Changes via AJAX
    function saveChanges() {
        // Extract page slug from URL (e.g., /tierliebe-katzen/ -> tierliebe-katzen)
        const pathname = window.location.pathname;
        const pageSlug = pathname.split('/').filter(part => part.length > 0 && part.startsWith('tierliebe-'))[0] || 'tierliebe-start';

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

        // Check if there are any changes
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
        } catch (error) {
            showMessage('FAIL-SAFE: ' + error.message, 'error');
            $('.tierliebe-save-btn').prop('disabled', false).text('💾 Speichern');
            return;
        }

        // Send AJAX request
        $.ajax({
            url: tierliebe_edit.ajax_url,
            type: 'POST',
            data: {
                action: 'tierliebe_save_all',
                nonce: tierliebe_edit.nonce,
                page_slug: pageSlug,
                page_id: tierliebe_edit.page_id,
                content: htmlContent
            },
            success: function(response) {
                if (response.success) {
                    showMessage('✓ Änderungen gespeichert!', 'success');

                    // Update original contents
                    storeOriginalContents();

                    // Exit edit mode (no reload needed - changes are already visible)
                    exitEditMode();
                } else {
                    showMessage('Fehler: ' + response.data, 'error');
                }
            },
            error: function(xhr, status, error) {
                showMessage('AJAX-Fehler: ' + error, 'error');
            },
            complete: function() {
                $('.tierliebe-save-btn').prop('disabled', false).text('💾 Speichern');
            }
        });
    }

    // Build HTML content from editables (store as JSON-encoded HTML)
    function buildHTMLFromEditables() {
        let contentMap = {};

        // FAIL-SAFE: Check if originalContents is valid
        const originalKeysCount = Object.keys(originalContents).length;
        if (originalKeysCount < 10) {
            console.error('FAIL-SAFE: originalContents has only ' + originalKeysCount + ' keys (expected >= 10)');
            throw new Error('Ungültige Daten: Zu wenige Original-Keys (' + originalKeysCount + '). Speichern abgebrochen.');
        }

        // Start with original contents (to preserve unchanged fields)
        for (let key in originalContents) {
            contentMap[key] = originalContents[key];
        }

        // Override with changed contents
        $('.editable').each(function() {
            const key = $(this).data('key');
            let content = $(this).html();

            // Decode HTML entities BEFORE normalization (fix for &quot; in contenteditable)
            const textarea = document.createElement('textarea');
            textarea.innerHTML = content;
            content = textarea.value;

            // CRITICAL FIX: Replace straight quotes " with prime symbol ′
            // Prime (U+2032) looks similar but doesn't trigger JSON escaping
            content = content.replace(/"/g, '′');

            // Normalize BEFORE comparing
            content = content.trim();
            content = content.replace(/\s+/g, ' ');

            // Only update if changed (compare normalized values)
            if (originalContents[key] !== content) {
                contentMap[key] = content;
            }
        });

        // FAIL-SAFE: Validate contentMap before returning
        const finalKeysCount = Object.keys(contentMap).length;
        if (finalKeysCount < 10) {
            console.error('FAIL-SAFE: contentMap has only ' + finalKeysCount + ' keys (expected >= 10)');
            throw new Error('Ungültige Daten: Zu wenige Keys im finalen Content (' + finalKeysCount + '). Speichern abgebrochen.');
        }

        // Store as JSON in special format that won't be parsed as Markdown
        // Format: <!--TIERLIEBE_HTML_START-->{"key":"content"}<!--TIERLIEBE_HTML_END-->
        return '<!--TIERLIEBE_HTML_START-->' + JSON.stringify(contentMap) + '<!--TIERLIEBE_HTML_END-->';
    }

    // Show Message
    function showMessage(text, type) {
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

    // Open WordPress Media Library
    function openMediaLibrary($imageContainer) {
        const metaKey = $imageContainer.data('image-meta');

        if (!metaKey) {
            showMessage('Fehler: Kein Meta-Key gefunden', 'error');
            return;
        }

        // Always create a NEW media uploader for each image to avoid conflicts
        const uploader = wp.media({
            title: 'Bild auswählen',
            button: {
                text: 'Bild verwenden'
            },
            multiple: false
        });

        // When image is selected - use closure to capture correct $imageContainer
        uploader.on('select', function() {
            const attachment = uploader.state().get('selection').first().toJSON();

            // Store attachment ID in originalContents so it gets saved with other content
            originalContents[metaKey] = attachment.id;

            // Update preview immediately (but don't save to DB yet)
            const newImageHtml = '<img src="' + attachment.sizes.large.url + '" alt="" loading="lazy" data-attachment-id="' + attachment.id + '">';
            $imageContainer.find('img').replaceWith(newImageHtml);

            showMessage('✓ Bild ausgewählt (klicke "Speichern" zum Übernehmen)', 'info');
        });

        uploader.open();
    }

    // Undo Last Save - Restore previous revision
    function clearCache() {
        if (!confirm('Letzte Änderung rückgängig machen?\n\nDies stellt die vorherige WordPress-Revision wieder her.')) {
            return;
        }

        // Extract page slug
        const pathname = window.location.pathname;
        const pageSlug = pathname.split('/').filter(part => part.length > 0 && part.startsWith('tierliebe-'))[0] || 'tierliebe-start';

        // Disable button
        $('.tierliebe-cache-clear-btn').prop('disabled', true).css('opacity', '0.5');

        $.ajax({
            url: tierliebe_edit.ajax_url,
            type: 'POST',
            data: {
                action: 'tierliebe_undo_save',
                nonce: tierliebe_edit.nonce,
                page_id: tierliebe_edit.page_id,
                page_slug: pageSlug
            },
            success: function(response) {
                if (response.success) {
                    const data = response.data;
                    if (data.restored) {
                        showMessage('✓ Wiederhergestellt: ' + data.revision_date + ' - Seite wird neu geladen...', 'success');
                    } else {
                        showMessage('✓ Cache geleert - Seite wird neu geladen...', 'success');
                    }
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    showMessage('Fehler: ' + response.data, 'error');
                    $('.tierliebe-cache-clear-btn').prop('disabled', false).css('opacity', '1');
                }
            },
            error: function(xhr, status, error) {
                showMessage('AJAX-Fehler: ' + error, 'error');
                $('.tierliebe-cache-clear-btn').prop('disabled', false).css('opacity', '1');
            }
        });
    }

})(jQuery);
