const { chromium } = require('playwright');

const WP_URL = 'https://vm.andersen-webworks.de/wp-admin';
const USERNAME = 'EAndersen';
const PASSWORD = 'Y2kpr0n!wa';

// WordPress Page IDs
const pageIds = {
  'Tierliebe – Adoption': '548',
  'Tierliebe – Exoten': '551',
  'Tierliebe – Hunde': '545',
  'Tierliebe – Katzen': '546',
  'Tierliebe – Kleintiere': '547',
  'Tierliebe – Kontakt': '553',
  'Tierliebe – Mythen': '552',
  'Tierliebe – Qualzucht': '549',
  'Tierliebe – Start': '543',
  'Tierliebe – Test': '544',
  'Tierliebe – Wissen': '550',
};

// SEO-Daten für jede Seite - KEY = WordPress Seitentitel
const seoData = {
  'Tierliebe – Start': {
    title: 'Tierliebe - Du liebst Tiere? Dann lies, was du wissen musst',
    description: 'Ehrliche Fakten über Tierhaltung: Adoption, Qualzucht, artgerechte Haltung. Bevor du ein Tier aufnimmst - lies hier die Wahrheit.',
    ogTitle: 'Tierliebe - Verantwortungsvolle Tierhaltung beginnt mit Wissen',
    ogDescription: 'Ehrlich. Klar. Und im Sinne der Tiere. Alles über artgerechte Haltung, Adoption und die Wahrheit über Haustiere.'
  },
  'Tierliebe – Adoption': {
    title: 'Adoption statt Kauf - Warum Tierheimtiere die bessere Wahl sind',
    description: 'Jede Adoption rettet ein Leben und verhindert neues Tierleid. Tierschutztiere sind keine Problemfälle - sie sind eine Chance.',
    ogTitle: 'Tieradoption - Rette ein Leben statt eines zu kaufen',
    ogDescription: 'Der Weg zum neuen Familienmitglied: Wie Tierheime arbeiten und warum Adoption die richtige Entscheidung ist.'
  },
  'Tierliebe – Qualzucht': {
    title: 'Qualzucht - Wenn Schönheit Leiden bedeutet | Mops, Perser & Co',
    description: 'Mops, Französische Bulldogge, Perserkatze: Überzüchtung erklärt. Welche Rassen leiden und wie du Qualzucht erkennst.',
    ogTitle: 'Qualzucht bei Hund und Katze - Rassen und ihre Qualen',
    ogDescription: 'Schönheit darf nicht weh tun. Erfahre, welche Tiere unter Überzüchtung leiden und warum.'
  },
  'Tierliebe – Mythen': {
    title: 'Die größten Irrtümer über Haustiere - Was wirklich stimmt',
    description: 'Katzen sind unabhängig? Hamster perfekt für Kinder? 13 Mythen über Haustiere wissenschaftlich aufgeklärt und widerlegt.',
    ogTitle: 'Mythen über Hunde, Katzen & Kleintiere - Die Wahrheit',
    ogDescription: 'Schluss mit Halbwissen: Die häufigsten Irrtümer über Haustiere - ehrlich erklärt.'
  },
  'Tierliebe – Wissen': {
    title: 'Wissen über Tierhaltung - Kastration, Zucht, Männchen vs Weibchen',
    description: 'Fundiertes Wissen über Kastration, Zucht-Wirtschaftlichkeit, Geschlechterunterschiede und artgerechte Tierhaltung.',
    ogTitle: 'Tierhaltung Wissen - Alles was du wissen musst',
    ogDescription: 'Kastration Pflicht? Früh oder spät? Männchen oder Weibchen? Wissenschaftlich fundierte Antworten.'
  },
  'Tierliebe – Hunde': {
    title: 'Hunde artgerecht halten - Wahrheit über Alleinsein und Bedürfnisse',
    description: 'Hunde sind Rudeltiere: Wie lange dürfen sie allein bleiben? Was brauchen sie wirklich? Mythen und Fakten über Hundehaltung.',
    ogTitle: 'Hundehaltung - Was Hunde wirklich brauchen',
    ogDescription: '8 Stunden allein? Garten statt Gassi? Die Wahrheit über artgerechte Hundehaltung.'
  },
  'Tierliebe – Katzen': {
    title: 'Katzen artgerecht halten - Einzelhaltung, Freigang, stille Leiden',
    description: 'Katzen sind nicht unabhängig. Einzelhaltung ist fast immer Tierquälerei. Alles über artgerechte Katzenhaltung und häufige Fehler.',
    ogTitle: 'Katzenhaltung - Bedürfnisse und häufige Irrtümer',
    ogDescription: 'Wohnungskatze allein? Ruhig bedeutet glücklich? Die Wahrheit über Katzen.'
  },
  'Tierliebe – Kleintiere': {
    title: 'Kleintiere artgerecht halten - Kaninchen, Meerschweinchen, Hamster',
    description: 'Kaninchen, Meerschweinchen, Hamster, Ratten, Mäuse: Artgerechte Haltung erklärt. Einzelhaltung ist Tierquälerei.',
    ogTitle: 'Kleintiere richtig halten - Keine Einstiegstiere',
    ogDescription: 'Käfig im Kinderzimmer? Kaninchen + Meerschweinchen? Die häufigsten Fehler bei Kleintierhaltung.'
  },
  'Tierliebe – Exoten': {
    title: 'Exoten artgerecht halten - Wellensittich, Reptilien, Schildkröten',
    description: 'Wellensittiche, Goldfische, Reptilien, Schildkröten: Artgerechte Haltung und häufige Fehler. Exoten gehören nicht ins Wohnzimmer.',
    ogTitle: 'Exotische Haustiere - Wahrheit über Vogel, Fisch, Reptil',
    ogDescription: 'Einzelhaltung, falsches Licht, zu kleine Becken: Was Exoten wirklich brauchen.'
  },
  'Tierliebe – Kontakt': {
    title: 'Kontakt & Hilfe - Beratung zur artgerechten Tierhaltung',
    description: 'Du brauchst Hilfe bei Haltungsfragen? Urlaubsbetreuung für Wellensittich oder Kleintiere? Ich bin für dich da.',
    ogTitle: 'Hilfe & Beratung - Ich höre zu',
    ogDescription: 'Aufnahme und Betreuung von Wellensittichen und Kleintieren. Ehrliche Beratung ohne Vorurteile.'
  },
  'Tierliebe – Test': {
    title: 'Bist du bereit für ein Tier? - Ehrlicher Selbsttest',
    description: 'Bevor du ein Tier aufnimmst: Mach den Test. Ehrlich, nur für dich. Gute Absichten reichen nicht - Verantwortung schon.',
    ogTitle: 'Tierhalter-Test - Bin ich bereit für ein Tier?',
    ogDescription: 'Der ehrliche Selbsttest: Bist du der Typ Tierhalter, den Tiere sich wünschen würden?'
  }
};

async function loginToWordPress(page) {
  console.log('🔐 Login zu WordPress...');
  await page.goto(WP_URL);
  await page.fill('#user_login', USERNAME);
  await page.fill('#user_pass', PASSWORD);
  await page.click('#wp-submit');
  await page.waitForLoadState('networkidle');
  console.log('✅ Login erfolgreich');
}

async function updatePageSEO(page, pageName, seo) {
  const pageId = pageIds[pageName];

  if (!pageId) {
    console.log(`\n❌ Seite "${pageName}" hat keine ID, überspringe...`);
    return;
  }

  console.log(`\n📝 Bearbeite Seite: ${pageName} (ID: ${pageId})`);

  // Direkt zur Bearbeitungsseite mit ID
  await page.goto(`${WP_URL}/post.php?post=${pageId}&action=edit`);
  await page.waitForLoadState('networkidle');
  await page.waitForTimeout(2000);

  // The SEO Framework Meta Box finden und öffnen
  const seoBox = page.locator('#tsf-inpost-box, .tsf-flex-setting-label-item');

  if (await seoBox.count() > 0) {
    console.log('📊 SEO Framework Meta Box gefunden');

    // Meta Title setzen
    const titleField = page.locator('input[name="autodescription[_genesis_title]"], #autodescription_title');
    if (await titleField.count() > 0) {
      await titleField.fill(seo.title);
      console.log(`  ✓ Title: ${seo.title}`);
    }

    // Meta Description setzen
    const descField = page.locator('textarea[name="autodescription[_genesis_description]"], #autodescription_description');
    if (await descField.count() > 0) {
      await descField.fill(seo.description);
      console.log(`  ✓ Description: ${seo.description}`);
    }

    // Social Tab öffnen (falls vorhanden)
    const socialTab = page.locator('button[data-tsf-tab="social"], .tsf-tab-social');
    if (await socialTab.count() > 0) {
      await socialTab.click();
      await page.waitForTimeout(500);
      console.log(`  → Social Tab geöffnet`);
    }

    // Open Graph Title
    const ogTitleField = page.locator('input[name="autodescription[_open_graph_title]"], #autodescription_og_title');
    if (await ogTitleField.count() > 0 && await ogTitleField.isVisible()) {
      await ogTitleField.fill(seo.ogTitle);
      console.log(`  ✓ OG Title: ${seo.ogTitle}`);
    }

    // Open Graph Description
    const ogDescField = page.locator('textarea[name="autodescription[_open_graph_description]"], #autodescription_og_description');
    if (await ogDescField.count() > 0 && await ogDescField.isVisible()) {
      await ogDescField.fill(seo.ogDescription);
      console.log(`  ✓ OG Description: ${seo.ogDescription}`);
    }

    // Seite speichern - Update Button
    const updateButton = page.locator('#publish');
    if (await updateButton.count() > 0) {
      await updateButton.click();
      console.log(`  → Speichere...`);

      // Warte auf Speicher-Bestätigung ODER Timeout
      try {
        await page.waitForSelector('.notice-success, .updated', { timeout: 10000 });
        console.log(`✅ Seite ${pageName} gespeichert`);
      } catch {
        console.log(`⚠️  Seite ${pageName} möglicherweise gespeichert (keine Bestätigung)`);
      }

      await page.waitForTimeout(1000);
    } else {
      console.log(`⚠️  Speicher-Button nicht gefunden`);
    }
  } else {
    console.log('⚠️  SEO Framework Meta Box nicht gefunden');
  }
}

async function main() {
  console.log('🚀 WordPress SEO Automation gestartet\n');

  const browser = await chromium.launch({
    headless: false,
    timeout: 0
  });
  const context = await browser.newContext({
    timeout: 0
  });
  const page = await context.newPage();
  page.setDefaultTimeout(60000);

  try {
    await loginToWordPress(page);

    let successCount = 0;
    let errorCount = 0;

    for (const [pageName, seo] of Object.entries(seoData)) {
      try {
        await updatePageSEO(page, pageName, seo);
        successCount++;
        await page.waitForTimeout(2000);
      } catch (error) {
        console.error(`❌ Fehler bei Seite "${pageName}":`, error.message);
        errorCount++;
        await page.screenshot({ path: `error-${pageName.replace(/[^a-z0-9]/gi, '-')}.png` });
      }
    }

    console.log(`\n✨ Fertig! ${successCount} Seiten aktualisiert, ${errorCount} Fehler`);

  } catch (error) {
    console.error('❌ Kritischer Fehler:', error);
    try {
      await page.screenshot({ path: 'error-screenshot.png', fullPage: true });
    } catch {}
  }

  console.log('\n⏳ Browser bleibt 10 Sekunden offen zur Kontrolle...');
  await page.waitForTimeout(10000);
  await browser.close();
}

main();
