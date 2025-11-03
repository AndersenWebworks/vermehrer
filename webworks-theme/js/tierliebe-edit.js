/**
 * Tierliebe Edit Mode - Frontend Text Editing for Admins
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    let isEditMode = false;
    let originalContents = {};
    let currentEditLink = null;

    // Initialize
    $(document).ready(function() {
        // Add Edit Button
        $('body').append('<button class="tierliebe-edit-btn" title="Texte bearbeiten">✏️</button>');
        $('body').append('<button class="tierliebe-save-btn">💾 Speichern</button>');

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

        // Toggle Edit Mode
        $('.tierliebe-edit-btn').on('click', toggleEditMode);

        // Save Changes
        $('.tierliebe-save-btn').on('click', saveChanges);

        // Store original contents
        storeOriginalContents();
    });

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
            $('body').append('<div class="edit-mode-indicator">Bearbeitungsmodus aktiv</div>');

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

            console.log('✏️ Edit Mode aktiviert - Rechtsklick auf Buttons/Links zum URL editieren');
        } else {
            // Exit Edit Mode
            exitEditMode();
        }
    }

    // Exit Edit Mode
    function exitEditMode() {
        $('body').removeClass('edit-mode');
        $('.tierliebe-edit-btn').removeClass('active').attr('title', 'Texte bearbeiten');
        $('.edit-mode-indicator').remove();
        $('.editable').attr('contenteditable', 'false');

        // Re-enable link navigation
        $('a').off('click.editmode');
        $('a[data-editable-url]').off('contextmenu.editmode');

        isEditMode = false;

        console.log('🔒 Edit Mode deaktiviert');
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

        console.log('💾 Speichere ' + allContent.length + ' Änderungen...');

        // Disable button
        $('.tierliebe-save-btn').prop('disabled', true).text('💾 Wird gespeichert...');

        // Rebuild markdown content from current HTML
        const markdownContent = buildMarkdownFromHTML();

        // Send AJAX request
        $.ajax({
            url: tierliebe_edit.ajax_url,
            type: 'POST',
            data: {
                action: 'tierliebe_save_text',
                nonce: tierliebe_edit.nonce,
                page_slug: pageSlug,
                content: markdownContent
            },
            success: function(response) {
                if (response.success) {
                    showMessage('✓ Änderungen gespeichert!', 'success');

                    // Update original contents
                    storeOriginalContents();

                    // Exit edit mode immediately
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

    // Build Markdown from HTML (simplified version)
    function buildMarkdownFromHTML() {
        let markdown = '# STARTSEITE (Primary Hero & Sektionen)\n\n';

        // Header/Titel
        const headerTitel = $('[data-key="header-titel"]').text().trim();
        markdown += '## Header/Titel\n';
        markdown += '**' + headerTitel + '**\n\n';

        // Untertitel
        const untertitel = $('[data-key="untertitel"]').text().trim();
        markdown += '## Untertitel\n';
        markdown += '"' + untertitel + '"\n\n';

        // Einleitungstext
        const einleitungstext = $('[data-key="einleitungstext"]').text().trim();
        markdown += '## Einleitungstext\n';
        markdown += '"' + einleitungstext + '"\n\n';

        markdown += '## Hero-Buttons\n';
        markdown += '- **Button 1:** "✨ Bin ich bereit? → Zum Test"\n';
        markdown += '- **Button 2:** "📚 Wissen aufbauen"\n\n';
        markdown += '---\n\n';

        // Sektion: Bin ich bereit
        markdown += '# Sektion: Bin ich bereit für ein Tier?\n\n';
        markdown += '**Sektions-Titel:** "Bin ich bereit für ein Tier?"\n\n';

        const sektionText = $('[data-key="sektion-bin-ich-bereit-fur-ein-tier"]').text().trim();
        markdown += '**Einleitungstext:**\n';
        markdown += '"' + sektionText + '"\n\n';

        const zentraleFrage = $('[data-key="zentrale-frage"]').text().trim();
        markdown += '**Zentrale Frage:**\n';
        markdown += '"' + zentraleFrage + '"\n\n';
        markdown += '---\n\n';

        // Info-Box: Ehrlichkeit
        markdown += '## Info-Box: Ehrlichkeit ist der erste Schritt\n\n';
        const ehrlichkeitTitel = $('[data-key="info-box-ehrlichkeit-ist-der-erste-schritt"]').text().trim();
        markdown += '**Überschrift:** "' + ehrlichkeitTitel + '"\n\n';

        const ehrlichkeitText = $('[data-key="info-box-ehrlichkeit-text"]').text().trim();
        markdown += '**Text:**\n';
        markdown += '"' + ehrlichkeitText + '"\n\n';
        markdown += '---\n\n';

        // Info-Box: Bevor du ein Tier holst
        markdown += '## Info-Box: Bevor du ein Tier holst, frag dich ehrlich\n\n';
        const fragenTitel = $('[data-key="info-box-bevor-du-ein-tier-holst-frag-dich-ehrlich"]').text().trim();
        markdown += '**Überschrift:** "💭 ' + fragenTitel + '"\n\n';
        markdown += '**Checkliste:**\n';

        // Extract list items
        $('[data-key="info-box-checkliste"] li').each(function() {
            markdown += '- ' + $(this).html().trim() + '\n';
        });

        markdown += '\n---\n\n';

        // Honesty Box
        markdown += '## Honesty Box: Die harte Wahrheit\n\n';
        markdown += '**Icon:** 💔\n';

        const honestyTitel = $('[data-key="honesty-box-die-harte-wahrheit"]').text().trim();
        markdown += '**Überschrift:** "' + honestyTitel + '"\n\n';

        const statistiken = $('[data-key="honesty-box-statistiken"]').html().replace(/<br\s*\/?>/gi, '\n').trim();
        markdown += '**Statistiken:**\n';
        markdown += '"' + statistiken + '"\n\n';

        const warum = $('[data-key="honesty-box-warum"]').html().replace(/<br\s*\/?>/gi, '\n').replace(/<\/?strong>/gi, '**').trim();
        markdown += '**Warum?**\n';
        markdown += '"' + warum + '"\n\n';

        const kernaussage = $('[data-key="honesty-box-kernaussage"]').text().trim();
        markdown += '**Kernaussage:**\n';
        markdown += '"' + kernaussage + '"\n\n';
        markdown += '---\n\n';

        // Einleitung: Die Wahrheit über Haustiere
        markdown += '## Einleitung: Die Wahrheit über Haustiere\n\n';
        const wahrheitTitel = $('[data-key="einleitung-die-wahrheit-uber-haustiere"]').text().trim();
        markdown += '**Sektions-Titel:** "' + wahrheitTitel + '"\n\n';

        const wahrheitText = $('[data-key="einleitung-wahrheit-text"]').text().trim();
        markdown += '**Einleitungstext:**\n';
        markdown += '"' + wahrheitText + '"\n\n';
        markdown += '---\n\n';

        // Hero Buttons (als einzelne Sections)
        const buttonTest = $('[data-key="button-test"]').text().trim();
        markdown += '## button-test\n';
        markdown += buttonTest + '\n\n';

        const buttonTestUrl = $('[data-editable-url="button-test-url"]').attr('href');
        markdown += '## button-test-url\n';
        markdown += buttonTestUrl + '\n\n';

        const buttonWissen = $('[data-key="button-wissen"]').text().trim();
        markdown += '## button-wissen\n';
        markdown += buttonWissen + '\n\n';

        const buttonWissenUrl = $('[data-editable-url="button-wissen-url"]').attr('href');
        markdown += '## button-wissen-url\n';
        markdown += buttonWissenUrl + '\n\n';

        // Honesty Box Button
        const buttonHonestyTest = $('[data-key="button-honesty-test"]').text().trim();
        markdown += '## button-honesty-test\n';
        markdown += buttonHonestyTest + '\n\n';

        const buttonHonestyTestUrl = $('[data-editable-url="button-honesty-test-url"]').attr('href');
        markdown += '## button-honesty-test-url\n';
        markdown += buttonHonestyTestUrl + '\n\n';

        // Quick Links (als einzelne Sections)
        const hundeTitel = $('[data-key="quicklink-hunde-titel"]').text().trim();
        markdown += '## quicklink-hunde-titel\n' + hundeTitel + '\n\n';
        const hundeText = $('[data-key="quicklink-hunde-text"]').text().trim();
        markdown += '## quicklink-hunde-text\n' + hundeText + '\n\n';
        const hundeUrl = $('[data-editable-url="quicklink-hunde-url"]').attr('href');
        markdown += '## quicklink-hunde-url\n' + hundeUrl + '\n\n';

        const katzenTitel = $('[data-key="quicklink-katzen-titel"]').text().trim();
        markdown += '## quicklink-katzen-titel\n' + katzenTitel + '\n\n';
        const katzenText = $('[data-key="quicklink-katzen-text"]').text().trim();
        markdown += '## quicklink-katzen-text\n' + katzenText + '\n\n';
        const katzenUrl = $('[data-editable-url="quicklink-katzen-url"]').attr('href');
        markdown += '## quicklink-katzen-url\n' + katzenUrl + '\n\n';

        const kleintiereTitel = $('[data-key="quicklink-kleintiere-titel"]').text().trim();
        markdown += '## quicklink-kleintiere-titel\n' + kleintiereTitel + '\n\n';
        const kleintiereText = $('[data-key="quicklink-kleintiere-text"]').text().trim();
        markdown += '## quicklink-kleintiere-text\n' + kleintiereText + '\n\n';
        const kleintiereUrl = $('[data-editable-url="quicklink-kleintiere-url"]').attr('href');
        markdown += '## quicklink-kleintiere-url\n' + kleintiereUrl + '\n\n';

        const exotenTitel = $('[data-key="quicklink-exoten-titel"]').text().trim();
        markdown += '## quicklink-exoten-titel\n' + exotenTitel + '\n\n';
        const exotenText = $('[data-key="quicklink-exoten-text"]').text().trim();
        markdown += '## quicklink-exoten-text\n' + exotenText + '\n\n';
        const exotenUrl = $('[data-editable-url="quicklink-exoten-url"]').attr('href');
        markdown += '## quicklink-exoten-url\n' + exotenUrl + '\n\n';

        const qualzuchtTitel = $('[data-key="quicklink-qualzucht-titel"]').text().trim();
        markdown += '## quicklink-qualzucht-titel\n' + qualzuchtTitel + '\n\n';
        const qualzuchtText = $('[data-key="quicklink-qualzucht-text"]').text().trim();
        markdown += '## quicklink-qualzucht-text\n' + qualzuchtText + '\n\n';
        const qualzuchtUrl = $('[data-editable-url="quicklink-qualzucht-url"]').attr('href');
        markdown += '## quicklink-qualzucht-url\n' + qualzuchtUrl + '\n\n';

        const adoptionTitel = $('[data-key="quicklink-adoption-titel"]').text().trim();
        markdown += '## quicklink-adoption-titel\n' + adoptionTitel + '\n\n';
        const adoptionText = $('[data-key="quicklink-adoption-text"]').text().trim();
        markdown += '## quicklink-adoption-text\n' + adoptionText + '\n\n';
        const adoptionUrl = $('[data-editable-url="quicklink-adoption-url"]').attr('href');
        markdown += '## quicklink-adoption-url\n' + adoptionUrl + '\n\n';

        return markdown;
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

})(jQuery);
