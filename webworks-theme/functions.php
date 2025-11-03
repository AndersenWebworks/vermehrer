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
            '1.0.0',
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

// Register Custom Post Type for Tierliebe Texts
function tierliebe_register_text_cpt() {
    $args = array(
        'label'                 => 'Tierliebe Texte',
        'public'                => false,
        'publicly_queryable'    => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => false,
        'rewrite'               => false,
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => false,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-edit-page',
        'supports'              => array('title', 'editor', 'revisions'),
        'labels'                => array(
            'name'               => 'Tierliebe Texte',
            'singular_name'      => 'Tierliebe Text',
            'add_new'            => 'Text hinzufügen',
            'add_new_item'       => 'Neuen Text hinzufügen',
            'edit_item'          => 'Text bearbeiten',
            'new_item'           => 'Neuer Text',
            'view_item'          => 'Text ansehen',
            'search_items'       => 'Texte durchsuchen',
            'not_found'          => 'Keine Texte gefunden',
            'not_found_in_trash' => 'Keine Texte im Papierkorb',
        ),
    );

    register_post_type('tierliebe_text', $args);
}
add_action('init', 'tierliebe_register_text_cpt');

// Get Tierliebe Text Content by Page Slug
function get_tierliebe_text($page_slug = 'home') {
    // Check if we have a cached version
    $transient_key = 'tierliebe_text_' . $page_slug;
    $cached = get_transient($transient_key);

    if ($cached !== false) {
        return $cached;
    }

    // Query for the text post
    $query = new WP_Query(array(
        'post_type'      => 'tierliebe_text',
        'name'           => 'tierliebe-' . $page_slug,
        'posts_per_page' => 1,
        'post_status'    => 'publish'
    ));

    if ($query->have_posts()) {
        $query->the_post();
        $content = get_the_content();
        wp_reset_postdata();

        // Parse markdown content into structured array
        $parsed = tierliebe_parse_markdown($content);

        // Cache for 1 hour
        set_transient($transient_key, $parsed, HOUR_IN_SECONDS);

        return $parsed;
    }

    return array();
}

// Parse Markdown content into structured array
function tierliebe_parse_markdown($markdown) {
    $data = array();

    // Parse sections
    $sections = preg_split('/^## /m', $markdown, -1, PREG_SPLIT_NO_EMPTY);

    foreach ($sections as $section) {
        $lines = explode("\n", trim($section));
        $section_title = array_shift($lines);
        $section_content = implode("\n", $lines);

        // Clean markdown formatting
        $section_content = tierliebe_clean_markdown($section_content);

        // Store by section title (cleaned)
        $key = sanitize_title($section_title);
        $data[$key] = trim($section_content);
    }

    return $data;
}

// Clean Markdown formatting (simple - just remove ** and quotes)
function tierliebe_clean_markdown($text) {
    // Remove surrounding quotes
    $text = trim($text, '"');

    // Remove bold markers **text** - just keep the text
    $text = preg_replace('/\*\*(.+?)\*\*/s', '$1', $text);

    // Remove italic markers *text*
    $text = preg_replace('/\*(.+?)\*/s', '$1', $text);

    return trim($text);
}

// Clear cache when text is updated
function tierliebe_clear_text_cache($post_id) {
    $post = get_post($post_id);

    if ($post && $post->post_type === 'tierliebe_text') {
        // Extract page slug from post slug (remove 'tierliebe-' prefix)
        $page_slug = str_replace('tierliebe-', '', $post->post_name);
        delete_transient('tierliebe_text_' . $page_slug);
    }
}
add_action('save_post', 'tierliebe_clear_text_cache');

// AJAX Handler: Save edited text from frontend
function tierliebe_save_text_ajax() {
    // Security check
    check_ajax_referer('tierliebe_edit_nonce', 'nonce');

    // Admin only
    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Keine Berechtigung');
    }

    $page_slug = sanitize_text_field($_POST['page_slug']);
    $content = wp_kses_post($_POST['content']);

    // Find existing post
    $query = new WP_Query(array(
        'post_type'      => 'tierliebe_text',
        'name'           => 'tierliebe-' . $page_slug,
        'posts_per_page' => 1,
        'post_status'    => 'any'
    ));

    if ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        wp_reset_postdata();

        // Update post
        $updated = wp_update_post(array(
            'ID'           => $post_id,
            'post_content' => $content
        ));

        if ($updated) {
            // Clear cache
            delete_transient('tierliebe_text_' . $page_slug);
            wp_send_json_success('Text gespeichert');
        } else {
            wp_send_json_error('Fehler beim Speichern');
        }
    } else {
        wp_send_json_error('Text nicht gefunden');
    }
}
add_action('wp_ajax_tierliebe_save_text', 'tierliebe_save_text_ajax');

// Enqueue Edit Assets for Admins
function tierliebe_enqueue_edit_assets() {
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
        wp_enqueue_style(
            'tierliebe-edit',
            get_stylesheet_directory_uri() . '/css/tierliebe-edit.css',
            array(),
            '2.0.0'
        );

        wp_enqueue_script(
            'tierliebe-edit',
            get_stylesheet_directory_uri() . '/js/tierliebe-edit.js',
            array('jquery'),
            '1.0.0',
            true
        );

        // Pass AJAX URL and nonce to JavaScript
        wp_localize_script('tierliebe-edit', 'tierliebe_edit', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('tierliebe_edit_nonce')
        ));
    }
}
add_action('wp_enqueue_scripts', 'tierliebe_enqueue_edit_assets');
