<?php
/**
 * Restore Tierliebe Pages - Direct DB Access
 *
 * NO WordPress loading - direct mysqli access
 *
 * Author: Claude (SYN-00)
 * Date: 2025-12-03
 */

// Security
$secret_key = 'restore2025';
if (!isset($_GET['key']) || $_GET['key'] !== $secret_key) {
    die('Access denied');
}

// DB Config (from tools/archive/import-via-db.js)
$db_host = 'w018c99c.kasserver.com';
$db_user = 'd0435109';
$db_pass = 'kvXc2VmwxheamdqsSNE2';
$db_name = 'd0435109';

// Connect
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_error) {
    die('DB Connection failed: ' . $mysqli->connect_error);
}

$mysqli->set_charset('utf8mb4');

// Find table prefix
$result = $mysqli->query("SHOW TABLES LIKE '%posts'");
$table = $result->fetch_row()[0];
$prefix = str_replace('posts', '', $table);

echo "<!DOCTYPE html><html><head><title>Restore - Direct DB</title><style>body{font-family:monospace;padding:20px;background:#f5f5f5;}.log{background:white;padding:20px;border-radius:5px;margin:20px 0;}.success{color:green;font-weight:bold;}.error{color:red;font-weight:bold;}.warning{color:orange;font-weight:bold;}.info{color:blue;}</style></head><body><div class='log'>\n";

echo "<h1>Restore Tierliebe Pages - Direct DB Access</h1>\n";

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

$annemarie_user_id = 2;
$eandersen_user_id = 1;

$restored = [];
$skipped = [];
$errors = [];

foreach ($pages as $page_id => $slug) {
    echo "<h3>Processing: $slug (ID: $page_id)</h3>\n";

    // Get current page
    $stmt = $mysqli->prepare("SELECT post_author, post_modified FROM {$prefix}posts WHERE ID = ?");
    $stmt->bind_param('i', $page_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();

    if (!$post) {
        $errors[] = "$slug: Page not found";
        echo "<p class='error'>ERROR: Page not found!</p>\n";
        continue;
    }

    $current_author_id = $post['post_author'];

    // Skip if not EAndersen
    if ($current_author_id != $eandersen_user_id) {
        $skipped[] = "$slug: Already Annemarie (author: $current_author_id)";
        echo "<p class='info'>SKIP: Current author is not EAndersen</p>\n";
        continue;
    }

    // Get all revisions (sorted by date DESC)
    $stmt = $mysqli->prepare("SELECT ID, post_author, post_content, post_modified FROM {$prefix}posts WHERE post_type = 'revision' AND post_parent = ? ORDER BY post_modified DESC");
    $stmt->bind_param('i', $page_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Find last Annemarie revision
    $annemarie_revision = null;
    while ($revision = $result->fetch_assoc()) {
        if ($revision['post_author'] == $annemarie_user_id) {
            $annemarie_revision = $revision;
            break;
        }
    }

    if (!$annemarie_revision) {
        $errors[] = "$slug: No Annemarie revision found";
        echo "<p class='error'>ERROR: No Annemarie revision found!</p>\n";
        continue;
    }

    // Validate content
    $revision_content = $annemarie_revision['post_content'];
    $content_data = json_decode($revision_content, true);
    $key_count = is_array($content_data) ? count($content_data) : 0;

    if ($key_count < 10) {
        $errors[] = "$slug: Too few keys ($key_count < 10)";
        echo "<p class='error'>ERROR: Too few keys ($key_count < 10)</p>\n";
        continue;
    }

    $revision_id = $annemarie_revision['ID'];
    $revision_date = $annemarie_revision['post_modified'];

    echo "<p class='info'>Found Annemarie revision: $revision_id ($revision_date) with $key_count keys</p>\n";

    // DRY RUN unless confirmed
    if (!isset($_GET['confirm'])) {
        echo "<p class='warning'>DRY RUN: Would restore from revision $revision_id</p>\n";
        $skipped[] = "$slug: Dry run";
        continue;
    }

    // Restore
    $stmt = $mysqli->prepare("UPDATE {$prefix}posts SET post_content = ? WHERE ID = ?");
    $stmt->bind_param('si', $revision_content, $page_id);
    $result = $stmt->execute();

    if (!$result) {
        $errors[] = "$slug: Database update failed - " . $mysqli->error;
        echo "<p class='error'>ERROR: Database update failed!</p>\n";
        continue;
    }

    $restored[] = "$slug (Rev: $revision_id)";
    echo "<p class='success'>SUCCESS: Restored from revision $revision_id</p>\n";
}

// Summary
echo "\n<hr>\n<h2>Summary</h2>\n";
echo "<p><strong>Restored:</strong> " . count($restored) . " pages</p>\n";
if (count($restored) > 0) {
    echo "<ul>\n";
    foreach ($restored as $item) {
        echo "<li class='success'>$item</li>\n";
    }
    echo "</ul>\n";
}

echo "<p><strong>Skipped:</strong> " . count($skipped) . " pages</p>\n";
if (count($skipped) > 0) {
    echo "<ul>\n";
    foreach ($skipped as $item) {
        echo "<li class='info'>$item</li>\n";
    }
    echo "</ul>\n";
}

echo "<p><strong>Errors:</strong> " . count($errors) . " pages</p>\n";
if (count($errors) > 0) {
    echo "<ul>\n";
    foreach ($errors as $item) {
        echo "<li class='error'>$item</li>\n";
    }
    echo "</ul>\n";
}

if (!isset($_GET['confirm']) && count($restored) == 0 && count($errors) == 0) {
    echo "\n<p class='warning'>This was a DRY RUN. To actually restore, add &confirm=yes to the URL:</p>\n";
    echo "<p><a href='?key=$secret_key&confirm=yes' style='background:#f44336;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;display:inline-block;'>CONFIRM: RESTORE ALL</a></p>\n";
}

echo "</div></body></html>";

$mysqli->close();
