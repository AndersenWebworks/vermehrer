<?php
/**
 * Template Name: Tierliebe - Über & Kontakt
 * Template Post Type: page
 * Description: Persönliche Motivation, Autor-Hintergrund, Hilfe-Angebote, Kontaktformular
 * Version: 2.0.0
 */

get_template_part('tierliebe-parts/header');

// Load content from database
$content = get_tierliebe_text('kontakt');
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title editable" data-key="section-titel">
            <?php echo isset($content['section-titel']) ? wp_kses_post($content['section-titel']) : '📧 Über & Kontakt'; ?>
        </h2>
        <p class="section-subtitle editable" data-key="section-subtitle">
            <?php echo isset($content['section-subtitle']) ? wp_kses_post($content['section-subtitle']) : 'Wer steckt dahinter?'; ?>
        </p>
    </div>

    <!-- Persönliche Motivation -->
    <div class="info-box love" data-emoji="❤️">
        <h3 class="editable" data-key="motivation-titel" style="font-size: 1.8rem; margin-bottom: 25px;">
            <?php echo isset($content['motivation-titel']) ? wp_kses_post($content['motivation-titel']) : 'Warum ich all das mache'; ?>
        </h3>
        <p class="editable" data-key="motivation-text-1" style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 20px;">
            <?php echo isset($content['motivation-text-1']) ? wp_kses_post($content['motivation-text-1']) : 'Ich bin <strong>keine Tierärztin</strong>, keine Organisation, kein Profi mit Spendensiegel.'; ?>
        </p>
        <p class="editable" data-key="motivation-text-2" style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 20px;">
            <?php echo isset($content['motivation-text-2']) ? wp_kses_post($content['motivation-text-2']) : 'Ich bin einfach ein Mensch mit Herz für Tiere – und mit dem Wunsch, dass wir besser mit ihnen umgehen.'; ?>
        </p>
    </div>

    <!-- Persönliche Erfahrung -->
    <div class="info-box" style="background: var(--pastel-mint); margin-top: 40px;">
        <h3 class="editable" data-key="erfahrung-titel" style="margin-bottom: 20px;">
            <?php echo isset($content['erfahrung-titel']) ? wp_kses_post($content['erfahrung-titel']) : '💭 Meine Erfahrung'; ?>
        </h3>
        <p class="editable" data-key="erfahrung-text-1" style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 20px;">
            <?php echo isset($content['erfahrung-text-1']) ? wp_kses_post($content['erfahrung-text-1']) : '<strong>Ich habe selbst erlebt, wie schwer es ist, gute Informationen zu finden.</strong>'; ?>
        </p>
        <p class="editable" data-key="erfahrung-text-2" style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
            <?php echo isset($content['erfahrung-text-2']) ? wp_kses_post($content['erfahrung-text-2']) : 'Wie schnell man Fehler macht, obwohl man es gut meint. Und wie wenig es manchmal braucht, um Leid zu verhindern – durch <strong>Wissen, Mitgefühl, Verantwortung.</strong>'; ?>
        </p>
    </div>

    <!-- Ziel der Website -->
    <div class="info-box" style="background: var(--pastel-lavender); margin-top: 40px;">
        <h3 class="editable" data-key="ziel-titel" style="margin-bottom: 20px;">
            <?php echo isset($content['ziel-titel']) ? wp_kses_post($content['ziel-titel']) : '🎯 Das Ziel dieser Seite'; ?>
        </h3>
        <p class="editable" data-key="ziel-text" style="font-size: 1.2rem; line-height: 1.8; margin-bottom: 25px;">
            <?php echo isset($content['ziel-text']) ? wp_kses_post($content['ziel-text']) : '<strong>"Wenn diese Seite nur einen Menschen zum Umdenken bringt, nur ein Tier davor bewahrt, falsch gehalten oder abgeschoben zu werden, dann hat sie ihren Zweck erfüllt."</strong>'; ?>
        </p>
    </div>

    <!-- Abschlussbotschaft -->
    <div class="info-box love" data-emoji="🐾" style="margin-top: 40px;">
        <h3 class="editable" data-key="abschluss-titel" style="text-align: center; font-size: 1.8rem; margin-bottom: 25px;">
            <?php echo isset($content['abschluss-titel']) ? wp_kses_post($content['abschluss-titel']) : 'Tierliebe beginnt nicht mit einem Kauf.'; ?>
        </h3>
        <p class="editable" data-key="abschluss-text" style="text-align: center; font-size: 1.3rem; line-height: 1.8;">
            <?php echo isset($content['abschluss-text']) ? wp_kses_post($content['abschluss-text']) : '<strong>Sie beginnt mit Wissen, Ehrlichkeit und Verantwortung.</strong>'; ?>
        </p>
    </div>

    <!-- Du brauchst Hilfe -->
    <div style="margin-top: 80px;">
        <h2 class="section-title editable" data-key="hilfe-titel" style="text-align: center; margin-bottom: 30px;">
            <?php echo isset($content['hilfe-titel']) ? wp_kses_post($content['hilfe-titel']) : 'Du brauchst Hilfe?'; ?>
        </h2>
        <p class="editable" data-key="hilfe-intro" style="text-align: center; max-width: 700px; margin: 0 auto 50px; font-size: 1.15rem; color: var(--text-medium);">
            <?php echo isset($content['hilfe-intro']) ? wp_kses_post($content['hilfe-intro']) : 'Ich bin kein Verein, keine Organisation – aber manchmal braucht es einfach jemanden, der zuhört.'; ?>
        </p>

        <div class="cards-grid" style="margin-top: 50px;">
            <div class="card mint">
                <span class="card-icon">🏡</span>
                <h3 class="editable" data-key="card-1-titel">
                    <?php echo isset($content['card-1-titel']) ? wp_kses_post($content['card-1-titel']) : 'Aufnahme & Urlaubsbetreuung'; ?>
                </h3>
                <p class="editable" data-key="card-1-text">
                    <?php echo isset($content['card-1-text']) ? wp_kses_post($content['card-1-text']) : 'Wellensittiche und Kleintiere (Kaninchen, Meerschweinchen, Schildkröten – sofern Platz)'; ?>
                </p>
            </div>
            <div class="card peach">
                <span class="card-icon">💬</span>
                <h3 class="editable" data-key="card-2-titel">
                    <?php echo isset($content['card-2-titel']) ? wp_kses_post($content['card-2-titel']) : 'Beratung bei Haltungsfragen'; ?>
                </h3>
                <p class="editable" data-key="card-2-text">
                    <?php echo isset($content['card-2-text']) ? wp_kses_post($content['card-2-text']) : 'Hilfe bei Entscheidung für/gegen Tier, ehrliches Gespräch ohne Vorurteile'; ?>
                </p>
            </div>
            <div class="card lavender">
                <span class="card-icon">🤝</span>
                <h3 class="editable" data-key="card-3-titel">
                    <?php echo isset($content['card-3-titel']) ? wp_kses_post($content['card-3-titel']) : 'Persönliche Ansprache'; ?>
                </h3>
                <p class="editable" data-key="card-3-text">
                    <?php echo isset($content['card-3-text']) ? wp_kses_post($content['card-3-text']) : 'Jemand, der zuhört – ohne zu verurteilen'; ?>
                </p>
            </div>
        </div>

        <div class="info-box" style="margin-top: 50px; background: var(--pastel-peach); text-align: center;">
            <p class="editable" data-key="quote-text" style="font-size: 1.2rem; line-height: 1.8;">
                <?php echo isset($content['quote-text']) ? wp_kses_post($content['quote-text']) : '<strong>"Du musst nichts perfekt machen. Aber du kannst den Unterschied machen – für ein Lebewesen, das dich braucht."</strong>'; ?>
            </p>
        </div>
    </div>

    <div class="info-box info" data-emoji="📧" style="margin-top: 50px;">
        <h4 class="editable" data-key="kontakt-titel">
            <?php echo isset($content['kontakt-titel']) ? wp_kses_post($content['kontakt-titel']) : 'Kontakt'; ?>
        </h4>
        <p class="editable" data-key="kontakt-text" style="text-align: center; font-size: 1.2rem;">
            <?php echo isset($content['kontakt-text']) ? wp_kses_post($content['kontakt-text']) : 'Bei Fragen, Anregungen oder Unterstützungsbedarf kannst du dich gerne melden über die Website <a href="https://www.annemarie-andersen.de" style="color: var(--cute-coral); font-weight: 600;">annemarie-andersen.de</a>'; ?>
        </p>
    </div>

</section>

<?php
// Add page slug for edit mode
if (current_user_can('edit_posts')) {
    echo '<input type="hidden" id="tierliebe-page-slug" value="kontakt">';
}

get_template_part('tierliebe-parts/footer');
?>
