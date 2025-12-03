<?php
/**
 * Template Name: Tierliebe - Mythen & Irrtümer
 * Template Post Type: page
 * Description: 12 häufige Irrtümer über Tierhaltung
 * Version: 2.0.0
 */

get_template_part('tierliebe-parts/header');
$content = get_tierliebe_text('irrtuemer');
?>

<!-- Hidden Page Slug for Editor -->
<input type="hidden" id="tierliebe-page-slug" value="irrtuemer">

<!-- Hero Section -->
<section class="primary-hero" style="min-height: 50vh;">
    <div class="hero-content">
        <h1 class="hero-title editable" data-key="hero-titel">
            <?php echo wp_kses_post($content['hero-titel'] ?? ''); ?>
        </h1>
        <p class="hero-subtitle editable" data-key="hero-subtitle">
            <?php echo wp_kses_post($content['hero-subtitle'] ?? ''); ?>
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
                        <?php echo wp_kses_post($content['irrtum-1-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-1-text">
                        <?php echo wp_kses_post($content['irrtum-1-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 2 -->
            <div class="mythos-card" data-category="all">
                <div class="mythos-header">
                    <span class="mythos-icon">🏠</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-2-titel">
                        <?php echo wp_kses_post($content['irrtum-2-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-2-text">
                        <?php echo wp_kses_post($content['irrtum-2-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 3 -->
            <div class="mythos-card" data-category="voegel">
                <div class="mythos-header">
                    <span class="mythos-icon">🦜</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-3-titel">
                        <?php echo wp_kses_post($content['irrtum-3-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-3-text">
                        <?php echo wp_kses_post($content['irrtum-3-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 4 -->
            <div class="mythos-card" data-category="kleintiere">
                <div class="mythos-header">
                    <span class="mythos-icon">🐹</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-4-titel">
                        <?php echo wp_kses_post($content['irrtum-4-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-4-text">
                        <?php echo wp_kses_post($content['irrtum-4-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 5 -->
            <div class="mythos-card" data-category="kleintiere">
                <div class="mythos-header">
                    <span class="mythos-icon">🐰</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-5-titel">
                        <?php echo wp_kses_post($content['irrtum-5-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-5-text">
                        <?php echo wp_kses_post($content['irrtum-5-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 6 -->
            <div class="mythos-card" data-category="all">
                <div class="mythos-header">
                    <span class="mythos-icon">🚪</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-6-titel">
                        <?php echo wp_kses_post($content['irrtum-6-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-6-text">
                        <?php echo wp_kses_post($content['irrtum-6-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 7 -->
            <div class="mythos-card" data-category="kleintiere">
                <div class="mythos-header">
                    <span class="mythos-icon">🐀</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-7-titel">
                        <?php echo wp_kses_post($content['irrtum-7-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-7-text">
                        <?php echo wp_kses_post($content['irrtum-7-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 8 -->
            <div class="mythos-card" data-category="exoten">
                <div class="mythos-header">
                    <span class="mythos-icon">🦎</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-8-titel">
                        <?php echo wp_kses_post($content['irrtum-8-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-8-text">
                        <?php echo wp_kses_post($content['irrtum-8-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 9 -->
            <div class="mythos-card" data-category="exoten">
                <div class="mythos-header">
                    <span class="mythos-icon">🐢</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-9-titel">
                        <?php echo wp_kses_post($content['irrtum-9-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-9-text">
                        <?php echo wp_kses_post($content['irrtum-9-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 10 -->
            <div class="mythos-card" data-category="exoten">
                <div class="mythos-header">
                    <span class="mythos-icon">🐠</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-10-titel">
                        <?php echo wp_kses_post($content['irrtum-10-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-10-text">
                        <?php echo wp_kses_post($content['irrtum-10-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 11 -->
            <div class="mythos-card" data-category="hunde">
                <div class="mythos-header">
                    <span class="mythos-icon">🐕</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-11-titel">
                        <?php echo wp_kses_post($content['irrtum-11-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-11-text">
                        <?php echo wp_kses_post($content['irrtum-11-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 12 -->
            <div class="mythos-card" data-category="katzen">
                <div class="mythos-header">
                    <span class="mythos-icon">🐱</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-12-titel">
                        <?php echo wp_kses_post($content['irrtum-12-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-12-text">
                        <?php echo wp_kses_post($content['irrtum-12-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- BONUS Irrtum 13 -->
            <div class="mythos-card" data-category="all">
                <div class="mythos-header">
                    <span class="mythos-icon">🔄</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-13-titel">
                        <?php echo wp_kses_post($content['irrtum-13-titel'] ?? ''); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-13-text">
                        <?php echo wp_kses_post($content['irrtum-13-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Irrtum 14 -->
            <div class="mythos-card" data-category="hunde">
                <div class="mythos-header">
                    <span class="mythos-icon">🏡</span>
                    <h3 class="mythos-irrtum editable" data-key="irrtum-14-titel">
                        <?php echo wp_kses_post($content['irrtum-14-titel'] ?? 'Ein Garten ersetzt Spaziergänge'); ?>
                    </h3>
                </div>
                <div class="mythos-content">
                    <p class="mythos-wahrheit editable" data-key="irrtum-14-text">
                        <?php echo wp_kses_post($content['irrtum-14-text'] ?? 'Ein Garten ist ein Bonus, kein Ersatz für Spaziergänge.<br>Hunde brauchen neue Gerüche, Umweltreize, Sozialkontakte und gemeinsame Zeit mit dir draußen.<br>Ein Hund, der nur „mal eben in den Garten gelassen wird", langweilt sich schnell, baut Verhaltensprobleme auf oder wird übergewichtig, obwohl „doch ein Garten da ist".<br>Ein guter Alltag besteht aus beidem: sicheren Pausen zu Hause und richtigen Spaziergängen.'); ?>
                    </p>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="cta-section" style="margin-top: 80px; text-align: center;">
            <h3 class="editable" data-key="cta-titel" style="font-size: 2rem; margin-bottom: 20px;">
                <?php echo wp_kses_post($content['cta-titel'] ?? ''); ?>
            </h3>
            <a href="<?php echo isset($content['cta-button-url']) ? esc_url($content['cta-button-url']) : home_url('/tierliebe-test'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 15px 40px;" data-editable-url="cta-button-url">
                <span class="editable" data-key="cta-button">
                    <?php echo wp_kses_post($content['cta-button'] ?? ''); ?>
                </span>
            </a>
        </div>
    </div>
</section>

<?php
get_template_part('tierliebe-parts/footer');
?>
