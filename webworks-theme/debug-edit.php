<?php
/**
 * Debug Script für Edit-System
 * Aufruf: https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/debug-edit.php
 */

require_once('../../../wp-load.php');

if (!current_user_can('manage_options')) {
    die('Keine Berechtigung');
}

echo "<h1>Debug: Edit-System</h1>";
echo "<style>body { font-family: monospace; padding: 20px; } pre { background: #f5f5f5; padding: 10px; }</style>";

// Test 1: Check if CPT exists
echo "<h2>1. CPT 'tierliebe_text' registriert?</h2>";
$post_types = get_post_types(array('name' => 'tierliebe_text'), 'objects');
if (!empty($post_types)) {
    echo "<p style='color: green;'>✓ CPT existiert</p>";
} else {
    echo "<p style='color: red;'>✗ CPT nicht gefunden</p>";
}

// Test 2: Check if home post exists
echo "<h2>2. 'tierliebe-home' Post vorhanden?</h2>";
$home_post = get_posts(array(
    'post_type' => 'tierliebe_text',
    'name' => 'tierliebe-home',
    'posts_per_page' => 1
));

if (!empty($home_post)) {
    echo "<p style='color: green;'>✓ Post gefunden (ID: " . $home_post[0]->ID . ")</p>";

    $content = $home_post[0]->post_content;
    echo "<h3>Content-Format:</h3>";

    if (strpos($content, '<!--TIERLIEBE_HTML_START-->') !== false) {
        echo "<p style='color: blue;'>Format: JSON (neu)</p>";

        preg_match('/<!--TIERLIEBE_HTML_START-->(.+?)<!--TIERLIEBE_HTML_END-->/s', $content, $matches);
        if (isset($matches[1])) {
            $decoded = json_decode($matches[1], true);
            echo "<h4>Dekodierte Keys:</h4>";
            echo "<pre>" . print_r(array_keys($decoded), true) . "</pre>";

            echo "<h4>Beispiel-Content (erste 3 Keys):</h4>";
            $count = 0;
            foreach ($decoded as $key => $value) {
                if ($count >= 3) break;
                echo "<strong>$key:</strong><br>";
                echo "<pre>" . htmlspecialchars(substr($value, 0, 200)) . "...</pre>";
                $count++;
            }
        }
    } else if (strpos($content, '##') !== false) {
        echo "<p style='color: orange;'>Format: Markdown (alt)</p>";
        echo "<h4>Erste 500 Zeichen:</h4>";
        echo "<pre>" . htmlspecialchars(substr($content, 0, 500)) . "</pre>";
    } else {
        echo "<p style='color: red;'>Format: Unbekannt</p>";
        echo "<pre>" . htmlspecialchars(substr($content, 0, 500)) . "</pre>";
    }
} else {
    echo "<p style='color: red;'>✗ Post nicht gefunden</p>";
}

// Test 3: Test get_tierliebe_text() function
echo "<h2>3. get_tierliebe_text('home') Test</h2>";
$result = get_tierliebe_text('home');

if (!empty($result)) {
    echo "<p style='color: green;'>✓ Funktion gibt Daten zurück</p>";
    echo "<h4>Verfügbare Keys:</h4>";
    echo "<pre>" . print_r(array_keys($result), true) . "</pre>";

    echo "<h4>Beispiel-Daten:</h4>";
    $count = 0;
    foreach ($result as $key => $value) {
        if ($count >= 3) break;
        echo "<strong>$key:</strong><br>";
        echo "<pre>" . htmlspecialchars(substr($value, 0, 150)) . "...</pre>";
        $count++;
    }
} else {
    echo "<p style='color: red;'>✗ Funktion gibt leeres Array zurück</p>";
}

// Test 4: Check if JS/CSS are loaded
echo "<h2>4. Assets registriert?</h2>";
global $wp_scripts, $wp_styles;

if (isset($wp_scripts->registered['tierliebe-edit'])) {
    echo "<p style='color: green;'>✓ JS registriert: " . $wp_scripts->registered['tierliebe-edit']->src . "</p>";
} else {
    echo "<p style='color: red;'>✗ JS nicht registriert</p>";
}

if (isset($wp_styles->registered['tierliebe-edit'])) {
    echo "<p style='color: green;'>✓ CSS registriert: " . $wp_styles->registered['tierliebe-edit']->src . "</p>";
} else {
    echo "<p style='color: red;'>✗ CSS nicht registriert</p>";
}

echo "<hr>";
echo "<p><a href='" . home_url('/tierliebe-home') . "'>→ Zur Home-Seite</a></p>";
