const { chromium } = require('playwright');

async function checkMobileView() {
    const browser = await chromium.launch({ headless: false });

    // Verschiedene mobile Geräte testen
    const devices = [
        {
            name: 'iPhone 12',
            viewport: { width: 390, height: 844 },
            userAgent: 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15'
        },
        {
            name: 'Samsung Galaxy S21',
            viewport: { width: 360, height: 800 },
            userAgent: 'Mozilla/5.0 (Linux; Android 11; SM-G991B) AppleWebKit/537.36'
        },
        {
            name: 'iPad',
            viewport: { width: 768, height: 1024 },
            userAgent: 'Mozilla/5.0 (iPad; CPU OS 14_0 like Mac OS X) AppleWebKit/605.1.15'
        }
    ];

    const url = 'https://vm.andersen-webworks.de/tierliebe-start';

    for (const device of devices) {
        console.log(`\n=== Testing ${device.name} ===`);

        const context = await browser.newContext({
            viewport: device.viewport,
            userAgent: device.userAgent
        });

        const page = await context.newPage();

        try {
            await page.goto(url, { waitUntil: 'networkidle', timeout: 30000 });

            // Screenshot vom ersten Viewport
            await page.screenshot({
                path: `mobile-${device.name.replace(/\s+/g, '-')}-initial.png`,
                fullPage: false
            });

            // Full-page Screenshot
            await page.screenshot({
                path: `mobile-${device.name.replace(/\s+/g, '-')}-full.png`,
                fullPage: true
            });

            // Überprüfungen durchführen
            const checks = {
                // Header-Elemente
                logo: await page.locator('.logo').isVisible(),
                mobileMenuButton: await page.locator('.mobile-menu-toggle').isVisible(),
                desktopNav: await page.locator('.main-nav-desktop').isVisible(),
                mobileNav: await page.locator('.main-nav-mobile').isVisible(),

                // Floating Decorations
                floatDecorations: await page.locator('.float-decoration').count(),

                // Viewport-Größen
                headerHeight: await page.locator('.header').evaluate(el => el.offsetHeight),
                logoWidth: await page.locator('.logo').evaluate(el => el.offsetWidth),

                // Prüfe ob Elemente überlappen
                bodyOverflow: await page.evaluate(() => {
                    return window.getComputedStyle(document.body).overflow;
                }),

                // Mobile Menu Status
                mobileMenuVisible: await page.locator('.main-nav-mobile').evaluate(el => {
                    return window.getComputedStyle(el).display !== 'none';
                })
            };

            console.log('Sichtbarkeit:');
            console.log('  Logo:', checks.logo);
            console.log('  Mobile Menu Button:', checks.mobileMenuButton);
            console.log('  Desktop Nav sichtbar:', checks.desktopNav);
            console.log('  Mobile Nav vorhanden:', checks.mobileNav);
            console.log('  Mobile Nav initial sichtbar:', checks.mobileMenuVisible);
            console.log('  Floating Decorations:', checks.floatDecorations);
            console.log('\nAbmessungen:');
            console.log('  Header Höhe:', checks.headerHeight + 'px');
            console.log('  Logo Breite:', checks.logoWidth + 'px');
            console.log('  Body Overflow:', checks.bodyOverflow);

            // Test: Mobile Menu öffnen
            if (checks.mobileMenuButton) {
                console.log('\nTeste Mobile Menu...');
                await page.locator('.mobile-menu-toggle').click();
                await page.waitForTimeout(500); // Warte auf Animation

                const menuOpenVisible = await page.locator('.main-nav-mobile').evaluate(el => {
                    const styles = window.getComputedStyle(el);
                    return {
                        display: styles.display,
                        visibility: styles.visibility,
                        opacity: styles.opacity,
                        transform: styles.transform
                    };
                });

                console.log('  Menu nach Klick:', menuOpenVisible);

                // Screenshot mit offenem Menu
                await page.screenshot({
                    path: `mobile-${device.name.replace(/\s+/g, '-')}-menu-open.png`,
                    fullPage: true
                });

                // Prüfe Submenu-Funktionalität
                const submenuParent = page.locator('.main-nav-mobile .has-children').first();
                await submenuParent.locator('> a').click();
                await page.waitForTimeout(300);

                await page.screenshot({
                    path: `mobile-${device.name.replace(/\s+/g, '-')}-submenu-open.png`,
                    fullPage: true
                });
            }

            // Prüfe horizontales Scrollen
            const hasHorizontalScroll = await page.evaluate(() => {
                return document.documentElement.scrollWidth > document.documentElement.clientWidth;
            });
            console.log('  Horizontales Scrollen:', hasHorizontalScroll ? '⚠️ JA' : '✓ NEIN');

            // Prüfe Textgrößen
            const textSizes = await page.evaluate(() => {
                const logo = document.querySelector('.logo');
                const navLinks = document.querySelectorAll('.nav-links a');

                return {
                    logo: window.getComputedStyle(logo).fontSize,
                    navLink: navLinks[0] ? window.getComputedStyle(navLinks[0]).fontSize : 'N/A'
                };
            });
            console.log('\nSchriftgrößen:');
            console.log('  Logo:', textSizes.logo);
            console.log('  Nav-Links:', textSizes.navLink);

        } catch (error) {
            console.error(`Fehler bei ${device.name}:`, error.message);
        }

        await context.close();
    }

    await browser.close();
    console.log('\n✓ Mobile Check abgeschlossen. Screenshots gespeichert.');
}

checkMobileView().catch(console.error);
