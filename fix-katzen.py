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

print("=== Fixing katzen page ===\n")

# Get page
r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
          params={'slug': 'tierliebe-katzen', 'context': 'edit'})
page = r.json()[0]
data = json.loads(html.unescape(page['content']['raw']))

print(f"Page ID: {page['id']}")
print(f"Current keys: {len(data)}")

# Fix mythos headers from MD file
data['mythos1-header'] = '💔 Mythos 1: \"Katzen sind Einzelgänger – die brauchen keinen Partner\"'
data['mythos2-header'] = '✂️ Mythos 2: \"Kastration ist optional – meine Katze kommt ja nicht raus\"'
data['mythos3-header'] = '🏠 Mythos 3: \"Wohnungshaltung geht problemlos – Katzen passen sich an\"'

print("\nFixed mythos headers")

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

    print("\n=== katzen page fixed! ===")
else:
    print(f"✗ Failed: {r2.status_code}")
    print(r2.text)
