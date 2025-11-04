# Tierliebe Editor - Enhancement Roadmap

## Status: Phase 1 geplant für nächste Session

### ✅ Aktuell implementiert (v2.0)
- Inline-Editing aller Felder
- Formatting Toolbar (Bold, Italic, Underline, Links, Listen)
- URL-Editing für Buttons/Links (Rechtsklick)
- WordPress Revisionen Support
- Whitespace-Normalisierung beim Speichern
- Link-Navigation Prevention im Edit-Mode

---

## 🚀 Phase 1: Critical UX Improvements (nächste Session)

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

### 18. Auto-Save Draft
**Feature:** Auto-save every 30 seconds to localStorage
**Implementation:**
```javascript
let autoSaveInterval = null;
let lastSaveTime = null;

function startAutoSave() {
    autoSaveInterval = setInterval(function() {
        saveDraft();
    }, 30000); // 30 seconds
}

function saveDraft() {
    const pageSlug = $('#tierliebe-page-slug').val();
    const contentMap = {};

    $('.editable').each(function() {
        const key = $(this).data('key');
        contentMap[key] = $(this).html().trim();
    });

    localStorage.setItem('tierliebe_draft_' + pageSlug, JSON.stringify({
        content: contentMap,
        timestamp: Date.now()
    }));

    lastSaveTime = Date.now();
    showMessage('💾 Draft gespeichert', 'info');
}

function loadDraft() {
    const pageSlug = $('#tierliebe-page-slug').val();
    const draft = localStorage.getItem('tierliebe_draft_' + pageSlug);

    if (draft) {
        const data = JSON.parse(draft);
        const age = Date.now() - data.timestamp;

        // Offer to restore if less than 24 hours old
        if (age < 86400000) {
            if (confirm('Draft gefunden (' + formatAge(age) + '). Wiederherstellen?')) {
                Object.keys(data.content).forEach(key => {
                    $('.editable[data-key="' + key + '"]').html(data.content[key]);
                });
            }
        }
    }
}
```

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

1. **Feel safe editing** - Undo/Redo gibt Sicherheit
2. **Know what changed** - Smart Highlighting zeigt Status
3. **Never lose work** - Auto-Save verhindert Datenverlust
4. **Work efficiently** - Keyboard shortcuts für Power-User
5. **Collaborate smoothly** - Sehen wer was wann geändert hat

---

## 📊 Success Metrics

- **Undo/Redo**: 80% der Sessions nutzen es mindestens einmal
- **Auto-Save**: 0 Beschwerden über Datenverlust
- **Keyboard Shortcuts**: 30% der Sessions nutzen Ctrl+E oder Tab
- **Smart Highlighting**: User sehen sofort was geändert wurde

---

## 🚀 Next Steps

1. Implementiere Phase 1 in v2.1.0
2. Test mit echten Content-Editoren
3. Sammle Feedback
4. Iteriere zu Phase 2

**Estimated Implementation Time:**
- Phase 1: 4-6 Stunden
- Phase 2: 6-8 Stunden
- Phase 3: 12-16 Stunden

**Total:** ~22-30 Stunden für vollständige Implementation aller Features
