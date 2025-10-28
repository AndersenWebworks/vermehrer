<?php
/**
 * Template Name: Tierliebe Quiz
 * Template Post Type: page
 * Description: Landing Page - Bin ich bereit für ein Tier?
 * Version: 1.1
 */

// Kein WordPress Header/Footer - komplett eigenständige Seite
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Fredoka:wght@400;500;600&family=Caveat:wght@600;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Floating Decorations -->
<div class="float-decoration" style="font-size: 8rem;">🐾</div>
<div class="float-decoration" style="font-size: 6rem;">❤️</div>
<div class="float-decoration" style="font-size: 7rem;">🐾</div>
<div class="float-decoration" style="font-size: 5rem;">💕</div>

<!-- Header -->
<header class="header">
    <div class="header-content">
        <a href="#start" class="logo">
            <span class="logo-icon">🐾</span> Tierliebe-Check
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="#start">Start</a></li>
                <li><a href="#warum">Warum</a></li>
                <li><a href="#tiere">Tiere</a></li>
                <li><a href="#test">Test</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Hero -->
<section id="start" class="hero">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="hero-content">
        <div class="hero-text">
            <h1>Bin ich bereit für<br>ein <span class="highlight">Tier</span>?</h1>
            <p class="subtitle">Tiere sind wunderbare Lebewesen mit echten Bedürfnissen. Finde ehrlich heraus, ob du wirklich bereit bist! 💕</p>
            <button class="btn btn-primary" onclick="scrollToTest()">✨ Test starten</button>
        </div>
        <div class="hero-visual">
            <div class="hero-main-icon">🐶</div>
            <div class="hero-floating-icons">🐱</div>
            <div class="hero-floating-icons">🐰</div>
            <div class="hero-floating-icons">🐦</div>
        </div>
    </div>
</section>

<!-- Why Section -->
<section id="warum" class="section">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">💭</span> Warum dieser Test?</h2>
        <p class="section-subtitle">Weil jedes Jahr Tausende Tiere leiden, weil Menschen ihre Verantwortung unterschätzt haben.</p>
    </div>

    <div class="cards-grid">
        <div class="card mint">
            <span class="card-icon">⏰</span>
            <h3>Zeit ist Liebe</h3>
            <p>Hunde brauchen täglich 3-5 Stunden Aufmerksamkeit, Training und Gassi. Katzen mindestens 2-3h Spiel und Pflege. Ein Tier ist kein Nebenbei-Projekt!</p>
        </div>

        <div class="card pink">
            <span class="card-icon">💰</span>
            <h3>Geld & Verantwortung</h3>
            <p>1.200-2.500€ pro Jahr für einen Hund. Dazu Notfall-Rücklagen. Tiere kosten Geld - wer das nicht hat, darf kein Tier halten. Punkt.</p>
        </div>

        <div class="card peach">
            <span class="card-icon">🏡</span>
            <h3>Platz zum Wohlfühlen</h3>
            <p>Käfige sind Tierquälerei! Kaninchen brauchen min. 6m² Gehege, Katzen Klettermöglichkeiten, Vögel große Volieren. Kein Platz = kein Tier.</p>
        </div>

        <div class="card lavender">
            <span class="card-icon">❤️</span>
            <h3>Adoption statt Kauf!</h3>
            <p>Kaufe NIEMALS im Zoohandel oder bei Züchtern! Im Tierschutz warten Tausende liebevolle Tiere auf ein Zuhause. Rette Leben statt Ausbeutung zu unterstützen!</p>
        </div>
    </div>
</section>

<!-- Facts Section -->
<section class="section">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">📚</span> Die harten Fakten</h2>
        <p class="section-subtitle">Ehrliche Zahlen, die du kennen musst</p>
    </div>

    <div class="info-box warning" data-emoji="💳">
        <h4>Was kostet ein Tier wirklich?</h4>
        <p><strong>Ein Hund kostet durchschnittlich 1.200–2.500€ pro Jahr!</strong></p>
        <ul>
            <li><strong>Futter:</strong> 300–800€ jährlich (je nach Größe)</li>
            <li><strong>Tierarzt & Vorsorge:</strong> 200–500€ jährlich</li>
            <li><strong>Versicherung:</strong> 200–600€ jährlich</li>
            <li><strong>Notfälle:</strong> bis zu mehreren Tausend Euro (OP, Behandlungen)</li>
            <li><strong>Ausstattung:</strong> 200-500€ einmalig (Körbchen, Spielzeug, Geschirr)</li>
        </ul>
        <div class="highlight-text">
            <strong>💡 Wichtig:</strong> Ohne 2.000€ Notfall-Rücklage bist du nicht bereit! Was, wenn dein Tier eine teure OP braucht? Lässt du es dann leiden?
        </div>
    </div>

    <div class="info-box info" data-emoji="⏱️">
        <h4>Zeitaufwand - Mehr als du denkst!</h4>
        <p><strong>Hunde:</strong> 3-5 Stunden täglich</p>
        <ul>
            <li>Gassi gehen (mind. 3x täglich, min. 1,5h gesamt)</li>
            <li>Training & Erziehung (30-60 Min)</li>
            <li>Spielen & Beschäftigung (1-2h)</li>
            <li>Pflege, Füttern, Aufräumen (30-60 Min)</li>
        </ul>
        <p><strong>Katzen:</strong> 2-3 Stunden täglich (mindestens 2 Katzen!)</p>
        <ul>
            <li>Spielen & Beschäftigung (1-1,5h)</li>
            <li>Pflege & Reinigung (30-60 Min)</li>
            <li>Streicheln & Kuscheln (wichtig!)</li>
        </ul>
        <p><strong>Kleintiere (Kaninchen, Meerschweinchen):</strong> 1-2 Stunden täglich</p>
        <ul>
            <li>Freilauf beaufsichtigen (min. 4h täglich!)</li>
            <li>Gehege reinigen & frisches Futter (täglich)</li>
            <li>Beschäftigung & Beobachtung</li>
        </ul>
        <div class="highlight-text">
            <strong>🚫 Niemals:</strong> Hunde über 4h allein lassen! Katzen brauchen IMMER einen Artgenossen. Einzelhaltung = Tierquälerei!
        </div>
    </div>

    <div class="info-box love" data-emoji="❤️">
        <h4>Langfristige Verpflichtung</h4>
        <p>Ein Tier zu adoptieren bedeutet eine Verpflichtung für dessen GANZES Leben:</p>
        <ul>
            <li><strong>Hunde:</strong> 10–15 Jahre (große Rassen kürzer, kleine länger)</li>
            <li><strong>Katzen:</strong> 15–20 Jahre (Wohnungskatzen sogar bis 25 Jahre!)</li>
            <li><strong>Kaninchen:</strong> 8–12 Jahre</li>
            <li><strong>Meerschweinchen:</strong> 6–8 Jahre</li>
            <li><strong>Vögel (Papageien):</strong> 20–80 Jahre!</li>
        </ul>
        <div class="highlight-text">
            <strong>💕 Die ehrlichste Tierliebe:</strong> Manchmal bedeutet Tiere lieben auch, NEIN zu sagen. Wenn die Bedingungen nicht stimmen, warte lieber oder unterstütze Tiere anders (Patenschaften, Ehrenamt).
        </div>
    </div>
</section>

<!-- Stats -->
<section class="section" style="background: var(--pastel-cream); border-radius: 50px; padding: 80px 30px;">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">📊</span> Zahlen, die nachdenklich machen</h2>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">😢</div>
            <div class="stat-number">300.000+</div>
            <div class="stat-label">Tiere landen jedes Jahr in deutschen Tierheimen</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">💔</div>
            <div class="stat-number">~30%</div>
            <div class="stat-label">der abgegebenen Tiere werden wieder vermittelt. Der Rest bleibt jahrelang im Heim.</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">⚠️</div>
            <div class="stat-number">#1</div>
            <div class="stat-label">Hauptgrund für Abgabe: Unterschätzter Zeitaufwand & Kosten</div>
        </div>
    </div>

    <div class="info-box warning" data-emoji="💭" style="margin-top: 60px;">
        <h4>Hinter jeder Zahl steht ein fühlendes Wesen</h4>
        <p style="text-align: center; font-size: 1.2rem; line-height: 1.8;">
            Jedes dieser Tiere wurde einmal geliebt, dann abgegeben. Viele verstehen nicht, was sie falsch gemacht haben.
            Manche werden nie wieder ein Zuhause finden. <strong>Sei nicht Teil dieser Statistik.</strong>
        </p>
    </div>
</section>

<!-- Animals Section -->
<section id="tiere" class="section">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">🐕</span> Welches Tier passt wirklich?</h2>
        <p class="section-subtitle">Ehrliche Infos ohne Beschönigung</p>
    </div>

    <div class="animal-grid">
        <!-- Dog -->
        <div class="animal-card">
            <div class="animal-header" style="background: var(--pastel-mint);">
                <span class="animal-icon">🐕</span>
                <h3>Hunde</h3>
                <span class="animal-badge">Zeitaufwand: SEHR HOCH</span>
            </div>
            <div class="animal-body">
                <h4>✅ Passt zu dir, wenn:</h4>
                <ul>
                    <li>Du täglich 3-5h Zeit hast</li>
                    <li>Du körperlich aktiv bist (Gassi bei jedem Wetter!)</li>
                    <li>Du bereit bist, in Hundeschule zu gehen</li>
                    <li>Du min. 150€/Monat + 2.000€ Notfall-Budget hast</li>
                    <li>Du max. 4h außer Haus bist ODER Betreuung hast</li>
                </ul>

                <h4>❌ NICHT für dich, wenn:</h4>
                <ul>
                    <li>Du Vollzeit arbeitest ohne Betreuung</li>
                    <li>Du oft verreist</li>
                    <li>Du wenig Geduld hast</li>
                    <li>Du knapp bei Kasse bist</li>
                </ul>

                <div class="warning-badge">⚠️ Hunde sind RUDELTIERE - Einsamkeit macht sie krank!</div>
            </div>
        </div>

        <!-- Cats -->
        <div class="animal-card">
            <div class="animal-header" style="background: var(--pastel-pink);">
                <span class="animal-icon">🐱</span>
                <h3>Katzen</h3>
                <span class="animal-badge">MINDESTENS 2 Katzen!</span>
            </div>
            <div class="animal-body">
                <h4>✅ Passt zu dir, wenn:</h4>
                <ul>
                    <li>Du MINDESTENS 2 Katzen adoptierst (Einzelhaltung = Qual!)</li>
                    <li>Du täglich 2-3h Zeit für Spiel & Pflege hast</li>
                    <li>Du eine große Wohnung oder Freigang bietest</li>
                    <li>Du 100-150€/Monat pro Katze einplanen kannst</li>
                    <li>Du Kratzspuren an Möbeln akzeptierst</li>
                </ul>

                <h4>❌ MYTHOS: "Katzen sind Einzelgänger"</h4>
                <p style="background: var(--pastel-coral); padding: 15px; border-radius: 15px; margin: 15px 0;">
                    <strong>FALSCH!</strong> Katzen sind soziale Tiere und brauchen Artgenossen. Einzelhaltung führt zu Depression, Aggression und Verhaltensstörungen.
                </p>

                <div class="warning-badge">⚠️ 2 Katzen = Pflicht, nicht Kür!</div>
            </div>
        </div>

        <!-- Small Animals -->
        <div class="animal-card">
            <div class="animal-header" style="background: var(--pastel-peach);">
                <span class="animal-icon">🐰</span>
                <h3>Kaninchen & Meerschweinchen</h3>
                <span class="animal-badge">KEIN Anfängertier!</span>
            </div>
            <div class="animal-body">
                <h4>✅ Passt zu dir, wenn:</h4>
                <ul>
                    <li>Du MINDESTENS 2 Tiere hältst</li>
                    <li>Du ein Gehege von mind. 6m² bietest (KEIN Käfig!)</li>
                    <li>Du täglich 4h+ Freilauf ermöglichst</li>
                    <li>Du täglich Gehege reinigst & frisches Futter gibst</li>
                    <li>Du einen kaninchenerfahrenen Tierarzt hast</li>
                </ul>

                <h4>❌ MYTHOS: "Kindertiere" im Käfig</h4>
                <p style="background: var(--pastel-coral); padding: 15px; border-radius: 15px; margin: 15px 0;">
                    <strong>FALSCH!</strong> Kaninchen sind KEIN Spielzeug für Kinder! Sie sind sehr anspruchsvoll, zerbrechlich und brauchen viel Platz. Käfighaltung ist Tierquälerei!
                </p>

                <div class="warning-badge">⚠️ Mehr Arbeit als du denkst!</div>
            </div>
        </div>

        <!-- Birds -->
        <div class="animal-card">
            <div class="animal-header" style="background: var(--pastel-lavender);">
                <span class="animal-icon">🦜</span>
                <h3>Vögel (Papageien, Sittiche)</h3>
                <span class="animal-badge">Für 99% UNGEEIGNET!</span>
            </div>
            <div class="animal-body">
                <h4>❌ NICHT für Privathand:</h4>
                <ul>
                    <li><strong>Lebensdauer:</strong> 30-80 Jahre! (Lebenslanges Commitment)</li>
                    <li><strong>Lautstärke:</strong> Extrem laut (Nachbarschaftsprobleme garantiert)</li>
                    <li><strong>Platz:</strong> Riesige Volieren + täglicher Freiflug nötig</li>
                    <li><strong>Sozial:</strong> Brauchen Partnertiere</li>
                    <li><strong>Intelligenz:</strong> Hochintelligent - Langeweile führt zu Selbstverstümmelung</li>
                </ul>

                <div class="warning-badge">🚫 Finger weg! Diese Tiere gehören nicht in Wohnungen!</div>
            </div>
        </div>

        <!-- Exotic Warning -->
        <div class="animal-card">
            <div class="animal-header" style="background: var(--cute-coral); color: white;">
                <span class="animal-icon">🦎</span>
                <h3>Exoten (Reptilien, Schildkröten)</h3>
                <span class="animal-badge" style="background: white; color: var(--cute-coral);">KEINE Haustiere!</span>
            </div>
            <div class="animal-body">
                <h4>🚫 Warum NICHT?</h4>
                <ul>
                    <li><strong>Wildtiere:</strong> Keine Kuscheltiere, oft gestresst in Haltung</li>
                    <li><strong>Spezialbedarf:</strong> Teure Terrarien, exakte Temperatur/Feuchtigkeit</li>
                    <li><strong>Futter:</strong> Lebende/tote Wirbeltiere (ethisch fragwürdig)</li>
                    <li><strong>Lebensdauer:</strong> Schildkröten 50-100 Jahre!</li>
                    <li><strong>Illegaler Handel:</strong> Viele Arten aus Wilderei</li>
                </ul>

                <p style="background: var(--pastel-coral); padding: 20px; border-radius: 15px; margin: 20px 0; font-weight: 600; text-align: center;">
                    🌍 Grundregel: Wenn ein Tier aus einem anderen Kontinent kommt, gehört es NICHT in dein Wohnzimmer!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Quiz Section -->
<section id="test" class="section">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">✨</span> Mach den Bereitschafts-Test</h2>
        <p class="section-subtitle">Sei ehrlich zu dir - es geht um ein Lebewesen!</p>
    </div>

    <?php echo do_shortcode('[tierliebe_quiz]'); ?>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <h3>🌍 Denk an die Tiere, Wälder & das Klima</h3>
        <p>Jeder unnötige Ausdruck dieser Seite kostet Ressourcen, zerstört Lebensräume und belastet das Klima.</p>
        <p style="margin-top: 30px; padding-top: 30px; border-top: 3px solid var(--cute-mint);">
            &copy; <?php echo date('Y'); ?> Annemarie Andersen | <a href="https://www.annemarie-andersen.de">annemarie-andersen.de</a>
        </p>
        <p style="margin-top: 15px; font-size: 0.95rem; opacity: 0.8;">
            Mit 💕 für alle Tiere gemacht
        </p>
    </div>
</footer>

<!-- Scroll to Top -->
<button class="scroll-top" id="scrollTop" onclick="scrollToTop()">
    <span>↑</span>
</button>

<script>
function scrollToTest() {
    document.getElementById('test').scrollIntoView({ behavior: 'smooth' });
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Scroll to Top Button Visibility
window.addEventListener('scroll', function() {
    const scrollTop = document.getElementById('scrollTop');
    if (window.pageYOffset > 400) {
        scrollTop.classList.add('visible');
    } else {
        scrollTop.classList.remove('visible');
    }
});
</script>

<?php wp_footer(); ?>
</body>
</html>
