#!/usr/bin/env python3
# -*- coding: utf-8 -*-
import requests, json, sys

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

# Get current page JSON
r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages', 
          params={'slug': 'tierliebe-start', 'context': 'edit'})
page = r.json()[0]
current_json = json.loads(page['content']['raw'])

print("=== Current JSON Keys ===")
for key in sorted(current_json.keys()):
    value = current_json[key][:50] if len(str(current_json[key])) > 50 else current_json[key]
    print(f"{key}: {value}...")

print(f"\nTotal: {len(current_json)} keys")
