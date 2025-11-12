<?php
/**
 * Restore Home Page Default Content
 * Run via: curl https://vm.andersen-webworks.de/restore-home-content.php
 */

// Load WordPress
require_once dirname(dirname(__DIR__)) . '/wp-load.php';

// Find Home page
$home_page = get_page_by_path('tierliebe-start');

if (!$home_page) {
    echo "ERROR: Home page (tierliebe-start) not found!\n";
    exit(1);
}

echo "Found Home page: ID = {$home_page->ID}\n";

// Default content für Home page - KEYS only (structure will be read from template)
$default_keys = array(
    'header-titel' => 'Du liebst Tiere?',
    'untertitel' => 'Dann lies hier nicht, was du hören willst – sondern was du wissen musst. Ehrlich. Klar. Und im Sinne der Tiere.',
    'einleitungstext' => 'Bevor du ein Tier aufnimmst – Hund, Katze, Kaninchen, Welli oder Goldfisch – nimm dir ein paar Minuten für die Wahrheit. Denn: Gute Absichten reichen nicht. Verantwortung schon.',
    'button-test' => '✨ Bin ich bereit für ein Tier?',
    'button-test-url' => home_url('/tierliebe-test'),
    'button-wissen' => '📚 Was muss ich wissen?',
    'button-wissen-url' => home_url('/tierliebe-wissen'),
    'sektion-bin-ich-bereit-titel' => 'Bin ich bereit für ein Tier?',
    'sektion-bin-ich-bereit-text' => 'Du denkst darüber nach, ein Tier aufzunehmen? Dann nimm dir bitte kurz Zeit für diese Fragen – ganz ehrlich, nur für dich. Denn ein Tier ist keine Phase. Es ist ein Teil deines Lebens – und komplett abhängig von dir.',
    'zentrale-frage' => 'Bist du der Typ Tierhalter, den Tiere sich wünschen würden?',
    'info-box-bevor-du-ein-tier-holst-frag-dich-ehrlich' => 'Bevor du ein Tier holst, frag dich ehrlich:',
    'info-box-checkliste' => '<li>Habe ich <strong>Zeit</strong> – täglich, über viele Jahre?</li><li>Kann ich mir ein Tier <strong>leisten</strong> – auch Tierarzt, Futter, Ausstattung?</li><li>Ist mein <strong>Zuhause geeignet</strong> – Platz, Vermieter-Erlaubnis, Allergien?</li><li>Was passiert im <strong>Urlaub, bei Krankheit, bei Trennung</strong>?</li><li>Bin ich bereit für <strong>Verantwortung</strong> – auch wenn′s nervig, teuer oder anstrengend wird?</li>',
    'info-box-ehrlichkeit-ist-der-erste-schritt' => 'Ehrlichkeit ist der erste Schritt zu echter Tierliebe',
    'info-box-ehrlichkeit-text' => 'Wenn du bei einer Frage oder mehreren Fragen zögerst, ist das kein Grund zur Scham. Es ist ein Zeichen, dass du Verantwortung ernst nimmst – und das verdient Respekt.',
    'honesty-box-die-harte-wahrheit' => 'Die harte Wahrheit',
    'honesty-box-statistiken' => 'In Deutschland sitzen über <strong>300.000 Tiere</strong> in Tierheimen.<br> Nur etwa <strong>30%</strong> werden pro Jahr vermittelt.<br> Der Rest wartet. Oder stirbt.',
    'honesty-box-warum' => '<strong>Warum?</strong><br> Weil zu viele Menschen Tiere holen, ohne zu verstehen, was das bedeutet.',
    'honesty-box-kernaussage' => 'Du liebst Tiere? Dann beweis es – indem du ehrlich bist.',
    'button-honesty-test' => 'Mach den ehrlichen Test',
    'button-honesty-test-url' => home_url('/tierliebe-test'),
    'einleitung-die-wahrheit-uber-haustiere' => 'Die Wahrheit über Haustiere',
    'einleitung-wahrheit-text' => 'Katzen sind unabhängig? Hunde brauchen nur genügend Auslauf? Meerschweinchen sind perfekt für Kinder? Lass uns diese Mythen gemeinsam auf den Prüfstand stellen.',
    'quicklink-hunde-titel' => '🐶 Hunde',
    'quicklink-hunde-text' => 'Loyale Begleiter – aber mit Ansprüchen',
    'quicklink-hunde-url' => home_url('/tierliebe-hunde'),
    'quicklink-katzen-titel' => '🐱 Katzen',
    'quicklink-katzen-text' => 'Eigensinnig, anspruchsvoll – und alles andere als pflegeleicht',
    'quicklink-katzen-url' => home_url('/tierliebe-katzen'),
    'quicklink-kleintiere-titel' => '🐰 Kleintiere',
    'quicklink-kleintiere-text' => 'Klein, aber nicht simpel',
    'quicklink-kleintiere-url' => home_url('/tierliebe-kleintiere'),
    'quicklink-exoten-titel' => '🦎 Vögel & Exoten',
    'quicklink-exoten-text' => 'Faszinierend – aber oft komplexer als gedacht',
    'quicklink-exoten-url' => home_url('/tierliebe-exoten'),
    'quicklink-qualzucht-titel' => '⚠️ Qualzucht',
    'quicklink-qualzucht-text' => 'Wenn Schönheit Leiden bedeutet',
    'quicklink-qualzucht-url' => home_url('/tierliebe-qualzucht'),
    'quicklink-adoption-titel' => '❤️ Adoption',
    'quicklink-adoption-text' => 'Tieren eine zweite Chance geben',
    'quicklink-adoption-url' => home_url('/tierliebe-adoption')
);

// FULL PAGE BUILDER: Read structure from current template
// This ensures the template is the source of truth for HTML structure
echo "Reading template structure from page-tierliebe-home.php...\n";

$template_path = get_stylesheet_directory() . '/page-tierliebe-home.php';
if (!file_exists($template_path)) {
    echo "ERROR: Template not found at {$template_path}\n";
    exit(1);
}

// Load template, extract static sections (between Fallback comment and footer)
$template_content = file_get_contents($template_path);
preg_match('/<!-- Primary Hero -->(.*?)get_template_part\(\'tierliebe-parts\/footer\'\)/s', $template_content, $matches);

if (empty($matches[1])) {
    echo "ERROR: Could not extract static sections from template\n";
    exit(1);
}

$static_html = $matches[1];

// Parse HTML into structure array using DOMDocument
libxml_use_internal_errors(true); // Suppress HTML5 warnings
$dom = new DOMDocument();
$dom->loadHTML('<?xml encoding="UTF-8">' . $static_html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
libxml_clear_errors();

$structure = array();
$xpath = new DOMXPath($dom);
$sections = $xpath->query('//section[@class="primary-hero"] | //section[contains(@class, "section")]');

foreach ($sections as $section) {
    $html = $dom->saveHTML($section);

    // Clean up XML declaration if present
    $html = preg_replace('/<\?xml[^>]+\?>/', '', $html);

    $structure[] = array(
        'html' => trim($html),
        'class' => $section->getAttribute('class'),
        'tagName' => $section->nodeName,
        'id' => $section->getAttribute('id') ?: null
    );
}

echo "Extracted " . count($structure) . " sections from template\n";

// FULL PAGE BUILDER: Combine keys + structure in NEW format
$combined = array(
    'keys' => $default_keys,
    '_structure' => $structure
);

// Format as Tierliebe HTML format
$html_content = '<!--TIERLIEBE_HTML_START-->' . json_encode($combined, JSON_UNESCAPED_UNICODE) . '<!--TIERLIEBE_HTML_END-->';

// Update post content
$updated = wp_update_post(array(
    'ID' => $home_page->ID,
    'post_content' => $html_content
));

if (is_wp_error($updated)) {
    echo "ERROR: " . $updated->get_error_message() . "\n";
    exit(1);
}

echo "SUCCESS: Updated Home page with NEW format (keys + structure)\n";
echo "  - Keys: " . count($default_keys) . "\n";
echo "  - Structure elements: " . count($structure) . "\n";

// Verify
$content = get_tierliebe_text('home');
echo "VERIFIED: Content has " . count($content) . " keys\n";

echo "\nKeys restored:\n";
foreach ($default_keys as $key => $value) {
    $value_preview = strlen($value) > 50 ? substr($value, 0, 50) . '...' : $value;
    echo "  - {$key}: {$value_preview}\n";
}

echo "\nStructure sections:\n";
foreach ($structure as $index => $element) {
    echo "  " . ($index + 1) . ". " . $element['tagName'] . "." . substr($element['class'], 0, 30) . "\n";
}

echo "\nDone! Reload the Home page - should now use dynamic rendering with NEW format!\n";
