<?php
/**
 * Template Name: Tierliebe - Start
 * Template Post Type: page
 * Description: Startseite für Tierliebe-Portal (Dynamic Content)
 * Version: 3.0.0
 */

get_template_part('tierliebe-parts/header');

// Load content from database
$content = get_tierliebe_text('home');
?>

<!-- Primary Hero -->
<section class="primary-hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1 class="hero-title editable" data-key="header-titel">
                <?php echo isset($content['header-titel']) ? esc_html(strip_tags($content['header-titel'])) : 'Du liebst Tiere?'; ?>
            </h1>
            <p class="hero-subtitle editable" data-key="untertitel">
                <?php echo isset($content['untertitel']) ? wp_kses_post(trim($content['untertitel'], '"')) : 'Dann lies hier nicht, was du hören willst – sondern was du wissen musst. Ehrlich. Klar. Und im Sinne der Tiere.'; ?>
            </p>
            <p class="hero-description editable" data-key="einleitungstext">
                <?php echo isset($content['einleitungstext']) ? wp_kses_post(trim($content['einleitungstext'], '"')) : 'Bevor du ein Tier aufnimmst – Hund, Katze, Kaninchen, Welli oder Goldfisch – nimm dir ein paar Minuten für die Wahrheit. Denn: Gute Absichten reichen nicht. Verantwortung schon.'; ?>
            </p>
            <div class="hero-buttons">
                <a href="<?php echo isset($content['button-test-url']) ? esc_url($content['button-test-url']) : home_url('/tierliebe-test'); ?>" class="btn btn-primary" data-editable-url="button-test-url">
                    <span class="editable" data-key="button-test">
                        <?php echo isset($content['button-test']) ? wp_kses_post($content['button-test']) : '✨ Bin ich bereit? → Zum Test'; ?>
                    </span>
                </a>
                <a href="<?php echo isset($content['button-wissen-url']) ? esc_url($content['button-wissen-url']) : home_url('/tierliebe-wissen'); ?>" class="btn btn-secondary" data-editable-url="button-wissen-url">
                    <span class="editable" data-key="button-wissen">
                        <?php echo isset($content['button-wissen']) ? wp_kses_post($content['button-wissen']) : '📚 Wissen aufbauen'; ?>
                    </span>
                </a>
            </div>
        </div>
        <div class="hero-icon">
            <span class="hero-main-icon">🐾</span>
        </div>
    </div>
</section>

<!-- Bin ich bereit Sektion -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <h2 class="section-title editable" data-key="sektion-bin-ich-bereit-fur-ein-tier" style="text-align: center; margin-bottom: 30px;">
            Bin ich bereit für ein Tier?
        </h2>
        <p class="editable" data-key="sektion-bin-ich-bereit-fur-ein-tier" style="text-align: center; max-width: 800px; margin: 0 auto 30px; font-size: 1.15rem; color: var(--text-medium);">
            <?php
            if (isset($content['sektion-bin-ich-bereit-fur-ein-tier'])) {
                $lines = explode("\n", $content['sektion-bin-ich-bereit-fur-ein-tier']);
                foreach ($lines as $line) {
                    if (strpos($line, '**Einleitungstext:**') !== false) {
                        $text = trim(str_replace(['**Einleitungstext:**', '"'], '', $line));
                        echo wp_kses_post($text);
                        break;
                    }
                }
            } else {
                echo 'Du denkst darüber nach, ein Tier aufzunehmen? Dann nimm dir bitte kurz Zeit für diese Fragen – ganz ehrlich, nur für dich. Denn ein Tier ist keine Phase. Es ist ein Teil deines Lebens – und komplett abhängig von dir.';
            }
?>
        </p>
        <p class="editable" data-key="zentrale-frage" style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.2rem; color: var(--text-dark); font-weight: 600;">
            Bist du der Typ Tierhalter, den Tiere sich wünschen würden?
        </p>

        <div class="info-box info" data-emoji="💭">
            <h3 class="editable" data-key="info-box-bevor-du-ein-tier-holst-frag-dich-ehrlich">
                Bevor du ein Tier holst, frag dich ehrlich:
            </h3>
            <ul style="font-size: 1.1rem; line-height: 1.8;" class="editable" data-key="info-box-checkliste">
                <li>Habe ich <strong>Zeit</strong>? Nicht nur am Wochenende – jeden Tag.</li>
                <li>Habe ich <strong>Geld</strong>? Nicht nur für Futter – auch für Tierarzt, Ausstattung, Notfälle.</li>
                <li>Habe ich <strong>Platz</strong>? Nicht nur einen Käfig – echten Raum zum Leben.</li>
                <li>Bin ich bereit für <strong>10, 15, 20 Jahre</strong> Verantwortung?</li>
                <li>Weiß ich, was das Tier <strong>wirklich</strong> braucht – nicht, was ich mir vorstelle?</li>
            </ul>
        </div>

        <div class="info-box responsibility-box">
            <h3 class="editable" data-key="info-box-ehrlichkeit-ist-der-erste-schritt">
                Ehrlichkeit ist der erste Schritt zu echter Tierliebe
            </h3>
            <p class="editable" data-key="info-box-ehrlichkeit-text">
                Wenn du bei einer Frage oder mehreren Fragen zögerst, ist das kein Grund zur Scham. Es ist ein Zeichen, dass du Verantwortung ernst nimmst – und das verdient Respekt.
            </p>
        </div>

        <!-- Honesty Box -->
        <div class="honesty-box" data-emoji="💔">
            <h3 class="editable" data-key="honesty-box-die-harte-wahrheit">Die harte Wahrheit</h3>
            <p style="font-size: 1.2rem; line-height: 1.8;" class="editable" data-key="honesty-box-statistiken">
                In Deutschland sitzen über <strong>300.000 Tiere</strong> in Tierheimen.<br>
                Nur etwa <strong>30%</strong> werden pro Jahr vermittelt.<br>
                Der Rest wartet. Oder stirbt.
            </p>
            <p style="margin-top: 25px; font-size: 1.2rem;" class="editable" data-key="honesty-box-warum">
                <strong>Warum?</strong><br>
                Weil zu viele Menschen Tiere holen, ohne zu verstehen, was das bedeutet.
            </p>
            <p style="margin-top: 25px; font-size: 1.3rem; font-weight: 700;" class="editable" data-key="honesty-box-kernaussage">
                Du liebst Tiere? Dann beweis es – indem du ehrlich bist.
            </p>
            <div style="text-align: center; margin-top: 30px;">
                <a href="<?php echo isset($content['button-honesty-test-url']) ? esc_url($content['button-honesty-test-url']) : home_url('/tierliebe-test'); ?>" class="btn btn-primary" data-editable-url="button-honesty-test-url">
                    <span class="editable" data-key="button-honesty-test">
                        <?php echo isset($content['button-honesty-test']) ? wp_kses_post($content['button-honesty-test']) : 'Zum Test →'; ?>
                    </span>
                </a>
            </div>
        </div>

        <!-- Die Wahrheit über Haustiere - Einleitung -->
        <div style="margin-top: 80px; margin-bottom: 50px;">
            <h2 class="section-title editable" data-key="einleitung-die-wahrheit-uber-haustiere" style="text-align: center; margin-bottom: 30px;">
                Die Wahrheit über Haustiere
            </h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto; font-size: 1.2rem; line-height: 1.7; color: var(--text-medium);" class="editable" data-key="einleitung-wahrheit-text">
                Katzen sind unabhängig? Hunde brauchen nur genügend Auslauf? Meerschweinchen sind perfekt für Kinder? Lass uns diese Mythen gemeinsam auf den Prüfstand stellen.
            </p>
        </div>

        <!-- Quick Links -->
        <div class="quick-links-grid">
            <a href="<?php echo isset($content['quicklink-hunde-url']) ? esc_url($content['quicklink-hunde-url']) : home_url('/tierliebe-hunde'); ?>" class="quick-link-card" data-editable-url="quicklink-hunde-url">
                <span class="quick-link-icon">🐶</span>
                <h4 class="editable" data-key="quicklink-hunde-titel">
                    <?php echo isset($content['quicklink-hunde-titel']) ? wp_kses_post($content['quicklink-hunde-titel']) : 'Hunde'; ?>
                </h4>
                <p class="editable" data-key="quicklink-hunde-text">
                    <?php echo isset($content['quicklink-hunde-text']) ? wp_kses_post($content['quicklink-hunde-text']) : 'Mythen & Wahrheiten'; ?>
                </p>
            </a>
            <a href="<?php echo isset($content['quicklink-katzen-url']) ? esc_url($content['quicklink-katzen-url']) : home_url('/tierliebe-katzen'); ?>" class="quick-link-card" data-editable-url="quicklink-katzen-url">
                <span class="quick-link-icon">🐱</span>
                <h4 class="editable" data-key="quicklink-katzen-titel">
                    <?php echo isset($content['quicklink-katzen-titel']) ? wp_kses_post($content['quicklink-katzen-titel']) : 'Katzen'; ?>
                </h4>
                <p class="editable" data-key="quicklink-katzen-text">
                    <?php echo isset($content['quicklink-katzen-text']) ? wp_kses_post($content['quicklink-katzen-text']) : 'Was du wissen musst'; ?>
                </p>
            </a>
            <a href="<?php echo isset($content['quicklink-kleintiere-url']) ? esc_url($content['quicklink-kleintiere-url']) : home_url('/tierliebe-kleintiere'); ?>" class="quick-link-card" data-editable-url="quicklink-kleintiere-url">
                <span class="quick-link-icon">🐰</span>
                <h4 class="editable" data-key="quicklink-kleintiere-titel">
                    <?php echo isset($content['quicklink-kleintiere-titel']) ? wp_kses_post($content['quicklink-kleintiere-titel']) : 'Kleintiere'; ?>
                </h4>
                <p class="editable" data-key="quicklink-kleintiere-text">
                    <?php echo isset($content['quicklink-kleintiere-text']) ? wp_kses_post($content['quicklink-kleintiere-text']) : 'Kaninchen, Hamster & Co.'; ?>
                </p>
            </a>
            <a href="<?php echo isset($content['quicklink-exoten-url']) ? esc_url($content['quicklink-exoten-url']) : home_url('/tierliebe-exoten'); ?>" class="quick-link-card" data-editable-url="quicklink-exoten-url">
                <span class="quick-link-icon">🦎</span>
                <h4 class="editable" data-key="quicklink-exoten-titel">
                    <?php echo isset($content['quicklink-exoten-titel']) ? wp_kses_post($content['quicklink-exoten-titel']) : 'Vögel & Exoten'; ?>
                </h4>
                <p class="editable" data-key="quicklink-exoten-text">
                    <?php echo isset($content['quicklink-exoten-text']) ? wp_kses_post($content['quicklink-exoten-text']) : 'Besondere Bedürfnisse'; ?>
                </p>
            </a>
            <a href="<?php echo isset($content['quicklink-qualzucht-url']) ? esc_url($content['quicklink-qualzucht-url']) : home_url('/tierliebe-qualzucht'); ?>" class="quick-link-card" data-editable-url="quicklink-qualzucht-url">
                <span class="quick-link-icon">⚠️</span>
                <h4 class="editable" data-key="quicklink-qualzucht-titel">
                    <?php echo isset($content['quicklink-qualzucht-titel']) ? wp_kses_post($content['quicklink-qualzucht-titel']) : 'Qualzucht'; ?>
                </h4>
                <p class="editable" data-key="quicklink-qualzucht-text">
                    <?php echo isset($content['quicklink-qualzucht-text']) ? wp_kses_post($content['quicklink-qualzucht-text']) : 'Leid erkennen'; ?>
                </p>
            </a>
            <a href="<?php echo isset($content['quicklink-adoption-url']) ? esc_url($content['quicklink-adoption-url']) : home_url('/tierliebe-adoption'); ?>" class="quick-link-card" data-editable-url="quicklink-adoption-url">
                <span class="quick-link-icon">❤️</span>
                <h4 class="editable" data-key="quicklink-adoption-titel">
                    <?php echo isset($content['quicklink-adoption-titel']) ? wp_kses_post($content['quicklink-adoption-titel']) : 'Adoption'; ?>
                </h4>
                <p class="editable" data-key="quicklink-adoption-text">
                    <?php echo isset($content['quicklink-adoption-text']) ? wp_kses_post($content['quicklink-adoption-text']) : 'Der richtige Weg'; ?>
                </p>
            </a>
        </div>
    </div>
</section>

<?php
// Add page slug for edit mode
if (current_user_can('edit_posts')) {
    echo '<input type="hidden" id="tierliebe-page-slug" value="home">';
}

get_template_part('tierliebe-parts/footer');
?>
