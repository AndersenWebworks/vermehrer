<?php
/**
 * Fetch Tierliebe Content from WordPress
 * Usage: https://vm.andersen-webworks.de/fetch-content.php?slug=tierliebe-start
 */

// Load WordPress (adjust path based on where this file is located)
// If in theme root: ../../wp-load.php
// If in WP root: ./wp-load.php
$wp_load_paths = [
    __DIR__ . '/wp-load.php',           // Same directory
    __DIR__ . '/../../wp-load.php',     // Two levels up (if in theme folder)
    __DIR__ . '/../../../wp-load.php',  // Three levels up (if in theme subfolder)
];

$wp_loaded = false;
foreach ($wp_load_paths as $path) {
    if (file_exists($path)) {
        require_once($path);
        $wp_loaded = true;
        break;
    }
}

if (!$wp_loaded) {
    die('Could not find wp-load.php');
}

// Security: Only allow if user is admin (optional - remove if you want public access)
// if (!current_user_can('administrator')) {
//     wp_die('Unauthorized');
// }

$slug = isset($_GET['slug']) ? sanitize_text_field($_GET['slug']) : '';

if (empty($slug)) {
    wp_die('Missing slug parameter');
}

// Get page by slug
$page = get_page_by_path($slug, OBJECT, 'page');

if (!$page) {
    wp_die('Page not found: ' . $slug);
}

// Get tierliebe_text content
$content_post = get_page_by_path($slug, OBJECT, 'tierliebe_text');

if (!$content_post) {
    wp_die('No tierliebe_text found for: ' . $slug);
}

$json_content = $content_post->post_content;

// Validate JSON
$data = json_decode($json_content, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    wp_die('Invalid JSON: ' . json_last_error_msg());
}

// Return as formatted JSON
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
exit;
