#!/usr/bin/env python3
# -*- coding: utf-8 -*-
import requests
import json
import html
import sys

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

print("=== Completing hunde page - extra sections ===\n")

# Get current JSON
r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
          params={'slug': 'tierliebe-hunde', 'context': 'edit'})
page = r.json()[0]
data = json.loads(html.unescape(page['content']['raw']))

# Add content for the 3 extra info-box sections

# Section 1: Frage (Question Box)
data['frage-titel'] = 'Kann ein Hund zu zweit allein bleiben?'
data['frage-text1'] = 'Ja, das ist <strong>besser</strong> als ein Hund allein – aber auch zwei Hunde können ihre Bezugsperson vermissen.'
data['hunde-liste-5'] = """<li>Beide Hunde müssen gut sozialisiert und aneinander gewöhnt sein</li>
<li>Sie brauchen trotzdem täglich Spaziergänge, Spiel und Training</li>
<li>Ein zweiter Hund ist eine Bereicherung – aber kein Ersatz für menschliche Bindung</li>"""
data['frage-highlight'] = '<strong>Wichtig:</strong> Ein zweiter Hund entlastet – aber macht 8 Stunden Alleinsein nicht akzeptabel.'
data['frage-faustregel'] = '<strong>Faustregel:</strong> Auch zwei Hunde brauchen dich. Maximal 4–5 Stunden allein, nicht täglich 8.'

# Section 2: Warnung (Warning Box)
data['warnung-titel'] = '⚠️ Wichtige Warnung'
data['warnung-text1'] = '<strong>Wenn du 8+ Stunden täglich arbeitest und niemand zu Hause ist, ist ein Hund nicht das richtige Tier für dich.</strong>'
data['warnung-text2'] = 'Das ist keine Moralkeule – es ist Realität. Hunde brauchen Gesellschaft, Beschäftigung und Routine. Lange Abwesenheit führt zu Verhaltensproblemen, Stress und stillem Leiden.'

# Section 3: Wahrheit (Truth/Love Box)
data['wahrheit-titel'] = '🐾 Die Wahrheit'
data['wahrheit-text1'] = '<strong>Hunde sind Familienmitglieder – keine Dekoration fürs Wochenende.</strong>'
data['wahrheit-text2'] = 'Wenn du einen Hund liebst, dann gib ihm, was er braucht: Zeit, Bindung und Präsenz. Nicht nur Futter und Auslauf.'

print(f"Added 10 missing keys")
print(f"Total keys now: {len(data)}")

# Update page
r2 = s.post(
    f'https://vm.andersen-webworks.de/wp-json/wp/v2/pages/{page["id"]}',
    json={'content': json.dumps(data, ensure_ascii=False)}
)

if r2.status_code == 200:
    print("✓ Page updated")

    # Clear cache
    s.get('https://vm.andersen-webworks.de/wp-admin/?tierliebe_clear_cache=1')
    print("✓ Cache cleared")

    print("\n=== hunde page fully completed! ===")
else:
    print(f"✗ Failed: {r2.status_code}")
    print(r2.text)
