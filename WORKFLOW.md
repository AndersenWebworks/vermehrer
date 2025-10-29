# Tierliebe-Projekt: Workflow & Dokumentation

## Projekt-Übersicht

**Live-URL:** https://vm.andersen-webworks.de/tierliebe-start
**GitHub Repo:** `c:\Andersen\Webworks\GitHub\Webworks\vermehrer`
**Theme-Pfad:** `webworks-theme/`
**Aktueller Stand:** Version 3.0.0 (CSS), 11 Seiten live

---

## 1. Dateistruktur

```
vermehrer/
├── .vscode/
│   ├── ftp-upload.ps1          ← UNIVERSELLES Upload-Script (nutze NUR dieses!)
│   ├── settings.json
│   └── tasks.json
├── webworks-theme/
│   ├── css/
│   │   └── tierliebe.css       ← Haupt-CSS (Version 3.0.0)
│   ├── js/
│   │   ├── tierliebe-quiz.js
│   │   ├── tierliebe-tabs.js
│   │   ├── tierliebe-accordion.js
│   │   ├── tierliebe-filter.js
│   │   └── tierliebe-gallery.js
│   ├── tierliebe-parts/
│   │   ├── header.php
│   │   └── footer.php
│   ├── page-tierliebe-home.php     (543)
│   ├── page-tierliebe-test.php     (544)
│   ├── page-tierliebe-hunde.php    (545)
│   ├── page-tierliebe-katzen.php   (546)
│   ├── page-tierliebe-kleintiere.php (547)
│   ├── page-tierliebe-adoption.php (548)
│   ├── page-tierliebe-qualzucht.php (549)
│   ├── page-tierliebe-wissen.php   (550)
│   ├── page-tierliebe-exoten.php   (551)
│   ├── page-tierliebe-irrtuemer.php (552)
│   ├── page-tierliebe-kontakt.php  (553)
│   └── functions.php            ← Enqueue CSS/JS, Custom Walker
├── briefing.md                  ← Original-Briefing (Farbpalette, Testfragen)
├── TIERLIEBE_PROJEKT_PLAN.md    ← Vollständiger Projektplan
└── WORKFLOW.md                  ← DIESE DATEI
```

---

## 2. FTP-Upload Workflow

### ⚠️ WICHTIG: Nutze NUR das universelle Script!

**RICHTIG:**
```bash
powershell -ExecutionPolicy Bypass -File ".vscode/ftp-upload.ps1"
```

**FALSCH:**
- ❌ NICHT neue Upload-Scripts erstellen (.vscode/upload-css.ps1, etc.)
- ❌ NICHT separate Scripts für einzelne Dateien

### Was das Script macht:
1. Findet ALLE von git getrackten geänderten Dateien (`git diff` + `git diff --cached`)
2. Lädt sie automatisch via FTP hoch
3. Ignoriert `.git`, `.vscode`, `node_modules`, `.map` Dateien

### FTP-Credentials (bereits im Script):
- Server: `ftp://w018c99c.kasserver.com`
- User: `w018c99c`
- Pass: `aUMmFsmPb8aHF2v4`
- Remote Path: `/vm.andersen-webworks.de/wp-content/themes/`

---

## 3. CSS Workflow

### CSS-Datei bearbeiten:
```
webworks-theme/css/tierliebe.css
```

### IMMER nach Änderungen:
1. **Version erhöhen** (in CSS-Datei Header):
   ```css
   /**
    * Version: 3.0.0  ← HIER erhöhen
    */
   ```

2. **Version in functions.php synchronisieren**:
   ```php
   wp_enqueue_style(
       'tierliebe-style',
       get_stylesheet_directory_uri() . '/css/tierliebe.css',
       array(),
       '3.0.0'  ← HIER synchronisieren
   );
   ```

3. **Hochladen**:
   ```bash
   powershell -ExecutionPolicy Bypass -File ".vscode/ftp-upload.ps1"
   ```

### Versioning-Schema:
- **Major (3.0.0 → 4.0.0)**: Breaking Changes, große Features
- **Minor (3.0.0 → 3.1.0)**: Neue Features, keine Breaking Changes
- **Patch (3.0.0 → 3.0.1)**: Bugfixes, kleine Änderungen

---

## 4. CSS-Architektur

### Root-Variablen:
```css
:root {
    /* Pastel Palette */
    --pastel-mint: #B8E6D5;
    --pastel-pink: #FFD6E8;
    --pastel-peach: #FFE5D0;
    --pastel-lavender: #E0D4F7;
    --pastel-blue: #C7E7F5;
    --pastel-cream: #FFF8E7;
    --pastel-sage: #D4E5D4;
    --pastel-coral: #FFB5B5;

    /* Cute Accents */
    --cute-coral: #FF9A9E;
    --cute-mint: #A0E7E5;
    --cute-butter: #FFF4A3;
    --cute-lilac: #D5B9F5;
    --cute-sky: #A8DAFF;

    /* Text */
    --text-dark: #5A4A42;
    --text-medium: #8B7E74;
    --text-light: #B8AFA7;

    /* Backgrounds */
    --bg-cream: #FFFBF5;
    --bg-white: #FFFFFF;

    /* Shadows */
    --shadow-sm: 0 2px 8px rgba(90, 74, 66, 0.08);
    --shadow-md: 0 4px 16px rgba(90, 74, 66, 0.1);
    --shadow-lg: 0 8px 24px rgba(90, 74, 66, 0.12);
    --shadow-xl: 0 12px 40px rgba(90, 74, 66, 0.15);
}
```

### Wichtige CSS-Komponenten:

#### Buttons:
- `.btn` - Base button
- `.btn-primary` - Coral button (Call-to-Action)
- `.btn-secondary` - Mint button
- `.hero-buttons` - Button container im Hero

#### Info-Boxen:
- `.info-box` - Base info box
- `.info-box.warning` - Coral border
- `.info-box.info` - Mint border
- `.info-box.love` - Pink border
- `.responsibility-box` - Spezielle Box mit ⚡ Emoji (WICHTIG: `content: '⚡' !important`)

#### Accordions:
- `.accordion` - Container
- `.accordion-item` - Einzelnes Item
- `.accordion-header` - Klickbarer Header (Button)
- `.accordion-icon` - +/× Icon
- `.accordion-content` - Content (max-height transition)
- `.accordion-item.active` - Expanded state

#### Tabs:
- `.tab-buttons` - Tab-Button Container
- `.tab-btn` - Tab-Button
- `.tab-btn.active` - Aktiver Tab
- `.tab-content` - Tab Content
- `.tab-content.active` - Sichtbarer Content
- `.sub-tab-btn` / `.sub-tab-content` - Sub-Tabs (Wissen-Seite)

#### Navigation:
- `.header` - Fixed header
- `.main-nav` - Navigation container
- `.nav-links` - UL mit Links
- `.sub-menu` - Dropdown submenu
- `.mobile-menu-toggle` - Hamburger button
- `.mobile-menu-toggle.active` - X-Icon state
- `.main-nav.active` - Sichtbares Mobile Menu

#### Filter (Mythen-Seite):
- `.filter-buttons` - Filter container
- `.filter-btn` - Filter button
- `.filter-btn.active` - Aktiver filter
- `.mythen-grid` - Card grid
- `.mythos-card` - Einzelne card

#### Emojis:
- `.emoji` - Base emoji class
- `.emoji-sm` - 1.2rem
- `.emoji-md` - 1.8rem
- `.emoji-lg` - 2.5rem
- `.emoji-xl` - 3.5rem

---

## 5. Accessibility Best Practices (Version 3.0.0+)

### ALLE interaktiven Elemente MÜSSEN haben:
```css
element:hover { /* visuelles feedback */ }
element:focus {
    outline: 3px solid COLOR;
    outline-offset: 2px;
}
element:focus-visible {
    outline: 3px solid COLOR;
    outline-offset: 2px;
}
element:active { /* pressed state */ }
```

### Focus-Farben:
- Buttons/Links: `--cute-coral` (#FF9A9E)
- Tabs: `--cute-mint` (#A0E7E5)
- Sub-Tabs: `--cute-lilac` (#D5B9F5)

---

## 6. PHP Template Workflow

### Template-Header Format:
```php
<?php
/**
 * Template Name: Tierliebe - Seitenname
 * Template Post Type: page
 * Description: Beschreibung
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');
?>
```

### Template-Footer:
```php
<?php get_template_part('tierliebe-parts/footer'); ?>
```

### Datei bearbeiten → Hochladen:
Automatisch via FTP-Script (siehe oben)

---

## 7. WordPress-Seiten erstellen (REST API)

### Credentials:
- Username: `EAndersen`
- App Password: `m0jD Ot5r 4ISS byni rJvm dbZQ`

### Neue Seite erstellen:
```bash
curl -X POST "https://vm.andersen-webworks.de/wp-json/wp/v2/pages" \
  -u "EAndersen:m0jD Ot5r 4ISS byni rJvm dbZQ" \
  -H "Content-Type: application/json" \
  --data-raw '{
    "title":"Seitentitel",
    "slug":"seiten-slug",
    "status":"publish",
    "template":"page-tierliebe-name.php"
  }'
```

**WICHTIG:** Umlaute in JSON als ae/oe/ue schreiben!

### Bestehende Seiten-IDs:
- 543: tierliebe-start
- 544: tierliebe-test
- 545: tierliebe-hunde
- 546: tierliebe-katzen
- 547: tierliebe-kleintiere
- 548: tierliebe-adoption
- 549: tierliebe-qualzucht
- 550: tierliebe-wissen
- 551: tierliebe-exoten
- 552: tierliebe-mythen
- 553: tierliebe-kontakt

---

## 8. Häufige Probleme & Lösungen

### Problem: Button unterschiedliche Größen
**Ursache:** Padding nicht konsistent, kein `flex: 1 1 0`
**Lösung:**
```css
.hero-buttons .btn {
    flex: 1 1 0;
    max-width: 300px;
    padding: 18px 28px;
}
```

### Problem: Info-Box Emoji fehlt
**Ursache:** `content: attr(data-emoji)` überschreibt hardcoded emoji
**Lösung:**
```css
.responsibility-box::before {
    content: '⚡' !important;  /* !important erzwingt hardcoded emoji */
}
```

### Problem: CSS-Änderungen nicht sichtbar
**Ursache:** Browser-Cache
**Lösung:**
1. Version in CSS-Header erhöhen
2. Version in functions.php synchronisieren
3. Hard-Refresh: Strg+Shift+R (Chrome) / Strg+F5 (Firefox)

### Problem: Accordion öffnet nicht
**Ursache:** JavaScript nicht geladen oder `.active` Klasse fehlt
**Lösung:**
- Prüfe Browser Console auf JS-Fehler
- Prüfe ob `tierliebe-accordion.js` in functions.php enqueued ist
- Prüfe ob CSS `.accordion-item.active` existiert

### Problem: Mobile Navigation zeigt nicht
**Ursache:** `.main-nav.active` Klasse wird von JS nicht gesetzt
**Lösung:**
- Prüfe ob Mobile-Breakpoint erreicht (max-width: 968px)
- Prüfe Browser Console auf JS-Fehler
- Prüfe ob `.mobile-menu-toggle` Event-Listener hat

---

## 9. Git Workflow

### Vor Upload IMMER:
```bash
git status  # Check was geändert wurde
```

### Nach wichtigen Änderungen:
```bash
git add .
git commit -m "Beschreibung der Änderungen"
```

### Wichtige Commits:
- CSS-Version-Bumps
- Neue Templates
- Größere Bugfixes
- Feature-Adds

---

## 10. Testing Checklist

### Nach CSS-Änderungen:
- [ ] Desktop (1920px) - Chrome
- [ ] Tablet (768px) - Chrome DevTools
- [ ] Mobile (375px) - Chrome DevTools
- [ ] Keyboard Navigation (Tab-Taste)
- [ ] Screen Reader (optional, aber empfohlen)

### Nach Template-Änderungen:
- [ ] Seite lädt ohne Fehler
- [ ] Navigation funktioniert
- [ ] Links funktionieren
- [ ] Forms funktionieren (Kontakt-Seite)
- [ ] JavaScript läuft (Accordions, Tabs, Quiz)

### Accessibility Check:
- [ ] Alle Buttons mit Tab erreichbar
- [ ] Focus States sichtbar
- [ ] Hover States funktionieren
- [ ] Alt-Texte für Bilder (falls vorhanden)
- [ ] Kontrast ausreichend (WCAG AA)

---

## 11. Nächste Schritte / TODO

### Offene Content-Migration:
- [ ] Home-Seite: Weitere Sektionen hinzufügen
- [ ] Test-Seite: Fragen-Content prüfen
- [ ] Alle Seiten: Finale Inhalts-Review

### Technische Verbesserungen:
- [ ] JavaScript minifizieren für Production
- [ ] Bilder optimieren (WebP-Format)
- [ ] Lazy Loading für Bilder
- [ ] Critical CSS inline
- [ ] WordPress-Menü konfigurieren

### Performance:
- [ ] PageSpeed Insights Test
- [ ] GTmetrix Test
- [ ] Lighthouse Audit

---

## 12. Wichtige Notizen

### User-Präferenzen:
- Sprache: Deutsch
- Keine Fallbacks
- Keine Workarounds
- Wörtlich nehmen, nicht implizieren
- Sorgfältig arbeiten

### Design-Prinzipien:
- Pastel-Stil (cute, freundlich)
- Emojis für emotionale Connection
- Gerundete Ecken (25-45px border-radius)
- Sanfte Schatten (layered shadows)
- Keine harten Kontraste

### Content-Prinzipien:
- 1:1 Content-Migration (KEINE Kürzungen!)
- Ehrliche, direkte Sprache
- Fakten-basiert
- Tierschutz-fokussiert

---

## 13. Kontakte & Support

### Projekt-Owner:
- Annemarie Andersen
- E-Mail: (siehe briefing.md)
- Website: www.annemarie-andersen.de

### FTP-Host:
- KAS Server (w018c99c.kasserver.com)

### WordPress:
- Backend: https://vm.andersen-webworks.de/wp-admin
- User: EAndersen

---

**Letzte Aktualisierung:** 2025-10-29
**Dokumentiert von:** Claude (Version 3.0.0 Release)
**Status:** Produktiv, 11 Seiten live
