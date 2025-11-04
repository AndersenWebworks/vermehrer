<?php
/**
 * Template Name: Tierliebe - Hunde
 * Template Post Type: page
 * Description: Mythen und Fakten über Hunde
 * Version: 1.2.0
 */

get_template_part('tierliebe-parts/header');
$content = get_tierliebe_text('hunde');
?>

<!-- CONTENT: Hunde -->
<section class="section">
    <div class="section-header">
        <h2 class="section-title editable" data-key="header-titel">
            <?php echo isset($content['header-titel']) ? wp_kses_post($content['header-titel']) : '🐶 Hunde'; ?>
        </h2>
        <p class="section-subtitle editable" data-key="header-untertitel">
            <?php echo isset($content['header-untertitel']) ? wp_kses_post($content['header-untertitel']) : 'Mythen vs. Fakten'; ?>
        </p>
    </div>

    <!-- Mythen als Accordion -->
    <div class="accordion" style="max-width: 900px; margin: 0 auto 50px;">

        <!-- Mythos 1 -->
        <div class="accordion-item">
            <button class="accordion-header">
                <span class="editable" data-key="mythos1-header"><?php echo isset($content['mythos1-header']) ? esc_html(strip_tags($content['mythos1-header'])) : '🐕 Mythos 1: "Hunde können 8 Stunden allein sein – Hauptsache, sie haben genug Auslauf"'; ?></span>
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
                <h4 class="editable" data-key="mythos1-wahrheit-titel">
                    <?php echo isset($content['mythos1-wahrheit-titel']) ? wp_kses_post($content['mythos1-wahrheit-titel']) : 'Die Wahrheit:'; ?>
                </h4>
                <p class="editable" data-key="mythos1-text1">
                    <?php echo isset($content['mythos1-text1']) ? wp_kses_post($content['mythos1-text1']) : 'Hunde sind <strong>Rudeltiere</strong> mit komplexem Sozialverhalten. Sie brauchen täglich Interaktion, Training und geistige Auslastung – nicht nur körperliche Bewegung.'; ?>
                </p>
                <p style="margin-top: 15px;" class="editable" data-key="mythos1-text2">
                    <?php echo isset($content['mythos1-text2']) ? wp_kses_post($content['mythos1-text2']) : '<strong>Fakt:</strong> Hunde können nicht gut allein sein. 4 Stunden sind schon viel. 8 Stunden täglich ist Tierquälerei.'; ?>
                </p>
                <div class="info-box" style="margin-top: 20px; background: var(--pastel-coral);">
                    <p class="editable" data-key="mythos1-box-titel">
                        <?php echo isset($content['mythos1-box-titel']) ? wp_kses_post($content['mythos1-box-titel']) : '<strong>Was passiert?</strong>'; ?>
                    </p>
                    <ul class="editable" data-key="hunde-liste-1">
                        <li>Stress, Angst, Einsamkeit</li>
                        <li>Trennungsangst entwickelt sich schleichend</li>
                        <li>Viele Hunde resignieren – sie wirken "brav", leiden aber still</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Mythos 2 -->
        <div class="accordion-item">
            <button class="accordion-header">
                <span class="editable" data-key="mythos2-header"><?php echo isset($content['mythos2-header']) ? esc_html(strip_tags($content['mythos2-header'])) : '🏡 Mythos 2: "Ein Hund im Garten mit einem Hundekumpel ist doch glücklich – auch wenn ich arbeiten bin"'; ?></span>
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
                <h4 class="editable" data-key="mythos2-wahrheit-titel">
                    <?php echo isset($content['mythos2-wahrheit-titel']) ? wp_kses_post($content['mythos2-wahrheit-titel']) : 'Die Wahrheit:'; ?>
                </h4>
                <p class="editable" data-key="mythos2-text1">
                    <?php echo isset($content['mythos2-text1']) ? wp_kses_post($content['mythos2-text1']) : '<strong>Ja, das ist besser als ein Hund allein in der Wohnung</strong> – aber es bleibt ein Kompromiss, keine Empfehlung.'; ?>
                </p>
                <div class="info-box" style="margin-top: 20px; background: var(--pastel-mint);">
                    <p class="editable" data-key="mythos2-box-titel">
                        <?php echo isset($content['mythos2-box-titel']) ? wp_kses_post($content['mythos2-box-titel']) : '<strong>Voraussetzungen, damit es überhaupt funktioniert:</strong>'; ?>
                    </p>
                    <ul class="editable" data-key="hunde-liste-2">
                        <li>Die Hunde sind sozial, gut verträglich und wirklich miteinander verbunden</li>
                        <li>Beide sind schrittweise ans Alleinsein gewöhnt worden</li>
                        <li>Der Garten ist sicher, groß, bietet Schatten, Wasser und Rückzugsorte</li>
                        <li>Vor und nach dem Alleinsein gibt es ausgedehnte Spaziergänge, Spiel und Aufmerksamkeit vom Menschen</li>
                    </ul>
                </div>
                <p style="margin-top: 20px; font-size: 1.1rem;" class="editable" data-key="mythos2-text2">
                    <?php echo isset($content['mythos2-text2']) ? wp_kses_post($content['mythos2-text2']) : '<strong>Aber:</strong> Auch mehrere Hunde können ihre Bezugsperson vermissen. Der Garten ersetzt keinen Spaziergang und keine echte Beziehung.'; ?>
                </p>
            </div>
        </div>

        <!-- Mythos 3 -->
        <div class="accordion-item">
            <button class="accordion-header">
                <span class="editable" data-key="mythos3-header"><?php echo isset($content['mythos3-header']) ? esc_html(strip_tags($content['mythos3-header'])) : '🌾 Mythos 3: "Hunde auf einem Bauernhof oder mit viel Freigang leben natürlicher und glücklicher"'; ?></span>
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
                <h4 class="editable" data-key="mythos3-wahrheit-titel">
                    <?php echo isset($content['mythos3-wahrheit-titel']) ? wp_kses_post($content['mythos3-wahrheit-titel']) : 'Die Wahrheit:'; ?>
                </h4>
                <p class="editable" data-key="mythos3-text1">
                    <?php echo isset($content['mythos3-text1']) ? wp_kses_post($content['mythos3-text1']) : 'Das stimmt teilweise – <strong>aber nur, wenn der Mensch trotzdem präsent ist.</strong>'; ?>
                </p>
                <div class="info-box" style="margin-top: 20px; background: var(--pastel-lavender);">
                    <p class="editable" data-key="mythos3-box-titel">
                        <?php echo isset($content['mythos3-box-titel']) ? wp_kses_post($content['mythos3-box-titel']) : '<strong>Problem:</strong>'; ?>
                    </p>
                    <ul class="editable" data-key="hunde-liste-3">
                        <li>Viele "Hofhunde" sind isoliert, haben keinen echten Kontakt zu Menschen</li>
                        <li>Sie werden nicht erzogen, nicht gepflegt, nicht beachtet</li>
                        <li>Oft sind sie angekettet oder in Zwingern – "frei" ist das Gegenteil</li>
                    </ul>
                </div>
                <p style="margin-top: 20px; font-size: 1.1rem;" class="editable" data-key="mythos3-text2">
                    <?php echo isset($content['mythos3-text2']) ? wp_kses_post($content['mythos3-text2']) : '<strong>Faustregel:</strong> Raum allein macht keinen Hund glücklich. Bindung tut es.'; ?>
                </p>
            </div>
        </div>

    </div>

    <!-- Fakten -->
    <div class="info-box info" data-emoji="✅">
        <h4 class="editable" data-key="fakten-titel">
            <?php echo isset($content['fakten-titel']) ? wp_kses_post($content['fakten-titel']) : 'Die Fakten'; ?>
        </h4>
        <ul class="editable" data-key="hunde-liste-4">
            <li>Hunde sind Rudeltiere mit komplexem Sozialverhalten. Tägliche Interaktion, Training und geistige Auslastung sind Pflicht.</li>
            <li>Hunde können nicht gut allein sein. 4 Stunden sind schon viel, 8 Stunden täglich ist Tierquälerei.</li>
        </ul>
    </div>

    <!-- Spezielle Frage -->
    <div class="info-box warning" data-emoji="❓">
        <h4 class="editable" data-key="frage-titel">
            <?php echo isset($content['frage-titel']) ? wp_kses_post($content['frage-titel']) : 'Kann ein Hund 8 Stunden allein bleiben – wenn er einen Hundekumpel und einen Garten hat?'; ?>
        </h4>

        <p class="editable" data-key="frage-text1">
            <?php echo isset($content['frage-text1']) ? wp_kses_post($content['frage-text1']) : '<strong>Ja, das kann unter bestimmten Bedingungen etwas besser funktionieren:</strong>'; ?>
        </p>
        <ul class="editable" data-key="hunde-liste-5">
            <li>die Hunde sind sozial, gut verträglich und wirklich miteinander verbunden</li>
            <li>beide sind schrittweise ans Alleinsein gewöhnt worden</li>
            <li>der Garten ist sicher, groß, bietet Schatten, Wasser und Rückzugsorte</li>
            <li>vor und nach dem Alleinsein gibt es ausgedehnte Spaziergänge, Spiel und Aufmerksamkeit vom Menschen</li>
        </ul>

        <div class="highlight-text">
            <p class="editable" data-key="frage-highlight">
                <?php echo isset($content['frage-highlight']) ? wp_kses_post($content['frage-highlight']) : '<strong>Aber:</strong> Auch mehrere Hunde können ihre Bezugsperson vermissen. Der Garten ersetzt keinen Spaziergang und keine echte Beziehung.'; ?>
            </p>
        </div>

        <p style="margin-top: 20px;" class="editable" data-key="frage-faustregel">
            <?php echo isset($content['frage-faustregel']) ? wp_kses_post($content['frage-faustregel']) : '<strong>Faustregel:</strong> "Mehrere Hunde im gesicherten Garten sind besser als ein Hund allein in der Wohnung – aber es bleibt ein Kompromiss, keine Empfehlung."'; ?>
        </p>
    </div>

    <!-- Wichtige Warnung -->
    <div class="info-box warning" data-emoji="⚠️">
        <h4 class="editable" data-key="warnung-titel">
            <?php echo isset($content['warnung-titel']) ? wp_kses_post($content['warnung-titel']) : 'Wichtig zu wissen'; ?>
        </h4>
        <p style="font-size: 1.15rem; line-height: 1.8;" class="editable" data-key="warnung-text1">
            <?php echo isset($content['warnung-text1']) ? wp_kses_post($content['warnung-text1']) : 'Nur weil ein Hund es „aushält", 8 Stunden nicht in die Wohnung zu machen, heißt das nicht, dass es gut für ihn ist.'; ?>
        </p>
        <p style="font-size: 1.15rem; line-height: 1.8; margin-top: 15px;" class="editable" data-key="warnung-text2">
            <?php echo isset($content['warnung-text2']) ? wp_kses_post($content['warnung-text2']) : 'Hunde haben ein natürliches Bedürfnis, sich zu lösen, sich zu bewegen, zu riechen, zu erkunden – sie halten oft aus <strong>Liebe zum Menschen</strong>, was sie innerlich belastet.'; ?>
        </p>
    </div>

    <!-- Abschließende Fundamentalaussage -->
    <div class="info-box love" data-emoji="🐾">
        <h4 class="editable" data-key="wahrheit-titel">
            <?php echo isset($content['wahrheit-titel']) ? wp_kses_post($content['wahrheit-titel']) : 'Die Wahrheit über Hundehaltung'; ?>
        </h4>
        <p style="font-size: 1.25rem; line-height: 1.8; text-align: center; margin-bottom: 20px;" class="editable" data-key="wahrheit-text1">
            <?php echo isset($content['wahrheit-text1']) ? wp_kses_post($content['wahrheit-text1']) : '<strong>"Hunde sind hochsoziale Tiere. Selbst wenn man alles richtig macht, lebt ein Hund in unserer Welt nicht so frei, wie es seiner Natur entspricht."</strong>'; ?>
        </p>
        <p style="font-size: 1.15rem; line-height: 1.8; text-align: center;" class="editable" data-key="wahrheit-text2">
            <?php echo isset($content['wahrheit-text2']) ? wp_kses_post($content['wahrheit-text2']) : 'Spaziergänge ersetzen kein selbstbestimmtes Streifen durch Wälder und Felder. <strong>Wer einen Hund hält, entscheidet über jeden Aspekt seines Lebens.</strong>'; ?>
        </p>
    </div>


</section>

<?php
if (current_user_can('edit_posts')) {
    echo '<input type="hidden" id="tierliebe-page-slug" value="hunde">';
}

get_template_part('tierliebe-parts/footer');
?>
