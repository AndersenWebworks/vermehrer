<?php
/**
 * Template Name: Tierliebe - Wissen
 * Template Post Type: page
 * Description: Kastration, Männchen vs. Weibchen, Wenn's nicht klappt, Glossar
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');

$content = get_tierliebe_text('wissen');
?>

<!-- Hero Section -->
<section class="primary-hero" style="min-height: 50vh;">
    <div class="hero-content">
        <h1 class="hero-title editable" data-key="hero-titel"><?php echo isset($content['hero-titel']) ? wp_kses_post($content['hero-titel']) : '📚 Wissen, das rettet'; ?></h1>
        <p class="hero-subtitle editable" data-key="hero-subtitle"><?php echo isset($content['hero-subtitle']) ? wp_kses_post($content['hero-subtitle']) : 'Kastration, Geschlechter-Unterschiede, Notfallplan & Glossar'; ?></p>
    </div>
</section>

<!-- Tabs Section -->
<section class="section">
    <div class="container">
        <!-- Main Tabs -->
        <div class="tab-container">
            <div class="tab-buttons">
                <button class="tab-btn active" data-tab="kastration"><span class="editable" data-key="tab-1-button"><?php echo isset($content['tab-1-button']) ? esc_html(strip_tags($content['tab-1-button'])) : 'Kastration'; ?></span></button>
                <button class="tab-btn" data-tab="geschlechter"><span class="editable" data-key="tab-2-button"><?php echo isset($content['tab-2-button']) ? esc_html(strip_tags($content['tab-2-button'])) : 'Männchen vs. Weibchen'; ?></span></button>
                <button class="tab-btn" data-tab="notfall"><span class="editable" data-key="tab-3-button"><?php echo isset($content['tab-3-button']) ? esc_html(strip_tags($content['tab-3-button'])) : 'Wenn\'s nicht klappt'; ?></span></button>
                <button class="tab-btn" data-tab="glossar"><span class="editable" data-key="tab-4-button"><?php echo isset($content['tab-4-button']) ? esc_html(strip_tags($content['tab-4-button'])) : 'Glossar'; ?></span></button>
            </div>

            <!-- Tab Content 1: Kastration -->
            <div class="tab-content active" id="tab-kastration">
                <h2 class="editable" data-key="kastration-titel" style="margin-bottom: 30px;"><?php echo isset($content['kastration-titel']) ? wp_kses_post($content['kastration-titel']) : '💉 Kastration: Warum sie Pflicht ist'; ?></h2>

                <div class="info-box" style="background: var(--pastel-mint); margin-bottom: 40px;">
                    <p class="editable" data-key="kastration-intro" style="font-size: 1.2rem; line-height: 1.8;">
                        <?php echo isset($content['kastration-intro']) ? wp_kses_post($content['kastration-intro']) : '<strong>Unkastrierte Tiere sind nicht "natürlicher" – sie sind oft gestresst, krank oder ständig in Not.</strong><br>Wer nicht kastriert, nimmt Tierleid in Kauf.'; ?>
                    </p>
                </div>

                <div class="accordion">
                    <div class="accordion-item">
                        <button class="accordion-header">
                            <span class="editable" data-key="kastration-acc-1-header"><?php echo isset($content['kastration-acc-1-header']) ? esc_html(strip_tags($content['kastration-acc-1-header'])) : 'Folgen bei Nichtkastration'; ?></span>
                            <span class="accordion-icon">+</span>
                        </button>
                        <div class="accordion-content">
                            <h4>Rüden & Kater:</h4>
                            <ul class="editable" data-key="wissen-liste-1">
                                <li>Dauerhafte Unruhe, Markieren, Streunen, Revierkämpfe</li>
                                <li>Verletzungen durch Kämpfe oder Unfälle</li>
                                <li>Frust durch nicht auslebbaren Sexualtrieb</li>
                                <li>Erhöhtes Risiko für Hodenkrebs / Prostataerkrankungen</li>
                            </ul>

                            <h4 style="margin-top: 25px;">Hündinnen & Katzen:</h4>
                            <ul class="editable" data-key="wissen-liste-2">
                                <li>Rolligkeit = Dauerstress, jaulendes Verhalten, Unsauberkeit</li>
                                <li>Scheinträchtigkeit, Gebärmutterentzündungen, Eierstockzysten</li>
                                <li>Gefahr ungewollter Trächtigkeit – selbst bei Wohnungskatzen</li>
                                <li>Dauerhafte Belastung für Halter & Tier</li>
                            </ul>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-header">
                            <span class="editable" data-key="kastration-acc-2-header"><?php echo isset($content['kastration-acc-2-header']) ? esc_html(strip_tags($content['kastration-acc-2-header'])) : 'Früh- vs. Spätkastration'; ?></span>
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
                                <ul class="editable" data-key="wissen-liste-3" style="margin-top: 10px;">
                                    <li>Bei Katzen: Frühkastration ab 12 Wochen</li>
                                    <li>Bei Hunden: Abhängig von Rasse, Größe und individueller Entwicklung</li>
                                    <li>Immer mit Tierarzt besprechen!</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-header">
                            <span class="editable" data-key="kastration-acc-3-header"><?php echo isset($content['kastration-acc-3-header']) ? esc_html(strip_tags($content['kastration-acc-3-header'])) : 'Wirtschaftlicher Aspekt'; ?></span>
                            <span class="accordion-icon">+</span>
                        </button>
                        <div class="accordion-content">
                            <p><strong>Viele glauben, Kastration sei "teuer".</strong><br>
                            Aber: Ein einziger Wurf mit Komplikationen kostet oft mehr!</p>

                            <ul class="editable" data-key="wissen-liste-4" style="margin-top: 20px;">
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
                <h2 class="editable" data-key="geschlechter-titel" style="margin-bottom: 30px;"><?php echo isset($content['geschlechter-titel']) ? wp_kses_post($content['geschlechter-titel']) : '⚖️ Männchen vs. Weibchen'; ?></h2>

                <p class="editable" data-key="geschlechter-intro" style="font-size: 1.1rem; margin-bottom: 40px;">
                    <?php echo isset($content['geschlechter-intro']) ? wp_kses_post($content['geschlechter-intro']) : 'Männchen und Weibchen sind nicht nur äußerlich unterschiedlich – auch Verhalten, Bedürfnisse und Entwicklung variieren stark.'; ?>
                </p>

                <!-- Sub-Tabs für Tierarten -->
                <div class="sub-tab-buttons">
                    <button class="sub-tab-btn active" data-subtab="katzen"><span class="editable" data-key="subtab-1-button"><?php echo isset($content['subtab-1-button']) ? esc_html(strip_tags($content['subtab-1-button'])) : 'Katzen'; ?></span></button>
                    <button class="sub-tab-btn" data-subtab="hunde"><span class="editable" data-key="subtab-2-button"><?php echo isset($content['subtab-2-button']) ? esc_html(strip_tags($content['subtab-2-button'])) : 'Hunde'; ?></span></button>
                    <button class="sub-tab-btn" data-subtab="kleintiere"><span class="editable" data-key="subtab-3-button"><?php echo isset($content['subtab-3-button']) ? esc_html(strip_tags($content['subtab-3-button'])) : 'Kleintiere'; ?></span></button>
                </div>

                <!-- Katzen Sub-Tab -->
                <div class="sub-tab-content active" id="subtab-katzen">
                    <h3>🐱 Kater vs. Katze</h3>
                    <div class="comparison-table">
                        <div class="comparison-col">
                            <h4>Kater</h4>
                            <ul class="editable" data-key="wissen-liste-5">
                                <li><strong>Charakter:</strong> Oft verschmuster, wenn sie Vertrauen fassen</li>
                                <li><strong>Verhalten:</strong> Neigen zu Revierverhalten und Markieren (unkastriert)</li>
                                <li><strong>Kastration:</strong> Verhindert Markieren und Kämpfe zu ca. 90%</li>
                                <li><strong>Gesundheit:</strong> 10–20% Risiko für Harnwegserkrankungen (engerer Harnleiter)</li>
                            </ul>
                        </div>
                        <div class="comparison-col">
                            <h4>Katze</h4>
                            <ul class="editable" data-key="wissen-liste-6">
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
                            <ul class="editable" data-key="wissen-liste-7">
                                <li><strong>Charakter:</strong> Oft dominanter, markiert stark</li>
                                <li><strong>Kastration:</strong> Reduziert Revierverhalten um 70–80%</li>
                                <li><strong>Gesundheit:</strong> 60% entwickeln Prostataprobleme (unkastriert)</li>
                            </ul>
                        </div>
                        <div class="comparison-col">
                            <h4>Hündin</h4>
                            <ul class="editable" data-key="wissen-liste-8">
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
                    <h4 class="editable" data-key="geschlechter-box-titel"><?php echo isset($content['geschlechter-box-titel']) ? esc_html(strip_tags($content['geschlechter-box-titel'])) : '💡 Was bedeuten Risikoprozente?'; ?></h4>
                    <p class="editable" data-key="geschlechter-box-text1"><?php echo isset($content['geschlechter-box-text1']) ? wp_kses_post($content['geschlechter-box-text1']) : 'Ein Risiko von <strong>20%</strong> bedeutet: Von 100 Tieren <strong>könnten</strong> 20 betroffen sein – aber 80 bleiben gesund.'; ?></p>
                    <p class="editable" data-key="geschlechter-box-text2" style="margin-top: 15px;"><?php echo isset($content['geschlechter-box-text2']) ? wp_kses_post($content['geschlechter-box-text2']) : '<strong>Wichtig:</strong> Auch wenn das Risiko gering ist, kann der Schaden für das Tier groß sein. Kastration kann viele Probleme vermeiden!'; ?></p>
                </div>
            </div>

            <!-- Tab Content 3: Wenn's nicht klappt -->
            <div class="tab-content" id="tab-notfall">
                <h2 class="editable" data-key="notfall-titel" style="margin-bottom: 30px;"><?php echo isset($content['notfall-titel']) ? wp_kses_post($content['notfall-titel']) : '🆘 Wenn es nicht klappt'; ?></h2>

                <p class="editable" data-key="notfall-intro" style="font-size: 1.1rem; margin-bottom: 40px;">
                    <?php echo isset($content['notfall-intro']) ? wp_kses_post($content['notfall-intro']) : 'Manchmal ändern sich Lebensumstände. Manchmal wird alles zu viel. Es ist keine Schande, ein Tier abzugeben – <strong>aber es ist eine Verantwortung.</strong>'; ?>
                </p>

                <div class="comparison-grid" style="grid-template-columns: 1fr 1fr;">
                    <div class="comparison-panel panel-danger">
                        <div class="panel-header">
                            <span class="panel-icon">❌</span>
                            <h3 class="editable" data-key="notfall-panel-1-titel"><?php echo isset($content['notfall-panel-1-titel']) ? esc_html(strip_tags($content['notfall-panel-1-titel'])) : 'Was NICHT tun'; ?></h3>
                        </div>
                        <div class="panel-content">
                            <ul class="editable panel-list" data-key="wissen-liste-9">
                                <li>Nicht einfach verschenken – ohne Vorkontrolle oder Vertrag</li>
                                <li>Nicht bei eBay, Facebook & Co. anbieten – zieht unseriöse Käufer an</li>
                                <li>Nicht einfach aussetzen – das ist strafbar und Tierquälerei</li>
                            </ul>
                        </div>
                    </div>

                    <div class="comparison-panel panel-success">
                        <div class="panel-header">
                            <span class="panel-icon">✅</span>
                            <h3 class="editable" data-key="notfall-panel-2-titel"><?php echo isset($content['notfall-panel-2-titel']) ? esc_html(strip_tags($content['notfall-panel-2-titel'])) : 'Was stattdessen tun'; ?></h3>
                        </div>
                        <div class="panel-content">
                            <ul class="editable panel-list" data-key="wissen-liste-10">
                                <li>Tierheim oder Tierschutzverein kontaktieren – ehrlich, freundlich, verantwortungsvoll</li>
                                <li>Freunde oder Bekannte mit Erfahrung fragen</li>
                                <li>Beratungsstellen aufsuchen, wenn Verhalten das Problem ist</li>
                                <li>Zeit einplanen – gute Abgabe braucht Geduld</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="info-box" style="margin-top: 50px; background: var(--pastel-lavender);">
                    <h4 class="editable" data-key="notfall-box-titel"><?php echo isset($content['notfall-box-titel']) ? wp_kses_post($content['notfall-box-titel']) : '💜 Du musst kein schlechter Mensch sein, um an deine Grenzen zu kommen.'; ?></h4>
                    <p class="editable" data-key="notfall-box-text" style="font-size: 1.1rem; margin-top: 15px;">
                        <?php echo isset($content['notfall-box-text']) ? wp_kses_post($content['notfall-box-text']) : 'Aber du solltest einer sein, der dann <strong>verantwortlich handelt.</strong><br>Viele Probleme lassen sich lösen, wenn man frühzeitig ehrlich hinschaut.'; ?>
                    </p>
                </div>
            </div>

            <!-- Tab Content 4: Glossar (Vollständige Version A-Z) -->
            <div class="tab-content" id="tab-glossar">
                <h2 class="editable" data-key="glossar-titel" style="margin-bottom: 30px;"><?php echo isset($content['glossar-titel']) ? wp_kses_post($content['glossar-titel']) : '📖 Glossar: Fachbegriffe A-Z'; ?></h2>

                <div class="glossar-grid">
                    <div class="glossar-item"><strong>Adoption:</strong> Übernahme eines Tieres aus Tierheim, Pflegestelle oder privater Abgabe</div>
                    <div class="glossar-item"><strong>Artgerechte Haltung:</strong> Haltungsform, die natürliche Bedürfnisse erfüllt (Platz, Sozialkontakt, Futter)</div>
                    <div class="glossar-item"><strong>Atemwegserkrankungen:</strong> Häufiges Problem bei überzüchteten Rassen durch verkürzte Nasenpartien</div>
                    <div class="glossar-item"><strong>Beißhemmung:</strong> Fähigkeit, Bissstärke zu kontrollieren; wichtig für Sozialverhalten</div>
                    <div class="glossar-item"><strong>Brachyzephalie:</strong> Kurzköpfigkeit bei Möpsen etc., führt zu Atemnot und Augenproblemen</div>
                    <div class="glossar-item"><strong>Brutverhalten:</strong> Natürliches Verhalten beim Nestbau, Eierlegen und Schutz</div>
                    <div class="glossar-item"><strong>Domestikation:</strong> Anpassung von Tieren an das Zusammenleben mit Menschen über Generationen</div>
                    <div class="glossar-item"><strong>Einzelhaltung:</strong> Haltung ohne Artgenossen; für soziale Tiere nicht artgerecht</div>
                    <div class="glossar-item"><strong>Freigänger:</strong> Katzen mit ständigem Zugang nach draußen</div>
                    <div class="glossar-item"><strong>Frühkastration:</strong> Kastration vor Geschlechtsreife (ab ~12 Wochen)</div>
                    <div class="glossar-item"><strong>Frühtrennung:</strong> Zu frühe Abgabe von Jungtieren; verursacht Verhaltensprobleme</div>
                    <div class="glossar-item"><strong>Genmutation:</strong> Erbbedingte Veränderung zur Erzeugung bestimmter Merkmale</div>
                    <div class="glossar-item"><strong>Harnmarkieren:</strong> Reviermarkierung durch Urin bei Katern oder Rüden</div>
                    <div class="glossar-item"><strong>Hauskatze:</strong> Katze ohne Rassezugehörigkeit; robuster und gesünder</div>
                    <div class="glossar-item"><strong>Hormone:</strong> Botenstoffe, die Verhalten und Gesundheit beeinflussen</div>
                    <div class="glossar-item"><strong>Inzucht:</strong> Paarung eng verwandter Tiere; führt zu genetischen Problemen</div>
                    <div class="glossar-item"><strong>Kastration:</strong> Operative Entfernung der Fortpflanzungsorgane; verhindert Fortpflanzung</div>
                    <div class="glossar-item"><strong>Legenot:</strong> Lebensgefährlicher Zustand bei Vögeln/Reptilien; erfordert Notfall-Tierarzt</div>
                    <div class="glossar-item"><strong>Leinenzwang:</strong> Gesetzliche Vorschrift zum Führen an der Leine in bestimmten Gebieten</div>
                    <div class="glossar-item"><strong>Nistmaterial:</strong> Material zum Nestbau (Stroh, Federn etc.)</div>
                    <div class="glossar-item"><strong>Prägung:</strong> Frühe Lernphase für grundlegende Verhaltensmuster und Bindungen</div>
                    <div class="glossar-item"><strong>Qualzucht:</strong> Zucht auf schädliche Merkmale (z.B. flache Nasen)</div>
                    <div class="glossar-item"><strong>Resozialisierung:</strong> Gewöhnung traumatisierter Tiere an Menschen und Umgebung</div>
                    <div class="glossar-item"><strong>Rolligkeit:</strong> Fortpflanzungsbereitschaft bei Katzen mit Rufen und Unruhe</div>
                    <div class="glossar-item"><strong>Schutzgebühr:</strong> Zahlbetrag bei Adoption; unterstützt Tierheim und verhindert Impulsverkäufe</div>
                    <div class="glossar-item"><strong>Schwanzbeißen:</strong> Stressbedingtes Selbstverletzungsverhalten</div>
                    <div class="glossar-item"><strong>Sozialisierung:</strong> Lernprozess im Umgang mit Artgenossen, Menschen und Umwelt</div>
                    <div class="glossar-item"><strong>Spätkastration:</strong> Kastration nach Geschlechtsreife</div>
                    <div class="glossar-item"><strong>Sterilisation:</strong> Durchtrennung der Fortpflanzungsorgane ohne Entfernung</div>
                    <div class="glossar-item"><strong>Tierschutzgesetz:</strong> Gesetzliche Regelung zum Schutz tierischen Wohls</div>
                    <div class="glossar-item"><strong>Tierschutzorganisation:</strong> Vereine für Tierschutz, Pflege und Vermittlung</div>
                    <div class="glossar-item"><strong>Trächtigkeit:</strong> Zeitraum der Nachwuchsentwicklung (Hund ~63 Tage, Katze ~65 Tage)</div>
                    <div class="glossar-item"><strong>Überzüchtung:</strong> Zucht auf extreme schädliche Merkmale</div>
                    <div class="glossar-item"><strong>Vermittlung:</strong> Prozess der Platzierung eines Tieres in neuem Zuhause</div>
                    <div class="glossar-item"><strong>Vorkontrolle:</strong> Überprüfung des neuen Zuhauses vor Adoption</div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="cta-section" style="margin-top: 80px; text-align: center;">
            <h3 class="editable" data-key="cta-titel" style="font-size: 2rem; margin-bottom: 25px;"><?php echo isset($content['cta-titel']) ? wp_kses_post($content['cta-titel']) : 'Jetzt bist du bereit – aber bist du es wirklich?'; ?></h3>
            <a href="<?php echo home_url('/tierliebe-test'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 18px 45px;">
                <span class="editable" data-key="cta-button"><?php echo isset($content['cta-button']) ? esc_html(strip_tags($content['cta-button'])) : '✨ Zum Bereitschafts-Test'; ?></span>
            </a>
        </div>
    </div>
</section>

<?php
if (current_user_can('edit_posts')) {
    echo '<input type="hidden" id="tierliebe-page-slug" value="wissen">';
}

get_template_part('tierliebe-parts/footer');
?>
