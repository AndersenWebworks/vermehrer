<?php
/**
 * Template Name: Tierliebe - Test
 * Template Post Type: page
 * Description: Quiz - Bin ich bereit für ein Tier?
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');
?>

<section id="test" class="section">
    <div class="section-header">
        <h2 class="section-title"><span class="emoji">✨</span> Bin ich bereit für ein Tier?</h2>
        <p class="section-subtitle" style="max-width: 800px; margin: 0 auto 20px;">
            Du denkst darüber nach, ein Tier aufzunehmen? Dann nimm dir bitte kurz Zeit für diese Fragen – ganz ehrlich, nur für dich. Denn ein Tier ist keine Phase. Es ist ein Teil deines Lebens – und komplett abhängig von dir.
        </p>
        <p style="font-size: 1.2rem; font-weight: 600; text-align: center; margin-bottom: 40px;">
            Bist du der Typ Tierhalter, den Tiere sich wünschen würden?
        </p>
    </div>

    <div class="info-box responsibility-box" style="max-width: 800px; margin: 0 auto 40px;">
        <p style="font-size: 1.1rem; line-height: 1.7;">
            Ehrlichkeit ist der erste Schritt zu echter Tierliebe. Wenn du bei einer Frage oder mehreren Fragen zögerst, ist das kein Grund zur Scham. Es ist ein Zeichen, dass du Verantwortung ernst nimmst – und das verdient Respekt.
        </p>
    </div>

    <?php echo do_shortcode('[tierliebe_quiz]'); ?>
</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
