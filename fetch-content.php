<?php
/**
 * Fetch Tierliebe Content from WordPress
 * Usage: https://vm.andersen-webworks.de/fetch-content.php?slug=tierliebe-start
 */

// Load WordPress
require_once(__DIR__ . '/wp-load.php');

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
