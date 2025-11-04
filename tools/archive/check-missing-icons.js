const playwright = require('playwright');

(async () => {
  const browser = await playwright.chromium.launch({ headless: false });
  const page = await browser.newPage();
  await page.setViewportSize({ width: 1920, height: 1080 });

  const pages = [
    { name: 'Katzen', url: 'https://vm.andersen-webworks.de/tierliebe-katzen/' },
    { name: 'Hunde', url: 'https://vm.andersen-webworks.de/tierliebe-hunde/' },
    { name: 'Kleintiere', url: 'https://vm.andersen-webworks.de/tierliebe-kleintiere/' },
    { name: 'Exoten', url: 'https://vm.andersen-webworks.de/tierliebe-exoten/' },
    { name: 'Adoption', url: 'https://vm.andersen-webworks.de/tierliebe-adoption/' },
    { name: 'Qualzucht', url: 'https://vm.andersen-webworks.de/tierliebe-qualzucht/' },
    { name: 'Wissen', url: 'https://vm.andersen-webworks.de/tierliebe-wissen/' },
    { name: 'Test', url: 'https://vm.andersen-webworks.de/tierliebe-test/' },
    { name: 'Home', url: 'https://vm.andersen-webworks.de/tierliebe-start/' },
    { name: 'Mythen', url: 'https://vm.andersen-webworks.de/tierliebe-mythen/' }
  ];

  console.log('=== CHECKING ALL PAGES FOR MISSING ICONS ===\n');

  const report = [];

  for (const { name, url } of pages) {
    console.log(`\n--- ${name} ---`);
    await page.goto(url, { waitUntil: 'networkidle' });
    await page.waitForTimeout(1000);

    // Check für verschiedene Panel-Typen
    const results = await page.evaluate(() => {
      const findings = {
        accordionItems: [],
        infoBoxes: [],
        cards: [],
        panels: []
      };

      // Accordion Items
      const accordionItems = document.querySelectorAll('.accordion-item');
      accordionItems.forEach((item, i) => {
        const header = item.querySelector('.accordion-header');
        const text = header ? header.textContent.trim().substring(0, 60) : 'N/A';
        // Check if it has an emoji at the start
        const hasEmoji = /^[\u{1F300}-\u{1F9FF}]/u.test(text);
        findings.accordionItems.push({
          index: i + 1,
          text: text,
          hasEmoji: hasEmoji
        });
      });

      // Info Boxes
      const infoBoxes = document.querySelectorAll('.info-box');
      infoBoxes.forEach((box, i) => {
        const emoji = box.getAttribute('data-emoji');
        const title = box.querySelector('h3, h4');
        findings.infoBoxes.push({
          index: i + 1,
          title: title ? title.textContent.trim().substring(0, 50) : 'N/A',
          hasEmoji: !!emoji
        });
      });

      // Cards
      const cards = document.querySelectorAll('.card');
      cards.forEach((card, i) => {
        const icon = card.querySelector('.card-icon');
        const title = card.querySelector('h3');
        findings.cards.push({
          index: i + 1,
          title: title ? title.textContent.trim().substring(0, 50) : 'N/A',
          hasIcon: !!icon
        });
      });

      // Decision Panels
      const panels = document.querySelectorAll('.decision-panel');
      panels.forEach((panel, i) => {
        const emoji = panel.querySelector('.panel-emoji');
        const title = panel.querySelector('h3');
        findings.panels.push({
          index: i + 1,
          title: title ? title.textContent.trim().substring(0, 50) : 'N/A',
          hasEmoji: !!emoji
        });
      });

      return findings;
    });

    // Report findings
    let hasIssues = false;

    if (results.accordionItems.length > 0) {
      console.log(`  Accordion Items: ${results.accordionItems.length}`);
      const missing = results.accordionItems.filter(item => !item.hasEmoji);
      if (missing.length > 0) {
        hasIssues = true;
        console.log(`    ❌ ${missing.length} WITHOUT emoji:`);
        missing.forEach(item => {
          console.log(`       #${item.index}: ${item.text}`);
        });
      } else {
        console.log(`    ✓ All have emojis`);
      }
    }

    if (results.infoBoxes.length > 0) {
      console.log(`  Info Boxes: ${results.infoBoxes.length}`);
      const missing = results.infoBoxes.filter(box => !box.hasEmoji);
      if (missing.length > 0) {
        hasIssues = true;
        console.log(`    ❌ ${missing.length} WITHOUT data-emoji:`);
        missing.forEach(box => {
          console.log(`       #${box.index}: ${box.title}`);
        });
      } else {
        console.log(`    ✓ All have data-emoji`);
      }
    }

    if (results.cards.length > 0) {
      console.log(`  Cards: ${results.cards.length}`);
      const missing = results.cards.filter(card => !card.hasIcon);
      if (missing.length > 0) {
        hasIssues = true;
        console.log(`    ❌ ${missing.length} WITHOUT icon:`);
        missing.forEach(card => {
          console.log(`       #${card.index}: ${card.title}`);
        });
      } else {
        console.log(`    ✓ All have icons`);
      }
    }

    if (results.panels.length > 0) {
      console.log(`  Decision Panels: ${results.panels.length}`);
      const missing = results.panels.filter(panel => !panel.hasEmoji);
      if (missing.length > 0) {
        hasIssues = true;
        console.log(`    ❌ ${missing.length} WITHOUT emoji:`);
        missing.forEach(panel => {
          console.log(`       #${panel.index}: ${panel.title}`);
        });
      } else {
        console.log(`    ✓ All have emojis`);
      }
    }

    if (!hasIssues) {
      console.log('  ✓ No issues found');
    }

    report.push({ name, url, hasIssues, results });

    await page.waitForTimeout(500);
  }

  console.log('\n\n=== SUMMARY ===\n');
  const pagesWithIssues = report.filter(r => r.hasIssues);
  if (pagesWithIssues.length > 0) {
    console.log(`❌ ${pagesWithIssues.length} pages have missing icons:`);
    pagesWithIssues.forEach(p => {
      console.log(`   - ${p.name}`);
    });
  } else {
    console.log('✓ All pages have complete icons!');
  }

  await browser.close();
})();
