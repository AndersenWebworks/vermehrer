<?php
/**
 * Template Name: Tierliebe - Kleintiere
 * Template Post Type: page
 * Description: Kaninchen, Meerschweinchen, Hamster, Mäuse, Ratten, Degus, Chinchillas
 * Version: 1.2.0
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
            <button class="tab-button active" data-tab="kaninchen" style="--current-tab-color: var(--pastel-mint); border-color: var(--pastel-mint);">🐰 Kaninchen & Meerschweinchen</button>
            <button class="tab-button" data-tab="hamster" style="--current-tab-color: var(--pastel-peach); border-color: var(--pastel-peach);">🐹 Hamster</button>
            <button class="tab-button" data-tab="ratten" style="--current-tab-color: var(--pastel-lavender); border-color: var(--pastel-lavender);">🐭 Mäuse & Ratten</button>
            <button class="tab-button" data-tab="degus" style="--current-tab-color: var(--pastel-pink); border-color: var(--pastel-pink);">🐿️ Degus & Chinchillas</button>
        </div>

        <!-- Tab Content: Kaninchen -->
        <div class="tab-panel active" data-tab="kaninchen">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🐰 Kaninchen & Meerschweinchen</h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>👶 Mythos 1: "Perfekte Haustiere für Kinder"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p>Kaninchen und Meerschweinchen sind <strong>Fluchttiere</strong> – sie haben Angst vor schnellen Bewegungen, lauten Geräuschen und festen Griffen.</p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Warum das für Kinder problematisch ist:</strong></p>
                            <ul>
                                <li>Kinder wollen kuscheln – die Tiere wollen flüchten</li>
                                <li>Kinder sind laut und hektisch – Stress für Fluchttiere</li>
                                <li>Verantwortung bleibt bei Erwachsenen</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Diese Tiere sind NICHT für Kinder geeignet. Sie brauchen ruhige, geduldige Betreuung.</p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🏠 Mythos 2: "Ein Käfig im Kinderzimmer reicht"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Käfige sind viel zu klein</strong> und Kinderzimmer der falsche Ort.</p>
                        <div class="info-box" data-emoji="📏" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p><strong>Was sie wirklich brauchen:</strong></p>
                            <ul>
                                <li>Mindestens 4 m² Grundfläche pro Tier</li>
                                <li>Ruhiger Raum (nicht Kinderzimmer!)</li>
                                <li>Tageslicht, frische Luft, konstante Temperatur</li>
                                <li>Strukturierte Einrichtung: Verstecke, Aussichtsplätze</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Kommerzielle Käfige sind fast immer Tierquälerei.</p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🐰🐹 Mythos 3: "Man kann Kaninchen und Meerschweinchen zusammen halten"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>NEIN! Niemals!</strong> Sie haben unterschiedliche Sprachen, Bedürfnisse und Stresslevel.</p>
                        <div class="info-box" data-emoji="🚫" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Warum das nicht funktioniert:</strong></p>
                            <ul>
                                <li>Sie sprechen unterschiedliche "Sprachen"</li>
                                <li>Meerschweinchen sind dem Kaninchen unterlegen</li>
                                <li>Beide leiden unter der falschen Gesellschaft</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Richtig:</strong> Kaninchen nur mit Kaninchen (ideal: kastriertes Männchen + Weibchen), Meerschweinchen nur mit Meerschweinchen in Gruppen.</p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>💔 Mythos 4: "Einzelhaltung geht, wenn man sich viel kümmert"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Einzelhaltung ist Tierquälerei</strong> – egal wie viel Zuwendung du gibst.</p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p><strong>Warum der Mensch nicht reicht:</strong></p>
                            <ul>
                                <li>Du sprichst nicht ihre Sprache</li>
                                <li>Du kannst ihr Sozialverhalten nicht nachahmen</li>
                                <li>Körperwärme, Putzen, Kuscheln fehlt</li>
                                <li>Sie brauchen artgerechte Gesellschaft 24/7</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Jedes Tier braucht mindestens einen Artgenossen. Immer.</p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten im Überblick</h4>
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
        <div class="tab-panel" data-tab="hamster">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🐹 Hamster</h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>👶 Mythos 1: "Perfekt für Kinder – klein, süß, pflegeleicht"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p>Hamster sind <strong>nachtaktiv</strong> – sie schlafen tagsüber und werden erst abends aktiv.</p>
                        <div class="info-box" data-emoji="🌙" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Warum das für Kinder problematisch ist:</strong></p>
                            <ul>
                                <li>Kinder wollen tagsüber spielen – der Hamster schläft</li>
                                <li>Wecken = Dauerstress = verkürzte Lebenszeit</li>
                                <li>Kinder sehen das Tier kaum, haben wenig davon</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Hamster sind NICHT für Kinder geeignet. Sie sind Beobachtungstiere für geduldige Erwachsene.</p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>📦 Mythos 2: "Ein kleiner Gitterkäfig reicht völlig"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Gitterkäfige sind fast immer ungeeignet</strong> – viel zu klein und strukturlos.</p>
                        <div class="info-box" data-emoji="📏" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p><strong>Was Hamster wirklich brauchen:</strong></p>
                            <ul>
                                <li>Mindestens 0,5–1 m² Grundfläche (besser mehr)</li>
                                <li>Mindestens 30 cm Einstreu zum Graben</li>
                                <li>Geschlossenes Laufrad (mind. 28 cm Durchmesser)</li>
                                <li>Mehrkammernhaus, Verstecke, Tunnel</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Kommerzielle Hamsterkäfige sind Tierquälerei.</p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🚫 Mythos 3: "Hamster sind gesellig und brauchen Artgenossen"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>NEIN! Hamster sind absolute Einzelgänger!</strong></p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Was bei Vergesellschaftung passiert:</strong></p>
                            <ul>
                                <li>Aggressive Kämpfe bis zum Tod</li>
                                <li>Dauerstress, auch wenn sie sich "vertragen"</li>
                                <li>Schwere Verletzungen</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Hamster müssen IMMER allein gehalten werden. Das ist ihre Natur.</p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>✋ Mythos 4: "Wenn man sie oft anfasst, werden sie zahm"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>"Zahm werden" bedeutet nicht Zufriedenheit</strong> – viele Hamster ertragen Anfassen, weil sie resigniert haben.</p>
                        <div class="info-box" data-emoji="💔" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p><strong>Die Wahrheit über "Zähmung":</strong></p>
                            <ul>
                                <li>Hamster sind keine Kuscheltiere</li>
                                <li>Sie tolerieren Kontakt, genießen ihn aber selten</li>
                                <li>Ständiges Anfassen = Stress</li>
                                <li>Echte Bindung braucht Zeit, Geduld, Respekt</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Hamster sind Beobachtungstiere. Weniger ist mehr.</p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten im Überblick</h4>
                <ul>
                    <li><strong>Nachtaktiv</strong> – Kinder haben wenig davon, stören sie eher tagsüber</li>
                    <li>Gitterkäfige sind fast immer ungeeignet</li>
                    <li>Erforderliche Gehegegröße: mindestens 0,5–1 m² Grundfläche</li>
                    <li>Einstreu zum Graben: mindestens 30 cm Tiefe erforderlich</li>
                    <li><strong>Absolute Einzelgänger</strong> – Vergesellschaftung führt zu Verletzungen oder Tod</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="🌙">
                <h4>Verhalten & Leiden</h4>
                <p>"Wenn man sie artgerecht hält, sieht man sie kaum. Wenn man sie oft sieht, hält man sie meist nicht artgerecht."</p>
                <p style="margin-top: 15px;">Hamster leiden häufig leise in zu kleinen Gehegen, durch falsches Futter oder Dauerstress durch Kinderhände. Viele leben nur 1,5–2 Jahre in Isolation und Unterforderung.</p>
            </div>
        </div>

        <!-- Tab Content: Mäuse & Ratten -->
        <div class="tab-panel" data-tab="ratten">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🐭 Mäuse & Ratten</h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>⏰ Mythos 1: "Die sind doch eh nur kurzlebig – da kommt es nicht so drauf an"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Kurze Lebenszeit bedeutet NICHT weniger Anspruch</strong> – im Gegenteil!</p>
                        <div class="info-box" data-emoji="💔" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Warum diese Einstellung falsch ist:</strong></p>
                            <ul>
                                <li>Jedes Leben zählt – egal wie kurz</li>
                                <li>Sie leiden genauso intensiv wie langlebige Tiere</li>
                                <li>Kurze Leben erfordern MEHR Respekt, nicht weniger</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Ratten leben 2-3 Jahre, Mäuse 1,5-2,5 Jahre. Jeder Tag davon zählt.</p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>📦 Mythos 2: "Ein Hamsterkäfig reicht auch für Ratten"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>NEIN!</strong> Ratten brauchen komplex strukturierte Gehege mit vielen Ebenen.</p>
                        <div class="info-box" data-emoji="🏗️" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p><strong>Was Ratten wirklich brauchen:</strong></p>
                            <ul>
                                <li>Mindestens 0,5 m³ Volumen für 2-3 Tiere</li>
                                <li>Mehrere Ebenen zum Klettern</li>
                                <li>Rückzugsorte, Hängematten, Tunnel</li>
                                <li>Täglicher Auslauf außerhalb des Geheges</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Kommerzielle "Rattenkäfige" sind meist viel zu klein.</p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🧼 Mythos 3: "Ratten sind dreckig und übertragen Krankheiten"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Ratten sind extrem reinlich!</strong> Dieses Vorurteil ist komplett falsch.</p>
                        <div class="info-box" data-emoji="✨" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p><strong>Die Wahrheit über Ratten:</strong></p>
                            <ul>
                                <li>Sie putzen sich ständig – sauberer als viele Tiere</li>
                                <li>Haben feste Toilettenecken</li>
                                <li>Hausratten übertragen KEINE Krankheiten</li>
                                <li>Lieben Struktur, Sauberkeit, Rituale</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Das "dreckige Ratten" Vorurteil stammt von wilden Wanderratten – nicht von Hausratten!</p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🐭 Mythos 4: "Mäuse kann man einzeln halten, die sind klein"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>NEIN! Mäuse sind hochsozial</strong> – Einzelhaltung ist Tierquälerei.</p>
                        <div class="info-box" data-emoji="👥" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Was bei Einzelhaltung passiert:</strong></p>
                            <ul>
                                <li>Verhaltensstörungen</li>
                                <li>Früher Tod durch Stress</li>
                                <li>Depression, Apathie</li>
                                <li>Sie brauchen Artgenossen 24/7</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Mäuse brauchen mindestens 2-3 Artgenossen. Größe ist irrelevant!</p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten im Überblick</h4>
                <ul>
                    <li><strong>Hochsoziale Rudeltiere</strong> – niemals einzeln halten</li>
                    <li>Brauchen komplex strukturiertes Gehege mit vielen Ebenen</li>
                    <li>Rückzugsorte, Buddel- und Klettermöglichkeiten erforderlich</li>
                    <li>Sehr intelligent – benötigen Beschäftigung, Tunnel, Auslauf</li>
                    <li><strong>Ratten sind NICHT dreckig:</strong> Sie sind extrem reinlich</li>
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
        <div class="tab-panel" data-tab="degus">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🐿️ Degus & Chinchillas</h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🐹 Mythos 1: "Sind einfach nur pelzigere Hamster"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Überhaupt nicht!</strong> Degus und Chinchillas sind komplett anders als Hamster.</p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Die Unterschiede:</strong></p>
                            <ul>
                                <li>Hochsozial (nicht Einzelgänger!)</li>
                                <li>Sehr intelligent und komplex</li>
                                <li>Spezielle Anforderungen (Sandbad, Temperatur, etc.)</li>
                                <li>Deutlich höhere Lebenserwartung (20+ Jahre!)</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Sie sind keine "größeren Hamster" – sie sind eigene Arten mit völlig anderen Bedürfnissen.</p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>💔 Mythos 2: "Kann man gut einzeln halten"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>NEIN! Einzelhaltung ist Tierquälerei!</strong></p>
                        <div class="info-box" data-emoji="👥" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p><strong>Warum sie Artgenossen brauchen:</strong></p>
                            <ul>
                                <li>Hochsoziale Rudeltiere</li>
                                <li>Kommunizieren komplex miteinander</li>
                                <li>Putzen, kuscheln, spielen zusammen</li>
                                <li>Ohne Gruppe: Depression, Stereotypien, Selbstverletzung</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Mindestens 2-3 Tiere pro Gruppe. Immer.</p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🛁 Mythos 3: "Chinchillas kann man baden wie Kaninchen"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Niemals mit Wasser!</strong> Chinchillas brauchen Sandbäder.</p>
                        <div class="info-box" data-emoji="💀" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Warum Wasser gefährlich ist:</strong></p>
                            <ul>
                                <li>Ihr Fell verfilzt und schimmelt</li>
                                <li>Sie können nicht richtig trocknen</li>
                                <li>Gefahr von Unterkühlung und Tod</li>
                                <li>Sie brauchen speziellen Chinchilla-Sand</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Nur Sandbad! Niemals Wasser!</p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🧠 Mythos 4: "Degus sind wie Hamster – nur größer"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Degus sind hochintelligent</strong> – deutlich komplexer als Hamster.</p>
                        <div class="info-box" data-emoji="🎯" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p><strong>Was Degus wirklich sind:</strong></p>
                            <ul>
                                <li>Extrem intelligent, brauchen mentale Herausforderung</li>
                                <li>Sozial komplex – leben in Großfamilien</li>
                                <li>Können über 20 Jahre alt werden!</li>
                                <li>Ohne Beschäftigung: Stereotypien, Aggression</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Degus sind wie kleine Affen – nicht wie Hamster.</p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten im Überblick</h4>
                <ul>
                    <li><strong>Hochsoziale Tiere</strong> – müssen in Gruppen gehalten werden</li>
                    <li><strong>Einzelhaltung ist Tierquälerei</strong></li>
                    <li>Sehr große Volieren erforderlich mit mehreren Etagen</li>
                    <li><strong>Chinchillas:</strong> Brauchen Sandbad (kein Wasser!), vertragen keine Hitze über 25°C</li>
                    <li><strong>Degus:</strong> Hochintelligent, können über 20 Jahre alt werden</li>
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

</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
