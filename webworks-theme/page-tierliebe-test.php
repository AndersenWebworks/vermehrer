<?php
/**
 * Template Name: Tierliebe - Test
 * Template Post Type: page
 * Description: Quiz - Bin ich bereit für ein Tier?
 * Version: 1.0
 */

get_template_part('tierliebe-parts/header');
?>

<section id="test" class="section">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">✨</span> Mach den Bereitschafts-Test</h2>
        <p class="section-subtitle">Sei ehrlich zu dir - es geht um ein Lebewesen!</p>
    </div>

    <?php echo do_shortcode('[tierliebe_quiz]'); ?>
</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
