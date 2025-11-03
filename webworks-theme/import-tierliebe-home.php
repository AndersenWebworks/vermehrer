<?php
/**
 * Import Script für Tierliebe Home Text
 * ACHTUNG: Nach dem Import diese Datei löschen!
 *
 * Aufruf: https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/import-tierliebe-home.php
 */

// WordPress laden
require_once('../../../wp-load.php');

// Security: Nur für Admins
if (!current_user_can('manage_options')) {
    die('Keine Berechtigung');
}

// Markdown Content
$markdown_content = <<<'MARKDOWN'
# STARTSEITE (Primary Hero & Sektionen)

## Header/Titel
**Du liebst Tiere?**

## Untertitel
"Dann lies hier nicht, was du hören willst – sondern was du wissen musst. Ehrlich. Klar. Und im Sinne der Tiere."

## Einleitungstext
"Bevor du ein Tier aufnimmst – Hund, Katze, Kaninchen, Welli oder Goldfisch – nimm dir ein paar Minuten für die Wahrheit. Denn: Gute Absichten reichen nicht. Verantwortung schon."

## Hero-Buttons
- **Button 1:** "✨ Bin ich bereit? → Zum Test"
- **Button 2:** "📚 Wissen aufbauen"

---

# Sektion: Bin ich bereit für ein Tier?

**Sektions-Titel:** "Bin ich bereit für ein Tier?"

**Einleitungstext:**
"Du denkst darüber nach, ein Tier aufzunehmen? Dann nimm dir bitte kurz Zeit für diese Fragen – ganz ehrlich, nur für dich. Denn ein Tier ist keine Phase. Es ist ein Teil deines Lebens – und komplett abhängig von dir."

**Zentrale Frage:**
"Bist du der Typ Tierhalter, den Tiere sich wünschen würden?"

---

## Info-Box: Ehrlichkeit ist der erste Schritt

**Überschrift:** "Ehrlichkeit ist der erste Schritt zu echter Tierliebe"

**Text:**
"Wenn du bei einer Frage oder mehreren Fragen zögerst, ist das kein Grund zur Scham. Es ist ein Zeichen, dass du Verantwortung ernst nimmst – und das verdient Respekt."

---

## Info-Box: Bevor du ein Tier holst, frag dich ehrlich

**Überschrift:** "💭 Bevor du ein Tier holst, frag dich ehrlich:"

**Checkliste:**
- Habe ich **Zeit**? Nicht nur am Wochenende – jeden Tag.
- Habe ich **Geld**? Nicht nur für Futter – auch für Tierarzt, Ausstattung, Notfälle.
- Habe ich **Platz**? Nicht nur einen Käfig – echten Raum zum Leben.
- Bin ich bereit für **10, 15, 20 Jahre** Verantwortung?
- Weiß ich, was das Tier **wirklich** braucht – nicht, was ich mir vorstelle?

---

## Decision Panels (Dual-Panel)

### Panel 1: Bin ich bereit?
**Icon:** 🧠
**Überschrift:** "Bin ich bereit?"
**Beschreibung:** "Ein ehrlicher Test, der dir zeigt, ob du wirklich vorbereitet bist."

**Vorteile:**
- Realistische Fragen zu Zeit, Geld & Wissen
- Ehrliche Auswertung ohne Schönfärberei
- Hilft dir, die richtige Entscheidung zu treffen

**Button:** "Zum Test →"

### Panel 2: Die Wahrheit über Haustiere
**Icon:** 📖
**Überschrift:** "Die Wahrheit über Haustiere"
**Beschreibung:** "Was Hunde, Katzen, Kaninchen & Co. wirklich brauchen."

**Vorteile:**
- Mythen vs. Fakten für jede Tierart
- Was verschwiegen wird
- Warum "pflegeleicht" eine Lüge ist

**Button:** "Zu den Tierarten →"

---

## Honesty Box: Die harte Wahrheit

**Icon:** 💔
**Überschrift:** "Die harte Wahrheit"

**Statistiken:**
"In Deutschland sitzen über **300.000 Tiere** in Tierheimen.
Nur etwa **30%** werden pro Jahr vermittelt.
Der Rest wartet. Oder stirbt."

**Warum?**
"Weil zu viele Menschen Tiere holen, ohne zu verstehen, was das bedeutet."

**Kernaussage:**
"Du liebst Tiere? Dann beweis es – indem du ehrlich bist."

---

## Einleitung: Die Wahrheit über Haustiere

**Sektions-Titel:** "Die Wahrheit über Haustiere"

**Einleitungstext:**
"Katzen sind unabhängig? Hunde brauchen nur genügend Auslauf? Meerschweinchen sind perfekt für Kinder? Lass uns diese Mythen gemeinsam auf den Prüfstand stellen."

---

## Quick Links (Tierarten-Navigation)

**Quick Link Karten:**
1. 🐶 **Hunde** - "Mythen & Wahrheiten"
2. 🐱 **Katzen** - "Was du wissen musst"
3. 🐰 **Kleintiere** - "Kaninchen, Hamster & Co."
4. 🦎 **Vögel & Exoten** - "Besondere Bedürfnisse"
5. ⚠️ **Qualzucht** - "Leid erkennen"
6. ❤️ **Adoption** - "Der richtige Weg"

MARKDOWN;

echo "<h1>Import Tierliebe Home Text</h1>";

// Check if post already exists
$existing = get_posts(array(
    'post_type'   => 'tierliebe_text',
    'name'        => 'tierliebe-home',
    'post_status' => 'any',
    'numberposts' => 1
));

if (!empty($existing)) {
    // Update existing
    $post_id = $existing[0]->ID;

    $updated = wp_update_post(array(
        'ID'           => $post_id,
        'post_content' => $markdown_content
    ));

    if ($updated) {
        echo "<p style='color: green;'>✓ Text erfolgreich aktualisiert (ID: $post_id)</p>";

        // Clear cache
        delete_transient('tierliebe_text_home');
        echo "<p style='color: green;'>✓ Cache gelöscht</p>";
    } else {
        echo "<p style='color: red;'>✗ Fehler beim Aktualisieren</p>";
    }
} else {
    // Create new
    $post_id = wp_insert_post(array(
        'post_title'   => 'Tierliebe - Home',
        'post_content' => $markdown_content,
        'post_status'  => 'publish',
        'post_type'    => 'tierliebe_text',
        'post_name'    => 'tierliebe-home',
        'post_author'  => 1
    ));

    if ($post_id && !is_wp_error($post_id)) {
        echo "<p style='color: green;'>✓ Text erfolgreich importiert (ID: $post_id)</p>";
        echo "<p><a href='" . admin_url('post.php?post=' . $post_id . '&action=edit') . "'>Im Backend bearbeiten</a></p>";
    } else {
        echo "<p style='color: red;'>✗ Fehler beim Import</p>";
        if (is_wp_error($post_id)) {
            echo "<p style='color: red;'>" . $post_id->get_error_message() . "</p>";
        }
    }
}

echo "<hr>";
echo "<p><strong>WICHTIG:</strong> Lösche diese Datei jetzt: <code>webworks-theme/import-tierliebe-home.php</code></p>";
