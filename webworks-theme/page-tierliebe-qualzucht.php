<?php
/**
 * Template Name: Tierliebe - Qualzucht
 * Template Post Type: page
 * Description: Überzüchtung - 8 Rassen mit Bildern
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');

// DEBUG: Check what post we're looking for
if (current_user_can('edit_posts')) {
    $test_query = new WP_Query(array(
        'post_type'      => 'tierliebe_text',
        'name'           => 'qualzucht',
        'posts_per_page' => 1,
        'post_status'    => 'publish'
    ));
    echo "<!-- DEBUG: Query found posts: " . $test_query->found_posts . " -->";
    if ($test_query->have_posts()) {
        $test_query->the_post();
        $test_post = get_post();
        echo "<!-- DEBUG: Post ID: " . $test_post->ID . ", Slug: " . $test_post->post_name . " -->";
        echo "<!-- DEBUG: Content length: " . strlen($test_post->post_content) . " -->";
        echo "<!-- DEBUG: First 200 chars (escaped): " . esc_html(substr($test_post->post_content, 0, 200)) . " -->";
        echo "<!-- DEBUG: First 200 chars (raw): " . substr($test_post->post_content, 0, 200) . " -->";
        wp_reset_postdata();
    } else {
        echo "<!-- DEBUG: NO POST FOUND WITH SLUG 'qualzucht' -->";
    }
}

$content = get_tierliebe_text('qualzucht');

// DEBUG OUTPUT
if (current_user_can('edit_posts')) {
    echo "<!-- DEBUG: Content keys: " . implode(', ', array_keys($content)) . " -->";
    if (isset($content['hero-titel'])) {
        echo "<!-- DEBUG: hero-titel = " . esc_html($content['hero-titel']) . " -->";
    }
}
?>

<!-- Hidden Page Slug for Editor -->


<!-- Hero Section -->
<section class="primary-hero" style="min-height: 60vh;">
    <div class="hero-content">
        <h1 class="hero-title editable" data-key="hero-titel"><?php echo wp_kses_post($content['hero-titel'] ?? ''); ?></h1>
        <p class="hero-subtitle editable" data-key="hero-subtitle"><?php echo wp_kses_post($content['hero-subtitle'] ?? ''); ?></p>
    </div>
</section>

<!-- Definition -->
<section class="section">
    <div class="container">
        <div class="info-box" style="background: var(--pastel-coral); color: white; padding: 40px; margin-bottom: 50px;">
            <h2 class="editable" data-key="definition-titel" style="color: white; margin-bottom: 20px;"><?php echo wp_kses_post($content['definition-titel'] ?? ''); ?></h2>
            <p class="editable" data-key="definition-text" style="font-size: 1.2rem; line-height: 1.8;">
                <?php echo wp_kses_post($content['definition-text'] ?? ''); ?>
            </p>

            <h3 class="editable" data-key="warum-titel" style="color: white; margin-top: 30px; margin-bottom: 15px;"><?php echo wp_kses_post($content['warum-titel'] ?? ''); ?></h3>
            <ul class="editable" data-key="warum-liste" style="font-size: 1.1rem; line-height: 1.8;">
                <?php echo wp_kses_post($content['warum-liste'] ?? ''); ?>
            </ul>

            <h3 class="editable" data-key="problem-titel" style="color: white; margin-top: 30px; margin-bottom: 15px;"><?php echo wp_kses_post($content['problem-titel'] ?? ''); ?></h3>
            <ul class="editable" data-key="problem-liste" style="font-size: 1.1rem; line-height: 1.8;">
                <?php echo wp_kses_post($content['problem-liste'] ?? ''); ?>
            </ul>

            <p class="editable" data-key="definition-quote" style="font-size: 1.4rem; margin-top: 40px; font-weight: 700; text-align: center;">
                <?php echo wp_kses_post($content['definition-quote'] ?? ''); ?>
            </p>
        </div>

        <h2 class="section-title editable" data-key="rassen-titel" style="text-align: center; margin-bottom: 50px;"><?php echo wp_kses_post($content['rassen-titel'] ?? ''); ?></h2>

        <!-- Rassen Grid -->
        <div class="qualzucht-grid">

            <!-- Rasse 1: Mops & Französische Bulldogge -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
                    $img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_1', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Mops & Französische Bulldogge', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1599744615638-804deec726e7-scaled.jpg" alt="Mops & Französische Bulldogge" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon editable" data-key="rasse1-icon"><?php echo wp_kses_post($content['rasse1-icon'] ?? ''); ?></div>
                    <h3 class="editable" data-key="rasse1-titel"><?php echo wp_kses_post($content['rasse1-titel'] ?? ''); ?></h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse1-herkunft"><?php echo wp_kses_post($content['rasse1-herkunft'] ?? ''); ?></p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse1-leiden-titel"><?php echo wp_kses_post($content['rasse1-leiden-titel'] ?? ''); ?></h4>
                        <ul class="editable" data-key="rasse1-leiden-liste">
                            <?php echo wp_kses_post($content['rasse1-leiden-liste'] ?? ''); ?>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse1-wissen">
                        <?php echo wp_kses_post($content['rasse1-wissen'] ?? ''); ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 2: Perserkatze -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_2', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Perserkatze', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1512356587788-4f5ad49c16e9-scaled.jpg" alt="Perserkatze" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon editable" data-key="rasse2-icon"><?php echo wp_kses_post($content['rasse2-icon'] ?? ''); ?></div>
                    <h3 class="editable" data-key="rasse2-titel"><?php echo wp_kses_post($content['rasse2-titel'] ?? ''); ?></h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse2-herkunft"><?php echo wp_kses_post($content['rasse2-herkunft'] ?? ''); ?></p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse2-leiden-titel"><?php echo wp_kses_post($content['rasse2-leiden-titel'] ?? ''); ?></h4>
                        <ul class="editable" data-key="rasse2-leiden-liste">
                            <?php echo wp_kses_post($content['rasse2-leiden-liste'] ?? ''); ?>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse2-wissen">
                        <?php echo wp_kses_post($content['rasse2-wissen'] ?? ''); ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 3: Schauwellensittich -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_3', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Schauwellensittich', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1720423755825-d5606544e6b7-scaled.jpg" alt="Schauwellensittich" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon editable" data-key="rasse3-icon"><?php echo wp_kses_post($content['rasse3-icon'] ?? ''); ?></div>
                    <h3 class="editable" data-key="rasse3-titel"><?php echo wp_kses_post($content['rasse3-titel'] ?? ''); ?></h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse3-herkunft"><?php echo wp_kses_post($content['rasse3-herkunft'] ?? ''); ?></p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse3-leiden-titel"><?php echo wp_kses_post($content['rasse3-leiden-titel'] ?? ''); ?></h4>
                        <ul class="editable" data-key="rasse3-leiden-liste">
                            <?php echo wp_kses_post($content['rasse3-leiden-liste'] ?? ''); ?>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse3-wissen">
                        <?php echo wp_kses_post($content['rasse3-wissen'] ?? ''); ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 4: Widderkaninchen -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_4', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Widderkaninchen', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1649007985567-fe6ce04680d3-scaled.jpg" alt="Widderkaninchen" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon editable" data-key="rasse4-icon"><?php echo wp_kses_post($content['rasse4-icon'] ?? ''); ?></div>
                    <h3 class="editable" data-key="rasse4-titel"><?php echo wp_kses_post($content['rasse4-titel'] ?? ''); ?></h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse4-herkunft"><?php echo wp_kses_post($content['rasse4-herkunft'] ?? ''); ?></p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse4-leiden-titel"><?php echo wp_kses_post($content['rasse4-leiden-titel'] ?? ''); ?></h4>
                        <ul class="editable" data-key="rasse4-leiden-liste">
                            <?php echo wp_kses_post($content['rasse4-leiden-liste'] ?? ''); ?>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse4-wissen">
                        <?php echo wp_kses_post($content['rasse4-wissen'] ?? ''); ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 5: Schleierschwanz-Goldfisch -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_5', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Schleierschwanz-Goldfisch', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1650290145779-e05602773fc7-scaled.jpg" alt="Schleierschwanz-Goldfisch" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon editable" data-key="rasse5-icon"><?php echo wp_kses_post($content['rasse5-icon'] ?? ''); ?></div>
                    <h3 class="editable" data-key="rasse5-titel"><?php echo wp_kses_post($content['rasse5-titel'] ?? ''); ?></h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse5-herkunft"><?php echo wp_kses_post($content['rasse5-herkunft'] ?? ''); ?></p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse5-leiden-titel"><?php echo wp_kses_post($content['rasse5-leiden-titel'] ?? ''); ?></h4>
                        <ul class="editable" data-key="rasse5-leiden-liste">
                            <?php echo wp_kses_post($content['rasse5-leiden-liste'] ?? ''); ?>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse5-wissen">
                        <?php echo wp_kses_post($content['rasse5-wissen'] ?? ''); ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 6: Albino-Reptilien -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_6', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Albino-Reptilien', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1639648702729-395a9b8b1133-scaled.jpg" alt="Albino-Reptilien" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon editable" data-key="rasse6-icon"><?php echo wp_kses_post($content['rasse6-icon'] ?? ''); ?></div>
                    <h3 class="editable" data-key="rasse6-titel"><?php echo wp_kses_post($content['rasse6-titel'] ?? ''); ?></h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse6-herkunft"><?php echo wp_kses_post($content['rasse6-herkunft'] ?? ''); ?></p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse6-leiden-titel"><?php echo wp_kses_post($content['rasse6-leiden-titel'] ?? ''); ?></h4>
                        <ul class="editable" data-key="rasse6-leiden-liste">
                            <?php echo wp_kses_post($content['rasse6-leiden-liste'] ?? ''); ?>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse6-wissen">
                        <?php echo wp_kses_post($content['rasse6-wissen'] ?? ''); ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 7: Malteser & Zwerghunde -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_7', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Malteser & Zwerghunde', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1587300003388-59208cc962cb-scaled.jpg" alt="Malteser & Zwerghunde" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon editable" data-key="rasse7-icon"><?php echo wp_kses_post($content['rasse7-icon'] ?? ''); ?></div>
                    <h3 class="editable" data-key="rasse7-titel"><?php echo wp_kses_post($content['rasse7-titel'] ?? ''); ?></h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse7-herkunft"><?php echo wp_kses_post($content['rasse7-herkunft'] ?? ''); ?></p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse7-leiden-titel"><?php echo wp_kses_post($content['rasse7-leiden-titel'] ?? ''); ?></h4>
                        <ul class="editable" data-key="rasse7-leiden-liste">
                            <?php echo wp_kses_post($content['rasse7-leiden-liste'] ?? ''); ?>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse7-wissen">
                        <?php echo wp_kses_post($content['rasse7-wissen'] ?? ''); ?>
                    </div>
                </div>
            </div>

            <!-- Rasse 8: Scottish-Fold-Katze -->
            <div class="qualzucht-card">
                <div class="qualzucht-image">
                    <?php
$img_id = get_post_meta(get_the_ID(), 'qualzucht_bild_8', true);
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['alt' => 'Scottish-Fold-Katze', 'loading' => 'lazy']);
} else {
    echo '<img src="/wp-content/uploads/photo-1563210220-05f7b87c695c-scaled.jpg" alt="Scottish-Fold-Katze" loading="lazy" style="width:100%;height:100%;object-fit:cover;">';
}
?>
                </div>
                <div class="qualzucht-content">
                    <div class="qualzucht-icon editable" data-key="rasse8-icon"><?php echo wp_kses_post($content['rasse8-icon'] ?? ''); ?></div>
                    <h3 class="editable" data-key="rasse8-titel"><?php echo wp_kses_post($content['rasse8-titel'] ?? ''); ?></h3>
                    <p class="qualzucht-herkunft editable" data-key="rasse8-herkunft"><?php echo wp_kses_post($content['rasse8-herkunft'] ?? ''); ?></p>

                    <div class="qualzucht-leiden">
                        <h4 class="editable" data-key="rasse8-leiden-titel"><?php echo wp_kses_post($content['rasse8-leiden-titel'] ?? ''); ?></h4>
                        <ul class="editable" data-key="rasse8-leiden-liste">
                            <?php echo wp_kses_post($content['rasse8-leiden-liste'] ?? ''); ?>
                        </ul>
                    </div>

                    <div class="qualzucht-wissen editable" data-key="rasse8-wissen">
                        <?php echo wp_kses_post($content['rasse8-wissen'] ?? ''); ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="cta-section" style="margin-top: 80px; text-align: center;">
            <h3 class="editable" data-key="cta-titel" style="font-size: 2rem; margin-bottom: 25px;"><?php echo wp_kses_post($content['cta-titel'] ?? ''); ?></h3>
            <p class="editable" data-key="cta-text" style="font-size: 1.2rem; margin-bottom: 35px; color: var(--text-medium);"><?php echo wp_kses_post($content['cta-text'] ?? ''); ?></p>
            <a href="<?php echo home_url('/tierliebe-adoption'); ?>" class="btn btn-primary editable" data-key="cta-button" style="font-size: 1.2rem; padding: 18px 45px;">
                <?php echo wp_kses_post($content['cta-button'] ?? ''); ?>
            </a>
        </div>
    </div>
</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
