#!/usr/bin/env php
<?php
/**
 * Direktes CLI-Script zum Importieren von Qualzucht JSON
 * Kann ohne WordPress-Login ausgeführt werden
 *
 * Upload via FTP, dann per SSH ausführen:
 * php restore-qualzucht-from-json.php
 */

// WordPress laden - Try verschiedene Pfade
define('WP_USE_THEMES', false);

// Script wird in wp-content/themes/webworks-theme/ hochgeladen
$wp_load_paths = array(
    __DIR__ . '/../../../wp-load.php',  // Server-Pfad: /wp-content/themes/webworks-theme/ -> /wp-load.php
    __DIR__ . '/../wp-load.php',         // Lokaler Fallback
);

$wp_loaded = false;
foreach ($wp_load_paths as $path) {
    if (file_exists($path)) {
        require($path);
        $wp_loaded = true;
        break;
    }
}

if (!$wp_loaded) {
    die("ERROR: wp-load.php nicht gefunden\n");
}

echo "===========================================\n";
echo "Qualzucht JSON Import (CLI)\n";
echo "===========================================\n\n";

// JSON content embedded directly
$json_content = '{"hero-titel":"⚠️ Überzüchtung – Wenn Schönheit Leiden bedeutet","hero-untertitel":"Schönheit ist oft teuer bezahlt – und das nicht nur mit Geld. Viele Tiere, die wir \'süß\' oder \'Edelrassen\' nennen, leiden unter genetischen Defekten, weil der Mensch sie für sein Ideal geformt hat.","definition-titel":"Was ist Überzüchtung?","definition-text":"Überzüchtung bedeutet, dass bestimmte Merkmale durch Zucht so stark hervorgehoben werden, dass das Tier darunter leidet.","warum-titel":"Warum passiert das?","warum-liste":"<li>Menschen wollen optische \"Besonderheiten\" (flache Nasen, große Augen, ungewöhnliche Farben)</li>\n<li>Züchter erfüllen diese Wünsche, weil sie sich gut verkaufen</li>\n<li>Tiere mit extremen Merkmalen werden weiterverpaart, auch wenn sie krank sind</li>","problem-titel":"Warum das ein Problem ist:","problem-liste":"<li>Tiere leiden still, weil ihre Schmerzen nicht sofort sichtbar sind</li>\n<li>Besitzer glauben oft, sie hätten ein \"besonders schönes Tier\", verstehen aber nicht, dass das Tier leidet</li>\n<li>Überzüchtung ist nicht \"natürlich\" – sie ist ein Ergebnis von menschlichem Wunschdenken</li>","definition-highlight":"💔 Schönheit darf nicht weh tun – auch nicht bei Tieren.","rassen-titel":"Die 8 häufigsten Qualzuchten","rasse1-titel":"Mops & Französische Bulldogge","rasse1-herkunft":"Gezielt gezüchtet für \"süße\" flache Gesichter und Falten","rasse1-leiden-titel":"Leiden:","rasse1-leiden-liste":"<li>Atemnot (Brachyzephalie, verengte Nasenlöcher)</li>\n<li>Augenprobleme (hervorstehend, trockene Hornhaut)</li>\n<li>Hautentzündungen (Falteninfektionen)</li>","rasse1-wissen":"<strong>💡 Wissen:</strong> Auch mit OP können viele Probleme nicht vollständig behoben werden.","rasse2-titel":"Perserkatze","rasse2-herkunft":"Flaches Gesicht, große Augen – \"edler Look\"","rasse2-leiden-titel":"Leiden:","rasse2-leiden-liste":"<li>Verstopfte Tränenkanäle = ständiges Augentränen</li>\n<li>Atemprobleme durch flache Nasenpartie</li>\n<li>Zahnfehlstellungen</li>\n<li>Hautfalten = Pilzinfektionen</li>","rasse2-wissen":"<strong>💡 Wissen:</strong> Viele Perser sind lebenslang auf Augenpflege angewiesen.","rasse3-titel":"Schauwellensittich","rasse3-herkunft":"Überlange Federn für \"flauschiges\" Aussehen (als Ausstellungsrasse gezüchtet)","rasse3-leiden-titel":"Leiden:","rasse3-leiden-liste":"<li>Sichtprobleme (Augen unter Federn verborgen)</li>\n<li>Schnabeldeformationen = Kauprobleme</li>\n<li>Schwaches Immunsystem durch Inzucht</li>","rasse3-wissen":"<strong>💡 Wissen:</strong> Ein \"schöner\" Welli kann oft nicht mehr richtig fliegen.","rasse4-titel":"Widderkaninchen","rasse4-herkunft":"Hängende Ohren für \"niedliches\" Aussehen","rasse4-leiden-titel":"Leiden:","rasse4-leiden-liste":"<li>Ohrenfehlstellung = Schwerhörigkeit</li>\n<li>Gehörgangsentzündungen</li>\n<li>Nervenprobleme durch verformten Schädel</li>","rasse4-wissen":"<strong>💡 Wissen:</strong> Die \"süßen\" Ohren sind ein Schmerzfaktor.","rasse5-titel":"Schleierschwanz-Goldfisch","rasse5-herkunft":"Überlange Flossen, kugeliger Körper","rasse5-leiden-titel":"Leiden:","rasse5-leiden-liste":"<li>Schwimmprobleme (Schleppflossen)</li>\n<li>Augenprobleme (hervorstehend, verletzungsanfällig)</li>\n<li>Skelettdeformationen</li>","rasse5-wissen":"<strong>💡 Wissen:</strong> Das \"prachtvolle\" Aussehen ist in Wirklichkeit eine Behinderung.","rasse6-titel":"Albino-Reptilien","rasse6-herkunft":"Genmutation für besondere Farbvarianten","rasse6-leiden-titel":"Leiden:","rasse6-leiden-liste":"<li>Sehschwäche durch Pigmentmangel</li>\n<li>Lichtempfindlichkeit = Stress</li>\n<li>Höhere Anfälligkeit für Krankheiten</li>","rasse6-wissen":"<strong>💡 Wissen:</strong> Albinos überleben in der Natur fast nie – als Haustiere auch nur schwer.","rasse7-titel":"Malteser & Zwerghunde","rasse7-herkunft":"Extreme Kleinzüchtung für dekoratives Aussehen","rasse7-leiden-titel":"Leiden:","rasse7-leiden-liste":"<li>Haarpflege aufwendig = Hautprobleme bei Vernachlässigung</li>\n<li>Kleine Körpergröße = Gelenkprobleme</li>\n<li>Überzüchtete Tränenkanäle</li>","rasse7-wissen":"<strong>💡 Wissen:</strong> Je kleiner ein Hund gezüchtet wird, desto mehr Gesundheitsprobleme entstehen.","rasse8-titel":"Scottish-Fold-Katze","rasse8-herkunft":"Genmutation für gefaltete Ohren","rasse8-leiden-titel":"Leiden:","rasse8-leiden-liste":"<li>Schmerzhafte Gelenkdeformationen</li>\n<li>Knorpelprobleme (Osteochondrodysplasie)</li>\n<li>Ohrenentzündungen</li>","rasse8-wissen":"<strong>💡 Wissen:</strong> Die \"süßen\" Ohren bedeuten für die Katze chronischen Schmerz.","cta-titel":"Möchtest du wirklich Tierliebe zeigen?","cta-text":"Dann adoptiere aus dem Tierschutz – keine Qualzucht, keine Massenzucht, nur echte zweite Chancen."}';

echo "[1/3] JSON Content validieren...\n";

// Validate JSON
$json_data = json_decode($json_content, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die("ERROR: Ungültiges JSON-Format: " . json_last_error_msg() . "\n");
}

echo "      OK: JSON ist valide (" . count($json_data) . " Felder)\n\n";

echo "[2/3] Post suchen/erstellen...\n";

// Check if post already exists
$existing = get_posts(array(
    'post_type'   => 'tierliebe_text',
    'name'        => 'qualzucht',
    'post_status' => 'any',
    'numberposts' => 1
));

if (!empty($existing)) {
    // Update existing
    $post_id = $existing[0]->ID;
    echo "      OK: Post existiert (ID: $post_id)\n\n";

    echo "[3/3] Post aktualisieren...\n";

    // Temporarily disable content filters
    remove_filter('content_save_pre', 'wp_filter_post_kses');
    remove_filter('content_save_pre', 'wp_targeted_link_rel');
    remove_filter('content_save_pre', 'convert_invalid_entities');

    $result = wp_update_post(array(
        'ID'           => $post_id,
        'post_content' => $json_content
    ));

    // Re-enable filters
    add_filter('content_save_pre', 'wp_filter_post_kses');
    add_filter('content_save_pre', 'wp_targeted_link_rel');
    add_filter('content_save_pre', 'convert_invalid_entities');

    if ($result && !is_wp_error($result)) {
        echo "      OK: Post aktualisiert\n\n";

        // Clear cache
        delete_transient('tierliebe_text_qualzucht');
        wp_cache_delete($post_id, 'posts');
        wp_cache_delete($post_id, 'post_meta');

        if (function_exists('wp_cache_flush')) {
            wp_cache_flush();
        }

        echo "[CACHE] Cache gelöscht\n\n";
        echo "===========================================\n";
        echo "SUCCESS: Import erfolgreich!\n";
        echo "===========================================\n";
        echo "\nTeste: https://vm.andersen-webworks.de/tierliebe-qualzucht/\n\n";
    } else {
        echo "ERROR: Fehler beim Aktualisieren\n";
        if (is_wp_error($result)) {
            echo "       " . $result->get_error_message() . "\n";
        }
        exit(1);
    }
} else {
    // Create new
    echo "      INFO: Post existiert nicht, erstelle neu...\n\n";

    echo "[3/3] Post erstellen...\n";

    // Temporarily disable content filters
    remove_filter('content_save_pre', 'wp_filter_post_kses');
    remove_filter('content_save_pre', 'wp_targeted_link_rel');
    remove_filter('content_save_pre', 'convert_invalid_entities');

    $post_id = wp_insert_post(array(
        'post_title'   => 'Tierliebe - Qualzucht',
        'post_content' => $json_content,
        'post_status'  => 'publish',
        'post_type'    => 'tierliebe_text',
        'post_name'    => 'qualzucht',
        'post_author'  => 1
    ));

    // Re-enable filters
    add_filter('content_save_pre', 'wp_filter_post_kses');
    add_filter('content_save_pre', 'wp_targeted_link_rel');
    add_filter('content_save_pre', 'convert_invalid_entities');

    if ($post_id && !is_wp_error($post_id)) {
        echo "      OK: Neuer Post erstellt (ID: $post_id)\n\n";
        echo "===========================================\n";
        echo "SUCCESS: Import erfolgreich!\n";
        echo "===========================================\n";
        echo "\nTeste: https://vm.andersen-webworks.de/tierliebe-qualzucht/\n\n";
    } else {
        echo "ERROR: Fehler beim Import\n";
        if (is_wp_error($post_id)) {
            echo "       " . $post_id->get_error_message() . "\n";
        }
        exit(1);
    }
}
