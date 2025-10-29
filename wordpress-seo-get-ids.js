const { chromium } = require('playwright');

const WP_URL = 'https://vm.andersen-webworks.de/wp-admin';
const USERNAME = 'EAndersen';
const PASSWORD = 'Y2kpr0n!wa';

async function main() {
  const browser = await chromium.launch({ headless: false });
  const context = await browser.newContext();
  const page = await context.newPage();

  // Login
  console.log('Login...');
  await page.goto(WP_URL);
  await page.fill('#user_login', USERNAME);
  await page.fill('#user_pass', PASSWORD);
  await page.click('#wp-submit');
  await page.waitForLoadState('networkidle');

  // Gehe zu allen Seiten - zeige ALLE an
  await page.goto(`${WP_URL}/edit.php?post_type=page&posts_per_page=999`);
  await page.waitForLoadState('networkidle');
  await page.waitForTimeout(2000);

  // Extrahiere alle Seiten-IDs und Titel
  const pages = await page.evaluate(() => {
    const rows = Array.from(document.querySelectorAll('table.wp-list-table tbody tr'));
    return rows
      .filter(row => row.id && row.id.startsWith('post-'))
      .map(row => {
        const id = row.id.replace('post-', '');
        const titleElement = row.querySelector('a.row-title');
        const title = titleElement ? titleElement.textContent.trim() : '';

        // Auch Template-Info holen
        const templateInfo = row.querySelector('.post-state');
        const template = templateInfo ? templateInfo.textContent : '';

        return { id, title, template };
      });
  });

  console.log('\n📋 Alle gefundenen Seiten:\n');
  pages.forEach(p => {
    console.log(`  ID: ${p.id.padEnd(6)} | ${p.title} ${p.template ? `(${p.template})` : ''}`);
  });

  const tierliebe = pages.filter(p => p.title.startsWith('Tierliebe'));

  console.log('\n\n📋 Tierliebe-Seiten gefiltert:\n');
  tierliebe.forEach(p => {
    console.log(`  ID: ${p.id.padEnd(6)} | ${p.title}`);
  });

  console.log('\n\nKopiere diese Daten ins Haupt-Script:\n');
  console.log('const pageIds = {');
  tierliebe.forEach(p => {
    console.log(`  '${p.title}': '${p.id}',`);
  });
  console.log('};');

  await page.waitForTimeout(5000);
  await browser.close();
}

main();
