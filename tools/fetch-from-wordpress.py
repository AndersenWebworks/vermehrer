#!/usr/bin/env python3
"""
Holt Content-Daten aus WordPress und speichert sie lokal als JSON
Usage: python tools/fetch-from-wordpress.py [page_id]
"""

import json
import requests
from requests.auth import HTTPBasicAuth
import sys
import os

# WordPress-Konfiguration
WP_URL = "https://vm.andersen-webworks.de"
WP_USER = "EAndersen"
WP_APP_PASSWORD = "m0jD Ot5r 4ISS byni rJvm dbZQ"

def fetch_page_content(page_id):
    """Holt Content aus WordPress Page"""
    print(f"Fetching Page ID {page_id}...")

    response = requests.get(
        f"{WP_URL}/wp-json/wp/v2/pages/{page_id}",
        auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
    )

    if response.status_code != 200:
        print(f"  X Fehler: {response.status_code}")
        print(f"  Response: {response.text[:200]}")
        return None

    page = response.json()

    # Extract JSON from content
    content_html = page.get('content', {}).get('rendered', '')

    # Find JSON in content (usually wrapped in <p> tags)
    import re
    json_match = re.search(r'({.*})', content_html, re.DOTALL)

    if not json_match:
        print(f"  ! Kein JSON in Content gefunden")
        print(f"  Content Preview: {content_html[:500]}")
        return None

    json_text = json_match.group(1)
    print(f"  JSON Preview: {json_text[:200]}...")

    try:
        content_data = json.loads(json_text)
        print(f"  OK {len(content_data)} Felder gefunden")
        return {
            'id': page['id'],
            'slug': page['slug'],
            'title': page['title']['rendered'],
            'modified': page['modified'],
            'content': content_data
        }
    except json.JSONDecodeError as e:
        print(f"  X JSON Parse Error: {e}")
        print(f"  Raw JSON: {json_text[:1000]}")
        return None

def save_to_file(data, filename):
    """Speichert Daten als JSON"""
    os.makedirs(os.path.dirname(filename) if os.path.dirname(filename) else '.', exist_ok=True)

    with open(filename, 'w', encoding='utf-8') as f:
        json.dump(data, f, ensure_ascii=False, indent=2)

    print(f"  OK Gespeichert: {filename}")

def main():
    if len(sys.argv) < 2:
        print("Usage: python tools/fetch-from-wordpress.py <page_id>")
        print("\nBeispiel:")
        print("  python tools/fetch-from-wordpress.py 543   # Startseite")
        sys.exit(1)

    page_id = sys.argv[1]

    data = fetch_page_content(page_id)

    if data:
        filename = f"texte/{data['slug']}-content.json"
        save_to_file(data, filename)
        print("\n" + "="*60)
        print(f"Erfolgreich: {data['title']}")
        print(f"Slug: {data['slug']}")
        print(f"Felder: {len(data['content'])}")
        print(f"Datei: {filename}")
        print("="*60)

if __name__ == '__main__':
    main()
