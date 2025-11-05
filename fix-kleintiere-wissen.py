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

# Fix kleintiere
print("=== Fixing kleintiere page ===\n")

r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
          params={'slug': 'tierliebe-kleintiere', 'context': 'edit'})
page = r.json()[0]
data = json.loads(html.unescape(page['content']['raw']))

print(f"Current header-untertitel: {data.get('header-untertitel', 'NOT FOUND')}")

data['header-untertitel'] = 'Die Wahrheit über \'einfache\' Haustiere'

r2 = s.post(
    f'https://vm.andersen-webworks.de/wp-json/wp/v2/pages/{page["id"]}',
    json={'content': json.dumps(data, ensure_ascii=False)}
)

if r2.status_code == 200:
    print("✓ kleintiere fixed")
else:
    print(f"✗ Failed: {r2.status_code}")

# Fix wissen
print("\n=== Fixing wissen page ===\n")

r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
          params={'slug': 'tierliebe-wissen', 'context': 'edit'})
page = r.json()[0]
data = json.loads(html.unescape(page['content']['raw']))

print(f"Current tab-3-button: {data.get('tab-3-button', 'NOT FOUND')}")

# Check what the actual key should be
for key in data.keys():
    if 'tab' in key and '3' in key:
        print(f"  Found: {key} = {data[key][:50]}")

# Fix based on context
if 'tab-3-button' in data:
    data['tab-3-button'] = 'Wenn\'s brennt'

r2 = s.post(
    f'https://vm.andersen-webworks.de/wp-json/wp/v2/pages/{page["id"]}',
    json={'content': json.dumps(data, ensure_ascii=False)}
)

if r2.status_code == 200:
    print("✓ wissen fixed")
else:
    print(f"✗ Failed: {r2.status_code}")

# Clear cache
s.get('https://vm.andersen-webworks.de/wp-admin/?tierliebe_clear_cache=1')
print("\n✓ Cache cleared")
print("\n=== Done! ===")
