<?php
/**
 * Template Name: Tierliebe - Über & Kontakt
 * Template Post Type: page
 * Description: Persönliche Motivation, Autor-Hintergrund, Hilfe-Angebote, Kontaktformular
 * Version: 2.0.0
 */

get_template_part('tierliebe-parts/header');

// Load content from database
$content = get_tierliebe_text('kontakt');

// Try dynamic rendering first (FULL PAGE BUILDER mode)
if (render_tierliebe_dynamic_structure()) {
    // Dynamic structure rendered - page is complete
    get_template_part('tierliebe-parts/footer');
    return;
}

// Fallback: Static template (if no structure saved yet)
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title editable" data-key="section-titel">
            <?php echo wp_kses_post($content['section-titel'] ?? ''); ?>
        </h2>
        <p class="section-subtitle editable" data-key="section-subtitle">
            <?php echo wp_kses_post($content['section-subtitle'] ?? ''); ?>
        </p>
    </div>

    <!-- Persönliche Motivation -->
    <div class="info-box love" data-emoji="❤️">
        <h3 class="editable" data-key="motivation-titel" style="font-size: 1.8rem; margin-bottom: 25px;">
            <?php echo wp_kses_post($content['motivation-titel'] ?? ''); ?>
        </h3>
        <p class="editable" data-key="motivation-text-1" style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 20px;">
            <?php echo wp_kses_post($content['motivation-text-1'] ?? ''); ?>
        </p>
        <p class="editable" data-key="motivation-text-2" style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 20px;">
            <?php echo wp_kses_post($content['motivation-text-2'] ?? ''); ?>
        </p>
    </div>

    <!-- Persönliche Erfahrung -->
    <div class="info-box" data-emoji="🌱" style="background: var(--pastel-mint); margin-top: 40px;">
        <h3 class="editable" data-key="erfahrung-titel" style="margin-bottom: 20px;">
            <?php echo wp_kses_post($content['erfahrung-titel'] ?? ''); ?>
        </h3>
        <p class="editable" data-key="erfahrung-text-1" style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 20px;">
            <?php echo wp_kses_post($content['erfahrung-text-1'] ?? ''); ?>
        </p>
        <p class="editable" data-key="erfahrung-text-2" style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
            <?php echo wp_kses_post($content['erfahrung-text-2'] ?? ''); ?>
        </p>
    </div>

    <!-- Ziel der Website -->
    <div class="info-box" data-emoji="🎯" style="background: var(--pastel-lavender); margin-top: 40px;">
        <h3 class="editable" data-key="ziel-titel" style="margin-bottom: 20px;">
            <?php echo wp_kses_post($content['ziel-titel'] ?? ''); ?>
        </h3>
        <p class="editable" data-key="ziel-text" style="font-size: 1.2rem; line-height: 1.8; margin-bottom: 25px;">
            <?php echo wp_kses_post($content['ziel-text'] ?? ''); ?>
        </p>
    </div>

    <!-- Abschlussbotschaft -->
    <div class="info-box love" data-emoji="🐾" style="margin-top: 40px;">
        <h3 class="editable" data-key="abschluss-titel" style="text-align: center; font-size: 1.8rem; margin-bottom: 25px;">
            <?php echo wp_kses_post($content['abschluss-titel'] ?? ''); ?>
        </h3>
        <p class="editable" data-key="abschluss-text" style="text-align: center; font-size: 1.3rem; line-height: 1.8;">
            <?php echo wp_kses_post($content['abschluss-text'] ?? ''); ?>
        </p>
    </div>

    <!-- Du brauchst Hilfe -->
    <div style="margin-top: 80px;">
        <h2 class="section-title editable" data-key="hilfe-titel" style="text-align: center; margin-bottom: 30px;">
            <?php echo wp_kses_post($content['hilfe-titel'] ?? ''); ?>
        </h2>
        <p class="editable" data-key="hilfe-intro" style="text-align: center; max-width: 700px; margin: 0 auto 50px; font-size: 1.15rem; color: var(--text-medium);">
            <?php echo wp_kses_post($content['hilfe-intro'] ?? ''); ?>
        </p>

        <div class="cards-grid" style="margin-top: 50px;">
            <div class="card mint">
                <span class="card-icon">🏡</span>
                <h3 class="editable" data-key="card-1-titel">
                    <?php echo wp_kses_post($content['card-1-titel'] ?? ''); ?>
                </h3>
                <p class="editable" data-key="card-1-text">
                    <?php echo wp_kses_post($content['card-1-text'] ?? ''); ?>
                </p>
            </div>
            <div class="card peach">
                <span class="card-icon">💬</span>
                <h3 class="editable" data-key="card-2-titel">
                    <?php echo wp_kses_post($content['card-2-titel'] ?? ''); ?>
                </h3>
                <p class="editable" data-key="card-2-text">
                    <?php echo wp_kses_post($content['card-2-text'] ?? ''); ?>
                </p>
            </div>
            <div class="card lavender">
                <span class="card-icon">🤝</span>
                <h3 class="editable" data-key="card-3-titel">
                    <?php echo wp_kses_post($content['card-3-titel'] ?? ''); ?>
                </h3>
                <p class="editable" data-key="card-3-text">
                    <?php echo wp_kses_post($content['card-3-text'] ?? ''); ?>
                </p>
            </div>
        </div>

        <div class="info-box" data-emoji="💕" style="margin-top: 50px; background: var(--pastel-peach); text-align: center;">
            <p class="editable" data-key="quote-text" style="font-size: 1.2rem; line-height: 1.8;">
                <?php echo wp_kses_post($content['quote-text'] ?? ''); ?>
            </p>
        </div>
    </div>

    <div class="info-box info" data-emoji="📧" style="margin-top: 50px;">
        <h4 class="editable" data-key="kontakt-titel">
            <?php echo wp_kses_post($content['kontakt-titel'] ?? ''); ?>
        </h4>
        <p class="editable" data-key="kontakt-text" style="text-align: center; font-size: 1.2rem;">
            <?php echo wp_kses_post($content['kontakt-text'] ?? ''); ?>
        </p>
    </div>

</section>

<?php
// Add page slug for edit mode
if (current_user_can('edit_posts')) {
    echo '';
}

get_template_part('tierliebe-parts/footer');
?>
