<?php
/**
 * Template Name: Tierliebe - Hunde
 * Template Post Type: page
 * Description: Mythen und Fakten über Hunde
 * Version: 1.0.0
 */

// Include header
get_template_part('tierliebe-parts/header');
?>

<!-- CONTENT: Hunde -->
<section class="section">
    <div class="section-header">
        <h2 class="section-title">🐶 Hunde</h2>
        <p class="section-subtitle">Mythen vs. Fakten</p>
    </div>

    <!-- Mythen als Cards -->
    <div class="cards-grid" style="grid-template-columns: 1fr 1fr; max-width: 1000px; margin: 0 auto 50px;">
        <div class="card coral">
            <span class="card-icon">❌</span>
            <h3>Mythos</h3>
            <p><em>Hunde brauchen nur Auslauf, dann sind sie zufrieden.</em></p>
        </div>
        <div class="card coral">
            <span class="card-icon">❌</span>
            <h3>Mythos</h3>
            <p><em>Wenn der Hund nicht in die Wohnung macht, während er allein ist, ist doch alles gut.</em></p>
        </div>
    </div>

    <!-- Fakten -->
    <div class="info-box info" data-emoji="✅">
        <h4>Die Fakten</h4>
        <ul>
            <li>Hunde sind Rudeltiere mit komplexem Sozialverhalten. Tägliche Interaktion, Training und geistige Auslastung sind Pflicht.</li>
            <li>Hunde können nicht gut allein sein. 4 Stunden sind schon viel, 8 Stunden täglich ist Tierquälerei.</li>
        </ul>
    </div>

    <!-- Spezielle Frage -->
    <div class="info-box warning" data-emoji="❓">
        <h4>Kann ein Hund 8 Stunden allein bleiben – wenn er einen Hundekumpel und einen Garten hat?</h4>

        <p><strong>Ja, das kann unter bestimmten Bedingungen etwas besser funktionieren:</strong></p>
        <ul>
            <li>die Hunde sind sozial, gut verträglich und wirklich miteinander verbunden</li>
            <li>beide sind schrittweise ans Alleinsein gewöhnt worden</li>
            <li>der Garten ist sicher, groß, bietet Schatten, Wasser und Rückzugsorte</li>
            <li>vor und nach dem Alleinsein gibt es ausgedehnte Spaziergänge, Spiel und Aufmerksamkeit vom Menschen</li>
        </ul>

        <div class="highlight-text">
            <strong>Aber:</strong> Auch mehrere Hunde können ihre Bezugsperson vermissen. Der Garten ersetzt keinen Spaziergang und keine echte Beziehung.
        </div>

        <p style="margin-top: 20px;"><strong>Faustregel:</strong> "Mehrere Hunde im gesicherten Garten sind besser als ein Hund allein in der Wohnung – aber es bleibt ein Kompromiss, keine Empfehlung."</p>

        <div class="highlight-text" style="margin-top: 20px;">
            <strong>Wichtig zu wissen:</strong> Nur weil ein Hund es „aushält", 8 Stunden nicht in die Wohnung zu machen, heißt das nicht, dass es gut für ihn ist. Hunde haben ein natürliches Bedürfnis, sich zu lösen, sich zu bewegen, zu riechen, zu erkunden – sie halten oft aus <strong>Liebe zum Menschen</strong>, was sie innerlich belastet.
        </div>
    </div>

    <!-- Abschließende Aussage -->
    <div class="info-box love" data-emoji="🐾">
        <h4>Die Wahrheit über Hundehaltung</h4>
        <p style="font-size: 1.2rem; line-height: 1.8; text-align: center;">
            "Hunde sind hochsoziale Tiere. Selbst wenn man alles richtig macht, lebt ein Hund in unserer Welt nicht so frei, wie es seiner Natur entspricht. Spaziergänge ersetzen kein selbstbestimmtes Streifen durch Wälder und Felder. <strong>Wer einen Hund hält, entscheidet über jeden Aspekt seines Lebens.</strong>"
        </p>
    </div>

</section>

<?php
// Include footer
get_template_part('tierliebe-parts/footer');
?>
