<?php
/**
 * Template Name: Tierliebe - Vögel & Exoten
 * Template Post Type: page
 * Description: Wellensittiche, Schildkröten, Goldfische, Reptilien
 * Version: 1.2.0
 */

get_template_part('tierliebe-parts/header');
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title">🦜 Vögel & Exoten</h2>
        <p class="section-subtitle">Für 99% ungeeignet</p>
    </div>

    <div class="info-box warning" data-emoji="⚠️">
        <h4 style="font-size: 1.5rem; text-align: center;">Kernaussage</h4>
        <p style="font-size: 1.3rem; text-align: center;"><strong>"Exoten sind keine Dekoration. Sie gehören nicht in Wohnzimmer."</strong></p>
        <p style="text-align: center; margin-top: 15px;">"Reptilien und Fische leben in hochkomplexen Ökosystemen, die wir im Wohnzimmer niemals nachbilden können."</p>
    </div>

    <!-- Tabs -->
    <div class="tierliebe-tabs" style="margin-top: 50px;">
        <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
            <button class="tab-button active" data-tab="welli" style="--current-tab-color: var(--pastel-blue); border-color: var(--pastel-blue);">🦜 Wellensittich</button>
            <button class="tab-button" data-tab="fisch" style="--current-tab-color: var(--pastel-mint); border-color: var(--pastel-mint);">🐠 Goldfisch</button>
            <button class="tab-button" data-tab="reptil" style="--current-tab-color: var(--pastel-sage); border-color: var(--pastel-sage);">🦎 Reptilien</button>
            <button class="tab-button" data-tab="schildkroete" style="--current-tab-color: var(--pastel-peach); border-color: var(--pastel-peach);">🐢 Schildkröten</button>
        </div>

        <!-- Wellensittich -->
        <div class="tab-panel active" data-tab="welli">
            <h3 style="text-align: center; margin-bottom: 30px;">🦜 Wellensittich</h3>
            <div class="cards-grid" style="margin-bottom: 30px;">
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 1</h4><p><em>Ein Wellensittich allein spricht besser</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 2</h4><p><em>Ein Käfig reicht</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 3</h4><p><em>Spiegel/Mensch ersetzt Partner</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 4</h4><p><em>Wellensittiche brauchen keine UV-Lampe</em></p></div>
            </div>
            <div class="info-box info" data-emoji="✅"><h4>Fakten</h4><ul><li>Benötigen Artgenossen – Einzelhaltung ist grausam</li><li>Können UV-Licht sehen; normales Fensterlicht ist "dunkel"</li><li>Leben in der Wohnung quasi in ständiger Dämmerung</li><li>Brauchen Tageslicht oder spezielle UV-Lampen</li><li>Käfig im Wohnzimmer = Dauerstress</li><li>Täglicher Freiflug ist notwendig</li><li><strong>UV-Lampen sind PFLICHT:</strong> Ohne UV-Licht können sie Farben nicht richtig sehen und entwickeln Verhaltensstörungen</li></ul></div>
            <div class="info-box love" data-emoji="💭"><h4>Wichtig</h4><p>Viele Wellensittiche leiden still. Ein apathischer oder ruhiger Vogel wird als "zahm" missverstanden – dabei steckt dahinter Angst, Einsamkeit oder Resignation.</p><p style="margin-top: 15px; font-size: 1.2rem; text-align: center;"><strong>"Vögel gehören an den Himmel. Selbst die größte Voliere bleibt ein Käfig."</strong></p></div>
        </div>

        <!-- Goldfisch -->
        <div class="tab-panel" data-tab="fisch">
            <h3 style="text-align: center; margin-bottom: 30px;">🐠 Goldfisch</h3>
            <div class="cards-grid" style="max-width: 1000px; margin: 0 auto 30px;">
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 1</h4><p><em>Goldfische sind robust – die leben überall</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 2</h4><p><em>Ein kleines Becken reicht</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 3</h4><p><em>Goldfische werden nur 2-3 Jahre alt</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 4</h4><p><em>Man braucht keinen Filter</em></p></div>
            </div>
            <div class="info-box info" data-emoji="✅"><h4>Fakten</h4><ul><li>Benötigen mindestens 100 Liter pro Fisch</li><li>Alles darunter ist Tierquälerei</li><li>Brauchen Filter, Sauerstoff und Pflege</li><li>Viele Goldfische werden 10, 15 oder 20 Jahre alt</li><li><strong>Lebenserwartung:</strong> Bei artgerechter Haltung 15-20 Jahre – aber viele sterben in kleinen Gläsern nach Wochen</li><li><strong>Filter SIND notwendig:</strong> Ohne Filter ersticken sie an ihren eigenen Ausscheidungen</li></ul></div>
            <div class="info-box warning" data-emoji="⚠️"><h4>Schleierschwanz-Problematik</h4><ul><li>Überlange Flossen = Schwimmprobleme</li><li>Hervorstehende Augen = Verletzungsgefahr</li><li>Verkürzte Wirbelsäule durch Zucht</li></ul></div>
            <div class="info-box love" data-emoji="💭"><p>Ein regloser Goldfisch am Boden wird als "faul" fehlinterpretiert – dabei ist es oft ein Hilfeschrei.</p></div>
        </div>

        <!-- Reptilien -->
        <div class="tab-panel" data-tab="reptil">
            <h3 style="text-align: center; margin-bottom: 30px;">🦎 Reptilien</h3>
            <div class="cards-grid" style="margin-bottom: 30px;">
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 1</h4><p><em>Brauchen keinen Winterschlaf, keine Sonne</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 2</h4><p><em>Ein kleines Terrarium reicht</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 3</h4><p><em>Pflegeleicht und anspruchslos</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 4</h4><p><em>Zeigen Schmerz nicht – also leiden sie nicht</em></p></div>
            </div>
            <div class="info-box info" data-emoji="✅"><h4>Fakten</h4><ul><li>Brauchen teure Technik, Fachwissen, Temperaturkontrolle</li><li>Spezielles Futter erforderlich</li><li>Nicht für Kinderhände geeignet</li><li>Hochkomplexe Ökosysteme können im Wohnzimmer nicht nachgebildet werden</li><li><strong>Stilles Leiden:</strong> Reptilien zeigen Schmerz nicht durch Laute – ein regloser Leguan ist kein "faules" Tier, sondern oft ein sterbendes</li></ul></div>
            <div class="info-box warning" data-emoji="⚠️"><h4>Häufige Fehler</h4><p>Falsche UV-Lampe, keine Wärmeinseln, zu wenig Feuchtigkeit. Folgen: Stoffwechselkrankheiten, Häutungsprobleme, Organversagen.</p><h4 style="margin-top: 20px;">Albino-Reptilien</h4><ul><li>Sehschwäche durch Pigmentmangel</li><li>Lichtempfindlichkeit = Stress</li><li>Höhere Krankheitsanfälligkeit</li><li>Überleben in Natur fast nie</li></ul></div>
            <div class="info-box love" data-emoji="💭"><p>Reptilien zeigen keine typischen Schmerzreaktionen. Ein regloser Leguan wird als "faul" fehlinterpretiert – dabei ist es oft ein Hilfeschrei.</p></div>
        </div>

        <!-- Schildkröten -->
        <div class="tab-panel" data-tab="schildkroete">
            <h3 style="text-align: center; margin-bottom: 30px;">🐢 Schildkröten</h3>
            <div class="cards-grid" style="max-width: 1000px; margin: 0 auto 30px;">
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 1</h4><p><em>Sind pflegeleicht – Terrarium oder Balkon reicht</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 2</h4><p><em>Brauchen keinen Winterschlaf</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 3</h4><p><em>Werden nicht so alt</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos 4</h4><p><em>Kann man gut in der Wohnung halten</em></p></div>
            </div>
            <div class="info-box info" data-emoji="✅"><h4>Fakten</h4><ul><li>Brauchen großes Freigehege mit Verstecken, Pflanzen, Erde, UV-Licht, Wärmelampe</li><li>Benötigen Winterschlaf</li><li>Viele Arten werden 50 bis 100 Jahre alt – kein Tier für ein paar Jahre</li><li>Haltung im Terrarium ist meist tierschutzwidrig</li><li><strong>Lebenszeit-Verantwortung:</strong> Eine Schildkröte kann dich überleben – wer übernimmt sie dann?</li><li><strong>Wohnungshaltung unmöglich:</strong> Selbst große Terrarien können Freigehege nicht ersetzen</li></ul></div>
            <div class="info-box warning" data-emoji="⚠️"><h4>Häufige Fehler</h4><ul><li>Haltung ohne Winterschlaf (Organschäden)</li><li>Keine UVB-Versorgung (Knochenerweichung)</li><li>Falsches Futter (zu viel Obst, zu wenig Wildkräuter)</li></ul></div>
            <div class="info-box love" data-emoji="🐢"><p style="font-size: 1.2rem; text-align: center;"><strong>"Schildkröten sind stille Mitbewohner – aber sie haben eine laute Wahrheit: Verantwortung dauert ein Leben lang."</strong></p></div>
        </div>
    </div>

</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
