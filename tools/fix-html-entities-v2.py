#!/usr/bin/env python3
"""
Fixes broken JSON in WordPress by decoding HTML entities (SIMPLIFIED VERSION)
Usage: python tools/fix-html-entities-v2.py <page_id>
"""

import json
import requests
from requests.auth import HTTPBasicAuth
import sys
import html
import re

# WordPress-Konfiguration
WP_URL = "https://vm.andersen-webworks.de"
WP_USER = "EAndersen"
WP_APP_PASSWORD = "m0jD Ot5r 4ISS byni rJvm dbZQ"

def fetch_and_fix(page_id):
    """Holt Content, fixt HTML entities, und pushed zurück"""
    print(f"[1/5] Fetching Page ID {page_id}...")

    # Hole Page
    response = requests.get(
        f"{WP_URL}/wp-json/wp/v2/pages/{page_id}",
        auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
    )

    if response.status_code != 200:
        print(f"  X Fehler: {response.status_code}")
        return False

    page = response.json()
    content_html = page.get('content', {}).get('rendered', '')

    # Find JSON in content
    json_match = re.search(r'({.*})', content_html, re.DOTALL)

    if not json_match:
        print(f"  X Kein JSON gefunden")
        return False

    broken_json = json_match.group(1)
    print(f"  OK JSON gefunden ({len(broken_json)} chars)")

    # [2/5] Decode HTML entities
    print(f"[2/5] Decoding HTML entities...")
    decoded = html.unescape(broken_json)
    fixes = broken_json.count('&#')
    print(f"  OK {fixes} HTML entities decoded")

    # [3/5] Replace typographic quotes with ASCII quotes
    print(f"[3/5] Normalizing quotes...")
    # Use Unicode escape sequences to ensure correct interpretation
    replacements = {
        '\u201c': '"',  # U+201C (left double quotation mark)
        '\u201d': '"',  # U+201D (right double quotation mark)
        '\u201e': '"',  # U+201E (double low-9 quotation mark)
        '\u201f': '"',  # U+201F (double high-reversed-9 quotation mark)
        '\u2032': '"',  # U+2032 (prime)
        '\u2033': '"',  # U+2033 (double prime)
        '\u2018': "'",  # U+2018 (left single quotation mark)
        '\u2019': "'",  # U+2019 (right single quotation mark)
        '\u201a': "'",  # U+201A (single low-9 quotation mark)
    }

    normalized = decoded
    total_replaced = 0
    for old, new in replacements.items():
        count = normalized.count(old)
        if count > 0:
            total_replaced += count
            normalized = normalized.replace(old, new)

    print(f"  OK Replaced {total_replaced} typographic quotes")

    # [3.5/5] Escape newlines in JSON string values
    print(f"[3.5/5] Escaping newlines...")
    # Replace literal newlines with \n (JSON doesn't allow literal newlines in strings)
    # Note: We don't escape backslashes because WordPress already has them escaped in HTML attributes
    normalized = normalized.replace('\n', '\\n').replace('\r', '\\r').replace('\t', '\\t')
    print(f"  OK Newlines escaped")

    # [4/5] Parse and re-encode JSON (this fixes escaping issues)
    print(f"[4/5] Parsing and re-encoding JSON...")
    try:
        content_data = json.loads(normalized)
        print(f"  OK Valid JSON with {len(content_data)} fields")

        # Re-encode with proper escaping
        fixed_json = json.dumps(content_data, ensure_ascii=False)
        print(f"  OK JSON re-encoded properly")

    except json.JSONDecodeError as e:
        print(f"  X JSON parse error: {e}")
        # Save debug file
        with open('debug-normalized.json', 'w', encoding='utf-8') as f:
            f.write(normalized)
        print(f"  Saved debug-normalized.json")
        return False

    # [5/5] Push back to WordPress
    print(f"[5/5] Pushing to WordPress...")

    # Wrap in <p> tag like WordPress expects
    fixed_html = f"<p>{fixed_json}</p>"

    update_response = requests.post(
        f"{WP_URL}/wp-json/wp/v2/pages/{page_id}",
        auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD),
        json={'content': fixed_html}
    )

    if update_response.status_code == 200:
        print(f"\n{'='*60}")
        print(f"✅ SUCCESS: Page {page_id} fixed!")
        print(f"URL: {WP_URL}/{page['slug']}/")
        print(f"Fields: {len(content_data)}")
        print(f"{'='*60}")
        return True
    else:
        print(f"  X Update failed: {update_response.status_code}")
        print(f"  Response: {update_response.text[:200]}")
        return False

def main():
    if len(sys.argv) < 2:
        print("Usage: py tools/fix-html-entities-v2.py <page_id>")
        print("\nBeispiel:")
        print("  py tools/fix-html-entities-v2.py 543   # Fix Startseite")
        sys.exit(1)

    page_id = sys.argv[1]
    success = fetch_and_fix(page_id)

    if not success:
        sys.exit(1)

if __name__ == '__main__':
    main()
