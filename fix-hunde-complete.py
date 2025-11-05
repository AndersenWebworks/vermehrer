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

print("=== Completing hunde page ===\n")

# Get current JSON
r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
          params={'slug': 'tierliebe-hunde', 'context': 'edit'})
page = r.json()[0]
data = json.loads(html.unescape(page['content']['raw']))

print(f"Current keys: {len(data)}")

# Add missing list content from MD
data['hunde-liste-1'] = """<li>Stress, Angst, Einsamkeit</li>
<li>Trennungsangst entwickelt sich schleichend</li>
<li>Viele Hunde resignieren – sie wirken "brav", leiden aber still</li>"""

data['hunde-liste-2'] = """<li>Die Hunde sind sozial, gut verträglich und wirklich miteinander verbunden</li>
<li>Beide sind schrittweise ans Alleinsein gewöhnt worden</li>
<li>Der Garten ist sicher, groß, bietet Schatten, Wasser und Rückzugsorte</li>
<li>Vor und nach dem Alleinsein gibt es ausgedehnte Spaziergänge, Spiel und Aufmerksamkeit vom Menschen</li>"""

data['hunde-liste-3'] = """<li>Viele "Hofhunde" sind isoliert, haben keinen echten Kontakt zu Menschen</li>
<li>Sie werden nicht erzogen, nicht gepflegt, nicht beachtet</li>
<li>Oft sind sie angekettet oder in Zwingern – "frei" ist das Gegenteil</li>"""

data['hunde-liste-4'] = """<li>Hunde sind Rudeltiere mit komplexem Sozialverhalten. Tägliche Interaktion, Training und geistige Auslastung sind Pflicht.</li>
<li>Hunde können nicht gut allein sein. 4 Stunden sind schon viel, 8 Stunden täglich ist Tierquälerei.</li>"""

# hunde-liste-5 seems unused in template or is in a different section
data['hunde-liste-5'] = ""

print(f"\nAdded 5 list keys")
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

    print("\n=== hunde page completed! ===")
else:
    print(f"✗ Failed: {r2.status_code}")
    print(r2.text)
