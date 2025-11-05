<?php
/**
 * Konvertiert page-tierliebe-qualzucht.md in JSON-Format für die Datenbank
 */

// JSON-Daten-Struktur basierend auf dem PHP-Template
$content = [
    // Hero Section
    'hero-titel' => '⚠️ Überzüchtung – Wenn Schönheit Leiden bedeutet',
    'hero-untertitel' => 'Schönheit ist oft teuer bezahlt – und das nicht nur mit Geld. Viele Tiere, die wir ‚süß' oder ‚Edelrassen' nennen, leiden unter genetischen Defekten, weil der Mensch sie für sein Ideal geformt hat.',

    // Definition Section
    'definition-titel' => 'Was ist Überzüchtung?',
    'definition-text' => 'Überzüchtung bedeutet, dass bestimmte Merkmale durch Zucht so stark hervorgehoben werden, dass das Tier darunter leidet.',

    'warum-titel' => 'Warum passiert das?',
    'warum-liste' => '<li>Menschen wollen optische "Besonderheiten" (flache Nasen, große Augen, ungewöhnliche Farben)</li>
<li>Züchter erfüllen diese Wünsche, weil sie sich gut verkaufen</li>
<li>Tiere mit extremen Merkmalen werden weiterverpaart, auch wenn sie krank sind</li>',

    'problem-titel' => 'Warum das ein Problem ist:',
    'problem-liste' => '<li>Tiere leiden still, weil ihre Schmerzen nicht sofort sichtbar sind</li>
<li>Besitzer glauben oft, sie hätten ein "besonders schönes Tier", verstehen aber nicht, dass das Tier leidet</li>
<li>Überzüchtung ist nicht "natürlich" – sie ist ein Ergebnis von menschlichem Wunschdenken</li>',

    'definition-highlight' => '💔 Schönheit darf nicht weh tun – auch nicht bei Tieren.',

    // Rassen Titel
    'rassen-titel' => 'Die 8 häufigsten Qualzuchten',

    // Rasse 1: Mops & Französische Bulldogge
    'rasse1-titel' => 'Mops & Französische Bulldogge',
    'rasse1-herkunft' => 'Gezielt gezüchtet für "süße" flache Gesichter und Falten',
    'rasse1-leiden-titel' => 'Leiden:',
    'rasse1-leiden-liste' => '<li>Atemnot (Brachyzephalie, verengte Nasenlöcher)</li>
<li>Augenprobleme (hervorstehend, trockene Hornhaut)</li>
<li>Hautentzündungen (Falteninfektionen)</li>',
    'rasse1-wissen' => '<strong>💡 Wissen:</strong> Auch mit OP können viele Probleme nicht vollständig behoben werden.',

    // Rasse 2: Perserkatze
    'rasse2-titel' => 'Perserkatze',
    'rasse2-herkunft' => 'Flaches Gesicht, große Augen – "edler Look"',
    'rasse2-leiden-titel' => 'Leiden:',
    'rasse2-leiden-liste' => '<li>Verstopfte Tränenkanäle = ständiges Augentränen</li>
<li>Atemprobleme durch flache Nasenpartie</li>
<li>Zahnfehlstellungen</li>
<li>Hautfalten = Pilzinfektionen</li>',
    'rasse2-wissen' => '<strong>💡 Wissen:</strong> Viele Perser sind lebenslang auf Augenpflege angewiesen.',

    // Rasse 3: Schauwellensittich
    'rasse3-titel' => 'Schauwellensittich',
    'rasse3-herkunft' => 'Überlange Federn für "flauschiges" Aussehen (als Ausstellungsrasse gezüchtet)',
    'rasse3-leiden-titel' => 'Leiden:',
    'rasse3-leiden-liste' => '<li>Sichtprobleme (Augen unter Federn verborgen)</li>
<li>Schnabeldeformationen = Kauprobleme</li>
<li>Schwaches Immunsystem durch Inzucht</li>',
    'rasse3-wissen' => '<strong>💡 Wissen:</strong> Ein "schöner" Welli kann oft nicht mehr richtig fliegen.',

    // Rasse 4: Widderkaninchen
    'rasse4-titel' => 'Widderkaninchen',
    'rasse4-herkunft' => 'Hängende Ohren für "niedliches" Aussehen',
    'rasse4-leiden-titel' => 'Leiden:',
    'rasse4-leiden-liste' => '<li>Ohrenfehlstellung = Schwerhörigkeit</li>
<li>Gehörgangsentzündungen</li>
<li>Nervenprobleme durch verformten Schädel</li>',
    'rasse4-wissen' => '<strong>💡 Wissen:</strong> Die "süßen" Ohren sind ein Schmerzfaktor.',

    // Rasse 5: Schleierschwanz-Goldfisch
    'rasse5-titel' => 'Schleierschwanz-Goldfisch',
    'rasse5-herkunft' => 'Überlange Flossen, kugeliger Körper',
    'rasse5-leiden-titel' => 'Leiden:',
    'rasse5-leiden-liste' => '<li>Schwimmprobleme (Schleppflossen)</li>
<li>Augenprobleme (hervorstehend, verletzungsanfällig)</li>
<li>Skelettdeformationen</li>',
    'rasse5-wissen' => '<strong>💡 Wissen:</strong> Das "prachtvolle" Aussehen ist in Wirklichkeit eine Behinderung.',

    // Rasse 6: Albino-Reptilien
    'rasse6-titel' => 'Albino-Reptilien',
    'rasse6-herkunft' => 'Genmutation für besondere Farbvarianten',
    'rasse6-leiden-titel' => 'Leiden:',
    'rasse6-leiden-liste' => '<li>Sehschwäche durch Pigmentmangel</li>
<li>Lichtempfindlichkeit = Stress</li>
<li>Höhere Anfälligkeit für Krankheiten</li>',
    'rasse6-wissen' => '<strong>💡 Wissen:</strong> Albinos überleben in der Natur fast nie – als Haustiere auch nur schwer.',

    // Rasse 7: Malteser & Zwerghunde
    'rasse7-titel' => 'Malteser & Zwerghunde',
    'rasse7-herkunft' => 'Extreme Kleinzüchtung für dekoratives Aussehen',
    'rasse7-leiden-titel' => 'Leiden:',
    'rasse7-leiden-liste' => '<li>Haarpflege aufwendig = Hautprobleme bei Vernachlässigung</li>
<li>Kleine Körpergröße = Gelenkprobleme</li>
<li>Überzüchtete Tränenkanäle</li>',
    'rasse7-wissen' => '<strong>💡 Wissen:</strong> Je kleiner ein Hund gezüchtet wird, desto mehr Gesundheitsprobleme entstehen.',

    // Rasse 8: Scottish-Fold-Katze
    'rasse8-titel' => 'Scottish-Fold-Katze',
    'rasse8-herkunft' => 'Genmutation für gefaltete Ohren',
    'rasse8-leiden-titel' => 'Leiden:',
    'rasse8-leiden-liste' => '<li>Schmerzhafte Gelenkdeformationen</li>
<li>Knorpelprobleme (Osteochondrodysplasie)</li>
<li>Ohrenentzündungen</li>',
    'rasse8-wissen' => '<strong>💡 Wissen:</strong> Die "süßen" Ohren bedeuten für die Katze chronischen Schmerz.',

    // CTA Section
    'cta-titel' => 'Möchtest du wirklich Tierliebe zeigen?',
    'cta-text' => 'Dann adoptiere aus dem Tierschutz – keine Qualzucht, keine Massenzucht, nur echte zweite Chancen.'
];

// JSON ausgeben
echo json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
