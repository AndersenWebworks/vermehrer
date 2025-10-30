const playwright = require('playwright');

(async () => {
  const browser = await playwright.chromium.launch({
    headless: false,
    slowMo: 100
  });
  const page = await browser.newPage();

  // Setze Viewport für konsistente Tests
  await page.setViewportSize({ width: 1920, height: 1080 });

  await page.goto('https://vm.andersen-webworks.de/tierliebe-mythen/', {
    waitUntil: 'networkidle'
  });

  console.log('=== Filter Animation Test ===\n');

  // Warte bis Seite geladen
  await page.waitForTimeout(2000);

  // Warte auf Grid-Element
  await page.waitForSelector('.mythos-grid', { timeout: 5000 });
  console.log('✓ Grid gefunden\n');

  const filters = [
    { name: 'Hunde', filter: 'hunde' },
    { name: 'Katzen', filter: 'katzen' },
    { name: 'Kleintiere', filter: 'kleintiere' },
    { name: 'Vögel', filter: 'voegel' },
    { name: 'Exoten', filter: 'exoten' },
    { name: 'Alle', filter: 'all' }
  ];

  for (const { name, filter } of filters) {
    console.log(`\n--- Test: ${name} Filter ---`);

    // Messe Grid-Höhe vor Klick
    const heightBefore = await page.evaluate(() => {
      return document.querySelector('.mythos-grid').offsetHeight;
    });
    console.log(`Höhe vorher: ${heightBefore}px`);

    // Klicke Filter
    await page.click(`button[data-filter="${filter}"]`);
    console.log(`Filter "${name}" geklickt`);

    // Messe Höhe alle 100ms für 1 Sekunde
    const measurements = [];
    for (let i = 0; i < 10; i++) {
      await page.waitForTimeout(100);
      const height = await page.evaluate(() => {
        return document.querySelector('.mythos-grid').offsetHeight;
      });
      measurements.push(height);
    }

    console.log('Höhen-Verlauf:', measurements.join('px -> ') + 'px');

    // Prüfe auf Sprünge (Höhe auf 0)
    if (measurements.includes(0)) {
      console.log('❌ FEHLER: Grid springt auf 0px!');
    } else {
      console.log('✓ Grid-Höhe bleibt stabil');
    }

    // Zähle sichtbare Karten
    const visibleCount = await page.evaluate(() => {
      const cards = document.querySelectorAll('.mythos-card');
      let visible = 0;
      cards.forEach(card => {
        const style = window.getComputedStyle(card);
        if (style.opacity !== '0' && style.display !== 'none') {
          visible++;
        }
      });
      return visible;
    });
    console.log(`Sichtbare Karten: ${visibleCount}`);

    // Screenshot
    await page.screenshot({
      path: `filter-${filter}.png`,
      fullPage: false
    });
    console.log(`Screenshot gespeichert: filter-${filter}.png`);

    // Pause zwischen Tests
    await page.waitForTimeout(1000);
  }

  console.log('\n\n=== Wiederholungs-Test (schnelles Umschalten) ===\n');

  // Schnell zwischen Filtern wechseln
  for (let i = 0; i < 3; i++) {
    console.log(`\nDurchlauf ${i + 1}:`);

    await page.click('button[data-filter="hunde"]');
    console.log('→ Hunde');
    await page.waitForTimeout(800);

    await page.click('button[data-filter="katzen"]');
    console.log('→ Katzen');
    await page.waitForTimeout(800);

    await page.click('button[data-filter="all"]');
    console.log('→ Alle');
    await page.waitForTimeout(800);
  }

  console.log('\n\n=== Video-Aufnahme für 20 Sekunden ===');
  console.log('Du kannst jetzt manuell testen...\n');

  // Lass Browser 20 Sekunden offen für manuelles Testen
  for (let i = 20; i > 0; i--) {
    console.log(`Noch ${i} Sekunden...`);
    await page.waitForTimeout(1000);
  }

  await browser.close();
  console.log('\n✓ Test abgeschlossen!');
})();
