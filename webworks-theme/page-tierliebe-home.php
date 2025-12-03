<?php
/**
 * Template Name: Tierliebe - Start
 * Template Post Type: page
 * Description: Startseite für Tierliebe-Portal (Dynamic Content)
 * Version: 3.1.0 - Dynamic Rendering Support
 */

get_template_part('tierliebe-parts/header');

// Load content from database
$content = get_tierliebe_text('home');
?>

<!-- Hidden Page Slug for Editor -->
<input type="hidden" id="tierliebe-page-slug" value="tierliebe-home">

<!-- Primary Hero -->
<section class="primary-hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1 class="hero-title editable" data-key="header-titel">
                <?php echo esc_html(strip_tags($content['header-titel'] ?? '')); ?>
            </h1>
            <div class="hero-subtitle editable" data-key="untertitel">
                <?php echo isset($content['untertitel']) ? wp_kses_post(trim($content['untertitel'], '"')) : 'Dann lies hier nicht, was du hören willst – sondern was du wissen musst. Ehrlich. Klar. Und im Sinne der Tiere.'; ?>
            </div>
            <div class="hero-description editable" data-key="einleitungstext">
                <?php echo isset($content['einleitungstext']) ? wp_kses_post(trim($content['einleitungstext'], '"')) : 'Bevor du ein Tier aufnimmst – Hund, Katze, Kaninchen, Welli oder Goldfisch – nimm dir ein paar Minuten für die Wahrheit. Denn: Gute Absichten reichen nicht. Verantwortung schon.'; ?>
            </div>
            <div class="hero-buttons">
                <a href="<?php echo isset($content['button-test-url']) ? esc_url($content['button-test-url']) : home_url('/tierliebe-test'); ?>" class="btn btn-primary" data-editable-url="button-test-url">
                    <span class="editable" data-key="button-test">
                        <?php echo wp_kses_post($content['button-test'] ?? ''); ?>
                    </span>
                </a>
                <a href="<?php echo isset($content['button-wissen-url']) ? esc_url($content['button-wissen-url']) : home_url('/tierliebe-wissen'); ?>" class="btn btn-secondary" data-editable-url="button-wissen-url">
                    <span class="editable" data-key="button-wissen">
                        <?php echo wp_kses_post($content['button-wissen'] ?? ''); ?>
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
        <h2 class="section-title editable" data-key="sektion-bin-ich-bereit-titel" style="text-align: center; margin-bottom: 30px;">
            <?php echo wp_kses_post($content['sektion-bin-ich-bereit-titel'] ?? 'Bin ich bereit für ein Tier?'); ?>
        </h2>
        <div class="editable" data-key="sektion-bin-ich-bereit-text" style="text-align: center; max-width: 800px; margin: 0 auto 30px; font-size: 1.15rem; color: var(--text-medium);">
            <?php echo isset($content['sektion-bin-ich-bereit-text']) ? wp_kses_post($content['sektion-bin-ich-bereit-text']) : 'Du denkst darüber nach, ein Tier aufzunehmen? Dann nimm dir bitte kurz Zeit für diese Fragen – ganz ehrlich, nur für dich. Denn ein Tier ist keine Phase. Es ist ein Teil deines Lebens – und komplett abhängig von dir.'; ?>
        </div>
        <div class="editable" data-key="zentrale-frage" style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.2rem; color: var(--text-dark); font-weight: 600;">
            <?php echo wp_kses_post($content['zentrale-frage'] ?? 'Bist du der Typ Tierhalter, den Tiere sich wünschen würden?'); ?>
        </div>

        <div class="info-box info" data-emoji="💭">
            <h3 class="editable" data-key="info-box-bevor-du-ein-tier-holst-frag-dich-ehrlich">
                <?php echo wp_kses_post($content['info-box-bevor-du-ein-tier-holst-frag-dich-ehrlich'] ?? 'Bevor du ein Tier holst, frag dich ehrlich:'); ?>
            </h3>
            <ul style="font-size: 1.1rem; line-height: 1.8;" class="editable" data-key="info-box-checkliste">
            <?php echo wp_kses_post($content['info-box-checkliste'] ?? ''); ?>
        </ul>
        </div>

        <div class="info-box responsibility-box">
            <h3 class="editable" data-key="info-box-ehrlichkeit-ist-der-erste-schritt">
                <?php echo wp_kses_post($content['info-box-ehrlichkeit-ist-der-erste-schritt'] ?? 'Ehrlichkeit ist der erste Schritt zu echter Tierliebe'); ?>
            </h3>
            <div class="editable" data-key="info-box-ehrlichkeit-text">
                <?php echo wp_kses_post($content['info-box-ehrlichkeit-text'] ?? 'Wenn du bei einer Frage oder mehreren Fragen zögerst, ist das kein Grund zur Scham. Es ist ein Zeichen, dass du Verantwortung ernst nimmst – und das verdient Respekt.'); ?>
            </div>
        </div>

        <!-- Honesty Box -->
        <div class="honesty-box" data-emoji="💔">
            <h3 class="editable" data-key="honesty-box-die-harte-wahrheit">
                <?php echo wp_kses_post($content['honesty-box-die-harte-wahrheit'] ?? 'Die harte Wahrheit'); ?>
            </h3>
            <div style="font-size: 1.2rem; line-height: 1.8;" class="editable" data-key="honesty-box-statistiken">
                <?php echo wp_kses_post($content['honesty-box-statistiken'] ?? 'In Deutschland sitzen über <strong>300.000 Tiere</strong> in Tierheimen.<br>Nur etwa <strong>30%</strong> werden pro Jahr vermittelt.<br>Der Rest wartet. Oder stirbt.'); ?>
            </div>
            <div style="margin-top: 25px; font-size: 1.2rem;" class="editable" data-key="honesty-box-warum">
                <?php echo wp_kses_post($content['honesty-box-warum'] ?? '<strong>Warum?</strong><br>Weil zu viele Menschen Tiere holen, ohne zu verstehen, was das bedeutet.'); ?>
            </div>
            <div style="margin-top: 25px; font-size: 1.3rem; font-weight: 700;" class="editable" data-key="honesty-box-kernaussage">
                <?php echo wp_kses_post($content['honesty-box-kernaussage'] ?? 'Du liebst Tiere? Dann beweis es – indem du ehrlich bist.'); ?>
            </div>
            <div style="text-align: center; margin-top: 30px;">
                <a href="<?php echo isset($content['button-honesty-test-url']) ? esc_url($content['button-honesty-test-url']) : home_url('/tierliebe-test'); ?>" class="btn btn-primary" data-editable-url="button-honesty-test-url">
                    <span class="editable" data-key="button-honesty-test">
                        <?php echo wp_kses_post($content['button-honesty-test'] ?? ''); ?>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Die Wahrheit über Haustiere Section -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <!-- Die Wahrheit über Haustiere - Einleitung -->
        <div style="margin-bottom: 50px;">
            <h2 class="section-title editable" data-key="einleitung-die-wahrheit-uber-haustiere" style="text-align: center; margin-bottom: 30px;">
                <?php echo wp_kses_post($content['einleitung-die-wahrheit-uber-haustiere'] ?? 'Die Wahrheit über Haustiere'); ?>
            </h2>
            <div style="text-align: center; max-width: 800px; margin: 0 auto; font-size: 1.2rem; line-height: 1.7; color: var(--text-medium);" class="editable" data-key="einleitung-wahrheit-text">
                <?php echo wp_kses_post($content['einleitung-wahrheit-text'] ?? 'Katzen sind unabhängig? Hunde brauchen nur genügend Auslauf? Meerschweinchen sind perfekt für Kinder? Lass uns diese Mythen gemeinsam auf den Prüfstand stellen.'); ?>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="quick-links-grid">
            <a href="<?php echo isset($content['quicklink-hunde-url']) ? esc_url($content['quicklink-hunde-url']) : home_url('/tierliebe-hunde'); ?>" class="quick-link-card" data-editable-url="quicklink-hunde-url">
                <span class="quick-link-icon">🐶</span>
                <h4 class="editable" data-key="quicklink-hunde-titel">
                    <?php echo wp_kses_post($content['quicklink-hunde-titel'] ?? ''); ?>
                </h4>
                <div class="editable" data-key="quicklink-hunde-text">
                    <?php echo wp_kses_post($content['quicklink-hunde-text'] ?? ''); ?>
                </div>
            </a>
            <a href="<?php echo isset($content['quicklink-katzen-url']) ? esc_url($content['quicklink-katzen-url']) : home_url('/tierliebe-katzen'); ?>" class="quick-link-card" data-editable-url="quicklink-katzen-url">
                <span class="quick-link-icon">🐱</span>
                <h4 class="editable" data-key="quicklink-katzen-titel">
                    <?php echo wp_kses_post($content['quicklink-katzen-titel'] ?? ''); ?>
                </h4>
                <div class="editable" data-key="quicklink-katzen-text">
                    <?php echo wp_kses_post($content['quicklink-katzen-text'] ?? ''); ?>
                </div>
            </a>
            <a href="<?php echo isset($content['quicklink-kleintiere-url']) ? esc_url($content['quicklink-kleintiere-url']) : home_url('/tierliebe-kleintiere'); ?>" class="quick-link-card" data-editable-url="quicklink-kleintiere-url">
                <span class="quick-link-icon">🐰</span>
                <h4 class="editable" data-key="quicklink-kleintiere-titel">
                    <?php echo wp_kses_post($content['quicklink-kleintiere-titel'] ?? ''); ?>
                </h4>
                <div class="editable" data-key="quicklink-kleintiere-text">
                    <?php echo wp_kses_post($content['quicklink-kleintiere-text'] ?? ''); ?>
                </div>
            </a>
            <a href="<?php echo isset($content['quicklink-exoten-url']) ? esc_url($content['quicklink-exoten-url']) : home_url('/tierliebe-exoten'); ?>" class="quick-link-card" data-editable-url="quicklink-exoten-url">
                <span class="quick-link-icon">🦎</span>
                <h4 class="editable" data-key="quicklink-exoten-titel">
                    <?php echo wp_kses_post($content['quicklink-exoten-titel'] ?? ''); ?>
                </h4>
                <div class="editable" data-key="quicklink-exoten-text">
                    <?php echo wp_kses_post($content['quicklink-exoten-text'] ?? ''); ?>
                </div>
            </a>
            <a href="<?php echo isset($content['quicklink-qualzucht-url']) ? esc_url($content['quicklink-qualzucht-url']) : home_url('/tierliebe-qualzucht'); ?>" class="quick-link-card" data-editable-url="quicklink-qualzucht-url">
                <span class="quick-link-icon">⚠️</span>
                <h4 class="editable" data-key="quicklink-qualzucht-titel">
                    <?php echo wp_kses_post($content['quicklink-qualzucht-titel'] ?? ''); ?>
                </h4>
                <div class="editable" data-key="quicklink-qualzucht-text">
                    <?php echo wp_kses_post($content['quicklink-qualzucht-text'] ?? ''); ?>
                </div>
            </a>
            <a href="<?php echo isset($content['quicklink-adoption-url']) ? esc_url($content['quicklink-adoption-url']) : home_url('/tierliebe-adoption'); ?>" class="quick-link-card" data-editable-url="quicklink-adoption-url">
                <span class="quick-link-icon">❤️</span>
                <h4 class="editable" data-key="quicklink-adoption-titel">
                    <?php echo wp_kses_post($content['quicklink-adoption-titel'] ?? ''); ?>
                </h4>
                <div class="editable" data-key="quicklink-adoption-text">
                    <?php echo wp_kses_post($content['quicklink-adoption-text'] ?? ''); ?>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Tieren helfen ohne eigenes Tier Section -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <h2 class="section-title editable" data-key="helfen-ohne-tier-titel" style="text-align: center; margin-bottom: 30px;">
            <?php echo wp_kses_post($content['helfen-ohne-tier-titel'] ?? 'Du willst Tieren helfen, aber (noch) kein eigenes Tier?'); ?>
        </h2>

        <div style="max-width: 800px; margin: 0 auto; font-size: 1.15rem; line-height: 1.8; color: var(--text-medium);">
            <div class="editable" data-key="helfen-ohne-tier-intro" style="margin-bottom: 20px;">
                <?php echo wp_kses_post($content['helfen-ohne-tier-intro'] ?? 'Vielleicht merkst du beim Lesen, dass gerade kein eigenes Tier in dein Leben passt. Oder du hast schon Tiere und möchtest trotzdem noch mehr tun.'); ?>
            </div>

            <div class="editable" data-key="helfen-ohne-tier-alternativen" style="margin-bottom: 20px;">
                <?php echo wp_kses_post($content['helfen-ohne-tier-alternativen'] ?? 'Dann kannst du Tieren auch helfen, ohne selbst ein weiteres aufzunehmen. Zum Beispiel, indem du einen Tierschutzverein unterstützt, der sich um Straßenkatzen, Fundtiere und Notfälle kümmert.'); ?>
            </div>

            <div class="editable" data-key="helfen-ohne-tier-beispiel" style="margin-bottom: 35px;">
                <?php echo wp_kses_post($content['helfen-ohne-tier-beispiel'] ?? 'Ein Beispiel dafür ist die Streunerhilfe Plau e. V. in Plau am See. Dort werden Straßenkatzen eingefangen, kastriert, medizinisch versorgt und in passende Zuhause vermittelt – finanziert über Spenden.'); ?>
            </div>

            <div class="hero-buttons" style="justify-content: center; margin-top: 35px;">
                <a href="<?php echo isset($content['button-streunerhilfe-url']) ? esc_url($content['button-streunerhilfe-url']) : 'https://streunerhilfe-plau.de/'; ?>" class="btn btn-primary" target="_blank" rel="noopener noreferrer" data-editable-url="button-streunerhilfe-url">
                    <span class="editable" data-key="button-streunerhilfe">
                        <?php echo wp_kses_post($content['button-streunerhilfe'] ?? 'Streunerhilfe Plau e. V. kennenlernen'); ?>
                    </span>
                </a>
                <a href="<?php echo isset($content['button-spenden-url']) ? esc_url($content['button-spenden-url']) : 'https://www.paypal.com/paypalme/streunerhilfeplau?country.x=DE&locale.x=de_DE'; ?>" class="btn btn-secondary" target="_blank" rel="noopener noreferrer" data-editable-url="button-spenden-url">
                    <span class="editable" data-key="button-spenden">
                        <?php echo wp_kses_post($content['button-spenden'] ?? 'Jetzt für Straßenkatzen spenden'); ?>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
// Add page slug for edit mode
if (current_user_can('edit_posts')) {
    echo '';
}

get_template_part('tierliebe-parts/footer');
?>
