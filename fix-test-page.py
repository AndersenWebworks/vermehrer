#!/usr/bin/env python3
# -*- coding: utf-8 -*-
import requests
import json
import sys

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

# Test page content from MD
data = {
    "header-titel": "✨ Bin ich bereit für ein Tier?",
    "einleitungstext": "Du denkst darüber nach, ein Tier aufzunehmen? Dann nimm dir bitte kurz Zeit für diese Fragen – ganz ehrlich, nur für dich. Denn ein Tier ist keine Phase. Es ist ein Teil deines Lebens – und komplett abhängig von dir.",
    "zentrale-frage": "Bist du der Typ Tierhalter, den Tiere sich wünschen würden?",
    "responsibility-box": "Ehrlichkeit ist der erste Schritt zu echter Tierliebe. Wenn du bei einer Frage oder mehreren Fragen zögerst, ist das kein Grund zur Scham. Es ist ein Zeichen, dass du Verantwortung ernst nimmst – und das verdient Respekt."
}

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

print("=== Fixing test page ===\n")

# Get page
r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages', params={'slug': 'tierliebe-test'})
page_id = r.json()[0]['id']

print(f"Page ID: {page_id}")

# Update content
r2 = s.post(
    f'https://vm.andersen-webworks.de/wp-json/wp/v2/pages/{page_id}',
    json={'content': json.dumps(data, ensure_ascii=False)}
)

if r2.status_code == 200:
    print(f"✓ Updated page with {len(data)} keys")

    # Clear cache
    s.get('https://vm.andersen-webworks.de/wp-admin/?tierliebe_clear_cache=1')
    print("✓ Cache cleared")

    print("\n=== test page fixed! ===")
else:
    print(f"✗ Failed: {r2.status_code}")
    print(r2.text)
