<?php
/**
 * Template Name: Tierliebe - Adoption
 * Template Post Type: page
 * Description: Zucht vs. Kauf vs. Adoption, Adoptionsprozess, Wirtschaftlichkeit
 * Version: 1.1.0
 */

get_template_part('tierliebe-parts/header');

$content = get_tierliebe_text('adoption');
?>

<!-- Hidden Page Slug for Editor -->
<input type="hidden" id="tierliebe-page-slug" value="adoption">

<!-- Hero Section -->
<section class="primary-hero" style="min-height: 60vh;">
    <div class="hero-content">
        <h1 class="hero-title editable" data-key="hero-titel"><?php echo wp_kses_post($content['hero-titel'] ?? ''); ?></h1>
        <p class="hero-subtitle editable" data-key="hero-subtitle"><?php echo wp_kses_post($content['hero-subtitle'] ?? ''); ?></p>
    </div>
</section>

<!-- Tierkauf im Zoofachhandel -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <h2 class="section-title editable" data-key="zoofach-titel" style="text-align: center; margin-bottom: 30px;"><?php echo wp_kses_post($content['zoofach-titel'] ?? ''); ?></h2>
        <p class="editable" data-key="zoofach-intro" style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.1rem; color: var(--text-medium);">
            <?php echo wp_kses_post($content['zoofach-intro'] ?? ''); ?>
        </p>

        <div class="info-box warning" data-emoji="⚠️">
            <h3 class="editable" data-key="zoofach-box-titel"><?php echo wp_kses_post($content['zoofach-box-titel'] ?? ''); ?></h3>
            <ul style="font-size: 1.1rem; line-height: 1.8; margin-top: 20px;" class="editable" data-key="zoofach-box-liste">
            <?php echo wp_kses_post($content['zoofach-box-liste'] ?? ''); ?>
        </ul>
        </div>

        <div class="info-box" data-emoji="💔" style="margin-top: 30px; background: var(--pastel-coral); color: white;">
            <h3 class="editable" data-key="zoofach-system-titel" style="color: white;"><?php echo wp_kses_post($content['zoofach-system-titel'] ?? ''); ?></h3>
            <p class="editable" data-key="zoofach-system-text1" style="font-size: 1.1rem; line-height: 1.8; margin-top: 15px;">
                <?php echo wp_kses_post($content['zoofach-system-text1'] ?? ''); ?>
            </p>
            <p class="editable" data-key="zoofach-system-text2" style="margin-top: 20px; font-size: 1.2rem; font-weight: 700;">
                <?php echo wp_kses_post($content['zoofach-system-text2'] ?? ''); ?>
            </p>
        </div>

        <div class="info-box" data-emoji="✅" style="margin-top: 30px; background: var(--pastel-mint);">
            <h3 class="editable" data-key="zoofach-alternative-titel"><?php echo wp_kses_post($content['zoofach-alternative-titel'] ?? ''); ?></h3>
            <ul style="font-size: 1.1rem; line-height: 1.8; margin-top: 15px;" class="editable" data-key="zoofach-alternative-liste">
            <?php echo wp_kses_post($content['zoofach-alternative-liste'] ?? ''); ?>
        </ul>
        </div>
    </div>
</section>

<!-- Warum Adoption? 3-Panel-Vergleich -->
<section class="section">
    <div class="container">
        <h2 class="section-title editable" data-key="vergleich-titel" style="text-align: center; margin-bottom: 30px;"><?php echo wp_kses_post($content['vergleich-titel'] ?? ''); ?></h2>
        <p class="editable" data-key="vergleich-subtitle" style="text-align: center; max-width: 800px; margin: 0 auto 20px; font-size: 1.2rem; color: var(--text-dark); font-weight: 600;">
            <?php echo wp_kses_post($content['vergleich-subtitle'] ?? ''); ?>
        </p>
        <div style="max-width: 900px; margin: 0 auto 50px;">
            <div class="info-box" data-emoji="ℹ️" style="background: var(--pastel-peach);">
                <p class="editable" data-key="vergleich-frage" style="font-size: 1.1rem; margin-bottom: 15px;"><?php echo wp_kses_post($content['vergleich-frage'] ?? ''); ?></p>
                <p class="editable" data-key="vergleich-antwort" style="font-size: 1.1rem;"><?php echo wp_kses_post($content['vergleich-antwort'] ?? ''); ?></p>
            </div>
        </div>

        <div class="comparison-grid">
            <!-- ZUCHT -->
            <div class="comparison-panel panel-warning">
                <div class="panel-header">
                    <span class="panel-icon">⚠️</span>
                    <h3 class="editable" data-key="panel-zucht-titel"><?php echo esc_html(strip_tags($content['panel-zucht-titel'] ?? '')); ?></h3>
                </div>
                <div class="panel-content">
                    <ul class="panel-list editable" data-key="panel-zucht-liste">
            <?php echo wp_kses_post($content['panel-zucht-liste'] ?? ''); ?>
        </ul>
                </div>
            </div>

            <!-- KAUF -->
            <div class="comparison-panel panel-danger">
                <div class="panel-header">
                    <span class="panel-icon">❌</span>
                    <h3 class="editable" data-key="panel-kauf-titel"><?php echo esc_html(strip_tags($content['panel-kauf-titel'] ?? '')); ?></h3>
                </div>
                <div class="panel-content">
                    <ul class="panel-list editable" data-key="panel-kauf-liste">
            <?php echo wp_kses_post($content['panel-kauf-liste'] ?? ''); ?>
        </ul>
                </div>
            </div>

            <!-- ADOPTION -->
            <div class="comparison-panel panel-success">
                <div class="panel-header">
                    <span class="panel-icon">✅</span>
                    <h3 class="editable" data-key="panel-adoption-titel"><?php echo esc_html(strip_tags($content['panel-adoption-titel'] ?? '')); ?></h3>
                </div>
                <div class="panel-content">
                    <ul class="panel-list editable" data-key="panel-adoption-liste">
            <?php echo wp_kses_post($content['panel-adoption-liste'] ?? ''); ?>
        </ul>
                    <div class="panel-quote">
                        <p class="editable" data-key="panel-adoption-quote"><?php echo wp_kses_post($content['panel-adoption-quote'] ?? ''); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Adoptionsprozess Timeline -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <h2 class="section-title editable" data-key="prozess-titel" style="text-align: center; margin-bottom: 30px;"><?php echo wp_kses_post($content['prozess-titel'] ?? ''); ?></h2>
        <p class="editable" data-key="prozess-intro" style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.1rem; color: var(--text-medium);">
            <?php echo wp_kses_post($content['prozess-intro'] ?? ''); ?>
        </p>

        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-marker">1</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-1-titel"><?php echo esc_html(strip_tags($content['timeline-1-titel'] ?? '')); ?></h3>
                    <p class="editable" data-key="timeline-1-text"><?php echo wp_kses_post($content['timeline-1-text'] ?? ''); ?></p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">2</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-2-titel"><?php echo esc_html(strip_tags($content['timeline-2-titel'] ?? '')); ?></h3>
                    <p class="editable" data-key="timeline-2-text"><?php echo wp_kses_post($content['timeline-2-text'] ?? ''); ?></p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">3</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-3-titel"><?php echo esc_html(strip_tags($content['timeline-3-titel'] ?? '')); ?></h3>
                    <p class="editable" data-key="timeline-3-text"><?php echo wp_kses_post($content['timeline-3-text'] ?? ''); ?></p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">4</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-4-titel"><?php echo esc_html(strip_tags($content['timeline-4-titel'] ?? '')); ?></h3>
                    <p class="editable" data-key="timeline-4-text"><?php echo wp_kses_post($content['timeline-4-text'] ?? ''); ?></p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">5</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-5-titel"><?php echo esc_html(strip_tags($content['timeline-5-titel'] ?? '')); ?></h3>
                    <p class="editable" data-key="timeline-5-text"><?php echo wp_kses_post($content['timeline-5-text'] ?? ''); ?></p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">6</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-6-titel"><?php echo esc_html(strip_tags($content['timeline-6-titel'] ?? '')); ?></h3>
                    <p class="editable" data-key="timeline-6-text"><?php echo wp_kses_post($content['timeline-6-text'] ?? ''); ?></p>
                </div>
            </div>
        </div>

        <div class="info-box" data-emoji="💜" style="margin-top: 50px; background: var(--pastel-lavender);">
            <h3 class="editable" data-key="prozess-box-titel" style="margin-bottom: 15px;"><?php echo wp_kses_post($content['prozess-box-titel'] ?? ''); ?></h3>
            <p class="editable" data-key="prozess-box-text"><?php echo wp_kses_post($content['prozess-box-text'] ?? ''); ?></p>
            <ul style="margin-top: 15px;" class="editable" data-key="prozess-box-liste">
            <?php echo wp_kses_post($content['prozess-box-liste'] ?? ''); ?>
        </ul>
            <p class="editable" data-key="prozess-box-quote" style="margin-top: 20px; font-size: 1.1rem;"><?php echo wp_kses_post($content['prozess-box-quote'] ?? ''); ?></p>
        </div>
    </div>
</section>

<!-- Zucht-Wirtschaftlichkeit -->
<section class="section">
    <div class="container">
        <h2 class="section-title editable" data-key="wirtschaft-titel" style="text-align: center; margin-bottom: 30px;"><?php echo wp_kses_post($content['wirtschaft-titel'] ?? ''); ?></h2>
        <p class="editable" data-key="wirtschaft-intro" style="text-align: center; max-width: 900px; margin: 0 auto 50px; font-size: 1.15rem; color: var(--text-medium); line-height: 1.7;">
            <?php echo wp_kses_post($content['wirtschaft-intro'] ?? ''); ?>
        </p>

        <div class="accordion">
            <div class="accordion-item">
                <button class="accordion-header">
                    <span class="editable" data-key="accordion-1-header"><?php echo esc_html(strip_tags($content['accordion-1-header'] ?? '')); ?></span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <h4 class="editable" data-key="accordion-1-subtitle-1"><?php echo esc_html(strip_tags($content['accordion-1-subtitle-1'] ?? '')); ?></h4>
                    <ul class="editable" data-key="accordion-1-liste-1">
            <?php echo wp_kses_post($content['accordion-1-liste-1'] ?? ''); ?>
        </ul>

                    <h4 class="editable" data-key="accordion-1-subtitle-2" style="margin-top: 30px;"><?php echo esc_html(strip_tags($content['accordion-1-subtitle-2'] ?? '')); ?></h4>
                    <ul class="editable" data-key="accordion-1-liste-2">
            <?php echo wp_kses_post($content['accordion-1-liste-2'] ?? ''); ?>
        </ul>

                    <div class="info-box" data-emoji="🧾" style="margin-top: 30px; background: var(--pastel-coral);">
                        <h4 class="editable" data-key="accordion-1-box-titel"><?php echo esc_html(strip_tags($content['accordion-1-box-titel'] ?? '')); ?></h4>
                        <p class="editable" data-key="accordion-1-box-text"><?php echo wp_kses_post($content['accordion-1-box-text'] ?? ''); ?></p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    <span class="editable" data-key="accordion-2-header"><?php echo esc_html(strip_tags($content['accordion-2-header'] ?? '')); ?></span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <h4>Beispiel: 5 Welpen à 1.800 €</h4>
                    <div class="calculation-box">
                        <p><strong>Einnahmen:</strong> 5 × 1.800 € = <span style="color: var(--cute-coral); font-size: 1.3rem;">9.000 €</span></p>
                        <p><strong>Fixkosten (direkt):</strong> <span style="color: var(--text-dark);">2.500–4.500 €</span></p>
                        <p style="border-top: 2px solid var(--cute-coral); padding-top: 15px; margin-top: 15px;">
                            <strong>Scheinbarer Gewinn:</strong> <span style="font-size: 1.3rem;">4.500–6.500 €</span>
                        </p>
                    </div>

                    <div class="info-box" data-emoji="💡" style="margin-top: 30px; background: var(--pastel-peach);">
                        <h4>⚠️ Aber das ist nur die halbe Wahrheit!</h4>
                        <ul class="editable" data-key="accordion-2-liste">
            <?php echo wp_kses_post($content['accordion-2-liste'] ?? ''); ?>
        </ul>
                        <p style="margin-top: 20px; font-size: 1.2rem;"><strong>Wer ehrlich züchtet, macht also selten Gewinn.</strong></p>
                    </div>

                    <h4 style="margin-top: 40px;">💡 Was müsste ein Welpe kosten, damit sich Zucht rechnet?</h4>
                    <p>Wenn man alle Kosten, Zeit und ein faires Einkommen berücksichtigt: <strong>mindestens 2.500–3.500 €</strong></p>
                    <p><strong>Problem:</strong> Diese Preise zahlt kaum jemand. Viele Menschen halten bereits Preise zwischen 800 und 1.200 € für hoch.</p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    <span class="editable" data-key="accordion-3-header"><?php echo esc_html(strip_tags($content['accordion-3-header'] ?? '')); ?></span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <ul class="warning-list editable" data-key="accordion-3-liste">
            <?php echo wp_kses_post($content['accordion-3-liste'] ?? ''); ?>
        </ul>

                    <div class="info-box" data-emoji="🛑" style="margin-top: 30px; background: var(--cute-coral); color: white;">
                        <h4 class="editable" data-key="accordion-3-box-titel" style="color: white;"><?php echo esc_html(strip_tags($content['accordion-3-box-titel'] ?? '')); ?></h4>
                        <p class="editable" data-key="accordion-3-box-text1" style="font-size: 1.2rem; line-height: 1.6;">
                            <?php echo wp_kses_post($content['accordion-3-box-text1'] ?? ''); ?>
                        </p>
                        <p class="editable" data-key="accordion-3-box-text2" style="margin-top: 20px;"><?php echo wp_kses_post($content['accordion-3-box-text2'] ?? ''); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Abgabealter -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <h2 class="section-title editable" data-key="abgabe-titel" style="text-align: center; margin-bottom: 30px;"><?php echo wp_kses_post($content['abgabe-titel'] ?? ''); ?></h2>
        <p class="editable" data-key="abgabe-intro" style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.15rem; color: var(--text-medium);">
            <?php echo wp_kses_post($content['abgabe-intro'] ?? ''); ?>
        </p>

        <div class="info-grid">
            <div class="info-card">
                <h3>🐶 Hunde</h3>
                <p><strong>Rechtlich erlaubt:</strong> ab 8 Wochen</p>
                <p><strong>Artgerecht:</strong> ab 10–12 Wochen</p>
                <div class="info-why">
                    <h4>Warum?</h4>
                    <ul class="editable" data-key="abgabe-hunde-liste">
            <?php echo wp_kses_post($content['abgabe-hunde-liste'] ?? ''); ?>
        </ul>
                </div>
            </div>

            <div class="info-card">
                <h3>🐱 Katzen</h3>
                <p><strong>Rechtlich erlaubt:</strong> ab 8 Wochen</p>
                <p><strong>Artgerecht:</strong> ab 12 Wochen (oder später)</p>
                <div class="info-why">
                    <h4>Warum?</h4>
                    <ul class="editable" data-key="abgabe-katzen-liste">
            <?php echo wp_kses_post($content['abgabe-katzen-liste'] ?? ''); ?>
        </ul>
                </div>
            </div>
        </div>

        <div class="info-box" data-emoji="🤔" style="margin-top: 50px; background: var(--pastel-mint);">
            <h3 class="editable" data-key="abgabe-box-titel"><?php echo wp_kses_post($content['abgabe-box-titel'] ?? ''); ?></h3>
            <ul style="margin-top: 15px; font-size: 1.1rem;" class="editable" data-key="abgabe-box-liste">
            <?php echo wp_kses_post($content['abgabe-box-liste'] ?? ''); ?>
        </ul>
            <p class="editable" data-key="abgabe-box-quote" style="margin-top: 25px; font-size: 1.2rem;"><?php echo wp_kses_post($content['abgabe-box-quote'] ?? ''); ?></p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section">
    <div class="container" style="text-align: center;">
        <h2 class="editable" data-key="cta-titel" style="font-size: 2.5rem; margin-bottom: 25px;"><?php echo wp_kses_post($content['cta-titel'] ?? ''); ?></h2>
        <p class="editable" data-key="cta-subtitle" style="font-size: 1.3rem; margin-bottom: 40px; color: var(--text-medium);"><?php echo wp_kses_post($content['cta-subtitle'] ?? ''); ?></p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo home_url('/tierliebe-test'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 18px 45px;">
                <span class="editable" data-key="cta-button-1"><?php echo esc_html(strip_tags($content['cta-button-1'] ?? '')); ?></span>
            </a>
            <a href="https://www.tierheimhelden.de" target="_blank" class="btn btn-secondary" style="font-size: 1.2rem; padding: 18px 45px;">
                <span class="editable" data-key="cta-button-2"><?php echo esc_html(strip_tags($content['cta-button-2'] ?? '')); ?></span>
            </a>
        </div>
    </div>
</section>

<?php
if (current_user_can('edit_posts')) {
    echo '';
}

get_template_part('tierliebe-parts/footer');
?>

