<?php
/**
 * Cache Clearer für Tierliebe Texte
 * Aufruf: https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/clear-cache.php
 */

require_once('../../../wp-load.php');

// Security: Nur für Admins
if (!current_user_can('manage_options')) {
    die('Keine Berechtigung');
}

echo "<h1>Cache löschen</h1>";

// Clear home cache
delete_transient('tierliebe_text_home');

echo "<p style='color: green;'>✓ Cache für 'home' gelöscht</p>";
echo "<p><a href='" . home_url('/tierliebe-home') . "'>Zur Startseite</a></p>";
