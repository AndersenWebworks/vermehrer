<?php

/* TIERLIEBE QUIZ - INTEGRATION
_______________________________*/

// Load Tierliebe Shortcodes - TEMPORÄR DEAKTIVIERT
// require_once get_stylesheet_directory() . '/includes/tierliebe-shortcodes.php';

// TEMPLATE META BOX - TEMPORÄR DEAKTIVIERT - DEBUGGING
/*

// Template-Auswahl im Classic Editor aktivieren (YOOtheme deaktiviert das standardmäßig)
function enable_page_attributes_meta_box() {
    // Seiten-Attribute Meta Box für Classic Editor aktivieren
    add_post_type_support('page', 'page-attributes');
}
add_action('init', 'enable_page_attributes_meta_box');

// Template Dropdown im Classic Editor hinzufügen
function add_template_meta_box() {
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
function render_template_meta_box($post) {
    $template = get_post_meta($post->ID, '_wp_page_template', true);

    // Nonce für Sicherheit
    wp_nonce_field('save_page_template', 'page_template_nonce');

    // Template-Dateien aus Theme holen
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
function save_template_meta_box($post_id) {
    // Sicherheitsprüfungen
    if (!isset($_POST['page_template_nonce']) || !wp_verify_nonce($_POST['page_template_nonce'], 'save_page_template')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_page', $post_id)) {
        return;
    }

    // Template speichern
    if (isset($_POST['page_template'])) {
        update_post_meta($post_id, '_wp_page_template', sanitize_text_field($_POST['page_template']));
    }
}
add_action('save_post_page', 'save_template_meta_box');

// Enqueue Quiz JavaScript (nur auf Tierliebe-Seite)
function tierliebe_enqueue_scripts() {
    if (is_page_template('page-tierliebe.php')) {
        wp_enqueue_script(
            'tierliebe-quiz',
            get_stylesheet_directory_uri() . '/js/tierliebe-quiz.js',
            array(),
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'tierliebe_enqueue_scripts');
*/


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
