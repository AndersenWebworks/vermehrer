<?php
/**
 * Template Name: Tierliebe - Mythen & Irrtümer
 * Template Post Type: page
 * Description: 12 häufige Irrtümer über Tierhaltung
 * Version: 2.0.0
 */

get_template_part('tierliebe-parts/header');

// Load content from database
$content = get_tierliebe_text('irrtuemer');
?>

<!-- Hero Section -->
<section class="primary-hero" style="min-height: 50vh;">
    <div class="hero-content">
        <h1 class="hero-title editable" data-key="hero-titel">
            <?php echo isset($content['hero-titel']) ? wp_kses_post($content['hero-titel']) : '💭 Die größten Irrtümer über Haustiere'; ?>
        </h1>
        <p class="hero-subtitle editable" data-key="hero-subtitle">
            <?php echo isset($content['hero-subtitle']) ? wp_kses_post($content['hero-subtitle']) : 'Viele Irrtümer halten sich hartnäckig – und kosten Tiere am Ende ihr Glück oder sogar ihr Leben. Hier findest du die häufigsten Missverständnisse – und wie es wirklich ist.'; ?>
        </p>
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
                    <h3 class="mythos-irrtum editable" data-key="irrtum-1-titel">
                        <?php echo isset($content['irrtum-1-titel']) ? wp_kses_post($content['irrtum-1-titel']) : 'Ein Tier aus dem Laden ist gesünder'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-1-text">
                        <?php echo isset($content['irrtum-1-text']) ? wp_kses_post($content['irrtum-1-text']) : '<strong>Wahrheit:</strong> Viele Tiere aus Zoohandlungen stammen aus Massenzuchten, sind überzüchtet, krank oder zu jung – sie sehen nur gesund aus.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 2 -->
            <div class="mythos-card" data-category="all">
                <div class="mythos-header">
                    <span class="mythos-icon">🏠</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-2-titel">
                        <?php echo isset($content['irrtum-2-titel']) ? wp_kses_post($content['irrtum-2-titel']) : 'Ein Tier aus dem Tierschutz hat Macken'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-2-text">
                        <?php echo isset($content['irrtum-2-text']) ? wp_kses_post($content['irrtum-2-text']) : '<strong>Wahrheit:</strong> Viele Tiere aus dem Tierschutz sind geimpft, kastriert, sozialisiert und kennen bereits den Alltag – und bringen viel Dankbarkeit mit.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 3 -->
            <div class="mythos-card" data-category="voegel">
                <div class="mythos-header">
                    <span class="mythos-icon">🦜</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-3-titel">
                        <?php echo isset($content['irrtum-3-titel']) ? wp_kses_post($content['irrtum-3-titel']) : 'Ein Wellensittich allein wird zahmer'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-3-text">
                        <?php echo isset($content['irrtum-3-text']) ? wp_kses_post($content['irrtum-3-text']) : '<strong>Wahrheit:</strong> Ein einsamer Wellensittich leidet – Spiegel und Mensch sind kein Ersatz für echte soziale Bindung.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 4 -->
            <div class="mythos-card" data-category="kleintiere">
                <div class="mythos-header">
                    <span class="mythos-icon">🐹</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-4-titel">
                        <?php echo isset($content['irrtum-4-titel']) ? wp_kses_post($content['irrtum-4-titel']) : 'Hamster sind Kinderhaustiere'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-4-text">
                        <?php echo isset($content['irrtum-4-text']) ? wp_kses_post($content['irrtum-4-text']) : '<strong>Wahrheit:</strong> Hamster sind nachtaktiv, mögen keinen Lärm, brauchen Ruhe, Platz und viel Einstreu. Kinder sehen sie kaum und stressen sie unbewusst.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 5 -->
            <div class="mythos-card" data-category="kleintiere">
                <div class="mythos-header">
                    <span class="mythos-icon">🐰</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-5-titel">
                        <?php echo isset($content['irrtum-5-titel']) ? wp_kses_post($content['irrtum-5-titel']) : 'Kaninchen und Meerschweinchen verstehen sich'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-5-text">
                        <?php echo isset($content['irrtum-5-text']) ? wp_kses_post($content['irrtum-5-text']) : '<strong>Wahrheit:</strong> Sie sprechen nicht dieselbe Sprache. Das Meerschweinchen lebt oft in Angst und versteht das Kaninchen nicht.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 6 -->
            <div class="mythos-card" data-category="all">
                <div class="mythos-header">
                    <span class="mythos-icon">🚪</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-6-titel">
                        <?php echo isset($content['irrtum-6-titel']) ? wp_kses_post($content['irrtum-6-titel']) : 'Ein Käfig im Kinderzimmer reicht'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-6-text">
                        <?php echo isset($content['irrtum-6-text']) ? wp_kses_post($content['irrtum-6-text']) : '<strong>Wahrheit:</strong> Kinderzimmer sind zu laut, unruhig, heiß oder kalt – keine artgerechte Umgebung für Tiere.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 7 -->
            <div class="mythos-card" data-category="kleintiere">
                <div class="mythos-header">
                    <span class="mythos-icon">🐀</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-7-titel">
                        <?php echo isset($content['irrtum-7-titel']) ? wp_kses_post($content['irrtum-7-titel']) : 'Ratten sind dreckig'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-7-text">
                        <?php echo isset($content['irrtum-7-text']) ? wp_kses_post($content['irrtum-7-text']) : '<strong>Wahrheit:</strong> Ratten sind extrem reinlich, klug und sozial – sie lieben Struktur, Sauberkeit und Rituale.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 8 -->
            <div class="mythos-card" data-category="exoten">
                <div class="mythos-header">
                    <span class="mythos-icon">🦎</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-8-titel">
                        <?php echo isset($content['irrtum-8-titel']) ? wp_kses_post($content['irrtum-8-titel']) : 'Reptilien sind anspruchslos'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-8-text">
                        <?php echo isset($content['irrtum-8-text']) ? wp_kses_post($content['irrtum-8-text']) : '<strong>Wahrheit:</strong> Reptilien brauchen UV, Temperaturzonen, Feuchte – Haltung ohne Wissen ist lebensgefährlich für sie.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 9 -->
            <div class="mythos-card" data-category="exoten">
                <div class="mythos-header">
                    <span class="mythos-icon">🐢</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-9-titel">
                        <?php echo isset($content['irrtum-9-titel']) ? wp_kses_post($content['irrtum-9-titel']) : 'Schildkröten brauchen keinen Winterschlaf'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-9-text">
                        <?php echo isset($content['irrtum-9-text']) ? wp_kses_post($content['irrtum-9-text']) : '<strong>Wahrheit:</strong> Ohne Winterschlaf leidet der Stoffwechsel. Viele sterben früh an Leber- oder Organschäden.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 10 -->
            <div class="mythos-card" data-category="exoten">
                <div class="mythos-header">
                    <span class="mythos-icon">🐠</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-10-titel">
                        <?php echo isset($content['irrtum-10-titel']) ? wp_kses_post($content['irrtum-10-titel']) : 'Goldfische passen in ein kleines Glas'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-10-text">
                        <?php echo isset($content['irrtum-10-text']) ? wp_kses_post($content['irrtum-10-text']) : '<strong>Wahrheit:</strong> Goldfische brauchen 100 Liter pro Tier, Filter, Sauerstoff und Pflege. Alles andere ist Tierquälerei.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 11 -->
            <div class="mythos-card" data-category="hunde">
                <div class="mythos-header">
                    <span class="mythos-icon">🐕</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-11-titel">
                        <?php echo isset($content['irrtum-11-titel']) ? wp_kses_post($content['irrtum-11-titel']) : 'Ein zweiter Hund ist Luxus'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-11-text">
                        <?php echo isset($content['irrtum-11-text']) ? wp_kses_post($content['irrtum-11-text']) : '<strong>Wahrheit:</strong> Für manche Hunde ist ein Artgenosse die einzige Entlastung – besonders bei längerer Abwesenheit.'; ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 12 -->
            <div class="mythos-card" data-category="katzen">
                <div class="mythos-header">
                    <span class="mythos-icon">🐱</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-12-titel">
                        <?php echo isset($content['irrtum-12-titel']) ? wp_kses_post($content['irrtum-12-titel']) : 'Meine Katze ist ruhig, also geht\'s ihr gut'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-12-text">
                        <?php echo isset($content['irrtum-12-text']) ? wp_kses_post($content['irrtum-12-text']) : '<strong>Wahrheit:</strong> Katzen leiden still. Wer sich nicht bewegt, frisst oder nur schläft, ist womöglich depressiv.'; ?>
                    </p>
                </div>
            </div>

            <!-- BONUS Irrtum 13 -->
            <div class="mythos-card" data-category="all">
                <div class="mythos-header">
                    <span class="mythos-icon">🔄</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-13-titel">
                        <?php echo isset($content['irrtum-13-titel']) ? wp_kses_post($content['irrtum-13-titel']) : 'Tiere können sich gut anpassen'; ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-13-text">
                        <?php echo isset($content['irrtum-13-text']) ? wp_kses_post($content['irrtum-13-text']) : '<strong>Wahrheit:</strong> Tiere ertragen ihr Umfeld oft, weil sie keine Wahl haben. Sie leiden leise, nicht sichtbar.'; ?>
                    </p>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="cta-section" style="margin-top: 80px; text-align: center;">
            <h3 class="editable" data-key="cta-titel" style="font-size: 2rem; margin-bottom: 20px;">
                <?php echo isset($content['cta-titel']) ? wp_kses_post($content['cta-titel']) : 'Jetzt ehrlich prüfen: Bin ich bereit?'; ?>
            </h3>
            <a href="<?php echo isset($content['cta-button-url']) ? esc_url($content['cta-button-url']) : home_url('/tierliebe-test'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 15px 40px;" data-editable-url="cta-button-url">
                <span class="editable" data-key="cta-button">
                    <?php echo isset($content['cta-button']) ? wp_kses_post($content['cta-button']) : 'Zum Test →'; ?>
                </span>
            </a>
        </div>
    </div>
</section>

<?php
// Add page slug for edit mode
if (current_user_can('edit_posts')) {
    echo '<input type="hidden" id="tierliebe-page-slug" value="irrtuemer">';
}

get_template_part('tierliebe-parts/footer');
?>
