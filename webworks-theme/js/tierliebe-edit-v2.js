/**
 * Tierliebe Edit Mode - Frontend WYSIWYG Editor for Admins
 * Version: 2.0.0 - With Formatting Toolbar
 */

(function($) {
    'use strict';

    let isEditMode = false;
    let originalContents = {};
    let $currentEditable = null;

    // Initialize
    $(document).ready(function() {
        // Add Edit Button
        $('body').append('<button class="tierliebe-edit-btn" title="Texte bearbeiten">✏️</button>');
        $('body').append('<button class="tierliebe-save-btn">💾 Speichern</button>');

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
        $('.editable').each(function() {
            const key = $(this).data('key');
            originalContents[key] = $(this).html();
        });
    }

    // Toggle Edit Mode
    function toggleEditMode() {
        isEditMode = !isEditMode;

        if (isEditMode) {
            // Enter Edit Mode
            $('body').addClass('edit-mode');
            $('.tierliebe-edit-btn').addClass('active').attr('title', 'Bearbeiten beenden');

            // Add indicator
            $('body').append('<div class="edit-mode-indicator">Bearbeitungsmodus aktiv - Shortcuts: Ctrl+B (Fett), Ctrl+I (Kursiv), Ctrl+S (Speichern)</div>');

            // Make elements editable
            $('.editable').attr('contenteditable', 'true');

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
            const content = $(this).html();
            contentMap[key] = content;
        });

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

})(jQuery);
