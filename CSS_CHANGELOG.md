# Tierliebe CSS Changelog

## Version 3.0.0 (2025-10-29) - MAJOR UPDATE

### ✨ Neue Features:
- **Accessibility Overhaul**: Comprehensive focus/hover/active states für ALLE interaktiven Elemente
- **Global Link States**: `:focus`, `:focus-visible`, `:active` für alle Links
- **Emoji Standardization**: `.emoji`, `.emoji-sm/md/lg/xl` Utility-Klassen
- **Text-Overflow Handling**: `word-wrap`, `overflow-wrap`, `hyphens: auto` auf body
- **FadeIn Animation**: Hinzugefügt für Tab-Transitions

### 🔧 Verbessert:
- **Button Focus States**: Alle Buttons (Primary, Secondary) mit Outline-Focus
- **Accordion Focus States**: Header mit Focus-Outline und Active-State
- **Tab Focus States**: Main Tabs und Sub-Tabs keyboard-navigierbar
- **Filter-Button Focus**: Mythen-Seite Filter vollständig accessible
- **Navigation Focus**: Alle Nav-Links mit Focus-States

### 🎨 Styling-Änderungen:
- Focus Outline Color: `--cute-coral` für Buttons/Links
- Focus Outline Color: `--cute-mint` für Tabs
- Focus Outline Color: `--cute-lilac` für Sub-Tabs
- Outline Offset: 2-3px für bessere Sichtbarkeit
- Active States: Transform scale(0.98) für taktiles Feedback

### 🐛 Bugfixes:
- FadeIn Animation war referenziert aber nicht definiert
- Text-Overflow bei langen deutschen Wörtern

---

## Version 2.4.1 (2025-10-29)

### 🐛 Bugfixes:
- **Responsibility-Box Emoji Fix**: `content: '⚡' !important` um attr(data-emoji) Override zu verhindern
- Emoji-Kreis war leer auf Home-Seite

---

## Version 2.4.0 (2025-10-29)

### 🎨 Styling-Änderungen:
- **Info-Box Redesign**:
  - Border: `5px` → `3px` (subtiler)
  - Border-Radius: `40px` → `25px` (ausgewogener)
  - Padding: `45px` → `40px 35px` (kompakter)
  - Emoji-Circle: `80px` → `70px` (proportional besser)
  - Emoji-Border: `5px` → `3px` (konsistent mit Box)
  - Shadow auf Emoji-Circle hinzugefügt
- **Typography**:
  - H3/H4 in Info-Box: `1.8rem` → `1.4rem`
  - Paragraph in Info-Box: `1.1rem` → `1.05rem`
  - List-Items: `1.05rem` → `1rem`

### 📱 Responsive:
- Info-Box Tablet: `35px 25px` padding, `22px` border-radius
- Info-Box Mobile: `30px 20px` padding, `20px` border-radius
- Emoji-Circle scaling für Mobile/Tablet

---

## Version 2.3.0 (2025-10-29)

### 🎨 Styling-Änderungen:
- **Button Redesign**:
  - Konsistentes Padding: `16px 32px` (base), `18px 28px` (hero)
  - Border-Radius: `50px` → `35px`
  - Font-Weight: `500` → `600`
  - Display: `inline-block` → `inline-flex` (bessere Zentrierung)
  - Line-Height: `1.5` hinzugefügt
- **Hero-Buttons**:
  - `flex: 1` → `flex: 1 1 0` (gleiche Größe garantiert)
  - `max-width: 700px` → `max-width: 100%`
  - Button `max-width: 300px` hinzugefügt
  - Gap: `25px` → `20px`
- **Box-Shadows**:
  - Primary Button: `6px` → `4px` Y-Offset
  - Secondary Button: Shadow hinzugefügt (`var(--shadow-md)`)
  - Konsistente Hover-Shadows

### 📐 Typography:
- **H1**: `font-size: 2.5rem`, `line-height: 1.4`, `margin-bottom: 1.5rem`
- **H2**: `font-size: 2rem`, `line-height: 1.4`, `margin-bottom: 1.25rem`
- **H3**: `font-size: 1.5rem`, `line-height: 1.5`, `margin-bottom: 1rem`
- **H4**: `font-size: 1.25rem`, `line-height: 1.5`, `margin-bottom: 0.75rem`
- **Font-Weight**: Alle Headings einheitlich `600`

### 📏 Spacing:
- **Section Padding**: `100px 30px` → `80px 40px` (Desktop)
- **Section Padding Mobile**: `100px 20px` → `60px 25px`
- **Hero Padding Mobile**: `100px 20px 60px` → `80px 25px 50px`

### 🔧 Komponenten:
- **Mobile-Menu-Toggle**:
  - Min-Size: `48px × 48px` (Touch-Target konform)
  - Border-Radius: `8px` hinzugefügt
  - Besseres Padding/Alignment
- **Quick-Links-Grid**:
  - Grid: `auto-fit` → `repeat(3, 1fr)` (feste Spalten)
  - Padding: `30px` → `30px 20px` (horizontal reduziert)
  - Overflow: hidden
  - Word-wrap: break-word

### 📱 Responsive:
- Button-Stacking Mobile optimiert
- Gap reduziert auf Mobile
- Font-Sizes angepasst

---

## Version 2.2.0 (2025-10-29)

### 🐛 Bugfixes:
- Cache-Break für Button-Fixes

---

## Version 2.1.0 (Pre-Documentation)

### Basis-Features:
- Accordion System
- Tab System (Main + Sub)
- Decision Panels
- Info-Boxen (warning/info/love)
- Filter-Buttons (Mythen-Seite)
- Navigation (Desktop + Mobile)
- Hero Sections
- Quick-Links-Grid
- Responsive Breakpoints

---

## CSS-Struktur

### Komponenten-Reihenfolge:
1. CSS Variables
2. Global Reset & Base Styles
3. Links & Focus States
4. Emoji & Icon Standardization
5. Decorative Floating Elements
6. Header & Navigation
7. Buttons
8. Sections
9. Hero Sections
10. Info-Boxen
11. Decision Panels
12. Honesty Box
13. Accordion
14. Tabs
15. Filter (Mythen)
16. Qualzucht Cards
17. Wissen Tables/Glossar
18. Quick-Links
19. Responsive Media Queries

### Responsive Breakpoints:
- `1200px`: Tablet/Small Laptop
- `968px`: Mobile Menu aktiviert
- `768px`: Tablet adjustments
- `640px`: Mobile optimizations

---

## Naming Conventions

### BEM-ähnlich:
- Block: `.accordion`
- Element: `.accordion-header`, `.accordion-content`
- Modifier: `.accordion-item.active`

### State-Classes:
- `.active` - Expanded/Selected state
- `.hidden` - Display none
- `.open` - Alternative zu active

### Utility Classes:
- `.emoji-{size}` - Emoji sizing
- `.container` - Max-width container
- `.section` - Content section

---

## Browser-Support

### Tested:
- Chrome/Edge (Chromium) ✅
- Firefox ✅
- Safari (assumed based on standards) ⚠️

### CSS Features verwendet:
- CSS Custom Properties (CSS Variables)
- Flexbox
- CSS Grid
- CSS Transitions
- CSS Animations
- Focus-Visible (moderne Browser)

---

**Maintained by:** Claude
**Project:** Tierliebe Animal Welfare Portal
**Last Update:** 2025-10-29
