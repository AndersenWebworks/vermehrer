#!/usr/bin/env python3
# -*- coding: utf-8 -*-
import requests, json, sys

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
          params={'slug': 'tierliebe-start', 'context': 'edit'})
page = r.json()[0]
data = json.loads(page['content']['raw'])

# Expected values from MD
expected = {
    'header-titel': 'Du liebst Tiere?',
    'untertitel': 'Dann lies hier nicht, was du hören willst – sondern was du wissen musst. Ehrlich. Klar. Und im Sinne der Tiere.',
    'einleitungstext': 'Bevor du ein Tier aufnimmst – Hund, Katze, Kaninchen, Welli oder Goldfisch – nimm dir ein paar Minuten für die Wahrheit. Denn: Gute Absichten reichen nicht. Verantwortung schon.',
    'button-test': '✨ Bin ich bereit? → Zum Test',
    'button-wissen': '📚 Wissen aufbauen',
}

print("=== Verifying Home Page Content ===\n")
for key, expected_value in expected.items():
    current = data.get(key, '[MISSING]')
    match = current == expected_value
    status = "[OK]" if match else "[DIFF]"
    print(f"{status} {key}")
    if not match:
        print(f"  Expected: {expected_value[:80]}...")
        print(f"  Current:  {str(current)[:80]}...")
