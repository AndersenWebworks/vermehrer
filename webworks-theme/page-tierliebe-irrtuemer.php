<?php
/**
 * Template Name: Tierliebe - Mythen & Irrtümer
 * Template Post Type: page
 * Description: 12 häufige Irrtümer über Tierhaltung
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');
?>

<!-- Hero Section -->
<section class="primary-hero" style="min-height: 50vh;">
    <div class="hero-content">
        <h1 class="hero-title">💭 Die größten Irrtümer über Haustiere</h1>
        <p class="hero-subtitle">Viele Irrtümer halten sich hartnäckig – und kosten Tiere am Ende ihr Glück oder sogar ihr Leben. Hier findest du die häufigsten Missverständnisse – und wie es wirklich ist.</p>
    </div>
</section>

<!-- Filter Section -->
<section class="section">
    <div class="container">
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all">Alle</button>
            <button class="filter-btn" data-filter="hunde">🐶 Hunde</button>
            <button class="filter-btn" data-filter="katzen">🐱 Katzen</button>
            <button class="filter-btn" data-filter="kleintiere">🐰 Kleintiere</button>
            <button class="filter-btn" data-filter="voegel">🦜 Vögel</button>
            <button class="filter-btn" data-filter="exoten">🦎 Exoten</button>
        </div>

        <!-- Mythen Grid -->
        <div class="mythen-grid">

            <!-- Irrtum 1 -->
            <div class="mythos-card" data-category="kleintiere">
                <div class="mythos-header">
                    <span class="mythos-icon">🛒</span>
                    <h3 class="mythos-irrtum">Ein Tier aus dem Laden ist gesünder</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Viele Tiere aus Zoohandlungen stammen aus Massenzuchten, sind überzüchtet, krank oder zu jung – sie sehen nur gesund aus.</p>
                </div>
            </div>

            <!-- Irrtum 2 -->
            <div class="mythos-card" data-category="all">
                <div class="mythos-header">
                    <span class="mythos-icon">🏠</span>
                    <h3 class="mythos-irrtum">Ein Tier aus dem Tierschutz hat Macken</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Viele Tiere aus dem Tierschutz sind geimpft, kastriert, sozialisiert und kennen bereits den Alltag – und bringen viel Dankbarkeit mit.</p>
                </div>
            </div>

            <!-- Irrtum 3 -->
            <div class="mythos-card" data-category="voegel">
                <div class="mythos-header">
                    <span class="mythos-icon">🦜</span>
                    <h3 class="mythos-irrtum">Ein Wellensittich allein wird zahmer</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Ein einsamer Wellensittich leidet – Spiegel und Mensch sind kein Ersatz für echte soziale Bindung.</p>
                </div>
            </div>

            <!-- Irrtum 4 -->
            <div class="mythos-card" data-category="kleintiere">
                <div class="mythos-header">
                    <span class="mythos-icon">🐹</span>
                    <h3 class="mythos-irrtum">Hamster sind Kinderhaustiere</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Hamster sind nachtaktiv, mögen keinen Lärm, brauchen Ruhe, Platz und viel Einstreu. Kinder sehen sie kaum und stressen sie unbewusst.</p>
                </div>
            </div>

            <!-- Irrtum 5 -->
            <div class="mythos-card" data-category="kleintiere">
                <div class="mythos-header">
                    <span class="mythos-icon">🐰</span>
                    <h3 class="mythos-irrtum">Kaninchen und Meerschweinchen verstehen sich</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Sie sprechen nicht dieselbe Sprache. Das Meerschweinchen lebt oft in Angst und versteht das Kaninchen nicht.</p>
                </div>
            </div>

            <!-- Irrtum 6 -->
            <div class="mythos-card" data-category="all">
                <div class="mythos-header">
                    <span class="mythos-icon">🚪</span>
                    <h3 class="mythos-irrtum">Ein Käfig im Kinderzimmer reicht</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Kinderzimmer sind zu laut, unruhig, heiß oder kalt – keine artgerechte Umgebung für Tiere.</p>
                </div>
            </div>

            <!-- Irrtum 7 -->
            <div class="mythos-card" data-category="kleintiere">
                <div class="mythos-header">
                    <span class="mythos-icon">🐀</span>
                    <h3 class="mythos-irrtum">Ratten sind dreckig</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Ratten sind extrem reinlich, klug und sozial – sie lieben Struktur, Sauberkeit und Rituale.</p>
                </div>
            </div>

            <!-- Irrtum 8 -->
            <div class="mythos-card" data-category="exoten">
                <div class="mythos-header">
                    <span class="mythos-icon">🦎</span>
                    <h3 class="mythos-irrtum">Reptilien sind anspruchslos</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Reptilien brauchen UV, Temperaturzonen, Feuchte – Haltung ohne Wissen ist lebensgefährlich für sie.</p>
                </div>
            </div>

            <!-- Irrtum 9 -->
            <div class="mythos-card" data-category="exoten">
                <div class="mythos-header">
                    <span class="mythos-icon">🐢</span>
                    <h3 class="mythos-irrtum">Schildkröten brauchen keinen Winterschlaf</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Ohne Winterschlaf leidet der Stoffwechsel. Viele sterben früh an Leber- oder Organschäden.</p>
                </div>
            </div>

            <!-- Irrtum 10 -->
            <div class="mythos-card" data-category="exoten">
                <div class="mythos-header">
                    <span class="mythos-icon">🐠</span>
                    <h3 class="mythos-irrtum">Goldfische passen in ein kleines Glas</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Goldfische brauchen 100 Liter pro Tier, Filter, Sauerstoff und Pflege. Alles andere ist Tierquälerei.</p>
                </div>
            </div>

            <!-- Irrtum 11 -->
            <div class="mythos-card" data-category="hunde">
                <div class="mythos-header">
                    <span class="mythos-icon">🐕</span>
                    <h3 class="mythos-irrtum">Ein zweiter Hund ist Luxus</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Für manche Hunde ist ein Artgenosse die einzige Entlastung – besonders bei längerer Abwesenheit.</p>
                </div>
            </div>

            <!-- Irrtum 12 -->
            <div class="mythos-card" data-category="katzen">
                <div class="mythos-header">
                    <span class="mythos-icon">🐱</span>
                    <h3 class="mythos-irrtum">Meine Katze ist ruhig, also geht's ihr gut</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Katzen leiden still. Wer sich nicht bewegt, frisst oder nur schläft, ist womöglich depressiv.</p>
                </div>
            </div>

            <!-- BONUS Irrtum 13 -->
            <div class="mythos-card" data-category="all">
                <div class="mythos-header">
                    <span class="mythos-icon">🔄</span>
                    <h3 class="mythos-irrtum">Tiere können sich gut anpassen</h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit"><strong>Wahrheit:</strong> Tiere ertragen ihr Umfeld oft, weil sie keine Wahl haben. Sie leiden leise, nicht sichtbar.</p>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="cta-section" style="margin-top: 80px; text-align: center;">
            <h3 style="font-size: 2rem; margin-bottom: 20px;">Jetzt ehrlich prüfen: Bin ich bereit?</h3>
            <a href="<?php echo home_url('/tierliebe-test'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 15px 40px;">
                Zum Test →
            </a>
        </div>
    </div>
</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
