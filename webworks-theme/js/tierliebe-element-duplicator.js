/**
 * Tierliebe Element Duplicator v1.0
 *
 * Ermöglicht das Duplizieren, Löschen und Verschieben (Hoch/Runter) von Sektionen
 * im Tierliebe Frontend-Editor.
 *
 * Features:
 * - Duplicate Button (📋) - Sektion klonen mit Auto-Key-Generation
 * - Delete Button (×) - Sektion löschen ohne Confirmation
 * - Move Up Button (↑) - Sektion eine Position nach oben
 * - Move Down Button (↓) - Sektion eine Position nach unten
 *
 * Dependencies: jQuery, tierliebe-edit-v2.js
 *
 * @version 1.0.0
 * @date 2025-11-09
 */

(function($) {
    'use strict';

    // Selector für alle wiederholbaren Elemente die bearbeitet werden können
    const EDITABLE_SECTIONS = '.qualzucht-card, .accordion-item, .info-box, .info-card, .timeline-item, .mythos-card, .quick-link-card, .card, .glossar-item, .honesty-box, .calculation-box';

    /**
     * Initialisiert die Element Duplicator Buttons
     * Wird aufgerufen wenn Edit Mode aktiviert wird
     */
    function initElementDuplicator() {
        console.log('initElementDuplicator: Starte Initialisierung');
        const $elements = $(EDITABLE_SECTIONS);
        console.log('Gefundene Elemente:', $elements.length);

        $elements.each(function(index, element) {
            const $element = $(element);

            // Prüfe ob Buttons schon existieren
            if ($element.find('.element-control-buttons').length > 0) {
                console.log('Element', index, 'hat bereits Buttons, skip');
                return; // Skip, bereits initialisiert
            }

            console.log('Füge Buttons zu Element', index, 'hinzu:', $element[0].className);

            // Button-Container erstellen
            const $buttonContainer = $('<div class="element-control-buttons"></div>');

            // Finde Position in ALLEN sortierbaren Elementen auf der Seite (nicht nur Siblings!)
            const currentIndex = $elements.index($element);

            // Move Up Button (nur wenn nicht erstes Element auf der ganzen Seite)
            if (currentIndex > 0) {
                $buttonContainer.append('<button class="element-btn element-move-up" title="Nach oben verschieben">↑</button>');
            }

            // Move Down Button (nur wenn nicht letztes Element auf der ganzen Seite)
            if (currentIndex < $elements.length - 1) {
                $buttonContainer.append('<button class="element-btn element-move-down" title="Nach unten verschieben">↓</button>');
            }

            // Duplicate Button
            $buttonContainer.append('<button class="element-btn element-duplicate" title="Duplizieren">📋</button>');

            // Delete Button
            $buttonContainer.append('<button class="element-btn element-delete" title="Löschen">×</button>');

            // Buttons zum Element hinzufügen
            $element.css('position', 'relative').prepend($buttonContainer);
        });
    }

    /**
     * Entfernt alle Element Duplicator Buttons
     * Wird aufgerufen wenn Edit Mode deaktiviert wird
     */
    function removeElementDuplicator() {
        $('.element-control-buttons').remove();
        $(EDITABLE_SECTIONS).css('position', '');
    }

    /**
     * Verhindere dass Clicks auf Button-Container an Parent weitergegeben werden
     */
    $(document).on('click', '.element-control-buttons', function(e) {
        e.stopPropagation();
    });

    /**
     * Move Up Handler - Verschiebt Element eine Position nach oben
     */
    $(document).on('click', '.element-move-up', function(e) {
        e.stopPropagation();
        e.preventDefault();

        const $element = $(this).closest(EDITABLE_SECTIONS);

        // Finde alle sortierbaren Elemente auf der Seite (unabhängig von Container-Hierarchie)
        const $allElements = $(EDITABLE_SECTIONS).not('.element-control-buttons *');
        const currentIndex = $allElements.index($element);

        if (currentIndex === 0) {
            console.warn('Element ist bereits an erster Position');
            return;
        }

        const $prev = $allElements.eq(currentIndex - 1);

        // Swap mit vorherigem Element
        swapElements($element, $prev, 'up');
    });

    /**
     * Move Down Handler - Verschiebt Element eine Position nach unten
     */
    $(document).on('click', '.element-move-down', function(e) {
        e.stopPropagation();
        e.preventDefault();

        const $element = $(this).closest(EDITABLE_SECTIONS);

        // Finde alle sortierbaren Elemente auf der Seite (unabhängig von Container-Hierarchie)
        const $allElements = $(EDITABLE_SECTIONS).not('.element-control-buttons *');
        const currentIndex = $allElements.index($element);

        if (currentIndex === $allElements.length - 1) {
            console.warn('Element ist bereits an letzter Position');
            return;
        }

        const $next = $allElements.eq(currentIndex + 1);

        // Swap mit nächstem Element
        swapElements($element, $next, 'down');
    });

    /**
     * Duplicate Handler - Dupliziert Element mit neuen Keys
     */
    $(document).on('click', '.element-duplicate', function(e) {
        e.stopPropagation();
        e.preventDefault();

        const $original = $(this).closest(EDITABLE_SECTIONS);

        // Clone erstellen (ohne Event Handlers, die werden neu initialisiert)
        const $clone = $original.clone(false);

        // Keys in Clone aktualisieren
        const keyMapping = {};
        $clone.find('[data-key]').each(function() {
            const $field = $(this);
            const oldKey = $field.data('key');
            const newKey = generateUniqueKey(oldKey);

            $field.attr('data-key', newKey);
            keyMapping[oldKey] = newKey;

            // In originalContents speichern (falls definiert)
            if (typeof window.originalContents !== 'undefined') {
                window.originalContents[newKey] = $field.html();
            }
        });

        // Image Meta Keys aktualisieren
        $clone.find('[data-image-meta]').each(function() {
            const $img = $(this);
            const oldMetaKey = $img.data('image-meta');
            if (keyMapping[oldMetaKey]) {
                $img.attr('data-image-meta', keyMapping[oldMetaKey]);
            }
        });

        // Control Buttons entfernen (werden neu initialisiert)
        $clone.find('.element-control-buttons').remove();

        // Visual Feedback - Clone markieren
        $clone.addClass('element-cloned');
        setTimeout(() => $clone.removeClass('element-cloned'), 2000);

        // Clone nach Original einfügen
        $original.after($clone);

        // Buttons neu initialisieren für alle Elemente
        removeElementDuplicator();
        initElementDuplicator();

        // Undo Support (falls verfügbar)
        if (typeof window.addToUndoStack === 'function') {
            window.addToUndoStack({
                type: 'duplicate-element',
                element: $clone,
                keys: Object.values(keyMapping),
                timestamp: Date.now()
            });
        }

        // Success Message
        if (typeof window.showMessage === 'function') {
            window.showMessage('✓ Element dupliziert', 'success');
        }

        console.log('Element dupliziert:', keyMapping);
    });

    /**
     * Delete Handler - Löscht Element ohne Confirmation
     */
    $(document).on('click', '.element-delete', function(e) {
        e.stopPropagation();
        e.preventDefault();

        const $element = $(this).closest(EDITABLE_SECTIONS);
        const $parent = $element.parent();
        const $siblings = $parent.children(EDITABLE_SECTIONS);

        // Mindestens 1 Element muss bleiben
        if ($siblings.length <= 1) {
            if (typeof window.showMessage === 'function') {
                window.showMessage('⚠ Letztes Element kann nicht gelöscht werden', 'warning');
            }
            return;
        }

        // Keys für Undo sammeln
        const deletedKeys = [];
        $element.find('[data-key]').each(function() {
            deletedKeys.push($(this).data('key'));
        });

        // Undo Support (falls verfügbar)
        if (typeof window.addToUndoStack === 'function') {
            window.addToUndoStack({
                type: 'delete-element',
                element: $element.clone(true),
                position: $siblings.index($element),
                parent: $parent,
                keys: deletedKeys,
                timestamp: Date.now()
            });
        }

        // Element mit Animation entfernen
        $element.addClass('element-deleting');
        setTimeout(() => {
            $element.remove();

            // Buttons neu initialisieren
            removeElementDuplicator();
            initElementDuplicator();

            // Success Message
            if (typeof window.showMessage === 'function') {
                window.showMessage('✓ Element gelöscht', 'success');
            }
        }, 300);

        console.log('Element gelöscht, Keys:', deletedKeys);
    });

    /**
     * Swapped zwei Elemente und deren Keys
     *
     * @param {jQuery} $element1 - Erstes Element
     * @param {jQuery} $element2 - Zweites Element
     * @param {string} direction - 'up' oder 'down' für Animation
     */
    function swapElements($element1, $element2, direction) {
        // Keys von beiden Elementen sammeln
        const keys1 = [];
        const keys2 = [];
        const values1 = {};
        const values2 = {};

        $element1.find('[data-key]').each(function() {
            const key = $(this).data('key');
            keys1.push(key);
            values1[key] = $(this).html();
        });

        $element2.find('[data-key]').each(function() {
            const key = $(this).data('key');
            keys2.push(key);
            values2[key] = $(this).html();
        });

        // Animation starten
        $element1.addClass(direction === 'up' ? 'element-moving-up' : 'element-moving-down');
        $element2.addClass(direction === 'up' ? 'element-moving-down' : 'element-moving-up');

        setTimeout(() => {
            // DOM-Reihenfolge ändern
            if (direction === 'up') {
                $element1.insertBefore($element2);
            } else {
                $element1.insertAfter($element2);
            }

            // Keys in originalContents swappen (falls definiert)
            if (typeof window.originalContents !== 'undefined') {
                keys1.forEach(key => {
                    if (values2[key] !== undefined) {
                        window.originalContents[key] = values2[key];
                    }
                });
                keys2.forEach(key => {
                    if (values1[key] !== undefined) {
                        window.originalContents[key] = values1[key];
                    }
                });
            }

            // Animation beenden
            $element1.removeClass('element-moving-up element-moving-down');
            $element2.removeClass('element-moving-up element-moving-down');

            // Buttons neu initialisieren (first/last changed)
            removeElementDuplicator();
            initElementDuplicator();

            // Undo Support (falls verfügbar)
            if (typeof window.addToUndoStack === 'function') {
                window.addToUndoStack({
                    type: 'swap-elements',
                    element1: $element1,
                    element2: $element2,
                    keys1: keys1,
                    keys2: keys2,
                    direction: direction,
                    timestamp: Date.now()
                });
            }

            // Success Message
            if (typeof window.showMessage === 'function') {
                window.showMessage('✓ Element verschoben', 'success');
            }

            console.log('Elemente getauscht:', {keys1, keys2});
        }, 300);
    }

    /**
     * Generiert einen eindeutigen Key basierend auf einem Base-Key
     * Beispiel: rasse1-titel → rasse9-titel (wenn rasse2-8 schon existieren)
     *
     * @param {string} baseKey - Original Key
     * @return {string} Neuer eindeutiger Key
     */
    function generateUniqueKey(baseKey) {
        // Pattern: prefix + number + suffix
        // Beispiel: "rasse1-titel" → prefix="rasse", number=1, suffix="-titel"
        const match = baseKey.match(/^([a-zA-Z_-]+?)(\d+)(-.*)?$/);

        if (!match) {
            // Kein Pattern gefunden, füge "-2" hinzu
            return baseKey + '-copy';
        }

        const prefix = match[1]; // "rasse"
        const suffix = match[3] || ''; // "-titel"

        // Finde nächste freie Nummer
        let index = 1;
        let newKey;
        const maxAttempts = 100; // Verhindert Endlosschleife

        do {
            index++;
            newKey = prefix + index + suffix;

            if (index > maxAttempts) {
                console.error('Could not generate unique key after', maxAttempts, 'attempts');
                return baseKey + '-copy-' + Date.now();
            }
        } while (keyExists(newKey));

        return newKey;
    }

    /**
     * Prüft ob ein Key bereits existiert
     *
     * @param {string} key - Zu prüfender Key
     * @return {boolean} True wenn Key existiert
     */
    function keyExists(key) {
        // Prüfe in originalContents (falls definiert)
        if (typeof window.originalContents !== 'undefined' && window.originalContents.hasOwnProperty(key)) {
            return true;
        }

        // Prüfe im DOM
        return $('[data-key="' + key + '"]').length > 0;
    }

    /**
     * Event Listener für Edit Mode
     * Da tierliebe-edit-v2.js keine Custom Events triggert, überwachen wir den Edit Button direkt
     */
    $(document).on('editModeEnabled', function() {
        console.log('Element Duplicator: Edit Mode aktiviert');
        initElementDuplicator();
    });

    $(document).on('editModeDisabled', function() {
        console.log('Element Duplicator: Edit Mode deaktiviert');
        removeElementDuplicator();
    });

    // Überwache Edit-Button Klicks (tierliebe-edit-v2.js)
    $(document).on('click', '.tierliebe-edit-btn', function() {
        setTimeout(function() {
            if ($('body').hasClass('edit-mode')) {
                console.log('Element Duplicator: Edit Mode aktiviert (via button click)');
                initElementDuplicator();
            } else {
                console.log('Element Duplicator: Edit Mode deaktiviert (via button click)');
                removeElementDuplicator();
            }
        }, 100);
    });

    // Falls Edit Mode schon aktiv ist beim Laden
    $(document).ready(function() {
        setTimeout(function() {
            if ($('body').hasClass('edit-mode')) {
                console.log('Element Duplicator: Edit Mode bereits aktiv beim Laden');
                initElementDuplicator();
            }
        }, 500);
    });

    // Public API für externe Verwendung
    window.TierliebeElementDuplicator = {
        version: '1.0.0',
        init: initElementDuplicator,
        remove: removeElementDuplicator
    };

    console.log('Tierliebe Element Duplicator v1.0 geladen');

})(jQuery);
