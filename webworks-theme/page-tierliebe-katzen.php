<?php
/**
 * Template Name: Tierliebe - Katzen
 * Template Post Type: page
 * Description: Mythen und Fakten über Katzen
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title">🐱 Katzen</h2>
        <p class="section-subtitle">Mythen vs. Fakten</p>
    </div>

    <!-- Mythos -->
    <div class="card coral" style="max-width: 600px; margin: 0 auto 50px;">
        <span class="card-icon">❌</span>
        <h3>Mythos</h3>
        <p><em>Katzen sind unabhängig und brauchen wenig.</em></p>
    </div>

    <!-- Fakten -->
    <div class="info-box info" data-emoji="✅">
        <h4>Die Fakten</h4>
        <ul>
            <li>Katzen brauchen Bindung, sichere Rückzugsorte und Ansprache.</li>
            <li>Unkastrierte Katzen leiden: sie markieren, schreien, werden krank.</li>
            <li>Reine Wohnungshaltung ist nur mit viel Abwechslung, Raum und Beschäftigung artgerecht.</li>
            <li>Einzelhaltung ist fast immer Tierquälerei – außer in begründeten Ausnahmefällen (z. B. ältere Tierschutzkatze).</li>
        </ul>
    </div>

    <!-- Spezifische Frage -->
    <div class="info-box warning" data-emoji="❓">
        <h4>Kann eine Katze allein zu Hause bleiben, wenn sie zu zweit ist?</h4>
        <ul>
            <li>Ja, Katzen in guter Gesellschaft (z. B. Geschwister oder harmonisierende Partner) können auch längere Abwesenheiten des Menschen besser verkraften.</li>
            <li>Aber auch hier gilt: Katzen vermissen – besonders wenn der Mensch kaum interagiert.</li>
            <li>Besonders bei Wohnungskatzen ist tägliches Spielen und Ansprechen wichtig.</li>
        </ul>
        <div class="highlight-text">
            <strong>Achtung:</strong> Eine zweite Katze ersetzt nicht den Menschen, aber sie lindert Einsamkeit – sofern beide gut zusammenpassen.
        </div>
    </div>

    <!-- Wichtiges Wissen -->
    <div class="info-box love" data-emoji="💭">
        <h4>Wichtiges Wissen über Katzen</h4>
        <p style="margin-bottom: 20px;">
            "Viele Katzen sind still leidende Tiere. Sie zeigen Stress und Unwohlsein oft erst spät – und wirken lange Zeit „pflegeleicht", obwohl ihnen wesentliche Bedürfnisse fehlen: Bewegung, Abwechslung, Kontakt, Naturbeobachtung, frische Luft, Gerüche, Jagdinstinkt."
        </p>
        <p style="margin-bottom: 20px;">
            "Katzen passen sich an ein Menschenleben an. Wohnungshaltung bleibt immer ein Ersatz für Natur, frische Luft, Jagd und Freiheit. Freigang bringt zwar Natürlichkeit zurück, aber auch Gefahren, die wir ihnen zumuten. Vollkommen artgerecht ist beides nicht."
        </p>
        <div class="highlight-text">
            <strong>Merksatz:</strong> "Nur weil eine Katze ruhig ist, heißt das nicht, dass es ihr gut geht."
        </div>
    </div>

</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
