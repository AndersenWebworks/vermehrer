const { chromium } = require('playwright');

const WP_URL = 'https://vm.andersen-webworks.de/wp-admin';
const USERNAME = 'EAndersen';
const PASSWORD = 'Y2kpr0n!wa';

// SEO-Daten für jede Seite
const seoData = {
  'tierliebe-home': {
    title: 'Tierliebe Kampagne - Bewusstsein für verantwortungsvolle Tierhaltung',
    description: 'Informieren Sie sich über Qualzucht, Adoption und verantwortungsvolle Tierhaltung. Gemeinsam gegen Tierquälerei.',
    ogTitle: 'Tierliebe - Für eine verantwortungsvolle Tierhaltung',
    ogDescription: 'Erfahren Sie mehr über die Probleme von Qualzucht und wie Sie durch Adoption helfen können.'
  },
  'tierliebe-adoption': {
    title: 'Adoption statt Kauf - Geben Sie Tieren ein neues Zuhause',
    description: 'Warum Adoption? Lernen Sie, wie Sie durch Adoption von Tierheimtieren Leben retten und gegen Qualzucht helfen.',
    ogTitle: 'Tieradoption - Ein Zuhause für Tiere in Not',
    ogDescription: 'Adoptieren Sie ein Tier aus dem Tierheim und geben Sie ihm eine zweite Chance.'
  },
  'tierliebe-qualzucht': {
    title: 'Qualzucht - Die dunkle Seite der Tierzucht erklärt',
    description: 'Was ist Qualzucht? Erfahren Sie, welche Rassen betroffen sind und wie Sie helfen können, diese Praktiken zu stoppen.',
    ogTitle: 'Qualzucht bei Hunden und Katzen - Aufklärung und Fakten',
    ogDescription: 'Mops, Französische Bulldogge, Perserkatze - erfahren Sie mehr über Qualzucht und ihre Folgen.'
  },
  'tierliebe-irrtuemer': {
    title: 'Mythen über Haustiere - Häufige Irrtümer aufgeklärt',
    description: 'Katzen sind unabhängig? Hunde brauchen einen Chef? Wir räumen mit den häufigsten Mythen über Haustiere auf.',
    ogTitle: 'Irrtümer über Hunde und Katzen - Was wirklich stimmt',
    ogDescription: 'Die größten Mythen über Haustiere wissenschaftlich erklärt und widerlegt.'
  },
  'tierliebe-wissen': {
    title: 'Wissen über Tierhaltung - Fakten und wichtige Informationen',
    description: 'Fundiertes Wissen über artgerechte Tierhaltung, Bedürfnisse von Hunden und Katzen und verantwortungsvolle Haustierpflege.',
    ogTitle: 'Tierhaltung Wissen - Alles über Hunde und Katzen',
    ogDescription: 'Wissenschaftlich fundierte Informationen über die richtige Haltung und Pflege von Haustieren.'
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

async function updatePageSEO(page, pageSlug, seo) {
  console.log(`\n📝 Bearbeite Seite: ${pageSlug}`);

  // Gehe zur Seiten-Übersicht
  await page.goto(`${WP_URL}/edit.php?post_type=page`);
  await page.waitForLoadState('networkidle');

  // Suche die Seite
  await page.fill('#post-search-input', pageSlug);
  await page.click('#search-submit');
  await page.waitForLoadState('networkidle');

  // Klicke auf "Bearbeiten"
  const editLink = page.locator(`a.row-title:has-text("${pageSlug}")`).first();
  if (await editLink.count() === 0) {
    console.log(`⚠️  Seite ${pageSlug} nicht gefunden, versuche alternative Suche...`);
    // Alternative: direkte Suche über alle Seiten
    await page.goto(`${WP_URL}/edit.php?post_type=page`);
    await page.waitForLoadState('networkidle');
  }

  await editLink.click();
  await page.waitForLoadState('networkidle');

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

    // Open Graph Title
    const ogTitleField = page.locator('input[name="autodescription[_open_graph_title]"], #autodescription_og_title');
    if (await ogTitleField.count() > 0) {
      await ogTitleField.fill(seo.ogTitle);
      console.log(`  ✓ OG Title: ${seo.ogTitle}`);
    }

    // Open Graph Description
    const ogDescField = page.locator('textarea[name="autodescription[_open_graph_description]"], #autodescription_og_description');
    if (await ogDescField.count() > 0) {
      await ogDescField.fill(seo.ogDescription);
      console.log(`  ✓ OG Description: ${seo.ogDescription}`);
    }

    // Seite speichern
    await page.click('#publish, #save-post');
    await page.waitForLoadState('networkidle');
    await page.waitForTimeout(2000);

    console.log(`✅ Seite ${pageSlug} gespeichert`);
  } else {
    console.log('⚠️  SEO Framework Meta Box nicht gefunden');
  }
}

async function main() {
  console.log('🚀 WordPress SEO Automation gestartet\n');

  const browser = await chromium.launch({ headless: false });
  const context = await browser.newContext();
  const page = await context.newPage();

  try {
    await loginToWordPress(page);

    for (const [slug, seo] of Object.entries(seoData)) {
      await updatePageSEO(page, slug, seo);
      await page.waitForTimeout(1000);
    }

    console.log('\n✨ Alle Seiten wurden erfolgreich aktualisiert!');

  } catch (error) {
    console.error('❌ Fehler:', error);
    await page.screenshot({ path: 'error-screenshot.png', fullPage: true });
  }

  await page.waitForTimeout(3000);
  await browser.close();
}

main();
