# Dateistruktur - Tierliebe-Projekt (Vermehrer)

**Version:** 1.0
**Erstellt:** 2025-10-30
**Projekt:** VM-Website (https://vm.andersen-webworks.de/)

---

## 📁 Haupt-Verzeichnisstruktur

```
vermehrer/
├── webworks-theme/          ← WordPress Theme (Hauptprojekt)
├── examples/                ← HTML-Beispiele
├── node_modules/            ← NPM Dependencies
├── briefing.md              ← Projekt-Briefing (Farbpalette, Fragen, Konzept)
├── TIERLIEBE_PROJEKT_PLAN.md ← Vollständiger Umsetzungsplan
├── DATEISTRUKTUR.md         ← Diese Datei
├── vermehrer.code-workspace ← VS Code Workspace
├── sftp.json                ← SFTP-Konfiguration
├── backup.json              ← Backup-Konfiguration
└── style-backup.less        ← LESS Backup

```

---

## 🎨 WordPress Theme: webworks-theme/

### Root-Dateien
```
webworks-theme/
├── style.css                    ← Theme-Header (WordPress Requirement)
├── screenshot.jpg               ← Theme-Screenshot
├── functions.php                ← WordPress Functions (CSS/JS Enqueue)
├── functions.php.backup         ← Backup von functions.php
├── create-tierliebe-page.php    ← Utility-Script
└── less/
    └── theme.tangram.less       ← LESS Theme-Basis
```

---

## 📄 WordPress Page Templates

### Tierliebe-Templates (11 Stück)
```
webworks-theme/
├── page-tierliebe-home.php       ← Startseite (Intro + Decision Section)
├── page-tierliebe-test.php       ← Quiz/Test (existiert bereits)
├── page-tierliebe-hunde.php      ← Hunde: Mythen, Fakten, Kosten
├── page-tierliebe-katzen.php     ← Katzen: Mythen, Fakten, Kosten
├── page-tierliebe-kleintiere.php ← Kleintiere: 4 Tabs (Kaninchen, Hamster, Ratten, Degus)
├── page-tierliebe-exoten.php     ← Exoten: 4 Tabs (Wellensittich, Goldfisch, Reptilien, Schildkröten)
├── page-tierliebe-irrtuemer.php  ← Mythen & Irrtümer: 12 Irrtümer mit Filter
├── page-tierliebe-adoption.php   ← Adoption: Zucht/Kauf/Adoption, Prozess, Wirtschaftlichkeit
├── page-tierliebe-qualzucht.php  ← Qualzucht: 8 Rassen mit Bildern
├── page-tierliebe-wissen.php     ← Wissen: 4 Tabs (Kastration, M/W, Wenn's nicht klappt, Glossar)
└── page-tierliebe-kontakt.php    ← Über & Kontakt: Motivation, Angebote, Formular
```

**Naming Convention:** `page-tierliebe-{sektion}.php`

**Template Header:**
```php
/**
 * Template Name: Tierliebe - {Seitenname}
 * Template Post Type: page
 * Description: {Beschreibung}
 * Version: 1.0.0
 */
```

---

## 🧩 Template Partials

```
webworks-theme/
└── tierliebe-parts/
    ├── header.php    ← Tierliebe Header (Navigation, Sticky)
    └── footer.php    ← Tierliebe Footer (Links, Copyright)
```

**Verwendung:**
```php
get_template_part('tierliebe-parts/header');
// Content
get_template_part('tierliebe-parts/footer');
```

---

## 🎨 CSS-Module (Modular Design System)

### Struktur
```
webworks-theme/
└── css/
    ├── tierliebe-core.css         ← Root-Variablen, Basis-Styles, Typography
    ├── tierliebe-layout.css       ← Layout-System (Hero, Section, Grid, Flex)
    ├── tierliebe-components.css   ← UI-Komponenten (Cards, Buttons, Badges)
    ├── tierliebe-navigation.css   ← Navigation (Desktop + Mobile, Sticky)
    ├── tierliebe-pages.css        ← Seiten-spezifische Styles
    ├── tierliebe-animations.css   ← Keyframes, Transitions, Hover-Effekte
    ├── tierliebe-responsive.css   ← Responsive Breakpoints (Mobile-First)
    └── tierliebe.css.backup       ← Backup der alten Monolith-Datei
```

### Module-Details

#### 1. tierliebe-core.css
- CSS Custom Properties (`:root`)
- Pastel-Farbpalette
- Typography (Fredoka, Quicksand, Caveat)
- Shadow-System (sm, md, lg, xl)
- Global Resets
- Basis-Text-Styles

#### 2. tierliebe-layout.css
- `.primary-hero` - Hero-Sektionen
- `.section` - Standard-Sections
- `.grid-2`, `.grid-3`, `.grid-4` - Responsive Grids
- `.flex-center`, `.flex-between` - Flexbox-Utilities
- `.container`, `.container-sm` - Container-Breiten

#### 3. tierliebe-components.css
- **Cards:** `.card`, `.animal-card`, `.decision-card`, `.comparison-panel`
- **Buttons:** `.btn`, `.btn-primary`, `.btn-secondary`
- **Badges:** `.badge`, `.badge-warning`, `.badge-success`
- **Info-Boxes:** `.info-box`, `.honesty-box`
- **Tabs:** `.tab-switcher`, `.tab-btn`, `.tab-content`
- **Accordions:** `.accordion`, `.accordion-item`, `.accordion-content`
- **Filter:** `.filter-buttons`, `.filter-btn`

#### 4. tierliebe-navigation.css
- `.main-nav` - Desktop Navigation
- `.main-nav-mobile` - Mobile Navigation
- `.menu-toggle` - Hamburger-Button
- `.mobile-menu-backdrop` - Overlay
- `.sticky` - Sticky Header

#### 5. tierliebe-pages.css
- Seiten-spezifische Styles
- `.quiz-container` - Test-Seite
- `.qualzucht-card` - Qualzucht-Seite
- `.comparison-panels` - Adoption-Seite
- etc.

#### 6. tierliebe-animations.css
- Keyframes: `emojiWiggle`, `emojiPulse`, `tabFadeIn`, etc.
- Transitions für Cards, Buttons, Forms
- Hover-Effekte
- Mobile-Menu Stagger-Animation
- Form-Feedback States

#### 7. tierliebe-responsive.css
- Mobile-First Breakpoints:
  - `max-width: 480px` - Extra Small (XS)
  - `max-width: 768px` - Small (SM)
  - `max-width: 1024px` - Medium (MD)
  - `max-width: 1200px` - Large (LG)

---

## 📜 JavaScript-Module

### Struktur
```
webworks-theme/
└── js/
    ├── custom.js                   ← Legacy (falls vorhanden)
    ├── quiz.js                     ← Legacy Quiz
    ├── tierliebe-quiz.js           ← Quiz-Logik (Test-Seite)
    ├── tierliebe-tabs.js           ← Tab-Switcher (Multi-Level Support)
    ├── tierliebe-accordion.js      ← Accordion auf/zu
    ├── tierliebe-filter.js         ← Filter für Mythen-Seite
    ├── tierliebe-gallery.js        ← Slideshow für Qualzucht
    ├── tierliebe-mobile-menu.js    ← Mobile Navigation
    ├── tierliebe-desktop-menu.js   ← Desktop Dropdown
    └── tierliebe-keyboard-nav.js   ← Tastatur-Navigation (Accessibility)
```

### Module-Details

#### tierliebe-quiz.js
- Quiz-Logik
- Progress Bar
- Result Calculation
- Local Storage für State

#### tierliebe-tabs.js
- Multi-Level Tab-Switcher
- Auto-Init via `data-tabs` Attribut
- Smooth Content-Wechsel
- URL-Hash Support (optional)

#### tierliebe-accordion.js
- Accordion-Funktion
- Toggle einzelne/alle
- Smooth Expand/Collapse
- `data-accordion` Attribut

#### tierliebe-filter.js
- Filter-Buttons für Mythen-Seite
- Show/Hide Cards nach Kategorie
- Stagger-Animation beim Filtern
- Active-State Management

#### tierliebe-gallery.js
- Slideshow für Qualzucht-Seite
- Prev/Next Navigation
- Auto-Play (optional)
- Lightbox (optional)

#### tierliebe-mobile-menu.js
- Hamburger-Menu Toggle
- Backdrop Overlay
- Body-Scroll Lock
- Stagger-Animation für Menu-Items

#### tierliebe-desktop-menu.js
- Dropdown-Navigation
- Hover/Click Events
- Submenu-Positioning

#### tierliebe-keyboard-nav.js
- Tab-Navigation für Cards
- Enter/Space für Buttons
- Arrow-Keys für Slideshows
- ESC für Modals/Overlays

---

## 📦 Includes & Templates

### includes/
```
webworks-theme/
└── includes/
    └── tierliebe-shortcodes.php    ← WordPress Shortcodes (falls benötigt)
```

### templates/
```
webworks-theme/
└── templates/
    └── quiz-template.php           ← Quiz-Template (Test-Seite)
```

---

## 🖼️ Bilder (Konzept)

**Geplante Struktur:**
```
webworks-theme/
└── images/
    └── tierliebe/
        ├── breeds/             ← Rassen-Bilder (Qualzucht)
        │   ├── mops.jpg
        │   ├── perserkatze.jpg
        │   └── ...
        ├── animals/            ← Tier-Icons/Bilder
        │   ├── hund.svg
        │   ├── katze.svg
        │   └── ...
        └── icons/              ← Custom Icons
            ├── paw.svg
            └── heart.svg
```

**Aktueller Status:** Bilder noch nicht migriert

---

## 📚 Projektdateien

### briefing.md
**Inhalt:**
- Farbpalette (Primär, Sekundär, Akzent, Kontrast)
- Schriftarten (Montserrat, Open Sans, Nunito)
- Button-Styles
- Test-Fragen (8 Fragen mit Antworten)
- Ergebnis-Logik
- Ergebnis-Texte

**Verwendung:** Design-Referenz für Farben, Fonts, UI-Elemente

### TIERLIEBE_PROJEKT_PLAN.md
**Inhalt:**
- 📋 Projekt-Übersicht
- 🎯 Anforderungen & Prinzipien
- 📚 Vollständiges Inhaltsverzeichnis der VM-Seite (15 Sektionen)
- 🗂️ Seitenstruktur (11 WordPress-Templates)
- 🎨 UI-Elemente Übersicht
- 📁 Dateistruktur
- 🎯 Navigation & Menü
- 🔧 Technische Umsetzung
- 📝 Nächste Schritte (Phasen 1-5)
- ✨ Design-Prinzipien
- ✅ Aktueller Status (mit WordPress-Seiten-IDs)
- 🔧 Workflow für Seiten-Erstellung

**Verwendung:** Master-Plan für gesamtes Projekt

### vermehrer.code-workspace
**Typ:** VS Code Workspace-Konfiguration

### sftp.json
**Typ:** SFTP-Upload-Konfiguration für VS Code
**Server:** w018c99c.kasserver.com
**Path:** /vm.andersen-webworks.de/wp-content/themes/webworks-theme/

---

## 🌐 WordPress-Seiten (Live)

### Seiten-IDs & Slugs
| ID  | Slug                  | Template                            | Status |
|-----|-----------------------|-------------------------------------|--------|
| 543 | tierliebe-start       | page-tierliebe-home.php             | ✅ Live |
| 544 | tierliebe-test        | page-tierliebe-test.php             | ✅ Live |
| 545 | tierliebe-hunde       | page-tierliebe-hunde.php            | ✅ Live |
| 546 | tierliebe-katzen      | page-tierliebe-katzen.php           | ✅ Live |
| 547 | tierliebe-kleintiere  | page-tierliebe-kleintiere.php       | ✅ Live |
| 548 | tierliebe-adoption    | page-tierliebe-adoption.php         | ✅ Live |
| 549 | tierliebe-qualzucht   | page-tierliebe-qualzucht.php        | ✅ Live |
| 550 | tierliebe-wissen      | page-tierliebe-wissen.php           | ✅ Live |
| 551 | tierliebe-exoten      | page-tierliebe-exoten.php           | ✅ Live |
| 552 | tierliebe-mythen      | page-tierliebe-irrtuemer.php        | ✅ Live |
| 553 | tierliebe-kontakt     | page-tierliebe-kontakt.php          | ✅ Live |

**URLs:** `https://vm.andersen-webworks.de/tierliebe-{slug}/`

---

## 🔧 Technische Details

### CSS Einbindung (functions.php)
```php
function tierliebe_enqueue_styles() {
    wp_enqueue_style('tierliebe-core', get_template_directory_uri() . '/css/tierliebe-core.css', array(), '1.0.0');
    wp_enqueue_style('tierliebe-layout', get_template_directory_uri() . '/css/tierliebe-layout.css', array('tierliebe-core'), '1.0.0');
    wp_enqueue_style('tierliebe-components', get_template_directory_uri() . '/css/tierliebe-components.css', array('tierliebe-core'), '1.0.0');
    wp_enqueue_style('tierliebe-navigation', get_template_directory_uri() . '/css/tierliebe-navigation.css', array('tierliebe-core'), '1.0.0');
    wp_enqueue_style('tierliebe-pages', get_template_directory_uri() . '/css/tierliebe-pages.css', array('tierliebe-core'), '1.0.0');
    wp_enqueue_style('tierliebe-animations', get_template_directory_uri() . '/css/tierliebe-animations.css', array(), '1.0.0');
    wp_enqueue_style('tierliebe-responsive', get_template_directory_uri() . '/css/tierliebe-responsive.css', array('tierliebe-core'), '1.0.0');
}
add_action('wp_enqueue_scripts', 'tierliebe_enqueue_styles');
```

### JavaScript Einbindung (functions.php)
```php
function tierliebe_enqueue_scripts() {
    wp_enqueue_script('tierliebe-tabs', get_template_directory_uri() . '/js/tierliebe-tabs.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('tierliebe-accordion', get_template_directory_uri() . '/js/tierliebe-accordion.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('tierliebe-filter', get_template_directory_uri() . '/js/tierliebe-filter.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('tierliebe-gallery', get_template_directory_uri() . '/js/tierliebe-gallery.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('tierliebe-mobile-menu', get_template_directory_uri() . '/js/tierliebe-mobile-menu.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('tierliebe-desktop-menu', get_template_directory_uri() . '/js/tierliebe-desktop-menu.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('tierliebe-keyboard-nav', get_template_directory_uri() . '/js/tierliebe-keyboard-nav.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('tierliebe-quiz', get_template_directory_uri() . '/js/tierliebe-quiz.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'tierliebe_enqueue_scripts');
```

### SFTP Upload
**Upload-Methode:** VS Code SFTP Extension
**Config:** sftp.json
**Auto-Upload:** `uploadOnSave: true`

**Manueller Upload:**
- `Strg+Shift+P` → "SFTP: Upload File/Folder"

---

## 📊 CSS-Module-Struktur (Visualisierung)

```
tierliebe-core.css (Basis-Layer)
    ↓
    ├─── tierliebe-layout.css (Layout-System)
    │       ↓
    │       └─── tierliebe-pages.css (Seiten-spezifisch)
    │
    ├─── tierliebe-components.css (UI-Komponenten)
    │       ↓
    │       └─── tierliebe-animations.css (Animations)
    │
    ├─── tierliebe-navigation.css (Navigation)
    │
    └─── tierliebe-responsive.css (Responsive Overrides)
```

**Abhängigkeiten:**
- `tierliebe-core.css` = Root (wird von allen geladen)
- `tierliebe-responsive.css` = Letzter Layer (überschreibt alles)

---

## 🎯 Naming Conventions

### CSS-Klassen
- **BEM-ähnlich:** `.component-name`, `.component-name__element`, `.component-name--modifier`
- **Utility:** `.hidden`, `.visible`, `.text-center`
- **State:** `.active`, `.open`, `.disabled`

### JavaScript
- **Variablen:** camelCase (`tabContent`, `accordionItem`)
- **Funktionen:** camelCase (`initTabs`, `toggleAccordion`)
- **Konstanten:** UPPER_SNAKE_CASE (`MAX_ITEMS`, `API_URL`)

### PHP
- **Funktionen:** snake_case mit Prefix (`tierliebe_enqueue_styles`)
- **Templates:** `page-tierliebe-{sektion}.php`
- **Partials:** `{name}.php` in `tierliebe-parts/`

---

## 🚀 Workflow für zukünftige Instanzen

### 1. Template erstellen
```php
// webworks-theme/page-tierliebe-{neue-seite}.php
<?php
/**
 * Template Name: Tierliebe - {Name}
 * Template Post Type: page
 * Version: 1.0.0
 */
get_template_part('tierliebe-parts/header');
?>
<section class="section">
    <!-- Content -->
</section>
<?php get_template_part('tierliebe-parts/footer'); ?>
```

### 2. Template hochladen
- Datei bearbeiten → Version ändern
- Auto-Upload via SFTP Extension
- Oder: `Strg+Shift+P` → "SFTP: Upload File"

### 3. WordPress-Seite via REST API erstellen
```bash
curl -X POST "https://vm.andersen-webworks.de/wp-json/wp/v2/pages" \
  -u "USERNAME:APPLICATION_PASSWORD" \
  -H "Content-Type: application/json" \
  --data-raw '{"title":"Seitentitel","slug":"tierliebe-slug","status":"publish","template":"page-tierliebe-slug.php"}'
```

### 4. CSS/JS anpassen
- Module in `css/` bearbeiten
- JavaScript in `js/` bearbeiten
- Auto-Upload via SFTP

### 5. Testen
- Desktop: Chrome, Firefox, Safari
- Mobile: Responsive Design Mode
- Accessibility: Tab-Navigation, Screen Reader

---

## 📌 Wichtige Hinweise für zukünftige Instanzen

### User-Präferenzen
1. **Sprache:** Deutsch
2. **Keine Dummheiten:** Klare, präzise Antworten
3. **Wörtlich nehmen:** Nicht implizieren
4. **Keine Fallbacks/Workarounds:** Nur saubere Lösungen

### Projekt-Prinzipien
1. **Sektion-für-Sektion:** Niemals überspringen
2. **Alles 1:1 übernehmen:** Keine Kürzungen
3. **Template-Style beibehalten:** Pastel, cute, konsistent
4. **Kreative UI:** Accordions, Tabs, Panels, Slideshows
5. **Modular CSS:** Nie Inline-Styles, immer Module

### Datei-Locations (absolut)
- **Theme-Root:** `C:\Andersen\Webworks\GitHub\Webworks\vermehrer\webworks-theme\`
- **CSS-Module:** `{Theme-Root}\css\`
- **JavaScript:** `{Theme-Root}\js\`
- **Templates:** `{Theme-Root}\page-tierliebe-*.php`
- **Partials:** `{Theme-Root}\tierliebe-parts\`

### SFTP
- **Host:** w018c99c.kasserver.com
- **User:** w018c99c
- **Remote Path:** /vm.andersen-webworks.de/wp-content/themes/webworks-theme/

---

## ✅ Projekt-Status (Stand: 2025-10-30)

### Abgeschlossen
- ✅ CSS-Modularisierung (7 Module)
- ✅ JavaScript-Module (8 Scripts)
- ✅ 11 WordPress-Templates erstellt
- ✅ Header/Footer Partials
- ✅ functions.php Enqueue
- ✅ 11 WordPress-Seiten live (IDs 543-553)
- ✅ SFTP Auto-Upload konfiguriert

### In Arbeit
- ⏳ Content-Migration (VM-Seite → Templates)
- ⏳ Bilder hochladen
- ⏳ WordPress-Menü konfigurieren
- ⏳ Testing (Desktop, Mobile, Browser)

### Offen
- ⏳ Performance-Optimierung
- ⏳ SEO-Optimierung
- ⏳ Accessibility-Audit
- ⏳ Final Review

---

## 📞 Support & Ressourcen

- **WordPress REST API:** https://developer.wordpress.org/rest-api/
- **Briefing:** [briefing.md](briefing.md)
- **Projekt-Plan:** [TIERLIEBE_PROJEKT_PLAN.md](TIERLIEBE_PROJEKT_PLAN.md)
- **CSS-Module-Struktur:** [webworks-theme/css/CSS-MODULE-STRUCTURE.md](webworks-theme/css/CSS-MODULE-STRUCTURE.md)

---

**Ende der Dokumentation**
