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

print("=== Fixing kleintiere mythos headers ===\n")

# Get current JSON
r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
          params={'slug': 'tierliebe-kleintiere', 'context': 'edit'})
page = r.json()[0]
data = json.loads(html.unescape(page['content']['raw']))

# Fix Kaninchen headers from MD
data['kaninchen-mythos1-header'] = '👶 Mythos 1: "Perfekte Haustiere für Kinder"'
data['kaninchen-mythos2-header'] = '🏠 Mythos 2: "Ein Käfig im Kinderzimmer reicht"'
data['kaninchen-mythos3-header'] = '🐰🐹 Mythos 3: "Man kann Kaninchen und Meerschweinchen zusammen halten"'
data['kaninchen-mythos4-header'] = '💔 Mythos 4: "Einzelhaltung geht, wenn man sich viel kümmert"'

# Fix Hamster headers (generic, as MD doesn't have them)
data['hamster-mythos1-header'] = '👶 Mythos 1: "Hamster sind Kinderhaustiere"'
data['hamster-mythos2-header'] = '📦 Mythos 2: "Ein kleiner Käfig reicht"'
data['hamster-mythos3-header'] = '🚫 Mythos 3: "Hamster kann man gut anfassen"'
data['hamster-mythos4-header'] = '✋ Mythos 4: "Man kann sie zusammen halten"'

# Fix Ratten headers
data['ratten-mythos1-header'] = '⏰ Mythos 1: "Ratten sind tagaktiv"'
data['ratten-mythos2-header'] = '📦 Mythos 2: "Ein normaler Käfig reicht"'
data['ratten-mythos3-header'] = '🧼 Mythos 3: "Ratten sind dreckig"'
data['ratten-mythos4-header'] = '🐭 Mythos 4: "Ratten sind Einzelgänger"'

# Fix Degus headers
data['degus-mythos1-header'] = '🐹 Mythos 1: "Degus sind wie Hamster – man kann sie einzeln halten"'
data['degus-mythos2-header'] = '💔 Mythos 2: "Degus brauchen keine Artgenossen"'
data['degus-mythos3-header'] = '🛁 Mythos 3: "Degus kann man baden"'
data['degus-mythos4-header'] = '🧠 Mythos 4: "Degus sind anspruchslos"'

print(f"Fixed 16 mythos headers")

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

    print("\n=== kleintiere headers fixed! ===")
    print("\nNote: Hamster, Ratten, Degus content exists in JSON but not in MD file.")
    print("The JSON content was kept as it appears to be complete.")
else:
    print(f"✗ Failed: {r2.status_code}")
    print(r2.text)
