/**
 * Tierliebe Element Library v1.0
 *
 * Floating Panel mit allen wiederverwendbaren Elementen zum Einfügen auf jeder Seite.
 *
 * Features:
 * - Floating Panel mit Toggle Button
 * - Kategorien (Info-Boxes, Cards, Accordions, etc.)
 * - Click-to-Insert: Element wird am Ende der Seite eingefügt
 * - Auto-Key-Generation mit Collision-Detection
 * - Integration mit Element Duplicator (neue Elemente bekommen Buttons)
 *
 * Dependencies: jQuery, tierliebe-element-library-registry.js, tierliebe-element-duplicator.js
 *
 * @version 1.0.0
 * @date 2025-11-09
 */

(function($) {
    'use strict';

    // State
    let isLibraryOpen = false;
    let selectedCategory = 'info-boxes';

    /**
     * Initialisiert die Element Library
     * Wird aufgerufen wenn Edit Mode aktiviert wird
     */
    function initElementLibrary() {
        console.log('Element Library: Initialisierung gestartet');

        // Prüfe ob Registry verfügbar ist
        if (typeof window.TIERLIEBE_ELEMENT_REGISTRY === 'undefined') {
            console.error('Element Library: TIERLIEBE_ELEMENT_REGISTRY nicht gefunden!');
            return;
        }

        // Prüfe ob Panel schon existiert
        if ($('#tierliebe-element-library').length > 0) {
            console.log('Element Library: Panel existiert bereits');
            $('#tierliebe-element-library').show();
            return;
        }

        // Panel HTML erstellen
        const panelHTML = `
            <div id="tierliebe-element-library" class="element-library-panel">
                <div class="element-library-header">
                    <h3>Element Library</h3>
                    <button class="library-close-btn" title="Schließen">×</button>
                </div>

                <div class="element-library-categories">
                    ${renderCategories()}
                </div>

                <div class="element-library-content">
                    ${renderElements(selectedCategory)}
                </div>
            </div>

            <button id="tierliebe-library-toggle" class="library-toggle-btn" title="Element Library öffnen">
                📚
            </button>
        `;

        // Panel zum Body hinzufügen
        $('body').append(panelHTML);

        console.log('Element Library: Panel erstellt');
    }

    /**
     * Entfernt die Element Library
     * Wird aufgerufen wenn Edit Mode deaktiviert wird
     */
    function removeElementLibrary() {
        $('#tierliebe-element-library').hide();
        $('#tierliebe-library-toggle').hide();
        isLibraryOpen = false;
    }

    /**
     * Rendert die Kategorie-Buttons
     *
     * @return {string} HTML für Kategorie-Buttons
     */
    function renderCategories() {
        const registry = window.TIERLIEBE_ELEMENT_REGISTRY;
        const categories = {
            'info-boxes': 'Info-Boxen',
            'cards': 'Karten',
            'accordions': 'Accordions',
            'qualzucht': 'Qualzucht',
            'timeline': 'Timeline',
            'mythos': 'Mythos',
            'quick-links': 'Quick-Links',
            'special': 'Spezial'
        };

        let html = '';
        for (let key in categories) {
            if (registry.hasOwnProperty(key)) {
                const count = registry[key].length;
                const isActive = key === selectedCategory ? 'active' : '';
                html += `<button class="category-btn ${isActive}" data-category="${key}">
                    ${categories[key]} (${count})
                </button>`;
            }
        }
        return html;
    }

    /**
     * Rendert die Elemente einer Kategorie
     *
     * @param {string} category - Kategorie-Key
     * @return {string} HTML für Element-Grid
     */
    function renderElements(category) {
        const registry = window.TIERLIEBE_ELEMENT_REGISTRY;
        if (!registry.hasOwnProperty(category)) {
            return '<p class="library-empty">Keine Elemente in dieser Kategorie</p>';
        }

        const elements = registry[category];
        let html = '<div class="element-grid">';

        elements.forEach(element => {
            html += `
                <div class="element-card" data-element-id="${element.id}">
                    <div class="element-icon">${element.icon}</div>
                    <h4 class="element-name">${element.name}</h4>
                    <p class="element-description">${element.description}</p>
                    <button class="element-insert-btn" data-element-id="${element.id}">
                        Einfügen
                    </button>
                </div>
            `;
        });

        html += '</div>';
        return html;
    }

    /**
     * Toggle Library Panel öffnen/schließen
     */
    $(document).on('click', '#tierliebe-library-toggle', function() {
        const $panel = $('#tierliebe-element-library');

        if (isLibraryOpen) {
            $panel.removeClass('open');
            isLibraryOpen = false;
        } else {
            $panel.addClass('open');
            isLibraryOpen = true;
        }
    });

    /**
     * Close Button Handler
     */
    $(document).on('click', '.library-close-btn', function() {
        $('#tierliebe-element-library').removeClass('open');
        isLibraryOpen = false;
    });

    /**
     * Kategorie-Wechsel Handler
     */
    $(document).on('click', '.category-btn', function() {
        const category = $(this).data('category');

        // Update State
        selectedCategory = category;

        // Update UI
        $('.category-btn').removeClass('active');
        $(this).addClass('active');

        // Update Content
        $('.element-library-content').html(renderElements(category));

        console.log('Kategorie gewechselt:', category);
    });

    /**
     * Element einfügen Handler
     */
    $(document).on('click', '.element-insert-btn', function() {
        const elementId = $(this).data('element-id');

        // Finde Element in Registry
        const registry = window.TIERLIEBE_ELEMENT_REGISTRY;
        let elementTemplate = null;

        for (let category in registry) {
            const found = registry[category].find(el => el.id === elementId);
            if (found) {
                elementTemplate = found;
                break;
            }
        }

        if (!elementTemplate) {
            console.error('Element nicht gefunden:', elementId);
            return;
        }

        // Template verarbeiten
        insertElement(elementTemplate);
    });

    /**
     * Fügt ein Element am Ende der Haupt-Section ein
     *
     * @param {object} elementTemplate - Element aus Registry
     */
    function insertElement(elementTemplate) {
        console.log('Füge Element ein:', elementTemplate.name);

        // Generiere eindeutigen Base-Key
        const baseKey = generateBaseKey(elementTemplate.id);

        // Ersetze {key} Platzhalter im Template
        let html = elementTemplate.template.replace(/{key}/g, baseKey);

        // Erstelle jQuery-Element
        const $newElement = $(html);

        // Finde Ziel-Container (erste .section auf der Seite)
        const $targetSection = $('.section').first();

        if ($targetSection.length === 0) {
            console.error('Keine .section gefunden zum Einfügen!');
            if (typeof window.showMessage === 'function') {
                window.showMessage('⚠ Keine Section gefunden', 'warning');
            }
            return;
        }

        // Element einfügen
        $targetSection.append($newElement);

        // Visual Feedback
        $newElement.addClass('element-inserted');
        setTimeout(() => $newElement.removeClass('element-inserted'), 2000);

        // Initialisiere originalContents für neue Keys (falls definiert)
        if (typeof window.originalContents !== 'undefined') {
            $newElement.find('[data-key]').each(function() {
                const key = $(this).data('key');
                window.originalContents[key] = $(this).html();
            });
        }

        // Element Duplicator Buttons neu initialisieren
        if (typeof window.TierliebeElementDuplicator !== 'undefined') {
            window.TierliebeElementDuplicator.remove();
            window.TierliebeElementDuplicator.init();
        }

        // Success Message
        if (typeof window.showMessage === 'function') {
            window.showMessage('✓ ' + elementTemplate.name + ' eingefügt', 'success');
        }

        // Scroll zu neuem Element
        $('html, body').animate({
            scrollTop: $newElement.offset().top - 100
        }, 500);

        console.log('Element eingefügt mit Base-Key:', baseKey);
    }

    /**
     * Generiert einen eindeutigen Base-Key für ein neues Element
     *
     * @param {string} elementId - Element-ID aus Registry
     * @return {string} Eindeutiger Base-Key (z.B. 'rasse9', 'accordion12')
     */
    function generateBaseKey(elementId) {
        // Extrahiere Prefix aus Element-ID
        // Beispiel: 'info-box-standard' → 'info-box'
        //           'qualzucht-card' → 'qualzucht'
        //           'accordion-item-simple' → 'accordion'

        let prefix = elementId;

        // Spezial-Mappings für bekannte Element-Typen
        const prefixMap = {
            'info-box-standard': 'info',
            'info-box-info': 'info',
            'info-box-warning': 'warn',
            'info-box-love': 'love',
            'info-box-mint': 'mint',
            'info-box-coral': 'coral',
            'info-box-lavender': 'lavender',
            'info-box-peach': 'peach',
            'info-box-liste': 'liste',
            'card-mint': 'card',
            'card-peach': 'card',
            'card-lavender': 'card',
            'accordion-item-simple': 'accordion',
            'accordion-item-with-infobox': 'accordion',
            'qualzucht-card': 'rasse',
            'timeline-item': 'schritt',
            'mythos-card': 'mythos',
            'quick-link-card': 'link',
            'honesty-box': 'honesty',
            'section-header': 'section'
        };

        if (prefixMap.hasOwnProperty(elementId)) {
            prefix = prefixMap[elementId];
        }

        // Finde nächste freie Nummer
        let index = 1;
        let baseKey;
        const maxAttempts = 100;

        do {
            baseKey = prefix + index;
            index++;

            if (index > maxAttempts) {
                console.error('Could not generate unique base key after', maxAttempts, 'attempts');
                return prefix + '-' + Date.now();
            }
        } while (baseKeyExists(baseKey));

        return baseKey;
    }

    /**
     * Prüft ob ein Base-Key bereits existiert
     * Base-Key = alle data-keys die mit diesem Prefix beginnen
     *
     * @param {string} baseKey - Zu prüfender Base-Key (z.B. 'rasse1')
     * @return {boolean} True wenn Base-Key bereits verwendet wird
     */
    function baseKeyExists(baseKey) {
        // Suche nach data-keys die mit baseKey beginnen
        // Beispiel: baseKey='rasse1' → suche nach 'rasse1-*'
        const pattern = '^' + baseKey + '-';
        const regex = new RegExp(pattern);

        // Prüfe in originalContents
        if (typeof window.originalContents !== 'undefined') {
            for (let key in window.originalContents) {
                if (regex.test(key)) {
                    return true;
                }
            }
        }

        // Prüfe im DOM
        const $allKeys = $('[data-key]');
        for (let i = 0; i < $allKeys.length; i++) {
            const key = $($allKeys[i]).data('key');
            if (regex.test(key)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Event Listener für Edit Mode
     */
    $(document).on('editModeEnabled', function() {
        console.log('Element Library: Edit Mode aktiviert');
        initElementLibrary();
    });

    $(document).on('editModeDisabled', function() {
        console.log('Element Library: Edit Mode deaktiviert');
        removeElementLibrary();
    });

    // Überwache Edit-Button Klicks (tierliebe-edit-v2.js)
    $(document).on('click', '.tierliebe-edit-btn', function() {
        setTimeout(function() {
            if ($('body').hasClass('edit-mode')) {
                console.log('Element Library: Edit Mode aktiviert (via button click)');
                initElementLibrary();
            } else {
                console.log('Element Library: Edit Mode deaktiviert (via button click)');
                removeElementLibrary();
            }
        }, 100);
    });

    // Falls Edit Mode schon aktiv ist beim Laden
    $(document).ready(function() {
        setTimeout(function() {
            if ($('body').hasClass('edit-mode')) {
                console.log('Element Library: Edit Mode bereits aktiv beim Laden');
                initElementLibrary();
            }
        }, 500);
    });

    // Public API
    window.TierliebeElementLibrary = {
        version: '1.0.0',
        init: initElementLibrary,
        remove: removeElementLibrary,
        insertElement: insertElement
    };

    console.log('Tierliebe Element Library v1.0 geladen');

})(jQuery);