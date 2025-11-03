<?php
/**
 * Template Name: Tierliebe - Vögel & Exoten
 * Template Post Type: page
 * Description: Wellensittiche, Schildkröten, Goldfische, Reptilien
 * Version: 1.3.0
 */

get_template_part('tierliebe-parts/header');
?>

<section class="section">
    <div class="section-header">
        <h2 class="section-title">🦜 Vögel & Exoten</h2>
        <p class="section-subtitle">Für 99% ungeeignet</p>
    </div>

    <div class="info-box warning" data-emoji="⚠️">
        <h4 style="font-size: 1.5rem; text-align: center;">Kernaussage</h4>
        <p style="font-size: 1.3rem; text-align: center;"><strong>"Exoten sind keine Dekoration. Sie gehören nicht in Wohnzimmer."</strong></p>
        <p style="text-align: center; margin-top: 15px;">"Reptilien und Fische leben in hochkomplexen Ökosystemen, die wir im Wohnzimmer niemals nachbilden können."</p>
    </div>

    <!-- Tabs -->
    <div class="tierliebe-tabs" style="margin-top: 50px;">
        <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
            <button class="tab-button active" data-tab="welli" style="--current-tab-color: var(--pastel-blue); border-color: var(--pastel-blue);">🦜 Wellensittich</button>
            <button class="tab-button" data-tab="fisch" style="--current-tab-color: var(--pastel-mint); border-color: var(--pastel-mint);">🐠 Goldfisch</button>
            <button class="tab-button" data-tab="reptil" style="--current-tab-color: var(--pastel-sage); border-color: var(--pastel-sage);">🦎 Reptilien</button>
            <button class="tab-button" data-tab="schildkroete" style="--current-tab-color: var(--pastel-peach); border-color: var(--pastel-peach);">🐢 Schildkröten</button>
        </div>

        <!-- Wellensittich -->
        <div class="tab-panel active" data-tab="welli">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🦜 Wellensittich</h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🗣️ Mythos 1: "Ein Wellensittich allein spricht besser"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Das stimmt vielleicht – aber es ist Tierquälerei.</strong></p>
                        <div class="info-box" data-emoji="💔" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Warum Einzelhaltung grausam ist:</strong></p>
                            <ul>
                                <li>Wellensittiche sind Schwarmtiere</li>
                                <li>Ohne Artgenossen vereinsamen sie</li>
                                <li>Der Mensch kann keinen Partner ersetzen</li>
                                <li>Sprechen aus Verzweiflung, nicht aus Freude</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Einzelhaltung ist Tierquälerei – auch wenn der Vogel "spricht".</p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🏠 Mythos 2: "Ein Käfig reicht"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Käfige sind Gefängnisse</strong> – Vögel brauchen Freiflug.</p>
                        <div class="info-box" data-emoji="🕊️" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p><strong>Was Wellensittiche wirklich brauchen:</strong></p>
                            <ul>
                                <li>Täglicher Freiflug (mehrere Stunden)</li>
                                <li>Große Voliere als Rückzugsort</li>
                                <li>Keine enge Käfighaltung</li>
                                <li>Platz zum Fliegen ist existenziell</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Ein Käfig im Wohnzimmer = Dauerstress.</p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🪞 Mythos 3: "Spiegel/Mensch ersetzt Partner"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>NEIN!</strong> Weder Spiegel noch Mensch können einen echten Partner ersetzen.</p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p><strong>Warum Spiegel schädlich sind:</strong></p>
                            <ul>
                                <li>Vogel versucht mit Spiegelbild zu kommunizieren</li>
                                <li>Wird nie eine Antwort bekommen</li>
                                <li>Führt zu Frustration und Verhaltensstörungen</li>
                                <li>Kein Ersatz für echte Gesellschaft</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Nur ein echter Artgenosse kann einen Wellensittich glücklich machen.</p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>☀️ Mythos 4: "Wellensittiche brauchen keine UV-Lampe"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>UV-Lampen sind PFLICHT!</strong> Ohne UV-Licht leben sie in Dunkelheit.</p>
                        <div class="info-box" data-emoji="💡" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Warum UV-Licht so wichtig ist:</strong></p>
                            <ul>
                                <li>Wellensittiche sehen UV-Licht</li>
                                <li>Normales Fensterlicht ist für sie "dunkel"</li>
                                <li>Leben in der Wohnung quasi in Dämmerung</li>
                                <li>Ohne UV: Verhaltensstörungen, Sehprobleme</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> UV-Lampen sind nicht optional – sie sind lebensnotwendig.</p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten im Überblick</h4>
                <ul>
                    <li>Benötigen Artgenossen – Einzelhaltung ist grausam</li>
                    <li>Können UV-Licht sehen; normales Fensterlicht ist "dunkel"</li>
                    <li>Brauchen Tageslicht oder spezielle UV-Lampen</li>
                    <li>Täglicher Freiflug ist notwendig</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <h4>Wichtig</h4>
                <p>Viele Wellensittiche leiden still. Ein apathischer oder ruhiger Vogel wird als "zahm" missverstanden – dabei steckt dahinter Angst, Einsamkeit oder Resignation.</p>
                <p style="margin-top: 15px; font-size: 1.2rem; text-align: center;"><strong>"Vögel gehören an den Himmel. Selbst die größte Voliere bleibt ein Käfig."</strong></p>
            </div>
        </div>

        <!-- Goldfisch -->
        <div class="tab-panel" data-tab="fisch">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🐠 Goldfisch</h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>💪 Mythos 1: "Goldfische sind robust – die leben überall"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Goldfische sind NICHT robust</strong> – sie sterben nur still.</p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Die Wahrheit über "Robustheit":</strong></p>
                            <ul>
                                <li>Sie zeigen Leiden nicht durch Laute</li>
                                <li>Sterben oft qualvoll in zu kleinen Becken</li>
                                <li>Brauchen sauberes Wasser, Sauerstoff, Platz</li>
                                <li>"Robust" = Mythos aus der Zoohandlung</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Goldfische sind empfindlich und anspruchsvoll.</p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🏺 Mythos 2: "Ein kleines Becken reicht"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Mindestens 100 Liter pro Fisch!</strong> Alles darunter ist Tierquälerei.</p>
                        <div class="info-box" data-emoji="📏" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p><strong>Was Goldfische wirklich brauchen:</strong></p>
                            <ul>
                                <li>Mindestens 100 Liter pro Fisch</li>
                                <li>Filter, Pumpe, Sauerstoff</li>
                                <li>Regelmäßige Wasserwechsel</li>
                                <li>Goldfischgläser sind Folter</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Kleine Becken = langsames Ersticken.</p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>⏰ Mythos 3: "Goldfische werden nur 2-3 Jahre alt"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Goldfische können 15-20 Jahre alt werden!</strong></p>
                        <div class="info-box" data-emoji="🎂" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p><strong>Lebenserwartung bei artgerechter Haltung:</strong></p>
                            <ul>
                                <li>15-20 Jahre sind normal</li>
                                <li>Manche werden sogar 30+ Jahre alt</li>
                                <li>Sterben in Gläsern nach Wochen = nicht natürlich</li>
                                <li>Das ist keine "kurze Lebenszeit" – das ist Mord</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Goldfische sind langlebig – bei richtiger Haltung.</p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🚫 Mythos 4: "Man braucht keinen Filter"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Filter sind PFLICHT!</strong> Ohne Filter ersticken sie.</p>
                        <div class="info-box" data-emoji="💀" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Warum Filter unverzichtbar sind:</strong></p>
                            <ul>
                                <li>Fische produzieren Ammoniak (giftig)</li>
                                <li>Ohne Filter reichert sich Gift an</li>
                                <li>Fische ersticken an eigenen Ausscheidungen</li>
                                <li>Qualvoller langsamer Tod</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Filter sind keine Option – sie sind lebensnotwendig.</p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten im Überblick</h4>
                <ul>
                    <li>Benötigen mindestens 100 Liter pro Fisch</li>
                    <li>Brauchen Filter, Sauerstoff und Pflege</li>
                    <li>Bei artgerechter Haltung 15-20 Jahre alt</li>
                    <li>Ohne Filter ersticken sie an eigenen Ausscheidungen</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4>Schleierschwanz-Problematik</h4>
                <ul>
                    <li>Überlange Flossen = Schwimmprobleme</li>
                    <li>Hervorstehende Augen = Verletzungsgefahr</li>
                    <li>Verkürzte Wirbelsäule durch Zucht</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <p>Ein regloser Goldfisch am Boden wird als "faul" fehlinterpretiert – dabei ist es oft ein Hilfeschrei.</p>
            </div>
        </div>

        <!-- Reptilien -->
        <div class="tab-panel" data-tab="reptil">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🦎 Reptilien</h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>❄️ Mythos 1: "Brauchen keinen Winterschlaf, keine Sonne"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Reptilien brauchen beides!</strong> Ohne stirbt ihr Stoffwechsel.</p>
                        <div class="info-box" data-emoji="☀️" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Was Reptilien wirklich brauchen:</strong></p>
                            <ul>
                                <li>Winterschlaf ist für viele Arten überlebenswichtig</li>
                                <li>UV-Licht für Vitamin D3-Synthese</li>
                                <li>Wärmeinseln, Temperaturkontrolle</li>
                                <li>Ohne: Stoffwechselkrankheiten, Organversagen</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Reptilien haben hochkomplexe Bedürfnisse.</p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>📦 Mythos 2: "Ein kleines Terrarium reicht"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Terrarien müssen riesig sein</strong> – und selbst dann sind sie ein Kompromiss.</p>
                        <div class="info-box" data-emoji="🏗️" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p><strong>Anforderungen an Terrarien:</strong></p>
                            <ul>
                                <li>Artabhängig: oft mehrere Quadratmeter</li>
                                <li>Temperaturzonen, Verstecke, Klettermöglichkeiten</li>
                                <li>Teure Technik (UV-Lampen, Heizung, Luftfeuchtigkeit)</li>
                                <li>Wohnzimmer-Terrarien sind fast immer zu klein</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Hochkomplexe Ökosysteme sind im Wohnzimmer kaum nachbildbar.</p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🎯 Mythos 3: "Pflegeleicht und anspruchslos"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Reptilien sind extrem anspruchsvoll!</strong> Nichts ist "pflegeleicht".</p>
                        <div class="info-box" data-emoji="⚠️" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p><strong>Was Reptilien wirklich brauchen:</strong></p>
                            <ul>
                                <li>Fachwissen über die spezifische Art</li>
                                <li>Teure technische Ausstattung</li>
                                <li>Spezielles Futter (oft lebend)</li>
                                <li>Regelmäßige Kontrollen durch Reptilien-Tierarzt</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Reptilien sind NICHT für Anfänger geeignet.</p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>💔 Mythos 4: "Zeigen Schmerz nicht – also leiden sie nicht"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Reptilien leiden still!</strong> Kein Schrei bedeutet nicht kein Schmerz.</p>
                        <div class="info-box" data-emoji="😢" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Stilles Leiden:</strong></p>
                            <ul>
                                <li>Reptilien zeigen Schmerz nicht durch Laute</li>
                                <li>Regungslos = oft sterbend, nicht "faul"</li>
                                <li>Leiden wird als "anspruchslos" fehlinterpretiert</li>
                                <li>Viele sterben, ohne dass es bemerkt wird</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Stille bedeutet nicht Wohlbefinden.</p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten im Überblick</h4>
                <ul>
                    <li>Brauchen teure Technik, Fachwissen, Temperaturkontrolle</li>
                    <li>Spezielles Futter erforderlich</li>
                    <li>Hochkomplexe Ökosysteme können im Wohnzimmer nicht nachgebildet werden</li>
                    <li>Reptilien zeigen Schmerz nicht durch Laute</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4>Häufige Fehler</h4>
                <p>Falsche UV-Lampe, keine Wärmeinseln, zu wenig Feuchtigkeit. Folgen: Stoffwechselkrankheiten, Häutungsprobleme, Organversagen.</p>
                <h4 style="margin-top: 20px;">Albino-Reptilien</h4>
                <ul>
                    <li>Sehschwäche durch Pigmentmangel</li>
                    <li>Lichtempfindlichkeit = Stress</li>
                    <li>Höhere Krankheitsanfälligkeit</li>
                    <li>Überleben in Natur fast nie</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="💭">
                <p>Reptilien zeigen keine typischen Schmerzreaktionen. Ein regloser Leguan wird als "faul" fehlinterpretiert – dabei ist es oft ein Hilfeschrei.</p>
            </div>
        </div>

        <!-- Schildkröten -->
        <div class="tab-panel" data-tab="schildkroete">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 2rem;">🐢 Schildkröten</h3>

            <!-- Mythen als Accordion -->
            <div class="accordion" style="max-width: 900px; margin: 0 auto 40px;">

                <!-- Mythos 1 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🏠 Mythos 1: "Sind pflegeleicht – Terrarium oder Balkon reicht"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Schildkröten brauchen große Freigehege!</strong> Terrarium ist Tierquälerei.</p>
                        <div class="info-box" data-emoji="🌳" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Was Schildkröten wirklich brauchen:</strong></p>
                            <ul>
                                <li>Großes Freigehege (nicht Terrarium!)</li>
                                <li>Verstecke, Pflanzen, Erde zum Graben</li>
                                <li>UV-Licht, Wärmelampe</li>
                                <li>Artgerechte Fütterung (Wildkräuter)</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Wohnungshaltung ist meist tierschutzwidrig.</p>
                    </div>
                </div>

                <!-- Mythos 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>❄️ Mythos 2: "Brauchen keinen Winterschlaf"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Winterschlaf ist lebensnotwendig!</strong> Ohne: Organschäden.</p>
                        <div class="info-box" data-emoji="🛌" style="margin-top: 20px; background: var(--pastel-mint);">
                            <p><strong>Warum Winterschlaf so wichtig ist:</strong></p>
                            <ul>
                                <li>Reguliert Stoffwechsel</li>
                                <li>Ohne: Organversagen, verkürzte Lebenszeit</li>
                                <li>Muss fachgerecht durchgeführt werden</li>
                                <li>Temperaturen, Feuchtigkeit müssen stimmen</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Keine Winterruhe = langsames Sterben.</p>
                    </div>
                </div>

                <!-- Mythos 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>⏰ Mythos 3: "Werden nicht so alt"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Schildkröten werden 50-100 Jahre alt!</strong> Das ist eine Lebenszeit-Verpflichtung.</p>
                        <div class="info-box" data-emoji="🎂" style="margin-top: 20px; background: var(--pastel-lavender);">
                            <p><strong>Die Realität der Lebenserwartung:</strong></p>
                            <ul>
                                <li>Viele Arten werden 50-100 Jahre alt</li>
                                <li>Sie können dich überleben!</li>
                                <li>Wer übernimmt sie, wenn du stirbst?</li>
                                <li>Das ist keine Anschaffung für "ein paar Jahre"</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Eine Schildkröte ist Verantwortung fürs Leben – deins UND ihres.</p>
                    </div>
                </div>

                <!-- Mythos 4 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span>🏢 Mythos 4: "Kann man gut in der Wohnung halten"</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <h4>Die Wahrheit:</h4>
                        <p><strong>Wohnungshaltung ist unmöglich!</strong> Terrarien können Freigehege nicht ersetzen.</p>
                        <div class="info-box" data-emoji="🚫" style="margin-top: 20px; background: var(--pastel-coral);">
                            <p><strong>Warum Wohnungshaltung nicht funktioniert:</strong></p>
                            <ul>
                                <li>Brauchen echtes Sonnenlicht</li>
                                <li>Natürlichen Boden zum Graben</li>
                                <li>Temperaturschwankungen Tag/Nacht</li>
                                <li>Selbst große Terrarien sind zu klein</li>
                            </ul>
                        </div>
                        <p style="margin-top: 15px;"><strong>Fakt:</strong> Freigehege oder gar nicht.</p>
                    </div>
                </div>

            </div>

            <!-- Fakten Box -->
            <div class="info-box info" data-emoji="✅">
                <h4>Die Fakten im Überblick</h4>
                <ul>
                    <li>Brauchen großes Freigehege mit Verstecken, Pflanzen, Erde, UV-Licht, Wärmelampe</li>
                    <li>Benötigen Winterschlaf</li>
                    <li>Viele Arten werden 50 bis 100 Jahre alt</li>
                    <li>Wohnungshaltung ist meist tierschutzwidrig</li>
                </ul>
            </div>

            <div class="info-box warning" data-emoji="⚠️">
                <h4>Häufige Fehler</h4>
                <ul>
                    <li>Haltung ohne Winterschlaf (Organschäden)</li>
                    <li>Keine UVB-Versorgung (Knochenerweichung)</li>
                    <li>Falsches Futter (zu viel Obst, zu wenig Wildkräuter)</li>
                </ul>
            </div>

            <div class="info-box love" data-emoji="🐢">
                <p style="font-size: 1.2rem; text-align: center;"><strong>"Schildkröten sind stille Mitbewohner – aber sie haben eine laute Wahrheit: Verantwortung dauert ein Leben lang."</strong></p>
            </div>
        </div>
    </div>

</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
