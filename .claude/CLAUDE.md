# VERMEHRER / TIERLIEBE - CLAUDE-PROJEKT-KONTEXT

> **Lies diese Datei ZUERST bevor du mit dem Projekt arbeitest.**

---

## PROJEKT-ÜBERSICHT

**Vermehrer/Tierliebe** ist eine WordPress-Website zur ehrlichen Aufklärung über Tierhaltung.

- **Live-URL:** https://vm.andersen-webworks.de/
- **Tech-Stack:** WordPress + Custom Theme, Modular CSS (v6.0.0), Frontend-Editor (v3.1.0)
- **Master-Dokumentation:** [PROJECT-OVERVIEW.md](../PROJECT-OVERVIEW.md) (1500+ Zeilen, ALLES Wissen)
- **Startseite:** ID 543, Slug `tierliebe-start` (NICHT `tierliebe-home`!)

---

## KOMMUNIKATIONS-REGELN

### Sprache & Ton
- **Deutsch sprechen** - Alle Antworten auf Deutsch
- **Wörtlich nehmen** - Keine Implizierung, keine Annahmen
- **Kein Bullshit** - Direkt zum Punkt, keine Superlative
- **Bei Unklarheit nachfragen** - Nie raten

### Wichtige Direktiven (aus User-Settings)
```
- wir sprechen deutsch
- merk dir mich nicht mit so einer dummheit anzupissen ich hasse dummheit
- impliziere nie, nimm mich wörtlich
- KEINE FALLBACKS
- KEINE WORKAROUNDS
```

**Bedeutet:**
- Qualität vor Schnelligkeit
- Nur saubere Lösungen vorschlagen
- Ehrlich sein wenn etwas nicht geht
- Nie "quick fix" - immer richtige Lösung

---

## WORKFLOW-REGELN

### 1. Plan before Code
```
User gibt Aufgabe
  ↓
Claude analysiert (falls nötig)
  ↓
Claude erstellt detaillierten Plan
  ↓
User approved Plan
  ↓
Claude implementiert
```

### 2. FTP Upload nach JEDEM File-Edit

**WICHTIG:** Nach JEDEM Write oder Edit einer Datei MUSS das FTP-Upload-Skript ausgeführt werden:

```bash
powershell.exe -ExecutionPolicy Bypass -File .vscode\ftp-upload.ps1
```

Das Skript lädt alle geänderten Dateien (git diff) automatisch auf den FTP-Server hoch.
**Deployment-Zeit:** < 2 Sekunden

### 3. Dokumentation aktualisieren

Bei größeren Features:
- Relevante .md Files updaten
- Version-Bumps dokumentieren
- Roadmap-Status aktualisieren

### 4. Git Commits

- **Feature-Milestones:** Manuelle Commits mit sinnvoller Message
  ```
  git commit -m "Tierliebe Editor v3.1.0 - Phase 2 Features"
  ```
- **Kleinkram:** "Auto commit" ist OK

---

## PROJEKT-PHILOSOPHIE

### Kern-Prinzipien
1. **Speed over Perfection** - Schnelle Iteration wichtiger als saubere History
2. **Automation-First** - Zero-Click Deployment (Ctrl+S = Live)
3. **Documentation-Driven** - Extreme Detailtiefe für zukünftige Sessions
4. **Content-First** - Tech dient Content, nicht umgekehrt
5. **Pragmatisch > Theoretisch** - Saubere Lösungen, aber nicht übertrieben

### Entscheidungs-Matrix
- Neue Feature-Idee → Erst dokumentieren, dann implementieren
- Bug gefunden → Sofort fixen
- Unsichere Architektur → Diskutieren, dann saubere Lösung
- Repetitive Task → Automatisieren
- Code-Duplikation → Refactoren

---

## WICHTIGE DATEIEN

### Dokumentation (ZUERST LESEN)
- **[PROJECT-OVERVIEW.md](../PROJECT-OVERVIEW.md)** - Vollständige Projekt-Dokumentation (1500+ Zeilen)
- **[WORKFLOW.md](../WORKFLOW.md)** - Operative Anleitung
- **[TIERLIEBE_PROJEKT_PLAN.md](../TIERLIEBE_PROJEKT_PLAN.md)** - Master-Plan
- **[EDITOR-ENHANCEMENTS.md](../EDITOR-ENHANCEMENTS.md)** - Editor Roadmap

### Code (Kern-Dateien)
- **webworks-theme/functions.php** - Theme-Kern (Enqueues, Custom Walker, CMS)
- **webworks-theme/js/tierliebe-edit-v2.js** - Frontend Editor (v3.1.0, 409 Zeilen)
- **webworks-theme/css/tierliebe-*.css** - 8 CSS-Module (v6.0.0)
- **webworks-theme/page-tierliebe-*.php** - 11 Templates

### Deployment
- **.vscode/ftp-upload.ps1** - FTP-Upload Script
- **.vscode/tasks.json** - VSCode Build Tasks
- **.vscode/settings.json** - triggerTaskOnSave Config

---

## TECHNOLOGIE-ÜBERSICHT

### Backend
- **WordPress** mit Custom Theme (YOOtheme Parent)
- **Custom Post Type:** `tierliebe_text` für JSON-Content
- **PHP 7.4+**

### Frontend
- **Modular CSS (v6.0.0)** - 8 Module
- **JavaScript (jQuery)** - 11 Module
- **Pastel Cute Design** - Quicksand, Fredoka, Caveat Fonts

### Features
- **Frontend WYSIWYG Editor** (v3.1.0) - Inline-Editing ohne Admin
- **Quiz-System** - 8 Fragen mit komplexem Scoring
- **JSON-basiertes CMS** - Content als JSON im CPT
- **Zero-Click Deployment** - Save → FTP → Live (<2s)

---

## ARCHITEKTUR-ENTSCHEIDUNGEN

### Warum JSON statt Meta Fields?
- Einfacheres Backup
- WordPress Revisionen out-of-the-box
- 1 Query statt N
- Portabilität

### Warum Frontend-Editor?
- WYSIWYG - Änderungen direkt im Design sehen
- Keine Admin-Navigation nötig
- Intuitiv ohne WordPress-Kenntnisse

### Warum Modular CSS?
- Maintainability - Klare Trennung
- Debugging - Schneller finden
- Caching - Browser cached separat

### Warum Custom Walker?
- YOOtheme injiziert UIKit-Klassen
- Passt nicht zum Pastel-Design

---

## QUICK-START FÜR NEUE INSTANZEN

### 1. Kontext aufbauen (20 Min)
```bash
# Lese diese Dateien in Reihenfolge:
1. .claude/CLAUDE.md (diese Datei)
2. PROJECT-OVERVIEW.md (Master-Dokumentation)
3. git log --oneline -20 (Recent Commits)
4. git status (Was wurde geändert?)
```

### 2. Code verstehen (10 Min)
```bash
# Öffne diese Dateien:
- webworks-theme/functions.php
- webworks-theme/js/tierliebe-edit-v2.js
- webworks-theme/page-tierliebe-home.php (Beispiel-Template)
```

### 3. Ready to work!
- Warte auf User-Aufgabe
- Analysiere falls nötig
- Erstelle Plan
- Warte auf Approval
- Implementiere
- FTP-Upload ausführen

---

## STATUS & ROADMAP

### Fertig ✅
- 8/11 Templates live
- Editor v3.0.0 (Phase 1)
- CSS v6.0.0 (Modular Architecture)
- Quiz-System funktional
- Deployment-Automation

### In Entwicklung ⏳
- 3 Templates (Irrtümer, Adoption, Wissen)
- Editor v3.1.0 (Phase 2: Field History, Validation)

### Geplant
- Editor v3.2.0 (Phase 3: Dashboard, Export/Import)
- Performance-Optimierung (Minification, WebP)
- SEO (Meta Descriptions, Schema.org)

---

## WICHTIGE HINWEISE

### ⚠️ KRITISCH: Straight Quotes Bug (November 2025)

**NIEMALS straight quotes `"` in Content verwenden!**

**Problem:**
- Content mit `"Beispiel"` (straight quotes) macht JSON beim Speichern kaputt
- `JSON.stringify()` escaped zu `\"Beispiel\"`
- Nach Reload: Seite leer, alle Texte weg

**Lösung implementiert:**
- **Alle `"` werden automatisch zu `′` (Prime-Symbol) ersetzt**
- Prime sieht fast gleich aus, wird aber nicht escaped
- Code in: `tierliebe-edit-v2.js` (L167, L388) + `functions.php` (L462-470)

**Falls Seite trotzdem kaputt:**
1. **🔄 Button klicken** (links unten neben Edit-Button)
2. Stellt automatisch letzte gültige WordPress Revision wieder her
3. Bei Fehler: [PROJECT-OVERVIEW.md Sektion 20.5](../PROJECT-OVERVIEW.md#205-kritischer-bug-straight-quotes-in-json-november-2025) lesen

**Wichtig für Content-Autoren:**
- Immer typografische Quotes verwenden: `"Beispiel"` oder `′Beispiel′`
- NIEMALS straight quotes: `"Beispiel"` ❌

### ✅ GELÖST: Duplicate Data-Key Bug (November 2025)

**Problem (war):**
- Mehrere Elemente können denselben `data-key` haben (z.B. H2 Titel + P Beschreibung)
- Beim Speichern iteriert JavaScript über ALLE `.editable` Elemente
- Das letzte Element überschreibt den Wert des ersten
- Resultat: User-Edits gehen verloren, alter Content wird gespeichert

**Dreifacher Schutz implementiert (Editor v2.3.0):**

1. **Runtime-Fix** (`buildHTMLFromEditables()` L501-511):
   - Nur geänderte Werte werden in `contentMap` geschrieben
   - Unveränderte Werte (wie das zweite Element mit gleichem key) überschreiben nicht

2. **Validation beim Laden** (`checkForDuplicateKeys()` L77-161):
   - Prüft beim Seitenaufruf auf duplicate data-keys
   - Zeigt rote Warnung für Admins wenn Duplicates gefunden
   - Loggt Details in Browser-Console

3. **Alle Templates geprüft & sauber** (November 2025):
   - PowerShell-Script `find-duplicates.ps1` prüft alle Templates
   - Stand: 11/11 Templates = 0 Duplicates

**Regel für Template-Entwicklung:**
- JEDES `data-key` Attribut MUSS eindeutig sein pro Seite
- Beispiel: `sektion-titel` und `sektion-text` statt beide `sektion-name`
- Bei neuen Templates: Script ausführen um Duplicates zu finden

### Security
```php
// HTML erlaubt
echo wp_kses_post($content['text']);

// Nur Text
echo esc_html($content['title']);

// URLs
echo esc_url($content['link']);

// AJAX Nonce
check_ajax_referer('tierliebe_edit_nonce', 'nonce');
```

### Performance
```php
// Transient Caching (1h)
$cached = get_transient('tierliebe_text_' . $page_slug);
if ($cached !== false) return $cached;
set_transient('tierliebe_text_' . $page_slug, $content, HOUR_IN_SECONDS);
```

### Version Bumps
- CSS: Version in Datei-Header UND functions.php
- JS: Version in Datei-Header UND functions.php
- Editor: Semantic Versioning (Major.Minor.Patch)

---

## ZUSAMMENFASSUNG

**Vermehrer/Tierliebe** ist ein **Herzens-Projekt** zur Tier-Aufklärung mit:

- ✅ **Moderner Tech-Stack** (Modular CSS, Frontend-Editor)
- ✅ **Zero-Click Deployment** (Save → Live in <2s)
- ✅ **Extensive Documentation** (1500+ Zeilen Master-Doc)
- ✅ **Automation-First** (FTP, Auto-Save, QA-Scripts)
- ✅ **Clean Architecture** (JSON-CMS, Custom Walker, Modular CSS)

**Mission:** Tieren helfen durch ehrliche Aufklärung. 🐾❤️

---

**Für Details siehe:** [PROJECT-OVERVIEW.md](../PROJECT-OVERVIEW.md)
