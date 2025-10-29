<?php
/**
 * Template Name: Tierliebe - Adoption
 * Template Post Type: page
 * Description: Zucht vs. Kauf vs. Adoption, Adoptionsprozess, Wirtschaftlichkeit
 * Version: 1.0.0
 */

get_template_part('tierliebe-parts/header');
?>

<!-- Hero Section -->
<section class="primary-hero" style="min-height: 60vh;">
    <div class="hero-content">
        <h1 class="hero-title">❤️ Adoption rettet Leben</h1>
        <p class="hero-subtitle">Warum Adoption der einzige ethische Weg ist – und wie er funktioniert</p>
    </div>
</section>

<!-- Warum Adoption? 3-Panel-Vergleich -->
<section class="section">
    <div class="container">
        <h2 class="section-title" style="text-align: center; margin-bottom: 50px;">Zucht, Kauf oder Adoption?</h2>

        <div class="comparison-grid">
            <!-- ZUCHT -->
            <div class="comparison-panel panel-warning">
                <div class="panel-header">
                    <span class="panel-icon">⚠️</span>
                    <h3>Zucht-Problematik</h3>
                </div>
                <div class="panel-content">
                    <ul class="panel-list">
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
                    <h3>Kauf-Realität</h3>
                </div>
                <div class="panel-content">
                    <ul class="panel-list">
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
                    <h3>Adoption-Vorteile</h3>
                </div>
                <div class="panel-content">
                    <ul class="panel-list">
                        <li>Rettet ein Leben – verhindert neues Tierleid</li>
                        <li>Tierschutztiere sind keine "Problemfälle"</li>
                        <li>Viele sind jung, sozialisiert und bereit für ein echtes Zuhause</li>
                        <li>Entlastet Tierheime – sendet ein klares Zeichen</li>
                    </ul>
                    <div class="panel-quote">
                        <p><strong>"Du kannst das Leben eines Tieres nicht verändern, weil du es gekauft hast. Aber du kannst es verändern, wenn du es adoptierst."</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Adoptionsprozess Timeline -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <h2 class="section-title" style="text-align: center; margin-bottom: 30px;">Der Adoptionsprozess</h2>
        <p style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.1rem; color: var(--text-medium);">
            Ein Tier aus dem Tierheim zu adoptieren ist keine Hürde – es ist ein Schutz für dich und das Tier.
        </p>

        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-marker">1</div>
                <div class="timeline-content">
                    <h3>Kontaktaufnahme</h3>
                    <p>Du interessierst dich für ein Tier und nimmst Kontakt zum Tierheim auf. Oft erfolgt ein erstes Beratungsgespräch – telefonisch, per Mail oder vor Ort.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">2</div>
                <div class="timeline-content">
                    <h3>Kennenlernen</h3>
                    <p>Du lernst das Tier kennen – oft mehrmals. Tierheime möchten sicherstellen, dass Mensch und Tier zusammenpassen. Bei Hunden: Gassigehen, Spielen im Auslauf, Zeit verbringen.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">3</div>
                <div class="timeline-content">
                    <h3>Fragebogen & Beratung</h3>
                    <p>Du füllst einen Fragebogen aus – das ist keine Kontrolle, sondern hilft dem Tierheim, dich und dein Umfeld besser zu verstehen. Fragen wie: Hast du eine Familie? Wie viel Zeit kannst du dem Tier widmen? Hast du einen Garten?</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">4</div>
                <div class="timeline-content">
                    <h3>Vorkontrolle</h3>
                    <p>Manchmal besucht ein Mitarbeiter dein Zuhause – um sicherzugehen, dass das Tier artgerecht leben kann. Das ist kein Misstrauen, sondern ein Schutz für das Tier.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">5</div>
                <div class="timeline-content">
                    <h3>Schutzgebühr & Vertrag</h3>
                    <p>Du zahlst eine Schutzgebühr – sie dient dazu, die Arbeit des Tierheims zu unterstützen und Tiere vor unüberlegten Käufen zu schützen. Du unterschreibst einen Adoptionsvertrag – oft mit einer Klausel, dass das Tier bei Problemen zurückgegeben werden kann.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">6</div>
                <div class="timeline-content">
                    <h3>Eingewöhnung & Nachbetreuung</h3>
                    <p>Du nimmst das Tier mit nach Hause – und es beginnt die Eingewöhnung. Viele Tierheime bieten Nachbetreuung an, falls Fragen oder Probleme auftauchen.</p>
                </div>
            </div>
        </div>

        <div class="info-box" style="margin-top: 50px; background: var(--pastel-lavender);">
            <h3 style="margin-bottom: 15px;">💜 Warum die Schritte kein Misstrauen sind – sondern Fürsorge</h3>
            <p>Tierheime möchten sicherstellen, dass jedes Tier ein dauerhaft gutes Zuhause findet. Die Fragen, die Kontrollen und die Gespräche sind kein Schikane, sondern ein Schutz für:</p>
            <ul style="margin-top: 15px;">
                <li><strong>Das Tier:</strong> Damit es nicht erneut abgegeben wird oder in falsche Hände gerät.</li>
                <li><strong>Dich:</strong> Damit du sicher sein kannst, dass du die richtige Entscheidung triffst.</li>
            </ul>
            <p style="margin-top: 20px; font-size: 1.1rem;"><em>"Wer ein Tier wirklich liebt, hat kein Problem mit einer ehrlichen Beratung."</em></p>
        </div>
    </div>
</section>

<!-- Zucht-Wirtschaftlichkeit -->
<section class="section">
    <div class="container">
        <h2 class="section-title" style="text-align: center; margin-bottom: 30px;">💰 Die Wahrheit über Zucht</h2>
        <p style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.1rem; color: var(--text-medium);">
            Viele glauben, Zucht sei lukrativ. Die Realität sieht anders aus – wenn man es richtig macht.
        </p>

        <div class="accordion">
            <div class="accordion-item">
                <button class="accordion-header">
                    <span>📊 Kostenaufschlüsselung pro Wurf</span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <h4>Anschaffungskosten (BEVOR der erste Wurf kommt):</h4>
                    <ul>
                        <li>Seriöse, getestete Elterntiere: <strong>1.000–2.500 € pro Tier</strong></li>
                        <li>Ausstattung (Wurfkiste, Wärmelampe, etc.): <strong>300–1.000 €</strong></li>
                        <li>Transportboxen, Erste-Hilfe-Material: <strong>100–300 €</strong></li>
                    </ul>

                    <h4 style="margin-top: 30px;">Direkte Zuchtkosten (pro Wurf):</h4>
                    <ul>
                        <li>Gesundheitschecks (HD/ED-Röntgen, Gentests): <strong>300–600 €</strong></li>
                        <li>Deckgebühr: <strong>400–800 €</strong></li>
                        <li>Trächtigkeitsbetreuung (Ultraschall, Tierarzt): <strong>200–400 €</strong></li>
                        <li>Spezialfutter vor & nach Geburt: <strong>150–300 €</strong></li>
                        <li>Geburt inkl. Notfall: <strong>bis zu 1.000 €</strong></li>
                        <li>Welpen (Impfen, Chippen, Papiere): <strong>100–200 € pro Welpe</strong></li>
                        <li>Zeitaufwand: <strong>mehrere Monate, fast unbezahlbar</strong></li>
                    </ul>

                    <div class="info-box" style="margin-top: 30px; background: var(--pastel-coral);">
                        <h4>📌 Fixkosten pro Wurf: ca. 2.500–4.500 €</h4>
                        <p><strong>Ergebnis:</strong> Kaum Gewinn – es bleibt nur bei Liebhaberei</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    <span>🧮 Rechenbeispiel: Lohnt sich Zucht?</span>
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
                        <ul>
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
                    <span>❌ Wo Züchter sparen (um Gewinn zu machen)</span>
                    <span class="accordion-icon">+</span>
                </button>
                <div class="accordion-content">
                    <ul class="warning-list">
                        <li>Elterntiere ohne Tests oder mit vererbbaren Defekten <span style="color: var(--cute-coral);">(Ersparnis: bis zu 1.000 €)</span></li>
                        <li>"Hobbyzucht" ohne Dokumentation, aber mit vollmundiger Werbung</li>
                        <li>Welpen zu früh abgegeben <span style="color: var(--cute-coral);">(Ersparnis: 2–4 Wochen Futter + Aufwand)</span></li>
                        <li>Keine Impfungen, keine Sozialisierung, keine Gesundheitsvorsorge</li>
                        <li>Folge: Krankheiten, Verhaltensstörungen, Inzuchtprobleme</li>
                    </ul>

                    <div class="info-box" style="margin-top: 30px; background: var(--cute-coral); color: white;">
                        <h4 style="color: white;">💔 Fazit</h4>
                        <p style="font-size: 1.2rem; line-height: 1.6;">
                            <strong>Zucht, die gut für Tiere ist, lohnt sich kaum.<br>
                            Zucht, die sich lohnt, ist selten gut für Tiere.</strong>
                        </p>
                        <p style="margin-top: 20px;">Solange Tierheime voll sind, ist jede Zucht ein ethisches Problem.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Abgabealter -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <h2 class="section-title" style="text-align: center; margin-bottom: 30px;">⏰ Abgabealter: Die Wahrheit</h2>
        <p style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.1rem; color: var(--text-medium);">
            Nur weil man Tiere rechtlich früh abgeben darf, heißt das nicht, dass man es sollte.
        </p>

        <div class="info-grid">
            <div class="info-card">
                <h3>🐶 Hunde</h3>
                <p><strong>Rechtlich erlaubt:</strong> ab 8 Wochen</p>
                <p><strong>Artgerecht:</strong> ab 10–12 Wochen</p>
                <div class="info-why">
                    <h4>Warum?</h4>
                    <ul>
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
                    <ul>
                        <li>Katzen reifen emotional langsamer als Hunde</li>
                        <li>Mutter spielt aktive Rolle bis zur 14. Woche</li>
                        <li>Lernen Krallenhemmung, Revierverhalten, Lautsprache</li>
                        <li>Folgen bei Frühabgabe: Unsauberkeit, Ängstlichkeit, Aggression</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-box" style="margin-top: 50px; background: var(--pastel-mint);">
            <h3>🤔 Stell dir vor...</h3>
            <ul style="margin-top: 15px; font-size: 1.1rem;">
                <li>Würdest du dein Baby mit 6 Monaten weggeben, nur weil es nicht mehr gestillt wird?</li>
                <li>Nur weil ein Kind trocken ist, kann es nicht allein leben.</li>
                <li>Stell dir vor, du bist 5 Jahre alt, wirst von deiner Familie getrennt und in eine fremde Welt gegeben, deren Sprache du nicht verstehst.</li>
            </ul>
            <p style="margin-top: 25px; font-size: 1.2rem;"><strong>Genau das fühlt ein Welpe oder Kätzchen, wenn es zu früh allein in eine neue Welt muss.</strong></p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section">
    <div class="container" style="text-align: center;">
        <h2 style="font-size: 2.5rem; margin-bottom: 25px;">💚 Du liebst Tiere und willst wirklich helfen?</h2>
        <p style="font-size: 1.3rem; margin-bottom: 40px; color: var(--text-medium);">Dann adoptiere anstatt zu kaufen.</p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo home_url('/tierliebe-test'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 18px 45px;">
                Bin ich bereit? → Zum Test
            </a>
            <a href="https://www.tierheimhelden.de" target="_blank" class="btn btn-secondary" style="font-size: 1.2rem; padding: 18px 45px;">
                🔍 Tierheime finden
            </a>
        </div>
    </div>
</section>

<?php get_template_part('tierliebe-parts/footer'); ?>
