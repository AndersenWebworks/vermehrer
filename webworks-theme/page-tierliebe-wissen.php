<?php
/**
 * Template Name: Tierliebe - Wissen
 * Template Post Type: page
 * Description: Kastration, Männchen vs. Weibchen, Wenn's nicht klappt, Glossar
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');

$content = get_tierliebe_text('wissen');
?>

<!-- Hero Section -->
<section class="primary-hero" style="min-height: 50vh;">
    <div class="hero-content">
        <h1 class="hero-title editable" data-key="hero-titel"><?php echo wp_kses_post($content['hero-titel'] ?? ''); ?></h1>
        <p class="hero-subtitle editable" data-key="hero-subtitle"><?php echo wp_kses_post($content['hero-subtitle'] ?? ''); ?></p>
    </div>
</section>

<!-- Tabs Section -->
<section class="section">
    <div class="container">
        <!-- Main Tabs -->
        <div class="tab-container">
            <div class="tab-buttons">
                <button class="tab-btn active" data-tab="kastration"><span class="editable" data-key="tab-1-button"><?php echo esc_html(strip_tags($content['tab-1-button'] ?? '')); ?></span></button>
                <button class="tab-btn" data-tab="geschlechter"><span class="editable" data-key="tab-2-button"><?php echo esc_html(strip_tags($content['tab-2-button'] ?? '')); ?></span></button>
                <button class="tab-btn" data-tab="notfall"><span class="editable" data-key="tab-3-button"><?php echo isset($content['tab-3-button']) ? esc_html(strip_tags($content['tab-3-button'])) : 'Wenn\'s nicht klappt'; ?></span></button>
                <button class="tab-btn" data-tab="glossar"><span class="editable" data-key="tab-4-button"><?php echo esc_html(strip_tags($content['tab-4-button'] ?? '')); ?></span></button>
            </div>

            <!-- Tab Content 1: Kastration -->
            <div class="tab-content active" id="tab-kastration">
                <h2 class="editable" data-key="kastration-titel" style="margin-bottom: 30px;"><?php echo wp_kses_post($content['kastration-titel'] ?? ''); ?></h2>

                <div class="info-box warning" data-emoji="⚠️" style="background: var(--pastel-mint); margin-bottom: 40px;">
                    <p class="editable" data-key="kastration-intro" style="font-size: 1.2rem; line-height: 1.8;">
                        <?php echo wp_kses_post($content['kastration-intro'] ?? ''); ?>
                    </p>
                </div>

                <div class="accordion">
                    <div class="accordion-item">
                        <button class="accordion-header">
                            <span>⚠️ <span class="editable" data-key="kastration-acc-1-header"><?php echo esc_html(strip_tags($content['kastration-acc-1-header'] ?? '')); ?></span></span>
                            <span class="accordion-icon">+</span>
                        </button>
                        <div class="accordion-content">
                            <h4>Rüden & Kater:</h4>
                            <ul class="editable" data-key="wissen-liste-1">
            <?php echo wp_kses_post($content['wissen-liste-1'] ?? ''); ?>
        </ul>

                            <h4 style="margin-top: 25px;">Hündinnen & Katzen:</h4>
                            <ul class="editable" data-key="wissen-liste-2">
            <?php echo wp_kses_post($content['wissen-liste-2'] ?? ''); ?>
        </ul>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-header">
                            <span>⏰ <span class="editable" data-key="kastration-acc-2-header"><?php echo esc_html(strip_tags($content['kastration-acc-2-header'] ?? '')); ?></span></span>
                            <span class="accordion-icon">+</span>
                        </button>
                        <div class="accordion-content">
                            <h4>Frühkastration (4–6 Monate):</h4>
                            <p><strong>Vorteile:</strong> Verhindert rechtzeitig unerwünschte Trächtigkeit, kein Stress durch Rolligkeit, leichtere Operation</p>
                            <p><strong>Nachteile:</strong> Hormonhaushalt noch nicht vollständig entwickelt, kann bei großen Hunden Knochenwachstum beeinflussen</p>

                            <h4 style="margin-top: 25px;">Spätkastration (nach Geschlechtsreife):</h4>
                            <p><strong>Vorteile:</strong> Vollständige natürliche Entwicklung, Verhalten besser einschätzbar</p>
                            <p><strong>Nachteile:</strong> Gefahr dass Tier sich bereits vermehrt hat, Markieren/Aggression bereits ausgeprägt</p>

                            <div class="info-box info" data-emoji="💡" style="margin-top: 25px; background: var(--pastel-lavender);">
                                <strong>Empfehlung:</strong>
                                <ul class="editable" data-key="wissen-liste-3" style="margin-top: 10px;">
            <?php echo wp_kses_post($content['wissen-liste-3'] ?? ''); ?>
        </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-header">
                            <span>💰 <span class="editable" data-key="kastration-acc-3-header"><?php echo esc_html(strip_tags($content['kastration-acc-3-header'] ?? '')); ?></span></span>
                            <span class="accordion-icon">+</span>
                        </button>
                        <div class="accordion-content">
                            <p><strong>Viele glauben, Kastration sei "teuer".</strong><br>
                            Aber: Ein einziger Wurf mit Komplikationen kostet oft mehr!</p>

                            <ul class="editable" data-key="wissen-liste-4" style="margin-top: 20px;">
            <?php echo wp_kses_post($content['wissen-liste-4'] ?? ''); ?>
        </ul>

                            <p style="margin-top: 25px; font-size: 1.1rem;"><strong>FAUSTREGEL:</strong> Jede nicht kastrierte Katze kann in nur 2 Jahren über 80 Nachkommen haben!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content 2: Geschlechter (wird wegen Länge gekürzt, Kernaussagen) -->
            <div class="tab-content" id="tab-geschlechter">
                <h2 class="editable" data-key="geschlechter-titel" style="margin-bottom: 30px;"><?php echo wp_kses_post($content['geschlechter-titel'] ?? ''); ?></h2>

                <p class="editable" data-key="geschlechter-intro" style="font-size: 1.1rem; margin-bottom: 40px;">
                    <?php echo wp_kses_post($content['geschlechter-intro'] ?? ''); ?>
                </p>

                <!-- Sub-Tabs für Tierarten -->
                <div class="sub-tab-buttons">
                    <button class="sub-tab-btn active" data-subtab="katzen"><span class="editable" data-key="subtab-1-button"><?php echo esc_html(strip_tags($content['subtab-1-button'] ?? '')); ?></span></button>
                    <button class="sub-tab-btn" data-subtab="hunde"><span class="editable" data-key="subtab-2-button"><?php echo esc_html(strip_tags($content['subtab-2-button'] ?? '')); ?></span></button>
                    <button class="sub-tab-btn" data-subtab="kleintiere"><span class="editable" data-key="subtab-3-button"><?php echo esc_html(strip_tags($content['subtab-3-button'] ?? '')); ?></span></button>
                </div>

                <!-- Katzen Sub-Tab -->
                <div class="sub-tab-content active" id="subtab-katzen">
                    <h3>🐱 Kater vs. Katze</h3>
                    <div class="comparison-table">
                        <div class="comparison-col">
                            <h4>Kater</h4>
                            <ul class="editable" data-key="wissen-liste-5">
            <?php echo wp_kses_post($content['wissen-liste-5'] ?? ''); ?>
        </ul>
                        </div>
                        <div class="comparison-col">
                            <h4>Katze</h4>
                            <ul class="editable" data-key="wissen-liste-6">
            <?php echo wp_kses_post($content['wissen-liste-6'] ?? ''); ?>
        </ul>
                        </div>
                    </div>
                </div>

                <!-- Hunde Sub-Tab -->
                <div class="sub-tab-content" id="subtab-hunde">
                    <h3>🐕 Rüde vs. Hündin</h3>
                    <div class="comparison-table">
                        <div class="comparison-col">
                            <h4>Rüde</h4>
                            <ul class="editable" data-key="wissen-liste-7">
            <?php echo wp_kses_post($content['wissen-liste-7'] ?? ''); ?>
        </ul>
                        </div>
                        <div class="comparison-col">
                            <h4>Hündin</h4>
                            <ul class="editable" data-key="wissen-liste-8">
            <?php echo wp_kses_post($content['wissen-liste-8'] ?? ''); ?>
        </ul>
                        </div>
                    </div>
                </div>

                <!-- Kleintiere Sub-Tab (Kurzfassung) -->
                <div class="sub-tab-content" id="subtab-kleintiere">
                    <h3>🐰 Kaninchen, Wellensittiche & Meerschweinchen</h3>

                    <div class="info-card" style="margin-bottom: 25px;">
                        <h4>Kaninchen (Rammler vs. Häsin)</h4>
                        <p><strong>Rammler:</strong> Neugierig, territorial • <strong>Häsin:</strong> Ruhiger, aber bei Rangkämpfen aggressiv</p>
                        <p><strong>Wichtig:</strong> Unkastrierte Häsinnen haben 50–80% Risiko für Gebärmuttertumore!</p>
                    </div>

                    <div class="info-card" style="margin-bottom: 25px;">
                        <h4>Wellensittiche (Hahn vs. Henne)</h4>
                        <p><strong>Hahn:</strong> Gesprächiger, lernfreudiger • <strong>Henne:</strong> Ruhiger, territorialer (Brutverhalten)</p>
                        <p><strong>Wichtig:</strong> Hennen können bei Dauerbrutigkeit Legenot erleiden (20–30%)</p>
                    </div>

                    <div class="info-card">
                        <h4>Meerschweinchen (Bock vs. Sau)</h4>
                        <p><strong>Bock:</strong> Zutraulicher, kann untereinander streiten • <strong>Sau:</strong> Geselliger, lebt lieber in Gruppen</p>
                        <p><strong>Wichtig:</strong> Unkastrierte Sauen haben 20–50% Risiko für Eierstockzysten</p>
                    </div>
                </div>

                <div class="info-box info" data-emoji="📊" style="margin-top: 40px; background: var(--pastel-peach);">
                    <h4 class="editable" data-key="geschlechter-box-titel"><?php echo esc_html(strip_tags($content['geschlechter-box-titel'] ?? '')); ?></h4>
                    <p class="editable" data-key="geschlechter-box-text1"><?php echo wp_kses_post($content['geschlechter-box-text1'] ?? ''); ?></p>
                    <p class="editable" data-key="geschlechter-box-text2" style="margin-top: 15px;"><?php echo wp_kses_post($content['geschlechter-box-text2'] ?? ''); ?></p>
                </div>
            </div>

            <!-- Tab Content 3: Wenn's nicht klappt -->
            <div class="tab-content" id="tab-notfall">
                <h2 class="editable" data-key="notfall-titel" style="margin-bottom: 30px;"><?php echo wp_kses_post($content['notfall-titel'] ?? ''); ?></h2>

                <p class="editable" data-key="notfall-intro" style="font-size: 1.1rem; margin-bottom: 40px;">
                    <?php echo wp_kses_post($content['notfall-intro'] ?? ''); ?>
                </p>

                <div class="comparison-grid" style="grid-template-columns: 1fr 1fr;">
                    <div class="comparison-panel panel-danger">
                        <div class="panel-header">
                            <span class="panel-icon">❌</span>
                            <h3 class="editable" data-key="notfall-panel-1-titel"><?php echo esc_html(strip_tags($content['notfall-panel-1-titel'] ?? '')); ?></h3>
                        </div>
                        <div class="panel-content">
                            <ul class="editable panel-list" data-key="wissen-liste-9">
            <?php echo wp_kses_post($content['wissen-liste-9'] ?? ''); ?>
        </ul>
                        </div>
                    </div>

                    <div class="comparison-panel panel-success">
                        <div class="panel-header">
                            <span class="panel-icon">✅</span>
                            <h3 class="editable" data-key="notfall-panel-2-titel"><?php echo esc_html(strip_tags($content['notfall-panel-2-titel'] ?? '')); ?></h3>
                        </div>
                        <div class="panel-content">
                            <ul class="editable panel-list" data-key="wissen-liste-10">
            <?php echo wp_kses_post($content['wissen-liste-10'] ?? ''); ?>
        </ul>
                        </div>
                    </div>
                </div>

                <div class="info-box love" data-emoji="💭" style="margin-top: 50px; background: var(--pastel-lavender);">
                    <h4 class="editable" data-key="notfall-box-titel"><?php echo wp_kses_post($content['notfall-box-titel'] ?? ''); ?></h4>
                    <p class="editable" data-key="notfall-box-text" style="font-size: 1.1rem; margin-top: 15px;">
                        <?php echo wp_kses_post($content['notfall-box-text'] ?? ''); ?>
                    </p>
                </div>
            </div>

            <!-- Tab Content 4: Glossar (Vollständige Version A-Z) -->
            <div class="tab-content" id="tab-glossar">
                <h2 class="editable" data-key="glossar-titel" style="margin-bottom: 30px;"><?php echo wp_kses_post($content['glossar-titel'] ?? ''); ?></h2>

                <div class="glossar-grid">
                    <?php
                    // Glossar-Items aus JSON-Array rendern
                    if (isset($content['glossar-items']) && is_array($content['glossar-items'])) {
                        foreach ($content['glossar-items'] as $item) {
                            if (isset($item['term']) && isset($item['definition'])) {
                                echo '<div class="glossar-item">';
                                echo '<h4>' . esc_html($item['term']) . '</h4>';
                                echo '<p>' . wp_kses_post($item['definition']) . '</p>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="cta-section" style="margin-top: 80px; text-align: center;">
            <h3 class="editable" data-key="cta-titel" style="font-size: 2rem; margin-bottom: 25px;"><?php echo wp_kses_post($content['cta-titel'] ?? ''); ?></h3>
            <a href="<?php echo home_url('/tierliebe-test'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 18px 45px;">
                <span class="editable" data-key="cta-button"><?php echo esc_html(strip_tags($content['cta-button'] ?? '')); ?></span>
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
