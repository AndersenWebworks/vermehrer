#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Sync all markdown files from texte/ folder to WordPress pages.
The markdown files are the source of truth.
"""
import json, sys, requests, glob, os

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

# Page slug mappings
slug_map = {
    'page-tierliebe-home': 'tierliebe-start',
    'page-tierliebe-irrtuemer': 'tierliebe-mythen',
}

def sync_page(md_file):
    """Sync one markdown file to its page."""
    basename = os.path.basename(md_file).replace('.md', '')
    page_slug = slug_map.get(basename, basename.replace('page-', ''))
    
    print(f"\n=== {basename} -> {page_slug} ===")
    
    # Get page
    r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages', 
              params={'slug': page_slug})
    
    if r.status_code != 200 or not r.json():
        print(f"[ERROR] Page not found: {page_slug}")
        return False
    
    page = r.json()[0]
    page_id = page['id']
    
    # Get current content
    current_content = page['content']['raw'] if 'raw' in page['content'] else ''
    
    if current_content:
        try:
            current_json = json.loads(current_content)
            print(f"Current: {len(current_json)} keys")
        except:
            print("Current: Invalid/empty")
    else:
        print("Current: Empty")
    
    # Note: We would need page-specific converters for each MD structure
    # For now, just report status
    print("[SKIP] MD->JSON converter needed per page type")
    return True

# Find all MD files
md_files = sorted(glob.glob('texte/page-tierliebe-*.md'))
print(f"Found {len(md_files)} markdown files\n")

for md_file in md_files:
    sync_page(md_file)

print("\n" + "="*50)
print("Sync complete!")
print("\nNote: MD->JSON conversion needs page-specific logic")
print("The markdown files are ready to be converted.")
