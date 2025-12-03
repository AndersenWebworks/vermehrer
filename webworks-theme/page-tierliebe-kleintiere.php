<?php
/**
 * Template Name: Tierliebe - Kleintiere
 * Template Post Type: page
 * Description: Kaninchen, Meerschweinchen, Hamster, Mäuse, Ratten, Degus, Chinchillas
 * Version: 1.2.0
 */

get_template_part('tierliebe-parts/header');
$content = get_tierliebe_text('kleintiere');
?>

<!-- Hidden Page Slug for Editor -->
<input type="hidden" id="tierliebe-page-slug" value="kleintiere">

<section class="section">
    <div class="section-header">
        <h2 class="section-title editable" data-key="header-titel">
            <?php echo wp_kses_post($content['header-titel'] ?? ''); ?>
        </h2>
        <p class="section-subtitle editable" data-key="header-untertitel">
            <?php echo wp_kses_post($content['header-untertitel'] ?? ''); ?>
        </p>
    </div>

    <!-- Warnung vorab -->
    <div class="info-box warning" data-emoji="⚠️">
        <h4 class="editable" data-key="warnung-titel">
            <?php echo wp_kses_post($content['warnung-titel'] ?? ''); ?>
        </h4>
        <p style="font-size: 1.2rem; text-align: center;" class="editable" data-key="warnung-text">
            <?php echo wp_kses_post($content['warnung-text'] ?? ''); ?>
        </p>
    </div>

    <!-- Tab Navigation -->
    <div class="tierliebe-tabs" style="margin-top: 50px;">
        <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
            <button class="tab-button active editable" data-tab="kaninchen" data-key="tab-button-kaninchen" style="--current-tab-color: var(--pastel-mint); border-color: var(--pastel-mint);">
                <?php echo esc_html(strip_tags($content['tab-button-kaninchen'] ?? '')); ?>
            </button>
            <button class="tab-button editable" data-tab="hamster" data-key="tab-button-hamster" style="--current-tab-color: var(--pastel-peach); border-color: var(--pastel-peach);">
                <?php echo esc_html(strip_tags($content['tab-button-hamster'] ?? '')); ?>
            </button>
            <button class="tab-button editable" data-tab="ratten" data-key="tab-button-ratten" style="--current-tab-color: var(--pastel-lavender); border-color: var(--pastel-lavender);">
                <?php echo esc_html(strip_tags($content['tab-button-ratten'] ?? '')); ?>
            </button>
            <button class="tab-button editable" data-tab="degus" data-key="tab-button-degus" style="--current-tab-color: var(--pastel-pink); border-color: var(--pastel-pink);">
                <?php echo esc_html(strip_tags($content['tab-button-degus'] ?? '')); ?>
            </button>
        </div>

        <!-- Tab Content: Kaninchen -->
        <div class="tab-panel active" data-tab="kaninchen">
            <h3 class="editable" data-key="kaninchen-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo wp_kses_post($content['kaninchen-titel'] ?? ''); ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="kaninchen-mythos1-header">
                            <?php echo wp_kses_post($content['kaninchen-mythos1-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="kaninchen-mythos1-h4">
                            <?php echo wp_kses_post($content['kaninchen-mythos1-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="kaninchen-mythos1-p1">
                            <?php echo wp_kses_post($content['kaninchen-mythos1-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="kaninchen-mythos1-infobox-titel">
                                <?php echo wp_kses_post($content['kaninchen-mythos1-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-1">
            <?php echo wp_kses_post($content['kleintiere-liste-1'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="kaninchen-mythos1-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['kaninchen-mythos1-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="kaninchen-mythos2-header">
                            <?php echo wp_kses_post($content['kaninchen-mythos2-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="kaninchen-mythos2-h4">
                            <?php echo wp_kses_post($content['kaninchen-mythos2-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="kaninchen-mythos2-p1">
                            <?php echo wp_kses_post($content['kaninchen-mythos2-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="📏" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="kaninchen-mythos2-infobox-titel">
                                <?php echo wp_kses_post($content['kaninchen-mythos2-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-2">
            <?php echo wp_kses_post($content['kleintiere-liste-2'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="kaninchen-mythos2-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['kaninchen-mythos2-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="kaninchen-mythos3-header">
                            <?php echo wp_kses_post($content['kaninchen-mythos3-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="kaninchen-mythos3-h4">
                            <?php echo wp_kses_post($content['kaninchen-mythos3-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="kaninchen-mythos3-p1">
                            <?php echo wp_kses_post($content['kaninchen-mythos3-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🚫" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="kaninchen-mythos3-infobox-titel">
                                <?php echo wp_kses_post($content['kaninchen-mythos3-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-3">
            <?php echo wp_kses_post($content['kleintiere-liste-3'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="kaninchen-mythos3-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['kaninchen-mythos3-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="kaninchen-mythos4-header">
                            <?php echo wp_kses_post($content['kaninchen-mythos4-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="kaninchen-mythos4-h4">
                            <?php echo wp_kses_post($content['kaninchen-mythos4-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="kaninchen-mythos4-p1">
                            <?php echo wp_kses_post($content['kaninchen-mythos4-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="kaninchen-mythos4-infobox-titel">
                                <?php echo wp_kses_post($content['kaninchen-mythos4-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-4">
            <?php echo wp_kses_post($content['kleintiere-liste-4'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="kaninchen-mythos4-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['kaninchen-mythos4-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="kaninchen-fakten-titel">
                    <?php echo wp_kses_post($content['kaninchen-fakten-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-5">
            <?php echo wp_kses_post($content['kleintiere-liste-5'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box warning" data-emoji="🚫">
                <h4 class="editable" data-key="kaninchen-warnung-titel">
                    <?php echo wp_kses_post($content['kaninchen-warnung-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="kaninchen-warnung-p1">
                    <?php echo wp_kses_post($content['kaninchen-warnung-p1'] ?? ''); ?>
                </p>
                <h4 class="editable" data-key="kaninchen-warnung-h4" style="margin-top: 20px;">
                    <?php echo wp_kses_post($content['kaninchen-warnung-h4'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-6">
            <?php echo wp_kses_post($content['kleintiere-liste-6'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <h4 class="editable" data-key="kaninchen-gesundheit-titel">
                    <?php echo wp_kses_post($content['kaninchen-gesundheit-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="kaninchen-gesundheit-p1">
                    <?php echo wp_kses_post($content['kaninchen-gesundheit-p1'] ?? ''); ?>
                </p>
                <div class="highlight-text">
                    <p class="editable" data-key="kaninchen-gesundheit-highlight">
                        <?php echo wp_kses_post($content['kaninchen-gesundheit-highlight'] ?? ''); ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Tab Content: Hamster -->
        <div class="tab-panel" data-tab="hamster">
            <h3 class="editable" data-key="hamster-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo wp_kses_post($content['hamster-titel'] ?? ''); ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="hamster-mythos1-header">
                            <?php echo wp_kses_post($content['hamster-mythos1-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="hamster-mythos1-h4">
                            <?php echo wp_kses_post($content['hamster-mythos1-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="hamster-mythos1-p1">
                            <?php echo wp_kses_post($content['hamster-mythos1-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🌙" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="hamster-mythos1-infobox-titel">
                                <?php echo wp_kses_post($content['hamster-mythos1-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-7">
            <?php echo wp_kses_post($content['kleintiere-liste-7'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="hamster-mythos1-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['hamster-mythos1-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="hamster-mythos2-header">
                            <?php echo wp_kses_post($content['hamster-mythos2-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="hamster-mythos2-h4">
                            <?php echo wp_kses_post($content['hamster-mythos2-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="hamster-mythos2-p1">
                            <?php echo wp_kses_post($content['hamster-mythos2-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="📏" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="hamster-mythos2-infobox-titel">
                                <?php echo wp_kses_post($content['hamster-mythos2-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-8">
            <?php echo wp_kses_post($content['kleintiere-liste-8'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="hamster-mythos2-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['hamster-mythos2-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="hamster-mythos3-header">
                            <?php echo wp_kses_post($content['hamster-mythos3-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="hamster-mythos3-h4">
                            <?php echo wp_kses_post($content['hamster-mythos3-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="hamster-mythos3-p1">
                            <?php echo wp_kses_post($content['hamster-mythos3-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="hamster-mythos3-infobox-titel">
                                <?php echo wp_kses_post($content['hamster-mythos3-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-9">
            <?php echo wp_kses_post($content['kleintiere-liste-9'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="hamster-mythos3-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['hamster-mythos3-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="hamster-mythos4-header">
                            <?php echo wp_kses_post($content['hamster-mythos4-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="hamster-mythos4-h4">
                            <?php echo wp_kses_post($content['hamster-mythos4-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="hamster-mythos4-p1">
                            <?php echo wp_kses_post($content['hamster-mythos4-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="💔" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="hamster-mythos4-infobox-titel">
                                <?php echo wp_kses_post($content['hamster-mythos4-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-10">
            <?php echo wp_kses_post($content['kleintiere-liste-10'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="hamster-mythos4-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['hamster-mythos4-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="hamster-fakten-titel">
                    <?php echo wp_kses_post($content['hamster-fakten-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-11">
            <?php echo wp_kses_post($content['kleintiere-liste-11'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box love" data-emoji="🌙">
                <h4 class="editable" data-key="hamster-verhalten-titel">
                    <?php echo wp_kses_post($content['hamster-verhalten-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="hamster-verhalten-p1">
                    <?php echo wp_kses_post($content['hamster-verhalten-p1'] ?? ''); ?>
                </p>
                <p class="editable" data-key="hamster-verhalten-p2" style="margin-top: 15px;">
                    <?php echo wp_kses_post($content['hamster-verhalten-p2'] ?? ''); ?>
                </p>
            </div>
        </div>

        <!-- Tab Content: Mäuse & Ratten -->
        <div class="tab-panel" data-tab="ratten">
            <h3 class="editable" data-key="ratten-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo wp_kses_post($content['ratten-titel'] ?? ''); ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="ratten-mythos1-header">
                            <?php echo wp_kses_post($content['ratten-mythos1-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="ratten-mythos1-h4">
                            <?php echo wp_kses_post($content['ratten-mythos1-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="ratten-mythos1-p1">
                            <?php echo wp_kses_post($content['ratten-mythos1-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="💔" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="ratten-mythos1-infobox-titel">
                                <?php echo wp_kses_post($content['ratten-mythos1-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-12">
            <?php echo wp_kses_post($content['kleintiere-liste-12'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="ratten-mythos1-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['ratten-mythos1-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="ratten-mythos2-header">
                            <?php echo wp_kses_post($content['ratten-mythos2-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="ratten-mythos2-h4">
                            <?php echo wp_kses_post($content['ratten-mythos2-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="ratten-mythos2-p1">
                            <?php echo wp_kses_post($content['ratten-mythos2-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🏗️" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="ratten-mythos2-infobox-titel">
                                <?php echo wp_kses_post($content['ratten-mythos2-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-13">
            <?php echo wp_kses_post($content['kleintiere-liste-13'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="ratten-mythos2-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['ratten-mythos2-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="ratten-mythos3-header">
                            <?php echo wp_kses_post($content['ratten-mythos3-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="ratten-mythos3-h4">
                            <?php echo wp_kses_post($content['ratten-mythos3-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="ratten-mythos3-p1">
                            <?php echo wp_kses_post($content['ratten-mythos3-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="✨" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="ratten-mythos3-infobox-titel">
                                <?php echo wp_kses_post($content['ratten-mythos3-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-14">
            <?php echo wp_kses_post($content['kleintiere-liste-14'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="ratten-mythos3-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['ratten-mythos3-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="ratten-mythos4-header">
                            <?php echo wp_kses_post($content['ratten-mythos4-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="ratten-mythos4-h4">
                            <?php echo wp_kses_post($content['ratten-mythos4-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="ratten-mythos4-p1">
                            <?php echo wp_kses_post($content['ratten-mythos4-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="👥" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="ratten-mythos4-infobox-titel">
                                <?php echo wp_kses_post($content['ratten-mythos4-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-15">
            <?php echo wp_kses_post($content['kleintiere-liste-15'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="ratten-mythos4-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['ratten-mythos4-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="ratten-fakten-titel">
                    <?php echo wp_kses_post($content['ratten-fakten-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-16">
            <?php echo wp_kses_post($content['kleintiere-liste-16'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4 class="editable" data-key="ratten-herkunft-titel">
                    <?php echo wp_kses_post($content['ratten-herkunft-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-17">
            <?php echo wp_kses_post($content['kleintiere-liste-17'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box love" data-emoji="❤️">
                <h4 class="editable" data-key="ratten-charakter-titel">
                    <?php echo wp_kses_post($content['ratten-charakter-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="ratten-charakter-p1" style="font-size: 1.2rem;">
                    <?php echo wp_kses_post($content['ratten-charakter-p1'] ?? ''); ?>
                </p>
            </div>
        </div>

        <!-- Tab Content: Degus & Chinchillas -->
        <div class="tab-panel" data-tab="degus">
            <h3 class="editable" data-key="degus-titel" style="text-align: center; margin-bottom: 30px; font-size: 2rem;">
                <?php echo wp_kses_post($content['degus-titel'] ?? ''); ?>
            </h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="degus-mythos1-header">
                            <?php echo wp_kses_post($content['degus-mythos1-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="degus-mythos1-h4">
                            <?php echo wp_kses_post($content['degus-mythos1-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="degus-mythos1-p1">
                            <?php echo wp_kses_post($content['degus-mythos1-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="degus-mythos1-infobox-titel">
                                <?php echo wp_kses_post($content['degus-mythos1-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-18">
            <?php echo wp_kses_post($content['kleintiere-liste-18'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="degus-mythos1-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['degus-mythos1-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="degus-mythos2-header">
                            <?php echo wp_kses_post($content['degus-mythos2-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="degus-mythos2-h4">
                            <?php echo wp_kses_post($content['degus-mythos2-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="degus-mythos2-p1">
                            <?php echo wp_kses_post($content['degus-mythos2-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="👥" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p class="editable" data-key="degus-mythos2-infobox-titel">
                                <?php echo wp_kses_post($content['degus-mythos2-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-19">
            <?php echo wp_kses_post($content['kleintiere-liste-19'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="degus-mythos2-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['degus-mythos2-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="degus-mythos3-header">
                            <?php echo wp_kses_post($content['degus-mythos3-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="degus-mythos3-h4">
                            <?php echo wp_kses_post($content['degus-mythos3-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="degus-mythos3-p1">
                            <?php echo wp_kses_post($content['degus-mythos3-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="💀" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p class="editable" data-key="degus-mythos3-infobox-titel">
                                <?php echo wp_kses_post($content['degus-mythos3-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-20">
            <?php echo wp_kses_post($content['kleintiere-liste-20'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="degus-mythos3-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['degus-mythos3-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="editable" data-key="degus-mythos4-header">
                            <?php echo wp_kses_post($content['degus-mythos4-header'] ?? ''); ?>
                        </span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4 class="editable" data-key="degus-mythos4-h4">
                            <?php echo wp_kses_post($content['degus-mythos4-h4'] ?? ''); ?>
                        </h4>
                        <p class="editable" data-key="degus-mythos4-p1">
                            <?php echo wp_kses_post($content['degus-mythos4-p1'] ?? ''); ?>
                        </p>
                        <div class="info-box" data-emoji="🎯" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p class="editable" data-key="degus-mythos4-infobox-titel">
                                <?php echo wp_kses_post($content['degus-mythos4-infobox-titel'] ?? ''); ?>
                            </p>
                            <ul class="editable" data-key="kleintiere-liste-21">
            <?php echo wp_kses_post($content['kleintiere-liste-21'] ?? ''); ?>
        </ul>
                        </div>
                        <p class="editable" data-key="degus-mythos4-p2" style="margin-top: 15px;">
                            <?php echo wp_kses_post($content['degus-mythos4-p2'] ?? ''); ?>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4 class="editable" data-key="degus-fakten-titel">
                    <?php echo wp_kses_post($content['degus-fakten-titel'] ?? ''); ?>
                </h4>
                <ul class="editable" data-key="kleintiere-liste-22">
            <?php echo wp_kses_post($content['kleintiere-liste-22'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box warning" data-emoji="⏰">
                <h4 class="editable" data-key="degus-anforderungen-titel">
                    <?php echo wp_kses_post($content['degus-anforderungen-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="degus-anforderungen-degus-titel">
                    <?php echo wp_kses_post($content['degus-anforderungen-degus-titel'] ?? ''); ?>
                </p>
                <ul class="editable" data-key="kleintiere-liste-23">
            <?php echo wp_kses_post($content['kleintiere-liste-23'] ?? ''); ?>
        </ul>
                <p class="editable" data-key="degus-anforderungen-chinchillas-titel" style="margin-top: 20px;">
                    <?php echo wp_kses_post($content['degus-anforderungen-chinchillas-titel'] ?? ''); ?>
                </p>
                <ul class="editable" data-key="kleintiere-liste-24">
            <?php echo wp_kses_post($content['kleintiere-liste-24'] ?? ''); ?>
        </ul>
            </div>

            <div class="info-box love" data-emoji="⚠️">
                <h4 class="editable" data-key="degus-probleme-titel">
                    <?php echo wp_kses_post($content['degus-probleme-titel'] ?? ''); ?>
                </h4>
                <p class="editable" data-key="degus-probleme-p1">
                    <?php echo wp_kses_post($content['degus-probleme-p1'] ?? ''); ?>
                </p>
            </div>
        </div>
    </div>

</section>

<?php
// Add page slug for edit mode
if (current_user_can('edit_posts')) {
    echo '';
}
?>

<?php get_template_part('tierliebe-parts/footer'); ?>
