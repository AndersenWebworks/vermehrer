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
        <h2 class="section-title editable" data-key="section-titel"><?php echo isset($content['section-titel']) ? wp_kses_post($content['section-titel']) : '<span class="emoji">✨</span> Bin ich bereit für ein Tier?'; ?></h2>
        <p class="section-subtitle editable" data-key="section-subtitle" style="max-width: 800px; margin: 0 auto 20px;">
            <?php echo isset($content['section-subtitle']) ? wp_kses_post($content['section-subtitle']) : 'Du denkst darüber nach, ein Tier aufzunehmen? Dann nimm dir bitte kurz Zeit für diese Fragen – ganz ehrlich, nur für dich. Denn ein Tier ist keine Phase. Es ist ein Teil deines Lebens – und komplett abhängig von dir.'; ?>
        </p>
        <p class="editable" data-key="section-frage" style="font-size: 1.2rem; font-weight: 600; text-align: center; margin-bottom: 40px;">
            <?php echo isset($content['section-frage']) ? wp_kses_post($content['section-frage']) : 'Bist du der Typ Tierhalter, den Tiere sich wünschen würden?'; ?>
        </p>
    </div>

    <div class="info-box responsibility-box" style="max-width: 800px; margin: 0 auto 40px;">
        <p class="editable" data-key="responsibility-text" style="font-size: 1.1rem; line-height: 1.7;">
            <?php echo isset($content['responsibility-text']) ? wp_kses_post($content['responsibility-text']) : 'Ehrlichkeit ist der erste Schritt zu echter Tierliebe. Wenn du bei einer Frage oder mehreren Fragen zögerst, ist das kein Grund zur Scham. Es ist ein Zeichen, dass du Verantwortung ernst nimmst – und das verdient Respekt.'; ?>
        </p>
    </div>

    <?php echo do_shortcode('[tierliebe_quiz]'); ?>
</section>

<input type="hidden" name="tierliebe_page" value="test">

<?php get_template_part('tierliebe-parts/footer'); ?>
