<?php
/**
 * Einmalig ausführen um Tierliebe-Seite zu erstellen
 * Aufruf: yourdomain.de/wp-content/themes/webworks-theme/create-tierliebe-page.php
 */

// WordPress laden
require_once('../../../wp-load.php');

// Prüfen ob Seite schon existiert
$existing_page = get_page_by_path('tierliebe-quiz');

if ($existing_page) {
    echo "Seite existiert bereits: <a href='" . get_permalink($existing_page->ID) . "'>" . get_permalink($existing_page->ID) . "</a>";
    exit;
}

// Seite erstellen
$page_data = array(
    'post_title'    => 'Bin ich bereit für ein Tier?',
    'post_name'     => 'tierliebe-quiz',
    'post_status'   => 'publish',
    'post_type'     => 'page',
    'post_content'  => '', // Leer, weil Template alles macht
    'page_template' => 'page-tierliebe.php'
);

$page_id = wp_insert_post($page_data);

if ($page_id) {
    echo "✅ Seite erfolgreich erstellt!<br>";
    echo "Seiten-ID: " . $page_id . "<br>";
    echo "URL: <a href='" . get_permalink($page_id) . "'>" . get_permalink($page_id) . "</a><br><br>";
    echo "Du kannst diese Datei jetzt löschen.";
} else {
    echo "❌ Fehler beim Erstellen der Seite.";
}
?>
