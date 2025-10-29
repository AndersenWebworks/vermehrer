<?php
/**
 * Template Name: Tierliebe - Wissen
 * Template Post Type: page
 * Description: Kastration, Männchen vs. Weibchen, Wenn's nicht klappt, Glossar
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');
?>

<!-- Hero Section -->
<section class="primary-hero" style="min-height: 50vh;">
    <div class="hero-content">
        <h1 class="hero-title">📚 Wissen, das rettet</h1>
        <p class="hero-subtitle">Kastration, Geschlechter-Unterschiede, Notfallplan & Glossar</p>
    </div>
</section>

<!-- Tabs Section -->
<section class="section">
    <div class="container">
        <!-- Main Tabs -->
        <div class="tab-container">
            <div class="tab-buttons">
                <button class="tab-btn active" data-tab="kastration">Kastration</button>
                <button class="tab-btn" data-tab="geschlechter">Männchen vs. Weibchen</button>
                <button class="tab-btn" data-tab="notfall">Wenn's nicht klappt</button>
                <button class="tab-btn" data-tab="glossar">Glossar</button>
            </div>

            <!-- Tab Content 1: Kastration -->
            <div class="tab-content active" id="tab-kastration">
                <h2 style="margin-bottom: 30px;">💉 Kastration: Warum sie Pflicht ist</h2>

                <div class="info-box" style="background: var(--pastel-mint); margin-bottom: 40px;">
                    <p style="font-size: 1.2rem; line-height: 1.8;">
                        <strong>Unkastrierte Tiere sind nicht "natürlicher" – sie sind oft gestresst, krank oder ständig in Not.</strong><br>
                        Wer nicht kastriert, nimmt Tierleid in Kauf.
                    </p>
                </div>

                <div class="accordion">
                    <div class="accordion-item">
                        <button class="accordion-header">
                            <span>Folgen bei Nichtkastration</span>
                            <span class="accordion-icon">+</span>
                        </button>
                        <div class="accordion-content">
                            <h4>Rüden & Kater:</h4>
                            <ul>
                                <li>Dauerhafte Unruhe, Markieren, Streunen, Revierkämpfe</li>
                                <li>Verletzungen durch Kämpfe oder Unfälle</li>
                                <li>Frust durch nicht auslebbaren Sexualtrieb</li>
                                <li>Erhöhtes Risiko für Hodenkrebs / Prostataerkrankungen</li>
                            </ul>

                            <h4 style="margin-top: 25px;">Hündinnen & Katzen:</h4>
                            <ul>
                                <li>Rolligkeit = Dauerstress, jaulendes Verhalten, Unsauberkeit</li>
                                <li>Scheinträchtigkeit, Gebärmutterentzündungen, Eierstockzysten</li>
                                <li>Gefahr ungewollter Trächtigkeit – selbst bei Wohnungskatzen</li>
                                <li>Dauerhafte Belastung für Halter & Tier</li>
                            </ul>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-header">
                            <span>Früh- vs. Spätkastration</span>
                            <span class="accordion-icon">+</span>
                        </button>
                        <div class="accordion-content">
                            <h4>Frühkastration (4–6 Monate):</h4>
                            <p><strong>Vorteile:</strong> Verhindert rechtzeitig unerwünschte Trächtigkeit, kein Stress durch Rolligkeit, leichtere Operation</p>
                            <p><strong>Nachteile:</strong> Hormonhaushalt noch nicht vollständig entwickelt, kann bei großen Hunden Knochenwachstum beeinflussen</p>

                            <h4 style="margin-top: 25px;">Spätkastration (nach Geschlechtsreife):</h4>
                            <p><strong>Vorteile:</strong> Vollständige natürliche Entwicklung, Verhalten besser einschätzbar</p>
                            <p><strong>Nachteile:</strong> Gefahr dass Tier sich bereits vermehrt hat, Markieren/Aggression bereits ausgeprägt</p>

                            <div class="info-box" style="margin-top: 25px; background: var(--pastel-lavender);">
                                <strong>Empfehlung:</strong>
                                <ul style="margin-top: 10px;">
                                    <li>Bei Katzen: Frühkastration ab 12 Wochen</li>
                                    <li>Bei Hunden: Abhängig von Rasse, Größe und individueller Entwicklung</li>
                                    <li>Immer mit Tierarzt besprechen!</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-header">
                            <span>Wirtschaftlicher Aspekt</span>
                            <span class="accordion-icon">+</span>
                        </button>
                        <div class="accordion-content">
                            <p><strong>Viele glauben, Kastration sei "teuer".</strong><br>
                            Aber: Ein einziger Wurf mit Komplikationen kostet oft mehr!</p>

                            <ul style="margin-top: 20px;">
                                <li>Kastration einer Katze: <strong>ca. 80–150 €</strong></li>
                                <li>Kaiserschnitt bei Geburt: <strong>300–800 €</strong></li>
                                <li>Versorgung von Welpen: <strong>500 €+</strong></li>
                                <li>Tierheimkosten für abgegebene Jungtiere: <strong>unbezahlbar – für andere</strong></li>
                            </ul>

                            <p style="margin-top: 25px; font-size: 1.1rem;"><strong>FAUSTREGEL:</strong> Jede nicht kastrierte Katze kann in nur 2 Jahren über 80 Nachkommen haben!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content 2: Geschlechter (wird wegen Länge gekürzt, Kernaussagen) -->
            <div class="tab-content" id="tab-geschlechter">
                <h2 style="margin-bottom: 30px;">⚖️ Männchen vs. Weibchen</h2>

                <p style="font-size: 1.1rem; margin-bottom: 40px;">
                    Männchen und Weibchen sind nicht nur äußerlich unterschiedlich – auch Verhalten, Bedürfnisse und Entwicklung variieren stark.
                </p>

                <!-- Sub-Tabs für Tierarten -->
                <div class="sub-tab-buttons">
                    <button class="sub-tab-btn active" data-subtab="katzen">Katzen</button>
                    <button class="sub-tab-btn" data-subtab="hunde">Hunde</button>
                    <button class="sub-tab-btn" data-subtab="kleintiere">Kleintiere</button>
                </div>

                <!-- Katzen Sub-Tab -->
                <div class="sub-tab-content active" id="subtab-katzen">
                    <h3>🐱 Kater vs. Katze</h3>
                    <div class="comparison-table">
                        <div class="comparison-col">
                            <h4>Kater</h4>
                            <ul>
                                <li><strong>Charakter:</strong> Oft verschmuster, wenn sie Vertrauen fassen</li>
                                <li><strong>Verhalten:</strong> Neigen zu Revierverhalten und Markieren (unkastriert)</li>
                                <li><strong>Kastration:</strong> Verhindert Markieren und Kämpfe zu ca. 90%</li>
                                <li><strong>Gesundheit:</strong> 10–20% Risiko für Harnwegserkrankungen (engerer Harnleiter)</li>
                            </ul>
                        </div>
                        <div class="comparison-col">
                            <h4>Katze</h4>
                            <ul>
                                <li><strong>Charakter:</strong> Oft eigenständiger</li>
                                <li><strong>Verhalten:</strong> Rolligkeit (laut, unruhig) wenn unkastriert</li>
                                <li><strong>Kastration:</strong> Verhindert Rolligkeit und Trächtigkeiten zu 100%</li>
                                <li><strong>Gesundheit:</strong> 20% Risiko für Gebärmutterentzündungen (unkastriert)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Hunde Sub-Tab -->
                <div class="sub-tab-content" id="subtab-hunde">
                    <h3>🐕 Rüde vs. Hündin</h3>
                    <div class="comparison-table">
                        <div class="comparison-col">
                            <h4>Rüde</h4>
                            <ul>
                                <li><strong>Charakter:</strong> Oft dominanter, markiert stark</li>
                                <li><strong>Kastration:</strong> Reduziert Revierverhalten um 70–80%</li>
                                <li><strong>Gesundheit:</strong> 60% entwickeln Prostataprobleme (unkastriert)</li>
                            </ul>
                        </div>
                        <div class="comparison-col">
                            <h4>Hündin</h4>
                            <ul>
                                <li><strong>Charakter:</strong> Meist anhänglicher, aber eigenwilliger</li>
                                <li><strong>Kastration:</strong> Verhindert Scheinträchtigkeit zu 100%, senkt Gebärmutterrisiko um 90%</li>
                                <li><strong>Gesundheit:</strong> 25% Risiko für Gebärmutterentzündungen (unkastriert)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Kleintiere Sub-Tab (Kurzfassung) -->
                <div class="sub-tab-content" id="subtab-kleintiere">
                    <h3>🐰 Kaninchen, Wellensittiche & Meerschweinchen</h3>

                    <div class="info-card" style="margin-bottom: 25px;">
                        <h4>Kaninchen (Rammler vs. Häsin)</h4>
                        <p><strong>Rammler:</strong> Neugierig, territorial • <strong>Häsin:</strong> Ruhiger, aber bei Rangkämpfen aggressiv</p>
                        <p><strong>Wichtig:</strong> Unkastrierte Häsinnen haben 50–80% Risiko für Gebärmuttertumore!</p>
                    </div>

                    <div class="info-card" style="margin-bottom: 25px;">
                        <h4>Wellensittiche (Hahn vs. Henne)</h4>
                        <p><strong>Hahn:</strong> Gesprächiger, lernfreudiger • <strong>Henne:</strong> Ruhiger, territorialer (Brutverhalten)</p>
                        <p><strong>Wichtig:</strong> Hennen können bei Dauerbrutigkeit Legenot erleiden (20–30%)</p>
                    </div>

                    <div class="info-card">
                        <h4>Meerschweinchen (Bock vs. Sau)</h4>
                        <p><strong>Bock:</strong> Zutraulicher, kann untereinander streiten • <strong>Sau:</strong> Geselliger, lebt lieber in Gruppen</p>
                        <p><strong>Wichtig:</strong> Unkastrierte Sauen haben 20–50% Risiko für Eierstockzysten</p>
                    </div>
                </div>

                <div class="info-box" style="margin-top: 40px; background: var(--pastel-peach);">
                    <h4>💡 Was bedeuten Risikoprozente?</h4>
                    <p>Ein Risiko von <strong>20%</strong> bedeutet: Von 100 Tieren <strong>könnten</strong> 20 betroffen sein – aber 80 bleiben gesund.</p>
                    <p style="margin-top: 15px;"><strong>Wichtig:</strong> Auch wenn das Risiko gering ist, kann der Schaden für das Tier groß sein. Kastration kann viele Probleme vermeiden!</p>
                </div>
            </div>

            <!-- Tab Content 3: Wenn's nicht klappt -->
            <div class="tab-content" id="tab-notfall">
                <h2 style="margin-bottom: 30px;">🆘 Wenn es nicht klappt</h2>

                <p style="font-size: 1.1rem; margin-bottom: 40px;">
                    Manchmal ändern sich Lebensumstände. Manchmal wird alles zu viel. Es ist keine Schande, ein Tier abzugeben – <strong>aber es ist eine Verantwortung.</strong>
                </p>

                <div class="comparison-grid" style="grid-template-columns: 1fr 1fr;">
                    <div class="comparison-panel panel-danger">
                        <div class="panel-header">
                            <span class="panel-icon">❌</span>
                            <h3>Was NICHT tun</h3>
                        </div>
                        <div class="panel-content">
                            <ul class="panel-list">
                                <li>Nicht einfach verschenken – ohne Vorkontrolle oder Vertrag</li>
                                <li>Nicht bei eBay, Facebook & Co. anbieten – zieht unseriöse Käufer an</li>
                                <li>Nicht einfach aussetzen – das ist strafbar und Tierquälerei</li>
                            </ul>
                        </div>
                    </div>

                    <div class="comparison-panel panel-success">
                        <div class="panel-header">
                            <span class="panel-icon">✅</span>
                            <h3>Was stattdessen tun</h3>
                        </div>
                        <div class="panel-content">
                            <ul class="panel-list">
                                <li>Tierheim oder Tierschutzverein kontaktieren – ehrlich, freundlich, verantwortungsvoll</li>
                                <li>Freunde oder Bekannte mit Erfahrung fragen</li>
                                <li>Beratungsstellen aufsuchen, wenn Verhalten das Problem ist</li>
                                <li>Zeit einplanen – gute Abgabe braucht Geduld</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="info-box" style="margin-top: 50px; background: var(--pastel-lavender);">
                    <h4>💜 Du musst kein schlechter Mensch sein, um an deine Grenzen zu kommen.</h4>
                    <p style="font-size: 1.1rem; margin-top: 15px;">
                        Aber du solltest einer sein, der dann <strong>verantwortlich handelt.</strong><br>
                        Viele Probleme lassen sich lösen, wenn man frühzeitig ehrlich hinschaut.
                    </p>
                </div>
            </div>

            <!-- Tab Content 4: Glossar (gekürzte Version, nur wichtigste Begriffe) -->
            <div class="tab-content" id="tab-glossar">
                <h2 style="margin-bottom: 30px;">📖 Glossar: Die wichtigsten Begriffe</h2>

                <div class="glossar-grid">
                    <div class="glossar-item"><strong>Adoption:</strong> Übernahme eines Tieres aus dem Tierheim</div>
                    <div class="glossar-item"><strong>Artgerechte Haltung:</strong> Haltung entsprechend natürlicher Bedürfnisse</div>
                    <div class="glossar-item"><strong>Brachyzephalie:</strong> Kurzköpfigkeit (z.B. Mops) – führt zu Atemnot</div>
                    <div class="glossar-item"><strong>Frühkastration:</strong> Kastration vor Geschlechtsreife (ab 12 Wochen)</div>
                    <div class="glossar-item"><strong>Inzucht:</strong> Paarung verwandter Tiere – führt zu Problemen</div>
                    <div class="glossar-item"><strong>Kastration:</strong> Entfernung der Fortpflanzungsorgane</div>
                    <div class="glossar-item"><strong>Qualzucht:</strong> Zucht auf gesundheitsschädliche Merkmale</div>
                    <div class="glossar-item"><strong>Rolligkeit:</strong> Fortpflanzungsbereitschaft bei Katzen</div>
                    <div class="glossar-item"><strong>Schutzgebühr:</strong> Betrag bei Adoption – verhindert unüberlegte Käufe</div>
                    <div class="glossar-item"><strong>Sozialisierung:</strong> Lernen, mit Artgenossen und Menschen umzugehen</div>
                    <div class="glossar-item"><strong>Spätkastration:</strong> Kastration nach Geschlechtsreife</div>
                    <div class="glossar-item"><strong>Vorkontrolle:</strong> Überprüfung des Zuhauses vor Adoption</div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="cta-section" style="margin-top: 80px; text-align: center;">
            <h3 style="font-size: 2rem; margin-bottom: 25px;">Jetzt bist du bereit – aber bist du es wirklich?</h3>
            <a href="<?php echo home_url('/tierliebe-test'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 18px 45px;">
                ✨ Zum Bereitschafts-Test
            </a>
        </div>
    </div>
</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
