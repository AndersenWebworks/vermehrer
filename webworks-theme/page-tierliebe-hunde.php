<?php
/**
 * Template Name: Tierliebe - Hunde
 * Template Post Type: page
 * Description: Mythen und Fakten über Hunde
 * Version: 1.3.0 - Dynamic Rendering Support
 */

get_template_part('tierliebe-parts/header');
$content = get_tierliebe_text('hunde');

// Try dynamic rendering first (for pages with library elements)
if (render_tierliebe_dynamic_structure()) {
    get_template_part('tierliebe-parts/footer');
    exit;
}

// Fallback: Static template
?>

<!-- CONTENT: Hunde -->
<section class="section">
    <div class="section-header">
        <h2 class="section-title editable" data-key="header-titel">
            <?php echo wp_kses_post($content['header-titel'] ?? ''); ?>
        </h2>
        <p class="section-subtitle editable" data-key="header-untertitel">
            <?php echo wp_kses_post($content['header-untertitel'] ?? ''); ?>
        </p>
    </div>

    <!-- Mythen als Accordion -->
    <div class="accordion" style="max-width: 900px; margin: 0 auto 50px;">

        <!-- Mythos 1 -->
        <div class="accordion-item">
            <button class="accordion-header">
                <span class="editable" data-key="mythos1-header"><?php echo esc_html(strip_tags($content['mythos1-header'] ?? '')); ?></span>
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
                <h4 class="editable" data-key="mythos1-wahrheit-titel">
                    <?php echo wp_kses_post($content['mythos1-wahrheit-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="mythos1-text1">
                    <?php echo wp_kses_post($content['mythos1-text1'] ?? ''); ?>
                </p>
                <p style="margin-top: 15px;" class="editable" data-key="mythos1-text2">
                    <?php echo wp_kses_post($content['mythos1-text2'] ?? ''); ?>
                </p>
                <div class="info-box" style="margin-top: 20px; background: var(--pastel-coral);">
                    <p class="editable" data-key="mythos1-box-titel">
                        <?php echo wp_kses_post($content['mythos1-box-titel'] ?? ''); ?>
                    </p>
                    <ul class="editable" data-key="hunde-liste-1">
            <?php echo wp_kses_post($content['hunde-liste-1'] ?? ''); ?>
        </ul>
                </div>
            </div>
        </div>

        <!-- Mythos 2 -->
        <div class="accordion-item">
            <button class="accordion-header">
                <span class="editable" data-key="mythos2-header"><?php echo esc_html(strip_tags($content['mythos2-header'] ?? '')); ?></span>
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
                <h4 class="editable" data-key="mythos2-wahrheit-titel">
                    <?php echo wp_kses_post($content['mythos2-wahrheit-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="mythos2-text1">
                    <?php echo wp_kses_post($content['mythos2-text1'] ?? ''); ?>
                </p>
                <div class="info-box" style="margin-top: 20px; background: var(--pastel-mint);">
                    <p class="editable" data-key="mythos2-box-titel">
                        <?php echo wp_kses_post($content['mythos2-box-titel'] ?? ''); ?>
                    </p>
                    <ul class="editable" data-key="hunde-liste-2">
            <?php echo wp_kses_post($content['hunde-liste-2'] ?? ''); ?>
        </ul>
                </div>
                <p style="margin-top: 20px; font-size: 1.1rem;" class="editable" data-key="mythos2-text2">
                    <?php echo wp_kses_post($content['mythos2-text2'] ?? ''); ?>
                </p>
            </div>
        </div>

        <!-- Mythos 3 -->
        <div class="accordion-item">
            <button class="accordion-header">
                <span class="editable" data-key="mythos3-header"><?php echo esc_html(strip_tags($content['mythos3-header'] ?? '')); ?></span>
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
                <h4 class="editable" data-key="mythos3-wahrheit-titel">
                    <?php echo wp_kses_post($content['mythos3-wahrheit-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="mythos3-text1">
                    <?php echo wp_kses_post($content['mythos3-text1'] ?? ''); ?>
                </p>
                <div class="info-box" style="margin-top: 20px; background: var(--pastel-lavender);">
                    <p class="editable" data-key="mythos3-box-titel">
                        <?php echo wp_kses_post($content['mythos3-box-titel'] ?? ''); ?>
                    </p>
                    <ul class="editable" data-key="hunde-liste-3">
            <?php echo wp_kses_post($content['hunde-liste-3'] ?? ''); ?>
        </ul>
                </div>
                <p style="margin-top: 20px; font-size: 1.1rem;" class="editable" data-key="mythos3-text2">
                    <?php echo wp_kses_post($content['mythos3-text2'] ?? ''); ?>
                </p>
            </div>
        </div>

    </div>

    <!-- Fakten -->
    <div class="info-box info" data-emoji="✅">
        <h4 class="editable" data-key="fakten-titel">
            <?php echo wp_kses_post($content['fakten-titel'] ?? ''); ?>
        </h4>
        <ul class="editable" data-key="hunde-liste-4">
            <?php echo wp_kses_post($content['hunde-liste-4'] ?? ''); ?>
        </ul>
    </div>

    <!-- Spezielle Frage -->
    <div class="info-box warning" data-emoji="❓">
        <h4 class="editable" data-key="frage-titel">
            <?php echo wp_kses_post($content['frage-titel'] ?? ''); ?>
        </h4>

        <p class="editable" data-key="frage-text1">
            <?php echo wp_kses_post($content['frage-text1'] ?? ''); ?>
        </p>
        <ul class="editable" data-key="hunde-liste-5">
            <?php echo wp_kses_post($content['hunde-liste-5'] ?? ''); ?>
        </ul>

        <div class="highlight-text">
            <p class="editable" data-key="frage-highlight">
                <?php echo wp_kses_post($content['frage-highlight'] ?? ''); ?>
            </p>
        </div>

        <p style="margin-top: 20px;" class="editable" data-key="frage-faustregel">
            <?php echo wp_kses_post($content['frage-faustregel'] ?? ''); ?>
        </p>
    </div>

    <!-- Wichtige Warnung -->
    <div class="info-box warning" data-emoji="⚠️">
        <h4 class="editable" data-key="warnung-titel">
            <?php echo wp_kses_post($content['warnung-titel'] ?? ''); ?>
        </h4>
        <p style="font-size: 1.15rem; line-height: 1.8;" class="editable" data-key="warnung-text1">
            <?php echo wp_kses_post($content['warnung-text1'] ?? ''); ?>
        </p>
        <p style="font-size: 1.15rem; line-height: 1.8; margin-top: 15px;" class="editable" data-key="warnung-text2">
            <?php echo wp_kses_post($content['warnung-text2'] ?? ''); ?>
        </p>
    </div>

    <!-- Abschließende Fundamentalaussage -->
    <div class="info-box love" data-emoji="🐾">
        <h4 class="editable" data-key="wahrheit-titel">
            <?php echo wp_kses_post($content['wahrheit-titel'] ?? ''); ?>
        </h4>
        <p style="font-size: 1.25rem; line-height: 1.8; text-align: center; margin-bottom: 20px;" class="editable" data-key="wahrheit-text1">
            <?php echo wp_kses_post($content['wahrheit-text1'] ?? ''); ?>
        </p>
        <p style="font-size: 1.15rem; line-height: 1.8; text-align: center;" class="editable" data-key="wahrheit-text2">
            <?php echo wp_kses_post($content['wahrheit-text2'] ?? ''); ?>
        </p>
    </div>


</section>

<?php
if (current_user_can('edit_posts')) {
    echo '';
}

get_template_part('tierliebe-parts/footer');
?>
