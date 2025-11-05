# Migration Complete: CPT → Pages + Content Verification

**Datum:** 2025-01-05
**Status:** ✅ Abgeschlossen

---

## Was wurde gemacht?

### 1. Migration: CPT → Pages (100% Complete)

**Vorher:**
- Content wurde in separaten Custom Post Type Posts (`tierliebe_text`) gespeichert
- Pages hatten leeren `post_content`
- `get_tierliebe_text()` queryete CPT by slug

**Nachher:**
- Content wird direkt im `post_content` der jeweiligen Page als JSON gespeichert
- `get_tierliebe_text()` liest aus der aktuellen Page (`global $post`)
- Keine separaten CPT-Abfragen mehr nötig
- Cache-Keys geändert: `tierliebe_page_content_{post_id}` statt `tierliebe_text_{slug}`

**Geänderte Dateien:**
- `webworks-theme/functions.php` - get_tierliebe_text() & AJAX Handler umgebaut
- `webworks-theme/js/tierliebe-edit-v2.js` - Slug-Extraktion aus URL statt Hidden Input
- Alle 11 Templates - Hidden Inputs entfernt

**Migration Scripts (archiviert):**
- `migrate-cpt-to-pages-api.py` - Hauptmigration via REST API
- `qa-check.py` - JSON-Validierung & Fixes
- `convert-hunde-md-to-json.py` - Hunde-Seite Rebuild

---

### 2. Fallback-Removal (100% Complete)

**Alle hardcodierten Fallback-Texte entfernt aus:**
- ✅ 11 Templates (page-tierliebe-*.php)
- ✅ Alle `<li>` Fallbacks in `<ul class="editable">`
- ✅ Alle PHP Ternary Fallbacks (`? 'text' : ''`)
- ✅ Glossar-Grid in wissen.php (35 hardcodierte Items)

**Nur noch:** `<?php echo wp_kses_post($content['key'] ?? ''); ?>`

**Scripts verwendet:**
- `remove-fallbacks.py` - PHP Ternary Pattern Removal
- `remove-hardcoded-lists.py` - `<li>` Element Removal
- `remove-hidden-slug-inputs.py` - Hidden Input Cleanup

---

### 3. Content Verification (100% Complete)

**Alle 11 Seiten vollständig befüllt:**

| Seite | Template Keys | JSON Keys | Status |
|-------|--------------|-----------|--------|
| tierliebe-start | 30 | 30 | ✅ Vollständig |
| tierliebe-test | 4 | 4 | ✅ Vollständig |
| tierliebe-hunde | 37 | 37 | ✅ Vollständig |
| tierliebe-katzen | 30 | 30 | ✅ Vollständig |
| tierliebe-kleintiere | 137 | 137 | ✅ Vollständig |
| tierliebe-exoten | 130 | 130 | ✅ Vollständig |
| tierliebe-adoption | 67 | 67 | ✅ Vollständig |
| tierliebe-qualzucht | 52 | 52 | ✅ Vollständig |
| tierliebe-wissen | 38 | 38 | ✅ Vollständig |
| tierliebe-kontakt | 23 | 23 | ✅ Vollständig |
| tierliebe-mythen | 30 | 30 | ✅ Vollständig |

**Verification Scripts:**
- `check-all-template-keys.py` - Template vs. JSON Verification
- `final-check.py` - Spot-Check kritischer Felder
- `manual-verify.py` - Sample Content Extraktion

**Fixes angewendet:**
- Unvollständige Mythos-Header ergänzt (Katzen, Kleintiere)
- Fehlende Listen befüllt (Hunde: 5 Listen)
- Leere Keys ergänzt (Start, Wissen, Qualzucht, etc.)
- Icon-Keys ergänzt (Qualzucht: 8 Icons)

---

### 4. Markdown-Dokumentation (Erweitert)

**Markdown Files als Source of Truth:**

```
texte/
├── page-tierliebe-home.md          (116 Zeilen)
├── page-tierliebe-test.md          (13 Zeilen)
├── page-tierliebe-hunde.md         (57 Zeilen)
├── page-tierliebe-katzen.md        (61 Zeilen)
├── page-tierliebe-kleintiere.md    (303 Zeilen) ⭐ NEU: Alle 4 Tabs
├── page-tierliebe-exoten.md        (122 Zeilen)
├── page-tierliebe-adoption.md      (?)
├── page-tierliebe-qualzucht.md     (?)
├── page-tierliebe-wissen.md        (?)
├── page-tierliebe-kontakt.md       (83 Zeilen)
└── page-tierliebe-irrtuemer.md     (78 Zeilen)
```

**Erweitert:**
- ✅ `page-tierliebe-kleintiere.md` - Von 87 auf 303 Zeilen erweitert
  - Tab 1: Kaninchen & Meerschweinchen (bereits vorhanden)
  - Tab 2: Hamster (4 Mythen, neu hinzugefügt)
  - Tab 3: Mäuse & Ratten (4 Mythen, neu hinzugefügt)
  - Tab 4: Degus & Chinchillas (4 Mythen, neu hinzugefügt)

**Quelle:** ALLE-TEXTE-KOMPLETT-EDITIERBAR.md (Zeilen 404-467)

---

### 5. Bug Fixes

**JavaScript Editor Fix:**
- **Problem:** Fallback "tierliebe-home" statt "tierliebe-start" für Startseite
- **Fix:** `tierliebe-edit-v2.js:256` - Fallback geändert
- **Datei:** [tierliebe-edit-v2.js:256](webworks-theme/js/tierliebe-edit-v2.js#L256)

**Bekanntes Problem (unfixed):**
- ⚠️ **Link-Editing im Frontend-Editor** kann JSON korrumpieren
- URLs mit Quotes werden nicht richtig escaped
- **Workaround:** Links nur im WordPress-Backend bearbeiten
- **Fix:** Benötigt JSON-Validierung im AJAX Handler

---

## Architektur-Änderungen

### Vorher (CPT-basiert)
```
Page → Template → get_tierliebe_text($slug)
                       ↓
                   Query CPT by slug
                       ↓
                   Return CPT post_content (JSON)
```

### Nachher (Page-basiert)
```
Page → Template → get_tierliebe_text()
                       ↓
                   Read from current $post->post_content
                       ↓
                   Return JSON
```

**Vorteile:**
- ✅ Einfachere Struktur (1:1 statt 1:N)
- ✅ Keine separaten Queries nötig
- ✅ WordPress Revisionen out-of-the-box
- ✅ Klarere Permissions (per-Page statt global)

---

## Scripts & Tools

### Migration Scripts (in Root)
```bash
migrate-cpt-to-pages-api.py          # Haupt-Migration
qa-check.py                           # JSON Fixes
convert-hunde-md-to-json.py          # Hunde Rebuild
```

### Verification Scripts
```bash
check-all-template-keys.py           # Template vs JSON Check
final-check.py                        # Spot Check
manual-verify.py                      # Sample Extraktion
```

### Cleanup Scripts
```bash
remove-fallbacks.py                   # PHP Ternary Cleanup
remove-hardcoded-lists.py            # <li> Cleanup
remove-hidden-slug-inputs.py         # Hidden Input Cleanup
```

### Fix Scripts (für spezifische Seiten)
```bash
fix-test-page-correct.py             # Test-Seite
fix-hunde-complete.py                # Hunde Listen
fix-hunde-extra-sections.py          # Hunde Info-Boxen
fix-katzen.py                        # Katzen Mythos-Header
fix-kleintiere-headers.py            # Kleintiere Mythos-Header
fix-all-missing-keys.py              # Bulk Fix
```

---

## Deployment

**FTP-Upload nach jedem File-Edit:**
```powershell
powershell.exe -ExecutionPolicy Bypass -File ".vscode\ftp-upload.ps1"
```

**Deployment-Zeit:** < 2 Sekunden

**Cache leeren:**
```
https://vm.andersen-webworks.de/wp-admin/?tierliebe_clear_cache=1
```

Oder via Script:
```python
requests.get('https://vm.andersen-webworks.de/wp-admin/?tierliebe_clear_cache=1',
             auth=(USERNAME, APP_PASSWORD))
```

---

## Für die nächste Instanz

### Wichtige Infos
1. **Content liegt jetzt in Pages** - nicht mehr in CPT
2. **MD-Dateien sind Source of Truth** - für Content-Updates
3. **Keine Fallbacks mehr** - alles kommt aus JSON
4. **Link-Editing Vorsicht** - Frontend-Editor kann JSON korrupt machen

### Bei Content-Updates
1. MD-Datei in `texte/` editieren
2. Python-Script schreiben, das MD → JSON parst
3. JSON via REST API in Page speichern
4. Cache leeren
5. Verifizieren auf Live-Site

### Bei Problemen
1. **JSON korrupt?** → WordPress Revision wiederherstellen
2. **Fehlende Texte?** → `check-all-template-keys.py` ausführen
3. **Cache-Probleme?** → `?tierliebe_clear_cache=1` aufrufen

### Wichtige Dateien
- `webworks-theme/functions.php` - get_tierliebe_text() & AJAX
- `webworks-theme/js/tierliebe-edit-v2.js` - Frontend Editor
- `texte/*.md` - Content Source Files
- `check-all-template-keys.py` - Verification Tool

---

## Status: ✅ Production Ready

Alle 11 Seiten sind vollständig, alle Templates sauber, Migration abgeschlossen.

**Live-URL:** https://vm.andersen-webworks.de/
