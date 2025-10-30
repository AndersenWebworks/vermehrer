const { chromium } = require('playwright');

async function checkGoogleMobileCriteria() {
    const browser = await chromium.launch({ headless: false });
    const context = await browser.newContext({
        viewport: { width: 390, height: 844 },
        userAgent: 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15',
        deviceScaleFactor: 3
    });

    const page = await context.newPage();
    const url = 'https://vm.andersen-webworks.de/tierliebe-start';

    console.log('\n=== Google Mobile-Friendly Kriterien Check ===\n');

    await page.goto(url, { waitUntil: 'networkidle', timeout: 30000 });

    // 1. Viewport konfiguriert?
    const hasViewport = await page.evaluate(() => {
        const viewport = document.querySelector('meta[name="viewport"]');
        return viewport ? viewport.getAttribute('content') : null;
    });
    console.log('✓ Viewport Meta Tag:', hasViewport || '❌ FEHLT');

    // 2. Text lesbar ohne Zoom?
    const textSizes = await page.evaluate(() => {
        const texts = Array.from(document.querySelectorAll('p, span, div, li, a'));
        const sizes = texts.map(el => {
            const size = parseFloat(window.getComputedStyle(el).fontSize);
            return size;
        }).filter(s => s > 0);

        return {
            min: Math.min(...sizes),
            avg: sizes.reduce((a, b) => a + b, 0) / sizes.length,
            belowMin: sizes.filter(s => s < 16).length,
            total: sizes.length
        };
    });
    console.log('\n📝 Text-Größen:');
    console.log('  Minimum:', textSizes.min.toFixed(1) + 'px', textSizes.min >= 16 ? '✓' : '⚠️ Zu klein');
    console.log('  Durchschnitt:', textSizes.avg.toFixed(1) + 'px');
    console.log('  Unter 16px:', textSizes.belowMin, 'von', textSizes.total, textSizes.belowMin === 0 ? '✓' : '⚠️');

    // 3. Touch-Targets groß genug? (min 48x48px)
    const touchTargets = await page.evaluate(() => {
        const interactive = Array.from(document.querySelectorAll('button, a, input, select, textarea'));
        const results = interactive.map(el => {
            const rect = el.getBoundingClientRect();
            return {
                tag: el.tagName,
                width: rect.width,
                height: rect.height,
                text: el.textContent?.trim().substring(0, 30) || el.getAttribute('aria-label') || 'N/A'
            };
        }).filter(t => t.width > 0 && t.height > 0);

        const tooSmall = results.filter(t => t.width < 48 || t.height < 48);

        return {
            total: results.length,
            tooSmall: tooSmall,
            tooSmallCount: tooSmall.length
        };
    });
    console.log('\n👆 Touch-Targets:');
    console.log('  Gesamt:', touchTargets.total);
    console.log('  Zu klein (<48x48px):', touchTargets.tooSmallCount, touchTargets.tooSmallCount === 0 ? '✓' : '⚠️');
    if (touchTargets.tooSmallCount > 0) {
        console.log('  Problematische Elemente:');
        touchTargets.tooSmall.slice(0, 5).forEach(t => {
            console.log(`    - ${t.tag}: ${t.width.toFixed(0)}x${t.height.toFixed(0)}px - "${t.text}"`);
        });
    }

    // 4. Horizontales Scrollen vermieden?
    const hasHorizontalScroll = await page.evaluate(() => {
        return document.documentElement.scrollWidth > document.documentElement.clientWidth;
    });
    console.log('\n↔️  Horizontales Scrollen:', hasHorizontalScroll ? '❌ JA (Problem!)' : '✓ NEIN');

    // 5. Content passt in Viewport?
    const contentFits = await page.evaluate(() => {
        const body = document.body;
        const html = document.documentElement;
        const maxWidth = Math.max(
            body.scrollWidth,
            body.offsetWidth,
            html.clientWidth,
            html.scrollWidth,
            html.offsetWidth
        );
        const viewportWidth = window.innerWidth;
        return {
            maxWidth,
            viewportWidth,
            fits: maxWidth <= viewportWidth
        };
    });
    console.log('\n📐 Content-Breite:');
    console.log('  Max Content:', contentFits.maxWidth + 'px');
    console.log('  Viewport:', contentFits.viewportWidth + 'px');
    console.log('  Passt:', contentFits.fits ? '✓' : '❌');

    // 6. Links haben genug Abstand? (min 8px)
    const linkSpacing = await page.evaluate(() => {
        const links = Array.from(document.querySelectorAll('a'));
        let tooClose = 0;

        for (let i = 0; i < links.length - 1; i++) {
            const rect1 = links[i].getBoundingClientRect();
            const rect2 = links[i + 1].getBoundingClientRect();

            const distance = Math.abs(rect2.top - rect1.bottom);
            if (distance < 8 && distance > 0) {
                tooClose++;
            }
        }

        return {
            total: links.length,
            tooClose
        };
    });
    console.log('\n🔗 Link-Abstände:');
    console.log('  Zu nah beieinander (<8px):', linkSpacing.tooClose, linkSpacing.tooClose === 0 ? '✓' : '⚠️');

    // 7. Flash oder andere problematische Plugins?
    const hasProblematicContent = await page.evaluate(() => {
        const flash = document.querySelectorAll('embed, object').length;
        return { flash };
    });
    console.log('\n🚫 Problematische Inhalte:');
    console.log('  Flash/Plugins:', hasProblematicContent.flash === 0 ? '✓ Keine' : '❌ ' + hasProblematicContent.flash);

    // 8. Performance Metriken
    const performance = await page.evaluate(() => {
        const perf = window.performance.timing;
        return {
            domContentLoaded: perf.domContentLoadedEventEnd - perf.navigationStart,
            fullyLoaded: perf.loadEventEnd - perf.navigationStart
        };
    });
    console.log('\n⚡ Performance:');
    console.log('  DOM Content Loaded:', performance.domContentLoaded + 'ms', performance.domContentLoaded < 3000 ? '✓' : '⚠️');
    console.log('  Fully Loaded:', performance.fullyLoaded + 'ms', performance.fullyLoaded < 5000 ? '✓' : '⚠️');

    // Screenshot
    await page.screenshot({
        path: 'google-mobile-check.png',
        fullPage: true
    });

    // Zusammenfassung
    console.log('\n=== ZUSAMMENFASSUNG ===');
    const score = [
        hasViewport ? 1 : 0,
        textSizes.min >= 16 ? 1 : 0,
        touchTargets.tooSmallCount === 0 ? 1 : 0,
        !hasHorizontalScroll ? 1 : 0,
        contentFits.fits ? 1 : 0,
        linkSpacing.tooClose === 0 ? 1 : 0,
        hasProblematicContent.flash === 0 ? 1 : 0,
        performance.fullyLoaded < 5000 ? 1 : 0
    ].reduce((a, b) => a + b, 0);

    console.log(`Score: ${score}/8 (${(score/8*100).toFixed(0)}%)`);

    if (score >= 7) {
        console.log('✅ SEHR GUT - Google Mobile-Friendly');
    } else if (score >= 5) {
        console.log('⚠️  GUT - Kleinere Verbesserungen möglich');
    } else {
        console.log('❌ VERBESSERUNGSBEDARF');
    }

    await browser.close();
}

checkGoogleMobileCriteria().catch(console.error);
