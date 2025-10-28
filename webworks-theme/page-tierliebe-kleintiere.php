<?php
/**
 * Template Name: Tierliebe - Kleintiere
 * Template Post Type: page
 * Description: Kaninchen, Meerschweinchen, Hamster, Mäuse, Ratten, Degus, Chinchillas
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title">🐰 Kleintiere</h2>
        <p class="section-subtitle">Die Wahrheit über "einfache" Haustiere</p>
    </div>

    <!-- Warnung vorab -->
    <div class="info-box warning" data-emoji="⚠️">
        <h4>Wichtige Warnung</h4>
        <p style="font-size: 1.2rem; text-align: center;">
            <strong>"Kleintiere sind keine Einstiegstiere – sie sind oft anspruchsvoller als Hund oder Katze."</strong>
        </p>
    </div>

    <!-- Tab Navigation -->
    <div class="tierliebe-tabs" style="margin-top: 50px;">
        <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
            <button class="tab-button active" data-tab="kaninchen" style="padding: 15px 30px; border: 3px solid var(--pastel-mint); background: var(--pastel-mint); border-radius: 25px; font-family: 'Fredoka', sans-serif; font-size: 1.1rem; cursor: pointer; transition: all 0.3s;">🐰 Kaninchen & Meerschweinchen</button>
            <button class="tab-button" data-tab="hamster" style="padding: 15px 30px; border: 3px solid var(--pastel-peach); background: white; border-radius: 25px; font-family: 'Fredoka', sans-serif; font-size: 1.1rem; cursor: pointer; transition: all 0.3s;">🐹 Hamster</button>
            <button class="tab-button" data-tab="ratten" style="padding: 15px 30px; border: 3px solid var(--pastel-lavender); background: white; border-radius: 25px; font-family: 'Fredoka', sans-serif; font-size: 1.1rem; cursor: pointer; transition: all 0.3s;">🐭 Mäuse & Ratten</button>
            <button class="tab-button" data-tab="degus" style="padding: 15px 30px; border: 3px solid var(--pastel-pink); background: white; border-radius: 25px; font-family: 'Fredoka', sans-serif; font-size: 1.1rem; cursor: pointer; transition: all 0.3s;">🐿️ Degus & Chinchillas</button>
        </div>

        <!-- Tab Content: Kaninchen -->
        <div class="tab-panel active" data-tab="kaninchen">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🐰 Kaninchen & Meerschweinchen</h3>

            <!-- Mythen -->
            <div class="cards-grid" style="margin-bottom: 30px;">
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos</h4><p><em>Perfekte Haustiere für Kinder</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos</h4><p><em>Ein Käfig im Kinderzimmer reicht</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos</h4><p><em>Man kann Kaninchen und Meerschweinchen zusammen halten</em></p></div>
            </div>

            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten</h4>
                <ul>
                    <li>Beide sind Fluchttiere, die Lärm und schnelle Bewegungen schlecht verkraften</li>
                    <li><strong>Einzelhaltung ist Tierquälerei</strong> – jedes Tier braucht Artgenossen</li>
                    <li>Erforderlicher Platz: mindestens 4 m² pro Tier</li>
                    <li>Kommerzielle Käfige sind fast immer zu klein</li>
                    <li>Kinderzimmer sind ungeeignet (zu laut, unruhig, falsches Klima)</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="🚫">
                <h4>Kritische Warnung</h4>
                <p><strong>"Kaninchen und Meerschweinchen dürfen nicht gemeinsam gehalten werden!"</strong> Sie haben unterschiedliche Sprachen, Bedürfnisse und Stresslevel. Das Meerschweinchen ist dem Kaninchen unterlegen.</p>
                <h4 style="margin-top: 20px;">Bessere Vergesellschaftung:</h4>
                <ul>
                    <li>Kaninchen nur mit anderen Kaninchen (ideal: kastriertes Männchen + Weibchen)</li>
                    <li>Meerschweinchen nur mit Meerschweinchen in Gruppen</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <h4>Gesundheit & Leiden</h4>
                <p>Meerschweinchen und Kaninchen verstecken Schmerzen meisterlich. Tägliche Beobachtung notwendig: Fressverhalten, Bewegung, Atmung. Tierarztkosten können steigen – Zahnprobleme, Verdauungsstörungen häufig.</p>
                <div class="highlight-text">
                    <strong>Wichtig:</strong> "Nur weil ein Kaninchen ruhig im Käfig sitzt, heißt das nicht, dass es ihm gut geht. Oft ist das ein Zeichen von Resignation."
                </div>
            </div>
        </div>

        <!-- Tab Content: Hamster -->
        <div class="tab-panel" data-tab="hamster" style="display: none;">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🐹 Hamster</h3>

            <div class="cards-grid" style="max-width: 800px; margin: 0 auto 30px;">
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos</h4><p><em>Perfekt für Kinder – klein, süß, pflegeleicht</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos</h4><p><em>Ein kleiner Gitterkäfig reicht völlig</em></p></div>
            </div>

            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten</h4>
                <ul>
                    <li><strong>Nachtaktiv</strong> – Kinder haben wenig davon, stören sie eher tagsüber</li>
                    <li>Gitterkäfige sind fast immer ungeeignet</li>
                    <li>Erforderliche Gehegegröße: mindestens 0,5–1 m² Grundfläche</li>
                    <li>Einstreu zum Graben: mindestens 30 cm Tiefe erforderlich</li>
                    <li><strong>Absolute Einzelgänger</strong> – Vergesellschaftung führt zu Verletzungen oder Tod</li>
                    <li>Laufräder notwendig: geschlossen, mind. 28 cm Durchmesser</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="🌙">
                <h4>Verhalten & Leiden</h4>
                <p>"Wenn man sie artgerecht hält, sieht man sie kaum. Wenn man sie oft sieht, hält man sie meist nicht artgerecht."</p>
                <p style="margin-top: 15px;">Hamster leiden häufig leise in zu kleinen Gehegen, durch falsches Futter oder Dauerstress durch Kinderhände. Viele leben nur 1,5–2 Jahre in Isolation und Unterforderung.</p>
            </div>
        </div>

        <!-- Tab Content: Mäuse & Ratten -->
        <div class="tab-panel" data-tab="ratten" style="display: none;">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🐭 Mäuse & Ratten</h3>

            <div class="cards-grid" style="max-width: 800px; margin: 0 auto 30px;">
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos</h4><p><em>Die sind doch eh nur kurzlebig – da kommt es nicht so drauf an</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos</h4><p><em>Ein Hamsterkäfig reicht auch für Ratten</em></p></div>
            </div>

            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten</h4>
                <ul>
                    <li><strong>Hochsoziale Rudeltiere</strong> – niemals einzeln halten</li>
                    <li>Brauchen komplex strukturiertes Gehege mit vielen Ebenen</li>
                    <li>Rückzugsorte, Buddel- und Klettermöglichkeiten erforderlich</li>
                    <li>Sehr intelligent – benötigen Beschäftigung, Tunnel, Auslauf</li>
                    <li>Enger Kontakt zur Bezugsperson wichtig</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4>Herkunftsprobleme</h4>
                <ul>
                    <li>Tiere aus Zoohandlungen oft überzüchtet oder krank</li>
                    <li>Stammen aus Massenvermehrung ohne genetische Rücksicht</li>
                    <li>Viele sterben früh an Atemwegserkrankungen, Tumoren, Infektionen</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="❤️">
                <h4>Charakter</h4>
                <p style="font-size: 1.2rem;">"Ratten sind sehr menschenbezogen und leiden stark, wenn sie isoliert oder vernachlässigt werden. Sie sind empathischer als viele denken."</p>
            </div>
        </div>

        <!-- Tab Content: Degus & Chinchillas -->
        <div class="tab-panel" data-tab="degus" style="display: none;">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🐿️ Degus & Chinchillas</h3>

            <div class="cards-grid" style="max-width: 800px; margin: 0 auto 30px;">
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos</h4><p><em>Sind einfach nur pelzigere Hamster</em></p></div>
                <div class="card coral"><span class="card-icon">❌</span><h4>Mythos</h4><p><em>Kann man gut einzeln halten</em></p></div>
            </div>

            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten</h4>
                <ul>
                    <li><strong>Hochsoziale Tiere</strong> – müssen in Gruppen gehalten werden</li>
                    <li><strong>Einzelhaltung ist Tierquälerei</strong></li>
                    <li>Nacht- und dämmerungsaktiv</li>
                    <li>Sehr große Volieren erforderlich mit mehreren Etagen</li>
                    <li>Viel Bewegung, Knabbermaterial und Ruhe notwendig</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="⏰">
                <h4>Spezifische Anforderungen</h4>
                <p><strong>Degus:</strong></p>
                <ul>
                    <li>Hochintelligent, benötigen geistige Herausforderung</li>
                    <li>Können über 20 Jahre alt werden (Lebenszeit-Verantwortung)</li>
                </ul>
                <p style="margin-top: 20px;"><strong>Chinchillas:</strong></p>
                <ul>
                    <li>Benötigen spezielles Staubbad</li>
                    <li>Artgerechtes Futter zwingend erforderlich</li>
                    <li>Konstante Umgebungstemperatur nötig (über 25 °C gefährlich)</li>
                    <li>Können über 20 Jahre alt werden</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="⚠️">
                <h4>Häufige Probleme</h4>
                <p>Zahnerkrankungen, Diabetes, Langeweile, Aggression, Stereotype Bewegungen</p>
            </div>
        </div>
    </div>

    <script>
    // Simple Tab Switcher
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            const tab = this.getAttribute('data-tab');

            // Update buttons
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
                btn.style.background = 'white';
            });
            this.classList.add('active');
            this.style.background = this.style.borderColor;

            // Update panels
            document.querySelectorAll('.tab-panel').forEach(panel => {
                panel.style.display = 'none';
                panel.classList.remove('active');
            });
            const activePanel = document.querySelector(`.tab-panel[data-tab="${tab}"]`);
            activePanel.style.display = 'block';
            activePanel.classList.add('active');
        });
    });
    </script>

</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
