<?php
/**
 * Template Name: Tierliebe - Test
 * Template Post Type: page
 * Description: Quiz - Bin ich bereit für ein Tier?
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');

$content = get_tierliebe_text('test');
?>

<section id="test" class="section">
    <div class="section-header">
        <h2 class="section-title editable" data-key="section-titel"><?php echo wp_kses_post($content['section-titel'] ?? ''); ?></h2>
        <p class="section-subtitle editable" data-key="section-subtitle" style="max-width: 800px; margin: 0 auto 20px;">
            <?php echo wp_kses_post($content['section-subtitle'] ?? ''); ?>
        </p>
        <p class="editable" data-key="section-frage" style="font-size: 1.2rem; font-weight: 600; text-align: center; margin-bottom: 40px;">
            <?php echo wp_kses_post($content['section-frage'] ?? ''); ?>
        </p>
    </div>

    <div class="info-box responsibility-box" data-emoji="💭" style="max-width: 800px; margin: 0 auto 40px;">
        <p class="editable" data-key="responsibility-text" style="font-size: 1.1rem; line-height: 1.7;">
            <?php echo wp_kses_post($content['responsibility-text'] ?? ''); ?>
        </p>
    </div>

    <?php echo do_shortcode('[tierliebe_quiz]'); ?>
</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
