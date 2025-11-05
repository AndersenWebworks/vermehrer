#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Check and fix corrupt JSON in hunde and qualzucht CPT posts.
"""

import requests
import json
import html
import sys
import re

# Force UTF-8 output
if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

WORDPRESS_URL = "https://vm.andersen-webworks.de"
USERNAME = "EAndersen"
APP_PASSWORD = "m0jD Ot5r 4ISS byni rJvm dbZQ"

session = requests.Session()
session.auth = (USERNAME, APP_PASSWORD)
session.headers.update({'Content-Type': 'application/json'})

def fix_json_quotes(content):
    """Fix unescaped quotes in JSON string values."""
    # Pattern: Find "key":"value with "problem" inside"
    # Strategy: Parse manually and escape quotes inside string values

    result = []
    in_string = False
    escape_next = False
    i = 0

    while i < len(content):
        char = content[i]

        if escape_next:
            result.append(char)
            escape_next = False
        elif char == '\\':
            result.append(char)
            escape_next = True
        elif char == '"':
            # Check if this quote is part of a JSON structure (after : or , or { or [)
            # or if it's inside a string value
            prev_meaningful = None
            for j in range(len(result) - 1, -1, -1):
                if result[j] not in [' ', '\n', '\r', '\t']:
                    prev_meaningful = result[j]
                    break

            if prev_meaningful in [':', ',', '{', '[']:
                # This is a string delimiter
                in_string = not in_string
                result.append(char)
            elif not in_string:
                # This is closing a string
                in_string = False
                result.append(char)
            else:
                # This is inside a string value - escape it
                result.append('\\"')
        else:
            result.append(char)

        i += 1

    return ''.join(result)

def fix_and_migrate(cpt_id, slug, page_slug):
    """Fix JSON and migrate to page."""
    print(f"\n=== Fixing {slug} (ID: {cpt_id}) ===")

    # Get CPT content
    url = f"{WORDPRESS_URL}/wp-json/wp/v2/tierliebe_text/{cpt_id}"
    r = session.get(url, params={'context': 'edit'})

    if r.status_code != 200:
        print(f"Error fetching CPT: {r.status_code}")
        return False

    content_raw = r.json()['content']['raw']
    content = html.unescape(content_raw)

    # Apply specific fixes
    if slug == 'qualzucht':
        # Fix "bedeutet4" -> "bedeutet"
        content = content.replace('"hero-titel":"⚠️ Überzüchtung – Wenn Schönheit Leiden bedeutet4"',
                                 '"hero-titel":"⚠️ Überzüchtung – Wenn Schönheit Leiden bedeutet"')

    # Fix unescaped quotes
    content = fix_json_quotes(content)

    # Validate
    try:
        data = json.loads(content)
        print(f"✓ JSON fixed! ({len(data)} keys)")
    except json.JSONDecodeError as e:
        print(f"✗ Still invalid: {e}")
        return False

    # Get page
    r = session.get(f"{WORDPRESS_URL}/wp-json/wp/v2/pages", params={'slug': page_slug})
    pages = r.json()

    if not pages:
        print(f"✗ Page not found: {page_slug}")
        return False

    page_id = pages[0]['id']

    # Update page
    r = session.post(
        f"{WORDPRESS_URL}/wp-json/wp/v2/pages/{page_id}",
        json={'content': content}
    )

    if r.status_code == 200:
        print(f"✓ Migrated to Page ID {page_id}")
        return True
    else:
        print(f"✗ Failed to update page: {r.status_code}")
        return False

# Fix and migrate
print("=== Auto-fixing corrupt JSON ===")
fix_and_migrate(623, 'hunde', 'tierliebe-hunde')
fix_and_migrate(619, 'qualzucht', 'tierliebe-qualzucht')

# Clear cache
print("\n=== Clearing cache ===")
try:
    session.get(f"{WORDPRESS_URL}/wp-admin/?tierliebe_clear_cache=1")
    print("✓ Cache cleared")
except:
    print("✗ Cache clear failed (not critical)")
