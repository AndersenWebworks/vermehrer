const { Hyperbrowser } = require('@hyperbrowser/sdk');

async function buildPageWithComputerUse() {
    const client = new Hyperbrowser({
        apiKey: 'hb_e07071bbb55a55b25d4033f7ead2'
    });

    try {
        console.log('Starte Claude Computer Use Task...');

        const task = `
Du bist ein Webdesigner und sollst eine WordPress-Seite im YOOtheme Pro Page Builder nachbauen.

SCHRITTE:
1. Gehe zu https://vm.andersen-webworks.de/wp-admin
2. Logge dich ein mit:
   - Username: EAndersen
   - Passwort: Y2kpr0n!wa
3. Erstelle eine neue Seite (Seiten -> Neu hinzufügen)
4. Setze den Titel: "Tierliebe-Check Home"
5. Klicke auf "YOOtheme Builder" Button
6. Baue die Seite nach, die auf https://vm.andersen-webworks.de/ zu sehen ist

DIE SEITE HAT FOLGENDE STRUKTUR (von oben nach unten):

HERO SECTION:
- Überschrift: "Du liebst Tiere?"
- Untertext: "Das ist nicht das, was du hören willst. Das ist das, was wahr ist."
- 2 Buttons: "✨ Bin ich bereit? → Zum Test" und "📚 Wissen aufbauen"

3-SPALTEN SECTION:
Spalte 1: "Vorbereitung"
- Text über Verantwortung
- 5 Fragen zu Zeit, Geld, Platz, Dauer, Wissensbedarf

Spalte 2: "Test-Modul"
- Button zum Test
- Text: "Realistische Fragen zu Zeit, Geld & Wissen"

Spalte 3: "Tierarten-Guide"
- Faktenorientierter Überblick über Haustiertypen

STATISTIK SECTION:
- "über 300.000 Tiere in deutschen Tierheimen"
- "nur 30% werden jährlich vermittelt"

6-KARTEN GRID:
- 🐶 Hunde
- 🐱 Katzen
- 🐰 Kleintiere
- 🦎 Vögel & Exoten
- ⚠️ Qualzucht
- ❤️ Adoption

FOOTER:
- Copyright & Autorin (Annemarie Andersen)
- Nachhaltigkeits-Hinweis
- Link zur persönlichen Website

Arbeite Schritt für Schritt und baue die Seite vollständig nach.
Speichere am Ende die Seite.
`;

        console.log('Task wird ausgeführt...');
        console.log('Das kann einige Minuten dauern...');

        const result = await client.agents.claudeComputerUse.startAndWait({
            task: task,
            llm: 'claude-sonnet-4-5',
            maxSteps: 200,
            useComputerAction: true
        });

        console.log('\n=== ERGEBNIS ===');
        console.log('Status:', result.status);
        console.log('Schritte:', result.data?.steps_count || 'N/A');
        console.log('\nFinal Result:');
        console.log(result.data?.final_result || 'Kein Ergebnis');

        if (result.data?.live_url) {
            console.log('\nLive URL:', result.data.live_url);
        }

    } catch (error) {
        console.error('Fehler:', error.message);
        if (error.response) {
            console.error('Response:', JSON.stringify(error.response.data, null, 2));
        }
        throw error;
    }
}

buildPageWithComputerUse();
