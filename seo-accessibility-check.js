const { chromium } = require('playwright');

async function checkSEOandAccessibility() {
    const browser = await chromium.launch({ headless: false });
    const context = await browser.newContext({
        viewport: { width: 390, height: 844 }
    });
    const page = await context.newPage();
    const url = 'https://vm.andersen-webworks.de/tierliebe-start';

    console.log('\n=== SEO & Accessibility Check ===\n');

    await page.goto(url, { waitUntil: 'networkidle', timeout: 30000 });

    // SEO CHECKS
    console.log('📊 SEO Checks:\n');

    // 1. Title Tag
    const title = await page.title();
    console.log('1. Title Tag:');
    console.log('   ✓ Vorhanden:', title ? 'Ja' : '❌ FEHLT');
    console.log('   Länge:', title.length, 'Zeichen', title.length >= 30 && title.length <= 60 ? '✓' : '⚠️');
    console.log('   "' + title + '"');

    // 2. Meta Description
    const metaDesc = await page.$eval('meta[name="description"]', el => el.content).catch(() => null);
    console.log('\n2. Meta Description:');
    console.log('   ✓ Vorhanden:', metaDesc ? 'Ja' : '❌ FEHLT');
    if (metaDesc) {
        console.log('   Länge:', metaDesc.length, 'Zeichen', metaDesc.length >= 120 && metaDesc.length <= 160 ? '✓' : '⚠️');
        console.log('   "' + metaDesc + '"');
    }

    // 3. H1 Tags
    const h1s = await page.$$eval('h1', elements => elements.map(el => el.textContent.trim()));
    console.log('\n3. H1 Struktur:');
    console.log('   Anzahl:', h1s.length, h1s.length === 1 ? '✓' : '⚠️ Sollte 1 sein');
    h1s.forEach((h1, i) => console.log(`   H1 #${i+1}: "${h1}"`));

    // 4. Heading Hierarchie
    const headings = await page.evaluate(() => {
        const tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
        return tags.map(tag => ({
            tag,
            count: document.querySelectorAll(tag).length
        }));
    });
    console.log('\n4. Heading Hierarchie:');
    headings.forEach(h => console.log(`   ${h.tag}: ${h.count}`));

    // 5. Alt Text auf Bildern
    const images = await page.evaluate(() => {
        const imgs = Array.from(document.querySelectorAll('img'));
        return {
            total: imgs.length,
            withAlt: imgs.filter(img => img.alt && img.alt.trim() !== '').length,
            withoutAlt: imgs.filter(img => !img.alt || img.alt.trim() === '').length
        };
    });
    console.log('\n5. Bild Alt-Texte:');
    console.log('   Gesamt:', images.total);
    console.log('   Mit Alt:', images.withAlt, '✓');
    console.log('   Ohne Alt:', images.withoutAlt, images.withoutAlt === 0 ? '✓' : '⚠️');

    // 6. Canonical Tag
    const canonical = await page.$eval('link[rel="canonical"]', el => el.href).catch(() => null);
    console.log('\n6. Canonical Tag:');
    console.log('   Vorhanden:', canonical ? '✓ Ja' : '⚠️ Fehlt');
    if (canonical) console.log('   URL:', canonical);

    // 7. Open Graph Tags
    const ogTags = await page.evaluate(() => {
        const tags = ['og:title', 'og:description', 'og:image', 'og:url', 'og:type'];
        return tags.map(tag => ({
            tag,
            content: document.querySelector(`meta[property="${tag}"]`)?.content || null
        }));
    });
    console.log('\n7. Open Graph Tags:');
    ogTags.forEach(og => {
        console.log(`   ${og.tag}:`, og.content ? '✓' : '❌');
    });

    // ACCESSIBILITY CHECKS
    console.log('\n\n♿ Accessibility Checks:\n');

    // 1. Language Attribute
    const htmlLang = await page.$eval('html', el => el.lang).catch(() => null);
    console.log('1. HTML lang Attribut:');
    console.log('   Vorhanden:', htmlLang ? `✓ "${htmlLang}"` : '❌ FEHLT');

    // 2. Skip Links
    const skipLinks = await page.$$eval('a[href^="#"]', links =>
        links.filter(l => l.textContent.toLowerCase().includes('skip') ||
                         l.textContent.toLowerCase().includes('zum')).length
    );
    console.log('\n2. Skip Links:');
    console.log('   Gefunden:', skipLinks, skipLinks > 0 ? '✓' : '⚠️');

    // 3. ARIA Labels
    const ariaLabels = await page.evaluate(() => {
        const elements = document.querySelectorAll('[aria-label], [aria-labelledby], [aria-describedby]');
        return {
            total: elements.length,
            labels: Array.from(elements).slice(0, 5).map(el => ({
                tag: el.tagName,
                ariaLabel: el.getAttribute('aria-label'),
                ariaLabelledby: el.getAttribute('aria-labelledby')
            }))
        };
    });
    console.log('\n3. ARIA Labels:');
    console.log('   Anzahl:', ariaLabels.total);
    if (ariaLabels.total > 0) {
        console.log('   Beispiele:');
        ariaLabels.labels.forEach(l => {
            if (l.ariaLabel) console.log(`   - ${l.tag}: "${l.ariaLabel}"`);
        });
    }

    // 4. Form Labels
    const formInputs = await page.evaluate(() => {
        const inputs = Array.from(document.querySelectorAll('input, textarea, select'));
        return {
            total: inputs.length,
            withLabel: inputs.filter(input => {
                const id = input.id;
                return id && document.querySelector(`label[for="${id}"]`);
            }).length
        };
    });
    console.log('\n4. Form Labels:');
    console.log('   Input Felder:', formInputs.total);
    console.log('   Mit Label:', formInputs.withLabel);
    console.log('   Status:', formInputs.total === formInputs.withLabel ? '✓' : '⚠️');

    // 5. Link Texte
    const links = await page.evaluate(() => {
        const allLinks = Array.from(document.querySelectorAll('a'));
        return {
            total: allLinks.length,
            empty: allLinks.filter(a => !a.textContent.trim() && !a.getAttribute('aria-label')).length,
            generic: allLinks.filter(a => {
                const text = a.textContent.trim().toLowerCase();
                return text === 'hier' || text === 'more' || text === 'click' || text === 'link';
            }).length
        };
    });
    console.log('\n5. Link Texte:');
    console.log('   Gesamt:', links.total);
    console.log('   Leer:', links.empty, links.empty === 0 ? '✓' : '⚠️');
    console.log('   Generisch:', links.generic, links.generic === 0 ? '✓' : '⚠️');

    // 6. Color Contrast (Basic check)
    const colorIssues = await page.evaluate(() => {
        const elements = Array.from(document.querySelectorAll('*'));
        let issues = 0;

        elements.forEach(el => {
            const styles = window.getComputedStyle(el);
            const bg = styles.backgroundColor;
            const color = styles.color;

            // Sehr basic check - nur für offensichtliche Probleme
            if (bg === color) issues++;
        });

        return issues;
    });
    console.log('\n6. Farbkontrast (Basic):');
    console.log('   Offensichtliche Probleme:', colorIssues, colorIssues === 0 ? '✓' : '⚠️');

    // 7. Fokus-Indikatoren
    const focusStyles = await page.evaluate(() => {
        const style = document.createElement('style');
        style.textContent = '*:focus { outline: 2px solid red !important; }';
        document.head.appendChild(style);

        const links = document.querySelectorAll('a, button, input');
        return links.length > 0;
    });
    console.log('\n7. Fokussierbare Elemente:');
    console.log('   Vorhanden:', focusStyles ? '✓ Ja' : '❌');

    // Score berechnen
    console.log('\n\n=== ZUSAMMENFASSUNG ===');

    const seoScore = [
        title ? 1 : 0,
        metaDesc ? 1 : 0,
        h1s.length === 1 ? 1 : 0,
        images.withoutAlt === 0 ? 1 : 0,
        canonical ? 1 : 0,
        ogTags.filter(t => t.content).length >= 3 ? 1 : 0
    ].reduce((a, b) => a + b, 0);

    const a11yScore = [
        htmlLang ? 1 : 0,
        skipLinks > 0 ? 1 : 0,
        ariaLabels.total > 0 ? 1 : 0,
        formInputs.total === formInputs.withLabel ? 1 : 0,
        links.empty === 0 ? 1 : 0,
        colorIssues === 0 ? 1 : 0
    ].reduce((a, b) => a + b, 0);

    console.log(`\n📊 SEO Score: ${seoScore}/6 (${(seoScore/6*100).toFixed(0)}%)`);
    console.log(`♿ Accessibility Score: ${a11yScore}/6 (${(a11yScore/6*100).toFixed(0)}%)`);

    const totalScore = seoScore + a11yScore;
    console.log(`\n🎯 Gesamt: ${totalScore}/12 (${(totalScore/12*100).toFixed(0)}%)`);

    if (totalScore >= 10) {
        console.log('✅ EXZELLENT - Sehr gut optimiert!');
    } else if (totalScore >= 8) {
        console.log('✓ GUT - Kleinere Verbesserungen möglich');
    } else {
        console.log('⚠️ VERBESSERUNGSBEDARF');
    }

    await browser.close();
}

checkSEOandAccessibility().catch(console.error);
