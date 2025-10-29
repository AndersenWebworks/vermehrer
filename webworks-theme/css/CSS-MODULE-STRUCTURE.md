# Tierliebe CSS - Modulare Architektur v6.0.0

## Übersicht

Die monolithische `tierliebe.css` (3781 Zeilen, 76 KB) wurde in 7 modulare Dateien aufgeteilt für bessere Wartbarkeit und Performance.

## Module

### 1. tierliebe-core.css (223 Zeilen, 4.5 KB)
**Grundlegende Definitionen - Lädt zuerst**
- CSS Variables (Farben, Schatten)
- Global Reset & Base Styles
- Typography (h1-h6)
- Links & Focus States
- Emoji & Icon Standardization
- Decorative Floating Elements
- Blob Shapes

### 2. tierliebe-layout.css (305 Zeilen, 6.7 KB)
**Seitenlayout und Strukturen**
- Hero Section
- Sections & Containers
- Info Boxes & Cards
- Decision Panels
- Footer

### 3. tierliebe-navigation.css (365 Zeilen, 8.5 KB)
**Navigation (Desktop & Mobile)**
- Header Styles
- Logo & Branding
- Desktop Navigation
- Mobile Menu Toggle
- Mobile Navigation Panel
- Dropdown Menus

### 4. tierliebe-components.css (1017 Zeilen, 21.3 KB)
**Wiederverwendbare Komponenten**
- Accordion
- Tab System
- Buttons
- Forms
- Quiz Section
- Gallery
- Animal Cards
- Scroll-to-Top

### 5. tierliebe-pages.css (1075 Zeilen, 23.4 KB)
**Seitenspezifische Styles**
- Irrtuemer Page (Mythen-Filter)
- Adoption Page (Comparison Grid, Timeline)
- Qualzucht Page
- Wissen Page (Tab System)
- Kontakt Page
- Exoten Page
- Mobile Nav Details
- Utility Classes

### 6. tierliebe-animations.css (425 Zeilen, 9.3 KB)
**Animationen und Effekte**
- Keyframe Animations
- Button Ripple Effect
- Accordion Animations
- Tab Transitions
- Filter Stagger
- Menu Animations
- Form Feedback States
- Hover Effects

### 7. tierliebe-responsive.css (411 Zeilen, 7.0 KB)
**Media Queries - Lädt zuletzt**
- Tablet Breakpoint (max-width: 1200px)
- Mobile Breakpoint (max-width: 968px)
- Page-spezifische Responsive Regeln
  - Adoption Page Responsive
  - Qualzucht Page Responsive
  - Wissen Page Responsive

## Ladereihenfolge

Die Module werden in dieser Reihenfolge geladen (via `functions.php`):

```php
1. tierliebe-core.css         (keine Dependencies)
2. tierliebe-layout.css       (depends: core)
3. tierliebe-navigation.css   (depends: core)
4. tierliebe-components.css   (depends: core)
5. tierliebe-pages.css        (depends: core, components)
6. tierliebe-animations.css   (depends: core)
7. tierliebe-responsive.css   (depends: all above)
```

## Vorteile

- **Wartbarkeit**: Jedes Modul hat einen klaren Zweck
- **Performance**: Nur benötigte Module können geladen werden
- **Zusammenarbeit**: Mehrere Entwickler können parallel arbeiten
- **Debugging**: Fehler sind leichter zu lokalisieren
- **Caching**: Module können separat gecacht werden

## Backup

Die Original-Datei wurde gesichert als:
- `tierliebe.css.backup`
- `functions.php.backup`

## Migration

Keine Anpassungen im HTML/PHP nötig. Die `functions.php` lädt alle Module automatisch.
