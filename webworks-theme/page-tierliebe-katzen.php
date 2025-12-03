<?php
/**
 * Template Name: Tierliebe - Katzen
 * Template Post Type: page
 * Description: Mythen und Fakten über Katzen
 * Version: 1.3.0
 */

get_template_part('tierliebe-parts/header');
$content = get_tierliebe_text('katzen');
?>

<!-- Hidden Page Slug for Editor -->
<input type="hidden" id="tierliebe-page-slug" value="katzen">

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
                <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-mint);">
                    <p class="editable" data-key="mythos1-box-titel">
                        <?php echo wp_kses_post($content['mythos1-box-titel'] ?? ''); ?>
                    </p>
                    <ul class="editable" data-key="katzen-liste-1">
                        <?php echo wp_kses_post($content['katzen-liste-1'] ?? ''); ?>
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
                <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                    <p class="editable" data-key="mythos2-box-titel">
                        <?php echo wp_kses_post($content['mythos2-box-titel'] ?? ''); ?>
                    </p>
                    <ul class="editable" data-key="katzen-liste-2">
                        <?php echo wp_kses_post($content['katzen-liste-2'] ?? ''); ?>
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
                <div class="info-box" data-emoji="✅" style="margin-top: 20px; background: var(--pastel-lavender);">
                    <p class="editable" data-key="mythos3-box-titel">
                        <?php echo wp_kses_post($content['mythos3-box-titel'] ?? ''); ?>
                    </p>
                    <ul class="editable" data-key="katzen-liste-3">
                        <?php echo wp_kses_post($content['katzen-liste-3'] ?? ''); ?>
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
        <ul class="editable" data-key="katzen-liste-4">
            <?php echo wp_kses_post($content['katzen-liste-4'] ?? ''); ?>
        </ul>
    </div>

    <!-- Spezifische Frage -->
    <div class="info-box warning" data-emoji="❓">
        <h4 class="editable" data-key="frage-titel">
            <?php echo wp_kses_post($content['frage-titel'] ?? ''); ?>
        </h4>
        <ul class="editable" data-key="katzen-liste-5">
            <?php echo wp_kses_post($content['katzen-liste-5'] ?? ''); ?>
        </ul>
        <div class="highlight-text">
            <p class="editable" data-key="frage-highlight">
                <?php echo wp_kses_post($content['frage-highlight'] ?? ''); ?>
            </p>
        </div>
    </div>

    <!-- Wichtiges Wissen -->
    <div class="info-box love" data-emoji="💭">
        <h4 class="editable" data-key="wissen-titel">
            <?php echo wp_kses_post($content['wissen-titel'] ?? ''); ?>
        </h4>
        <p style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 25px;" class="editable" data-key="wissen-text1">
            <?php echo wp_kses_post($content['wissen-text1'] ?? ''); ?>
        </p>
        <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;" class="editable" data-key="wissen-text2">
            <?php echo wp_kses_post($content['wissen-text2'] ?? ''); ?>
        </p>
        <ul class="editable" data-key="katzen-liste-6" style="font-size: 1.05rem; line-height: 1.7; margin-bottom: 25px;">
            <?php echo wp_kses_post($content['katzen-liste-6'] ?? ''); ?>
        </ul>
        <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 25px;" class="editable" data-key="wissen-text3">
            <?php echo wp_kses_post($content['wissen-text3'] ?? ''); ?>
        </p>
        <div class="highlight-text" style="background: var(--pastel-coral); padding: 25px; border-radius: 20px; margin-top: 30px;">
            <p style="font-size: 1.25rem; font-weight: 700; text-align: center; margin: 0;" class="editable" data-key="wissen-highlight">
                <?php echo wp_kses_post($content['wissen-highlight'] ?? ''); ?>
            </p>
        </div>
    </div>

</section>

<?php
if (current_user_can('edit_posts')) {
    echo '';
}

get_template_part('tierliebe-parts/footer');
?>
