/**
 * Tierliebe Edit v3.5.0 - Lightweight front-end editor
 * Features: toggle edit, text/image edit, save, undo, revision restore, links
 * v3.3.0: Quote sanitization to prevent JSON corruption (REMOVED in v3.5.0)
 * v3.4.0: Line break handling (Enter = <br>, newlines normalized)
 * v3.5.0: Removed quote sanitization workaround - proper JSON handling via intelligent stripslashes
 */
(function($) {
    'use strict';

    // Safety: only run where the localization exists
    if (!window.tierliebe_edit || !tierliebe_edit.ajax_url) return;

    let isEditMode = false;
    let originalContents = {};
    let savedSelection = null;

    // Detect mobile for better UX
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || window.innerWidth <= 768;

    $(document).ready(function() {
        const linkBtnTitle = isMobile ? "Link einfügen" : "Link einfügen (Ctrl+K)";

        // UI buttons
        $('body').append(`
            <button class="tierliebe-edit-btn" title="Texte bearbeiten" aria-label="Bearbeiten">✏️</button>
            <button class="tierliebe-link-btn" title="${linkBtnTitle}" aria-label="Link einfügen">🔗</button>
            <button class="tierliebe-save-btn" title="Änderungen speichern" aria-label="Speichern">💾</button>
            <button class="tierliebe-revisions-btn" title="Revision auswählen" aria-label="Revision auswählen">🕓</button>
            <button class="tierliebe-undo-btn" title="Letzte Änderung zurücknehmen" aria-label="Letzte Änderung zurücknehmen">↩️</button>
        `);

        $('.tierliebe-edit-btn').on('click', toggleEditMode);
        $('.tierliebe-link-btn').on('click', insertLink);
        $('.tierliebe-save-btn').on('click', saveChanges);
        $('.tierliebe-undo-btn').on('click', undoChanges);
        $('.tierliebe-revisions-btn').on('click', showRevisionPicker);

        // Initial state
        storeOriginalContents();
        $('.editable').attr('contenteditable', 'false');
        $('.tierliebe-revisions-btn').prop('disabled', true);
        $('.tierliebe-link-btn').hide();

        // Ctrl/Cmd + S = Save, Ctrl/Cmd + K = Link
        $(document).on('keydown', function(e) {
            if (isEditMode && (e.ctrlKey || e.metaKey)) {
                if (e.key === 's') {
                    e.preventDefault();
                    saveChanges();
                } else if (e.key === 'k') {
                    e.preventDefault();
                    insertLink();
                }
            }
        });
    });

    function normalize(html) {
        if (!html) return '';

        let normalized = html;

        // Step 1: Normalize Windows/Mac line endings
        normalized = normalized.replace(/\r\n/g, '\n');
        normalized = normalized.replace(/\r/g, '\n');

        // Step 2: Handle browser DIV behavior (Enter key creates DIVs)
        // Browser DIV = 1 paragraph break, not 2
        // Pattern: </div><div> = transition between paragraphs = single <br>
        normalized = normalized.replace(/<\/div>\s*<div>/gi, '<br>');
        // Opening <div> = start of new line = single <br>
        normalized = normalized.replace(/<div>/gi, '<br>');
        // Closing </div> = end of block = nothing
        normalized = normalized.replace(/<\/div>/gi, '');

        // Step 3: Convert newlines to appropriate breaks
        // Double newline = paragraph (Absatz)
        normalized = normalized.replace(/\n\s*\n/g, '<br><br>');
        // Single newline = line break (Umbruch)
        normalized = normalized.replace(/\n/g, '<br>');

        // Step 4: Normalize all BR variants to consistent <br>
        normalized = normalized.replace(/<br\s*\/?>/gi, '<br>');

        // Step 5: Clean up - max 2 consecutive BRs (1 paragraph worth)
        normalized = normalized.replace(/(<br>){3,}/g, '<br><br>');

        // Step 6: Remove leading BRs (artifact from DIV conversion)
        normalized = normalized.replace(/^(<br>)+/g, '');

        return normalized.trim();
    }

    function decodeHtmlEntities(text) {
        // Decode HTML entities (&#8220; → ", &#8222; → ", etc.)
        const textarea = document.createElement('textarea');
        textarea.innerHTML = text;
        return textarea.value;
    }

    function storeOriginalContents() {
        $('.editable').each(function() {
            const key = $(this).data('key');
            if (key) {
                // Decode HTML entities to ensure consistent comparison
                const rawHtml = $(this).html();
                const decoded = decodeHtmlEntities(rawHtml);
                originalContents[key] = normalize(decoded);
            }
        });

        $('.editable-image').each(function() {
            const metaKey = $(this).data('image-meta');
            const $img = $(this).find('img');
            if (metaKey && $img.length) {
                const attachmentId = $img.data('attachment-id');
                if (attachmentId) originalContents[metaKey] = attachmentId;
            }
        });
    }

    function toggleEditMode() {
        isEditMode = !isEditMode;

        if (isEditMode) {
            $('body').addClass('edit-mode');
            $('.tierliebe-edit-btn').addClass('active');
            $('.tierliebe-link-btn').show();
            $('.tierliebe-revisions-btn').prop('disabled', false);
            // Different indicator text for mobile vs desktop
            const indicatorText = isMobile
                ? 'Bearbeitungsmodus aktiv'
                : 'Bearbeitungsmodus aktiv (Ctrl+S = Speichern, Ctrl+K = Link)';
            $('body').append(`<div class="edit-mode-indicator">${indicatorText}</div>`);
            $('.editable').attr('contenteditable', 'true');

            $('a').on('click.editmode', function(e) { e.preventDefault(); });
            $('.editable-image').on('click.editmode', function(e) {
                e.preventDefault();
                openMediaLibrary($(this));
            });
        } else {
            $('body').removeClass('edit-mode');
            $('.tierliebe-edit-btn').removeClass('active');
            $('.tierliebe-link-btn').hide();
            $('.tierliebe-revisions-btn').prop('disabled', true);
            $('.edit-mode-indicator').remove();
            $('.editable').attr('contenteditable', 'false');
            $('a').off('click.editmode');
            $('.editable-image').off('click.editmode');
        }
    }

    function insertLink() {
        if (!isEditMode) return;

        saveSelection();
        const selection = window.getSelection();

        // Check if we clicked on an existing link
        let existingLink = null;
        let existingUrl = '';
        if (selection.rangeCount > 0) {
            const range = selection.getRangeAt(0);
            const container = range.commonAncestorContainer;
            const parent = container.nodeType === 3 ? container.parentNode : container;
            if (parent.tagName === 'A') {
                existingLink = parent;
                existingUrl = existingLink.getAttribute('href') || '';
            }
        }

        const selectedText = selection.toString().trim();

        if (!existingLink && !selectedText) {
            showMessage('Bitte Text markieren um einen Link einzufügen.', 'info');
            return;
        }

        // Prompt for URL
        const promptText = existingLink
            ? 'Link bearbeiten (leer lassen = Link entfernen):'
            : 'URL eingeben:';
        const url = prompt(promptText, existingUrl);

        if (url === null) return; // Cancelled

        // Remove link if empty URL
        if (url.trim() === '' && existingLink) {
            const textNode = document.createTextNode(existingLink.textContent);
            existingLink.parentNode.replaceChild(textNode, existingLink);
            showMessage('Link entfernt.', 'success');
            return;
        }

        if (url.trim() === '') {
            showMessage('URL darf nicht leer sein.', 'error');
            return;
        }

        // Validate URL
        let validUrl = url.trim();
        if (!/^https?:\/\//i.test(validUrl)) {
            validUrl = 'https://' + validUrl;
        }

        // Edit existing link
        if (existingLink) {
            existingLink.setAttribute('href', validUrl);

            // Add target="_blank" for external links
            const isExternal = !validUrl.includes(window.location.hostname);
            if (isExternal) {
                existingLink.setAttribute('target', '_blank');
                existingLink.setAttribute('rel', 'noopener noreferrer');
            } else {
                existingLink.removeAttribute('target');
                existingLink.removeAttribute('rel');
            }

            showMessage('Link aktualisiert.', 'success');
            return;
        }

        // Create new link
        restoreSelection();

        try {
            const range = selection.getRangeAt(0);
            const link = document.createElement('a');
            link.href = validUrl;

            // Add target="_blank" for external links
            const isExternal = !validUrl.includes(window.location.hostname);
            if (isExternal) {
                link.target = '_blank';
                link.rel = 'noopener noreferrer';
            }

            link.textContent = selectedText;

            range.deleteContents();
            range.insertNode(link);

            // Move cursor after link
            range.setStartAfter(link);
            range.setEndAfter(link);
            selection.removeAllRanges();
            selection.addRange(range);

            showMessage('Link eingefügt.', 'success');
        } catch (err) {
            showMessage('Fehler beim Einfügen: ' + err.message, 'error');
        }
    }

    function saveSelection() {
        const selection = window.getSelection();
        if (selection.rangeCount > 0) {
            savedSelection = selection.getRangeAt(0).cloneRange();
        }
    }

    function restoreSelection() {
        const selection = window.getSelection();
        if (savedSelection) {
            selection.removeAllRanges();
            selection.addRange(savedSelection);
        }
    }

    function openMediaLibrary($container) {
        const metaKey = $container.data('image-meta');
        if (!metaKey) return;
        if (typeof wp === 'undefined' || !wp.media) {
            showMessage('Medien-Bibliothek nicht verfügbar.', 'error');
            return;
        }

        const uploader = wp.media({
            title: 'Bild auswählen',
            button: { text: 'Bild verwenden' },
            multiple: false
        });

        uploader.on('select', function() {
            const attachment = uploader.state().get('selection').first().toJSON();
            const imgUrl = attachment.sizes && attachment.sizes.large ? attachment.sizes.large.url : attachment.url;
            $container.find('img').attr('src', imgUrl).data('attachment-id', attachment.id);
            originalContents[metaKey] = 'CHANGED:' + attachment.id;
            showMessage('Bild ausgewählt - klicke Speichern.', 'info');
        });

        uploader.open();
    }

    function saveChanges() {
        const changed = {};
        const footerChanged = {};
        let changeCount = 0;
        let footerChangeCount = 0;

        $('.editable').each(function() {
            const key = $(this).data('key');
            if (!key) return;

            // Check if this editable is inside footer
            const isInFooter = $(this).closest('.footer[data-edit-context="footer"]').length > 0;

            // Decode HTML entities first (&#8220; → "), then normalize
            const rawHtml = $(this).html();
            const decoded = decodeHtmlEntities(rawHtml);
            const current = normalize(decoded);

            if (originalContents[key] !== current) {
                if (isInFooter) {
                    footerChanged[key] = current;
                    footerChangeCount++;
                } else {
                    changed[key] = current;
                    changeCount++;
                }
            }
        });

        $('.editable-image').each(function() {
            const metaKey = $(this).data('image-meta');
            if (!metaKey) return;
            const original = originalContents[metaKey];
            if (original && original.toString().startsWith('CHANGED:')) {
                changed[metaKey] = original.replace('CHANGED:', '');
                changeCount++;
            }
        });

        const totalChanges = changeCount + footerChangeCount;
        if (totalChanges === 0) {
            showMessage('Keine Änderungen zum Speichern.', 'info');
            return;
        }

        $('.tierliebe-save-btn').prop('disabled', true).text('💾 Speichere...');

        // Save footer content if changed
        if (footerChangeCount > 0) {
            $.ajax({
                url: tierliebe_edit.ajax_url,
                type: 'POST',
                data: {
                    action: 'tierliebe_save_footer',
                    nonce: tierliebe_edit.nonce,
                    footer_content: footerChanged
                },
                success: function(response) {
                    if (response.success) {
                        showMessage('Footer gespeichert (global auf allen Seiten): ' + footerChangeCount + ' Änderung(en).', 'success');
                    } else {
                        showMessage('Footer-Fehler: ' + response.data, 'error');
                    }
                },
                error: function(_, __, err) {
                    showMessage('Footer AJAX-Fehler: ' + err, 'error');
                }
            });
        }

        // Save page content if changed
        if (changeCount > 0) {
            const fullContent = Object.assign({}, originalContents, changed);
            Object.keys(fullContent).forEach(function(k) {
                const val = fullContent[k];
                if (val && val.toString().startsWith('CHANGED:')) {
                    fullContent[k] = val.replace('CHANGED:', '');
                }
            });

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
                        showMessage('Seite gespeichert: ' + changeCount + ' Änderung(en).', 'success');
                        storeOriginalContents();
                        toggleEditMode();
                    } else {
                        showMessage('Fehler: ' + response.data, 'error');
                    }
                },
                error: function(_, __, err) {
                    showMessage('AJAX-Fehler: ' + err, 'error');
                },
                complete: function() {
                    $('.tierliebe-save-btn').prop('disabled', false).text('💾');
                }
            });
        } else {
            // Only footer changed, no page content
            $('.tierliebe-save-btn').prop('disabled', false).text('💾');
            storeOriginalContents();
            toggleEditMode();
        }
    }

    function undoChanges() {
        if (!confirm('Letzte Änderung rückgängig machen?\nDies stellt die vorherige Version wieder her.')) return;

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
                    showMessage('Wiederhergestellt - Seite lädt neu...', 'success');
                    setTimeout(function() { location.reload(); }, 800);
                } else {
                    showMessage('Fehler: ' + response.data, 'error');
                    $('.tierliebe-undo-btn').prop('disabled', false).css('opacity', '1');
                }
            },
            error: function(_, __, err) {
                showMessage('AJAX-Fehler: ' + err, 'error');
                $('.tierliebe-undo-btn').prop('disabled', false).css('opacity', '1');
            }
        });
    }

    function showRevisionPicker() {
        // Visual feedback immediately
        showMessage('Revisionen werden geladen...', 'info');
        $('.tierliebe-revisions-btn').prop('disabled', true).text('Lade...');

        $.ajax({
            url: tierliebe_edit.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'tierliebe_list_revisions',
                nonce: tierliebe_edit.nonce,
                page_id: tierliebe_edit.page_id,
                limit: 10
            },
            success: function(response) {
                try { console.log('revisions response', response); } catch (e) {}
                if (!response.success || !response.data || !response.data.length) {
                    showMessage('Keine Revisionen gefunden.', 'error');
                    return;
                }
                renderRevisionPicker(response.data);
            },
            error: function(xhr, status, err) {
                showMessage('Revisionen konnten nicht geladen werden: ' + status + ' / ' + err, 'error');
                try { console.error('revisions xhr', xhr.responseText); } catch (e) {}
            },
            complete: function() {
                $('.tierliebe-revisions-btn').prop('disabled', false).text('Revision');
            }
        });
    }

    function renderRevisionPicker(list) {
        $('#tierliebe-revision-modal').remove();

        const items = list.map(function(item) {
            return `<button class="rev-item" data-rev="${item.id}">${item.date} · ${item.user}</button>`;
        }).join('');

        const modal = `
            <div id="tierliebe-revision-modal">
                <div class="rev-box">
                    <h4>Revision wählen</h4>
                    <div class="rev-list">${items}</div>
                    <button class="rev-close">Schließen</button>
                </div>
            </div>`;

        $('body').append(modal);

        $('#tierliebe-revision-modal .rev-close').on('click', function() {
            $('#tierliebe-revision-modal').remove();
        });

        $('#tierliebe-revision-modal .rev-item').on('click', function() {
            const revId = $(this).data('rev');
            if (!revId) return;
            if (!confirm('Revision ' + $(this).text() + ' wiederherstellen?')) return;
            restoreRevision(revId);
        });
    }

    function restoreRevision(revisionId) {
        $('#tierliebe-revision-modal').remove();
        $('.tierliebe-revisions-btn').prop('disabled', true).text('Stelle wieder her...');

        $.ajax({
            url: tierliebe_edit.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'tierliebe_restore_revision',
                nonce: tierliebe_edit.nonce,
                page_id: tierliebe_edit.page_id,
                revision_id: revisionId
            },
            success: function(response) {
                try { console.log('restore response', response); } catch (e) {}
                if (response.success) {
                    showMessage('Revision wiederhergestellt - Seite lädt neu...', 'success');
                    setTimeout(function() { location.reload(); }, 800);
                } else {
                    showMessage('Fehler: ' + response.data, 'error');
                }
            },
            error: function(xhr, status, err) {
                showMessage('AJAX-Fehler: ' + status + ' / ' + err, 'error');
                try { console.error('restore xhr', xhr.responseText); } catch (e) {}
            },
            complete: function() {
                $('.tierliebe-revisions-btn').prop('disabled', false).text('Revision');
            }
        });
    }

    function showMessage(text, type) {
        const escaped = $('<div>').text(text).html();
        const $msg = $('<div class="tierliebe-message ' + type + '">' + escaped + '</div>');
        $('body').append($msg);
        setTimeout(function() { $msg.fadeOut(function() { $(this).remove(); }); }, 3000);
    }
})(jQuery);
