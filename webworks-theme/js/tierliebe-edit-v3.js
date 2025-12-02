/**
 * Tierliebe Edit v3.0.0 - Simpler Frontend Editor
 *
 * Features:
 * - Text editieren (contenteditable)
 * - Bilder tauschen (WordPress Media Library)
 * - Speichern via AJAX
 * - Undo (letzte Revision wiederherstellen)
 *
 * NO Features (by design):
 * - No Page Builder
 * - No Element Library
 * - No Structure Manipulation
 * - No Formatting Toolbar
 */

(function($) {
    'use strict';

    let isEditMode = false;
    let originalContents = {};

    // Initialize
    $(document).ready(function() {
        // Add UI Buttons
        $('body').append(`
            <button class="tierliebe-edit-btn" title="Texte bearbeiten">✏️</button>
            <button class="tierliebe-save-btn">💾 Speichern</button>
            <button class="tierliebe-undo-btn" title="Letzte Änderung rückgängig">↩️</button>
        `);

        // Event Handlers
        $('.tierliebe-edit-btn').on('click', toggleEditMode);
        $('.tierliebe-save-btn').on('click', saveChanges);
        $('.tierliebe-undo-btn').on('click', undoChanges);

        // Store original contents
        storeOriginalContents();

        // Ensure nothing is editable on load
        $('.editable').attr('contenteditable', 'false');

        // Keyboard shortcut: Ctrl+S = Save
        $(document).on('keydown', function(e) {
            if (isEditMode && (e.ctrlKey || e.metaKey) && e.key === 's') {
                e.preventDefault();
                saveChanges();
            }
        });
    });

    // Store original contents for comparison
    function storeOriginalContents() {
        $('.editable').each(function() {
            const key = $(this).data('key');
            if (key) {
                originalContents[key] = normalizeContent($(this).html());
            }
        });

        // Store image IDs
        $('.editable-image').each(function() {
            const metaKey = $(this).data('image-meta');
            const $img = $(this).find('img');
            if (metaKey && $img.length) {
                const attachmentId = $img.data('attachment-id');
                if (attachmentId) {
                    originalContents[metaKey] = attachmentId;
                }
            }
        });
    }

    // Normalize content for comparison
    function normalizeContent(html) {
        // Decode HTML entities
        const textarea = document.createElement('textarea');
        textarea.innerHTML = html;
        let content = textarea.value;

        // Replace straight quotes with prime (prevents JSON issues)
        content = content.replace(/"/g, '′');

        // Normalize whitespace
        return content.trim().replace(/\s+/g, ' ');
    }

    // Toggle Edit Mode
    function toggleEditMode() {
        isEditMode = !isEditMode;

        if (isEditMode) {
            // Enter Edit Mode
            $('body').addClass('edit-mode');
            $('.tierliebe-edit-btn').addClass('active');

            // Show indicator
            $('body').append('<div class="edit-mode-indicator">✏️ Bearbeitungsmodus aktiv (Ctrl+S = Speichern)</div>');

            // Make text editable
            $('.editable').attr('contenteditable', 'true');

            // Prevent link navigation
            $('a').on('click.editmode', function(e) {
                e.preventDefault();
            });

            // Image click = Media Library
            $('.editable-image').on('click.editmode', function(e) {
                e.preventDefault();
                openMediaLibrary($(this));
            });

        } else {
            // Exit Edit Mode
            $('body').removeClass('edit-mode');
            $('.tierliebe-edit-btn').removeClass('active');
            $('.edit-mode-indicator').remove();
            $('.editable').attr('contenteditable', 'false');
            $('a').off('click.editmode');
            $('.editable-image').off('click.editmode');
        }
    }

    // Open WordPress Media Library
    function openMediaLibrary($container) {
        const metaKey = $container.data('image-meta');
        if (!metaKey) return;

        const uploader = wp.media({
            title: 'Bild auswählen',
            button: { text: 'Bild verwenden' },
            multiple: false
        });

        uploader.on('select', function() {
            const attachment = uploader.state().get('selection').first().toJSON();
            const imgUrl = attachment.sizes.large ? attachment.sizes.large.url : attachment.url;

            // Update preview
            $container.find('img').attr('src', imgUrl).data('attachment-id', attachment.id);

            // Mark as changed
            originalContents[metaKey] = 'CHANGED:' + attachment.id;

            showMessage('✓ Bild ausgewählt - klicke Speichern!', 'info');
        });

        uploader.open();
    }

    // Save Changes
    function saveChanges() {
        const changedContent = {};
        let changeCount = 0;

        // Collect changed text content
        $('.editable').each(function() {
            const key = $(this).data('key');
            if (!key) return;

            const currentContent = normalizeContent($(this).html());

            if (originalContents[key] !== currentContent) {
                changedContent[key] = currentContent;
                changeCount++;
            }
        });

        // Collect changed images
        $('.editable-image').each(function() {
            const metaKey = $(this).data('image-meta');
            if (!metaKey) return;

            const original = originalContents[metaKey];
            if (original && original.toString().startsWith('CHANGED:')) {
                changedContent[metaKey] = original.replace('CHANGED:', '');
                changeCount++;
            }
        });

        if (changeCount === 0) {
            showMessage('Keine Änderungen zum Speichern', 'info');
            return;
        }

        // Disable button
        $('.tierliebe-save-btn').prop('disabled', true).text('💾 Speichere...');

        // Build full content (merge with original)
        const fullContent = Object.assign({}, originalContents, changedContent);

        // Clean up CHANGED: prefixes
        for (let key in fullContent) {
            if (fullContent[key] && fullContent[key].toString().startsWith('CHANGED:')) {
                fullContent[key] = fullContent[key].replace('CHANGED:', '');
            }
        }

        // AJAX Save
        $.ajax({
            url: tierliebe_edit.ajax_url,
            type: 'POST',
            data: {
                action: 'tierliebe_save_content',
                nonce: tierliebe_edit.nonce,
                page_id: tierliebe_edit.page_id,
                content: JSON.stringify(fullContent)
            },
            success: function(response) {
                if (response.success) {
                    showMessage('✓ ' + changeCount + ' Änderung(en) gespeichert!', 'success');
                    storeOriginalContents(); // Update originals
                    toggleEditMode(); // Exit edit mode
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

    // Undo Changes (restore previous revision)
    function undoChanges() {
        if (!confirm('Letzte Änderung rückgängig machen?\n\nDies stellt die vorherige Version wieder her.')) {
            return;
        }

        $('.tierliebe-undo-btn').prop('disabled', true).css('opacity', '0.5');

        $.ajax({
            url: tierliebe_edit.ajax_url,
            type: 'POST',
            data: {
                action: 'tierliebe_undo_save',
                nonce: tierliebe_edit.nonce,
                page_id: tierliebe_edit.page_id
            },
            success: function(response) {
                if (response.success) {
                    showMessage('✓ Wiederhergestellt - Seite wird neu geladen...', 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    showMessage('Fehler: ' + response.data, 'error');
                    $('.tierliebe-undo-btn').prop('disabled', false).css('opacity', '1');
                }
            },
            error: function(xhr, status, error) {
                showMessage('AJAX-Fehler: ' + error, 'error');
                $('.tierliebe-undo-btn').prop('disabled', false).css('opacity', '1');
            }
        });
    }

    // Show Message
    function showMessage(text, type) {
        // Escape HTML to prevent XSS
        const escaped = $('<div>').text(text).html();
        const $msg = $('<div class="tierliebe-message ' + type + '">' + escaped + '</div>');
        $('body').append($msg);

        setTimeout(function() {
            $msg.fadeOut(function() { $(this).remove(); });
        }, 3000);
    }

})(jQuery);
