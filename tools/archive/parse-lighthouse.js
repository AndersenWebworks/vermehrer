const fs = require('fs');
const html = fs.readFileSync('vm.andersen-webworks.de-20251030T013247.html', 'utf8');
const match = html.match(/window.__LIGHTHOUSE_JSON__ = ({.*?});/s);

if (match) {
    const data = JSON.parse(match[1]);

    console.log('\n=== LIGHTHOUSE SCORES ===\n');
    console.log('Performance:', Math.round(data.categories?.performance?.score * 100), '/100');
    console.log('Accessibility:', Math.round(data.categories?.accessibility?.score * 100), '/100');
    console.log('Best Practices:', Math.round(data.categories?.['best-practices']?.score * 100), '/100');
    console.log('SEO:', Math.round(data.categories?.seo?.score * 100), '/100');

    console.log('\n=== SEO PROBLEME ===\n');
    const seo = data.categories?.seo;
    seo.auditRefs.forEach(ref => {
        const audit = data.audits[ref.id];
        if (audit && audit.score !== null && audit.score < 1) {
            console.log(`❌ ${audit.title}`);
            console.log(`   Score: ${audit.score}`);
            if (audit.description) {
                console.log(`   Info: ${audit.description.substring(0, 150)}...`);
            }
            console.log('');
        }
    });

    console.log('\n=== ACCESSIBILITY PROBLEME ===\n');
    const a11y = data.categories?.accessibility;
    let a11yProblems = 0;
    a11y.auditRefs.forEach(ref => {
        const audit = data.audits[ref.id];
        if (audit && audit.score !== null && audit.score < 1) {
            a11yProblems++;
            console.log(`❌ ${audit.title}`);
            console.log(`   Score: ${audit.score}`);
            if (audit.description) {
                console.log(`   Info: ${audit.description.substring(0, 150)}...`);
            }
            console.log('');
        }
    });

    if (a11yProblems === 0) {
        console.log('✅ Keine kritischen Accessibility-Probleme gefunden!');
    }
}
