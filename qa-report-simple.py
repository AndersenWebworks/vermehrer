#!/usr/bin/env python3
# -*- coding: utf-8 -*-
import requests, json, html, sys, re

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

print("=== Fixing hunde page ===\n")

# Get hunde CPT
r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/tierliebe_text/623', params={'context': 'edit'})
content = html.unescape(r.json()['content']['raw'])

print(f"Original length: {len(content)} chars")

# Manual fixes for all known quote problems
fixes = [
    ('"Hunde können 8', '\\"Hunde können 8'),
    ('Auslauf"","mythos1', 'Auslauf\\"","mythos1'),
    ('wirken "brav", leiden', 'wirken \\"brav\\", leiden'),
    ('"Ein Hund im', '\\"Ein Hund im'),
    ('arbeiten bin"","mythos2', 'arbeiten bin\\"","mythos2'),
]

for old, new in fixes:
    if old in content:
        content = content.replace(old, new)
        print(f"Fixed: {old[:30]}...")
    else:
        print(f"Not found: {old[:30]}...")

# Validate
try:
    data = json.loads(content)
    print(f"\n[OK] JSON is valid! ({len(data)} keys)")

    # Save to page
    r2 = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages', params={'slug': 'tierliebe-hunde'})
    page_id = r2.json()[0]['id']

    r3 = s.post(
        f'https://vm.andersen-webworks.de/wp-json/wp/v2/pages/{page_id}',
        json={'content': json.dumps(data, ensure_ascii=False)}
    )

    if r3.status_code == 200:
        print(f"[OK] Updated page {page_id}")

        # Clear cache
        s.get('https://vm.andersen-webworks.de/wp-admin/?tierliebe_clear_cache=1')
        print("[OK] Cache cleared")

        print("\n=== hunde page migration complete! ===")
    else:
        print(f"[ERROR] Failed to update page: {r3.status_code}")

except json.JSONDecodeError as e:
    print(f"\n[ERROR] Still invalid: {e}")
    print(f"At position {e.pos}:")
    start = max(0, e.pos - 60)
    end = min(len(content), e.pos + 60)
    print(f"...{content[start:end]}...")
    print(f"   {' ' * (e.pos - start)}^")
