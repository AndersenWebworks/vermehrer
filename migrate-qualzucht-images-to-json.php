<?php
/**
 * Migration Script: Move Qualzucht Images from Post Meta to JSON
 *
 * Call via browser: https://vm.andersen-webworks.de/migrate-qualzucht-images-to-json.php
 *
 * This script:
 * 1. Loads current Qualzucht page content (JSON)
 * 2. Reads all qualzucht_bild_* Post Meta fields
 * 3. Adds them to the JSON
 * 4. Saves updated JSON to post_content
 * 5. Keeps Post Meta as backup/fallback
 */

// Load WordPress
require_once('wp-load.php');

// Security: Admin only
if (!is_user_logged_in() || !current_user_can('manage_options')) {
    die('Access denied. Please log in as admin.');
}

echo '<h1>Migration: Qualzucht Images → JSON</h1>';
echo '<pre>';

// Find Qualzucht page
$page = get_page_by_path('tierliebe-qualzucht');

if (!$page) {
    echo "ERROR: Qualzucht page not found!\n";
    exit;
}

$page_id = $page->ID;
echo "Page ID: {$page_id}\n";
echo "Page Title: {$page->post_title}\n\n";

// Load current content
echo "=== STEP 1: Load Current Content ===\n";
$raw_content = $page->post_content;
$content = html_entity_decode($raw_content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
$content = strip_tags($content);
$parsed = json_decode($content, true);

if (!is_array($parsed)) {
    echo "ERROR: Current content is not valid JSON!\n";
    echo "JSON Error: " . json_last_error_msg() . "\n";
    exit;
}

echo "✓ Current content loaded: " . count($parsed) . " keys\n\n";

// Load all image Post Meta
echo "=== STEP 2: Load Image Post Meta ===\n";
$image_keys = [];
for ($i = 1; $i <= 8; $i++) {
    $meta_key = "qualzucht_bild_{$i}";
    $attachment_id = get_post_meta($page_id, $meta_key, true);

    if ($attachment_id) {
        $image_keys[$meta_key] = intval($attachment_id);
        $image_url = wp_get_attachment_url($attachment_id);
        echo "✓ Found: {$meta_key} = {$attachment_id}\n";
        echo "  URL: {$image_url}\n";
    } else {
        echo "- Empty: {$meta_key}\n";
    }
}

if (empty($image_keys)) {
    echo "\n⚠ No images found in Post Meta. Nothing to migrate.\n";
    exit;
}

echo "\n✓ Total images found: " . count($image_keys) . "\n\n";

// Merge images into JSON
echo "=== STEP 3: Merge Images into JSON ===\n";
$updated = false;
foreach ($image_keys as $key => $attachment_id) {
    if (!isset($parsed[$key]) || $parsed[$key] != $attachment_id) {
        $parsed[$key] = $attachment_id;
        echo "✓ Added/Updated: {$key} = {$attachment_id}\n";
        $updated = true;
    } else {
        echo "- Already in JSON: {$key} = {$attachment_id}\n";
    }
}

if (!$updated) {
    echo "\n✓ All images already in JSON. No update needed.\n";
    exit;
}

echo "\n✓ JSON now has " . count($parsed) . " keys (including images)\n\n";

// Save updated JSON
echo "=== STEP 4: Save Updated JSON ===\n";
$new_content = json_encode($parsed, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

$result = wp_update_post([
    'ID' => $page_id,
    'post_content' => $new_content
]);

if (is_wp_error($result)) {
    echo "ERROR: Failed to save: " . $result->get_error_message() . "\n";
    exit;
}

echo "✓ Successfully saved updated JSON to post_content\n";
echo "✓ Post Meta fields kept as backup/fallback\n\n";

// Clear cache
$transient_key = 'tierliebe_page_content_' . $page_id;
delete_transient($transient_key);
echo "✓ Cleared transient cache\n\n";

// Verify
echo "=== STEP 5: Verify ===\n";
$verify_page = get_post($page_id);
$verify_content = html_entity_decode($verify_page->post_content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
$verify_content = strip_tags($verify_content);
$verify_parsed = json_decode($verify_content, true);

if (!is_array($verify_parsed)) {
    echo "✗ ERROR: Verification failed - JSON is broken!\n";
    exit;
}

$images_in_json = 0;
foreach ($image_keys as $key => $expected_id) {
    if (isset($verify_parsed[$key]) && $verify_parsed[$key] == $expected_id) {
        echo "✓ Verified: {$key} = {$expected_id}\n";
        $images_in_json++;
    } else {
        echo "✗ Missing: {$key}\n";
    }
}

echo "\n";
echo "=== MIGRATION COMPLETE ===\n";
echo "Images in JSON: {$images_in_json}/" . count($image_keys) . "\n";
echo "Total JSON keys: " . count($verify_parsed) . "\n";
echo "\n";
echo "Next steps:\n";
echo "1. Update page-tierliebe-qualzucht.php to read from JSON\n";
echo "2. Update tierliebe-edit-v2.js to save images in contentMap\n";
echo "3. Remove tierliebe_save_image_meta_ajax from functions.php\n";
echo "\n";
echo '<a href="https://vm.andersen-webworks.de/tierliebe-qualzucht/" target="_blank">→ Open Qualzucht Page</a>';
echo '</pre>';
