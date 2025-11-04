<?php
/**
 * Template Name: Tierliebe - Kleintiere
 * Template Post Type: page
 * Description: Kaninchen, Meerschweinchen, Hamster, Mäuse, Ratten, Degus, Chinchillas
 * Version: 1.2.0
 */

get_template_part('tierliebe-parts/header');
$content = get_tierliebe_text('kleintiere');
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title editable" data-key="header-titel">
            <?php echo isset($content['header-titel']) ? wp_kses_post($content['header-titel']) : '🐰 Kleintiere'; ?>
        </h2>
        <p class="section-subtitle editable" data-key="header-untertitel">
            <?php echo isset($content['header-untertitel']) ? wp_kses_post($content['header-untertitel']) : 'Die Wahrheit über "einfache" Haustiere'; ?>
        </p>
    </div>

    <!-- Warnung vorab -->
    <div class="info-box warning" data-emoji="⚠️">
        <h4 class="editable" data-key="warnung-titel">
            <?php echo isset($content['warnung-titel']) ? wp_kses_post($content['warnung-titel']) : 'Wichtige Warnung'; ?>
        </h4>
        <p style="font-size: 1.2rem; text-align: center;" class="editable" data-key="warnung-text">
            <?php echo isset($content['warnung-text']) ? wp_kses_post($content['warnung-text']) : '<strong>"Kleintiere sind keine Einstiegstiere – sie sind oft anspruchsvoller als Hund oder Katze."</strong>'; ?>
        </p>
    </div>

    <!-- Tab Navigation -->
    <div class="tierliebe-tabs" style="margin-top: 50px;">
        <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
            <button class="tab-button active editable" data-tab="kaninchen" data-key="tab-button-kaninchen" style="--current-tab-color: var(--pastel-mint); border-color: var(--pastel-mint);">
                <?php echo isset($content['tab-button-kaninchen']) ? esc_html(strip_tags($content['tab-button-kaninchen'])) : '🐰 Kaninchen & Meerschweinchen'; ?>
            </button>
            <button class="tab-button editable" data-tab="hamster" data-key="tab-button-hamster" style="--current-tab-color: var(--pastel-peach); border-color: var(--pastel-peach);">
                <?php echo isset($content['tab-button-hamster']) ? esc_html(strip_tags($content['tab-button-hamster'])) : '🐹 Hamster'; ?>
            </button>
            <button class="tab-button editable" data-tab="ratten" data-key="tab-button-ratten" style="--current-tab-color: var(--pastel-lavender); border-color: var(--pastel-lavender);">
                <?php echo isset($content['tab-button-ratten']) ? esc_html(strip_tags($content['tab-button-ratten'])) : '🐭 Mäuse & Ratten'; ?>
            </button>
            <button class="tab-button editable" data-tab="degus" data-key="tab-button-degus" style="--current-tab-color: var(--pastel-pink); border-color: var(--pastel-pink);">
                <?php echo isset($content['tab-button-degus']) ? esc_html(strip_tags($content['tab-button-degus'])) : '🐿️ Degus & Chinchillas'; ?>
            </button>
        </div>

        <!-- Tab Content: Kaninchen -->
        <div class="tab-panel active" data-tab="kaninchen">
            <h3 class="editable" data-key="kaninchen-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo isset($content['kaninchen-titel']) ? wp_kses_post($content['kaninchen-titel']) : '🐰 Kaninchen & Meerschweinchen'; ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="kaninchen-mythos1-header">
                            <?php echo isset($content['kaninchen-mythos1-header']) ? wp_kses_post($content['kaninchen-mythos1-header']) : '👶 Mythos 1: "Perfekte Haustiere für Kinder"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="kaninchen-mythos1-h4">
                            <?php echo isset($content['kaninchen-mythos1-h4']) ? wp_kses_post($content['kaninchen-mythos1-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="kaninchen-mythos1-p1">
                            <?php echo isset($content['kaninchen-mythos1-p1']) ? wp_kses_post($content['kaninchen-mythos1-p1']) : 'Kaninchen und Meerschweinchen sind <strong>Fluchttiere</strong> – sie haben Angst vor schnellen Bewegungen, lauten Geräuschen und festen Griffen.'; ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="kaninchen-mythos1-infobox-titel">
                                <?php echo isset($content['kaninchen-mythos1-infobox-titel']) ? wp_kses_post($content['kaninchen-mythos1-infobox-titel']) : '<strong>Warum das für Kinder problematisch ist:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-1">
                                <li>Kinder wollen kuscheln – die Tiere wollen flüchten</li>
                                <li>Kinder sind laut und hektisch – Stress für Fluchttiere</li>
                                <li>Verantwortung bleibt bei Erwachsenen</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="kaninchen-mythos1-p2" style="margin-top: 15px;">
                            <?php echo isset($content['kaninchen-mythos1-p2']) ? wp_kses_post($content['kaninchen-mythos1-p2']) : '<strong>Fakt:</strong> Diese Tiere sind NICHT für Kinder geeignet. Sie brauchen ruhige, geduldige Betreuung.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="kaninchen-mythos2-header">
                            <?php echo isset($content['kaninchen-mythos2-header']) ? wp_kses_post($content['kaninchen-mythos2-header']) : '🏠 Mythos 2: "Ein Käfig im Kinderzimmer reicht"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="kaninchen-mythos2-h4">
                            <?php echo isset($content['kaninchen-mythos2-h4']) ? wp_kses_post($content['kaninchen-mythos2-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="kaninchen-mythos2-p1">
                            <?php echo isset($content['kaninchen-mythos2-p1']) ? wp_kses_post($content['kaninchen-mythos2-p1']) : '<strong>Käfige sind viel zu klein</strong> und Kinderzimmer der falsche Ort.'; ?>
                        </p>
                        <div class="info-box" data-emoji="📏" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="kaninchen-mythos2-infobox-titel">
                                <?php echo isset($content['kaninchen-mythos2-infobox-titel']) ? wp_kses_post($content['kaninchen-mythos2-infobox-titel']) : '<strong>Was sie wirklich brauchen:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-2">
                                <li>Mindestens 4 m² Grundfläche pro Tier</li>
                                <li>Ruhiger Raum (nicht Kinderzimmer!)</li>
                                <li>Tageslicht, frische Luft, konstante Temperatur</li>
                                <li>Strukturierte Einrichtung: Verstecke, Aussichtsplätze</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="kaninchen-mythos2-p2" style="margin-top: 15px;">
                            <?php echo isset($content['kaninchen-mythos2-p2']) ? wp_kses_post($content['kaninchen-mythos2-p2']) : '<strong>Fakt:</strong> Kommerzielle Käfige sind fast immer Tierquälerei.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="kaninchen-mythos3-header">
                            <?php echo isset($content['kaninchen-mythos3-header']) ? wp_kses_post($content['kaninchen-mythos3-header']) : '🐰🐹 Mythos 3: "Man kann Kaninchen und Meerschweinchen zusammen halten"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="kaninchen-mythos3-h4">
                            <?php echo isset($content['kaninchen-mythos3-h4']) ? wp_kses_post($content['kaninchen-mythos3-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="kaninchen-mythos3-p1">
                            <?php echo isset($content['kaninchen-mythos3-p1']) ? wp_kses_post($content['kaninchen-mythos3-p1']) : '<strong>NEIN! Niemals!</strong> Sie haben unterschiedliche Sprachen, Bedürfnisse und Stresslevel.'; ?>
                        </p>
                        <div class="info-box" data-emoji="🚫" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="kaninchen-mythos3-infobox-titel">
                                <?php echo isset($content['kaninchen-mythos3-infobox-titel']) ? wp_kses_post($content['kaninchen-mythos3-infobox-titel']) : '<strong>Warum das nicht funktioniert:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-3">
                                <li>Sie sprechen unterschiedliche "Sprachen"</li>
                                <li>Meerschweinchen sind dem Kaninchen unterlegen</li>
                                <li>Beide leiden unter der falschen Gesellschaft</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="kaninchen-mythos3-p2" style="margin-top: 15px;">
                            <?php echo isset($content['kaninchen-mythos3-p2']) ? wp_kses_post($content['kaninchen-mythos3-p2']) : '<strong>Richtig:</strong> Kaninchen nur mit Kaninchen (ideal: kastriertes Männchen + Weibchen), Meerschweinchen nur mit Meerschweinchen in Gruppen.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="kaninchen-mythos4-header">
                            <?php echo isset($content['kaninchen-mythos4-header']) ? wp_kses_post($content['kaninchen-mythos4-header']) : '💔 Mythos 4: "Einzelhaltung geht, wenn man sich viel kümmert"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="kaninchen-mythos4-h4">
                            <?php echo isset($content['kaninchen-mythos4-h4']) ? wp_kses_post($content['kaninchen-mythos4-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="kaninchen-mythos4-p1">
                            <?php echo isset($content['kaninchen-mythos4-p1']) ? wp_kses_post($content['kaninchen-mythos4-p1']) : '<strong>Einzelhaltung ist Tierquälerei</strong> – egal wie viel Zuwendung du gibst.'; ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="kaninchen-mythos4-infobox-titel">
                                <?php echo isset($content['kaninchen-mythos4-infobox-titel']) ? wp_kses_post($content['kaninchen-mythos4-infobox-titel']) : '<strong>Warum der Mensch nicht reicht:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-4">
                                <li>Du sprichst nicht ihre Sprache</li>
                                <li>Du kannst ihr Sozialverhalten nicht nachahmen</li>
                                <li>Körperwärme, Putzen, Kuscheln fehlt</li>
                                <li>Sie brauchen artgerechte Gesellschaft 24/7</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="kaninchen-mythos4-p2" style="margin-top: 15px;">
                            <?php echo isset($content['kaninchen-mythos4-p2']) ? wp_kses_post($content['kaninchen-mythos4-p2']) : '<strong>Fakt:</strong> Jedes Tier braucht mindestens einen Artgenossen. Immer.'; ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="kaninchen-fakten-titel">
                    <?php echo isset($content['kaninchen-fakten-titel']) ? wp_kses_post($content['kaninchen-fakten-titel']) : 'Die Fakten im Überblick'; ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-5">
                    <li>Beide sind Fluchttiere, die Lärm und schnelle Bewegungen schlecht verkraften</li>
                    <li><strong>Einzelhaltung ist Tierquälerei</strong> – jedes Tier braucht Artgenossen</li>
                    <li>Erforderlicher Platz: mindestens 4 m² pro Tier</li>
                    <li>Kommerzielle Käfige sind fast immer zu klein</li>
                    <li>Kinderzimmer sind ungeeignet (zu laut, unruhig, falsches Klima)</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="🚫">
                <h4 class="editable" data-key="kaninchen-warnung-titel">
                    <?php echo isset($content['kaninchen-warnung-titel']) ? wp_kses_post($content['kaninchen-warnung-titel']) : 'Kritische Warnung'; ?>
                </h4>
                <p class="editable" data-key="kaninchen-warnung-p1">
                    <?php echo isset($content['kaninchen-warnung-p1']) ? wp_kses_post($content['kaninchen-warnung-p1']) : '<strong>"Kaninchen und Meerschweinchen dürfen nicht gemeinsam gehalten werden!"</strong> Sie haben unterschiedliche Sprachen, Bedürfnisse und Stresslevel. Das Meerschweinchen ist dem Kaninchen unterlegen.'; ?>
                </p>
                <h4 class="editable" data-key="kaninchen-warnung-h4" style="margin-top: 20px;">
                    <?php echo isset($content['kaninchen-warnung-h4']) ? wp_kses_post($content['kaninchen-warnung-h4']) : 'Bessere Vergesellschaftung:'; ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-6">
                    <li>Kaninchen nur mit anderen Kaninchen (ideal: kastriertes Männchen + Weibchen)</li>
                    <li>Meerschweinchen nur mit Meerschweinchen in Gruppen</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <h4 class="editable" data-key="kaninchen-gesundheit-titel">
                    <?php echo isset($content['kaninchen-gesundheit-titel']) ? wp_kses_post($content['kaninchen-gesundheit-titel']) : 'Gesundheit & Leiden'; ?>
                </h4>
                <p class="editable" data-key="kaninchen-gesundheit-p1">
                    <?php echo isset($content['kaninchen-gesundheit-p1']) ? wp_kses_post($content['kaninchen-gesundheit-p1']) : 'Meerschweinchen und Kaninchen verstecken Schmerzen meisterlich. Tägliche Beobachtung notwendig: Fressverhalten, Bewegung, Atmung. Tierarztkosten können steigen – Zahnprobleme, Verdauungsstörungen häufig.'; ?>
                </p>
                <div class="highlight-text">
                    <p class="editable" data-key="kaninchen-gesundheit-highlight">
                        <?php echo isset($content['kaninchen-gesundheit-highlight']) ? wp_kses_post($content['kaninchen-gesundheit-highlight']) : '<strong>Wichtig:</strong> "Nur weil ein Kaninchen ruhig im Käfig sitzt, heißt das nicht, dass es ihm gut geht. Oft ist das ein Zeichen von Resignation."'; ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Tab Content: Hamster -->
        <div class="tab-panel" data-tab="hamster">
            <h3 class="editable" data-key="hamster-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo isset($content['hamster-titel']) ? wp_kses_post($content['hamster-titel']) : '🐹 Hamster'; ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="hamster-mythos1-header">
                            <?php echo isset($content['hamster-mythos1-header']) ? wp_kses_post($content['hamster-mythos1-header']) : '👶 Mythos 1: "Perfekt für Kinder – klein, süß, pflegeleicht"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="hamster-mythos1-h4">
                            <?php echo isset($content['hamster-mythos1-h4']) ? wp_kses_post($content['hamster-mythos1-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="hamster-mythos1-p1">
                            <?php echo isset($content['hamster-mythos1-p1']) ? wp_kses_post($content['hamster-mythos1-p1']) : 'Hamster sind <strong>nachtaktiv</strong> – sie schlafen tagsüber und werden erst abends aktiv.'; ?>
                        </p>
                        <div class="info-box" data-emoji="🌙" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="hamster-mythos1-infobox-titel">
                                <?php echo isset($content['hamster-mythos1-infobox-titel']) ? wp_kses_post($content['hamster-mythos1-infobox-titel']) : '<strong>Warum das für Kinder problematisch ist:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-7">
                                <li>Kinder wollen tagsüber spielen – der Hamster schläft</li>
                                <li>Wecken = Dauerstress = verkürzte Lebenszeit</li>
                                <li>Kinder sehen das Tier kaum, haben wenig davon</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="hamster-mythos1-p2" style="margin-top: 15px;">
                            <?php echo isset($content['hamster-mythos1-p2']) ? wp_kses_post($content['hamster-mythos1-p2']) : '<strong>Fakt:</strong> Hamster sind NICHT für Kinder geeignet. Sie sind Beobachtungstiere für geduldige Erwachsene.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="hamster-mythos2-header">
                            <?php echo isset($content['hamster-mythos2-header']) ? wp_kses_post($content['hamster-mythos2-header']) : '📦 Mythos 2: "Ein kleiner Gitterkäfig reicht völlig"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="hamster-mythos2-h4">
                            <?php echo isset($content['hamster-mythos2-h4']) ? wp_kses_post($content['hamster-mythos2-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="hamster-mythos2-p1">
                            <?php echo isset($content['hamster-mythos2-p1']) ? wp_kses_post($content['hamster-mythos2-p1']) : '<strong>Gitterkäfige sind fast immer ungeeignet</strong> – viel zu klein und strukturlos.'; ?>
                        </p>
                        <div class="info-box" data-emoji="📏" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="hamster-mythos2-infobox-titel">
                                <?php echo isset($content['hamster-mythos2-infobox-titel']) ? wp_kses_post($content['hamster-mythos2-infobox-titel']) : '<strong>Was Hamster wirklich brauchen:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-8">
                                <li>Mindestens 0,5–1 m² Grundfläche (besser mehr)</li>
                                <li>Mindestens 30 cm Einstreu zum Graben</li>
                                <li>Geschlossenes Laufrad (mind. 28 cm Durchmesser)</li>
                                <li>Mehrkammernhaus, Verstecke, Tunnel</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="hamster-mythos2-p2" style="margin-top: 15px;">
                            <?php echo isset($content['hamster-mythos2-p2']) ? wp_kses_post($content['hamster-mythos2-p2']) : '<strong>Fakt:</strong> Kommerzielle Hamsterkäfige sind Tierquälerei.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="hamster-mythos3-header">
                            <?php echo isset($content['hamster-mythos3-header']) ? wp_kses_post($content['hamster-mythos3-header']) : '🚫 Mythos 3: "Hamster sind gesellig und brauchen Artgenossen"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="hamster-mythos3-h4">
                            <?php echo isset($content['hamster-mythos3-h4']) ? wp_kses_post($content['hamster-mythos3-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="hamster-mythos3-p1">
                            <?php echo isset($content['hamster-mythos3-p1']) ? wp_kses_post($content['hamster-mythos3-p1']) : '<strong>NEIN! Hamster sind absolute Einzelgänger!</strong>'; ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="hamster-mythos3-infobox-titel">
                                <?php echo isset($content['hamster-mythos3-infobox-titel']) ? wp_kses_post($content['hamster-mythos3-infobox-titel']) : '<strong>Was bei Vergesellschaftung passiert:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-9">
                                <li>Aggressive Kämpfe bis zum Tod</li>
                                <li>Dauerstress, auch wenn sie sich "vertragen"</li>
                                <li>Schwere Verletzungen</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="hamster-mythos3-p2" style="margin-top: 15px;">
                            <?php echo isset($content['hamster-mythos3-p2']) ? wp_kses_post($content['hamster-mythos3-p2']) : '<strong>Fakt:</strong> Hamster müssen IMMER allein gehalten werden. Das ist ihre Natur.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="hamster-mythos4-header">
                            <?php echo isset($content['hamster-mythos4-header']) ? wp_kses_post($content['hamster-mythos4-header']) : '✋ Mythos 4: "Wenn man sie oft anfasst, werden sie zahm"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="hamster-mythos4-h4">
                            <?php echo isset($content['hamster-mythos4-h4']) ? wp_kses_post($content['hamster-mythos4-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="hamster-mythos4-p1">
                            <?php echo isset($content['hamster-mythos4-p1']) ? wp_kses_post($content['hamster-mythos4-p1']) : '<strong>"Zahm werden" bedeutet nicht Zufriedenheit</strong> – viele Hamster ertragen Anfassen, weil sie resigniert haben.'; ?>
                        </p>
                        <div class="info-box" data-emoji="💔" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="hamster-mythos4-infobox-titel">
                                <?php echo isset($content['hamster-mythos4-infobox-titel']) ? wp_kses_post($content['hamster-mythos4-infobox-titel']) : '<strong>Die Wahrheit über "Zähmung":</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-10">
                                <li>Hamster sind keine Kuscheltiere</li>
                                <li>Sie tolerieren Kontakt, genießen ihn aber selten</li>
                                <li>Ständiges Anfassen = Stress</li>
                                <li>Echte Bindung braucht Zeit, Geduld, Respekt</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="hamster-mythos4-p2" style="margin-top: 15px;">
                            <?php echo isset($content['hamster-mythos4-p2']) ? wp_kses_post($content['hamster-mythos4-p2']) : '<strong>Fakt:</strong> Hamster sind Beobachtungstiere. Weniger ist mehr.'; ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="hamster-fakten-titel">
                    <?php echo isset($content['hamster-fakten-titel']) ? wp_kses_post($content['hamster-fakten-titel']) : 'Die Fakten im Überblick'; ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-11">
                    <li><strong>Nachtaktiv</strong> – Kinder haben wenig davon, stören sie eher tagsüber</li>
                    <li>Gitterkäfige sind fast immer ungeeignet</li>
                    <li>Erforderliche Gehegegröße: mindestens 0,5–1 m² Grundfläche</li>
                    <li>Einstreu zum Graben: mindestens 30 cm Tiefe erforderlich</li>
                    <li><strong>Absolute Einzelgänger</strong> – Vergesellschaftung führt zu Verletzungen oder Tod</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="🌙">
                <h4 class="editable" data-key="hamster-verhalten-titel">
                    <?php echo isset($content['hamster-verhalten-titel']) ? wp_kses_post($content['hamster-verhalten-titel']) : 'Verhalten & Leiden'; ?>
                </h4>
                <p class="editable" data-key="hamster-verhalten-p1">
                    <?php echo isset($content['hamster-verhalten-p1']) ? wp_kses_post($content['hamster-verhalten-p1']) : '"Wenn man sie artgerecht hält, sieht man sie kaum. Wenn man sie oft sieht, hält man sie meist nicht artgerecht."'; ?>
                </p>
                <p class="editable" data-key="hamster-verhalten-p2" style="margin-top: 15px;">
                    <?php echo isset($content['hamster-verhalten-p2']) ? wp_kses_post($content['hamster-verhalten-p2']) : 'Hamster leiden häufig leise in zu kleinen Gehegen, durch falsches Futter oder Dauerstress durch Kinderhände. Viele leben nur 1,5–2 Jahre in Isolation und Unterforderung.'; ?>
                </p>
            </div>
        </div>

        <!-- Tab Content: Mäuse & Ratten -->
        <div class="tab-panel" data-tab="ratten">
            <h3 class="editable" data-key="ratten-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo isset($content['ratten-titel']) ? wp_kses_post($content['ratten-titel']) : '🐭 Mäuse & Ratten'; ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="ratten-mythos1-header">
                            <?php echo isset($content['ratten-mythos1-header']) ? wp_kses_post($content['ratten-mythos1-header']) : '⏰ Mythos 1: "Die sind doch eh nur kurzlebig – da kommt es nicht so drauf an"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="ratten-mythos1-h4">
                            <?php echo isset($content['ratten-mythos1-h4']) ? wp_kses_post($content['ratten-mythos1-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="ratten-mythos1-p1">
                            <?php echo isset($content['ratten-mythos1-p1']) ? wp_kses_post($content['ratten-mythos1-p1']) : '<strong>Kurze Lebenszeit bedeutet NICHT weniger Anspruch</strong> – im Gegenteil!'; ?>
                        </p>
                        <div class="info-box" data-emoji="💔" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="ratten-mythos1-infobox-titel">
                                <?php echo isset($content['ratten-mythos1-infobox-titel']) ? wp_kses_post($content['ratten-mythos1-infobox-titel']) : '<strong>Warum diese Einstellung falsch ist:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-12">
                                <li>Jedes Leben zählt – egal wie kurz</li>
                                <li>Sie leiden genauso intensiv wie langlebige Tiere</li>
                                <li>Kurze Leben erfordern MEHR Respekt, nicht weniger</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="ratten-mythos1-p2" style="margin-top: 15px;">
                            <?php echo isset($content['ratten-mythos1-p2']) ? wp_kses_post($content['ratten-mythos1-p2']) : '<strong>Fakt:</strong> Ratten leben 2-3 Jahre, Mäuse 1,5-2,5 Jahre. Jeder Tag davon zählt.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="ratten-mythos2-header">
                            <?php echo isset($content['ratten-mythos2-header']) ? wp_kses_post($content['ratten-mythos2-header']) : '📦 Mythos 2: "Ein Hamsterkäfig reicht auch für Ratten"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="ratten-mythos2-h4">
                            <?php echo isset($content['ratten-mythos2-h4']) ? wp_kses_post($content['ratten-mythos2-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="ratten-mythos2-p1">
                            <?php echo isset($content['ratten-mythos2-p1']) ? wp_kses_post($content['ratten-mythos2-p1']) : '<strong>NEIN!</strong> Ratten brauchen komplex strukturierte Gehege mit vielen Ebenen.'; ?>
                        </p>
                        <div class="info-box" data-emoji="🏗️" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="ratten-mythos2-infobox-titel">
                                <?php echo isset($content['ratten-mythos2-infobox-titel']) ? wp_kses_post($content['ratten-mythos2-infobox-titel']) : '<strong>Was Ratten wirklich brauchen:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-13">
                                <li>Mindestens 0,5 m³ Volumen für 2-3 Tiere</li>
                                <li>Mehrere Ebenen zum Klettern</li>
                                <li>Rückzugsorte, Hängematten, Tunnel</li>
                                <li>Täglicher Auslauf außerhalb des Geheges</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="ratten-mythos2-p2" style="margin-top: 15px;">
                            <?php echo isset($content['ratten-mythos2-p2']) ? wp_kses_post($content['ratten-mythos2-p2']) : '<strong>Fakt:</strong> Kommerzielle "Rattenkäfige" sind meist viel zu klein.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="ratten-mythos3-header">
                            <?php echo isset($content['ratten-mythos3-header']) ? wp_kses_post($content['ratten-mythos3-header']) : '🧼 Mythos 3: "Ratten sind dreckig und übertragen Krankheiten"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="ratten-mythos3-h4">
                            <?php echo isset($content['ratten-mythos3-h4']) ? wp_kses_post($content['ratten-mythos3-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="ratten-mythos3-p1">
                            <?php echo isset($content['ratten-mythos3-p1']) ? wp_kses_post($content['ratten-mythos3-p1']) : '<strong>Ratten sind extrem reinlich!</strong> Dieses Vorurteil ist komplett falsch.'; ?>
                        </p>
                        <div class="info-box" data-emoji="✨" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="ratten-mythos3-infobox-titel">
                                <?php echo isset($content['ratten-mythos3-infobox-titel']) ? wp_kses_post($content['ratten-mythos3-infobox-titel']) : '<strong>Die Wahrheit über Ratten:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-14">
                                <li>Sie putzen sich ständig – sauberer als viele Tiere</li>
                                <li>Haben feste Toilettenecken</li>
                                <li>Hausratten übertragen KEINE Krankheiten</li>
                                <li>Lieben Struktur, Sauberkeit, Rituale</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="ratten-mythos3-p2" style="margin-top: 15px;">
                            <?php echo isset($content['ratten-mythos3-p2']) ? wp_kses_post($content['ratten-mythos3-p2']) : '<strong>Fakt:</strong> Das "dreckige Ratten" Vorurteil stammt von wilden Wanderratten – nicht von Hausratten!'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="ratten-mythos4-header">
                            <?php echo isset($content['ratten-mythos4-header']) ? wp_kses_post($content['ratten-mythos4-header']) : '🐭 Mythos 4: "Mäuse kann man einzeln halten, die sind klein"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="ratten-mythos4-h4">
                            <?php echo isset($content['ratten-mythos4-h4']) ? wp_kses_post($content['ratten-mythos4-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="ratten-mythos4-p1">
                            <?php echo isset($content['ratten-mythos4-p1']) ? wp_kses_post($content['ratten-mythos4-p1']) : '<strong>NEIN! Mäuse sind hochsozial</strong> – Einzelhaltung ist Tierquälerei.'; ?>
                        </p>
                        <div class="info-box" data-emoji="👥" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="ratten-mythos4-infobox-titel">
                                <?php echo isset($content['ratten-mythos4-infobox-titel']) ? wp_kses_post($content['ratten-mythos4-infobox-titel']) : '<strong>Was bei Einzelhaltung passiert:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-15">
                                <li>Verhaltensstörungen</li>
                                <li>Früher Tod durch Stress</li>
                                <li>Depression, Apathie</li>
                                <li>Sie brauchen Artgenossen 24/7</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="ratten-mythos4-p2" style="margin-top: 15px;">
                            <?php echo isset($content['ratten-mythos4-p2']) ? wp_kses_post($content['ratten-mythos4-p2']) : '<strong>Fakt:</strong> Mäuse brauchen mindestens 2-3 Artgenossen. Größe ist irrelevant!'; ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="ratten-fakten-titel">
                    <?php echo isset($content['ratten-fakten-titel']) ? wp_kses_post($content['ratten-fakten-titel']) : 'Die Fakten im Überblick'; ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-16">
                    <li><strong>Hochsoziale Rudeltiere</strong> – niemals einzeln halten</li>
                    <li>Brauchen komplex strukturiertes Gehege mit vielen Ebenen</li>
                    <li>Rückzugsorte, Buddel- und Klettermöglichkeiten erforderlich</li>
                    <li>Sehr intelligent – benötigen Beschäftigung, Tunnel, Auslauf</li>
                    <li><strong>Ratten sind NICHT dreckig:</strong> Sie sind extrem reinlich</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4 class="editable" data-key="ratten-herkunft-titel">
                    <?php echo isset($content['ratten-herkunft-titel']) ? wp_kses_post($content['ratten-herkunft-titel']) : 'Herkunftsprobleme'; ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-17">
                    <li>Tiere aus Zoohandlungen oft überzüchtet oder krank</li>
                    <li>Stammen aus Massenvermehrung ohne genetische Rücksicht</li>
                    <li>Viele sterben früh an Atemwegserkrankungen, Tumoren, Infektionen</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="❤️">
                <h4 class="editable" data-key="ratten-charakter-titel">
                    <?php echo isset($content['ratten-charakter-titel']) ? wp_kses_post($content['ratten-charakter-titel']) : 'Charakter'; ?>
                </h4>
                <p class="editable" data-key="ratten-charakter-p1" style="font-size: 1.2rem;">
                    <?php echo isset($content['ratten-charakter-p1']) ? wp_kses_post($content['ratten-charakter-p1']) : '"Ratten sind sehr menschenbezogen und leiden stark, wenn sie isoliert oder vernachlässigt werden. Sie sind empathischer als viele denken."'; ?>
                </p>
            </div>
        </div>

        <!-- Tab Content: Degus & Chinchillas -->
        <div class="tab-panel" data-tab="degus">
            <h3 class="editable" data-key="degus-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo isset($content['degus-titel']) ? wp_kses_post($content['degus-titel']) : '🐿️ Degus & Chinchillas'; ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="degus-mythos1-header">
                            <?php echo isset($content['degus-mythos1-header']) ? wp_kses_post($content['degus-mythos1-header']) : '🐹 Mythos 1: "Sind einfach nur pelzigere Hamster"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="degus-mythos1-h4">
                            <?php echo isset($content['degus-mythos1-h4']) ? wp_kses_post($content['degus-mythos1-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="degus-mythos1-p1">
                            <?php echo isset($content['degus-mythos1-p1']) ? wp_kses_post($content['degus-mythos1-p1']) : '<strong>Überhaupt nicht!</strong> Degus und Chinchillas sind komplett anders als Hamster.'; ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="degus-mythos1-infobox-titel">
                                <?php echo isset($content['degus-mythos1-infobox-titel']) ? wp_kses_post($content['degus-mythos1-infobox-titel']) : '<strong>Die Unterschiede:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-18">
                                <li>Hochsozial (nicht Einzelgänger!)</li>
                                <li>Sehr intelligent und komplex</li>
                                <li>Spezielle Anforderungen (Sandbad, Temperatur, etc.)</li>
                                <li>Deutlich höhere Lebenserwartung (20+ Jahre!)</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="degus-mythos1-p2" style="margin-top: 15px;">
                            <?php echo isset($content['degus-mythos1-p2']) ? wp_kses_post($content['degus-mythos1-p2']) : '<strong>Fakt:</strong> Sie sind keine "größeren Hamster" – sie sind eigene Arten mit völlig anderen Bedürfnissen.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="degus-mythos2-header">
                            <?php echo isset($content['degus-mythos2-header']) ? wp_kses_post($content['degus-mythos2-header']) : '💔 Mythos 2: "Kann man gut einzeln halten"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="degus-mythos2-h4">
                            <?php echo isset($content['degus-mythos2-h4']) ? wp_kses_post($content['degus-mythos2-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="degus-mythos2-p1">
                            <?php echo isset($content['degus-mythos2-p1']) ? wp_kses_post($content['degus-mythos2-p1']) : '<strong>NEIN! Einzelhaltung ist Tierquälerei!</strong>'; ?>
                        </p>
                        <div class="info-box" data-emoji="👥" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="degus-mythos2-infobox-titel">
                                <?php echo isset($content['degus-mythos2-infobox-titel']) ? wp_kses_post($content['degus-mythos2-infobox-titel']) : '<strong>Warum sie Artgenossen brauchen:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-19">
                                <li>Hochsoziale Rudeltiere</li>
                                <li>Kommunizieren komplex miteinander</li>
                                <li>Putzen, kuscheln, spielen zusammen</li>
                                <li>Ohne Gruppe: Depression, Stereotypien, Selbstverletzung</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="degus-mythos2-p2" style="margin-top: 15px;">
                            <?php echo isset($content['degus-mythos2-p2']) ? wp_kses_post($content['degus-mythos2-p2']) : '<strong>Fakt:</strong> Mindestens 2-3 Tiere pro Gruppe. Immer.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="degus-mythos3-header">
                            <?php echo isset($content['degus-mythos3-header']) ? wp_kses_post($content['degus-mythos3-header']) : '🛁 Mythos 3: "Chinchillas kann man baden wie Kaninchen"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="degus-mythos3-h4">
                            <?php echo isset($content['degus-mythos3-h4']) ? wp_kses_post($content['degus-mythos3-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="degus-mythos3-p1">
                            <?php echo isset($content['degus-mythos3-p1']) ? wp_kses_post($content['degus-mythos3-p1']) : '<strong>Niemals mit Wasser!</strong> Chinchillas brauchen Sandbäder.'; ?>
                        </p>
                        <div class="info-box" data-emoji="💀" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="degus-mythos3-infobox-titel">
                                <?php echo isset($content['degus-mythos3-infobox-titel']) ? wp_kses_post($content['degus-mythos3-infobox-titel']) : '<strong>Warum Wasser gefährlich ist:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-20">
                                <li>Ihr Fell verfilzt und schimmelt</li>
                                <li>Sie können nicht richtig trocknen</li>
                                <li>Gefahr von Unterkühlung und Tod</li>
                                <li>Sie brauchen speziellen Chinchilla-Sand</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="degus-mythos3-p2" style="margin-top: 15px;">
                            <?php echo isset($content['degus-mythos3-p2']) ? wp_kses_post($content['degus-mythos3-p2']) : '<strong>Fakt:</strong> Nur Sandbad! Niemals Wasser!'; ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="degus-mythos4-header">
                            <?php echo isset($content['degus-mythos4-header']) ? wp_kses_post($content['degus-mythos4-header']) : '🧠 Mythos 4: "Degus sind wie Hamster – nur größer"'; ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="degus-mythos4-h4">
                            <?php echo isset($content['degus-mythos4-h4']) ? wp_kses_post($content['degus-mythos4-h4']) : 'Die Wahrheit:'; ?>
                        </h4>
                        <p class="editable" data-key="degus-mythos4-p1">
                            <?php echo isset($content['degus-mythos4-p1']) ? wp_kses_post($content['degus-mythos4-p1']) : '<strong>Degus sind hochintelligent</strong> – deutlich komplexer als Hamster.'; ?>
                        </p>
                        <div class="info-box" data-emoji="🎯" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="degus-mythos4-infobox-titel">
                                <?php echo isset($content['degus-mythos4-infobox-titel']) ? wp_kses_post($content['degus-mythos4-infobox-titel']) : '<strong>Was Degus wirklich sind:</strong>'; ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-21">
                                <li>Extrem intelligent, brauchen mentale Herausforderung</li>
                                <li>Sozial komplex – leben in Großfamilien</li>
                                <li>Können über 20 Jahre alt werden!</li>
                                <li>Ohne Beschäftigung: Stereotypien, Aggression</li>
                            </ul>
                        </div>
                        <p class="editable" data-key="degus-mythos4-p2" style="margin-top: 15px;">
                            <?php echo isset($content['degus-mythos4-p2']) ? wp_kses_post($content['degus-mythos4-p2']) : '<strong>Fakt:</strong> Degus sind wie kleine Affen – nicht wie Hamster.'; ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="degus-fakten-titel">
                    <?php echo isset($content['degus-fakten-titel']) ? wp_kses_post($content['degus-fakten-titel']) : 'Die Fakten im Überblick'; ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-22">
                    <li><strong>Hochsoziale Tiere</strong> – müssen in Gruppen gehalten werden</li>
                    <li><strong>Einzelhaltung ist Tierquälerei</strong></li>
                    <li>Sehr große Volieren erforderlich mit mehreren Etagen</li>
                    <li><strong>Chinchillas:</strong> Brauchen Sandbad (kein Wasser!), vertragen keine Hitze über 25°C</li>
                    <li><strong>Degus:</strong> Hochintelligent, können über 20 Jahre alt werden</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="⏰">
                <h4 class="editable" data-key="degus-anforderungen-titel">
                    <?php echo isset($content['degus-anforderungen-titel']) ? wp_kses_post($content['degus-anforderungen-titel']) : 'Spezifische Anforderungen'; ?>
                </h4>
                <p class="editable" data-key="degus-anforderungen-degus-titel">
                    <?php echo isset($content['degus-anforderungen-degus-titel']) ? wp_kses_post($content['degus-anforderungen-degus-titel']) : '<strong>Degus:</strong>'; ?>
                </p>
                <ul class="editable" data-key="kleintiere-liste-23">
                    <li>Hochintelligent, benötigen geistige Herausforderung</li>
                    <li>Können über 20 Jahre alt werden (Lebenszeit-Verantwortung)</li>
                </ul>
                <p class="editable" data-key="degus-anforderungen-chinchillas-titel" style="margin-top: 20px;">
                    <?php echo isset($content['degus-anforderungen-chinchillas-titel']) ? wp_kses_post($content['degus-anforderungen-chinchillas-titel']) : '<strong>Chinchillas:</strong>'; ?>
                </p>
                <ul class="editable" data-key="kleintiere-liste-24">
                    <li>Benötigen spezielles Staubbad</li>
                    <li>Artgerechtes Futter zwingend erforderlich</li>
                    <li>Konstante Umgebungstemperatur nötig (über 25 °C gefährlich)</li>
                    <li>Können über 20 Jahre alt werden</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="⚠️">
                <h4 class="editable" data-key="degus-probleme-titel">
                    <?php echo isset($content['degus-probleme-titel']) ? wp_kses_post($content['degus-probleme-titel']) : 'Häufige Probleme'; ?>
                </h4>
                <p class="editable" data-key="degus-probleme-p1">
                    <?php echo isset($content['degus-probleme-p1']) ? wp_kses_post($content['degus-probleme-p1']) : 'Zahnerkrankungen, Diabetes, Langeweile, Aggression, Stereotype Bewegungen'; ?>
                </p>
            </div>
        </div>
    </div>

</section>

<?php
// Add page slug for edit mode
if (current_user_can('edit_posts')) {
    echo '<input type="hidden" id="tierliebe-page-slug" value="kleintiere">';
}
?>

<?php get_template_part('tierliebe-parts/footer'); ?>
