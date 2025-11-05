#!/usr/bin/env python3
# -*- coding: utf-8 -*-
import json, sys, requests

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

# Read markdown
with open('texte/page-tierliebe-hunde.md', 'r', encoding='utf-8') as f:
    md = f.read()

# Build JSON structure matching the template structure
data = {
    "header-titel": "🐶 Hunde!",
    "header-untertitel": "Mythen vs. Fakten",
    
    "mythos1-header": "🐕 Mythos 1: \\\"Hunde können 8 Stunden allein sein – Hauptsache, sie haben genug Auslauf\\\"",
    "mythos1-wahrheit-titel": "Die Wahrheit:",
    "mythos1-text1": "Hunde sind <strong>Rudeltiere</strong> mit komplexem Sozialverhalten. Sie brauchen täglich Interaktion, Training und geistige Auslastung – nicht nur körperliche Bewegung.",
    "mythos1-text2": "<strong>Fakt:</strong> Hunde können nicht gut allein sein. 4 Stunden sind schon viel. 8 Stunden täglich ist Tierquälerei.",
    "mythos1-box-titel": "Was passiert?",
    "mythos1-liste": "<li>Stress, Angst, Einsamkeit</li>\n<li>Trennungsangst entwickelt sich schleichend</li>\n<li>Viele Hunde resignieren – sie wirken \\\"brav\\\", leiden aber still</li>",
    
    "mythos2-header": "🏡 Mythos 2: \\\"Ein Hund im Garten mit einem Hundekumpel ist doch glücklich – auch wenn ich arbeiten bin\\\"",
    "mythos2-wahrheit-titel": "Die Wahrheit:",
    "mythos2-text1": "<strong>Ja, das ist besser als ein Hund allein in der Wohnung</strong> – aber es bleibt ein Kompromiss, keine Empfehlung.",
    "mythos2-box-titel": "Voraussetzungen, damit es überhaupt funktioniert:",
    "mythos2-liste": "<li>Die Hunde sind sozial, gut verträglich und wirklich miteinander verbunden</li>\n<li>Beide sind schrittweise ans Alleinsein gewöhnt worden</li>\n<li>Der Garten ist sicher, groß, bietet Schatten, Wasser und Rückzugsorte</li>\n<li>Vor und nach dem Alleinsein gibt es ausgedehnte Spaziergänge, Spiel und Aufmerksamkeit vom Menschen</li>",
    "mythos2-text2": "<strong>Aber:</strong> Auch mehrere Hunde können ihre Bezugsperson vermissen. Der Garten ersetzt keinen Spaziergang und keine echte Beziehung.",
    
    "mythos3-header": "🌾 Mythos 3: \\\"Hunde auf einem Bauernhof oder mit viel Freigang leben natürlicher und glücklicher\\\"",
    "mythos3-wahrheit-titel": "Die Wahrheit:",
    "mythos3-text1": "Das stimmt teilweise – <strong>aber nur, wenn der Mensch trotzdem präsent ist.</strong>",
    "mythos3-box-titel": "Problem:",
    "mythos3-liste": "<li>Viele \\\"Hofhunde\\\" sind isoliert, haben keinen echten Kontakt zu Menschen</li>\n<li>Sie werden nicht erzogen, nicht gepflegt, nicht beachtet</li>\n<li>Oft sind sie angekettet oder in Zwingern – \\\"frei\\\" ist das Gegenteil</li>",
    "mythos3-text2": "<strong>Faustregel:</strong> Raum allein macht keinen Hund glücklich. Bindung tut es.",
    
    "fakten-titel": "Die Fakten",
    "fakten-liste": "<li>Hunde sind Rudeltiere mit komplexem Sozialverhalten. Tägliche Interaktion, Training und geistige Auslastung sind Pflicht.</li>\n<li>Hunde können nicht gut allein sein. 4 Stunden sind schon viel, 8 Stunden täglich ist Tierquälerei.</li>"
}

print(f"Created JSON with {len(data)} keys")

# Upload to page
s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages', params={'slug': 'tierliebe-hunde'})
page_id = r.json()[0]['id']

r2 = s.post(
    f'https://vm.andersen-webworks.de/wp-json/wp/v2/pages/{page_id}',
    json={'content': json.dumps(data, ensure_ascii=False)}
)

if r2.status_code == 200:
    print(f"[OK] Updated page {page_id}")
    # Clear cache
    s.get('https://vm.andersen-webworks.de/wp-admin/?tierliebe_clear_cache=1')
    print("[OK] Cache cleared")
    print("\n=== hunde page migration complete! ===")
else:
    print(f"[ERROR] Failed: {r2.status_code}")
