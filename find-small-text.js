const { chromium } = require('playwright');

async function findSmallText() {
    const browser = await chromium.launch({ headless: false });
    const context = await browser.newContext({
        viewport: { width: 390, height: 844 },
        userAgent: 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15',
        deviceScaleFactor: 3
    });

    const page = await context.newPage();
    await page.goto('https://vm.andersen-webworks.de/tierliebe-start', { waitUntil: 'networkidle' });

    const smallTexts = await page.evaluate(() => {
        const allElements = Array.from(document.querySelectorAll('*'));
        const results = [];

        allElements.forEach(el => {
            const computedStyle = window.getComputedStyle(el);
            const fontSize = parseFloat(computedStyle.fontSize);

            if (fontSize > 0 && fontSize < 16) {
                const text = el.textContent?.trim().substring(0, 50) || '';
                const hasText = text.length > 0;

                if (hasText) {
                    results.push({
                        tag: el.tagName,
                        class: el.className,
                        fontSize: fontSize.toFixed(1),
                        text: text
                    });
                }
            }
        });

        return results.slice(0, 20);
    });

    console.log('\n=== Texte unter 16px ===\n');
    smallTexts.forEach((item, i) => {
        console.log(`${i + 1}. ${item.tag}${item.class ? '.' + item.class.split(' ')[0] : ''}: ${item.fontSize}px`);
        console.log(`   "${item.text}"`);
        console.log('');
    });

    await browser.close();
}

findSmallText().catch(console.error);
