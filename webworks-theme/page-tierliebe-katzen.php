<?php
/**
 * Template Name: Tierliebe - Katzen
 * Template Post Type: page
 * Description: Mythen und Fakten über Katzen
 * Version: 1.2.0
 */

get_template_part('tierliebe-parts/header');
$content = get_tierliebe_text('katzen');
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title editable" data-key="header-titel">
            <?php echo isset($content['header-titel']) ? wp_kses_post($content['header-titel']) : '🐱 Katzen'; ?>
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
                <span class="editable" data-key="mythos1-header"><?php echo isset($content['mythos1-header']) ? esc_html(strip_tags($content['mythos1-header'])) : '💔 Mythos 1: "Katzen sind Einzelgänger – die brauchen keinen Partner"'; ?></span>
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
                <h4 class="editable" data-key="mythos1-wahrheit-titel">
                    <?php echo isset($content['mythos1-wahrheit-titel']) ? wp_kses_post($content['mythos1-wahrheit-titel']) : 'Die Wahrheit:'; ?>
                </h4>
                <p class="editable" data-key="mythos1-text1">
                    <?php echo isset($content['mythos1-text1']) ? wp_kses_post($content['mythos1-text1']) : 'Katzen sind <strong>keine</strong> Einzelgänger – sie sind Einzeljäger. Das ist ein Unterschied.'; ?>
                </p>
                <p style="margin-top: 15px;" class="editable" data-key="mythos1-text2">
                    <?php echo isset($content['mythos1-text2']) ? wp_kses_post($content['mythos1-text2']) : '<strong>Fakt:</strong> Katzen brauchen Bindung, sichere Rückzugsorte und Ansprache. Einzelhaltung ist fast immer Tierquälerei – außer in begründeten Ausnahmefällen (z. B. ältere Tierschutzkatze, die nie mit Artgenossen gelebt hat).'; ?>
                </p>
                <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-mint);">
                    <p class="editable" data-key="mythos1-box-titel">
                        <?php echo isset($content['mythos1-box-titel']) ? wp_kses_post($content['mythos1-box-titel']) : '<strong>Was passiert bei Einzelhaltung?</strong>'; ?>
                    </p>
                    <ul class="editable" data-key="katzen-liste-1">
                        <li>Langeweile, Frustration, Einsamkeit</li>
                        <li>Verhaltensstörungen (Aggression, Unsauberkeit, Zerstörungswut)</li>
                        <li>Stilles Leiden – Katzen zeigen Schmerz oft nicht sichtbar</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Mythos 2 -->
        <div class="accordion-item">
            <button class="accordion-header">
                <span class="editable" data-key="mythos2-header"><?php echo isset($content['mythos2-header']) ? esc_html(strip_tags($content['mythos2-header'])) : '✂️ Mythos 2: "Kastration ist optional – meine Katze kommt ja nicht raus"'; ?></span>
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
                <h4 class="editable" data-key="mythos2-wahrheit-titel">
                    <?php echo isset($content['mythos2-wahrheit-titel']) ? wp_kses_post($content['mythos2-wahrheit-titel']) : 'Die Wahrheit:'; ?>
                </h4>
                <p class="editable" data-key="mythos2-text1">
                    <?php echo isset($content['mythos2-text1']) ? wp_kses_post($content['mythos2-text1']) : '<strong>Kastration ist KEINE Option – sie ist PFLICHT.</strong>'; ?>
                </p>
                <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                    <p class="editable" data-key="mythos2-box-titel">
                        <?php echo isset($content['mythos2-box-titel']) ? wp_kses_post($content['mythos2-box-titel']) : '<strong>Was passiert bei unkastrierten Katzen?</strong>'; ?>
                    </p>
                    <ul class="editable" data-key="katzen-liste-2">
                        <li><strong>Kater:</strong> Markieren, schreien, werden aggressiv, leiden unter Dauerstress</li>
                        <li><strong>Katzen:</strong> Rolligkeit = Dauerstress, jaulendes Verhalten, Unsauberkeit</li>
                        <li>Scheinträchtigkeit, Gebärmutterentzündungen, Eierstockzysten</li>
                        <li>Gefahr ungewollter Trächtigkeit – selbst bei Wohnungskatzen (Fenster, Balkon, Tür)</li>
                    </ul>
                </div>
                <p style="margin-top: 20px; font-size: 1.1rem;" class="editable" data-key="mythos2-text2">
                    <?php echo isset($content['mythos2-text2']) ? wp_kses_post($content['mythos2-text2']) : '<strong>Fakt:</strong> Unkastrierte Katzen leiden. Kastration verhindert Krankheiten, Stress und ungewollte Vermehrung.'; ?>
                </p>
            </div>
        </div>

        <!-- Mythos 3 -->
        <div class="accordion-item">
            <button class="accordion-header">
                <span class="editable" data-key="mythos3-header"><?php echo isset($content['mythos3-header']) ? esc_html(strip_tags($content['mythos3-header'])) : '🏠 Mythos 3: "Wohnungshaltung geht problemlos – Katzen passen sich an"'; ?></span>
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
                <h4 class="editable" data-key="mythos3-wahrheit-titel">
                    <?php echo isset($content['mythos3-wahrheit-titel']) ? wp_kses_post($content['mythos3-wahrheit-titel']) : 'Die Wahrheit:'; ?>
                </h4>
                <p class="editable" data-key="mythos3-text1">
                    <?php echo isset($content['mythos3-text1']) ? wp_kses_post($content['mythos3-text1']) : 'Wohnungshaltung ist möglich – <strong>aber nur mit viel Abwechslung, Raum und Beschäftigung.</strong>'; ?>
                </p>
                <div class="info-box" data-emoji="✅" style="margin-top: 20px; background: var(--pastel-lavender);">
                    <p class="editable" data-key="mythos3-box-titel">
                        <?php echo isset($content['mythos3-box-titel']) ? wp_kses_post($content['mythos3-box-titel']) : '<strong>Was brauchen Wohnungskatzen?</strong>'; ?>
                    </p>
                    <ul class="editable" data-key="katzen-liste-3">
                        <li>Mindestens <strong>2 Katzen</strong> (außer begründete Ausnahme)</li>
                        <li>Genug Platz zum Klettern, Verstecken, Spielen</li>
                        <li>Tägliches Spielen und Ansprechen durch den Menschen</li>
                        <li>Kratzmöglichkeiten, Aussichtsplätze, Rückzugsorte</li>
                        <li>Katzengras, Spielzeug, Abwechslung</li>
                    </ul>
                </div>
                <p style="margin-top: 20px; font-size: 1.1rem;" class="editable" data-key="mythos3-text2">
                    <?php echo isset($content['mythos3-text2']) ? wp_kses_post($content['mythos3-text2']) : '<strong>Wichtig:</strong> Wohnungshaltung bleibt immer ein Kompromiss – kein Ersatz für Natur, frische Luft, Jagd und Freiheit.'; ?>
                </p>
            </div>
        </div>

    </div>

    <!-- Fakten -->
    <div class="info-box info" data-emoji="✅">
        <h4 class="editable" data-key="fakten-titel">
            <?php echo isset($content['fakten-titel']) ? wp_kses_post($content['fakten-titel']) : 'Die Fakten'; ?>
        </h4>
        <ul class="editable" data-key="katzen-liste-4">
            <li>Katzen brauchen Bindung, sichere Rückzugsorte und Ansprache.</li>
            <li>Unkastrierte Katzen leiden: sie markieren, schreien, werden krank.</li>
            <li>Reine Wohnungshaltung ist nur mit viel Abwechslung, Raum und Beschäftigung artgerecht.</li>
            <li>Einzelhaltung ist fast immer Tierquälerei – außer in begründeten Ausnahmefällen (z. B. ältere Tierschutzkatze).</li>
        </ul>
    </div>

    <!-- Spezifische Frage -->
    <div class="info-box warning" data-emoji="❓">
        <h4 class="editable" data-key="frage-titel">
            <?php echo isset($content['frage-titel']) ? wp_kses_post($content['frage-titel']) : 'Kann eine Katze allein zu Hause bleiben, wenn sie zu zweit ist?'; ?>
        </h4>
        <ul class="editable" data-key="katzen-liste-5">
            <li>Ja, Katzen in guter Gesellschaft (z. B. Geschwister oder harmonisierende Partner) können auch längere Abwesenheiten des Menschen besser verkraften.</li>
            <li>Aber auch hier gilt: Katzen vermissen – besonders wenn der Mensch kaum interagiert.</li>
            <li>Besonders bei Wohnungskatzen ist tägliches Spielen und Ansprechen wichtig.</li>
        </ul>
        <div class="highlight-text">
            <p class="editable" data-key="frage-highlight">
                <?php echo isset($content['frage-highlight']) ? wp_kses_post($content['frage-highlight']) : '<strong>Achtung:</strong> Eine zweite Katze ersetzt nicht den Menschen, aber sie lindert Einsamkeit – sofern beide gut zusammenpassen.'; ?>
            </p>
        </div>
    </div>

    <!-- Wichtiges Wissen -->
    <div class="info-box love" data-emoji="💭">
        <h4 class="editable" data-key="wissen-titel">
            <?php echo isset($content['wissen-titel']) ? wp_kses_post($content['wissen-titel']) : 'Wichtiges Wissen über Katzen'; ?>
        </h4>
        <p style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 25px;" class="editable" data-key="wissen-text1">
            <?php echo isset($content['wissen-text1']) ? wp_kses_post($content['wissen-text1']) : '<strong>"Viele Katzen sind still leidende Tiere."</strong>'; ?>
        </p>
        <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;" class="editable" data-key="wissen-text2">
            <?php echo isset($content['wissen-text2']) ? wp_kses_post($content['wissen-text2']) : 'Sie zeigen Stress und Unwohlsein oft erst spät – und wirken lange Zeit „pflegeleicht", obwohl ihnen wesentliche Bedürfnisse fehlen:'; ?>
        </p>
        <ul class="editable" data-key="katzen-liste-6" style="font-size: 1.05rem; line-height: 1.7; margin-bottom: 25px;">
            <li>Bewegung</li>
            <li>Abwechslung</li>
            <li>Kontakt</li>
            <li>Naturbeobachtung</li>
            <li>Frische Luft</li>
            <li>Gerüche</li>
            <li>Jagdinstinkt</li>
        </ul>
        <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 25px;" class="editable" data-key="wissen-text3">
            <?php echo isset($content['wissen-text3']) ? wp_kses_post($content['wissen-text3']) : '<strong>"Katzen passen sich an ein Menschenleben an."</strong> Wohnungshaltung bleibt immer ein Ersatz für Natur, frische Luft, Jagd und Freiheit. Freigang bringt zwar Natürlichkeit zurück, aber auch Gefahren, die wir ihnen zumuten. <strong>Vollkommen artgerecht ist beides nicht.</strong>'; ?>
        </p>
        <div class="highlight-text" style="background: var(--pastel-coral); padding: 25px; border-radius: 20px; margin-top: 30px;">
            <p style="font-size: 1.25rem; font-weight: 700; text-align: center; margin: 0;" class="editable" data-key="wissen-highlight">
                <?php echo isset($content['wissen-highlight']) ? wp_kses_post($content['wissen-highlight']) : '"Nur weil eine Katze ruhig ist, heißt das nicht, dass es ihr gut geht."'; ?>
            </p>
        </div>
    </div>

</section>

<?php
if (current_user_can('edit_posts')) {
    echo '<input type="hidden" id="tierliebe-page-slug" value="katzen">';
}

get_template_part('tierliebe-parts/footer');
?>
