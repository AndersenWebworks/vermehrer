<?php
/**
 * Initialisiert alle Tierliebe-Seiten mit den Fallback-Texten aus den PHP-Templates
 * Führe dieses Script einmalig aus, um alle Seiten-Inhalte in die Datenbank zu laden
 */

// WordPress laden
define('WP_USE_THEMES', false);
require(__DIR__ . '/wp-load.php');

// Nur für Admins
if (!current_user_can('administrator')) {
    die('Zugriff verweigert. Nur Administratoren können dieses Script ausführen.');
}

echo "<h1>Tierliebe Content Initialisierung</h1>\n";
echo "<p>Initialisiere alle Seiten mit Fallback-Texten...</p>\n";

// Liste der Seiten mit ihren Template-Dateien
$pages = [
    'adoption' => 'page-tierliebe-adoption.php',
    'qualzucht' => 'page-tierliebe-qualzucht.php',
    'wissen' => 'page-tierliebe-wissen.php',
    'hunde' => 'page-tierliebe-hunde.php',
    'katzen' => 'page-tierliebe-katzen.php',
    'kleintiere' => 'page-tierliebe-kleintiere.php',
    'exoten' => 'page-tierliebe-exoten.php',
];

foreach ($pages as $slug => $template_file) {
    echo "<h2>Verarbeite: $slug</h2>\n";

    $template_path = get_template_directory() . '/' . $template_file;

    if (!file_exists($template_path)) {
        echo "<p style='color: red;'>✗ Template nicht gefunden: $template_file</p>\n";
        continue;
    }

    // Template-Datei einlesen
    $template_content = file_get_contents($template_path);

    // Extrahiere alle editable Felder mit data-key und Fallback-Texten
    $content_data = [];

    // Pattern für: data-key="KEY"...<?php echo isset($content['KEY']) ? ... : 'FALLBACK'; ?>
    // Komplexes Regex um alle Varianten zu erfassen
    preg_match_all(
        '/data-key="([^"]+)"[^>]*>(?:.*?)<\?php\s+echo\s+isset\(\$content\[[\'"]([^"\']+)[\'"]\]\)\s*\?\s*(?:wp_kses_post|esc_html|esc_url)\((?:strip_tags\()?\$content\[[\'"][^\'"]+[\'"]\]\)?(?:\))?\s*:\s*[\'"]([^\'"]*(?:\\\\.[^\'"]*)*)[\'"];?\s*\?>/s',
        $template_content,
        $matches,
        PREG_SET_ORDER
    );

    // Einfacheres Pattern für einfache Fälle
    if (empty($matches)) {
        preg_match_all(
            '/data-key="([^"]+)"/',
            $template_content,
            $key_matches
        );

        foreach ($key_matches[1] as $key) {
            // Suche nach dem zugehörigen Fallback-Text
            if (preg_match(
                '/\$content\[[\'"]' . preg_quote($key, '/') . '[\'"]\][^:]*:\s*[\'"]([^\'"]*)[\'"]/s',
                $template_content,
                $fallback_match
            )) {
                $content_data[$key] = stripslashes($fallback_match[1]);
            }
        }
    } else {
        foreach ($matches as $match) {
            $key = $match[1];
            $fallback = stripslashes($match[3]);
            $content_data[$key] = $fallback;
        }
    }

    // Zusätzlich: Listen-Inhalte extrahieren
    // Pattern: <ul class="editable" data-key="KEY">...</ul>
    preg_match_all(
        '/data-key="([^"]+)"[^>]*>\s*(<li>.*?<\/li>\s*)+<\/ul>/s',
        $template_content,
        $list_matches,
        PREG_SET_ORDER
    );

    foreach ($list_matches as $match) {
        $key = $match[1];
        if (!isset($content_data[$key])) {
            // Extrahiere den kompletten Listen-Inhalt
            preg_match('/<ul[^>]*data-key="' . preg_quote($key, '/') . '"[^>]*>(.*?)<\/ul>/s', $template_content, $list_content);
            if (!empty($list_content[1])) {
                $content_data[$key] = trim($list_content[1]);
            }
        }
    }

    if (empty($content_data)) {
        echo "<p style='color: orange;'>⚠ Keine editierbaren Felder gefunden</p>\n";
        continue;
    }

    echo "<p>✓ " . count($content_data) . " Felder extrahiert</p>\n";

    // Prüfe ob Post bereits existiert
    $existing_post = get_posts([
        'post_type' => 'tierliebe_text',
        'name' => $slug,
        'posts_per_page' => 1,
        'post_status' => 'any'
    ]);

    if (!empty($existing_post)) {
        $post_id = $existing_post[0]->ID;
        echo "<p>ℹ Post existiert bereits (ID: $post_id)</p>\n";

        // Aktualisiere bestehenden Post
        wp_update_post([
            'ID' => $post_id,
            'post_status' => 'publish'
        ]);
    } else {
        // Erstelle neuen Post
        $post_id = wp_insert_post([
            'post_title' => ucfirst($slug),
            'post_name' => $slug,
            'post_type' => 'tierliebe_text',
            'post_status' => 'publish',
            'post_author' => get_current_user_id()
        ]);

        if (is_wp_error($post_id)) {
            echo "<p style='color: red;'>✗ Fehler beim Erstellen: " . $post_id->get_error_message() . "</p>\n";
            continue;
        }

        echo "<p>✓ Neuer Post erstellt (ID: $post_id)</p>\n";
    }

    // Speichere Content-Daten
    update_post_meta($post_id, 'tierliebe_content', $content_data);

    echo "<p style='color: green;'><strong>✓ Erfolgreich initialisiert!</strong></p>\n";
    echo "<hr>\n";
}

echo "<h2 style='color: green;'>✓ Alle Seiten wurden erfolgreich initialisiert!</h2>\n";
echo "<p><a href='/wp-admin/edit.php?post_type=tierliebe_text'>→ Zu den Tierliebe Texten</a></p>\n";
echo "<p><strong>Hinweis:</strong> Du kannst jetzt alle Texte über das WordPress-Backend bearbeiten.</p>\n";
