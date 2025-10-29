const { Hyperbrowser } = require('@hyperbrowser/sdk');
const { chromium } = require('playwright-core');

async function buildYOOthemePage() {
    const client = new Hyperbrowser({
        apiKey: 'hb_e07071bbb55a55b25d4033f7ead2'
    });

    let sessionId;

    try {
        console.log('Erstelle Browser-Session...');
        const session = await client.sessions.create();
        sessionId = session.id;
        console.log('Session ID:', sessionId);

        console.log('Verbinde mit Browser...');
        const browser = await chromium.connectOverCDP(session.wsEndpoint);
        const context = browser.contexts()[0];
        const page = context.pages()[0];

        // WordPress Backend Login
        console.log('Öffne WordPress Backend...');
        await page.goto('https://vm.andersen-webworks.de/wp-admin');

        console.log('Warte auf Login-Seite...');
        await page.waitForSelector('#user_login');

        console.log('Fülle Login-Daten ein...');
        await page.fill('#user_login', 'EAndersen');
        await page.fill('#user_pass', 'Y2kpr0n!wa');

        console.log('Klicke Login...');
        await Promise.all([
            page.waitForNavigation({ timeout: 60000 }),
            page.click('#wp-submit')
        ]);

        // Neue Seite erstellen
        console.log('Navigiere zu Seiten -> Neu erstellen...');
        await page.goto('https://vm.andersen-webworks.de/wp-admin/post-new.php?post_type=page');

        console.log('Warte auf Editor...');
        await page.waitForTimeout(5000);

        // Screenshot BEVOR wir was machen
        await page.screenshot({ path: 'screenshot-before.png', fullPage: true });
        console.log('Screenshot gespeichert: screenshot-before.png');

        // Titel eingeben - versuche verschiedene Selektoren
        console.log('Setze Seitentitel...');
        const titleSelectors = [
            'h1[aria-label="Add title"]',
            '.editor-post-title__input',
            '#post-title-0',
            'input[placeholder*="title"]',
            'textarea[placeholder*="title"]',
            '[name="post_title"]',
            '#title'
        ];

        let titleSet = false;
        for (const selector of titleSelectors) {
            try {
                const element = await page.$(selector);
                if (element) {
                    console.log(`Titel-Feld gefunden: ${selector}`);
                    await element.fill('Tierliebe-Check Test');
                    titleSet = true;
                    break;
                }
            } catch (e) {
                continue;
            }
        }

        if (!titleSet) {
            console.log('Kein Titel-Feld gefunden, überspringe...');
        }

        // YOOtheme Builder öffnen
        console.log('Suche YOOtheme Pro Builder Button...');
        await page.waitForTimeout(2000);

        // Screenshot für Debugging
        await page.screenshot({ path: 'screenshot-editor.png', fullPage: true });
        console.log('Screenshot gespeichert: screenshot-editor.png');

        // Klicke auf YOOtheme Builder Button
        console.log('Hole YOOtheme Builder URL...');
        const builderLink = await page.$('a:has-text("YOOtheme Builder")');
        if (builderLink) {
            const href = await builderLink.getAttribute('href');
            console.log('Navigiere zu Builder:', href);
            await page.goto(href);
        } else {
            console.log('Builder-Link nicht gefunden!');
        }

        console.log('Warte auf YOOtheme Builder Interface...');
        await page.waitForTimeout(10000);

        // Screenshot vom Builder
        await page.screenshot({ path: 'screenshot-builder-open.png', fullPage: true });
        console.log('Screenshot gespeichert: screenshot-builder-open.png');

        console.log('YOOtheme Builder ist offen!');

        // Jetzt baue die Seite nach
        console.log('Starte Nachbau der Tierliebe-Check Seite...');

        // 1. Hero Section hinzufügen
        console.log('1. Füge Hero Section hinzu...');
        // Suche nach "Add Element" oder ähnlichem Button
        const addButtons = await page.$$('button, a');
        for (const btn of addButtons) {
            const text = await btn.textContent();
            if (text && (text.includes('Element') || text.includes('Section') || text.includes('Hinzufügen'))) {
                console.log(`Gefunden: "${text}"`);
            }
        }

        await page.screenshot({ path: 'screenshot-builder-ready.png', fullPage: true });
        console.log('Screenshot gespeichert: screenshot-builder-ready.png');

        console.log('\n=== PAUSE ===');
        console.log('Builder ist bereit. Drücke Ctrl+C wenn du fertig bist.');
        console.log('Screenshots wurden gespeichert für weitere Analyse.');

        // Halte Session am Leben
        await new Promise(resolve => {
            process.on('SIGINT', async () => {
                console.log('\nBeende Session...');
                await browser.close();
                await client.sessions.stop(sessionId);
                resolve();
            });
        });

    } catch (error) {
        console.error('Fehler:', error.message);
        if (sessionId) {
            console.log('Stoppe Session...');
            await client.sessions.stop(sessionId);
        }
        throw error;
    }
}

buildYOOthemePage();
