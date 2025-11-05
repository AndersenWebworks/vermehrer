#!/usr/bin/env python3
# -*- coding: utf-8 -*-
import requests, json, sys

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

pages = [
    ('tierliebe-start', 'home'),
    ('tierliebe-test', 'test'),
    ('tierliebe-hunde', 'hunde'),
    ('tierliebe-katzen', 'katzen'),
    ('tierliebe-kleintiere', 'kleintiere'),
    ('tierliebe-exoten', 'exoten'),
    ('tierliebe-adoption', 'adoption'),
    ('tierliebe-qualzucht', 'qualzucht'),
    ('tierliebe-wissen', 'wissen'),
    ('tierliebe-kontakt', 'kontakt'),
    ('tierliebe-mythen', 'irrtuemer'),
]

print("=== Page Content Status ===\n")
for page_slug, md_name in pages:
    r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
              params={'slug': page_slug, 'context': 'edit'})
    
    if r.status_code != 200 or not r.json():
        print(f"{page_slug:25} [ERROR] Not found")
        continue
    
    page = r.json()[0]
    content = page['content']['raw']
    
    if not content:
        print(f"{page_slug:25} [EMPTY] No content")
        continue
    
    try:
        data = json.loads(content)
        print(f"{page_slug:25} [OK] {len(data)} keys")
    except:
        print(f"{page_slug:25} [ERROR] Invalid JSON")
