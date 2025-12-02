<?php
/**
 * Template Name: Tierliebe - Vögel & Exoten
 * Template Post Type: page
 * Description: Wellensittiche, Schildkröten, Goldfische, Reptilien
 * Version: 1.3.0
 */

get_template_part('tierliebe-parts/header');
$content = get_tierliebe_text('exoten');
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title editable" data-key="section-title">
            <?php echo wp_kses_post($content['section-title'] ?? ''); ?>
        </h2>
        <p class="section-subtitle editable" data-key="section-subtitle">
            <?php echo wp_kses_post($content['section-subtitle'] ?? ''); ?>
        </p>
    </div>

    <div class="info-box warning" data-emoji="⚠️">
        <h4 class="editable" data-key="kernaussage-titel" style="font-size: 1.5rem; text-align: center;">
            <?php echo wp_kses_post($content['kernaussage-titel'] ?? ''); ?>
        </h4>
        <p class="editable" data-key="kernaussage-text" style="font-size: 1.3rem; text-align: center;">
            <?php echo wp_kses_post($content['kernaussage-text'] ?? ''); ?>
        </p>
        <p class="editable" data-key="kernaussage-p2" style="text-align: center; margin-top: 15px;">
            <?php echo wp_kses_post($content['kernaussage-p2'] ?? ''); ?>
        </p>
    </div>

    <!-- Tabs -->
    <div class="tierliebe-tabs" style="margin-top: 50px;">
        <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
            <button class="tab-button active editable" data-tab="welli" data-key="tab-button-welli" style="--current-tab-color: var(--pastel-blue); border-color: var(--pastel-blue);">
                <?php echo esc_html(strip_tags($content['tab-button-welli'] ?? '')); ?>
            </button>
            <button class="tab-button editable" data-tab="fisch" data-key="tab-button-fisch" style="--current-tab-color: var(--pastel-mint); border-color: var(--pastel-mint);">
                <?php echo esc_html(strip_tags($content['tab-button-fisch'] ?? '')); ?>
            </button>
            <button class="tab-button editable" data-tab="reptil" data-key="tab-button-reptil" style="--current-tab-color: var(--pastel-sage); border-color: var(--pastel-sage);">
                <?php echo esc_html(strip_tags($content['tab-button-reptil'] ?? '')); ?>
            </button>
            <button class="tab-button editable" data-tab="schildkroete" data-key="tab-button-schildkroete" style="--current-tab-color: var(--pastel-peach); border-color: var(--pastel-peach);">
                <?php echo esc_html(strip_tags($content['tab-button-schildkroete'] ?? '')); ?>
            </button>
        </div>

        <!-- Wellensittich -->
        <div class="tab-panel active" data-tab="welli">
            <h3 class="editable" data-key="welli-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo wp_kses_post($content['welli-titel'] ?? ''); ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="welli-mythos1-header">
                            <?php echo wp_kses_post($content['welli-mythos1-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="welli-mythos1-h4">
                            <?php echo wp_kses_post($content['welli-mythos1-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="welli-mythos1-p1">
                            <?php echo wp_kses_post($content['welli-mythos1-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="💔" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="welli-mythos1-infobox-titel">
                                <?php echo wp_kses_post($content['welli-mythos1-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-1">
            <?php echo wp_kses_post($content['exoten-liste-1'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="welli-mythos1-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['welli-mythos1-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="welli-mythos2-header">
                            <?php echo wp_kses_post($content['welli-mythos2-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="welli-mythos2-h4">
                            <?php echo wp_kses_post($content['welli-mythos2-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="welli-mythos2-p1">
                            <?php echo wp_kses_post($content['welli-mythos2-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🕊️" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="welli-mythos2-infobox-titel">
                                <?php echo wp_kses_post($content['welli-mythos2-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-2">
            <?php echo wp_kses_post($content['exoten-liste-2'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="welli-mythos2-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['welli-mythos2-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="welli-mythos3-header">
                            <?php echo wp_kses_post($content['welli-mythos3-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="welli-mythos3-h4">
                            <?php echo wp_kses_post($content['welli-mythos3-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="welli-mythos3-p1">
                            <?php echo wp_kses_post($content['welli-mythos3-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="welli-mythos3-infobox-titel">
                                <?php echo wp_kses_post($content['welli-mythos3-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-3">
            <?php echo wp_kses_post($content['exoten-liste-3'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="welli-mythos3-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['welli-mythos3-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="welli-mythos4-header">
                            <?php echo wp_kses_post($content['welli-mythos4-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="welli-mythos4-h4">
                            <?php echo wp_kses_post($content['welli-mythos4-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="welli-mythos4-p1">
                            <?php echo wp_kses_post($content['welli-mythos4-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="💡" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="welli-mythos4-infobox-titel">
                                <?php echo wp_kses_post($content['welli-mythos4-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-4">
            <?php echo wp_kses_post($content['exoten-liste-4'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="welli-mythos4-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['welli-mythos4-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="welli-fakten-titel">
                    <?php echo wp_kses_post($content['welli-fakten-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-5">
            <?php echo wp_kses_post($content['exoten-liste-5'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <h4 class="editable" data-key="welli-wichtig-titel">
                    <?php echo wp_kses_post($content['welli-wichtig-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="welli-wichtig-p1">
                    <?php echo wp_kses_post($content['welli-wichtig-p1'] ?? ''); ?>
                </p>
                <p class="editable" data-key="welli-wichtig-p2" style="margin-top: 15px; font-size: 1.2rem; text-align: center;">
                    <?php echo wp_kses_post($content['welli-wichtig-p2'] ?? ''); ?>
                </p>
            </div>
        </div>

        <!-- Goldfisch -->
        <div class="tab-panel" data-tab="fisch">
            <h3 class="editable" data-key="fisch-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo wp_kses_post($content['fisch-titel'] ?? ''); ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="fisch-mythos1-header">
                            <?php echo wp_kses_post($content['fisch-mythos1-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="fisch-mythos1-h4">
                            <?php echo wp_kses_post($content['fisch-mythos1-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="fisch-mythos1-p1">
                            <?php echo wp_kses_post($content['fisch-mythos1-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="fisch-mythos1-infobox-titel">
                                <?php echo wp_kses_post($content['fisch-mythos1-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-6">
            <?php echo wp_kses_post($content['exoten-liste-6'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="fisch-mythos1-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['fisch-mythos1-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="fisch-mythos2-header">
                            <?php echo wp_kses_post($content['fisch-mythos2-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="fisch-mythos2-h4">
                            <?php echo wp_kses_post($content['fisch-mythos2-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="fisch-mythos2-p1">
                            <?php echo wp_kses_post($content['fisch-mythos2-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="📏" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="fisch-mythos2-infobox-titel">
                                <?php echo wp_kses_post($content['fisch-mythos2-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-7">
            <?php echo wp_kses_post($content['exoten-liste-7'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="fisch-mythos2-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['fisch-mythos2-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="fisch-mythos3-header">
                            <?php echo wp_kses_post($content['fisch-mythos3-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="fisch-mythos3-h4">
                            <?php echo wp_kses_post($content['fisch-mythos3-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="fisch-mythos3-p1">
                            <?php echo wp_kses_post($content['fisch-mythos3-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🎂" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="fisch-mythos3-infobox-titel">
                                <?php echo wp_kses_post($content['fisch-mythos3-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-8">
            <?php echo wp_kses_post($content['exoten-liste-8'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="fisch-mythos3-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['fisch-mythos3-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="fisch-mythos4-header">
                            <?php echo wp_kses_post($content['fisch-mythos4-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="fisch-mythos4-h4">
                            <?php echo wp_kses_post($content['fisch-mythos4-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="fisch-mythos4-p1">
                            <?php echo wp_kses_post($content['fisch-mythos4-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="💀" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="fisch-mythos4-infobox-titel">
                                <?php echo wp_kses_post($content['fisch-mythos4-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-9">
            <?php echo wp_kses_post($content['exoten-liste-9'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="fisch-mythos4-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['fisch-mythos4-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="fisch-fakten-titel">
                    <?php echo wp_kses_post($content['fisch-fakten-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-10">
            <?php echo wp_kses_post($content['exoten-liste-10'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4 class="editable" data-key="fisch-schleierschwanz-titel">
                    <?php echo wp_kses_post($content['fisch-schleierschwanz-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-11">
            <?php echo wp_kses_post($content['exoten-liste-11'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <p class="editable" data-key="fisch-hilfeschrei-p1">
                    <?php echo wp_kses_post($content['fisch-hilfeschrei-p1'] ?? ''); ?>
                </p>
            </div>
        </div>

        <!-- Reptilien -->
        <div class="tab-panel" data-tab="reptil">
            <h3 class="editable" data-key="reptil-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo wp_kses_post($content['reptil-titel'] ?? ''); ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="reptil-mythos1-header">
                            <?php echo wp_kses_post($content['reptil-mythos1-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="reptil-mythos1-h4">
                            <?php echo wp_kses_post($content['reptil-mythos1-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="reptil-mythos1-p1">
                            <?php echo wp_kses_post($content['reptil-mythos1-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="☀️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="reptil-mythos1-infobox-titel">
                                <?php echo wp_kses_post($content['reptil-mythos1-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-12">
            <?php echo wp_kses_post($content['exoten-liste-12'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="reptil-mythos1-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['reptil-mythos1-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="reptil-mythos2-header">
                            <?php echo wp_kses_post($content['reptil-mythos2-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="reptil-mythos2-h4">
                            <?php echo wp_kses_post($content['reptil-mythos2-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="reptil-mythos2-p1">
                            <?php echo wp_kses_post($content['reptil-mythos2-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🏗️" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="reptil-mythos2-infobox-titel">
                                <?php echo wp_kses_post($content['reptil-mythos2-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-13">
            <?php echo wp_kses_post($content['exoten-liste-13'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="reptil-mythos2-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['reptil-mythos2-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="reptil-mythos3-header">
                            <?php echo wp_kses_post($content['reptil-mythos3-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="reptil-mythos3-h4">
                            <?php echo wp_kses_post($content['reptil-mythos3-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="reptil-mythos3-p1">
                            <?php echo wp_kses_post($content['reptil-mythos3-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="reptil-mythos3-infobox-titel">
                                <?php echo wp_kses_post($content['reptil-mythos3-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-14">
            <?php echo wp_kses_post($content['exoten-liste-14'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="reptil-mythos3-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['reptil-mythos3-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="reptil-mythos4-header">
                            <?php echo wp_kses_post($content['reptil-mythos4-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="reptil-mythos4-h4">
                            <?php echo wp_kses_post($content['reptil-mythos4-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="reptil-mythos4-p1">
                            <?php echo wp_kses_post($content['reptil-mythos4-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="😢" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="reptil-mythos4-infobox-titel">
                                <?php echo wp_kses_post($content['reptil-mythos4-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-15">
            <?php echo wp_kses_post($content['exoten-liste-15'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="reptil-mythos4-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['reptil-mythos4-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="reptil-fakten-titel">
                    <?php echo wp_kses_post($content['reptil-fakten-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-16">
            <?php echo wp_kses_post($content['exoten-liste-16'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4 class="editable" data-key="reptil-fehler-titel">
                    <?php echo wp_kses_post($content['reptil-fehler-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="reptil-fehler-p1">
                    <?php echo wp_kses_post($content['reptil-fehler-p1'] ?? ''); ?>
                </p>
                <h4 class="editable" data-key="reptil-albino-titel" style="margin-top: 20px;">
                    <?php echo wp_kses_post($content['reptil-albino-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-17">
            <?php echo wp_kses_post($content['exoten-liste-17'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <p class="editable" data-key="reptil-hilfeschrei-p1">
                    <?php echo wp_kses_post($content['reptil-hilfeschrei-p1'] ?? ''); ?>
                </p>
            </div>
        </div>

        <!-- Schildkröten -->
        <div class="tab-panel" data-tab="schildkroete">
            <h3 class="editable" data-key="schildkroete-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo wp_kses_post($content['schildkroete-titel'] ?? ''); ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="schildkroete-mythos1-header">
                            <?php echo wp_kses_post($content['schildkroete-mythos1-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="schildkroete-mythos1-h4">
                            <?php echo wp_kses_post($content['schildkroete-mythos1-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="schildkroete-mythos1-p1">
                            <?php echo wp_kses_post($content['schildkroete-mythos1-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🌳" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="schildkroete-mythos1-infobox-titel">
                                <?php echo wp_kses_post($content['schildkroete-mythos1-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-18">
            <?php echo wp_kses_post($content['exoten-liste-18'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="schildkroete-mythos1-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['schildkroete-mythos1-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="schildkroete-mythos2-header">
                            <?php echo wp_kses_post($content['schildkroete-mythos2-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="schildkroete-mythos2-h4">
                            <?php echo wp_kses_post($content['schildkroete-mythos2-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="schildkroete-mythos2-p1">
                            <?php echo wp_kses_post($content['schildkroete-mythos2-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🛌" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="schildkroete-mythos2-infobox-titel">
                                <?php echo wp_kses_post($content['schildkroete-mythos2-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-19">
            <?php echo wp_kses_post($content['exoten-liste-19'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="schildkroete-mythos2-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['schildkroete-mythos2-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="schildkroete-mythos3-header">
                            <?php echo wp_kses_post($content['schildkroete-mythos3-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="schildkroete-mythos3-h4">
                            <?php echo wp_kses_post($content['schildkroete-mythos3-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="schildkroete-mythos3-p1">
                            <?php echo wp_kses_post($content['schildkroete-mythos3-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🎂" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="schildkroete-mythos3-infobox-titel">
                                <?php echo wp_kses_post($content['schildkroete-mythos3-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-20">
            <?php echo wp_kses_post($content['exoten-liste-20'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="schildkroete-mythos3-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['schildkroete-mythos3-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="schildkroete-mythos4-header">
                            <?php echo wp_kses_post($content['schildkroete-mythos4-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="schildkroete-mythos4-h4">
                            <?php echo wp_kses_post($content['schildkroete-mythos4-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="schildkroete-mythos4-p1">
                            <?php echo wp_kses_post($content['schildkroete-mythos4-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🚫" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="schildkroete-mythos4-infobox-titel">
                                <?php echo wp_kses_post($content['schildkroete-mythos4-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="exoten-liste-21">
            <?php echo wp_kses_post($content['exoten-liste-21'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="schildkroete-mythos4-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['schildkroete-mythos4-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="schildkroete-fakten-titel">
                    <?php echo wp_kses_post($content['schildkroete-fakten-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-22">
            <?php echo wp_kses_post($content['exoten-liste-22'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4 class="editable" data-key="schildkroete-fehler-titel">
                    <?php echo wp_kses_post($content['schildkroete-fehler-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="exoten-liste-23">
            <?php echo wp_kses_post($content['exoten-liste-23'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box love" data-emoji="🐢">
                <p class="editable" data-key="schildkroete-verantwortung-p1" style="font-size: 1.2rem; text-align: center;">
                    <?php echo wp_kses_post($content['schildkroete-verantwortung-p1'] ?? ''); ?>
                </p>
            </div>
        </div>
    </div>

</section>

<?php
if (current_user_can('edit_posts')) {
    echo '';
}
?>

<?php get_template_part('tierliebe-parts/footer'); ?>
