<?php
/**
 * Mass Import Script für alle Tierliebe Markdown-Dateien
 * ACHTUNG: Nach dem Import diese Datei löschen!
 *
 * Aufruf: https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/import-all-tierliebe-texts.php
 */

// WordPress laden
require_once('../../../wp-load.php');

// Security: Nur für Admins
if (!current_user_can('manage_options')) {
    die('Keine Berechtigung');
}

echo "<h1>Massen-Import: Alle Tierliebe Texte</h1>";
echo "<style>body { font-family: system-ui; padding: 20px; } .success { color: green; } .error { color: red; } .info { color: blue; }</style>";

// Liste aller Seiten mit ihren Markdown-Dateien
$pages = array(
    'home' => '../../../texte/page-tierliebe-home.md',
    'test' => '../../../texte/page-tierliebe-test.md',
    'hunde' => '../../../texte/page-tierliebe-hunde.md',
    'katzen' => '../../../texte/page-tierliebe-katzen.md',
    'kleintiere' => '../../../texte/page-tierliebe-kleintiere.md',
    'exoten' => '../../../texte/page-tierliebe-exoten.md',
    'qualzucht' => '../../../texte/page-tierliebe-qualzucht.md',
    'adoption' => '../../../texte/page-tierliebe-adoption.md',
    'wissen' => '../../../texte/page-tierliebe-wissen.md',
    'irrtuemer' => '../../../texte/page-tierliebe-irrtuemer.md',
    'kontakt' => '../../../texte/page-tierliebe-kontakt.md'
);

$imported = 0;
$updated = 0;
$errors = 0;

foreach ($pages as $slug => $file_path) {
    echo "<h2>📄 Importiere: $slug</h2>";

    // Check if file exists
    if (!file_exists($file_path)) {
        echo "<p class='error'>✗ Datei nicht gefunden: $file_path</p>";
        $errors++;
        continue;
    }

    // Read Markdown content
    $markdown_content = file_get_contents($file_path);

    if (empty($markdown_content)) {
        echo "<p class='error'>✗ Datei ist leer</p>";
        $errors++;
        continue;
    }

    echo "<p class='info'>→ Markdown geladen (" . strlen($markdown_content) . " Zeichen)</p>";

    // Check if post already exists
    $existing = get_posts(array(
        'post_type'   => 'tierliebe_text',
        'name'        => 'tierliebe-' . $slug,
        'post_status' => 'any',
        'numberposts' => 1
    ));

    if (!empty($existing)) {
        // Update existing
        $post_id = $existing[0]->ID;

        $result = wp_update_post(array(
            'ID'           => $post_id,
            'post_content' => $markdown_content
        ));

        if ($result) {
            echo "<p class='success'>✓ Text aktualisiert (ID: $post_id)</p>";
            $updated++;

            // Clear cache
            delete_transient('tierliebe_text_' . $slug);
            echo "<p class='info'>→ Cache gelöscht</p>";
        } else {
            echo "<p class='error'>✗ Fehler beim Aktualisieren</p>";
            $errors++;
        }
    } else {
        // Create new
        $post_id = wp_insert_post(array(
            'post_title'   => 'Tierliebe - ' . ucfirst($slug),
            'post_content' => $markdown_content,
            'post_status'  => 'publish',
            'post_type'    => 'tierliebe_text',
            'post_name'    => 'tierliebe-' . $slug,
            'post_author'  => 1
        ));

        if ($post_id && !is_wp_error($post_id)) {
            echo "<p class='success'>✓ Text neu importiert (ID: $post_id)</p>";
            $imported++;
        } else {
            echo "<p class='error'>✗ Fehler beim Import</p>";
            if (is_wp_error($post_id)) {
                echo "<p class='error'>" . $post_id->get_error_message() . "</p>";
            }
            $errors++;
        }
    }

    echo "<hr>";
}

echo "<h2>📊 Zusammenfassung</h2>";
echo "<ul>";
echo "<li class='success'>✓ Neu importiert: $imported</li>";
echo "<li class='info'>→ Aktualisiert: $updated</li>";
echo "<li class='error'>✗ Fehler: $errors</li>";
echo "</ul>";

echo "<hr>";
echo "<p><strong>WICHTIG:</strong> Lösche diese Datei jetzt: <code>webworks-theme/import-all-tierliebe-texts.php</code></p>";
echo "<p><a href='" . admin_url('edit.php?post_type=tierliebe_text') . "'>→ Zu den Tierliebe Texten im Backend</a></p>";
