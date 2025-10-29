<?php
/**
 * Template Name: Tierliebe - Über & Kontakt
 * Template Post Type: page
 * Description: Persönliche Motivation, Autor-Hintergrund, Hilfe-Angebote, Kontaktformular
 * Version: 1.1.0
 */

get_template_part('tierliebe-parts/header');
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title">📧 Über & Kontakt</h2>
        <p class="section-subtitle">Wer steckt dahinter?</p>
    </div>

    <!-- Persönliche Motivation -->
    <div class="info-box love" data-emoji="❤️">
        <h3 style="font-size: 1.8rem; margin-bottom: 25px;">Warum ich all das mache</h3>
        <p style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 20px;">
            Ich bin <strong>keine Tierärztin</strong>, keine Organisation, kein Profi mit Spendensiegel.
        </p>
        <p style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 20px;">
            Ich bin einfach ein Mensch mit Herz für Tiere – und mit dem Wunsch, dass wir besser mit ihnen umgehen.
        </p>
    </div>

    <!-- Persönliche Erfahrung -->
    <div class="info-box" style="background: var(--pastel-mint); margin-top: 40px;">
        <h3 style="margin-bottom: 20px;">💭 Meine Erfahrung</h3>
        <p style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 20px;">
            <strong>Ich habe selbst erlebt, wie schwer es ist, gute Informationen zu finden.</strong>
        </p>
        <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
            Wie schnell man Fehler macht, obwohl man es gut meint. Und wie wenig es manchmal braucht, um Leid zu verhindern – durch <strong>Wissen, Mitgefühl, Verantwortung.</strong>
        </p>
    </div>

    <!-- Ziel der Website -->
    <div class="info-box" style="background: var(--pastel-lavender); margin-top: 40px;">
        <h3 style="margin-bottom: 20px;">🎯 Das Ziel dieser Seite</h3>
        <p style="font-size: 1.2rem; line-height: 1.8; margin-bottom: 25px;">
            <strong>"Wenn diese Seite nur einen Menschen zum Umdenken bringt, nur ein Tier davor bewahrt, falsch gehalten oder abgeschoben zu werden, dann hat sie ihren Zweck erfüllt."</strong>
        </p>
    </div>

    <!-- Abschlussbotschaft -->
    <div class="info-box love" data-emoji="🐾" style="margin-top: 40px;">
        <h3 style="text-align: center; font-size: 1.8rem; margin-bottom: 25px;">Tierliebe beginnt nicht mit einem Kauf.</h3>
        <p style="text-align: center; font-size: 1.3rem; line-height: 1.8;">
            <strong>Sie beginnt mit Wissen, Ehrlichkeit und Verantwortung.</strong>
        </p>
    </div>

    <!-- Du brauchst Hilfe -->
    <div style="margin-top: 80px;">
        <h2 class="section-title" style="text-align: center; margin-bottom: 30px;">Du brauchst Hilfe?</h2>
        <p style="text-align: center; max-width: 700px; margin: 0 auto 50px; font-size: 1.15rem; color: var(--text-medium);">
            Ich bin kein Verein, keine Organisation – aber manchmal braucht es einfach jemanden, der zuhört.
        </p>

        <div class="cards-grid" style="margin-top: 50px;">
            <div class="card mint">
                <span class="card-icon">🏡</span>
                <h3>Aufnahme & Urlaubsbetreuung</h3>
                <p>Wellensittiche und Kleintiere (Kaninchen, Meerschweinchen, Schildkröten – sofern Platz)</p>
            </div>
            <div class="card peach">
                <span class="card-icon">💬</span>
                <h3>Beratung bei Haltungsfragen</h3>
                <p>Hilfe bei Entscheidung für/gegen Tier, ehrliches Gespräch ohne Vorurteile</p>
            </div>
            <div class="card lavender">
                <span class="card-icon">🤝</span>
                <h3>Persönliche Ansprache</h3>
                <p>Jemand, der zuhört – ohne zu verurteilen</p>
            </div>
        </div>

        <div class="info-box" style="margin-top: 50px; background: var(--pastel-peach); text-align: center;">
            <p style="font-size: 1.2rem; line-height: 1.8;">
                <strong>"Du musst nichts perfekt machen. Aber du kannst den Unterschied machen – für ein Lebewesen, das dich braucht."</strong>
            </p>
        </div>
    </div>

    <div class="info-box info" data-emoji="📧" style="margin-top: 50px;">
        <h4>Kontakt</h4>
        <p style="text-align: center; font-size: 1.2rem;">
            Bei Fragen, Anregungen oder Unterstützungsbedarf kannst du dich gerne melden über die Website <a href="https://www.annemarie-andersen.de" style="color: var(--cute-coral); font-weight: 600;">annemarie-andersen.de</a>
        </p>
    </div>

</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
