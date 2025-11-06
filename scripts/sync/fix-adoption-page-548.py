# -*- coding: utf-8 -*-
"""Update PAGE 548 (nicht CPT 617!) mit vollständigem Adoption-Content"""
import json
import requests
from requests.auth import HTTPBasicAuth

# WICHTIG: Page 548, NICHT Post 617!
PAGE_ID = 548

# Komplett korrekter Content (alle Felder aus page-tierliebe-adoption.md)
content = {
    "hero-titel": "❤️ Adoption rettet Leben",
    "hero-subtitle": "Warum Adoption der einzige ethische Weg ist – und wie er funktioniert",
    "zoofach-titel": "🛒 Tierkauf im Zoofachhandel?",
    "zoofach-intro": "Viele Menschen kaufen Tiere im Zoofachhandel – weil es einfach ist, weil sie nicht wissen, woher die Tiere wirklich kommen. Doch hinter der sauberen Glasscheibe verbirgt sich oft eine dunkle Wahrheit.",
    "zoofach-box-titel": "⚠️ Wichtig zu wissen:",
    "zoofach-box-liste": "<li>Viele Tiere in Zoohandlungen stammen aus Massenzuchten, bei denen auf Tierwohl kaum geachtet wird.</li><li>Es gibt keine seriöse Beratung, oft wird völlig falsches Zubehör mitverkauft (Minikäfige, falsches Futter, falsche Haltungsempfehlungen).</li><li>Kranke, trächtige oder viel zu junge Tiere werden (sowohl bewusst als auch unbewusst) verkauft, Hauptsache Umsatz.</li>",
    "zoofach-alternative-titel": "✅ Besser stattdessen:",
    "zoofach-alternative-liste": "<li>Kontakt zu erfahrenen Haltern, Tierschutzvereinen, Pflegestellen oder kleinen privaten Vermittlungen.</li><li>Tierarzt oder Tierheim nach passenden Tieren fragen.</li><li>Aufklären statt kaufen – und mit Herz statt aus Impuls.</li>",
    "zoofach-system-titel": "💔 Das System dahinter",
    "zoofach-system-text1": "Zoofachhandel ist ein <strong>Geschäft</strong>. Tiere sind <strong>Ware</strong>. Jeder Verkauf bedeutet: Die Kette läuft weiter.<br>Züchter produzieren nach, Großhändler liefern nach, Läden verkaufen weiter.",
    "zoofach-system-text2": "<strong>Warnung:</strong> Wer im Laden ein Tier kauft, zahlt mit Geld. Wer nicht aufklärt, zahlt mit Tierleben.",
    "vergleich-titel": "Zucht, Kauf oder Adoption?",
    "vergleich-subtitle": "Warum die Herkunft über das ganze Leben eines Tieres entscheidet.",
    "vergleich-frage": '<strong>Frage:</strong> "Hauptsache, das Tier hat\'s gut bei mir."',
    "vergleich-antwort": "<strong>Antwort:</strong> Aber das allein reicht nicht. Denn jedes Tier, das geboren wird, nimmt einem anderen den Platz weg. Und jedes gekaufte Tier sorgt dafür, dass noch mehr Tiere gezüchtet werden – legal oder illegal.",
    "panel-zucht-titel": "Zucht",
    "panel-zucht-liste": "<li>Auch ‚seriöse' Zucht hat ein Problem: Sie produziert auf Bestellung – obwohl die Tierheime voll sind.</li><li>Viele Zuchten arbeiten wirtschaftlich an der Grenze: Zu frühe Abgaben, zu wenig Sozialisierung, problematische Auswahl.</li><li>‚Reinrassig' bedeutet oft: krank gezüchtet. (Atemnot, Gelenkprobleme, Epilepsie ...)</li><li>Auch Hobbyzüchter tragen dazu bei, dass Tiere wie Ware behandelt werden – meist ohne jede Kontrolle.</li>",
    "panel-kauf-titel": "Kauf",
    "panel-kauf-liste": "<li>Tiere werden eBay, Märkten oder sogar aus dem Kofferraum verkauft.</li><li>Viele sind krank, traumatisiert, zu jung oder ohne Impfschutz.</li><li>Der Kauf ‚aus Mitleid' hilft nur dem Verkäufer – und sorgt dafür, dass das Geschäft weiterläuft.</li>",
    "panel-adoption-titel": "Adoption",
    "panel-adoption-liste": "<li>Wer adoptiert, rettet ein Leben – und verhindert neues Tierleid.</li><li>Tierschutztiere sind keine ‚Problemfälle'. Viele sind jung, sozialisiert und bereit für ein echtes Zuhause.</li><li>Jede Adoption entlastet das Tierheim – und sendet ein klares Zeichen: Kein Tier ist zweite Wahl.</li>",
    "panel-adoption-quote": '<strong>"Du kannst das Leben eines Tieres nicht veraendern, weil du es gekauft hast. Aber du kannst es veraendern, wenn du es adoptierst."</strong>',
    "prozess-titel": "Der Weg zum neuen Familienmitglied – Wie Tierheime arbeiten",
    "prozess-intro": "Ein Tier aus dem Tierheim zu adoptieren ist keine Hürde – es ist ein Schutz für dich und das Tier. Hier erfährst du, wie der Weg zu deinem neuen Familienmitglied abläuft.",
    "timeline-1-titel": "Schritt 1: Kontaktaufnahme",
    "timeline-1-text": "Du interessierst dich für ein Tier und nimmst Kontakt zum Tierheim auf.<br>Oft erfolgt ein erstes Beratungsgespräch – telefonisch, per Mail oder vor Ort.",
    "timeline-2-titel": "Schritt 2: Kennenlernen",
    "timeline-2-text": "Du lernst das Tier kennen – oft mehrmals.<br>Tierheime möchten sicherstellen, dass Mensch und Tier zusammenpassen.<br>Bei Hunden: Gassigehen, Spielen im Auslauf, Zeit verbringen.",
    "timeline-3-titel": "Schritt 3: Fragebogen & Beratung",
    "timeline-3-text": "Du füllst einen Fragebogen aus – das ist keine Kontrolle, sondern hilft dem Tierheim, dich und dein Umfeld besser zu verstehen.<br>Fragen wie: ‚Hast du genug Zeit?' – ‚Sind alle im Haushalt einverstanden?' – ‚Ist dein Zuhause geeignet?'",
    "timeline-4-titel": "Schritt 4: Vorkontrolle (je nach Tier und Tierheim)",
    "timeline-4-text": "Manchmal besucht ein Mitarbeiter dein Zuhause – um sicherzugehen, dass das Tier artgerecht leben kann.<br>Das ist kein Misstrauen, sondern ein Schutz für das Tier.",
    "timeline-5-titel": "Schritt 5: Schutzgebühr & Vertrag",
    "timeline-5-text": "Du zahlst eine Schutzgebühr – sie dient dazu, die Arbeit des Tierheims zu unterstützen und Tiere vor unüberlegten Käufen zu schützen.<br>Du unterschreibst einen Adoptionsvertrag – oft mit einer Klausel, dass das Tier bei Problemen zurückgegeben werden kann.",
    "timeline-6-titel": "Schritt 6: Eingewöhnung & Nachbetreuung",
    "timeline-6-text": "Du nimmst das Tier mit nach Hause – und es beginnt die Eingewöhnung.<br>Viele Tierheime bieten Nachbetreuung an, falls Fragen oder Probleme auftauchen.",
    "prozess-box-titel": "💜 Warum die Schritte kein Misstrauen sind – sondern Fürsorge",
    "prozess-box-text": "Tierheime möchten sicherstellen, dass jedes Tier ein dauerhaft gutes Zuhause findet. Deshalb sind die Fragen, die Kontrollen und die Gespräche keine Schikane, sondern ein Schutz für:",
    "prozess-box-liste": "<li><strong>Das Tier:</strong> Damit es nicht erneut abgegeben wird oder in falsche Hände gerät.</li><li><strong>Dich:</strong> Damit du sicher sein kannst, dass du die richtige Entscheidung triffst.</li>",
    "prozess-box-quote": '<em>"Wer ein Tier wirklich liebt, hat kein Problem mit einer ehrlichen Beratung."</em>',
    "wirtschaft-titel": "💰 Wirtschaftlichkeit der Zucht – ein ehrlicher Blick",
    "wirtschaft-intro": "Zucht ist nicht automatisch verantwortungsvoll. Und ein vermeintlich hoher Preis nicht gleichbedeutend mit guter Herkunft. Ich zeige dir, was seriöse Zucht wirklich bedeutet – und warum sie sich selten lohnt.",
    "accordion-1-header": "📊 Kostenaufschlüsselung pro Wurf",
    "accordion-1-subtitle-1": "Nebenkosten (oft bereits lange vor dem ersten Wurf):",
    "accordion-1-liste-1": "<li>Anschaffungskosten für seriöse, getestete Elterntiere: ca. 1.000–2.500 € pro Tier</li><li>Ausstattung: Wurfkiste, Wärmelampe, Auslaufgehege, Desinfektionsmittel, Waage, Kameraüberwachung: ca. 300–1.000 €</li><li>Transportboxen, Tierarztfahrten, Erste-Hilfe-Material: ca. 100–300 €</li><li>Zeit für Fortbildungen, Vereinsbeiträge, Zuchtbücher, Online-Präsenz: laufend</li>",
    "accordion-1-subtitle-2": "Direkte Zuchtkosten (pro Wurf):",
    "accordion-1-liste-2": "<li>Gesundheitschecks für Elterntiere (z. B. HD- / ED-Röntgen, Gentests): ca. 300–600 €</li><li>Deckgebühr für Fremdrüden oder Kater: ca. 400–800 €</li><li>Trächtigkeitsbetreuung durch Tierärzte (inkl. Ultraschall): ca. 200–400 €</li><li>Spezialfutter und Pflege vor & nach der Geburt: ca. 150–300 €</li><li>Geburt (inkl. Notfallversorgung / Klinik): bis zu 1.000 €</li><li>Welpen: Impfen, Chippen, Wurmkuren, EU-Pässe, Papiere: ca. 100–200 € pro Welpe</li><li>Zeitaufwand für Pflege, Sozialisierung, Erreichbarkeit: monatelang, kaum bezahlbar in Geld</li>",
    "accordion-1-box-titel": "📌 Fixkosten pro Wurf: ca. 2.500–4.500 €",
    "accordion-1-box-text": "<strong>Ergebnis:</strong> Kaum Gewinn – es bleibt nur bei Liebhaberei",
    "accordion-2-header": "🧮 Rechenbeispiel: Lohnt sich Zucht?",
    "accordion-2-liste": "<li>Elterntiere Anschaffung + Haltung: <strong>2.000–5.000 €</strong></li><li>Ausstattung: <strong>500–1.000 €</strong></li><li>Laufende Kosten (Futter, Impfungen, Verein): <strong>über 1.000 € jährlich</strong></li><li>Arbeitszeit: <strong>mehrere Monate, täglich viele Stunden</strong></li><li>Verantwortung: <strong>bei Rückgabe, Krankheit, Problemen</strong></li>",
    "accordion-3-header": "❌ Wo Züchter sparen (um Gewinn zu machen)",
    "accordion-3-liste": "<li>Elterntiere ohne Tests oder mit vererbbaren Defekten <span style=\"color: var(--cute-coral);\">(Ersparnis: bis zu 1.000 €)</span></li><li>‚Hobbyzucht' ohne Dokumentation, aber mit vollmundiger Werbung</li><li>Welpen zu früh abgegeben <span style=\"color: var(--cute-coral);\">(Ersparnis: 2–4 Wochen Futter + Aufwand)</span></li><li>Keine Impfungen, keine Sozialisierung, keine Gesundheitsvorsorge</li><li>Folge: Krankheiten, Verhaltensstörungen, Inzuchtprobleme</li>",
    "accordion-3-box-titel": "💔 Fazit",
    "accordion-3-box-text1": "<strong>Zucht, die gut für Tiere ist, lohnt sich kaum.<br>Zucht, die sich lohnt, ist selten gut für Tiere.</strong>",
    "accordion-3-box-text2": "Solange Tierheime voll sind, ist jede Zucht ein ethisches Problem.",
    "abgabe-titel": "⏰ Zu früh getrennt – zu spät verstanden",
    "abgabe-intro": "Nur weil man Tiere rechtlich ab der 8. oder 12. Woche abgeben darf, heißt das nicht, dass man es sollte.",
    "abgabe-hunde-liste": "<li>Mutter erzieht noch: Grenzen, Ruhe, Stabilität</li><li>Geschwister lehren Beißhemmung, Kommunikation, Frustrationstoleranz</li><li>Zu frühe Trennung = höheres Risiko für Angst, Stress, Verhaltensprobleme</li>",
    "abgabe-katzen-liste": "<li>Katzen reifen emotional langsamer als Hunde</li><li>Mutter spielt aktive Rolle bis zur 14. Woche</li><li>Lernen Krallenhemmung, Revierverhalten, Lautsprache</li><li>Folgen bei Frühabgabe: Unsauberkeit, Ängstlichkeit, Aggression</li>",
    "abgabe-box-titel": "🤔 Stell dir vor…",
    "abgabe-box-liste": "<li>Würdest du dein Baby mit 6 Monaten weggeben, nur weil es nicht mehr gestillt wird?</li><li>Nur weil ein Kind trocken ist, kann es nicht allein leben.</li><li>Stell dir vor, du bist 5 Jahre alt, wirst von deiner Familie getrennt und in eine fremde Welt gegeben, deren Sprache du nicht verstehst.</li>",
    "abgabe-box-quote": "<strong>Genau das fühlt ein Welpe oder Kätzchen, wenn es zu früh allein in eine neue Welt muss.</strong>",
    "cta-titel": "💚 Du liebst Tiere und willst wirklich helfen?",
    "cta-subtitle": "Dann adoptiere anstatt zu kaufen.",
    "cta-button-1": "Bin ich bereit? → Zum Test",
    "cta-button-2": "🔍 Tierheime finden"
}

print(f"[1/2] Update Page {PAGE_ID} mit {len(content)} Feldern...")
html = f"<p>{json.dumps(content, ensure_ascii=False)}</p>"

print("[2/2] Sende an WordPress...")
r = requests.post(
    f"https://vm.andersen-webworks.de/wp-json/wp/v2/pages/{PAGE_ID}",
    auth=HTTPBasicAuth("EAndersen", "m0jD Ot5r 4ISS byni rJvm dbZQ"),
    json={"content": html}
)

if r.status_code in [200, 201]:
    print("[OK] Page 548 aktualisiert!")
    print("     https://vm.andersen-webworks.de/tierliebe-adoption/")
    print("\n[INFO] Cache leeren:")
    print("     - Browser: Ctrl+F5")
    print("     - WordPress Transient wird automatisch geleert")
else:
    print(f"[!] Error {r.status_code}")
    with open("error-page-548.txt", "w", encoding="utf-8") as f:
        f.write(r.text)
    print("     Fehler in error-page-548.txt")
