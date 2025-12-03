<?php
/**
 * Restore Tierliebe Pages - CLI Version
 *
 * Run via: php restore-cli.php
 *
 * Author: Claude (SYN-00)
 * Date: 2025-12-03
 */

// Find wp-load.php
$wp_load_paths = [
    __DIR__ . '/../wp-load.php',
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

if (!$wp_loaded || !defined('ABSPATH')) {
    die("ERROR: Could not find wp-load.php\n");
}

echo "================================================================================\n";
echo "RESTORE TIERLIEBE PAGES FROM ANNEMARIE REVISIONS\n";
echo "================================================================================\n\n";

$pages = [
    543 => 'tierliebe-start',
    544 => 'tierliebe-test',
    545 => 'tierliebe-hunde',
    546 => 'tierliebe-katzen',
    547 => 'tierliebe-kleintiere',
    548 => 'tierliebe-adoption',
    549 => 'tierliebe-qualzucht',
    550 => 'tierliebe-wissen',
    551 => 'tierliebe-exoten',
    552 => 'tierliebe-mythen',
    553 => 'tierliebe-kontakt',
];

$annemarie_user_id = 4;
$eandersen_user_id = 1;

$restored = [];
$skipped = [];
$errors = [];

foreach ($pages as $page_id => $slug) {
    echo "--- {$slug} (ID: {$page_id}) ---\n";

    // Get current page
    $post = get_post($page_id);
    if (!$post) {
        $errors[] = "$slug: Page not found";
        echo "ERROR: Page not found!\n\n";
        continue;
    }

    $current_author_id = $post->post_author;

    // Skip if not EAndersen
    if ($current_author_id != $eandersen_user_id) {
        $skipped[] = "$slug: Already Annemarie (author: $current_author_id)";
        echo "SKIP: Current author is not EAndersen\n\n";
        continue;
    }

    // Get all revisions
    $revisions = wp_get_post_revisions($page_id, ['posts_per_page' => -1]);

    // Find last Annemarie revision
    $annemarie_revision = null;
    foreach ($revisions as $revision) {
        if ($revision->post_author == $annemarie_user_id) {
            $annemarie_revision = $revision;
            break;
        }
    }

    if (!$annemarie_revision) {
        $errors[] = "$slug: No Annemarie revision found";
        echo "ERROR: No Annemarie revision found!\n\n";
        continue;
    }

    // Validate content
    $revision_content = $annemarie_revision->post_content;
    $content_data = json_decode($revision_content, true);
    $key_count = is_array($content_data) ? count($content_data) : 0;

    if ($key_count < 10) {
        $errors[] = "$slug: Too few keys ($key_count < 10)";
        echo "ERROR: Too few keys ($key_count < 10)\n\n";
        continue;
    }

    $revision_id = $annemarie_revision->ID;
    $revision_date = $annemarie_revision->post_modified;

    echo "Found Annemarie revision: $revision_id ($revision_date) with $key_count keys\n";

    // Restore
    global $wpdb;
    $result = $wpdb->update(
        $wpdb->posts,
        ['post_content' => $revision_content],
        ['ID' => $page_id],
        ['%s'],
        ['%d']
    );

    if ($result === false) {
        $errors[] = "$slug: Database update failed - " . $wpdb->last_error;
        echo "ERROR: Database update failed!\n\n";
        continue;
    }

    // Clear cache
    delete_transient('tierliebe_page_content_v3_' . $page_id);
    delete_transient('tierliebe_page_content_v4_' . $page_id);

    $restored[] = "$slug (Rev: $revision_id)";
    echo "SUCCESS: Restored from revision $revision_id\n\n";
}

// Summary
echo "================================================================================\n";
echo "SUMMARY\n";
echo "================================================================================\n";
echo "Restored: " . count($restored) . " pages\n";
foreach ($restored as $item) {
    echo "  - $item\n";
}

echo "\nSkipped: " . count($skipped) . " pages\n";
foreach ($skipped as $item) {
    echo "  - $item\n";
}

echo "\nErrors: " . count($errors) . " pages\n";
foreach ($errors as $item) {
    echo "  - $item\n";
}

exit(count($errors) > 0 ? 1 : 0);
