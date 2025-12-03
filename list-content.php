<?php
/**
 * List all Tierliebe Content Posts
 * Usage: https://vm.andersen-webworks.de/list-content.php
 */

// Load WordPress
$wp_load_paths = [
    __DIR__ . '/wp-load.php',
    __DIR__ . '/../../wp-load.php',
    __DIR__ . '/../../../wp-load.php',
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

// Get all tierliebe_text posts
$args = [
    'post_type' => 'tierliebe_text',
    'posts_per_page' => -1,
    'post_status' => 'any'
];

$posts = get_posts($args);

header('Content-Type: application/json; charset=utf-8');

if (empty($posts)) {
    echo json_encode([
        'error' => 'No tierliebe_text posts found',
        'searched_post_type' => 'tierliebe_text'
    ], JSON_PRETTY_PRINT);
    exit;
}

$result = [];
foreach ($posts as $post) {
    $result[] = [
        'id' => $post->ID,
        'slug' => $post->post_name,
        'title' => $post->post_title,
        'status' => $post->post_status,
        'modified' => $post->post_modified,
        'content_length' => strlen($post->post_content)
    ];
}

echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
exit;
