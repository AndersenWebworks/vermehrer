<?php
// Updated: 2025-10-29 - Modular CSS Architecture (v6.0.0) + Custom Walker

/* TIERLIEBE NAVIGATION MENU
_______________________________*/

// Register Tierliebe Navigation Menu
function tierliebe_register_menus()
{
    register_nav_menus(array(
        'tierliebe-main-menu' => 'Tierliebe Hauptmenü'
    ));
}
add_action('init', 'tierliebe_register_menus');

// Custom Walker for Tierliebe Navigation (bypasses YOOtheme/UIKit)
class Tierliebe_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // Start Level (wraps submenu in <ul class="sub-menu">)
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    // End Level
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start Element
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add has-children class if item has children
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-children';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}


/* TIERLIEBE QUIZ - INTEGRATION
_______________________________*/

// Tierliebe Quiz Shortcode direkt hier (ohne separate Datei)
function tierliebe_quiz_shortcode_new()
{
    ob_start();
    ?>
    <div class="quiz-container">
        <div class="quiz-intro">
            <h3>🌈 Bereit für die Wahrheit?</h3>
            <p>Dieser Test zeigt dir ehrlich, ob du bereit bist. Keine Beschönigung, keine Ausreden. Es geht nicht um Perfektion - sondern um Realität und echte Verantwortung. 💕</p>
        </div>

        <div class="progress-container">
            <p class="progress-label">Frage <span id="current-question">1</span> von 8</p>
            <div class="progress-bar">
                <div class="progress-fill" id="progress-fill" style="width: 12.5%">
                    <span class="progress-paw">🐾</span>
                </div>
            </div>
        </div>

        <form id="test-form">
            <div id="questions-container"></div>

            <div class="quiz-nav">
                <button type="button" id="prevBtn" class="btn btn-secondary hidden">
                    ← Zurück
                </button>
                <button type="button" id="nextBtn" class="btn btn-primary">
                    Weiter →
                </button>
                <button type="submit" id="submitBtn" class="btn btn-primary hidden">
                    Ergebnis anzeigen 🎉
                </button>
            </div>
        </form>
    </div>

    <div id="result" class="hidden">
        <div id="result-content"></div>
        <div style="text-align: center; margin-top: 50px;">
            <button class="btn btn-secondary" onclick="resetTest()">
                🔄 Test wiederholen
            </button>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tierliebe_quiz', 'tierliebe_quiz_shortcode_new');

// Enqueue Tierliebe Styles and Scripts
function tierliebe_enqueue_assets()
{
    // Check if we're on any Tierliebe template
    $is_tierliebe_template = is_page_template('page-tierliebe.php') ||
                              is_page_template('page-tierliebe-home.php') ||
                              is_page_template('page-tierliebe-test.php') ||
                              is_page_template('page-tierliebe-hunde.php') ||
                              is_page_template('page-tierliebe-katzen.php') ||
                              is_page_template('page-tierliebe-kleintiere.php') ||
                              is_page_template('page-tierliebe-exoten.php') ||
                              is_page_template('page-tierliebe-irrtuemer.php') ||
                              is_page_template('page-tierliebe-adoption.php') ||
                              is_page_template('page-tierliebe-qualzucht.php') ||
                              is_page_template('page-tierliebe-wissen.php') ||
                              is_page_template('page-tierliebe-kontakt.php');

    if ($is_tierliebe_template) {
        // Enqueue modular CSS files (v6.0.0 - Modular Architecture)

        // 1. Core (Variables, Reset, Base) - must load first
        wp_enqueue_style(
            'tierliebe-core',
            get_stylesheet_directory_uri() . '/css/tierliebe-core.css',
            array(),
            '6.0.0'
        );

        // 2. Layout (Hero, Sections, Containers)
        wp_enqueue_style(
            'tierliebe-layout',
            get_stylesheet_directory_uri() . '/css/tierliebe-layout.css',
            array('tierliebe-core'),
            '6.0.0'
        );

        // 3. Navigation (Header, Desktop & Mobile Nav)
        wp_enqueue_style(
            'tierliebe-navigation',
            get_stylesheet_directory_uri() . '/css/tierliebe-navigation.css',
            array('tierliebe-core'),
            '6.0.0'
        );

        // 4. Components (Accordion, Tabs, Buttons, Forms, etc.)
        wp_enqueue_style(
            'tierliebe-components',
            get_stylesheet_directory_uri() . '/css/tierliebe-components.css',
            array('tierliebe-core'),
            '6.0.0'
        );

        // 5. Pages (Page-specific styles)
        wp_enqueue_style(
            'tierliebe-pages',
            get_stylesheet_directory_uri() . '/css/tierliebe-pages.css',
            array('tierliebe-core', 'tierliebe-components'),
            '6.0.0'
        );

        // 6. Animations (Keyframes, Transitions)
        wp_enqueue_style(
            'tierliebe-animations',
            get_stylesheet_directory_uri() . '/css/tierliebe-animations.css',
            array('tierliebe-core'),
            '6.0.0'
        );

        // 7. Responsive (Media Queries) - must load last
        wp_enqueue_style(
            'tierliebe-responsive',
            get_stylesheet_directory_uri() . '/css/tierliebe-responsive.css',
            array('tierliebe-core', 'tierliebe-layout', 'tierliebe-navigation', 'tierliebe-components', 'tierliebe-pages'),
            '6.0.0'
        );

        // Enqueue jQuery (WordPress default)
        wp_enqueue_script('jquery');

        // Enqueue Mobile Menu
        wp_enqueue_script(
            'tierliebe-mobile-menu',
            get_stylesheet_directory_uri() . '/js/tierliebe-mobile-menu.js',
            array('jquery'),
            '2.0.0',
            true
        );

        // Enqueue Desktop Menu Enhancement
        wp_enqueue_script(
            'tierliebe-desktop-menu',
            get_stylesheet_directory_uri() . '/js/tierliebe-desktop-menu.js',
            array('jquery'),
            '1.0.0',
            true
        );

        // Enqueue Keyboard Navigation
        wp_enqueue_script(
            'tierliebe-keyboard-nav',
            get_stylesheet_directory_uri() . '/js/tierliebe-keyboard-nav.js',
            array('jquery'),
            '1.0.0',
            true
        );

        // Enqueue Tab Switcher
        wp_enqueue_script(
            'tierliebe-tabs',
            get_stylesheet_directory_uri() . '/js/tierliebe-tabs.js',
            array('jquery'),
            '1.0.0',
            true
        );

        // Enqueue Accordion
        wp_enqueue_script(
            'tierliebe-accordion',
            get_stylesheet_directory_uri() . '/js/tierliebe-accordion.js',
            array('jquery'),
            '1.0.0',
            true
        );

        // Enqueue Filter
        wp_enqueue_script(
            'tierliebe-filter',
            get_stylesheet_directory_uri() . '/js/tierliebe-filter.js',
            array('jquery'),
            '1.3.0',
            true
        );

        // Enqueue Gallery
        wp_enqueue_script(
            'tierliebe-gallery',
            get_stylesheet_directory_uri() . '/js/tierliebe-gallery.js',
            array('jquery'),
            '1.0.0',
            true
        );

        // Enqueue Quiz (only on test page)
        if (is_page_template('page-tierliebe.php') || is_page_template('page-tierliebe-test.php')) {
            wp_enqueue_script(
                'tierliebe-quiz',
                get_stylesheet_directory_uri() . '/js/tierliebe-quiz.js',
                array('jquery'),
                '1.0.0',
                true
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'tierliebe_enqueue_assets');

// TEMPLATE META BOX - Template-Auswahl im Classic Editor

// Template-Auswahl im Classic Editor aktivieren (YOOtheme deaktiviert das standardmäßig)
function enable_page_attributes_meta_box()
{
    add_post_type_support('page', 'page-attributes');
}
add_action('init', 'enable_page_attributes_meta_box');

// Template Dropdown im Classic Editor hinzufügen
function add_template_meta_box()
{
    add_meta_box(
        'page_template_meta_box',
        'Template',
        'render_template_meta_box',
        'page',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_template_meta_box');

// Template Dropdown rendern
function render_template_meta_box($post)
{
    $template = get_post_meta($post->ID, '_wp_page_template', true);

    wp_nonce_field('save_page_template', 'page_template_nonce');

    $templates = get_page_templates();

    echo '<select name="page_template" id="page_template" style="width: 100%;">';
    echo '<option value="default"' . selected($template, 'default', false) . '>Standard-Template</option>';

    foreach ($templates as $template_name => $template_file) {
        echo '<option value="' . esc_attr($template_file) . '"' . selected($template, $template_file, false) . '>';
        echo esc_html($template_name);
        echo '</option>';
    }

    echo '</select>';
    echo '<p class="description">Wähle ein Template für diese Seite.</p>';
}

// Template beim Speichern der Seite speichern
function save_template_meta_box($post_id)
{
    if (!isset($_POST['page_template_nonce']) || !wp_verify_nonce($_POST['page_template_nonce'], 'save_page_template')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_page', $post_id)) {
        return;
    }

    if (isset($_POST['page_template'])) {
        update_post_meta($post_id, '_wp_page_template', sanitize_text_field($_POST['page_template']));
    }
}
add_action('save_post_page', 'save_template_meta_box');


/* REMOVE BLOCK LIBRARY
_______________________________*/
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);



/* DISABLE EMOJIS
_______________________________*/

function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/*filter function used to remove the tinymce emoji plugin. */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array( 'wpemoji' ));
    } else {
        return array();
    }
}

/* remove emoji CDN hostname from DNS prefetching hints.  */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff($urls, array( $emoji_svg_url ));
    }
    return $urls;
}



/* DISABLE ADMIN BAR
_______________________________*/

add_filter('show_admin_bar', '__return_false');


/* TIERLIEBE EDITABLE TEXTS SYSTEM
_______________________________*/

// NOTE: CPT 'tierliebe_text' removed - system now uses WordPress Pages directly
// Content stored as JSON in page post_content field

// Normalize WordPress-modified quotes inside JSON blobs
function tierliebe_normalize_json_quotes($string)
{
    // WordPress + editors tend to convert straight quotes to typographic variants.
    // Convert every double-quote variant back so json_decode can run safely.
    $double_quote_variants = array('′', '“', '”', '„', '‟', '«', '»', '‹', '›');
    return str_replace($double_quote_variants, '"', $string);
}

// Resolve renamed/missing keys between legacy structures and new content keys
function tierliebe_get_content_value($key, $tag, $content)
{
    if (isset($content[$key]) && $content[$key] !== '') {
        return $content[$key];
    }

    static $alias_map = array(
        'sektion-bin-ich-bereit-fur-ein-tier' => array(
            'h2' => 'sektion-bin-ich-bereit-titel',
            'p'  => 'sektion-bin-ich-bereit-text',
            '*'  => 'sektion-bin-ich-bereit-text'
        ),
        'section-titel'     => 'header-titel',
        'section-subtitle'  => 'einleitungstext',
        'section-frage'     => 'zentrale-frage',
        'responsibility-text' => 'info-box'
    );

    if (isset($alias_map[$key])) {
        $alias = $alias_map[$key];
        if (is_array($alias)) {
            $candidate = $alias[$tag] ?? ($alias['*'] ?? null);
        } else {
            $candidate = $alias;
        }

        if ($candidate && isset($content[$candidate]) && $content[$candidate] !== '') {
            return $content[$candidate];
        }
    }

    // Hard-coded defaults for legacy structures that lost content keys
    if ($key === 'sektion-bin-ich-bereit-fur-ein-tier') {
        return ($tag === 'h2')
            ? 'Bin ich bereit für ein Tier?'
            : 'Du denkst darüber nach, ein Tier aufzunehmen? Dann nimm dir bitte kurz Zeit für diese Fragen – ganz ehrlich, nur für dich. Denn ein Tier ist keine Phase. Es ist ein Teil deines Lebens – und komplett abhängig von dir.';
    }

    return null;
}

// Render Dynamic HTML Structure (if available)
function render_tierliebe_dynamic_structure()
{
    global $post;

    if (!$post || $post->post_type !== 'page') {
        error_log('TIERLIEBE RENDER: No post or not a page');
        return false;
    }

    $post_id = $post->ID;
    error_log('TIERLIEBE RENDER: Post ID = ' . $post_id);

    // FULL PAGE BUILDER: Try NEW format first (structure in post_content)
    // This enables WordPress Revisions to track structure changes!
    $content = $post->post_content;
    $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // If the JSON is still wrapped in safety markers, extract it before decoding
    if (strpos($content, '<!--TIERLIEBE_HTML_START-->') !== false && preg_match('/<!--TIERLIEBE_HTML_START-->(.*)<!--TIERLIEBE_HTML_END-->/s', $content, $matches)) {
        $content = $matches[1];
    }

    $content = trim($content); // Remove leading/trailing whitespace
    // CRITICAL: Normalize any typographic quotes back to straight quotes before decoding
    $content = tierliebe_normalize_json_quotes($content);
    $parsed = json_decode($content, true);

    $structure_data = null;

    // Check if NEW format: { keys: {...}, _structure: [...] }
    if (is_array($parsed) && isset($parsed['_structure']) && is_array($parsed['_structure'])) {
        error_log('TIERLIEBE RENDER: Using NEW format (structure from post_content)');
        $structure_data = $parsed['_structure'];
    } else {
        // FALLBACK: OLD format (structure in meta-field)
        error_log('TIERLIEBE RENDER: NEW format not found, trying OLD format (meta-field)');

        // Bypass cache - get directly from DB
        global $wpdb;
        $html_structure = $wpdb->get_var($wpdb->prepare(
            "SELECT meta_value FROM $wpdb->postmeta WHERE post_id = %d AND meta_key = '_tierliebe_html_structure' ORDER BY meta_id DESC LIMIT 1",
            $post_id
        ));
        error_log('TIERLIEBE RENDER: Meta value length (direct DB) = ' . strlen($html_structure));

        if (empty($html_structure)) {
            error_log('TIERLIEBE RENDER: Meta field is EMPTY - returning FALSE');
            return false; // No dynamic structure saved
        }

        // WordPress may have serialized the data - try to unserialize first
        if (is_serialized($html_structure)) {
            $html_structure = maybe_unserialize($html_structure);
            error_log('TIERLIEBE RENDER: Unserialized data, new length = ' . strlen($html_structure));
        }

        $structure_data = json_decode($html_structure, true);
        error_log('TIERLIEBE RENDER: JSON decode result: ' . (is_array($structure_data) ? count($structure_data) . ' elements' : 'FAILED'));
    }

    if (!is_array($structure_data) || empty($structure_data)) {
        error_log('TIERLIEBE RENDER: JSON Error: ' . json_last_error_msg());
        error_log('TIERLIEBE RENDER: Invalid or empty structure - returning FALSE');
        return false;
    }

    // Get content data for replacing placeholders
    $content = get_tierliebe_text();

    error_log('TIERLIEBE RENDER: Rendering ' . count($structure_data) . ' top-level elements');

    // FULL PAGE BUILDER: Render top-level elements directly (NO wrapper!)
    // Each element is complete (hero, section, grid, etc.)
    foreach ($structure_data as $index => $element) {
        if (!isset($element['html'])) {
            error_log('TIERLIEBE RENDER: Element ' . $index . ' has no HTML');
            continue;
        }

        $html = $element['html'];
        // Normalize quotes that were converted to prime symbols inside stored HTML
        $html = str_replace(['′', '“', '”'], ['\'', '"', '"'], $html);

        // CRITICAL: Remove leading <br /> and <p></p> tags that WordPress adds
        // Only remove the tags themselves and immediately following whitespace, nothing more
        $html = preg_replace('/^(?:<br\s*\/?>|<p>\s*<\/p>)\s*/s', '', $html);

        // Simple regex-based content replacement (NO DOMDocument - too error-prone)
        // Find all data-key attributes and replace content
        // This works recursively - replaces ALL data-keys in nested elements too
        $html = preg_replace_callback(
            '/<([a-z][a-z0-9]*)\s+([^>]*?data-key="([^"]+)"[^>]*)>(.*?)<\/\1>/is',
            function ($matches) use ($content) {
                $tag = $matches[1];
                $attributes = $matches[2];
                $key = $matches[3];
                $old_content = $matches[4];

                // Get content for this key, fallback to old content
                $new_content = tierliebe_get_content_value($key, $tag, $content);
                if ($new_content === null) {
                    $new_content = $old_content;
                }

                // Add editable class if not present
                if (strpos($attributes, 'editable') === false && strpos($attributes, 'class=') !== false) {
                    $attributes = preg_replace('/class="([^"]*)"/', 'class="$1 editable"', $attributes);
                } elseif (strpos($attributes, 'class=') === false) {
                    $attributes .= ' class="editable"';
                }

                return '<' . $tag . ' ' . $attributes . '>' . $new_content . '</' . $tag . '>';
            },
            $html
        );

        // Render element directly (no wrapper)
        echo $html . "\n";
        error_log('TIERLIEBE RENDER: Element ' . $index . ' (' . ($element['tagName'] ?? 'unknown') . '.' . substr($element['class'] ?? '', 0, 30) . ') rendered (' . strlen($html) . ' bytes)');
    }

    error_log('TIERLIEBE RENDER: Rendering complete - ' . count($structure_data) . ' elements');
    return true;
}

// Get Tierliebe Text Content by Page Slug
function get_tierliebe_text($page_slug = null)
{
    // NEW v3 parser (early return)
    {
        global $post;
        if (!$post || $post->post_type !== 'page') {
            return array();
        }

        $post_id = $post->ID;
        $transient_key = 'tierliebe_page_content_v3_' . $post_id;
        $cached = get_transient($transient_key);
        if (is_array($cached) && count($cached) > 0) {
            return $cached;
        }

        $content = $post->post_content;
        if (empty($content)) {
            $backup = get_post_meta($post_id, '_tierliebe_content_backup', true);
            if (empty($backup)) {
                return array();
            }
            $content = $backup;
        }

        $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        if (strpos($content, '<!--TIERLIEBE_HTML_START-->') !== false && preg_match('/<!--TIERLIEBE_HTML_START-->(.*)<!--TIERLIEBE_HTML_END-->/s', $content, $matches)) {
            $content = $matches[1];
        }
        $content = trim($content);
        // Unwrap <p>{...}</p> if present
        if (preg_match('/^<p>\\s*(\\{.*\\})\\s*<\\/p>$/s', $content, $m)) {
            $content = $m[1];
        }

        $parsed = json_decode($content, true);
        if (!is_array($parsed)) {
            $clean = tierliebe_clean_json_string_simple($content);
            $parsed = json_decode($clean, true);
            if (is_array($parsed)) {
                $content = $clean;
            }
        }
        if (is_array($parsed) && isset($parsed['keys']) && is_array($parsed['keys'])) {
            $parsed = $parsed['keys'];
        }
        if (!is_array($parsed) || count($parsed) < 1) {
            return array();
        }

        set_transient($transient_key, $parsed, HOUR_IN_SECONDS);
        return $parsed;
    }

    // Legacy code (kept for reference, not executed)

    $post_id = $post->ID;

    // Check if we have a cached version (cache by post ID now)
    // Cache key version bump to bypass stale transients
    $transient_key = 'tierliebe_page_content_v3_' . $post_id;
    $cached = get_transient($transient_key);

    // FAIL-SAFE: Validate cached data before returning
    if ($cached !== false && is_array($cached) && count($cached) >= 1) {
        return $cached;
    }

    // Get content directly from current page
    $content = $post->post_content;

    // FAIL-SAFE: Try backup if content is empty
    if (empty($content)) {
        $backup_content = get_post_meta($post_id, '_tierliebe_content_backup', true);
        if (!empty($backup_content)) {
            error_log("FAIL-SAFE: Using backup content for page {$post_id}");
            $content = $backup_content;
        } else {
            return array();
        }
    }

    // Decode HTML entities before JSON parsing (WordPress stores content with HTML entities)
    $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // If safety markers are still present (older saves), extract the JSON payload first
    if (strpos($content, '<!--TIERLIEBE_HTML_START-->') !== false && preg_match('/<!--TIERLIEBE_HTML_START-->(.*)<!--TIERLIEBE_HTML_END-->/s', $content, $matches)) {
        $content = $matches[1];
    }

    $content = trim($content); // Remove leading/trailing whitespace

    // CRITICAL: Normalize typographic quotes back to straight quotes for JSON parsing
    $content = tierliebe_normalize_json_quotes($content);

    // Parse JSON content into structured array
    $len = strlen($content);
    $parsed = json_decode($content, true);

    // REPAIR PATH: If parse fails, attempt to clean and decode again
    if (!is_array($parsed)) {
        error_log("TIERLIEBE: JSON parse failed for page {$post_id} (len {$len}) - " . json_last_error_msg());
        $content_clean = tierliebe_clean_json_string($content);
        $parsed = json_decode($content_clean, true);
        if (is_array($parsed)) {
            // Successful repair -> use cleaned content going forward
            $content = $content_clean;
            error_log("TIERLIEBE: Repaired JSON for page {$post_id} (keys " . count($parsed) . ")");
        } else {
            error_log("TIERLIEBE: Repair failed for page {$post_id} - " . json_last_error_msg());
        }
    }

    // FULL PAGE BUILDER: Handle new combined format { keys: {...}, _structure: [...] }
    // NEW FORMAT (v3.2+): Keys + Structure together for WordPress Revisions
    // OLD FORMAT (v3.0-3.1): Flat key-value pairs
    if (is_array($parsed) && isset($parsed['keys']) && is_array($parsed['keys'])) {
        // NEW FORMAT: Extract keys, structure will be read by render_tierliebe_dynamic_structure()
        error_log("TIERLIEBE: Using NEW combined format (keys + structure) for page {$post_id}");
        $parsed = $parsed['keys'];
    } elseif (is_array($parsed)) {
        // OLD FORMAT: Already flat key-value pairs
        error_log("TIERLIEBE: Using OLD format (flat keys) for page {$post_id}");
    }

    // CRITICAL FIX: Replace straight quotes with prime symbol
    // Prime (U+2032) looks similar but doesn't trigger JSON escaping
    if (is_array($parsed)) {
        array_walk_recursive($parsed, function (&$value) {
            if (is_string($value)) {
                $value = str_replace('"', '′', $value);
            }
        });
    }

    // FAIL-SAFE: Validate parsed data, try backup if invalid
    if (!is_array($parsed) || count($parsed) < 1) {
        error_log("FAIL-SAFE: Invalid parsed content for page {$post_id}, trying backup");

        $backup_content = get_post_meta($post_id, '_tierliebe_content_backup', true);
        if (!empty($backup_content)) {
            $backup_content = html_entity_decode($backup_content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $backup_content = strip_tags($backup_content);
            $backup_parsed = json_decode($backup_content, true);

            if (is_array($backup_parsed) && count($backup_parsed) >= 1) {
                error_log("FAIL-SAFE: Successfully restored from backup for page {$post_id}");
                $parsed = $backup_parsed;
            } else {
                $parsed = array();
            }
        } else {
            $parsed = array();
        }
    }

    // FAIL-SAFE: Only cache if valid
    if (is_array($parsed) && count($parsed) >= 1) {
        set_transient($transient_key, $parsed, HOUR_IN_SECONDS);
    }

    return $parsed;
}

// Helper: Clean JSON string (entities, control chars, smart quotes, newlines)
function tierliebe_clean_json_string($content)
{
    // Decode entities again (safety)
    $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // Remove control chars except tab/newline
    $content = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $content);

    // Normalize smart quotes to straight quotes
    $search = ["\xC2\xAB", "\xC2\xBB", "„", "“", "”", "‚", "‘", "’", "´", "˝", "¨"];
    $replace = ['"', '"', '"', '"', '"', "'", "'", "'", "'", '"', '"', '"'];
    $content = str_replace($search, $replace, $content);

    // Normalize line breaks
    $content = str_replace(["\r\n", "\r"], "\n", $content);

    // If a literal newline slipped into JSON string values, escape it
    $content = str_replace("\n", '\\n', $content);

    return trim($content);
}

// Simplified cleaner used by v3 parser
function tierliebe_clean_json_string_simple($content)
{
    $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $content = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $content);
    $content = str_replace(array("„", "“", "”", "‚", "‘", "’", "´", "˝", "¨"), '"', $content);
    $content = str_replace(array("\r\n", "\r"), "\n", $content);
    $content = str_replace("\n", '\\n', $content);
    return trim($content);
}

// Clear cache when page is updated
function tierliebe_clear_page_cache($post_id)
{
    $post = get_post($post_id);

    if ($post && $post->post_type === 'page') {
        // Clear cache for this page (cache by post ID now)
        delete_transient('tierliebe_page_content_v3_' . $post_id);
    }
}
add_action('save_post', 'tierliebe_clear_page_cache');

// Clear all tierliebe page content caches (admin utility)
function tierliebe_clear_all_caches()
{
    global $wpdb;
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_tierliebe_page_content_v3_%' OR option_name LIKE '_transient_timeout_tierliebe_page_content_v3_%'");
}

// Add cache clear to admin init (can be triggered via URL parameter)
add_action('admin_init', function () {
    if (isset($_GET['tierliebe_clear_cache']) && current_user_can('manage_options')) {
        tierliebe_clear_all_caches();
        wp_redirect(remove_query_arg('tierliebe_clear_cache'));
        exit;
    }
});

// AJAX Handler: Save edited text from frontend
function tierliebe_save_text_ajax()
{
    // Security check
    check_ajax_referer('tierliebe_edit_nonce', 'nonce');

    // Admin only
    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Keine Berechtigung');
    }

    $page_slug = sanitize_text_field($_POST['page_slug']);

    // V2 sends HTML comment wrapped JSON: <!--TIERLIEBE_HTML_START-->{"key":"value"}<!--TIERLIEBE_HTML_END-->
    // IMPORTANT: Try WITHOUT stripslashes first (modern PHP doesn't need it)
    $raw_content = $_POST['content'];

    if (preg_match('/<!--TIERLIEBE_HTML_START-->(.*)<!--TIERLIEBE_HTML_END-->/s', $raw_content, $matches)) {
        $json_string = $matches[1];

        // Try to decode without stripslashes first
        $json_data = json_decode($json_string, true);

        // If that fails, try WITH stripslashes (for legacy magic_quotes)
        if ($json_data === null && json_last_error() !== JSON_ERROR_NONE) {
            $json_string = stripslashes($json_string);
            $json_data = json_decode($json_string, true);
        }

        if (is_array($json_data)) {
            // Re-encode to ensure clean JSON format in post_content
            $content = json_encode($json_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } else {
            $error_msg = 'Ungültiges JSON-Format';
            if (json_last_error() !== JSON_ERROR_NONE) {
                $error_msg .= ': ' . json_last_error_msg();
            }
            wp_send_json_error($error_msg);
            return;
        }
    } else {
        wp_send_json_error('Ungültiges Content-Format');
        return;
    }

    // Find page by slug (now saving to page post_content instead of CPT)
    $query = new WP_Query(array(
        'post_type'      => 'page',
        'name'           => $page_slug,
        'posts_per_page' => 1,
        'post_status'    => 'any'
    ));

    if ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        wp_reset_postdata();

        // Check user can edit this specific page
        if (!current_user_can('edit_post', $post_id)) {
            wp_send_json_error('Keine Berechtigung für diese Seite');
            return;
        }

        // Temporarily disable content filters to prevent wpautop from breaking JSON
        remove_filter('content_save_pre', 'wp_filter_post_kses');
        remove_filter('content_save_pre', 'wp_targeted_link_rel');
        remove_filter('content_save_pre', 'convert_invalid_entities');

        // Update page (now with revisions support)
        $updated = wp_update_post(array(
            'ID'           => $post_id,
            'post_content' => $content
        ), true);

        // Re-enable filters
        add_filter('content_save_pre', 'wp_filter_post_kses');
        add_filter('content_save_pre', 'wp_targeted_link_rel');
        add_filter('content_save_pre', 'convert_invalid_entities');

        if ($updated && !is_wp_error($updated)) {
            // Clear cache for this page
            delete_transient('tierliebe_page_content_v3_' . $post_id);

            wp_cache_delete($post_id, 'posts');
            wp_cache_delete($post_id, 'post_meta');

            // Clear all page caches if caching plugin exists
            if (function_exists('wp_cache_flush')) {
                wp_cache_flush();
            }

            // Force clear all tierliebe transients
            global $wpdb;
            $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_tierliebe_page_content_v3_%' OR option_name LIKE '_transient_timeout_tierliebe_page_content_v3_%'");

            wp_send_json_success('Text gespeichert');
        } else {
            wp_send_json_error('Fehler beim Speichern');
        }
    } else {
        wp_send_json_error('Seite nicht gefunden: ' . $page_slug);
    }
}
add_action('wp_ajax_tierliebe_save_text', 'tierliebe_save_text_ajax');

// Save All (Text + Images) - Combined Handler
function tierliebe_save_all_ajax()
{
    // Security check
    check_ajax_referer('tierliebe_edit_nonce', 'nonce');

    // Admin only
    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Keine Berechtigung');
    }

    $page_slug = sanitize_text_field($_POST['page_slug']);
    $page_id = intval($_POST['page_id']);

    // DEBUG: Log all POST keys
    error_log('TIERLIEBE SAVE: POST keys: ' . implode(', ', array_keys($_POST)));
    error_log('TIERLIEBE SAVE: html_structure isset: ' . (isset($_POST['html_structure']) ? 'YES' : 'NO'));
    error_log('TIERLIEBE SAVE: html_structure empty: ' . (empty($_POST['html_structure']) ? 'YES' : 'NO'));

    // Save text content
    // CRITICAL: Do NOT use stripslashes on raw content!
    // In modern PHP (no magic_quotes), stripslashes('\n') becomes 'n' which breaks JSON
    $raw_content = $_POST['content'];

    if (preg_match('/<!--TIERLIEBE_HTML_START-->(.*)<!--TIERLIEBE_HTML_END-->/s', $raw_content, $matches)) {
        $json_string = $matches[1];

        // Try to decode directly first
        $json_data = json_decode($json_string, true);

        // If that fails AND we detect escaped backslashes, try stripslashes
        if ($json_data === null && strpos($json_string, '\\\\') !== false) {
            $json_data = json_decode(stripslashes($json_string), true);
        }

        if (is_array($json_data)) {
            // KEEP the original JSON string instead of re-encoding!
            // Re-encoding via json_encode produces \n which WordPress wp_unslash corrupts
            $content = $json_string;

            // Only re-encode if we had to stripslashes
            if (strpos($json_string, '\\\\') !== false) {
                $content = stripslashes($json_string);
            }
        } else {
            wp_send_json_error('Ungültiges JSON-Format: ' . json_last_error_msg());
            return;
        }
    } else {
        wp_send_json_error('Ungültiges Content-Format');
        return;
    }

    // Verify page exists and user can edit it (use page_id directly, not slug)
    $page = get_post($page_id);
    if (!$page || $page->post_type !== 'page') {
        wp_send_json_error('Seite nicht gefunden (ID: ' . $page_id . ')');
        return;
    }

    if (!current_user_can('edit_post', $page_id)) {
        wp_send_json_error('Keine Berechtigung für diese Seite');
        return;
    }

    // FAIL-SAFE: Create backup of current content BEFORE saving
    $current_post = get_post($page_id);
    if ($current_post && !empty($current_post->post_content)) {
        update_post_meta($page_id, '_tierliebe_content_backup', $current_post->post_content);
        update_post_meta($page_id, '_tierliebe_backup_timestamp', current_time('mysql'));
    }

    // FAIL-SAFE: Validate JSON structure
    $json_data = json_decode($content, true);
    if (!is_array($json_data)) {
        wp_send_json_error('FAIL-SAFE: Ungültiges JSON - kein Array. Speichern abgebrochen.');
        return;
    }

    // Handle both new format (keys + _structure) and old format (flat keys)
    $keys_to_check = isset($json_data['keys']) ? $json_data['keys'] : $json_data;
    if (!is_array($keys_to_check) || count($keys_to_check) < 1) {
        wp_send_json_error('FAIL-SAFE: Ungültiges JSON - keine Keys gefunden. Speichern abgebrochen.');
        return;
    }

    // Temporarily disable ALL content filters to prevent wpautop from breaking JSON
    remove_filter('content_save_pre', 'wp_filter_post_kses');
    remove_filter('content_save_pre', 'wp_targeted_link_rel');
    remove_filter('content_save_pre', 'convert_invalid_entities');

    // CRITICAL: WordPress wp_update_post internally calls wp_unslash which converts \n to n
    // We must double-escape backslashes so wp_unslash leaves us with correct \n

    // NEW: Embed structure in post_content for unified WordPress Revisions
    $final_content = $json_data; // Already decoded keys

    // Add structure if provided (so both are in one revision)
    if (isset($_POST['html_structure']) && !empty($_POST['html_structure'])) {
        $html_structure_encoded = $_POST['html_structure'];
        $html_structure = base64_decode($html_structure_encoded);
        $structure_data_for_content = json_decode($html_structure, true);
        if (is_array($structure_data_for_content)) {
            $final_content = [
                'keys' => $json_data,
                '_structure' => $structure_data_for_content
            ];
        }
    }

    $content_to_save = json_encode($final_content, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    $content_escaped = str_replace('\\', '\\\\', $content_to_save);

    // Save content (includes text AND structure in JSON for unified revisions)
    $result = wp_update_post([
        'ID' => $page_id,
        'post_content' => $content_escaped
    ]);

    // Re-enable filters
    add_filter('content_save_pre', 'wp_filter_post_kses');
    add_filter('content_save_pre', 'wp_targeted_link_rel');
    add_filter('content_save_pre', 'convert_invalid_entities');

    if (is_wp_error($result)) {
        wp_send_json_error('Fehler beim Speichern: ' . $result->get_error_message());
        return;
    }

    // Save HTML structure (for dynamic rendering) - NEW
    $structure_saved = false;
    if (isset($_POST['html_structure']) && !empty($_POST['html_structure'])) {
        $html_structure_encoded = $_POST['html_structure'];
        error_log('TIERLIEBE: html_structure empfangen (Base64), Länge: ' . strlen($html_structure_encoded));

        // Decode Base64
        $html_structure = base64_decode($html_structure_encoded);
        error_log('TIERLIEBE: html_structure decoded, Länge: ' . strlen($html_structure));

        // Validate JSON
        $structure_data = json_decode($html_structure, true);
        if (is_array($structure_data)) {
            // FORCE delete ALL old entries via direct DB access
            global $wpdb;
            $deleted = $wpdb->delete(
                $wpdb->postmeta,
                array(
                    'post_id' => $page_id,
                    'meta_key' => '_tierliebe_html_structure'
                )
            );
            error_log('TIERLIEBE: Deleted ' . $deleted . ' old meta entries');

            // Insert fresh value
            $inserted = $wpdb->insert(
                $wpdb->postmeta,
                array(
                    'post_id' => $page_id,
                    'meta_key' => '_tierliebe_html_structure',
                    'meta_value' => $html_structure
                )
            );
            $structure_saved = ($inserted !== false);
            error_log('TIERLIEBE: html_structure inserted, ' . count($structure_data) . ' Elemente, Result: ' . ($structure_saved ? 'SUCCESS' : 'FAILED'));

            // Verify it was saved correctly
            $verify = $wpdb->get_var($wpdb->prepare(
                "SELECT meta_value FROM $wpdb->postmeta WHERE post_id = %d AND meta_key = '_tierliebe_html_structure' ORDER BY meta_id DESC LIMIT 1",
                $page_id
            ));
            error_log('TIERLIEBE: Verify saved length: ' . strlen($verify));
        } else {
            error_log('TIERLIEBE: html_structure JSON decode FAILED: ' . json_last_error_msg());
            error_log('TIERLIEBE: First 500 chars: ' . substr($html_structure, 0, 500));
        }
    } else {
        error_log('TIERLIEBE: KEINE html_structure in $_POST');
    }

    // Clear cache (including meta cache)
    delete_transient('tierliebe_text_' . $page_slug);
    delete_transient('tierliebe_page_content_v3_' . $page_id);
    wp_cache_delete($page_id, 'post_meta'); // Clear meta cache

    wp_send_json_success([
        'message' => 'Alle Inhalte gespeichert (Texte + Bilder im JSON)',
        'keys' => count($json_data),
        'structure_saved' => $structure_saved,
        'structure_elements' => isset($structure_data) ? count($structure_data) : 0
    ]);
}
add_action('wp_ajax_tierliebe_save_all', 'tierliebe_save_all_ajax');

// NEW v3.0: Simplified Save Handler (no structure, just key-value pairs)
function tierliebe_save_content_ajax()
{
    check_ajax_referer('tierliebe_edit_nonce', 'nonce');

    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Keine Berechtigung');
    }

    $page_id = intval($_POST['page_id']);
    $content_json = stripslashes($_POST['content']);

    // Validate JSON
    $content = json_decode($content_json, true);
    if (!is_array($content) || empty($content)) {
        wp_send_json_error('Ungültiges JSON-Format');
        return;
    }

    // Verify page exists
    $page = get_post($page_id);
    if (!$page || $page->post_type !== 'page') {
        wp_send_json_error('Seite nicht gefunden');
        return;
    }

    if (!current_user_can('edit_post', $page_id)) {
        wp_send_json_error('Keine Berechtigung für diese Seite');
        return;
    }

    // Create backup
    if (!empty($page->post_content)) {
        update_post_meta($page_id, '_tierliebe_content_backup', $page->post_content);
    }

    // Encode content for storage
    $content_to_save = json_encode($content, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    // WordPress wp_unslash fix
    $content_escaped = str_replace('\\', '\\\\', $content_to_save);

    // Disable filters
    remove_filter('content_save_pre', 'wp_filter_post_kses');

    // Save
    $result = wp_update_post([
        'ID' => $page_id,
        'post_content' => $content_escaped
    ]);

    // Re-enable filters
    add_filter('content_save_pre', 'wp_filter_post_kses');

    if (is_wp_error($result)) {
        wp_send_json_error('Fehler: ' . $result->get_error_message());
        return;
    }

    // Clear cache
    delete_transient('tierliebe_page_content_v3_' . $page_id);

    wp_send_json_success([
        'message' => 'Gespeichert',
        'keys' => count($content)
    ]);
}
add_action('wp_ajax_tierliebe_save_content', 'tierliebe_save_content_ajax');

// Undo Last Save - Restore previous WordPress revision
function tierliebe_undo_save_ajax()
{
    // Security check
    check_ajax_referer('tierliebe_edit_nonce', 'nonce');

    // Admin only
    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Keine Berechtigung');
    }

    $page_id = intval($_POST['page_id']);
    $page_slug = sanitize_text_field($_POST['page_slug']);

    // Clear transient cache
    $transient_key = 'tierliebe_page_content_v3_' . $page_id;
    delete_transient($transient_key);

    // Get current post content (to skip it in revisions)
    $current_post = get_post($page_id);
    $current_content = $current_post->post_content;
    $current_decoded = html_entity_decode($current_content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $current_decoded = strip_tags($current_decoded);
    $current_parsed = json_decode($current_decoded, true);

    // Get latest revisions (ALWAYS restore, not just when broken)
    $revisions = wp_get_post_revisions($page_id, array(
        'posts_per_page' => 10,
        'order' => 'DESC'
    ));

    if (empty($revisions)) {
        wp_send_json_error('Keine Revisionen gefunden');
        return;
    }

    // Find first valid revision that is DIFFERENT from current content
    foreach ($revisions as $revision) {
        $revision_content = $revision->post_content;
        $revision_decoded = html_entity_decode($revision_content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $revision_decoded = strip_tags($revision_decoded);
        $revision_parsed = json_decode($revision_decoded, true);

        // Skip if revision is same as current content
        if ($revision_parsed === $current_parsed) {
            continue;
        }

        if (is_array($revision_parsed) && count($revision_parsed) >= 1) {
            // Found valid revision - restore it
            $restore_content = json_encode($revision_parsed, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            // CRITICAL: WordPress wp_update_post calls wp_unslash which converts \n to n
            // Must double-escape backslashes
            $restore_content = str_replace('\\', '\\\\', $restore_content);

            $result = wp_update_post([
                'ID' => $page_id,
                'post_content' => $restore_content
            ]);

            if (!is_wp_error($result)) {
                delete_transient($transient_key);

                // NEW: Also restore structure if present in revision
                $structure_restored = false;
                if (isset($revision_parsed['_structure']) && is_array($revision_parsed['_structure'])) {
                    global $wpdb;
                    // Delete old structure
                    $wpdb->delete(
                        $wpdb->postmeta,
                        array('post_id' => $page_id, 'meta_key' => '_tierliebe_html_structure')
                    );
                    // Insert restored structure
                    $structure_json = json_encode($revision_parsed['_structure'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                    $wpdb->insert(
                        $wpdb->postmeta,
                        array(
                            'post_id' => $page_id,
                            'meta_key' => '_tierliebe_html_structure',
                            'meta_value' => $structure_json
                        )
                    );
                    $structure_restored = true;
                    wp_cache_delete($page_id, 'post_meta');
                }

                $revision_date = get_the_date('d.m.Y H:i', $revision->ID);
                $keys_count = isset($revision_parsed['keys']) ? count($revision_parsed['keys']) : count($revision_parsed);

                wp_send_json_success([
                    'message' => 'Revision wiederhergestellt' . ($structure_restored ? ' (Text + Struktur)' : ' (nur Text)'),
                    'restored' => true,
                    'source' => 'revision',
                    'revision_date' => $revision_date,
                    'keys' => $keys_count,
                    'structure_restored' => $structure_restored
                ]);
                return;
            }
        }
    }

    // Fallback: Try manual backup
    $backup_content = get_post_meta($page_id, '_tierliebe_content_backup', true);
    if ($backup_content) {
        $backup_decoded = html_entity_decode($backup_content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $backup_decoded = strip_tags($backup_decoded);
        $backup_parsed = json_decode($backup_decoded, true);

        if (is_array($backup_parsed) && count($backup_parsed) >= 1) {
            $restore_content = json_encode($backup_parsed, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            // CRITICAL: WordPress wp_update_post calls wp_unslash which converts \n to n
            // Must double-escape backslashes
            $restore_content = str_replace('\\', '\\\\', $restore_content);

            $result = wp_update_post([
                'ID' => $page_id,
                'post_content' => $restore_content
            ]);

            if (!is_wp_error($result)) {
                delete_transient($transient_key);

                wp_send_json_success([
                    'message' => 'Cache geleert und manuelles Backup wiederhergestellt',
                    'restored' => true,
                    'source' => 'manual_backup',
                    'keys' => count($backup_parsed)
                ]);
                return;
            }
        }
    }

    wp_send_json_error('Keine gültige Revision gefunden!');
}
add_action('wp_ajax_tierliebe_undo_save', 'tierliebe_undo_save_ajax');

// Enqueue Edit Assets for Admins
function tierliebe_enqueue_edit_assets()
{
    // Only for logged-in admins on Tierliebe pages
    if (!current_user_can('edit_posts')) {
        return;
    }

    $is_tierliebe_template = is_page_template('page-tierliebe.php') ||
                              is_page_template('page-tierliebe-home.php') ||
                              is_page_template('page-tierliebe-test.php') ||
                              is_page_template('page-tierliebe-hunde.php') ||
                              is_page_template('page-tierliebe-katzen.php') ||
                              is_page_template('page-tierliebe-kleintiere.php') ||
                              is_page_template('page-tierliebe-exoten.php') ||
                              is_page_template('page-tierliebe-irrtuemer.php') ||
                              is_page_template('page-tierliebe-adoption.php') ||
                              is_page_template('page-tierliebe-qualzucht.php') ||
                              is_page_template('page-tierliebe-wissen.php') ||
                              is_page_template('page-tierliebe-kontakt.php');

    if ($is_tierliebe_template) {
        // Enqueue WordPress Media Library
        if (current_user_can('edit_posts')) {
            wp_enqueue_media();
        }

        wp_enqueue_style(
            'tierliebe-edit',
            get_stylesheet_directory_uri() . '/css/tierliebe-edit.css',
            array(),
            '2.0.0'
        );

        wp_enqueue_script(
            'tierliebe-edit',
            get_stylesheet_directory_uri() . '/js/tierliebe-edit-v3.js',
            array('jquery'),
            '3.0.0',
            true
        );

        // Pass AJAX URL and nonce to JavaScript
        wp_localize_script('tierliebe-edit', 'tierliebe_edit', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('tierliebe_edit_nonce'),
            'page_id'  => get_the_ID(),
            'page_slug' => $post->post_name
        ));
    }
}
add_action('wp_enqueue_scripts', 'tierliebe_enqueue_edit_assets');
