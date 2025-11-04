<?php
/**
 * Template Name: Tierliebe - Vögel & Exoten
 * Template Post Type: page
 * Description: Wellensittiche, Schildkröten, Goldfische, Reptilien
 * Version: 1.3.0
 */

get_template_part('tierliebe-parts/header');
$content = get_tierliebe_text('exoten');
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title editable" data-key="section-title">
            <?php echo isset($content['section-title']) ? wp_kses_post($content['section-title']) : '🦜 Vögel & Exoten'; ?>
        </h2>
        <p class="section-subtitle editable" data-key="section-subtitle">
            <?php echo isset($content['section-subtitle']) ? wp_kses_post($content['section-subtitle']) : 'Für 99% ungeeignet'; ?>
        </p>
    </div>

    <div class="info-box warning" data-emoji="⚠️">
        <h4 class="editable" data-key="kernaussage-titel" style="font-size: 1.5rem; text-align: center;">
            <?php echo isset($content['kernaussage-titel']) ? wp_kses_post($content['kernaussage-titel']) : 'Kernaussage'; ?>
        </h4>
        <p class="editable" data-key="kernaussage-text" style="font-size: 1.3rem; text-align: center;">
            <?php echo isset($content['kernaussage-text']) ? wp_kses_post($content['kernaussage-text']) : '<strong>"Exoten sind keine Dekoration. Sie gehören nicht in Wohnzimmer."</strong>'; ?>
        </p>
        <p class="editable" data-key="kernaussage-p2" style="text-align: center; margin-top: 15px;">
            <?php echo isset($content['kernaussage-p2']) ? wp_kses_post($content['kernaussage-p2']) : '"Reptilien und Fische leben in hochkomplexen Ökosystemen, die wir im Wohnzimmer niemals nachbilden können."'; ?>
        </p>
    </div>

    <!-- Tabs -->
    <div class="tierliebe-tabs" style="margin-top: 50px;">
        <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
            <button class="tab-button active editable" data-tab="welli" data-key="tab-button-welli" style="--current-tab-color: var(--pastel-blue); border-color: var(--pastel-blue);">
                <?php echo isset($content['tab-button-welli']) ? esc_html(strip_tags($content['tab-button-welli'])) : '🦜 Wellensittich'; ?>
            </button>
            <button class="tab-button editable" data-tab="fisch" data-key="tab-button-fisch" style="--current-tab-color: var(--pastel-mint); border-color: var(--pastel-mint);">
                <?php echo isset($content['tab-button-fisch']) ? esc_html(strip_tags($content['tab-button-fisch'])) : '🐠 Goldfisch'; ?>
            </button>
            <button class="tab-button editable" data-tab="reptil" data-key="tab-button-reptil" style="--current-tab-color: var(--pastel-sage); border-color: var(--pastel-sage);">
                <?php echo isset($content['tab-button-reptil']) ? esc_html(strip_tags($content['tab-button-reptil'])) : '🦎 Reptilien'; ?>
            </button>
            <button class="tab-button editable" data-tab="schildkroete" data-key="tab-button-schildkroete" style="--current-tab-color: var(--pastel-peach); border-color: var(--pastel-peach);">
                <?php echo isset($content['tab-button-schildkroete']) ? esc_html(strip_tags($content['tab-button-schildkroete'])) : '🐢 Schildkröten'; ?>
            </button>
        </div>

        <!-- Wellensittich -->
        <div class="tab-panel active" data-tab="welli">
            <h3 class="editable" data-key="welli-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo isset($content['welli-titel']) ? wp_kses_post($content['welli-titel']) : '🦜 Wellensittich'; ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="welli-mythos1-header">
                            <?php echo isset($content['welli-mythos1-header']) ? wp_kses_post($content['welli-mythos1-header']) : '🗣️ Mythos 1: "Ein Wellensittich allein spricht besser"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="welli-mythos1-h4">
                            <?php echo isset($content['welli-mythos1-h4']) ? wp_kses_post($content['welli-mythos1-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="welli-mythos1-p1">
                            <?php echo isset($content['welli-mythos1-p1']) ? wp_kses_post($content['welli-mythos1-p1']) : '<strong>Das stimmt vielleicht – aber es ist Tierquälerei.</strong>'; ?>
                        </p>
                        <div class="info-box" data-emoji="💔" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="welli-mythos1-infobox-titel">
                                <?php echo isset($content['welli-mythos1-infobox-titel']) ? wp_kses_post($content['welli-mythos1-infobox-titel']) : '<strong>Warum Einzelhaltung grausam ist:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-1">
                                <li>Wellensittiche sind Schwarmtiere</li>
                                <li>Ohne Artgenossen vereinsamen sie</li>
                                <li>Der Mensch kann keinen Partner ersetzen</li>
                                <li>Sprechen aus Verzweiflung, nicht aus Freude</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="welli-mythos1-p2" style="margin-top: 15px;">
                            <?php echo isset($content['welli-mythos1-p2']) ? wp_kses_post($content['welli-mythos1-p2']) : '<strong>Fakt:</strong> Einzelhaltung ist Tierquälerei – auch wenn der Vogel "spricht".'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="welli-mythos2-header">
                            <?php echo isset($content['welli-mythos2-header']) ? wp_kses_post($content['welli-mythos2-header']) : '🏠 Mythos 2: "Ein Käfig reicht"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="welli-mythos2-h4">
                            <?php echo isset($content['welli-mythos2-h4']) ? wp_kses_post($content['welli-mythos2-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="welli-mythos2-p1">
                            <?php echo isset($content['welli-mythos2-p1']) ? wp_kses_post($content['welli-mythos2-p1']) : '<strong>Käfige sind Gefängnisse</strong> – Vögel brauchen Freiflug.'; ?>
                        </p>
                        <div class="info-box" data-emoji="🕊️" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="welli-mythos2-infobox-titel">
                                <?php echo isset($content['welli-mythos2-infobox-titel']) ? wp_kses_post($content['welli-mythos2-infobox-titel']) : '<strong>Was Wellensittiche wirklich brauchen:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-2">
                                <li>Täglicher Freiflug (mehrere Stunden)</li>
                                <li>Große Voliere als Rückzugsort</li>
                                <li>Keine enge Käfighaltung</li>
                                <li>Platz zum Fliegen ist existenziell</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="welli-mythos2-p2" style="margin-top: 15px;">
                            <?php echo isset($content['welli-mythos2-p2']) ? wp_kses_post($content['welli-mythos2-p2']) : '<strong>Fakt:</strong> Ein Käfig im Wohnzimmer = Dauerstress.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="welli-mythos3-header">
                            <?php echo isset($content['welli-mythos3-header']) ? wp_kses_post($content['welli-mythos3-header']) : '🪞 Mythos 3: "Spiegel/Mensch ersetzt Partner"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="welli-mythos3-h4">
                            <?php echo isset($content['welli-mythos3-h4']) ? wp_kses_post($content['welli-mythos3-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="welli-mythos3-p1">
                            <?php echo isset($content['welli-mythos3-p1']) ? wp_kses_post($content['welli-mythos3-p1']) : '<strong>NEIN!</strong> Weder Spiegel noch Mensch können einen echten Partner ersetzen.'; ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="welli-mythos3-infobox-titel">
                                <?php echo isset($content['welli-mythos3-infobox-titel']) ? wp_kses_post($content['welli-mythos3-infobox-titel']) : '<strong>Warum Spiegel schädlich sind:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-3">
                                <li>Vogel versucht mit Spiegelbild zu kommunizieren</li>
                                <li>Wird nie eine Antwort bekommen</li>
                                <li>Führt zu Frustration und Verhaltensstörungen</li>
                                <li>Kein Ersatz für echte Gesellschaft</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="welli-mythos3-p2" style="margin-top: 15px;">
                            <?php echo isset($content['welli-mythos3-p2']) ? wp_kses_post($content['welli-mythos3-p2']) : '<strong>Fakt:</strong> Nur ein echter Artgenosse kann einen Wellensittich glücklich machen.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="welli-mythos4-header">
                            <?php echo isset($content['welli-mythos4-header']) ? wp_kses_post($content['welli-mythos4-header']) : '☀️ Mythos 4: "Wellensittiche brauchen keine UV-Lampe"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="welli-mythos4-h4">
                            <?php echo isset($content['welli-mythos4-h4']) ? wp_kses_post($content['welli-mythos4-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="welli-mythos4-p1">
                            <?php echo isset($content['welli-mythos4-p1']) ? wp_kses_post($content['welli-mythos4-p1']) : '<strong>UV-Lampen sind PFLICHT!</strong> Ohne UV-Licht leben sie in Dunkelheit.'; ?>
                        </p>
                        <div class="info-box" data-emoji="💡" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="welli-mythos4-infobox-titel">
                                <?php echo isset($content['welli-mythos4-infobox-titel']) ? wp_kses_post($content['welli-mythos4-infobox-titel']) : '<strong>Warum UV-Licht so wichtig ist:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-4">
                                <li>Wellensittiche sehen UV-Licht</li>
                                <li>Normales Fensterlicht ist für sie "dunkel"</li>
                                <li>Leben in der Wohnung quasi in Dämmerung</li>
                                <li>Ohne UV: Verhaltensstörungen, Sehprobleme</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="welli-mythos4-p2" style="margin-top: 15px;">
                            <?php echo isset($content['welli-mythos4-p2']) ? wp_kses_post($content['welli-mythos4-p2']) : '<strong>Fakt:</strong> UV-Lampen sind nicht optional – sie sind lebensnotwendig.'; ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="welli-fakten-titel">
                    <?php echo isset($content['welli-fakten-titel']) ? wp_kses_post($content['welli-fakten-titel']) : 'Die Fakten im Überblick'; ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-5">
                    <li>Benötigen Artgenossen – Einzelhaltung ist grausam</li>
                    <li>Können UV-Licht sehen; normales Fensterlicht ist "dunkel"</li>
                    <li>Brauchen Tageslicht oder spezielle UV-Lampen</li>
                    <li>Täglicher Freiflug ist notwendig</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <h4 class="editable" data-key="welli-wichtig-titel">
                    <?php echo isset($content['welli-wichtig-titel']) ? wp_kses_post($content['welli-wichtig-titel']) : 'Wichtig'; ?>
                </h4>
                <p class="editable" data-key="welli-wichtig-p1">
                    <?php echo isset($content['welli-wichtig-p1']) ? wp_kses_post($content['welli-wichtig-p1']) : 'Viele Wellensittiche leiden still. Ein apathischer oder ruhiger Vogel wird als "zahm" missverstanden – dabei steckt dahinter Angst, Einsamkeit oder Resignation.'; ?>
                </p>
                <p class="editable" data-key="welli-wichtig-p2" style="margin-top: 15px; font-size: 1.2rem; text-align: center;">
                    <?php echo isset($content['welli-wichtig-p2']) ? wp_kses_post($content['welli-wichtig-p2']) : '<strong>"Vögel gehören an den Himmel. Selbst die größte Voliere bleibt ein Käfig."</strong>'; ?>
                </p>
            </div>
        </div>

        <!-- Goldfisch -->
        <div class="tab-panel" data-tab="fisch">
            <h3 class="editable" data-key="fisch-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo isset($content['fisch-titel']) ? wp_kses_post($content['fisch-titel']) : '🐠 Goldfisch'; ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="fisch-mythos1-header">
                            <?php echo isset($content['fisch-mythos1-header']) ? wp_kses_post($content['fisch-mythos1-header']) : '💪 Mythos 1: "Goldfische sind robust – die leben überall"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="fisch-mythos1-h4">
                            <?php echo isset($content['fisch-mythos1-h4']) ? wp_kses_post($content['fisch-mythos1-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="fisch-mythos1-p1">
                            <?php echo isset($content['fisch-mythos1-p1']) ? wp_kses_post($content['fisch-mythos1-p1']) : '<strong>Goldfische sind NICHT robust</strong> – sie sterben nur still.'; ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="fisch-mythos1-infobox-titel">
                                <?php echo isset($content['fisch-mythos1-infobox-titel']) ? wp_kses_post($content['fisch-mythos1-infobox-titel']) : '<strong>Die Wahrheit über "Robustheit":</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-6">
                                <li>Sie zeigen Leiden nicht durch Laute</li>
                                <li>Sterben oft qualvoll in zu kleinen Becken</li>
                                <li>Brauchen sauberes Wasser, Sauerstoff, Platz</li>
                                <li>"Robust" = Mythos aus der Zoohandlung</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="fisch-mythos1-p2" style="margin-top: 15px;">
                            <?php echo isset($content['fisch-mythos1-p2']) ? wp_kses_post($content['fisch-mythos1-p2']) : '<strong>Fakt:</strong> Goldfische sind empfindlich und anspruchsvoll.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="fisch-mythos2-header">
                            <?php echo isset($content['fisch-mythos2-header']) ? wp_kses_post($content['fisch-mythos2-header']) : '🏺 Mythos 2: "Ein kleines Becken reicht"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="fisch-mythos2-h4">
                            <?php echo isset($content['fisch-mythos2-h4']) ? wp_kses_post($content['fisch-mythos2-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="fisch-mythos2-p1">
                            <?php echo isset($content['fisch-mythos2-p1']) ? wp_kses_post($content['fisch-mythos2-p1']) : '<strong>Mindestens 100 Liter pro Fisch!</strong> Alles darunter ist Tierquälerei.'; ?>
                        </p>
                        <div class="info-box" data-emoji="📏" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="fisch-mythos2-infobox-titel">
                                <?php echo isset($content['fisch-mythos2-infobox-titel']) ? wp_kses_post($content['fisch-mythos2-infobox-titel']) : '<strong>Was Goldfische wirklich brauchen:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-7">
                                <li>Mindestens 100 Liter pro Fisch</li>
                                <li>Filter, Pumpe, Sauerstoff</li>
                                <li>Regelmäßige Wasserwechsel</li>
                                <li>Goldfischgläser sind Folter</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="fisch-mythos2-p2" style="margin-top: 15px;">
                            <?php echo isset($content['fisch-mythos2-p2']) ? wp_kses_post($content['fisch-mythos2-p2']) : '<strong>Fakt:</strong> Kleine Becken = langsames Ersticken.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="fisch-mythos3-header">
                            <?php echo isset($content['fisch-mythos3-header']) ? wp_kses_post($content['fisch-mythos3-header']) : '⏰ Mythos 3: "Goldfische werden nur 2-3 Jahre alt"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="fisch-mythos3-h4">
                            <?php echo isset($content['fisch-mythos3-h4']) ? wp_kses_post($content['fisch-mythos3-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="fisch-mythos3-p1">
                            <?php echo isset($content['fisch-mythos3-p1']) ? wp_kses_post($content['fisch-mythos3-p1']) : '<strong>Goldfische können 15-20 Jahre alt werden!</strong>'; ?>
                        </p>
                        <div class="info-box" data-emoji="🎂" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="fisch-mythos3-infobox-titel">
                                <?php echo isset($content['fisch-mythos3-infobox-titel']) ? wp_kses_post($content['fisch-mythos3-infobox-titel']) : '<strong>Lebenserwartung bei artgerechter Haltung:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-8">
                                <li>15-20 Jahre sind normal</li>
                                <li>Manche werden sogar 30+ Jahre alt</li>
                                <li>Sterben in Gläsern nach Wochen = nicht natürlich</li>
                                <li>Das ist keine "kurze Lebenszeit" – das ist Mord</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="fisch-mythos3-p2" style="margin-top: 15px;">
                            <?php echo isset($content['fisch-mythos3-p2']) ? wp_kses_post($content['fisch-mythos3-p2']) : '<strong>Fakt:</strong> Goldfische sind langlebig – bei richtiger Haltung.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="fisch-mythos4-header">
                            <?php echo isset($content['fisch-mythos4-header']) ? wp_kses_post($content['fisch-mythos4-header']) : '🚫 Mythos 4: "Man braucht keinen Filter"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="fisch-mythos4-h4">
                            <?php echo isset($content['fisch-mythos4-h4']) ? wp_kses_post($content['fisch-mythos4-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="fisch-mythos4-p1">
                            <?php echo isset($content['fisch-mythos4-p1']) ? wp_kses_post($content['fisch-mythos4-p1']) : '<strong>Filter sind PFLICHT!</strong> Ohne Filter ersticken sie.'; ?>
                        </p>
                        <div class="info-box" data-emoji="💀" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="fisch-mythos4-infobox-titel">
                                <?php echo isset($content['fisch-mythos4-infobox-titel']) ? wp_kses_post($content['fisch-mythos4-infobox-titel']) : '<strong>Warum Filter unverzichtbar sind:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-9">
                                <li>Fische produzieren Ammoniak (giftig)</li>
                                <li>Ohne Filter reichert sich Gift an</li>
                                <li>Fische ersticken an eigenen Ausscheidungen</li>
                                <li>Qualvoller langsamer Tod</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="fisch-mythos4-p2" style="margin-top: 15px;">
                            <?php echo isset($content['fisch-mythos4-p2']) ? wp_kses_post($content['fisch-mythos4-p2']) : '<strong>Fakt:</strong> Filter sind keine Option – sie sind lebensnotwendig.'; ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="fisch-fakten-titel">
                    <?php echo isset($content['fisch-fakten-titel']) ? wp_kses_post($content['fisch-fakten-titel']) : 'Die Fakten im Überblick'; ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-10">
                    <li>Benötigen mindestens 100 Liter pro Fisch</li>
                    <li>Brauchen Filter, Sauerstoff und Pflege</li>
                    <li>Bei artgerechter Haltung 15-20 Jahre alt</li>
                    <li>Ohne Filter ersticken sie an eigenen Ausscheidungen</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4 class="editable" data-key="fisch-schleierschwanz-titel">
                    <?php echo isset($content['fisch-schleierschwanz-titel']) ? wp_kses_post($content['fisch-schleierschwanz-titel']) : 'Schleierschwanz-Problematik'; ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-11">
                    <li>Überlange Flossen = Schwimmprobleme</li>
                    <li>Hervorstehende Augen = Verletzungsgefahr</li>
                    <li>Verkürzte Wirbelsäule durch Zucht</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <p class="editable" data-key="fisch-hilfeschrei-p1">
                    <?php echo isset($content['fisch-hilfeschrei-p1']) ? wp_kses_post($content['fisch-hilfeschrei-p1']) : 'Ein regloser Goldfisch am Boden wird als "faul" fehlinterpretiert – dabei ist es oft ein Hilfeschrei.'; ?>
                </p>
            </div>
        </div>

        <!-- Reptilien -->
        <div class="tab-panel" data-tab="reptil">
            <h3 class="editable" data-key="reptil-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo isset($content['reptil-titel']) ? wp_kses_post($content['reptil-titel']) : '🦎 Reptilien'; ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="reptil-mythos1-header">
                            <?php echo isset($content['reptil-mythos1-header']) ? wp_kses_post($content['reptil-mythos1-header']) : '❄️ Mythos 1: "Brauchen keinen Winterschlaf, keine Sonne"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="reptil-mythos1-h4">
                            <?php echo isset($content['reptil-mythos1-h4']) ? wp_kses_post($content['reptil-mythos1-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="reptil-mythos1-p1">
                            <?php echo isset($content['reptil-mythos1-p1']) ? wp_kses_post($content['reptil-mythos1-p1']) : '<strong>Reptilien brauchen beides!</strong> Ohne stirbt ihr Stoffwechsel.'; ?>
                        </p>
                        <div class="info-box" data-emoji="☀️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="reptil-mythos1-infobox-titel">
                                <?php echo isset($content['reptil-mythos1-infobox-titel']) ? wp_kses_post($content['reptil-mythos1-infobox-titel']) : '<strong>Was Reptilien wirklich brauchen:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-12">
                                <li>Winterschlaf ist für viele Arten überlebenswichtig</li>
                                <li>UV-Licht für Vitamin D3-Synthese</li>
                                <li>Wärmeinseln, Temperaturkontrolle</li>
                                <li>Ohne: Stoffwechselkrankheiten, Organversagen</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="reptil-mythos1-p2" style="margin-top: 15px;">
                            <?php echo isset($content['reptil-mythos1-p2']) ? wp_kses_post($content['reptil-mythos1-p2']) : '<strong>Fakt:</strong> Reptilien haben hochkomplexe Bedürfnisse.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="reptil-mythos2-header">
                            <?php echo isset($content['reptil-mythos2-header']) ? wp_kses_post($content['reptil-mythos2-header']) : '📦 Mythos 2: "Ein kleines Terrarium reicht"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="reptil-mythos2-h4">
                            <?php echo isset($content['reptil-mythos2-h4']) ? wp_kses_post($content['reptil-mythos2-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="reptil-mythos2-p1">
                            <?php echo isset($content['reptil-mythos2-p1']) ? wp_kses_post($content['reptil-mythos2-p1']) : '<strong>Terrarien müssen riesig sein</strong> – und selbst dann sind sie ein Kompromiss.'; ?>
                        </p>
                        <div class="info-box" data-emoji="🏗️" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="reptil-mythos2-infobox-titel">
                                <?php echo isset($content['reptil-mythos2-infobox-titel']) ? wp_kses_post($content['reptil-mythos2-infobox-titel']) : '<strong>Anforderungen an Terrarien:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-13">
                                <li>Artabhängig: oft mehrere Quadratmeter</li>
                                <li>Temperaturzonen, Verstecke, Klettermöglichkeiten</li>
                                <li>Teure Technik (UV-Lampen, Heizung, Luftfeuchtigkeit)</li>
                                <li>Wohnzimmer-Terrarien sind fast immer zu klein</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="reptil-mythos2-p2" style="margin-top: 15px;">
                            <?php echo isset($content['reptil-mythos2-p2']) ? wp_kses_post($content['reptil-mythos2-p2']) : '<strong>Fakt:</strong> Hochkomplexe Ökosysteme sind im Wohnzimmer kaum nachbildbar.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="reptil-mythos3-header">
                            <?php echo isset($content['reptil-mythos3-header']) ? wp_kses_post($content['reptil-mythos3-header']) : '🎯 Mythos 3: "Pflegeleicht und anspruchslos"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="reptil-mythos3-h4">
                            <?php echo isset($content['reptil-mythos3-h4']) ? wp_kses_post($content['reptil-mythos3-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="reptil-mythos3-p1">
                            <?php echo isset($content['reptil-mythos3-p1']) ? wp_kses_post($content['reptil-mythos3-p1']) : '<strong>Reptilien sind extrem anspruchsvoll!</strong> Nichts ist "pflegeleicht".'; ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="reptil-mythos3-infobox-titel">
                                <?php echo isset($content['reptil-mythos3-infobox-titel']) ? wp_kses_post($content['reptil-mythos3-infobox-titel']) : '<strong>Was Reptilien wirklich brauchen:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-14">
                                <li>Fachwissen über die spezifische Art</li>
                                <li>Teure technische Ausstattung</li>
                                <li>Spezielles Futter (oft lebend)</li>
                                <li>Regelmäßige Kontrollen durch Reptilien-Tierarzt</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="reptil-mythos3-p2" style="margin-top: 15px;">
                            <?php echo isset($content['reptil-mythos3-p2']) ? wp_kses_post($content['reptil-mythos3-p2']) : '<strong>Fakt:</strong> Reptilien sind NICHT für Anfänger geeignet.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="reptil-mythos4-header">
                            <?php echo isset($content['reptil-mythos4-header']) ? wp_kses_post($content['reptil-mythos4-header']) : '💔 Mythos 4: "Zeigen Schmerz nicht – also leiden sie nicht"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="reptil-mythos4-h4">
                            <?php echo isset($content['reptil-mythos4-h4']) ? wp_kses_post($content['reptil-mythos4-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="reptil-mythos4-p1">
                            <?php echo isset($content['reptil-mythos4-p1']) ? wp_kses_post($content['reptil-mythos4-p1']) : '<strong>Reptilien leiden still!</strong> Kein Schrei bedeutet nicht kein Schmerz.'; ?>
                        </p>
                        <div class="info-box" data-emoji="😢" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="reptil-mythos4-infobox-titel">
                                <?php echo isset($content['reptil-mythos4-infobox-titel']) ? wp_kses_post($content['reptil-mythos4-infobox-titel']) : '<strong>Stilles Leiden:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-15">
                                <li>Reptilien zeigen Schmerz nicht durch Laute</li>
                                <li>Regungslos = oft sterbend, nicht "faul"</li>
                                <li>Leiden wird als "anspruchslos" fehlinterpretiert</li>
                                <li>Viele sterben, ohne dass es bemerkt wird</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="reptil-mythos4-p2" style="margin-top: 15px;">
                            <?php echo isset($content['reptil-mythos4-p2']) ? wp_kses_post($content['reptil-mythos4-p2']) : '<strong>Fakt:</strong> Stille bedeutet nicht Wohlbefinden.'; ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="reptil-fakten-titel">
                    <?php echo isset($content['reptil-fakten-titel']) ? wp_kses_post($content['reptil-fakten-titel']) : 'Die Fakten im Überblick'; ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-16">
                    <li>Brauchen teure Technik, Fachwissen, Temperaturkontrolle</li>
                    <li>Spezielles Futter erforderlich</li>
                    <li>Hochkomplexe Ökosysteme können im Wohnzimmer nicht nachgebildet werden</li>
                    <li>Reptilien zeigen Schmerz nicht durch Laute</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4 class="editable" data-key="reptil-fehler-titel">
                    <?php echo isset($content['reptil-fehler-titel']) ? wp_kses_post($content['reptil-fehler-titel']) : 'Häufige Fehler'; ?>
                </h4>
                <p class="editable" data-key="reptil-fehler-p1">
                    <?php echo isset($content['reptil-fehler-p1']) ? wp_kses_post($content['reptil-fehler-p1']) : 'Falsche UV-Lampe, keine Wärmeinseln, zu wenig Feuchtigkeit. Folgen: Stoffwechselkrankheiten, Häutungsprobleme, Organversagen.'; ?>
                </p>
                <h4 class="editable" data-key="reptil-albino-titel" style="margin-top: 20px;">
                    <?php echo isset($content['reptil-albino-titel']) ? wp_kses_post($content['reptil-albino-titel']) : 'Albino-Reptilien'; ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-17">
                    <li>Sehschwäche durch Pigmentmangel</li>
                    <li>Lichtempfindlichkeit = Stress</li>
                    <li>Höhere Krankheitsanfälligkeit</li>
                    <li>Überleben in Natur fast nie</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <p class="editable" data-key="reptil-hilfeschrei-p1">
                    <?php echo isset($content['reptil-hilfeschrei-p1']) ? wp_kses_post($content['reptil-hilfeschrei-p1']) : 'Reptilien zeigen keine typischen Schmerzreaktionen. Ein regloser Leguan wird als "faul" fehlinterpretiert – dabei ist es oft ein Hilfeschrei.'; ?>
                </p>
            </div>
        </div>

        <!-- Schildkröten -->
        <div class="tab-panel" data-tab="schildkroete">
            <h3 class="editable" data-key="schildkroete-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo isset($content['schildkroete-titel']) ? wp_kses_post($content['schildkroete-titel']) : '🐢 Schildkröten'; ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="schildkroete-mythos1-header">
                            <?php echo isset($content['schildkroete-mythos1-header']) ? wp_kses_post($content['schildkroete-mythos1-header']) : '🏠 Mythos 1: "Sind pflegeleicht – Terrarium oder Balkon reicht"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="schildkroete-mythos1-h4">
                            <?php echo isset($content['schildkroete-mythos1-h4']) ? wp_kses_post($content['schildkroete-mythos1-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="schildkroete-mythos1-p1">
                            <?php echo isset($content['schildkroete-mythos1-p1']) ? wp_kses_post($content['schildkroete-mythos1-p1']) : '<strong>Schildkröten brauchen große Freigehege!</strong> Terrarium ist Tierquälerei.'; ?>
                        </p>
                        <div class="info-box" data-emoji="🌳" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="schildkroete-mythos1-infobox-titel">
                                <?php echo isset($content['schildkroete-mythos1-infobox-titel']) ? wp_kses_post($content['schildkroete-mythos1-infobox-titel']) : '<strong>Was Schildkröten wirklich brauchen:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-18">
                                <li>Großes Freigehege (nicht Terrarium!)</li>
                                <li>Verstecke, Pflanzen, Erde zum Graben</li>
                                <li>UV-Licht, Wärmelampe</li>
                                <li>Artgerechte Fütterung (Wildkräuter)</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="schildkroete-mythos1-p2" style="margin-top: 15px;">
                            <?php echo isset($content['schildkroete-mythos1-p2']) ? wp_kses_post($content['schildkroete-mythos1-p2']) : '<strong>Fakt:</strong> Wohnungshaltung ist meist tierschutzwidrig.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="schildkroete-mythos2-header">
                            <?php echo isset($content['schildkroete-mythos2-header']) ? wp_kses_post($content['schildkroete-mythos2-header']) : '❄️ Mythos 2: "Brauchen keinen Winterschlaf"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="schildkroete-mythos2-h4">
                            <?php echo isset($content['schildkroete-mythos2-h4']) ? wp_kses_post($content['schildkroete-mythos2-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="schildkroete-mythos2-p1">
                            <?php echo isset($content['schildkroete-mythos2-p1']) ? wp_kses_post($content['schildkroete-mythos2-p1']) : '<strong>Winterschlaf ist lebensnotwendig!</strong> Ohne: Organschäden.'; ?>
                        </p>
                        <div class="info-box" data-emoji="🛌" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="schildkroete-mythos2-infobox-titel">
                                <?php echo isset($content['schildkroete-mythos2-infobox-titel']) ? wp_kses_post($content['schildkroete-mythos2-infobox-titel']) : '<strong>Warum Winterschlaf so wichtig ist:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-19">
                                <li>Reguliert Stoffwechsel</li>
                                <li>Ohne: Organversagen, verkürzte Lebenszeit</li>
                                <li>Muss fachgerecht durchgeführt werden</li>
                                <li>Temperaturen, Feuchtigkeit müssen stimmen</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="schildkroete-mythos2-p2" style="margin-top: 15px;">
                            <?php echo isset($content['schildkroete-mythos2-p2']) ? wp_kses_post($content['schildkroete-mythos2-p2']) : '<strong>Fakt:</strong> Keine Winterruhe = langsames Sterben.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="schildkroete-mythos3-header">
                            <?php echo isset($content['schildkroete-mythos3-header']) ? wp_kses_post($content['schildkroete-mythos3-header']) : '⏰ Mythos 3: "Werden nicht so alt"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="schildkroete-mythos3-h4">
                            <?php echo isset($content['schildkroete-mythos3-h4']) ? wp_kses_post($content['schildkroete-mythos3-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="schildkroete-mythos3-p1">
                            <?php echo isset($content['schildkroete-mythos3-p1']) ? wp_kses_post($content['schildkroete-mythos3-p1']) : '<strong>Schildkröten werden 50-100 Jahre alt!</strong> Das ist eine Lebenszeit-Verpflichtung.'; ?>
                        </p>
                        <div class="info-box" data-emoji="🎂" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="schildkroete-mythos3-infobox-titel">
                                <?php echo isset($content['schildkroete-mythos3-infobox-titel']) ? wp_kses_post($content['schildkroete-mythos3-infobox-titel']) : '<strong>Die Realität der Lebenserwartung:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-20">
                                <li>Viele Arten werden 50-100 Jahre alt</li>
                                <li>Sie können dich überleben!</li>
                                <li>Wer übernimmt sie, wenn du stirbst?</li>
                                <li>Das ist keine Anschaffung für "ein paar Jahre"</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="schildkroete-mythos3-p2" style="margin-top: 15px;">
                            <?php echo isset($content['schildkroete-mythos3-p2']) ? wp_kses_post($content['schildkroete-mythos3-p2']) : '<strong>Fakt:</strong> Eine Schildkröte ist Verantwortung fürs Leben – deins UND ihres.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="schildkroete-mythos4-header">
                            <?php echo isset($content['schildkroete-mythos4-header']) ? wp_kses_post($content['schildkroete-mythos4-header']) : '🏢 Mythos 4: "Kann man gut in der Wohnung halten"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="schildkroete-mythos4-h4">
                            <?php echo isset($content['schildkroete-mythos4-h4']) ? wp_kses_post($content['schildkroete-mythos4-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="schildkroete-mythos4-p1">
                            <?php echo isset($content['schildkroete-mythos4-p1']) ? wp_kses_post($content['schildkroete-mythos4-p1']) : '<strong>Wohnungshaltung ist unmöglich!</strong> Terrarien können Freigehege nicht ersetzen.'; ?>
                        </p>
                        <div class="info-box" data-emoji="🚫" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="schildkroete-mythos4-infobox-titel">
                                <?php echo isset($content['schildkroete-mythos4-infobox-titel']) ? wp_kses_post($content['schildkroete-mythos4-infobox-titel']) : '<strong>Warum Wohnungshaltung nicht funktioniert:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-21">
                                <li>Brauchen echtes Sonnenlicht</li>
                                <li>Natürlichen Boden zum Graben</li>
                                <li>Temperaturschwankungen Tag/Nacht</li>
                                <li>Selbst große Terrarien sind zu klein</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="schildkroete-mythos4-p2" style="margin-top: 15px;">
                            <?php echo isset($content['schildkroete-mythos4-p2']) ? wp_kses_post($content['schildkroete-mythos4-p2']) : '<strong>Fakt:</strong> Freigehege oder gar nicht.'; ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="schildkroete-fakten-titel">
                    <?php echo isset($content['schildkroete-fakten-titel']) ? wp_kses_post($content['schildkroete-fakten-titel']) : 'Die Fakten im Überblick'; ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-22">
                    <li>Brauchen großes Freigehege mit Verstecken, Pflanzen, Erde, UV-Licht, Wärmelampe</li>
                    <li>Benötigen Winterschlaf</li>
                    <li>Viele Arten werden 50 bis 100 Jahre alt</li>
                    <li>Wohnungshaltung ist meist tierschutzwidrig</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4 class="editable" data-key="schildkroete-fehler-titel">
                    <?php echo isset($content['schildkroete-fehler-titel']) ? wp_kses_post($content['schildkroete-fehler-titel']) : 'Häufige Fehler'; ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-23">
                    <li>Haltung ohne Winterschlaf (Organschäden)</li>
                    <li>Keine UVB-Versorgung (Knochenerweichung)</li>
                    <li>Falsches Futter (zu viel Obst, zu wenig Wildkräuter)</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="🐢">
                <p class="editable" data-key="schildkroete-verantwortung-p1" style="font-size: 1.2rem; text-align: center;">
                    <?php echo isset($content['schildkroete-verantwortung-p1']) ? wp_kses_post($content['schildkroete-verantwortung-p1']) : '<strong>"Schildkröten sind stille Mitbewohner – aber sie haben eine laute Wahrheit: Verantwortung dauert ein Leben lang."</strong>'; ?>
                </p>
            </div>
        </div>
    </div>

</section>

<?php
if (current_user_can('edit_posts')) {
    echo '<input type="hidden" id="tierliebe-page-slug" value="exoten">';
}
?>

<?php get_template_part('tierliebe-parts/footer'); ?>
