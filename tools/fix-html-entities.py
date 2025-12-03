#!/usr/bin/env python3
"""
Fixes broken JSON in WordPress by decoding HTML entities
Usage: python tools/fix-html-entities.py <page_id>
"""

import json
import requests
from requests.auth import HTTPBasicAuth
import sys
import html
import re  # At top level

# WordPress-Konfiguration
WP_URL = "https://vm.andersen-webworks.de"
WP_USER = "EAndersen"
WP_APP_PASSWORD = "m0jD Ot5r 4ISS byni rJvm dbZQ"

def fetch_and_fix(page_id):
    """Holt Content, fixt HTML entities, und pushed zurück"""
    print(f"[1/4] Fetching Page ID {page_id}...")

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

    # [2/4] Decode HTML entities
    print(f"[2/4] Decoding HTML entities...")
    fixed_json = html.unescape(broken_json)

    # Count fixes
    fixes = broken_json.count('&#')
    print(f"  OK {fixes} HTML entities decoded")

    # [2.5/4] Convert typographic quotes to ASCII quotes
    print(f"[2.5/4] Converting typographic quotes to ASCII...")
    # Replace all typographic quotes with ASCII "
    replacements = {
        '"': '"',  # U+201C (left double quotation mark)
        '"': '"',  # U+201D (right double quotation mark)
        '„': '"',  # U+201E (double low-9 quotation mark)
        '‟': '"',  # U+201F (double high-reversed-9 quotation mark)
        '′': '"',  # U+2032 (prime) - your existing fix
        '″': '"',  # U+2033 (double prime)
        ''': "'",  # U+2018 (left single quotation mark)
        ''': "'",  # U+2019 (right single quotation mark)
        '‚': "'",  # U+201A (single low-9 quotation mark)
    }

    for old, new in replacements.items():
        fixed_json = fixed_json.replace(old, new)

    print(f"  OK Typographic quotes converted to ASCII")

    # [2.6/4] Escape newlines and other control characters in JSON strings
    print(f"[2.6/4] Escaping control characters...")
    # We need to escape newlines, tabs, etc. that are inside JSON string values
    # But we can't use simple replace because that would also escape JSON structure
    # Solution: Parse the broken JSON manually and rebuild it

    # Actually, let's try a simpler approach: load as raw, parse structure, re-encode
    try:
        # Attempt to fix by using Python's json module to re-encode properly
        # First, we need to manually fix the line breaks in strings
        # This is tricky because we need to distinguish between structural breaks and content breaks

        # Simple fix: Replace actual newlines within string values with escaped \n
        # We do this by finding strings between quotes and escaping their content

        def escape_string_content(match):
            content = match.group(1)
            # Escape control characters
            content = content.replace('\\', '\\\\')  # Escape backslashes first
            content = content.replace('\n', '\\n')  # Escape newlines
            content = content.replace('\r', '\\r')  # Escape carriage returns
            content = content.replace('\t', '\\t')  # Escape tabs
            return '"' + content + '"'

        # Match quoted strings (but not already escaped quotes)
        # This pattern matches: " followed by any characters (including escaped quotes) until unescaped "
        pattern = r'"((?:[^"\\]|\\.)*)"'
        fixed_json = re.sub(pattern, escape_string_content, fixed_json, flags=re.DOTALL)

        print(f"  OK Control characters escaped")

    except Exception as e:
        print(f"  ! Warning during escape: {e}")

    # Debug: Save fixed JSON to file
    with open('debug-fixed.json', 'w', encoding='utf-8') as f:
        f.write(fixed_json)
    print(f"  DEBUG: Saved to debug-fixed.json")

    # [3/4] Validate JSON
    print(f"[3/4] Validating JSON...")
    try:
        content_data = json.loads(fixed_json)
        print(f"  OK Valid JSON with {len(content_data)} fields")
    except json.JSONDecodeError as e:
        print(f"  X JSON still broken: {e}")
        print(f"  Check debug-fixed.json for details")
        # Find the problematic character
        error_pos = e.pos if hasattr(e, 'pos') else 53
        context_start = max(0, error_pos - 50)
        context_end = min(len(fixed_json), error_pos + 50)
        print(f"  Context around error:")
        print(f"  ...{fixed_json[context_start:context_end]}...")
        return False

    # [4/4] Push back to WordPress
    print(f"[4/4] Pushing fixed JSON back to WordPress...")

    # Wrap in <p> tag like WordPress expects
    fixed_html = f"<p>{json.dumps(content_data, ensure_ascii=False)}</p>"

    update_response = requests.post(
        f"{WP_URL}/wp-json/wp/v2/pages/{page_id}",
        auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD),
        json={'content': fixed_html}
    )

    if update_response.status_code == 200:
        print(f"  OK Page updated!")
        print(f"\n{'='*60}")
        print(f"SUCCESS: Page {page_id} fixed!")
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
        print("Usage: python tools/fix-html-entities.py <page_id>")
        print("\nBeispiel:")
        print("  py tools/fix-html-entities.py 543   # Fix Startseite")
        sys.exit(1)

    page_id = sys.argv[1]
    success = fetch_and_fix(page_id)

    if not success:
        sys.exit(1)

if __name__ == '__main__':
    main()
