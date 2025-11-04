<?php
/**
 * Template Name: Tierliebe - Qualzucht
 * Template Post Type: page
 * Description: Überzüchtung - 8 Rassen mit Bildern
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');
$content = get_tierliebe_text('qualzucht');
?>

<!-- Hero Section -->
<section class="primary-hero" style="min-height: 60vh;">
    <div class="hero-content">
        <h1 class="hero-title editable" data-key="hero-titel">
            <?php echo isset($content['hero-titel']) ? wp_kses_post($content['hero-titel']) : '⚠️ Überzüchtung – Wenn Schönheit Leiden bedeutet'; ?>
        </h1>
        <p class="hero-subtitle editable" data-key="hero-untertitel">
            <?php echo isset($content['hero-untertitel']) ? wp_kses_post($content['hero-untertitel']) : 'Schönheit ist oft teuer bezahlt – und das nicht nur mit Geld. Viele Tiere, die wir ‚süß' oder ‚Edelrassen' nennen, leiden unter genetischen Defekten, weil der Mensch sie für sein Ideal geformt hat.'; ?>
        </p>
    </div>
</section>

<!-- Definition -->
<section class="section">
    <div class="container">
        <div class="info-box" style="background: var(--pastel-coral); color: white; padding: 40px; margin-bottom: 50px;">
            <h2 style="color: white; margin-bottom: 20px;" class="editable" data-key="definition-titel">
                <?php echo isset($content['definition-titel']) ? wp_kses_post($content['definition-titel']) : 'Was ist Überzüchtung?'; ?>
            </h2>
            <p style="font-size: 1.2rem; line-height: 1.8;" class="editable" data-key="definition-text">
                <?php echo isset($content['definition-text']) ? wp_kses_post($content['definition-text']) : 'Überzüchtung bedeutet, dass bestimmte Merkmale durch Zucht so stark hervorgehoben werden, dass das Tier darunter leidet.'; ?>
            </p>

            <h3 style="color: white; margin-top: 30px; margin-bottom: 15px;" class="editable" data-key="warum-titel">
                <?php echo isset($content['warum-titel']) ? wp_kses_post($content['warum-titel']) : 'Warum passiert das?'; ?>
            </h3>
            <ul style="font-size: 1.1rem; line-height: 1.8;" class="editable" data-key="warum-liste">
                <li>Menschen wollen optische "Besonderheiten" (flache Nasen, große Augen, ungewöhnliche Farben)</li>
                <li>Züchter erfüllen diese Wünsche, weil sie sich gut verkaufen</li>
                <li>Tiere mit extremen Merkmalen werden weiterverpaart, auch wenn sie krank sind</li>
            </ul>

            <h3 style="color: white; margin-top: 30px; margin-bottom: 15px;" class="editable" data-key="problem-titel">
                <?php echo isset($content['problem-titel']) ? wp_kses_post($content['problem-titel']) : 'Warum das ein Problem ist:'; ?>
            </h3>
            <ul style="font-size: 1.1rem; line-height: 1.8;" class="editable" data-key="problem-liste">
                <li>Tiere leiden still, weil ihre Schmerzen nicht sofort sichtbar sind</li>
                <li>Besitzer glauben oft, sie hätten ein "besonders schönes Tier", verstehen aber nicht, dass das Tier leidet</li>
                <li>Überzüchtung ist nicht "natürlich" – sie ist ein Ergebnis von menschlichem Wunschdenken</li>
            </ul>

            <p style="font-size: 1.4rem; margin-top: 40px; font-weight: 700; text-align: center;" class="editable" data-key="definition-highlight">
                <?php echo isset($content['definition-highlight']) ? wp_kses_post($content['definition-highlight']) : '💔 Schönheit darf nicht weh tun – auch nicht bei Tieren.'; ?>
            </p>
        </div>

        <h2 class="section-title editable" data-key="rassen-titel" style="text-align: center; margin-bottom: 50px;">
            <?php echo isset($content['rassen-titel']) ? wp_kses_post($content['rassen-titel']) : 'Die 8 häufigsten Qualzuchten'; ?>
        </h2>

        <!-- Rassen Grid -->
        <div class="qualzucht-grid">

            <!-- Rasse 1: Mops & Französische Bulldogge -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
                    $img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_1', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Mops & Französische Bulldogge', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1599744615638-804deec726e7-scaled.jpg" alt="Mops & Französische Bulldogge" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon">🐶</div>
                    <h3 class="editable" data-key="rasse1-titel">
                        <?php echo isset($content['rasse1-titel']) ? wp_kses_post($content['rasse1-titel']) : 'Mops & Französische Bulldogge'; ?>
                    </h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse1-herkunft">
                        <?php echo isset($content['rasse1-herkunft']) ? wp_kses_post($content['rasse1-herkunft']) : 'Gezielt gezüchtet für "süße" flache Gesichter und Falten'; ?>
                    </p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse1-leiden-titel">
                            <?php echo isset($content['rasse1-leiden-titel']) ? wp_kses_post($content['rasse1-leiden-titel']) : 'Leiden:'; ?>
                        </h4>
                        <ul class="editable" data-key="rasse1-leiden-liste">
                            <li>Atemnot (Brachyzephalie, verengte Nasenlöcher)</li>
                            <li>Augenprobleme (hervorstehend, trockene Hornhaut)</li>
                            <li>Hautentzündungen (Falteninfektionen)</li>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse1-wissen">
                        <?php echo isset($content['rasse1-wissen']) ? wp_kses_post($content['rasse1-wissen']) : '<strong>💡 Wissen:</strong> Auch mit OP können viele Probleme nicht vollständig behoben werden.'; ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 2: Perserkatze -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_2', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Perserkatze', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1512356587788-4f5ad49c16e9-scaled.jpg" alt="Perserkatze" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon">🐱</div>
                    <h3 class="editable" data-key="rasse2-titel">
                        <?php echo isset($content['rasse2-titel']) ? wp_kses_post($content['rasse2-titel']) : 'Perserkatze'; ?>
                    </h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse2-herkunft">
                        <?php echo isset($content['rasse2-herkunft']) ? wp_kses_post($content['rasse2-herkunft']) : 'Flaches Gesicht, große Augen – "edler Look"'; ?>
                    </p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse2-leiden-titel">
                            <?php echo isset($content['rasse2-leiden-titel']) ? wp_kses_post($content['rasse2-leiden-titel']) : 'Leiden:'; ?>
                        </h4>
                        <ul class="editable" data-key="rasse2-leiden-liste">
                            <li>Verstopfte Tränenkanäle = ständiges Augentränen</li>
                            <li>Atemprobleme durch flache Nasenpartie</li>
                            <li>Zahnfehlstellungen</li>
                            <li>Hautfalten = Pilzinfektionen</li>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse2-wissen">
                        <?php echo isset($content['rasse2-wissen']) ? wp_kses_post($content['rasse2-wissen']) : '<strong>💡 Wissen:</strong> Viele Perser sind lebenslang auf Augenpflege angewiesen.'; ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 3: Schauwellensittich -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_3', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Schauwellensittich', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1720423755825-d5606544e6b7-scaled.jpg" alt="Schauwellensittich" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon">🦜</div>
                    <h3 class="editable" data-key="rasse3-titel">
                        <?php echo isset($content['rasse3-titel']) ? wp_kses_post($content['rasse3-titel']) : 'Schauwellensittich'; ?>
                    </h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse3-herkunft">
                        <?php echo isset($content['rasse3-herkunft']) ? wp_kses_post($content['rasse3-herkunft']) : 'Überlange Federn für "flauschiges" Aussehen (als Ausstellungsrasse gezüchtet)'; ?>
                    </p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse3-leiden-titel">
                            <?php echo isset($content['rasse3-leiden-titel']) ? wp_kses_post($content['rasse3-leiden-titel']) : 'Leiden:'; ?>
                        </h4>
                        <ul class="editable" data-key="rasse3-leiden-liste">
                            <li>Sichtprobleme (Augen unter Federn verborgen)</li>
                            <li>Schnabeldeformationen = Kauprobleme</li>
                            <li>Schwaches Immunsystem durch Inzucht</li>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse3-wissen">
                        <?php echo isset($content['rasse3-wissen']) ? wp_kses_post($content['rasse3-wissen']) : '<strong>💡 Wissen:</strong> Ein "schöner" Welli kann oft nicht mehr richtig fliegen.'; ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 4: Widderkaninchen -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_4', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Widderkaninchen', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1649007985567-fe6ce04680d3-scaled.jpg" alt="Widderkaninchen" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon">🐰</div>
                    <h3 class="editable" data-key="rasse4-titel">
                        <?php echo isset($content['rasse4-titel']) ? wp_kses_post($content['rasse4-titel']) : 'Widderkaninchen'; ?>
                    </h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse4-herkunft">
                        <?php echo isset($content['rasse4-herkunft']) ? wp_kses_post($content['rasse4-herkunft']) : 'Hängende Ohren für "niedliches" Aussehen'; ?>
                    </p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse4-leiden-titel">
                            <?php echo isset($content['rasse4-leiden-titel']) ? wp_kses_post($content['rasse4-leiden-titel']) : 'Leiden:'; ?>
                        </h4>
                        <ul class="editable" data-key="rasse4-leiden-liste">
                            <li>Ohrenfehlstellung = Schwerhörigkeit</li>
                            <li>Gehörgangsentzündungen</li>
                            <li>Nervenprobleme durch verformten Schädel</li>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse4-wissen">
                        <?php echo isset($content['rasse4-wissen']) ? wp_kses_post($content['rasse4-wissen']) : '<strong>💡 Wissen:</strong> Die "süßen" Ohren sind ein Schmerzfaktor.'; ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 5: Schleierschwanz-Goldfisch -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_5', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Schleierschwanz-Goldfisch', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1650290145779-e05602773fc7-scaled.jpg" alt="Schleierschwanz-Goldfisch" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon">🐠</div>
                    <h3 class="editable" data-key="rasse5-titel">
                        <?php echo isset($content['rasse5-titel']) ? wp_kses_post($content['rasse5-titel']) : 'Schleierschwanz-Goldfisch'; ?>
                    </h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse5-herkunft">
                        <?php echo isset($content['rasse5-herkunft']) ? wp_kses_post($content['rasse5-herkunft']) : 'Überlange Flossen, kugeliger Körper'; ?>
                    </p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse5-leiden-titel">
                            <?php echo isset($content['rasse5-leiden-titel']) ? wp_kses_post($content['rasse5-leiden-titel']) : 'Leiden:'; ?>
                        </h4>
                        <ul class="editable" data-key="rasse5-leiden-liste">
                            <li>Schwimmprobleme (Schleppflossen)</li>
                            <li>Augenprobleme (hervorstehend, verletzungsanfällig)</li>
                            <li>Skelettdeformationen</li>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse5-wissen">
                        <?php echo isset($content['rasse5-wissen']) ? wp_kses_post($content['rasse5-wissen']) : '<strong>💡 Wissen:</strong> Das "prachtvolle" Aussehen ist in Wirklichkeit eine Behinderung.'; ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 6: Albino-Reptilien -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_6', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Albino-Reptilien', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1639648702729-395a9b8b1133-scaled.jpg" alt="Albino-Reptilien" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon">🦎</div>
                    <h3 class="editable" data-key="rasse6-titel">
                        <?php echo isset($content['rasse6-titel']) ? wp_kses_post($content['rasse6-titel']) : 'Albino-Reptilien'; ?>
                    </h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse6-herkunft">
                        <?php echo isset($content['rasse6-herkunft']) ? wp_kses_post($content['rasse6-herkunft']) : 'Genmutation für besondere Farbvarianten'; ?>
                    </p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse6-leiden-titel">
                            <?php echo isset($content['rasse6-leiden-titel']) ? wp_kses_post($content['rasse6-leiden-titel']) : 'Leiden:'; ?>
                        </h4>
                        <ul class="editable" data-key="rasse6-leiden-liste">
                            <li>Sehschwäche durch Pigmentmangel</li>
                            <li>Lichtempfindlichkeit = Stress</li>
                            <li>Höhere Anfälligkeit für Krankheiten</li>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse6-wissen">
                        <?php echo isset($content['rasse6-wissen']) ? wp_kses_post($content['rasse6-wissen']) : '<strong>💡 Wissen:</strong> Albinos überleben in der Natur fast nie – als Haustiere auch nur schwer.'; ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 7: Malteser & Zwerghunde -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_7', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Malteser & Zwerghunde', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1587300003388-59208cc962cb-scaled.jpg" alt="Malteser & Zwerghunde" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon">🐕</div>
                    <h3 class="editable" data-key="rasse7-titel">
                        <?php echo isset($content['rasse7-titel']) ? wp_kses_post($content['rasse7-titel']) : 'Malteser & Zwerghunde'; ?>
                    </h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse7-herkunft">
                        <?php echo isset($content['rasse7-herkunft']) ? wp_kses_post($content['rasse7-herkunft']) : 'Extreme Kleinzüchtung für dekoratives Aussehen'; ?>
                    </p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse7-leiden-titel">
                            <?php echo isset($content['rasse7-leiden-titel']) ? wp_kses_post($content['rasse7-leiden-titel']) : 'Leiden:'; ?>
                        </h4>
                        <ul class="editable" data-key="rasse7-leiden-liste">
                            <li>Haarpflege aufwendig = Hautprobleme bei Vernachlässigung</li>
                            <li>Kleine Körpergröße = Gelenkprobleme</li>
                            <li>Überzüchtete Tränenkanäle</li>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse7-wissen">
                        <?php echo isset($content['rasse7-wissen']) ? wp_kses_post($content['rasse7-wissen']) : '<strong>💡 Wissen:</strong> Je kleiner ein Hund gezüchtet wird, desto mehr Gesundheitsprobleme entstehen.'; ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 8: Scottish-Fold-Katze -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_8', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Scottish-Fold-Katze', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1563210220-05f7b87c695c-scaled.jpg" alt="Scottish-Fold-Katze" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon">🐱</div>
                    <h3 class="editable" data-key="rasse8-titel">
                        <?php echo isset($content['rasse8-titel']) ? wp_kses_post($content['rasse8-titel']) : 'Scottish-Fold-Katze'; ?>
                    </h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse8-herkunft">
                        <?php echo isset($content['rasse8-herkunft']) ? wp_kses_post($content['rasse8-herkunft']) : 'Genmutation für gefaltete Ohren'; ?>
                    </p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse8-leiden-titel">
                            <?php echo isset($content['rasse8-leiden-titel']) ? wp_kses_post($content['rasse8-leiden-titel']) : 'Leiden:'; ?>
                        </h4>
                        <ul class="editable" data-key="rasse8-leiden-liste">
                            <li>Schmerzhafte Gelenkdeformationen</li>
                            <li>Knorpelprobleme (Osteochondrodysplasie)</li>
                            <li>Ohrenentzündungen</li>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse8-wissen">
                        <?php echo isset($content['rasse8-wissen']) ? wp_kses_post($content['rasse8-wissen']) : '<strong>💡 Wissen:</strong> Die "süßen" Ohren bedeuten für die Katze chronischen Schmerz.'; ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="cta-section" style="margin-top: 80px; text-align: center;">
            <h3 style="font-size: 2rem; margin-bottom: 25px;" class="editable" data-key="cta-titel">
                <?php echo isset($content['cta-titel']) ? wp_kses_post($content['cta-titel']) : 'Möchtest du wirklich Tierliebe zeigen?'; ?>
            </h3>
            <p style="font-size: 1.2rem; margin-bottom: 35px; color: var(--text-medium);" class="editable" data-key="cta-text">
                <?php echo isset($content['cta-text']) ? wp_kses_post($content['cta-text']) : 'Dann adoptiere aus dem Tierschutz – keine Qualzucht, keine Massenzucht, nur echte zweite Chancen.'; ?>
            </p>
            <a href="<?php echo home_url('/tierliebe-adoption'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 18px 45px;">
                ❤️ Mehr über Adoption erfahren
            </a>
        </div>

    </div>
</section>

<?php
if (current_user_can('edit_posts')) {
    echo '<input type="hidden" id="tierliebe-page-slug" value="qualzucht">';
}

get_template_part('tierliebe-parts/footer');
?>
