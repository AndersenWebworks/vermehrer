#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Manual verification: Get JSON for each page to manually compare.
"""
import requests
import json
import html
import sys

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

def get_page_keys(slug):
    """Get first 5 keys of page JSON."""
    r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
              params={'slug': slug, 'context': 'edit'})
    if r.status_code != 200:
        return None

    page = r.json()[0]
    content = html.unescape(page['content']['raw'])

    try:
        data = json.loads(content)
        keys = list(data.keys())[:5]
        samples = {k: data[k][:100] + '...' if len(data[k]) > 100 else data[k] for k in keys}
        return samples
    except json.JSONDecodeError:
        return None

pages = [
    'tierliebe-start',
    'tierliebe-test',
    'tierliebe-hunde',
    'tierliebe-katzen',
    'tierliebe-kleintiere',
    'tierliebe-exoten',
    'tierliebe-adoption',
    'tierliebe-qualzucht',
    'tierliebe-wissen',
    'tierliebe-kontakt',
    'tierliebe-mythen',
]

print("=== Manual Verification: First 5 keys of each page ===\n")

for slug in pages:
    print(f"\n{'='*70}")
    print(f"PAGE: {slug}")
    print('='*70)

    samples = get_page_keys(slug)
    if not samples:
        print("  ✗ No JSON found")
        continue

    for key, value in samples.items():
        print(f"\n  {key}:")
        print(f"    {value}")
