# WordPress SEO Automation Workflow

## Übersicht

Automatische SEO-Optimierung für WordPress-Seiten mit Playwright und The SEO Framework Plugin.

## Dateien

- **`wordpress-seo-automation.js`** - Hauptscript zur SEO-Aktualisierung
- **`wordpress-seo-get-ids.js`** - Hilfsscript zum Extrahieren von WordPress Page-IDs

## Workflow

### 1. Page-IDs extrahieren (bei neuen Seiten)

```bash
node wordpress-seo-get-ids.js
```

**Output:**
- Liste aller WordPress-Seiten mit IDs
- Vorgefilterte Tierliebe-Seiten
- Kopierbare `pageIds` Objekt-Struktur

**Verwendung:**
- Nur beim ersten Mal oder wenn neue Seiten hinzukommen
- IDs in `wordpress-seo-automation.js` unter `pageIds` eintragen

### 2. SEO-Daten vorbereiten

Im `wordpress-seo-automation.js` unter `seoData` Objekt:

```javascript
const seoData = {
  'Seitentitel': {
    title: 'SEO Title (max 60 Zeichen)',
    description: 'Meta Description (max 160 Zeichen)',
    ogTitle: 'Open Graph Title',
    ogDescription: 'Open Graph Description'
  }
}
```

**Best Practices:**
- Title: Kurz, prägnant, Keyword vorne
- Description: Call-to-Action, Mehrwert kommunizieren
- Max. Längen beachten (Google schneidet ab)

### 3. SEO-Automation ausführen

```bash
node wordpress-seo-automation.js
```

**Was passiert:**
1. Login in WordPress Backend
2. Jede Seite wird direkt über Post-ID aufgerufen
3. SEO Framework Meta Box befüllen:
   - Meta Title
   - Meta Description
4. Seite speichern
5. Erfolgsmeldung

**Features:**
- ✅ Error Handling pro Seite
- ✅ Live-Browser-Ansicht (headless: false)
- ✅ Screenshot bei Fehlern
- ✅ Fortschrittsanzeige
- ✅ Speicher-Bestätigung

## Technische Details

### Login-Daten

```javascript
const WP_URL = 'https://vm.andersen-webworks.de/wp-admin';
const USERNAME = 'EAndersen';
const PASSWORD = 'Y2kpr0n!wa';
```

### WordPress Page Structure

```javascript
const pageIds = {
  'Tierliebe – Start': '543',
  'Tierliebe – Adoption': '548',
  // ... weitere Seiten
};
```

**Wichtig:** Der Key muss exakt dem WordPress-Seitentitel entsprechen (inkl. `–` = Langstrich)

### The SEO Framework Selektoren

- **Meta Title:** `input[name="autodescription[_genesis_title]"]` oder `#autodescription_title`
- **Meta Description:** `textarea[name="autodescription[_genesis_description]"]` oder `#autodescription_description`
- **OG Title:** `input[name="autodescription[_open_graph_title]"]` oder `#autodescription_og_title`
- **OG Description:** `textarea[name="autodescription[_open_graph_description]"]` oder `#autodescription_og_description`

## Erweiterte Optionen

### Social Tab öffnen (für OG-Felder)

```javascript
const socialTab = page.locator('button[data-tsf-tab="social"]');
if (await socialTab.count() > 0) {
  await socialTab.click();
  await page.waitForTimeout(500);
}
```

### Headless Mode

```javascript
const browser = await chromium.launch({
  headless: true  // Browser unsichtbar
});
```

### Timeout anpassen

```javascript
page.setDefaultTimeout(60000);  // 60 Sekunden
```

## Troubleshooting

### Problem: Seiten nicht gefunden

**Ursache:** Seitentitel stimmt nicht mit WordPress überein
**Lösung:** `wordpress-seo-get-ids.js` ausführen und IDs neu prüfen

### Problem: Social-Felder nicht sichtbar

**Ursache:** Tab ist eingeklappt
**Lösung:** Social-Tab öffnen (siehe Erweiterte Optionen)

### Problem: Browser schließt zu früh

**Ursache:** Timeout zu kurz
**Lösung:** `await page.waitForTimeout(10000)` vor `browser.close()` erhöhen

## Beispiel-Output

```
🚀 WordPress SEO Automation gestartet

🔐 Login zu WordPress...
✅ Login erfolgreich

📝 Bearbeite Seite: Tierliebe – Start (ID: 543)
📊 SEO Framework Meta Box gefunden
  ✓ Title: Tierliebe - Du liebst Tiere? Dann lies, was du wissen musst
  ✓ Description: Ehrliche Fakten über Tierhaltung...
  → Speichere...
✅ Seite Tierliebe – Start gespeichert

✨ Fertig! 11 Seiten aktualisiert, 0 Fehler
```

## Zukünftige Erweiterungen

- [ ] Automatische Keyword-Analyse
- [ ] Fokus-Keyword setzen
- [ ] Schema Markup automatisch generieren
- [ ] Bulk-Edit für mehrere Seiten gleichzeitig
- [ ] CSV-Import für SEO-Daten

## Notizen

- **Plugin:** The SEO Framework (nicht Yoast oder RankMath)
- **Server:** KAS (w018c99c.kasserver.com)
- **Domain:** vm.andersen-webworks.de
- **Projekt:** Tierliebe Kampagne

---

**Erstellt:** 2025-01-29
**Letzte Aktualisierung:** 2025-01-29
**Status:** ✅ Produktiv
