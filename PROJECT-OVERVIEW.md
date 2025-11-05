# VERMEHRER / TIERLIEBE - PROJEKT-MASTER-DOKUMENTATION

> **Für zukünftige Claude-Instanzen: Lies dieses Dokument ZUERST. Es enthält ALLES Wissen über das Projekt.**

**Letzte Aktualisierung:** 5. November 2025
**Version:** 1.0.0
**Live-URL:** https://vm.andersen-webworks.de/

---

## INHALTSVERZEICHNIS

1. [Projekt-Überblick](#1-projekt-überblick)
2. [Mission & Ziele](#2-mission--ziele)
3. [Technologie-Stack](#3-technologie-stack)
4. [Projektstruktur](#4-projektstruktur)
5. [WordPress Theme Architektur](#5-wordpress-theme-architektur)
6. [Frontend Editor - Kernfeature](#6-frontend-editor---kernfeature)
7. [Page Templates](#7-page-templates)
8. [CSS-Architektur](#8-css-architektur)
9. [JavaScript-Komponenten](#9-javascript-komponenten)
10. [Content-Management System](#10-content-management-system)
11. [Development Workflow](#11-development-workflow)
12. [Deployment Pipeline](#12-deployment-pipeline)
13. [Arbeitsphilosophie](#13-arbeitsphilosophie)
14. [Kommunikations-Regeln mit Claude](#14-kommunikations-regeln-mit-claude)
15. [Architektur-Entscheidungen](#15-architektur-entscheidungen)
16. [Code-Standards & Best Practices](#16-code-standards--best-practices)
17. [Spezielle Features](#17-spezielle-features)
18. [Technische Schulden & Future Work](#18-technische-schulden--future-work)
19. [Git Workflow](#19-git-workflow)
20. [Wichtige Erkenntnisse](#20-wichtige-erkenntnisse)

---

## 1. PROJEKT-ÜBERBLICK

**Vermehrer** (Tierliebe) ist eine WordPress-basierte Aufklärungswebsite zum Thema "Wa(h)re Haustier(liebe)". Das Projekt bietet eine umfassende Plattform zur kritischen Auseinandersetzung mit Tierhaltung, Qualzucht und verantwortungsvoller Haustierhaltung.

### Kern-Ziel
Potenzielle Tierhalter **ehrlich aufklären** und von Impulskäufen/unverantwortlicher Tierhaltung **abhalten**.

### Status
- **8/11 Templates live**
- **Editor v3.1.0** (Phase 2 in Entwicklung)
- **CSS v6.0.0** (Modular Architecture)
- **Aktive Entwicklung** seit Oktober 2025

---

## 2. MISSION & ZIELE

### Inhaltliche Mission

> "Tierliebe beginnt nicht mit einem Kauf. Sie beginnt mit Wissen, Ehrlichkeit und Verantwortung."

**Kernpositionen:**
- **Anti-Zucht** - Pro Adoption
- **Ehrlich brutal** - Keine Schönfärberei bei Tierhaltungs-Realitäten
- **Qualzucht-Awareness** - Aufklärung über 8 betroffene Rassen
- **Empathisch** - Für Tiere UND potenzielle Halter

### Technische Ziele

1. ✅ **Frontend WYSIWYG Editor** - Inline-Editing ohne Admin-Bereich
2. ✅ **Modular CSS Architecture** (v6.0.0) - 8 Module statt Monolith
3. ✅ **JSON-basiertes CMS** - Content-Ownership ohne FTP-Zugriff
4. ✅ **Zero-Click Deployment** - Save → Live in <2 Sekunden
5. ⏳ **Editor Phase 2** - Field History, Validation, Collaboration
6. ⏳ **3 Templates fertigstellen** - Irrtümer, Adoption, Wissen

### UX-Ziele

- **Pastel Cute Design** - Freundlich, aber nicht kitschig
- **Emotionale Connection** - Emojis (🐾❤️💭), persönlicher Ton
- **Interaktivität** - Quiz, Accordions, Tabs, Filter
- **Mobile-First** - Responsive, Touch-optimiert
- **Accessibility** - Keyboard Navigation, ARIA

---

## 3. TECHNOLOGIE-STACK

### Backend/CMS
- **WordPress** (Custom Theme)
- **YOOtheme** als Parent-Theme (wird überschrieben)
- **Custom Post Type:** `tierliebe_text` für editierbare Inhalte
- **PHP 7.4+**
- **MySQL** (WordPress Standard-DB)

### Frontend
- **HTML5** mit Custom Templates
- **Modular CSS Architecture** (v6.0.0) - 8 Module
- **JavaScript (jQuery)** für Interaktivität
- **Google Fonts:** Quicksand (Body), Fredoka (Headings), Caveat (Handwriting)

### Development
- **Node.js** (mysql2 Package für DB-Zugriff)
- **Python 3** (QA-Tools, Content-Migration)
- **Git** für Versionskontrolle
- **VSCode** mit Automation (triggerTaskOnSave Extension)
- **PowerShell** (FTP-Upload Script)

### Deployment
- **SFTP** zu KAS-Server (w018c99c.kasserver.com)
- **Auto-Upload** bei jedem File-Save
- **Git-basiert** - Nur modified/staged files werden uploaded

---

## 4. PROJEKTSTRUKTUR

```
vermehrer/
├── .claude/                         # Claude-Konfiguration
│   ├── CLAUDE.md                    # Projekt-spezifische Anweisungen
│   ├── settings.json                # Claude Settings
│   └── settings.local.json          # Lokale Permissions
│
├── .vscode/                         # VSCode-Konfiguration
│   ├── tasks.json                   # Build Tasks (Git, FTP)
│   ├── settings.json                # triggerTaskOnSave Config
│   └── ftp-upload.ps1               # PowerShell FTP-Upload Script
│
├── webworks-theme/                  # Haupt-Theme-Verzeichnis
│   ├── css/                         # Modular CSS (8 Module)
│   │   ├── tierliebe-core.css           # Variables, Reset, Base
│   │   ├── tierliebe-layout.css         # Hero, Sections, Containers
│   │   ├── tierliebe-navigation.css     # Header, Desktop & Mobile Nav
│   │   ├── tierliebe-components.css     # Accordion, Tabs, Buttons, Forms
│   │   ├── tierliebe-pages.css          # Page-specific styles
│   │   ├── tierliebe-animations.css     # Keyframes, Transitions
│   │   ├── tierliebe-responsive.css     # Media Queries
│   │   └── tierliebe-edit.css           # Editor-Mode Styles
│   │
│   ├── js/                          # JavaScript Module
│   │   ├── custom.js                    # Legacy (Cookie-Banner)
│   │   ├── tierliebe-edit-v2.js         # Frontend WYSIWYG Editor (v3.1.0)
│   │   ├── tierliebe-quiz.js            # Quiz-Logik (8 Fragen)
│   │   ├── tierliebe-mobile-menu.js     # Mobile Navigation
│   │   ├── tierliebe-desktop-menu.js    # Desktop Menu Enhancement
│   │   ├── tierliebe-keyboard-nav.js    # Keyboard Navigation
│   │   ├── tierliebe-tabs.js            # Tab-Switcher
│   │   ├── tierliebe-accordion.js       # Accordion-Komponente
│   │   ├── tierliebe-filter.js          # Filter-Komponente
│   │   └── tierliebe-gallery.js         # Gallery/Slideshow
│   │
│   ├── tierliebe-parts/             # Template-Partials
│   │   ├── header.php                   # Global Header
│   │   └── footer.php                   # Global Footer
│   │
│   ├── includes/                    # PHP-Funktionen
│   │   └── tierliebe-shortcodes.php     # Quiz-Shortcode
│   │
│   ├── page-tierliebe-*.php         # 11 Page Templates
│   └── functions.php                # Theme-Kern-Funktionen
│
├── tools/                           # Entwicklungs-Tools
│   ├── convert-qualzucht-to-json.php    # PHP → JSON Converter
│   ├── convert-qualzucht-to-json.py     # Python Converter
│   ├── restore-qualzucht-from-json.php  # JSON → DB Import
│   └── archive/                         # Alte Dev-Tools
│
├── texte/                           # Content-Backups als JSON
│   └── page-tierliebe-qualzucht.json
│
├── qa-check.py                      # QA-Tool für Content-Qualität
├── qa-report-simple.py              # Vereinfachter QA-Report
├── init-tierliebe-content.php       # DB-Initialisierung
├── package.json                     # Node.js Dependencies (mysql2)
│
└── *.md                             # Dokumentation
    ├── PROJECT-OVERVIEW.md          # Diese Datei
    ├── WORKFLOW.md                  # Operative Anleitung
    ├── TIERLIEBE_PROJEKT_PLAN.md    # Master-Plan
    ├── EDITOR-ENHANCEMENTS.md       # Editor Roadmap
    ├── DATEISTRUKTUR.md             # File-System-Map
    ├── CSS-MODULE-STRUCTURE.md      # CSS-Architektur
    └── briefing.md                  # Ursprüngliches Briefing
```

---

## 5. WORDPRESS THEME ARCHITEKTUR

### 5.1 functions.php - Kern-Funktionalität

**11 Hauptbereiche:**

#### 1. Custom Walker für Navigation
```php
class Tierliebe_Walker_Nav_Menu extends Walker_Nav_Menu
```
- Überschreibt WordPress/YOOtheme Standard-Navigation
- Erzeugt cleane HTML-Struktur ohne UIKit-Klassen
- **Grund:** YOOtheme injiziert UIKit-CSS, passt nicht zum Pastel-Design

#### 2. Quiz-Shortcode
```php
function tierliebe_quiz_shortcode_new()
```
- Inline-Definition des Quiz-Shortcodes
- `[tierliebe_quiz]` → vollständiges Quiz-HTML
- 8 Fragen mit Scoring-System

#### 3. Asset Enqueuing
```php
function tierliebe_enqueue_assets()
```
- Lädt CSS/JS nur auf Tierliebe-Templates
- Modular CSS (v6.0.0) mit Dependencies
- 11 verschiedene JS-Module

#### 4. Template Meta Box
```php
add_action('add_meta_boxes', 'tierliebe_add_template_meta_box')
```
- Ermöglicht Template-Auswahl im Classic Editor
- YOOtheme deaktiviert das standardmäßig

#### 5. Performance-Optimierung
```php
remove_action('wp_head', 'print_emoji_detection_script', 7);
wp_dequeue_style('wp-block-library');
```
- Entfernt WordPress Block Library CSS
- Deaktiviert Emoji-Scripts
- Deaktiviert Admin Bar

#### 6. Content Management System (CMS)
```php
function get_tierliebe_text($page_slug)
```
- Custom Post Type: `tierliebe_text`
- JSON-basierte Content-Speicherung
- Transient-Caching (1 Stunde)
- Fallback-System zu PHP-Template-Defaults

#### 7. Frontend Editor (v3.1.0)
```php
function tierliebe_save_text_ajax()
```
- AJAX-Handler für Inline-Editing
- Editierbare Felder mit `data-key` Attributen
- WordPress Revisionen Support
- Nonce-Security

### 5.2 Custom Post Type: tierliebe_text

**Eigenschaften:**
```php
register_post_type('tierliebe_text', array(
    'public' => true,
    'show_in_rest' => true,  // REST API aktiviert
    'supports' => array('title', 'editor', 'revisions'),
    'has_archive' => false
));
```

**Slug-System:** `tierliebe-{page}`
- Beispiele: `tierliebe-home`, `tierliebe-qualzucht`

**Datenstruktur (JSON im post_content):**
```json
{
  "hero-titel": "Titel",
  "hero-subtitle": "Untertitel",
  "button-text": "Button",
  "button-url": "/link"
}
```

**Helper-Funktion:**
```php
$content = get_tierliebe_text('qualzucht');
echo $content['hero-titel']; // Ausgabe mit automatischem Fallback
```

**Caching:**
```php
$cached = get_transient('tierliebe_text_' . $page_slug);
if ($cached !== false) return $cached;
set_transient('tierliebe_text_' . $page_slug, $content, HOUR_IN_SECONDS);
```

---

## 6. FRONTEND EDITOR - KERNFEATURE

### 6.1 Tierliebe Editor v3.1.0

**Datei:** `webworks-theme/js/tierliebe-edit-v2.js` (409 Zeilen)

**Status:**
- ✅ Phase 1 vollständig (v3.0.0)
- ⏳ Phase 2 in Entwicklung

### 6.2 Hauptfunktionen

#### 1. Inline-Editing
```html
<h1 class="editable" data-key="hero-titel">
    <?php echo $content['hero-titel']; ?>
</h1>
```
- Jedes Element mit `class="editable"` und `data-key="*"` ist editierbar
- ContentEditable im Edit-Mode
- Änderungen werden visuell hervorgehoben (orange pulsing outline)

#### 2. Formatting Toolbar
- **Bold** (Ctrl+B)
- **Italic** (Ctrl+I)
- **Underline** (Ctrl+U)
- **Links** (Ctrl+K)
- **Listen** (Bullet/Numbered)

#### 3. Keyboard Shortcuts (v3.0)
```
Ctrl+E     → Toggle Edit Mode
Ctrl+Z     → Undo (bis zu 50 Actions)
Ctrl+Y     → Redo
Ctrl+S     → Speichern
Tab        → Nächstes Feld
Shift+Tab  → Vorheriges Feld
Esc        → Änderung verwerfen
```

#### 4. Smart Highlighting
```css
.editable.field-changed {
    outline: 2px solid #f5a623;
    animation: pulse-orange 2s ease-in-out infinite;
}
```
- Geänderte Felder bekommen orange pulsing outline
- Change Counter im Save-Button: `💾 Speichern (3)`

#### 5. Auto-Save (v3.0)
```javascript
setInterval(autoSaveDraft, 30000); // Alle 30 Sekunden
```
- Speichert zu localStorage
- Auto-Restore beim Page Load (wenn < 24h alt)
- Indicator rechts unten: "💾 Auto-Save: vor 2min"

#### 6. Media Library Integration (v3.0)
```javascript
$('img.editable').on('click', function() {
    wp.media.editor.open();
});
```
- Klick auf Bild → WordPress Media Library
- Bild-URL und Alt-Text werden automatisch aktualisiert

#### 7. URL-Editing
```javascript
$(document).on('contextmenu', '[data-editable-url]', function(e) {
    // Rechtsklick → Modal für URL-Edit
});
```

### 6.3 Editor-Architektur

**Undo/Redo Stack:**
```javascript
undoStack = [{
    key: 'hero-titel',
    oldValue: 'Alt',
    newValue: 'Neu',
    timestamp: Date.now()
}]
```

**Auto-Save zu localStorage:**
```javascript
localStorage.setItem('tierliebe_draft_qualzucht', JSON.stringify({
    content: {key: value},
    timestamp: Date.now()
}))
```

**AJAX Save:**
```javascript
$.ajax({
    url: tierliebe_edit.ajax_url,
    data: {
        action: 'tierliebe_save_text',
        nonce: tierliebe_edit.nonce,
        page_slug: 'qualzucht',
        content: JSON.stringify(content)
    }
})
```

**Whitespace-Normalisierung:**
```javascript
content = content.trim();
content = content.replace(/\s+/g, ' '); // Entfernt excessive Whitespace
```

### 6.4 Roadmap (EDITOR-ENHANCEMENTS.md)

**Phase 1:** ✅ ABGESCHLOSSEN (v3.0.0)
- Undo/Redo System
- Extended Keyboard Shortcuts
- Smart Highlighting
- Auto-Save Draft
- Media Library Integration

**Phase 2:** ⏳ IN ENTWICKLUNG
- Field History (letzte 3-5 Versionen pro Feld)
- Inline Validation (Character Counter + Emoji Picker)
- Collaboration Hints (Last Editor + Timestamp)

**Phase 3:** (geplant)
- Dashboard/Overview (Admin Page)
- Export/Import (Excel/CSV/JSON)
- Bulk Operations

---

## 7. PAGE TEMPLATES

### 7.1 Template-Übersicht

| # | Seite | Template | Status | Hauptfeatures |
|---|-------|----------|--------|---------------|
| 1 | Start | page-tierliebe-home.php | ✅ Live | Hero, Decision Section, Quick Links |
| 2 | Test | page-tierliebe-test.php | ✅ Live | Quiz (8 Fragen), Scoring, Ergebnis |
| 3 | Hunde | page-tierliebe-hunde.php | ✅ Live | Mythen, Fakten, Kosten |
| 4 | Katzen | page-tierliebe-katzen.php | ✅ Live | Mythen, Fakten, Kosten |
| 5 | Kleintiere | page-tierliebe-kleintiere.php | ✅ Live | 4 Tabs (Kaninchen, Hamster, etc.) |
| 6 | Exoten | page-tierliebe-exoten.php | ✅ Live | 4 Tabs (Wellensittich, Goldfisch, etc.) |
| 7 | Irrtümer | page-tierliebe-irrtuemer.php | ⏳ In Dev | 12 Irrtümer mit Filter |
| 8 | Adoption | page-tierliebe-adoption.php | ⏳ In Dev | Timeline, Kosten-Tabelle |
| 9 | Qualzucht | page-tierliebe-qualzucht.php | ✅ Live | 8 Rassen mit Bildern |
| 10 | Wissen | page-tierliebe-wissen.php | ⏳ In Dev | Multi-Level Tabs, Glossar |
| 11 | Kontakt | page-tierliebe-kontakt.php | ✅ Live | Motivation, Hilfe-Angebote |

### 7.2 Template-Struktur (Standard-Pattern)

```php
<?php
/**
 * Template Name: Tierliebe - {Name}
 * Template Post Type: page
 * Description: {Beschreibung}
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');

$content = get_tierliebe_text('{slug}');
?>

<!-- Hidden Page Slug for Editor -->
<input type="hidden" id="tierliebe-page-slug" value="{slug}">

<!-- Hero Section -->
<section class="primary-hero">
    <h1 class="hero-title editable" data-key="hero-titel">
        <?php echo isset($content['hero-titel'])
            ? wp_kses_post($content['hero-titel'])
            : 'Fallback Titel'; ?>
    </h1>
</section>

<!-- Content Sections -->

<?php get_template_part('tierliebe-parts/footer'); ?>
```

**Wichtige Patterns:**
1. **Template Header:** Name, Post Type, Description, Version
2. **Content Loading:** `get_tierliebe_text($page_slug)`
3. **Editor Identifier:** `<input id="tierliebe-page-slug">`
4. **Fallback System:** `isset($content[...]) ? ... : 'Fallback'`
5. **Security:** `wp_kses_post()` für HTML-Sanitization

---

## 8. CSS-ARCHITEKTUR

### 8.1 Modular CSS System (v6.0.0)

**8 Module in Ladereihenfolge:**

#### 1. tierliebe-core.css
- CSS Custom Properties (Variables)
- CSS Reset (Normalize)
- Base Styles (Body, Typography)

#### 2. tierliebe-layout.css
- Hero Sections (primary-hero, secondary-hero)
- Sections & Containers
- Grid Systems

#### 3. tierliebe-navigation.css
- Header
- Desktop Navigation
- Mobile Menu

#### 4. tierliebe-components.css
- Accordion
- Tabs
- Buttons
- Forms
- Cards
- Info-Boxes

#### 5. tierliebe-pages.css
- Page-spezifische Styles
- Quiz Styles
- Qualzucht Grid

#### 6. tierliebe-animations.css
- Keyframes
- Transitions
- Hover-Effekte
- Floating Decorations

#### 7. tierliebe-responsive.css
- Media Queries
- Mobile-First Breakpoints

#### 8. tierliebe-edit.css
- Editor-Mode Styles
- Edit Button
- Formatting Toolbar

### 8.2 CSS Variables (Pastel Theme)

```css
:root {
    /* Pastel Colors */
    --pastel-mint: #B8E6D5;
    --pastel-pink: #FFD6E8;
    --pastel-peach: #FFE5D0;
    --pastel-lavender: #E0D4F7;
    --pastel-blue: #C7E7F5;
    --pastel-cream: #FFF8E7;
    --pastel-sage: #D4E5D4;
    --pastel-coral: #FFB5B5;
    --cute-coral: #FF9A9E;
    --cute-mint: #A0E7E5;

    /* Typography */
    --font-heading: 'Fredoka', sans-serif;
    --font-body: 'Quicksand', sans-serif;
    --font-handwriting: 'Caveat', cursive;

    /* Spacing */
    --spacing-xs: 10px;
    --spacing-sm: 20px;
    --spacing-md: 40px;
    --spacing-lg: 60px;
    --spacing-xl: 80px;

    /* Shadows */
    --shadow-sm: 0 2px 8px rgba(90, 74, 66, 0.08);
    --shadow-md: 0 8px 20px rgba(90, 74, 66, 0.1);
    --shadow-lg: 0 16px 40px rgba(90, 74, 66, 0.12);

    /* Border Radius */
    --radius-sm: 20px;
    --radius-md: 35px;
    --radius-lg: 45px;
}
```

### 8.3 Design-Prinzipien

**Visual Identity:**
- **Cute & Friendly:** Rounded corners (35-45px), Emojis (🐾❤️💭), Pastel colors
- **Readable:** Quicksand für Body (18px), Fredoka für Headlines
- **Emotional:** Caveat für Quotes/Subtitles (handschriftlich)

**Layout:**
- **Container:** max-width: 1400px, padding: 50px
- **Sections:** padding: 80px 0 (Desktop), 50px 0 (Mobile)
- **Grid:** 3 Spalten (Desktop) → 1 Spalte (Mobile)

**Animations:**
- **Hover:** translateY(-5px), scale(1.02)
- **Transitions:** 0.3s ease-in-out
- **Floating Decorations:** Pfotenabdrücke mit keyframe-Animation

### 8.4 Dependencies (functions.php)

```php
// Core muss zuerst
wp_enqueue_style('tierliebe-core', ..., array(), '6.0.0');

// Layout braucht Core
wp_enqueue_style('tierliebe-layout', ..., array('tierliebe-core'), '6.0.0');

// Responsive kommt zuletzt
wp_enqueue_style('tierliebe-responsive', ...,
    array('tierliebe-core', 'tierliebe-layout', 'tierliebe-navigation',
          'tierliebe-components', 'tierliebe-pages'),
    '6.0.0');
```

---

## 9. JAVASCRIPT-KOMPONENTEN

### 9.1 Quiz-System (tierliebe-quiz.js)

**686 Zeilen komplexe Logik**

#### Features:
- 8 Fragen mit Radio-Buttons
- Progress Bar mit Pfoten-Icon (🐾)
- Scoring-System mit 5 Dimensionen:
  - Zeit (25%)
  - Geld (25%)
  - Motivation (30%)
  - Wissen (15%)
  - Platz (5%)

#### Knockout-Kriterien:
```javascript
if (scores.motivation === 0) knockouts.push('Inakzeptable Motivation');
if (scores.money === 0) knockouts.push('Finanziell nicht tragbar');
if (scores.time === 0) knockouts.push('Keine Zeit');
if (scores.space === 0) knockouts.push('Käfighaltung = Tierquälerei');
if (scores.knowledge === 0) knockouts.push('Null Vorbereitung');
```

#### Ergebnis-Kategorien:
- 0-20: Absolut nicht bereit (Knockout)
- 20-35: Nicht bereit - Massive Defizite
- 35-50: Noch nicht bereit - Viele Lücken
- 50-65: Teilweise bereit - Arbeit nötig
- 65-75: Grundsätzlich bereit
- 75-85: Bereit für ein Tier
- 85-95: Hervorragend vorbereitet
- 95-100: Perfekt - Du bist ein Held

### 9.2 Mobile Menu (tierliebe-mobile-menu.js)

**OOP-Ansatz mit ES6 Class:**
```javascript
class TierliebeMobileMenu {
    constructor() {
        this.menuToggle = $('.mobile-menu-toggle');
        this.mainNav = $('.main-nav-mobile');
        this.init();
    }

    openMenu() {
        this.mainNav.addClass('active');
        this.createBackdrop();
        this.body.css('overflow', 'hidden');
    }

    closeMenu() {
        this.mainNav.removeClass('active');
        this.removeBackdrop();
        this.body.css('overflow', '');
    }
}
```

**Features:**
- Backdrop mit Fade-Animation
- Body-Scroll Prevention
- Accordion-Submenus
- Keyboard Support (Escape)
- Responsive Handling

### 9.3 Weitere Module

**tierliebe-tabs.js:**
- Multi-Level Tab-Switcher
- Smooth Transitions
- Hash-Navigation (#tab-name)

**tierliebe-accordion.js:**
- Aufklappbare Sektionen
- Icon-Rotation (▼ → ▲)
- Max-Height Animation

**tierliebe-filter.js:**
- Filter-Buttons für Kategorie-Filter
- Show/Hide mit Fade-Effekt
- Count-Update

**tierliebe-gallery.js:**
- Slideshow für Qualzucht-Seite
- Prev/Next Navigation
- Lightbox (optional)

**tierliebe-keyboard-nav.js:**
- Keyboard Navigation für alle Komponenten
- Tab-Order Management
- Focus Styles

**tierliebe-desktop-menu.js:**
- Desktop Menu Enhancement
- Dropdown-Hover-Effekte

---

## 10. CONTENT-MANAGEMENT SYSTEM

### 10.1 3-Layer-System

**Layer 1: JSON-Files** (`texte/*.json`)
- Backup/Export-Format
- Für Batch-Operationen
- Git-tracked

**Layer 2: WordPress CPT** (tierliebe_text)
- Production-Datenbank
- WordPress Revisionen
- REST API

**Layer 3: PHP Fallbacks** (in Templates)
- Inline-Defaults
- Für Entwicklung/Testing
- Letzte Sicherheit

### 10.2 Workflow

```
1. Admin klickt "Edit Mode"
   ↓
2. Inline-Editing (ContentEditable)
   ↓
3. Auto-Save zu localStorage (alle 30s)
   ↓
4. Speichern-Button → AJAX zu WordPress
   ↓
5. PHP: tierliebe_save_text_ajax()
   ↓
6. Update CPT + Cache löschen
   ↓
7. Erfolgs-Meldung → Page Reload (optional)
```

### 10.3 JSON-Format (Beispiel: Qualzucht)

```json
{
  "hero-titel": "⚠️ Überzüchtung – Wenn Schönheit Leiden bedeutet",
  "hero-subtitle": "Schönheit ist oft teuer bezahlt...",
  "rasse1-titel": "Mops & Französische Bulldogge",
  "rasse1-leiden-liste": "<li>Atemnot</li><li>Augenprobleme</li>",
  "rasse1-wissen": "<strong>💡 Wissen:</strong> Auch mit OP..."
}
```

### 10.4 Helper-Funktion

```php
function get_tierliebe_text($page_slug) {
    // 1. Check Cache
    $cached = get_transient('tierliebe_text_' . $page_slug);
    if ($cached !== false) return $cached;

    // 2. Query CPT
    $post = get_page_by_path('tierliebe-' . $page_slug, OBJECT, 'tierliebe_text');
    if ($post) {
        $content = json_decode($post->post_content, true);
        set_transient('tierliebe_text_' . $page_slug, $content, HOUR_IN_SECONDS);
        return $content;
    }

    // 3. Fallback (empty array)
    return array();
}
```

### 10.5 Migration-Tools

**convert-qualzucht-to-json.php:**
- Extrahiert Content aus PHP-Arrays
- Generiert JSON mit UTF-8 Encoding
- Output: `texte/page-tierliebe-qualzucht.json`

**restore-qualzucht-from-json.php:**
- CLI-Script für Server-Deployment
- Lädt WordPress ohne UI
- Importiert JSON direkt in DB
- Löscht Caches

**convert-qualzucht-to-json.py:**
- Python-Alternative
- Für Batch-Processing

### 10.6 QA-System

**qa-check.py:**
```python
# Analysiert alle Templates
# Extrahiert Fallback-Texte
# Prüft Datenqualität:
#   - Führende/Trailing Whitespace
#   - Excessive Whitespace (4+)
#   - HTML-Entities (>10)
#   - Kaputte Zeichen (�)
#   - Leere Felder
```

**Output:**
```
[OK] qualzucht
├─ Felder: 54
├─ Probleme: 0
└─ Status: OK

[FIX] home
├─ Felder: 32
├─ Probleme: 5
│  ├─ hero-titel: Trailing \n
│  └─ button-text: Whitespaces 4+
└─ Status: NEEDS_FIX
```

---

## 11. DEVELOPMENT WORKFLOW

### 11.1 Täglicher Workflow

```
1. VSCode öffnen (C:\Andersen\Webworks\GitHub\Webworks\vermehrer)
2. Datei bearbeiten (z.B. page-tierliebe-home.php)
3. Ctrl+S zum Speichern
   ↓
4. triggerTaskOnSave Extension triggert
   ↓
5. Task "Auto Commit and Upload" läuft
   ↓
6. FTP-Upload Script (.vscode/ftp-upload.ps1)
   ↓
7. Nur modified/staged files werden uploaded
   ↓
8. Live in < 2 Sekunden (vm.andersen-webworks.de)
   ↓
9. Browser-Refresh (F5) zum Testen
```

### 11.2 Lokale Entwicklung

**Tools:**
- **VSCode** mit Extensions:
  - triggerTaskOnSave (Auto-Upload)
  - Git Integration
- **Git Bash** für Commands
- **PowerShell** für FTP-Upload Script

**Keine lokale WordPress-Installation:**
- Entwicklung direkt auf Live-Server
- **Grund:** Schnellerer Feedback-Loop, keine Sync-Probleme

### 11.3 Git Workflow

```bash
# Automatisch bei jedem Save (über Task)
git add .
git commit -m "Auto commit"
git push

# Manuelle Feature-Commits
git add .
git commit -m "Tierliebe Editor v3.1.0 - Phase 2 Features"
git push
```

**Branching:**
- **master** - Production
- Feature-Branches für große Features (optional)

**Pattern:**
- 128 "Auto commit" für schnelle Iteration
- Manuelle Commits für Feature-Milestones

---

## 12. DEPLOYMENT PIPELINE

### 12.1 Auto-Deployment Setup

**VSCode Settings** (`.vscode/settings.json`):
```json
{
  "triggerTaskOnSave.tasks": {
    "Auto Commit and Upload": ["**/*"]
  }
}
```

**VSCode Tasks** (`.vscode/tasks.json`):
```json
{
  "label": "Auto Commit and Upload",
  "dependsOn": ["FTP Upload"],
  "isDefault": true
}
```

**FTP Upload Script** (`.vscode/ftp-upload.ps1`):
```powershell
$ftpServer = "ftp://w018c99c.kasserver.com"
$ftpUsername = "w018c99c"
$ftpPassword = "aUMmFsmPb8aHF2v4"
$remotePath = "/vm.andersen-webworks.de/wp-content/themes/"

# Get modified files from git
$modifiedFiles = git diff --name-only
$stagedFiles = git diff --cached --name-only
$allFiles = ($modifiedFiles + $stagedFiles) | Select-Object -Unique

# Upload each file via FTP
foreach ($file in $allFiles) {
    if ($file -match '\.git|\.vscode|node_modules|\.map$') {
        continue
    }
    $webclient.UploadFile($ftpUri, $localFile)
}
```

### 12.2 Claude-Deployment-Regel

**Nach JEDEM Write/Edit:**
```bash
powershell.exe -ExecutionPolicy Bypass -File .vscode\ftp-upload.ps1
```

**Definiert in:** `.claude/CLAUDE.md`

**Wichtig:** Claude führt FTP-Upload explizit aus, nicht über VSCode-Task

### 12.3 Deployment-Flow

```
Claude Edit File
  ↓
Write/Edit Tool
  ↓
File saved locally
  ↓
Claude: powershell ftp-upload.ps1
  ↓
Git diff → Modified files
  ↓
FTP Upload → Live Server
  ↓
WordPress Cache löschen (wenn CPT)
  ↓
Live verfügbar
```

**Geschwindigkeit:** < 2 Sekunden vom Save bis Live

---

## 13. ARBEITSPHILOSOPHIE

### 13.1 Kern-Prinzipien

**1. Speed over Perfection**
- 128 "Auto commit" zeigen: Forward-Movement wichtiger als saubere History
- Lieber 10 Iterationen als 1 perfekte Lösung

**2. Automation-First**
- Alles automatisieren, was wiederholbar ist
- Zero-Click Deployment (Ctrl+S = Live)
- Auto-Save, Auto-Upload, Auto-Commit

**3. Documentation-Driven**
- Dokumentation so wichtig wie Code
- Für zukünftige Claude-Sessions geschrieben
- Extreme Detailtiefe, keine Implizierung

**4. Content-First**
- Technologie dient dem Inhalt, nicht umgekehrt
- Frontend-Editor wichtiger als Template-Perfektion
- Content-Qualität > Code-Qualität

**5. Pragmatisch > Theoretisch**
- Keine Fallbacks, keine Workarounds
- Aber: Zeit nehmen für richtige Lösung
- Clean Architecture, aber nicht übertrieben

### 13.2 Entscheidungs-Matrix

| Situation | Entscheidung |
|-----------|--------------|
| Neue Feature-Idee | Erst dokumentieren (Roadmap), dann implementieren |
| Bug gefunden | Sofort fixen, dann commit |
| Unsichere Architektur | Diskutieren, dann saubere Lösung |
| Repetitive Task | Automatisieren (Script/Tool) |
| Code-Duplikation | Refactoren zu Komponente/Helper |
| Performance-Issue | Messen, dann optimieren (nicht vorher) |

### 13.3 Quality-Standards

**Code:**
- WordPress Best Practices
- Security (Nonces, Sanitization)
- Performance (Caching, Conditional Loading)

**Content:**
- QA-Scripts (Python)
- Whitespace-Normalisierung
- HTML-Entity-Check

**Documentation:**
- Markdown mit Struktur
- Code-Beispiele
- Status-Tracking (✅⏳❌)

---

## 14. KOMMUNIKATIONS-REGELN MIT CLAUDE

### 14.1 Sprache & Ton

**Deutsch sprechen**
- Alle Antworten auf Deutsch
- Code-Comments auf Deutsch (falls vorhanden)
- Dokumentation auf Deutsch

**Wörtlich nehmen**
- Keine Implizierung
- Keine Annahmen
- Bei Unklarheit nachfragen

**Kein Bullshit**
- Direkt zum Punkt
- Keine unnötigen Superlative
- Keine Beschönigung

### 14.2 Workflow-Regeln

**1. Plan before Code**
```
User: Aufgabe
Claude: Analysiert → Erstellt Plan → Wartet auf Approval
User: OK / Änderungen
Claude: Implementiert
```

**2. Nach jedem Write/Edit: FTP-Upload**
```bash
powershell.exe -ExecutionPolicy Bypass -File .vscode\ftp-upload.ps1
```

**3. Dokumentation aktualisieren**
- Bei größeren Features: Markdown-File updaten
- Version-Bumps dokumentieren

**4. Git Commits**
- Feature-Milestones: Manuelle Commits mit sinnvoller Message
- Kleinkram: "Auto commit" OK

### 14.3 Kommunikations-Patterns

**RICHTIG:**
```
User: Analysiere das Quiz-System
Claude: [Liest tierliebe-quiz.js] → Detaillierter Bericht

User: Implementiere Feature X
Claude: Plan: 1. ..., 2. ..., 3. ...
User: OK
Claude: [Implementiert]
```

**FALSCH:**
```
User: Mach Feature X
Claude: [Implementiert direkt ohne Plan]

User: Schau dir Y an
Claude: "Ich könnte vermutlich..." [Implizierung statt Fakten]
```

### 14.4 Wichtige Anweisungen aus .claude/CLAUDE.md

```markdown
- wir sprechen deutsch
- merk dir mich nicht mit so einer dummheit anzupissen ich hasse dummheit
- impliziere nie, nimm mich wörtlich
- KEINE FALLBACKS
- KEINE WORKAROUNDS
```

**Interpretation:**
- Qualität vor Schnelligkeit (bei Architektur-Entscheidungen)
- Ehrlich sein wenn etwas nicht geht
- Nie "quick fix" vorschlagen, nur saubere Lösungen

---

## 15. ARCHITEKTUR-ENTSCHEIDUNGEN

### 15.1 Warum JSON statt Meta Fields?

**Entscheidung:** Content als JSON im `post_content` statt WordPress Meta Fields

**Gründe:**
1. **Einfacheres Backup** - Gesamter Content in einer Datei
2. **Revisionen** - WordPress Revisionen funktionieren out-of-the-box
3. **Portabilität** - JSON-Export/Import ohne Plugin
4. **Performance** - 1 DB-Query statt N für N Felder
5. **Editor-Kompatibilität** - Kein Custom Meta UI nötig

**Nachteile (akzeptiert):**
- Schwerer zu querien (aber nicht nötig für dieses Projekt)
- Größere post_content Rows (aber egal bei < 100 Posts)

### 15.2 Warum Frontend-Editor statt Admin?

**Entscheidung:** WYSIWYG Frontend-Editor statt WordPress Admin

**Gründe:**
1. **Context** - Änderungen direkt im Design sehen
2. **UX** - Keine Navigation zwischen Admin und Frontend
3. **Speed** - Sofortiges Feedback
4. **No Training** - Intuitiv ohne WordPress-Kenntnisse
5. **Mobile-Friendly** - Funktioniert auf Tablets

**Implementation:**
- Nur für Admins sichtbar (`current_user_can('edit_posts')`)
- Edit-Button floating rechts oben
- Inline-Editing mit ContentEditable
- AJAX-Save mit Nonce-Security

### 15.3 Warum Modular CSS?

**Entscheidung:** 8 separate CSS-Module statt 1 Monolith

**Gründe:**
1. **Maintainability** - Klare Trennung nach Verantwortlichkeit
2. **Collaboration** - Mehrere Devs können parallel arbeiten
3. **Debugging** - Schneller finden wo Styles herkommen
4. **Caching** - Browser cached Module separat
5. **Selective Loading** - Zukünftig möglich (Critical CSS)

**Dependencies in functions.php:**
```php
wp_enqueue_style('tierliebe-core', ..., array(), '6.0.0');
wp_enqueue_style('tierliebe-layout', ..., array('tierliebe-core'), '6.0.0');
```

### 15.4 Warum Custom Walker?

**Entscheidung:** Custom Walker statt YOOtheme/UIKit Navigation

**Problem:**
- YOOtheme injiziert UIKit-CSS-Klassen (`uk-nav`, `uk-dropdown`)
- Passt nicht zum Custom Pastel-Design
- Schwer zu überschreiben (specificity wars)

**Lösung:**
```php
class Tierliebe_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= "\n<ul class=\"sub-menu\">\n";
    }
    // Clean HTML ohne UIKit-Ballast
}
```

### 15.5 Warum keine lokale WordPress-Installation?

**Entscheidung:** Entwicklung direkt auf Live-Server

**Gründe:**
1. **Schnellerer Feedback-Loop** - Keine Sync-Probleme
2. **Ein Environment** - Keine Unterschiede zwischen Lokal/Live
3. **Einfacheres Deployment** - FTP Upload, keine DB-Migration
4. **Kleine Website** - Traffic gering, Live-Testing OK

**Nachteile (akzeptiert):**
- Keine Fehler-Isolation (Live-Site kann kurz broken sein)
- Aber: Zero-Traffic während Entwicklung, akzeptables Risiko

---

## 16. CODE-STANDARDS & BEST PRACTICES

### 16.1 PHP Standards

**Naming Conventions:**
```php
// Functions: tierliebe_{action}
function tierliebe_enqueue_assets() {}
function get_tierliebe_text($page_slug) {}

// Classes: Tierliebe_{Name}
class Tierliebe_Walker_Nav_Menu extends Walker_Nav_Menu {}

// Post Type: tierliebe_text
// Taxonomy: tierliebe_category (falls nötig)
```

**Security:**
```php
// HTML erlaubt (für Rich Text)
echo wp_kses_post($content['text']);

// Nur Text
echo esc_html($content['title']);

// URLs
echo esc_url($content['link']);

// Attributes
echo esc_attr($content['class']);

// AJAX Nonce
check_ajax_referer('tierliebe_edit_nonce', 'nonce');
if (!current_user_can('edit_posts')) {
    wp_send_json_error('Keine Berechtigung');
}
```

**Performance:**
```php
// Transient Caching
$cached = get_transient('tierliebe_text_' . $page_slug);
if ($cached !== false) return $cached;
set_transient('tierliebe_text_' . $page_slug, $content, HOUR_IN_SECONDS);

// Conditional Loading
if (is_page_template('page-tierliebe-qualzucht.php')) {
    wp_enqueue_script('tierliebe-gallery');
}

// Content Filter deaktivieren (beim Save)
remove_filter('content_save_pre', 'wp_filter_post_kses');
wp_update_post(...);
add_filter('content_save_pre', 'wp_filter_post_kses');
```

### 16.2 JavaScript Standards

**Naming Conventions:**
```javascript
// Variables: camelCase
let currentQuestionIndex = 0;
const userAnswers = {};

// Classes: PascalCase
class TierliebeMobileMenu {}

// Functions: camelCase
function autoSaveDraft() {}
function evaluateTest(answers) {}
```

**jQuery Patterns:**
```javascript
// Event Delegation (für dynamische Elemente)
$(document).on('click', '.editable', function() {});

// Chaining
$('.element')
    .addClass('active')
    .fadeIn(300)
    .trigger('custom-event');

// Cache Selectors
const $element = $('.expensive-selector');
$element.addClass('active');
$element.text('New text');
```

### 16.3 CSS Standards

**Naming Convention (BEM-ähnlich):**
```css
/* Block */
.hero-section {}

/* Element */
.hero-section__title {}
.hero-section__subtitle {}

/* Modifier */
.hero-section--compact {}
.button--primary {}

/* State */
.is-active {}
.is-loading {}
```

**Mobile-First:**
```css
/* Base: Mobile */
.container { width: 100%; }

/* Tablet */
@media (min-width: 768px) {
    .container { width: 750px; }
}

/* Desktop */
@media (min-width: 1024px) {
    .container { max-width: 1400px; }
}
```

---

## 17. SPEZIELLE FEATURES

### 17.1 Floating Decorations

**Animierte Pfotenabdrücke im Hintergrund:**
```html
<div class="float-decoration" style="font-size: 8rem;">🐾</div>
<div class="float-decoration" style="font-size: 6rem;">❤️</div>
```

**CSS Animation:**
```css
@keyframes float-gentle {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    25% { transform: translateY(-20px) rotate(3deg); }
    75% { transform: translateY(20px) rotate(-3deg); }
}

.float-decoration {
    animation: float-gentle 8s ease-in-out infinite;
    opacity: 0.3;
    position: absolute;
    pointer-events: none;
}
```

### 17.2 Quiz Progress Bar

**Pfoten-Icon bewegt sich mit Progress:**
```html
<div class="progress-bar">
    <div class="progress-fill" style="width: 37.5%">
        <span class="progress-paw">🐾</span>
    </div>
</div>
```

**JavaScript:**
```javascript
const progress = (answeredCount / totalQuestions) * 100;
$('#progress-fill').css('width', progress + '%');
```

### 17.3 Honesty Box

**Gradient-Box mit Emoji-Icon:**
```html
<div class="honesty-box" data-emoji="💔">
    <h3>Die harte Wahrheit</h3>
    <p>Über 300.000 Tiere in Tierheimen...</p>
</div>
```

**CSS:**
```css
.honesty-box {
    background: linear-gradient(135deg,
        rgba(255, 181, 181, 0.4),
        rgba(255, 214, 232, 0.3));
    border-left: 5px solid var(--cute-coral);
}

.honesty-box::before {
    content: attr(data-emoji);
    font-size: 5rem;
    opacity: 0.2;
    position: absolute;
}
```

### 17.4 Smart Highlighting

**Visuelle Kennzeichnung geänderter Felder:**
```css
body.edit-mode .editable.field-changed {
    outline: 2px solid #f5a623;
    background: rgba(245, 166, 35, 0.1);
    animation: pulse-orange 2s ease-in-out infinite;
}

@keyframes pulse-orange {
    0%, 100% { box-shadow: 0 0 0 0 rgba(245, 166, 35, 0.4); }
    50% { box-shadow: 0 0 0 10px rgba(245, 166, 35, 0); }
}
```

### 17.5 Auto-Save Indicator

**Rechts unten:**
```html
<div id="auto-save-indicator" style="
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: var(--pastel-mint);
    padding: 10px 20px;
    border-radius: 20px;
    font-size: 14px;
    box-shadow: var(--shadow-md);
">
    💾 Auto-Save: vor 2min
</div>
```

---

## 18. TECHNISCHE SCHULDEN & FUTURE WORK

### 18.1 Offene Baustellen

**Templates in Entwicklung:**
- ⏳ page-tierliebe-irrtuemer.php (12 Irrtümer mit Filter)
- ⏳ page-tierliebe-adoption.php (Timeline, Kosten-Tabelle)
- ⏳ page-tierliebe-wissen.php (Multi-Level Tabs)

**Editor Phase 2:**
- Field History (letzte 3-5 Versionen pro Feld)
- Inline Validation (Character Counter, Max-Length)
- Emoji Picker
- Collaboration Hints (Last Editor + Timestamp)

**Editor Phase 3:**
- Dashboard/Overview (Admin Page mit allen Texten)
- Export/Import (Excel/CSV/JSON)
- Bulk Operations
- Search & Replace über alle Felder

**Performance:**
- CSS/JS Minification
- Image Optimization (WebP)
- Lazy Loading für Bilder
- Critical CSS Extraction

### 18.2 Known Issues

**Browser-Kompatibilität:**
- ContentEditable verhält sich unterschiedlich in Safari
- Formatting Toolbar Position auf iOS

**Mobile:**
- Auto-Save Indicator überlappt manchmal Content
- Formatting Toolbar könnte besser positioniert werden

**SEO:**
- Meta Descriptions fehlen (Yoast SEO oder manuell)
- Structured Data (Schema.org) nicht implementiert
- Open Graph Tags fehlen
- XML Sitemap (via Plugin)

**Git:**
- 128 "Auto commit" Messages überfüllen History
- Solution: Squash-Commits für Releases

### 18.3 Dokumentation

**Vorhanden:**
- ✅ PROJECT-OVERVIEW.md (diese Datei)
- ✅ WORKFLOW.md - Operative Anleitung
- ✅ TIERLIEBE_PROJEKT_PLAN.md - Master-Plan
- ✅ EDITOR-ENHANCEMENTS.md - Roadmap
- ✅ DATEISTRUKTUR.md - File-System-Map
- ✅ CSS-MODULE-STRUCTURE.md - CSS-Architektur

**Fehlend:**
- ❌ API-Dokumentation (AJAX Endpoints)
- ❌ Component Library (Storybook)
- ❌ Testing-Strategie
- ❌ Deployment-Guide (für externe Devs)

### 18.4 Testing

**Status:** Keine automatisierten Tests

**Zukünftig:**
- Unit Tests (PHP: PHPUnit)
- JS Tests (Jest)
- E2E Tests (Playwright/Cypress)
- Visual Regression Tests

---

## 19. GIT WORKFLOW

### 19.1 Commit-History

**Pattern erkannt:**

**Phase 1: Rapid Development (Oktober 2025)**
- 128× "Auto commit" - Schnelle Iteration
- Jede kleine Änderung committed

**Phase 2: Feature-Milestones (November 2025)**
```
8c266cb Tierliebe Editor v3.1.0 - Phase 2 Features
f9debfc Tierliebe Editor v3.0.0 - Phase 1 Features
ccc5461 Add editor enhancement roadmap
fb62816 Fix: Remove whitespace pollution when saving edits
94459e1 Add URL editing for buttons/links (right-click)
```

### 19.2 Branch-Strategie

**Current:** Single-Branch (master)

**Zukünftig (optional):**
```
master          # Production
  ├─ develop    # Development
  ├─ feature/*  # Feature-Branches
  └─ hotfix/*   # Hotfixes
```

### 19.3 Commit-Message-Conventions

**Auto-Commits:**
```
Auto commit
```

**Feature-Commits:**
```
Tierliebe Editor v3.1.0 - Phase 2 Features
Add editor enhancement roadmap
Fix: Remove whitespace pollution
```

**Pattern:**
- Features: `{Component} v{Version} - {Description}`
- Fixes: `Fix: {Description}`
- Docs: `Add {document name}`

---

## 20. WICHTIGE ERKENNTNISSE

### 20.1 Was funktioniert hervorragend

1. **Frontend-Editor** - UX ist exzellent, Inline-Editing intuitiv
2. **Modular CSS** - Sehr wartbar, klare Struktur
3. **JSON-CMS** - Einfaches Backup, schnelle Entwicklung
4. **Quiz-System** - Komplexe Logik funktioniert fehlerfrei
5. **Zero-Click Deployment** - Extrem schneller Workflow
6. **Mobile Menu** - Smooth Animations, gute UX

### 20.2 Was besser sein könnte

1. **Content-Migration** - Tools könnten robuster sein
2. **Testing** - Keine automatisierten Tests
3. **Documentation** - Code-Comments könnten besser sein
4. **Error Handling** - Mehr Fallbacks in JS
5. **Performance** - Noch nicht optimiert (Minification, etc.)
6. **Git History** - Zu viele Auto-Commits

### 20.3 Architektur-Highlights

**Separation of Concerns:**
- PHP (Data) ↔ JS (Behavior) ↔ CSS (Presentation)
- Klar getrennt, kaum Inline-Styles/Scripts

**Progressive Enhancement:**
- Base HTML funktioniert ohne JS
- CSS-Only für kritische Features
- JS enhanced die UX

**Modularity:**
- Jedes JS-Modul kann unabhängig geladen werden
- CSS-Module haben klare Dependencies
- Templates sind selbstständig

**Developer Experience:**
- Auto-Upload via SFTP
- Clear File Structure
- Gute Naming Conventions
- Extensive Documentation

### 20.4 Lessons Learned

1. **Documentation is King** - Für stateless Claude-Sessions essentiell
2. **Automation saves Time** - Zero-Click Deployment lohnt sich
3. **Modular beats Monolith** - CSS-Breakup war richtige Entscheidung
4. **Frontend-Editor rocks** - Bessere UX als WordPress Admin
5. **JSON-CMS works** - Einfacher als erwartet

---

## QUICK-START FÜR NEUE CLAUDE-INSTANZEN

### 1. Projekt verstehen (15 Min)
- ✅ Lies diese Datei (PROJECT-OVERVIEW.md)
- ✅ Lies .claude/CLAUDE.md (Regeln)
- ✅ Lies git log (Recent Commits)
- ✅ Check git status (Was wurde geändert?)

### 2. Kontext aufbauen (10 Min)
- ✅ Öffne webworks-theme/functions.php (Kern-Code)
- ✅ Öffne webworks-theme/js/tierliebe-edit-v2.js (Editor)
- ✅ Öffne eines der Templates (z.B. page-tierliebe-home.php)

### 3. Kommunikations-Regeln (5 Min)
- ✅ Deutsch sprechen
- ✅ Wörtlich nehmen, nie implizieren
- ✅ Plan before Code
- ✅ Nach jedem Write/Edit: FTP-Upload ausführen

### 4. Ready to work!
```
User gibt Aufgabe
  ↓
Du analysierst (falls nötig)
  ↓
Du erstellst Plan
  ↓
User approved
  ↓
Du implementierst
  ↓
Du führst FTP-Upload aus
  ↓
Done!
```

---

## ZUSAMMENFASSUNG

Das **Vermehrer/Tierliebe-Projekt** ist eine **außergewöhnlich gut durchdachte WordPress-Implementierung** mit folgenden Stärken:

### Technische Exzellenz
- **Modular CSS Architecture** (v6.0.0) - State-of-the-Art
- **Frontend WYSIWYG Editor** (v3.1.0) - Innovation
- **JSON-basiertes CMS** - Pragmatisch & Effizient
- **Zero-Click Deployment** - Extrem schneller Workflow

### Inhaltliche Tiefe
- **11 spezialisierte Page Templates**
- **Komplexes Quiz-System** mit Scoring & Empfehlungen
- **8 Qualzucht-Rassen** mit Bildern & Fakten
- **Umfassende Aufklärung** über Tierhaltung

### User Experience
- **Pastel Cute Design** - Emotional & Einladend
- **Mobile-First** - Perfekt auf allen Devices
- **Accessibility** - Keyboard Navigation, ARIA
- **Intuitive Navigation** - Desktop & Mobile

### Developer Experience
- **Clear File Structure**
- **Extensive Documentation**
- **Automation-First**
- **Git Workflow**

---

**Das Projekt zeigt professionelle WordPress-Entwicklung auf hohem Niveau mit durchdachter Architektur, sauberer Code-Organisation und exzellenter UX.**

**Ziel:** Tieren helfen durch ehrliche Aufklärung. 🐾❤️

---

**Version:** 1.0.0
**Erstellt:** 5. November 2025
**Für:** Zukünftige Claude-Instanzen
**Von:** Claude (basierend auf umfassender Projekt-Analyse)
