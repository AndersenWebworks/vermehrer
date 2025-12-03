<?php
/**
 * Restore Tierliebe Pages from Annemarie's Revisions
 *
 * Direct DB access to fetch and restore revisions
 *
 * Usage: Upload to server and run via browser:
 * https://vm.andersen-webworks.de/restore-revisions.php
 *
 * Author: Claude (SYN-00)
 * Date: 2025-12-03
 */

// Security: Only allow execution from localhost or with secret key
$secret_key = 'restore2025';
if (!isset($_GET['key']) || $_GET['key'] !== $secret_key) {
    die('Access denied. Use: ?key=' . $secret_key);
}

// Load WordPress
require_once(__DIR__ . '/wp-load.php');

if (!defined('ABSPATH')) {
    die('WordPress not loaded!');
}

// Check user permissions
if (!current_user_can('manage_options')) {
    die('Insufficient permissions! Please log in as admin first.');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Restore Tierliebe Revisions</title>
    <style>
        body { font-family: monospace; padding: 20px; background: #f5f5f5; }
        .log { background: white; padding: 20px; border-radius: 5px; margin: 20px 0; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        .warning { color: orange; font-weight: bold; }
        .info { color: blue; }
        pre { background: #f0f0f0; padding: 10px; overflow: auto; }
        table { border-collapse: collapse; width: 100%; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #4CAF50; color: white; }
        .action-restore { background: #4CAF50; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; }
        .action-skip { background: #999; color: white; padding: 5px 10px; border-radius: 3px; }
    </style>
</head>
<body>

<h1>Restore Tierliebe Pages from Annemarie's Revisions</h1>

<div class="log">

<?php

// Configuration
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

$annemarie_user_id = 2; // User ID von "Annemarie Andersen"
$eandersen_user_id = 1; // User ID von "EAndersen"

// Phase 1: Analyse
if (!isset($_GET['action']) || $_GET['action'] === 'analyse') {
    echo "<h2>Phase 1: Analyse</h2>\n";
    echo "<p>Checking all pages for Annemarie revisions...</p>\n";

    echo "<table>\n";
    echo "<tr><th>Page ID</th><th>Slug</th><th>Current Author</th><th>Last Modified</th><th>Annemarie Revision</th><th>Content Keys</th><th>Action</th></tr>\n";

    foreach ($pages as $page_id => $slug) {
        // Get current page
        $post = get_post($page_id);
        if (!$post) {
            echo "<tr><td>$page_id</td><td>$slug</td><td colspan='5' class='error'>Page not found!</td></tr>\n";
            continue;
        }

        $current_author_id = $post->post_author;
        $current_author = get_userdata($current_author_id);
        $current_author_name = $current_author ? $current_author->display_name : 'Unknown';
        $current_modified = $post->post_modified;

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
            echo "<tr><td>$page_id</td><td>$slug</td><td>$current_author_name</td><td>$current_modified</td><td class='warning'>No Annemarie revision found</td><td>-</td><td class='action-skip'>SKIP</td></tr>\n";
            continue;
        }

        // Validate revision content
        $revision_content = $annemarie_revision->post_content;
        $content_data = json_decode($revision_content, true);
        $key_count = is_array($content_data) ? count($content_data) : 0;

        $revision_date = $annemarie_revision->post_modified;
        $revision_id = $annemarie_revision->ID;

        // Determine action
        if ($current_author_id == $eandersen_user_id && $key_count >= 10) {
            $action = "<a href='?key=$secret_key&action=restore&page_id=$page_id&revision_id=$revision_id' class='action-restore'>RESTORE</a>";
            $status_class = 'success';
        } elseif ($key_count < 10) {
            $action = "<span class='action-skip'>INVALID (too few keys)</span>";
            $status_class = 'error';
        } else {
            $action = "<span class='action-skip'>SKIP (already Annemarie)</span>";
            $status_class = 'info';
        }

        echo "<tr class='$status_class'>";
        echo "<td>$page_id</td>";
        echo "<td>$slug</td>";
        echo "<td>$current_author_name</td>";
        echo "<td>$current_modified</td>";
        echo "<td>Rev $revision_id ($revision_date)</td>";
        echo "<td>$key_count keys</td>";
        echo "<td>$action</td>";
        echo "</tr>\n";
    }

    echo "</table>\n";

    echo "<p><a href='?key=$secret_key&action=restore_all' style='background:#f44336;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;display:inline-block;margin-top:20px;'>RESTORE ALL (Dry Run)</a></p>\n";
}

// Phase 2: Restore Single Page
elseif ($_GET['action'] === 'restore' && isset($_GET['page_id']) && isset($_GET['revision_id'])) {
    $page_id = intval($_GET['page_id']);
    $revision_id = intval($_GET['revision_id']);

    echo "<h2>Phase 2: Restore Single Page</h2>\n";
    echo "<p><strong>Page ID:</strong> $page_id</p>\n";
    echo "<p><strong>Revision ID:</strong> $revision_id</p>\n";

    // Get revision
    $revision = get_post($revision_id);
    if (!$revision) {
        echo "<p class='error'>Revision not found!</p>\n";
        exit;
    }

    // Validate content
    $revision_content = $revision->post_content;
    $content_data = json_decode($revision_content, true);
    $key_count = is_array($content_data) ? count($content_data) : 0;

    echo "<p><strong>Content Keys:</strong> $key_count</p>\n";

    if ($key_count < 10) {
        echo "<p class='error'>ERROR: Too few keys ($key_count < 10). Cannot restore!</p>\n";
        echo "<p><a href='?key=$secret_key'>Back to Analysis</a></p>\n";
        exit;
    }

    echo "<pre>" . htmlspecialchars(substr($revision_content, 0, 500)) . "...</pre>\n";

    // Confirm
    if (!isset($_GET['confirm'])) {
        echo "<p class='warning'>Are you sure you want to restore this revision?</p>\n";
        echo "<p><a href='?key=$secret_key&action=restore&page_id=$page_id&revision_id=$revision_id&confirm=yes' style='background:#4CAF50;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;'>YES, RESTORE</a> ";
        echo "<a href='?key=$secret_key' style='background:#999;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;'>Cancel</a></p>\n";
        exit;
    }

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
        echo "<p class='error'>ERROR: Database update failed!</p>\n";
        echo "<p><strong>Error:</strong> " . $wpdb->last_error . "</p>\n";
    } else {
        echo "<p class='success'>SUCCESS: Page $page_id restored from revision $revision_id!</p>\n";

        // Clear cache
        delete_transient('tierliebe_page_content_v3_' . $page_id);
        delete_transient('tierliebe_page_content_v4_' . $page_id);

        echo "<p class='info'>Cache cleared (v3 + v4)</p>\n";
    }

    echo "<p><a href='?key=$secret_key'>Back to Analysis</a></p>\n";
}

// Phase 3: Restore All
elseif ($_GET['action'] === 'restore_all') {
    echo "<h2>Phase 3: Restore All Pages</h2>\n";
    echo "<p class='warning'>This will restore ALL pages with EAndersen author to their last Annemarie revision.</p>\n";

    // TODO: Implement batch restore
    echo "<p class='error'>Not implemented yet! Use single restore for now.</p>\n";
    echo "<p><a href='?key=$secret_key'>Back to Analysis</a></p>\n";
}

?>

</div>

</body>
</html>
