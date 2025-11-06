# Scripts - Tierliebe/Vermehrer

> **Utility Scripts für WordPress Content Management**

---

## 📁 Struktur

```
scripts/
├── sync/     # Content-Synchronisation MD → WordPress
├── debug/    # Debug & Diagnostic Tools
└── qa/       # Quality Assurance (aktuell leer, für zukünftige QA-Tools)
```

---

## 🔄 SYNC - Content Synchronisation

### `sync/fix-adoption-page-548.py`

**Zweck:** Synchronisiert Content aus Markdown nach WordPress Page

**Verwendung:**
```bash
python scripts/sync/fix-adoption-page-548.py
```

**Was es macht:**
1. Lädt vollständigen Content aus `texte/page-tierliebe-adoption.md`
2. Konvertiert zu JSON
3. Updated WordPress Page 548 via REST API
4. Leert WordPress Transient Cache automatisch

**Wichtig:**
- Updated **Page 548**, NICHT CPT Post 617
- Nach CPT→Pages Migration (Commit `dc5fe00`)
- Encoding: UTF-8, normale `"` Anführungszeichen verwenden

**Output:**
```
[1/2] Update Page 548 mit 67 Feldern...
[2/2] Sende an WordPress...
[OK] Page 548 aktualisiert!
     https://vm.andersen-webworks.de/tierliebe-adoption/
```

**Siehe auch:** [.claude/WORKFLOW-CONTENT-SYNC.md](../.claude/WORKFLOW-CONTENT-SYNC.md)

---

## 🐛 DEBUG - Diagnostic Tools

### `debug/check-adoption-status.py`

**Zweck:** Prüft WordPress Page-Content und debuggt JSON-Parsing

**Verwendung:**
```bash
python scripts/debug/check-adoption-status.py
```

**Was es macht:**
1. Lädt WordPress Page via REST API
2. Speichert Raw HTML in `wp-content-raw.html`
3. Extrahiert JSON aus HTML
4. Dekodiert HTML-Entities
5. Versucht JSON zu parsen
6. Zeigt kritische Felder zur Verifikation

**Output-Files:**
- `wp-content-raw.html` - Original WordPress HTML
- `wp-content-json-raw.txt` - JSON vor HTML-Dekodierung
- `wp-content-json-decoded.txt` - JSON nach Dekodierung

**Typische Fehler, die es findet:**
- Typografische Anführungszeichen (`„"` statt `""`)
- Fehlende/abgeschnittene Felder
- JSON-Parse-Errors

---

## 📊 QA - Quality Assurance

**Aktuell leer** - Platz für zukünftige QA-Scripts wie:
- Vollständigkeits-Checks für alle Pages
- Template-Key-Validation
- Content-Struktur-Verifikation

---

## 🔧 Workflow: Content aus MD synchronisieren

### 1. Finde Page-ID
```bash
curl -s -u "USER:PW" \
  "https://vm.andersen-webworks.de/wp-json/wp/v2/pages?slug=SLUG" \
  | grep '"id"'
```

### 2. Erstelle Sync-Script (Template)
```python
# scripts/sync/fix-{page-name}-page-{id}.py
import json, requests
from requests.auth import HTTPBasicAuth

PAGE_ID = 548  # Anpassen!

content = {
    # Alle Felder aus texte/page-tierliebe-{name}.md
}

html = f"<p>{json.dumps(content, ensure_ascii=False)}</p>"

r = requests.post(
    f"https://vm.andersen-webworks.de/wp-json/wp/v2/pages/{PAGE_ID}",
    auth=HTTPBasicAuth("EAndersen", "PW aus app-pw.md"),
    json={"content": html}
)
```

### 3. Ausführen & Verifizieren
```bash
# Ausführen
python scripts/sync/fix-{page-name}-page-{id}.py

# Live prüfen
curl -s "https://vm.andersen-webworks.de/{slug}/" | grep "{field-key}"

# Browser: Ctrl+F5 (Cache leeren)
```

---

## 📝 Best Practices

### Encoding
- **Normale Anführungszeichen:** `"text"` (nicht `„text"`)
- **Alternative:** `ä → ae`, `ö → oe`, `ü → ue`
- **Grund:** Python auf Windows + WordPress wptexturize()

### Source of Truth
```
texte/page-tierliebe-*.md  ← Quelle (editieren)
    ↓ (Python Script)
WordPress Page            ← Ziel (automatisch)
```

**Nie WordPress manuell editieren!**

### Page vs. CPT
- **Seit Migration (dc5fe00):** Content liegt in **Pages**
- **Nicht mehr:** Custom Post Type `tierliebe_text`
- **`get_tierliebe_text()`:** Arbeitet mit `global $post` (aktuelle Page)

---

## 🚀 Für zukünftige Pages

**Template für neue Sync-Scripts:**
```bash
cp scripts/sync/fix-adoption-page-548.py scripts/sync/fix-{new-page}-page-{id}.py
# Dann anpassen:
# - PAGE_ID
# - content Dictionary mit Feldern aus texte/page-tierliebe-{new-page}.md
```

---

## 📚 Weitere Dokumentation

- **Master-Doku:** [PROJECT-OVERVIEW.md](../PROJECT-OVERVIEW.md)
- **Workflow:** [WORKFLOW.md](../WORKFLOW.md)
- **Content-Sync:** [.claude/WORKFLOW-CONTENT-SYNC.md](../.claude/WORKFLOW-CONTENT-SYNC.md)
- **Projekt-Plan:** [TIERLIEBE_PROJEKT_PLAN.md](../TIERLIEBE_PROJEKT_PLAN.md)

---

**Maintenance:** Diese Scripts sind minimal - nur das Notwendigste. Cleanup am 2025-11-06 reduzierte 31 Scripts auf 2 essenzielle.
