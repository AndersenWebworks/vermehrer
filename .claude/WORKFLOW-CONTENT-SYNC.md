# WORKFLOW: Content-Sync (Markdown → WordPress)

> **Wann:** Wenn Content in texte/*.md geändert wurde und live gehen soll

---

## PROZESS

### 1. Content in Markdown bearbeiten
```
texte/page-tierliebe-*.md
```

### 2. Mit WordPress synchronisieren
```bash
python scripts/sync/fix-adoption-page-548.py
# (oder entsprechendes Sync-Script für andere Pages)
```

### 3. Live-Check
```
https://vm.andersen-webworks.de/tierliebe-*/
```

---

## WICHTIG

- Markdown ist **Source of Truth**
- WordPress-Editor nur für Quick-Fixes
- Nach WordPress-Edits: Content zurück nach Markdown portieren
- JSON-basiertes System: Content wird als JSON in post_content gespeichert

---

## SYNC-SCRIPTS

```
scripts/sync/fix-adoption-page-548.py - Adoption-Page
scripts/qa/verify-home-complete.py - Home-Page QA
scripts/qa/quick-check-all.py - Alle Pages QA
```