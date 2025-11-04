<?php
/**
 * Template Name: Tierliebe - Adoption
 * Template Post Type: page
 * Description: Zucht vs. Kauf vs. Adoption, Adoptionsprozess, Wirtschaftlichkeit
 * Version: 1.1.0
 */

get_template_part('tierliebe-parts/header');

$content = get_tierliebe_text('adoption');
?>

<!-- Hero Section -->
<section class="primary-hero" style="min-height: 60vh;">
    <div class="hero-content">
        <h1 class="hero-title editable" data-key="hero-titel"><?php echo isset($content['hero-titel']) ? wp_kses_post($content['hero-titel']) : '❤️ Adoption rettet Leben'; ?></h1>
        <p class="hero-subtitle editable" data-key="hero-subtitle"><?php echo isset($content['hero-subtitle']) ? wp_kses_post($content['hero-subtitle']) : 'Warum Adoption der einzige ethische Weg ist – und wie er funktioniert'; ?></p>
    </div>
</section>

<!-- Tierkauf im Zoofachhandel -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <h2 class="section-title editable" data-key="zoofach-titel" style="text-align: center; margin-bottom: 30px;"><?php echo isset($content['zoofach-titel']) ? wp_kses_post($content['zoofach-titel']) : '🛒 Tierkauf im Zoofachhandel'; ?></h2>
        <p class="editable" data-key="zoofach-intro" style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.1rem; color: var(--text-medium);">
            <?php echo isset($content['zoofach-intro']) ? wp_kses_post($content['zoofach-intro']) : 'Viele Menschen kaufen Tiere im Zoofachhandel – weil es einfach ist, weil sie "gesund aussehen", weil keine Fragen gestellt werden.'; ?>
        </p>

        <div class="info-box warning" data-emoji="⚠️">
            <h3 class="editable" data-key="zoofach-box-titel"><?php echo isset($content['zoofach-box-titel']) ? wp_kses_post($content['zoofach-box-titel']) : 'Die Realität hinter dem Verkauf'; ?></h3>
            <ul style="font-size: 1.1rem; line-height: 1.8; margin-top: 20px;" class="editable" data-key="zoofach-box-liste">
                <li><strong>Herkunft:</strong> Viele Tiere stammen aus Massenzuchten – überzüchtet, krank, zu jung</li>
                <li><strong>Zu frühe Abgabe:</strong> Welpen und Jungtiere werden oft mit 4–6 Wochen abgegeben (statt 12+ Wochen)</li>
                <li><strong>Keine Sozialisierung:</strong> Tiere haben nie echte Bindung gelernt, keine Grenzen, kein Vertrauen</li>
                <li><strong>Krankheiten:</strong> Atemwegserkrankungen, Parasiten, genetische Defekte – oft unsichtbar beim Kauf</li>
                <li><strong>Keine echte Beratung:</strong> Verkaufspersonal ist nicht für ehrliche, artgerechte Beratung da – sondern für Verkaufszahlen</li>
            </ul>
        </div>

        <div class="info-box" style="margin-top: 30px; background: var(--pastel-coral); color: white;">
            <h3 class="editable" data-key="zoofach-system-titel" style="color: white;"><?php echo isset($content['zoofach-system-titel']) ? wp_kses_post($content['zoofach-system-titel']) : '💔 Das System dahinter'; ?></h3>
            <p class="editable" data-key="zoofach-system-text1" style="font-size: 1.1rem; line-height: 1.8; margin-top: 15px;">
                <?php echo isset($content['zoofach-system-text1']) ? wp_kses_post($content['zoofach-system-text1']) : 'Zoofachhandel ist ein <strong>Geschäft</strong>. Tiere sind <strong>Ware</strong>. Jeder Verkauf bedeutet: Die Kette läuft weiter.<br>Züchter produzieren nach, Großhändler liefern nach, Läden verkaufen weiter.'; ?>
            </p>
            <p class="editable" data-key="zoofach-system-text2" style="margin-top: 20px; font-size: 1.2rem; font-weight: 700;">
                <?php echo isset($content['zoofach-system-text2']) ? wp_kses_post($content['zoofach-system-text2']) : 'Kauf "aus Mitleid" rettet kein Tier – es hält das System am Leben.'; ?>
            </p>
        </div>

        <div class="info-box" style="margin-top: 30px; background: var(--pastel-mint);">
            <h3 class="editable" data-key="zoofach-alternative-titel"><?php echo isset($content['zoofach-alternative-titel']) ? wp_kses_post($content['zoofach-alternative-titel']) : '✅ Was du stattdessen tun kannst'; ?></h3>
            <ul style="font-size: 1.1rem; line-height: 1.8; margin-top: 15px;" class="editable" data-key="zoofach-alternative-liste">
                <li>Adoptiere aus dem Tierheim oder Tierschutzverein</li>
                <li>Nimm Kontakt zu erfahrenen Haltern auf (z.B. über Foren, Vereine)</li>
                <li>Falls Zucht: Nur von seriösen Züchtern mit Tests, Sozialisierung, transparenter Haltung</li>
                <li>Informiere dich VORHER über die Bedürfnisse der Tierart</li>
            </ul>
        </div>
    </div>
</section>

<!-- Warum Adoption? 3-Panel-Vergleich -->
<section class="section">
    <div class="container">
        <h2 class="section-title editable" data-key="vergleich-titel" style="text-align: center; margin-bottom: 30px;"><?php echo isset($content['vergleich-titel']) ? wp_kses_post($content['vergleich-titel']) : 'Zucht, Kauf oder Adoption?'; ?></h2>
        <p class="editable" data-key="vergleich-subtitle" style="text-align: center; max-width: 800px; margin: 0 auto 20px; font-size: 1.2rem; color: var(--text-dark); font-weight: 600;">
            <?php echo isset($content['vergleich-subtitle']) ? wp_kses_post($content['vergleich-subtitle']) : 'Warum die Herkunft über das ganze Leben eines Tieres entscheidet.'; ?>
        </p>
        <div style="max-width: 900px; margin: 0 auto 50px;">
            <div class="info-box" style="background: var(--pastel-peach);">
                <p class="editable" data-key="vergleich-frage" style="font-size: 1.1rem; margin-bottom: 15px;"><?php echo isset($content['vergleich-frage']) ? wp_kses_post($content['vergleich-frage']) : '<strong>Frage:</strong> "Hauptsache, das Tier hats gut bei mir."'; ?></p>
                <p class="editable" data-key="vergleich-antwort" style="font-size: 1.1rem;"><?php echo isset($content['vergleich-antwort']) ? wp_kses_post($content['vergleich-antwort']) : '<strong>Antwort:</strong> Aber das allein reicht nicht. Denn jedes Tier, das geboren wird, nimmt einem anderen den Platz weg. Und jedes gekaufte Tier sorgt dafür, dass noch mehr Tiere gezüchtet werden – legal oder illegal.'; ?></p>
            </div>
        </div>

        <div class="comparison-grid">
            <!-- ZUCHT -->
            <div class="comparison-panel panel-warning">
                <div class="panel-header">
                    <span class="panel-icon">⚠️</span>
                    <h3 class="editable" data-key="panel-zucht-titel"><?php echo isset($content['panel-zucht-titel']) ? esc_html(strip_tags($content['panel-zucht-titel'])) : 'Zucht-Problematik'; ?></h3>
                </div>
                <div class="panel-content">
                    <ul class="panel-list editable" data-key="panel-zucht-liste">
                        <li>Produziert auf Bestellung – obwohl die Tierheime voll sind</li>
                        <li>Wirtschaftlich an der Grenze: Zu frühe Abgaben, zu wenig Sozialisierung</li>
                        <li>"Reinrassig" bedeutet oft: krank gezüchtet (Atemnot, Gelenkprobleme, Epilepsie)</li>
                        <li>Hobbyzüchter: Tiere wie Ware, meist ohne jede Kontrolle</li>
                    </ul>
                </div>
            </div>

            <!-- KAUF -->
            <div class="comparison-panel panel-danger">
                <div class="panel-header">
                    <span class="panel-icon">❌</span>
                    <h3 class="editable" data-key="panel-kauf-titel"><?php echo isset($content['panel-kauf-titel']) ? esc_html(strip_tags($content['panel-kauf-titel'])) : 'Kauf-Realität'; ?></h3>
                </div>
                <div class="panel-content">
                    <ul class="panel-list editable" data-key="panel-kauf-liste">
                        <li>eBay, Märkte, Kofferraum-Verkäufe</li>
                        <li>Viele sind krank, traumatisiert, zu jung oder ohne Impfschutz</li>
                        <li>Kauf "aus Mitleid" hilft nur dem Verkäufer</li>
                        <li>Sorgt dafür, dass das Geschäft weiterläuft</li>
                    </ul>
                </div>
            </div>

            <!-- ADOPTION -->
            <div class="comparison-panel panel-success">
                <div class="panel-header">
                    <span class="panel-icon">✅</span>
                    <h3 class="editable" data-key="panel-adoption-titel"><?php echo isset($content['panel-adoption-titel']) ? esc_html(strip_tags($content['panel-adoption-titel'])) : 'Adoption-Vorteile'; ?></h3>
                </div>
                <div class="panel-content">
                    <ul class="panel-list editable" data-key="panel-adoption-liste">
                        <li>Rettet ein Leben – verhindert neues Tierleid</li>
                        <li>Tierschutztiere sind keine "Problemfälle"</li>
                        <li>Viele sind jung, sozialisiert und bereit für ein echtes Zuhause</li>
                        <li>Entlastet Tierheime – sendet ein klares Zeichen</li>
                    </ul>
                    <div class="panel-quote">
                        <p class="editable" data-key="panel-adoption-quote"><?php echo isset($content['panel-adoption-quote']) ? wp_kses_post($content['panel-adoption-quote']) : '<strong>"Du kannst das Leben eines Tieres nicht verändern, weil du es gekauft hast. Aber du kannst es verändern, wenn du es adoptierst."</strong>'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Adoptionsprozess Timeline -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <h2 class="section-title editable" data-key="prozess-titel" style="text-align: center; margin-bottom: 30px;"><?php echo isset($content['prozess-titel']) ? wp_kses_post($content['prozess-titel']) : 'Der Adoptionsprozess'; ?></h2>
        <p class="editable" data-key="prozess-intro" style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.1rem; color: var(--text-medium);">
            <?php echo isset($content['prozess-intro']) ? wp_kses_post($content['prozess-intro']) : 'Ein Tier aus dem Tierheim zu adoptieren ist keine Hürde – es ist ein Schutz für dich und das Tier.'; ?>
        </p>

        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-marker">1</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-1-titel"><?php echo isset($content['timeline-1-titel']) ? esc_html(strip_tags($content['timeline-1-titel'])) : 'Kontaktaufnahme'; ?></h3>
                    <p class="editable" data-key="timeline-1-text"><?php echo isset($content['timeline-1-text']) ? wp_kses_post($content['timeline-1-text']) : 'Du interessierst dich für ein Tier und nimmst Kontakt zum Tierheim auf. Oft erfolgt ein erstes Beratungsgespräch – telefonisch, per Mail oder vor Ort.'; ?></p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">2</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-2-titel"><?php echo isset($content['timeline-2-titel']) ? esc_html(strip_tags($content['timeline-2-titel'])) : 'Kennenlernen'; ?></h3>
                    <p class="editable" data-key="timeline-2-text"><?php echo isset($content['timeline-2-text']) ? wp_kses_post($content['timeline-2-text']) : 'Du lernst das Tier kennen – oft mehrmals. Tierheime möchten sicherstellen, dass Mensch und Tier zusammenpassen. Bei Hunden: Gassigehen, Spielen im Auslauf, Zeit verbringen.'; ?></p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">3</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-3-titel"><?php echo isset($content['timeline-3-titel']) ? esc_html(strip_tags($content['timeline-3-titel'])) : 'Fragebogen & Beratung'; ?></h3>
                    <p class="editable" data-key="timeline-3-text"><?php echo isset($content['timeline-3-text']) ? wp_kses_post($content['timeline-3-text']) : 'Du füllst einen Fragebogen aus – das ist keine Kontrolle, sondern hilft dem Tierheim, dich und dein Umfeld besser zu verstehen. Fragen wie: Hast du eine Familie? Wie viel Zeit kannst du dem Tier widmen? Hast du einen Garten?'; ?></p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">4</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-4-titel"><?php echo isset($content['timeline-4-titel']) ? esc_html(strip_tags($content['timeline-4-titel'])) : 'Vorkontrolle'; ?></h3>
                    <p class="editable" data-key="timeline-4-text"><?php echo isset($content['timeline-4-text']) ? wp_kses_post($content['timeline-4-text']) : 'Manchmal besucht ein Mitarbeiter dein Zuhause – um sicherzugehen, dass das Tier artgerecht leben kann. Das ist kein Misstrauen, sondern ein Schutz für das Tier.'; ?></p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">5</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-5-titel"><?php echo isset($content['timeline-5-titel']) ? esc_html(strip_tags($content['timeline-5-titel'])) : 'Schutzgebühr & Vertrag'; ?></h3>
                    <p class="editable" data-key="timeline-5-text"><?php echo isset($content['timeline-5-text']) ? wp_kses_post($content['timeline-5-text']) : 'Du zahlst eine Schutzgebühr – sie dient dazu, die Arbeit des Tierheims zu unterstützen und Tiere vor unüberlegten Käufen zu schützen. Du unterschreibst einen Adoptionsvertrag – oft mit einer Klausel, dass das Tier bei Problemen zurückgegeben werden kann.'; ?></p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">6</div>
                <div class="timeline-content">
                    <h3 class="editable" data-key="timeline-6-titel"><?php echo isset($content['timeline-6-titel']) ? esc_html(strip_tags($content['timeline-6-titel'])) : 'Eingewöhnung & Nachbetreuung'; ?></h3>
                    <p class="editable" data-key="timeline-6-text"><?php echo isset($content['timeline-6-text']) ? wp_kses_post($content['timeline-6-text']) : 'Du nimmst das Tier mit nach Hause – und es beginnt die Eingewöhnung. Viele Tierheime bieten Nachbetreuung an, falls Fragen oder Probleme auftauchen.'; ?></p>
                </div>
            </div>
        </div>

        <div class="info-box" style="margin-top: 50px; background: var(--pastel-lavender);">
            <h3 class="editable" data-key="prozess-box-titel" style="margin-bottom: 15px;"><?php echo isset($content['prozess-box-titel']) ? wp_kses_post($content['prozess-box-titel']) : '💜 Warum die Schritte kein Misstrauen sind – sondern Fürsorge'; ?></h3>
            <p class="editable" data-key="prozess-box-text"><?php echo isset($content['prozess-box-text']) ? wp_kses_post($content['prozess-box-text']) : 'Tierheime möchten sicherstellen, dass jedes Tier ein dauerhaft gutes Zuhause findet. Die Fragen, die Kontrollen und die Gespräche sind kein Schikane, sondern ein Schutz für:'; ?></p>
            <ul style="margin-top: 15px;" class="editable" data-key="prozess-box-liste">
                <li><strong>Das Tier:</strong> Damit es nicht erneut abgegeben wird oder in falsche Hände gerät.</li>
                <li><strong>Dich:</strong> Damit du sicher sein kannst, dass du die richtige Entscheidung triffst.</li>
            </ul>
            <p class="editable" data-key="prozess-box-quote" style="margin-top: 20px; font-size: 1.1rem;"><?php echo isset($content['prozess-box-quote']) ? wp_kses_post($content['prozess-box-quote']) : '<em>"Wer ein Tier wirklich liebt, hat kein Problem mit einer ehrlichen Beratung."</em>'; ?></p>
        </div>
    </div>
</section>

<!-- Zucht-Wirtschaftlichkeit -->
<section class="section">
    <div class="container">
        <h2 class="section-title editable" data-key="wirtschaft-titel" style="text-align: center; margin-bottom: 30px;"><?php echo isset($content['wirtschaft-titel']) ? wp_kses_post($content['wirtschaft-titel']) : '💰 Wirtschaftlichkeit der Zucht – ein ehrlicher Blick'; ?></h2>
        <p class="editable" data-key="wirtschaft-intro" style="text-align: center; max-width: 900px; margin: 0 auto 50px; font-size: 1.15rem; color: var(--text-medium); line-height: 1.7;">
            <?php echo isset($content['wirtschaft-intro']) ? wp_kses_post($content['wirtschaft-intro']) : 'Zucht ist nicht automatisch verantwortungsvoll. Und ein vermeintlich hoher Preis nicht gleichbedeutend mit guter Herkunft. Ich zeige dir, was seriöse Zucht wirklich bedeutet – und warum sie sich selten lohnt.'; ?>
        </p>

        <div class="accordion">
            <div class="accordion-item">
                <button class="accordion-header">
                    <span class="editable" data-key="accordion-1-header"><?php echo isset($content['accordion-1-header']) ? esc_html(strip_tags($content['accordion-1-header'])) : '📊 Kostenaufschlüsselung pro Wurf'; ?></span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <h4 class="editable" data-key="accordion-1-subtitle-1"><?php echo isset($content['accordion-1-subtitle-1']) ? esc_html(strip_tags($content['accordion-1-subtitle-1'])) : 'Anschaffungskosten (BEVOR der erste Wurf kommt):'; ?></h4>
                    <ul class="editable" data-key="accordion-1-liste-1">
                        <li>Seriöse, getestete Elterntiere: <strong>1.000–2.500 € pro Tier</strong></li>
                        <li>Ausstattung (Wurfkiste, Wärmelampe, etc.): <strong>300–1.000 €</strong></li>
                        <li>Transportboxen, Erste-Hilfe-Material: <strong>100–300 €</strong></li>
                    </ul>

                    <h4 class="editable" data-key="accordion-1-subtitle-2" style="margin-top: 30px;"><?php echo isset($content['accordion-1-subtitle-2']) ? esc_html(strip_tags($content['accordion-1-subtitle-2'])) : 'Direkte Zuchtkosten (pro Wurf):'; ?></h4>
                    <ul class="editable" data-key="accordion-1-liste-2">
                        <li>Gesundheitschecks (HD/ED-Röntgen, Gentests): <strong>300–600 €</strong></li>
                        <li>Deckgebühr: <strong>400–800 €</strong></li>
                        <li>Trächtigkeitsbetreuung (Ultraschall, Tierarzt): <strong>200–400 €</strong></li>
                        <li>Spezialfutter vor & nach Geburt: <strong>150–300 €</strong></li>
                        <li>Geburt inkl. Notfall: <strong>bis zu 1.000 €</strong></li>
                        <li>Welpen (Impfen, Chippen, Papiere): <strong>100–200 € pro Welpe</strong></li>
                        <li>Zeitaufwand: <strong>mehrere Monate, fast unbezahlbar</strong></li>
                    </ul>

                    <div class="info-box" style="margin-top: 30px; background: var(--pastel-coral);">
                        <h4 class="editable" data-key="accordion-1-box-titel"><?php echo isset($content['accordion-1-box-titel']) ? esc_html(strip_tags($content['accordion-1-box-titel'])) : '📌 Fixkosten pro Wurf: ca. 2.500–4.500 €'; ?></h4>
                        <p class="editable" data-key="accordion-1-box-text"><?php echo isset($content['accordion-1-box-text']) ? wp_kses_post($content['accordion-1-box-text']) : '<strong>Ergebnis:</strong> Kaum Gewinn – es bleibt nur bei Liebhaberei'; ?></p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    <span class="editable" data-key="accordion-2-header"><?php echo isset($content['accordion-2-header']) ? esc_html(strip_tags($content['accordion-2-header'])) : '🧮 Rechenbeispiel: Lohnt sich Zucht?'; ?></span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <h4>Beispiel: 5 Welpen à 1.800 €</h4>
                    <div class="calculation-box">
                        <p><strong>Einnahmen:</strong> 5 × 1.800 € = <span style="color: var(--cute-coral); font-size: 1.3rem;">9.000 €</span></p>
                        <p><strong>Fixkosten (direkt):</strong> <span style="color: var(--text-dark);">2.500–4.500 €</span></p>
                        <p style="border-top: 2px solid var(--cute-coral); padding-top: 15px; margin-top: 15px;">
                            <strong>Scheinbarer Gewinn:</strong> <span style="font-size: 1.3rem;">4.500–6.500 €</span>
                        </p>
                    </div>

                    <div class="info-box" style="margin-top: 30px; background: var(--pastel-peach);">
                        <h4>⚠️ Aber das ist nur die halbe Wahrheit!</h4>
                        <ul class="editable" data-key="accordion-2-liste">
                            <li>Elterntiere Anschaffung + Haltung: <strong>2.000–5.000 €</strong></li>
                            <li>Ausstattung: <strong>500–1.000 €</strong></li>
                            <li>Laufende Kosten (Futter, Impfungen, Verein): <strong>über 1.000 € jährlich</strong></li>
                            <li>Arbeitszeit: <strong>mehrere Monate, täglich viele Stunden</strong></li>
                            <li>Verantwortung: <strong>bei Rückgabe, Krankheit, Problemen</strong></li>
                        </ul>
                        <p style="margin-top: 20px; font-size: 1.2rem;"><strong>Wer ehrlich züchtet, macht also selten Gewinn.</strong></p>
                    </div>

                    <h4 style="margin-top: 40px;">💡 Was müsste ein Welpe kosten, damit sich Zucht rechnet?</h4>
                    <p>Wenn man alle Kosten, Zeit und ein faires Einkommen berücksichtigt: <strong>mindestens 2.500–3.500 €</strong></p>
                    <p><strong>Problem:</strong> Diese Preise zahlt kaum jemand. Viele Menschen halten bereits Preise zwischen 800 und 1.200 € für hoch.</p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    <span class="editable" data-key="accordion-3-header"><?php echo isset($content['accordion-3-header']) ? esc_html(strip_tags($content['accordion-3-header'])) : '❌ Wo Züchter sparen (um Gewinn zu machen)'; ?></span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <ul class="warning-list editable" data-key="accordion-3-liste">
                        <li>Elterntiere ohne Tests oder mit vererbbaren Defekten <span style="color: var(--cute-coral);">(Ersparnis: bis zu 1.000 €)</span></li>
                        <li>"Hobbyzucht" ohne Dokumentation, aber mit vollmundiger Werbung</li>
                        <li>Welpen zu früh abgegeben <span style="color: var(--cute-coral);">(Ersparnis: 2–4 Wochen Futter + Aufwand)</span></li>
                        <li>Keine Impfungen, keine Sozialisierung, keine Gesundheitsvorsorge</li>
                        <li>Folge: Krankheiten, Verhaltensstörungen, Inzuchtprobleme</li>
                    </ul>

                    <div class="info-box" style="margin-top: 30px; background: var(--cute-coral); color: white;">
                        <h4 class="editable" data-key="accordion-3-box-titel" style="color: white;"><?php echo isset($content['accordion-3-box-titel']) ? esc_html(strip_tags($content['accordion-3-box-titel'])) : '💔 Fazit'; ?></h4>
                        <p class="editable" data-key="accordion-3-box-text1" style="font-size: 1.2rem; line-height: 1.6;">
                            <?php echo isset($content['accordion-3-box-text1']) ? wp_kses_post($content['accordion-3-box-text1']) : '<strong>Zucht, die gut für Tiere ist, lohnt sich kaum.<br>Zucht, die sich lohnt, ist selten gut für Tiere.</strong>'; ?>
                        </p>
                        <p class="editable" data-key="accordion-3-box-text2" style="margin-top: 20px;"><?php echo isset($content['accordion-3-box-text2']) ? wp_kses_post($content['accordion-3-box-text2']) : 'Solange Tierheime voll sind, ist jede Zucht ein ethisches Problem.'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Abgabealter -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <h2 class="section-title editable" data-key="abgabe-titel" style="text-align: center; margin-bottom: 30px;"><?php echo isset($content['abgabe-titel']) ? wp_kses_post($content['abgabe-titel']) : '⏰ Zu früh getrennt – zu spät verstanden'; ?></h2>
        <p class="editable" data-key="abgabe-intro" style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.15rem; color: var(--text-medium);">
            <?php echo isset($content['abgabe-intro']) ? wp_kses_post($content['abgabe-intro']) : 'Nur weil man Tiere rechtlich ab der 8. oder 12. Woche abgeben darf, heißt das nicht, dass man es sollte.'; ?>
        </p>

        <div class="info-grid">
            <div class="info-card">
                <h3>🐶 Hunde</h3>
                <p><strong>Rechtlich erlaubt:</strong> ab 8 Wochen</p>
                <p><strong>Artgerecht:</strong> ab 10–12 Wochen</p>
                <div class="info-why">
                    <h4>Warum?</h4>
                    <ul class="editable" data-key="abgabe-hunde-liste">
                        <li>Mutter erzieht noch: Grenzen, Ruhe, Stabilität</li>
                        <li>Geschwister lehren Beißhemmung, Kommunikation, Frustrationstoleranz</li>
                        <li>Zu frühe Trennung = höheres Risiko für Angst, Stress, Verhaltensprobleme</li>
                    </ul>
                </div>
            </div>

            <div class="info-card">
                <h3>🐱 Katzen</h3>
                <p><strong>Rechtlich erlaubt:</strong> ab 8 Wochen</p>
                <p><strong>Artgerecht:</strong> ab 12 Wochen (oder später)</p>
                <div class="info-why">
                    <h4>Warum?</h4>
                    <ul class="editable" data-key="abgabe-katzen-liste">
                        <li>Katzen reifen emotional langsamer als Hunde</li>
                        <li>Mutter spielt aktive Rolle bis zur 14. Woche</li>
                        <li>Lernen Krallenhemmung, Revierverhalten, Lautsprache</li>
                        <li>Folgen bei Frühabgabe: Unsauberkeit, Ängstlichkeit, Aggression</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-box" style="margin-top: 50px; background: var(--pastel-mint);">
            <h3 class="editable" data-key="abgabe-box-titel"><?php echo isset($content['abgabe-box-titel']) ? wp_kses_post($content['abgabe-box-titel']) : '🤔 Stell dir vor...'; ?></h3>
            <ul style="margin-top: 15px; font-size: 1.1rem;" class="editable" data-key="abgabe-box-liste">
                <li>Würdest du dein Baby mit 6 Monaten weggeben, nur weil es nicht mehr gestillt wird?</li>
                <li>Nur weil ein Kind trocken ist, kann es nicht allein leben.</li>
                <li>Stell dir vor, du bist 5 Jahre alt, wirst von deiner Familie getrennt und in eine fremde Welt gegeben, deren Sprache du nicht verstehst.</li>
            </ul>
            <p class="editable" data-key="abgabe-box-quote" style="margin-top: 25px; font-size: 1.2rem;"><?php echo isset($content['abgabe-box-quote']) ? wp_kses_post($content['abgabe-box-quote']) : '<strong>Genau das fühlt ein Welpe oder Kätzchen, wenn es zu früh allein in eine neue Welt muss.</strong>'; ?></p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section">
    <div class="container" style="text-align: center;">
        <h2 class="editable" data-key="cta-titel" style="font-size: 2.5rem; margin-bottom: 25px;"><?php echo isset($content['cta-titel']) ? wp_kses_post($content['cta-titel']) : '💚 Du liebst Tiere und willst wirklich helfen?'; ?></h2>
        <p class="editable" data-key="cta-subtitle" style="font-size: 1.3rem; margin-bottom: 40px; color: var(--text-medium);"><?php echo isset($content['cta-subtitle']) ? wp_kses_post($content['cta-subtitle']) : 'Dann adoptiere anstatt zu kaufen.'; ?></p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo home_url('/tierliebe-test'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 18px 45px;">
                <span class="editable" data-key="cta-button-1"><?php echo isset($content['cta-button-1']) ? esc_html(strip_tags($content['cta-button-1'])) : 'Bin ich bereit? → Zum Test'; ?></span>
            </a>
            <a href="https://www.tierheimhelden.de" target="_blank" class="btn btn-secondary" style="font-size: 1.2rem; padding: 18px 45px;">
                <span class="editable" data-key="cta-button-2"><?php echo isset($content['cta-button-2']) ? esc_html(strip_tags($content['cta-button-2'])) : '🔍 Tierheime finden'; ?></span>
            </a>
        </div>
    </div>
</section>

<?php
if (current_user_can('edit_posts')) {
    echo '<input type="hidden" id="tierliebe-page-slug" value="adoption">';
}

get_template_part('tierliebe-parts/footer');
?>
