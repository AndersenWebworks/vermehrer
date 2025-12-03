# Tierliebe Editor - Enhancement Roadmap

## Status: Phase 1 ✅ ABGESCHLOSSEN (v3.0.0)

### ✅ Aktuell implementiert (v3.0.0)
- **v2.0 Features:**
  - Inline-Editing aller Felder
  - Formatting Toolbar (Bold, Italic, Underline, Links, Listen)
  - URL-Editing für Buttons/Links (Rechtsklick)
  - WordPress Revisionen Support
  - Whitespace-Normalisierung beim Speichern
  - Link-Navigation Prevention im Edit-Mode

- **v3.0 Phase 1 Features (IMPLEMENTIERT):**
  - ✅ Feature 1: Undo/Redo System (Ctrl+Z/Y, max 50 Actions)
  - ✅ Feature 4: Extended Keyboard Shortcuts (Ctrl+E, Tab, Shift+Tab, Esc)
  - ✅ Feature 7: Smart Highlighting (Orange pulsing outline für geänderte Felder)
  - ✅ Feature 18: Auto-Save Draft (alle 30s zu localStorage)
  - ✅ Feature 20b: Media Library Integration (Klick auf Bild → WP Media Library)

---

## 🚀 Phase 1: Critical UX Improvements ✅ ABGESCHLOSSEN

### 1. Undo/Redo System
**Feature:** Ctrl+Z/Y Support
**Implementation:**
```javascript
let undoStack = [];
let redoStack = [];

function pushToUndo(key, oldValue, newValue) {
    undoStack.push({key, oldValue, newValue, timestamp: Date.now()});
    redoStack = []; // Clear redo on new action
}

function undo() {
    if (undoStack.length === 0) return;
    const action = undoStack.pop();
    $('.editable[data-key="' + action.key + '"]').html(action.oldValue);
    redoStack.push(action);
}

function redo() {
    if (redoStack.length === 0) return;
    const action = redoStack.pop();
    $('.editable[data-key="' + action.key + '"]').html(action.newValue);
    undoStack.push(action);
}
```

### 4. Extended Keyboard Shortcuts
**Feature:** Ctrl+E, Tab, Esc Support
**Shortcuts:**
- `Ctrl+E`: Toggle Edit Mode
- `Tab`: Next editable field
- `Shift+Tab`: Previous editable field
- `Esc`: Cancel edit, restore original
- `Ctrl+Z`: Undo
- `Ctrl+Y`: Redo
- `Ctrl+S`: Save (already exists)

### 7. Smart Highlighting
**Feature:** Visual feedback for changed fields
**Implementation:**
```javascript
function markAsChanged($element) {
    const key = $element.data('key');
    const original = originalContents[key];
    const current = $element.html().trim();

    if (original !== current) {
        $element.addClass('field-changed');
    } else {
        $element.removeClass('field-changed');
    }

    updateChangeCounter();
}

function updateChangeCounter() {
    const count = $('.field-changed').length;
    $('.tierliebe-save-btn').text('💾 Speichern (' + count + ')');
}
```

**CSS:**
```css
body.edit-mode .editable.field-changed {
    outline-color: #f5a623;
    background: rgba(245, 166, 35, 0.1);
}
```

### 18. Auto-Save Draft ✅ IMPLEMENTIERT
**Feature:** Auto-save every 30 seconds to localStorage
**Status:** Vollständig implementiert in v3.0.0
**Details:**
- Auto-Save startet beim Enter Edit Mode
- Speichert alle 30 Sekunden zu localStorage
- Zeigt Indicator rechts unten ("💾 Auto-Save: vor 2min")
- Bietet Draft-Restore beim Page Load (wenn < 24h alt)
- Draft wird automatisch gelöscht nach erfolgreichem Save

---

## 📋 Phase 2: Power User Features

### 5. Field History
**Feature:** Last 3-5 versions per field
**UI:** Small history icon next to each field in edit mode
**Storage:** localStorage with field-key based history

### 8. Inline Validation
**Feature:** Character counter + emoji picker
**Implementation:**
- Show character count on focus for headline fields
- Warning at 60+ chars for headlines
- Emoji picker button in toolbar
- Common emojis: ✨ 💔 🐶 🐱 🐰 🐹

### 13. Collaboration Hints
**Feature:** Show last editor + timestamp
**Implementation:**
- Store last_editor and last_modified in post meta
- Show in small badge on each field
- Format: "Zuletzt: User vor 2 Stunden"

### 20b. Media Library Integration ✅ IMPLEMENTIERT
**Feature:** WordPress Media Library Integration für Bilder
**Status:** Vollständig implementiert in v3.0.0
**Details:**
- Klick auf jedes `<img>` im Edit Mode öffnet WordPress Media Library
- User kann neues Bild auswählen
- Bild-URL und Alt-Text werden automatisch aktualisiert
- Parent-Editable wird als "changed" markiert
- Nutzt native WP Media Library (wp.media) - kein Custom Upload nötig

**Warum Feature 20 (Drag & Drop Upload) übersprungen wurde:**
- WordPress Media Library ist bereits vollständig und mächtig
- Redundanter Code wäre unnötig gewesen
- Feature 20b ist benutzerfreundlicher

---

## 🎯 Phase 3: Advanced Features

### 14. Dashboard/Overview
**Feature:** All texts at a glance
**Location:** New WordPress Admin Page
**Shows:**
- All pages with field count
- Recently changed fields
- Empty fields
- Field length statistics

### 15. Export/Import
**Feature:** Excel export/import
**Formats:**
- Excel: All fields with page/key structure
- CSV: Simple export
- JSON: Full backup

### 20. Image Upload Inline
**Feature:** Drag & drop images
**Implementation:**
- Detect image drop on editable
- Upload to WordPress media library
- Insert image tag with proper sizing

---

## 📝 Implementation Notes

### Version Control
- Current: v2.0.0
- Next: v2.1.0 (Phase 1)
- Future: v2.2.0 (Phase 2), v3.0.0 (Phase 3)

### CSS Additions Needed
```css
/* Smart Highlighting */
.field-changed {
    outline: 2px solid #f5a623 !important;
    background: rgba(245, 166, 35, 0.1);
}

/* Auto-Save Indicator */
.auto-save-indicator {
    position: fixed;
    bottom: 20px;
    right: 80px;
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 12px;
}
```

### localStorage Schema
```javascript
// Draft storage
tierliebe_draft_{pageSlug} = {
    content: {key: value, ...},
    timestamp: 1234567890
}

// Field history
tierliebe_history_{pageSlug}_{key} = [
    {content: "...", timestamp: 123, user: "Admin"},
    ...
]

// Undo stack
tierliebe_undo_{pageSlug} = [
    {key: "...", oldValue: "...", newValue: "...", timestamp: 123},
    ...
]
```

---

## 🎨 User Experience Goals

1. ✅ **Feel safe editing** - Undo/Redo gibt Sicherheit (ERREICHT in v3.0)
2. ✅ **Know what changed** - Smart Highlighting zeigt Status (ERREICHT in v3.0)
3. ✅ **Never lose work** - Auto-Save verhindert Datenverlust (ERREICHT in v3.0)
4. ✅ **Work efficiently** - Keyboard shortcuts für Power-User (ERREICHT in v3.0)
5. ⏳ **Collaborate smoothly** - Sehen wer was wann geändert hat (Phase 2)

---

## 📊 Success Metrics v3.0

Phase 1 ist vollständig implementiert. Tracking-Ziele:
- **Undo/Redo**: Ziel 80% Nutzung in Sessions
- **Auto-Save**: Ziel 0 Beschwerden über Datenverlust
- **Keyboard Shortcuts**: Ziel 30% nutzen Ctrl+E oder Tab
- **Smart Highlighting**: User sehen sofort was geändert wurde
- **Media Library**: Einfacher Bildwechsel ohne FTP

---

## 🚀 Next Steps

1. ✅ Phase 1 implementiert in v3.0.0 (ca. 5h Implementierung)
2. ⏳ Test mit echten Content-Editoren
3. ⏳ Sammle Feedback
4. ⏳ Implementiere Phase 2 (Features 5, 8, 13)

**Implementation Timeline:**
- Phase 1: ✅ 5 Stunden (ABGESCHLOSSEN)
- Phase 2: 6-8 Stunden
- Phase 3: 12-16 Stunden

**Verbleibend:** ~18-24 Stunden für Phase 2 + 3

---

## 📝 v3.0.0 Release Notes

**Released:** 2025-11-04

**Neue Keyboard Shortcuts:**
- `Ctrl+E` - Toggle Edit Mode (funktioniert immer)
- `Ctrl+Z` - Undo (bis zu 50 Actions)
- `Ctrl+Y` oder `Ctrl+Shift+Z` - Redo
- `Tab` - Nächstes editierbares Feld
- `Shift+Tab` - Vorheriges editierbares Feld
- `Esc` - Aktuelle Änderung verwerfen

**Neue Features:**
- Smart Highlighting: Geänderte Felder bekommen orange pulsing outline
- Auto-Save: Alle 30 Sekunden zu localStorage, Auto-Restore beim Laden
- Media Library: Klick auf Bild öffnet WP Media Library für schnellen Bildwechsel
- Change Counter: Save-Button zeigt Anzahl geänderter Felder
- Undo/Redo Indicator: Zeigt Anzahl verfügbarer Undo/Redo Actions

**Bug Fixes:**
- Duplicate messages werden nicht mehr angezeigt
- Auto-Save Indicator positioniert sich korrekt auch auf Mobile

**Technical:**
- Version Bump: 2.0.0 → 3.0.0
- WordPress Media Library wird automatisch geladen
- localStorage für Draft-Management
- Undo/Redo Stack mit max 50 Actions
