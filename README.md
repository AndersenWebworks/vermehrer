# Tierliebe / Vermehrer - WordPress Theme

> **Aufklärungswebsite über verantwortungsvolle Tierhaltung**

**Live:** https://vm.andersen-webworks.de/
**Version:** 1.1.0
**Letztes Update:** 6. November 2025

---

## 📚 Dokumentation

**LIES ZUERST:**
- **[PROJECT-OVERVIEW.md](PROJECT-OVERVIEW.md)** - Vollständige Projekt-Dokumentation (1800+ Zeilen)
- **[.claude/CLAUDE.md](.claude/CLAUDE.md)** - Kontext für Claude-Instanzen

**Workflows:**
- **[WORKFLOW.md](WORKFLOW.md)** - Operative Anleitung
- **[.claude/WORKFLOW-CONTENT-SYNC.md](.claude/WORKFLOW-CONTENT-SYNC.md)** - Content-Sync Workflow

**Roadmaps:**
- **[EDITOR-ENHANCEMENTS.md](EDITOR-ENHANCEMENTS.md)** - Editor Feature-Roadmap

**Historisch:**
- **[MIGRATION-COMPLETE.md](MIGRATION-COMPLETE.md)** - CPT → Pages Migration (Nov 2025)
- **[TIERLIEBE_PROJEKT_PLAN.md](TIERLIEBE_PROJEKT_PLAN.md)** - Ursprünglicher Projektplan (archiviert)
- **[CLEANUP-2025-11-06.md](CLEANUP-2025-11-06.md)** - Cleanup Report

---

## 🚀 Quick Start

### Lokale Entwicklung
```bash
# FTP Auto-Upload (bereits konfiguriert in .vscode/)
# Speichern = automatisch live (<2s)
```

### Content bearbeiten
```bash
# Option 1: Frontend-Editor (empfohlen)
https://vm.andersen-webworks.de/tierliebe-*/
→ Als Admin einloggen
→ ✏️ Button klicken
→ Inline editieren
→ 💾 Speichern

# Option 2: Markdown
vim texte/page-tierliebe-*.md
python scripts/sync/fix-adoption-page-548.py
```

---

## 📁 Projekt-Struktur

```
vermehrer/
├── .claude/              # Claude-Kontext & Workflows
├── .vscode/              # VSCode Config + FTP Auto-Upload
├── scripts/              # Utility Scripts (sync, debug)
├── texte/                # Content-Markdown (Source of Truth)
├── webworks-theme/       # WordPress Theme
│   ├── css/              # 8 CSS-Module (v6.0.0)
│   ├── js/               # 11 JavaScript-Module
│   ├── page-tierliebe-*.php  # 11 Page Templates
│   └── functions.php     # Theme-Kern
├── migrate-qualzucht-images-to-json.php  # Migration Script (Doku)
└── *.md                  # Dokumentation
```

---

## ✨ Features

- **Frontend WYSIWYG Editor** (v3.1.0) - Inline-Editing ohne WordPress Admin
- **Modular CSS** (v6.0.0) - 8 Module, klare Struktur
- **JSON-basiertes CMS** - Content als JSON in post_content
- **Quiz-System** - 8 Fragen mit komplexem Scoring
- **Undo-Button** (↩️) - Stellt letzte WordPress Revision wieder her
- **Zero-Click Deployment** - Speichern → FTP → Live (<2s)
- **WordPress Revisionen** - Automatisches Backup bei jedem Save

---

## 🎨 Tech Stack

- **WordPress** 6.x + Custom Theme (YOOtheme Parent)
- **PHP** 7.4+
- **JavaScript** (jQuery) + Custom Modules
- **CSS** Modular Architecture (v6.0.0)
- **Pastel Cute Design** - Quicksand, Fredoka, Caveat Fonts

---

## 📖 Wichtige Erkenntnisse

### ⚠️ KRITISCH: Straight Quotes Bug
**Niemals `"` in Content verwenden!**
- Wird automatisch zu Prime-Symbol `′` ersetzt
- Verhindert JSON-Parsing-Fehler
- Details: [PROJECT-OVERVIEW.md Sektion 20.5](PROJECT-OVERVIEW.md#205-kritischer-bug-straight-quotes-in-json-november-2025)

### Image-Migration
**Bilder sind jetzt im JSON!**
- Früher: Post Meta → Nicht in Revisionen
- Jetzt: JSON → In Revisionen enthalten
- Undo-Button stellt Texte UND Bilder wieder her
- Details: [PROJECT-OVERVIEW.md Sektion 20.6](PROJECT-OVERVIEW.md#206-image-migration-post-meta--json-november-2025)

---

## 🛠️ Entwickler-Notizen

### FTP Upload
```bash
# Automatisch bei Speichern (VSCode triggerTaskOnSave)
# Oder manuell:
powershell.exe -ExecutionPolicy Bypass -File .vscode\ftp-upload.ps1
```

### Git Workflow
```bash
# Feature-Milestones
git commit -m "Editor v3.1.0 - Feature XYZ"

# Kleinkram
git commit -m "Auto commit"
```

### Scripts
```bash
# Content-Sync
python scripts/sync/fix-adoption-page-548.py

# Debug
python scripts/debug/check-adoption-status.py
```

---

## 📊 Status

- **8/11 Templates** live
- **Editor** v3.1.0 (Phase 2)
- **CSS** v6.0.0 (Modular)
- **Nächste Steps:** Irrtümer, Adoption, Wissen Templates

---

## 🐾 Mission

**Tieren helfen durch ehrliche Aufklärung.**

Ziel ist es, potenzielle Tierhalter über die Realität der Tierhaltung aufzuklären und von Impulskäufen abzuhalten.

---

**Für Details siehe:** [PROJECT-OVERVIEW.md](PROJECT-OVERVIEW.md)
