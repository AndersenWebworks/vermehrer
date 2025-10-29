<?php
/**
 * Template Name: Tierliebe - Start
 * Template Post Type: page
 * Description: Startseite für Tierliebe-Portal
 * Version: 2.2.0
 */

get_template_part('tierliebe-parts/header');
?>

<!-- Primary Hero -->
<section class="primary-hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1 class="hero-title">Du liebst Tiere?</h1>
            <p class="hero-subtitle">Dann lies hier nicht, was du hören willst – sondern was du wissen musst. Ehrlich. Klar. Und im Sinne der Tiere.</p>
            <p class="hero-description">
                Bevor du ein Tier aufnimmst – Hund, Katze, Kaninchen, Welli oder Goldfisch – nimm dir ein paar Minuten für die Wahrheit. Denn: Gute Absichten reichen nicht. Verantwortung schon.
            </p>
            <div class="hero-buttons">
                <a href="<?php echo home_url('/tierliebe-test'); ?>" class="btn btn-primary">
                    ✨ Bin ich bereit? → Zum Test
                </a>
                <a href="<?php echo home_url('/tierliebe-wissen'); ?>" class="btn btn-secondary">
                    📚 Wissen aufbauen
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
        <h2 class="section-title" style="text-align: center; margin-bottom: 30px;">Bin ich bereit für ein Tier?</h2>
        <p style="text-align: center; max-width: 800px; margin: 0 auto 30px; font-size: 1.15rem; color: var(--text-medium);">
            Du denkst darüber nach, ein Tier aufzunehmen? Dann nimm dir bitte kurz Zeit für diese Fragen – ganz ehrlich, nur für dich. Denn ein Tier ist keine Phase. Es ist ein Teil deines Lebens – und komplett abhängig von dir.
        </p>
        <p style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.2rem; color: var(--text-dark); font-weight: 600;">
            Bist du der Typ Tierhalter, den Tiere sich wünschen würden?
        </p>

        <div class="info-box responsibility-box">
            <h3>Ehrlichkeit ist der erste Schritt zu echter Tierliebe</h3>
            <p>
                Wenn du bei einer Frage oder mehreren Fragen zögerst, ist das kein Grund zur Scham. Es ist ein Zeichen, dass du Verantwortung ernst nimmst – und das verdient Respekt.
            </p>
        </div>

        <div class="info-box info" data-emoji="💭">
            <h3>Bevor du ein Tier holst, frag dich ehrlich:</h3>
            <ul style="font-size: 1.1rem; line-height: 1.8;">
                <li>Habe ich <strong>Zeit</strong>? Nicht nur am Wochenende – jeden Tag.</li>
                <li>Habe ich <strong>Geld</strong>? Nicht nur für Futter – auch für Tierarzt, Ausstattung, Notfälle.</li>
                <li>Habe ich <strong>Platz</strong>? Nicht nur einen Käfig – echten Raum zum Leben.</li>
                <li>Bin ich bereit für <strong>10, 15, 20 Jahre</strong> Verantwortung?</li>
                <li>Weiß ich, was das Tier <strong>wirklich</strong> braucht – nicht, was ich mir vorstelle?</li>
            </ul>
        </div>

        <div class="decision-dual-panel">
            <!-- Panel 1: Bin ich bereit -->
            <div class="decision-panel panel-yes">
                <div class="panel-emoji">🧠</div>
                <h3>Bin ich bereit?</h3>
                <p>Ein ehrlicher Test, der dir zeigt, ob du wirklich vorbereitet bist.</p>
                <ul class="decision-list">
                    <li>Realistische Fragen zu Zeit, Geld & Wissen</li>
                    <li>Ehrliche Auswertung ohne Schönfärberei</li>
                    <li>Hilft dir, die richtige Entscheidung zu treffen</li>
                </ul>
                <a href="<?php echo home_url('/tierliebe-test'); ?>" class="btn btn-primary" style="width: 100%; margin-top: 25px;">
                    Zum Test →
                </a>
            </div>

            <!-- Panel 2: Die Wahrheit über Haustiere -->
            <div class="decision-panel panel-no">
                <div class="panel-emoji">📖</div>
                <h3>Die Wahrheit über Haustiere</h3>
                <p>Was Hunde, Katzen, Kaninchen & Co. wirklich brauchen.</p>
                <ul class="decision-list">
                    <li>Mythen vs. Fakten für jede Tierart</li>
                    <li>Was verschwiegen wird</li>
                    <li>Warum "pflegeleicht" eine Lüge ist</li>
                </ul>
                <a href="<?php echo home_url('/tierliebe-hunde'); ?>" class="btn btn-secondary" style="width: 100%; margin-top: 25px;">
                    Zu den Tierarten →
                </a>
            </div>
        </div>

        <!-- Honesty Box -->
        <div class="honesty-box" data-emoji="💔">
            <h3>Die harte Wahrheit</h3>
            <p style="font-size: 1.2rem; line-height: 1.8;">
                In Deutschland sitzen über <strong>300.000 Tiere</strong> in Tierheimen.<br>
                Nur etwa <strong>30%</strong> werden pro Jahr vermittelt.<br>
                Der Rest wartet. Oder stirbt.
            </p>
            <p style="margin-top: 25px; font-size: 1.2rem;">
                <strong>Warum?</strong><br>
                Weil zu viele Menschen Tiere holen, ohne zu verstehen, was das bedeutet.
            </p>
            <p style="margin-top: 25px; font-size: 1.3rem; font-weight: 700;">
                Du liebst Tiere? Dann beweis es – indem du ehrlich bist.
            </p>
        </div>

        <!-- Quick Links -->
        <div class="quick-links-grid" style="margin-top: 80px;">
            <a href="<?php echo home_url('/tierliebe-hunde'); ?>" class="quick-link-card">
                <span class="quick-link-icon">🐶</span>
                <h4>Hunde</h4>
                <p>Mythen & Wahrheiten</p>
            </a>
            <a href="<?php echo home_url('/tierliebe-katzen'); ?>" class="quick-link-card">
                <span class="quick-link-icon">🐱</span>
                <h4>Katzen</h4>
                <p>Was du wissen musst</p>
            </a>
            <a href="<?php echo home_url('/tierliebe-kleintiere'); ?>" class="quick-link-card">
                <span class="quick-link-icon">🐰</span>
                <h4>Kleintiere</h4>
                <p>Kaninchen, Hamster & Co.</p>
            </a>
            <a href="<?php echo home_url('/tierliebe-exoten'); ?>" class="quick-link-card">
                <span class="quick-link-icon">🦎</span>
                <h4>Vögel & Exoten</h4>
                <p>Besondere Bedürfnisse</p>
            </a>
            <a href="<?php echo home_url('/tierliebe-qualzucht'); ?>" class="quick-link-card">
                <span class="quick-link-icon">⚠️</span>
                <h4>Qualzucht</h4>
                <p>Leid erkennen</p>
            </a>
            <a href="<?php echo home_url('/tierliebe-adoption'); ?>" class="quick-link-card">
                <span class="quick-link-icon">❤️</span>
                <h4>Adoption</h4>
                <p>Der richtige Weg</p>
            </a>
        </div>
    </div>
</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
