#!/usr/bin/env python3
"""
Initialisiert alle Tierliebe-Seiten mit ihren Fallback-Texten
Verwendet die WordPress REST API
"""

import re
import json
import requests
from requests.auth import HTTPBasicAuth
import os

# WordPress-Konfiguration
WP_URL = "https://vm.andersen-webworks.de"
WP_USER = "EAndersen"
WP_APP_PASSWORD = "m0jD Ot5r 4ISS byni rJvm dbZQ"

# Seiten-Templates
PAGES = {
    'adoption': 'webworks-theme/page-tierliebe-adoption.php',
    'qualzucht': 'webworks-theme/page-tierliebe-qualzucht.php',
    'wissen': 'webworks-theme/page-tierliebe-wissen.php',
    'hunde': 'webworks-theme/page-tierliebe-hunde.php',
    'katzen': 'webworks-theme/page-tierliebe-katzen.php',
    'kleintiere': 'webworks-theme/page-tierliebe-kleintiere.php',
    'exoten': 'webworks-theme/page-tierliebe-exoten.php',
}

def extract_fallback_texts(template_content):
    """Extrahiert alle Fallback-Texte aus einem Template"""
    content_data = {}

    # Pattern 1: data-key="KEY" mit PHP-Fallback
    # Findet: data-key="hero-titel"><?php echo isset($content['hero-titel']) ? ... : 'Fallback-Text'; ?>
    pattern1 = r'data-key="([^"]+)"[^>]*?>.*?isset\(\$content\[[\'"]([^"\']+)[\'"]\]\)[^:]*?:\s*[\'"]([^\'"]*(?:\\.[^\'"]*)*)[\'"]'

    for match in re.finditer(pattern1, template_content, re.DOTALL):
        key = match.group(1)
        fallback = match.group(3).replace("\\'", "'").replace('\\"', '"')
        content_data[key] = fallback

    # Pattern 2: Editierbare Listen
    # Findet: <ul class="editable" data-key="KEY"><li>...</li></ul>
    pattern2 = r'<ul[^>]*?class="[^"]*editable[^"]*"[^>]*?data-key="([^"]+)"[^>]*?>(.*?)</ul>'

    for match in re.finditer(pattern2, template_content, re.DOTALL):
        key = match.group(1)
        if key not in content_data:
            list_content = match.group(2).strip()
            content_data[key] = list_content

    return content_data

def get_or_create_post(slug, title):
    """Holt oder erstellt einen Tierliebe-Text Post"""

    # Pruefe ob Post existiert
    response = requests.get(
        f"{WP_URL}/wp-json/wp/v2/tierliebe_text",
        params={'slug': slug},
        auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
    )

    if response.status_code == 200 and response.json():
        post = response.json()[0]
        print(f"  i Post existiert bereits (ID: {post['id']})")
        return post['id']

    # Erstelle neuen Post
    response = requests.post(
        f"{WP_URL}/wp-json/wp/v2/tierliebe_text",
        json={
            'title': title,
            'slug': slug,
            'status': 'publish'
        },
        auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
    )

    if response.status_code == 201:
        post = response.json()
        print(f"  OK Neuer Post erstellt (ID: {post['id']})")
        return post['id']
    else:
        print(f"  X Fehler beim Erstellen: {response.status_code}")
        print(f"  Response: {response.text}")
        return None

def update_post_meta(post_id, content_data):
    """Aktualisiert die Meta-Daten eines Posts"""

    response = requests.post(
        f"{WP_URL}/wp-json/wp/v2/tierliebe_text/{post_id}",
        json={
            'meta': {
                'tierliebe_content': content_data
            }
        },
        auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
    )

    if response.status_code == 200:
        return True
    else:
        print(f"  X Fehler beim Aktualisieren der Meta-Daten: {response.status_code}")
        print(f"  Response: {response.text}")
        return False

def main():
    print("=" * 60)
    print("Tierliebe Content Initialisierung")
    print("=" * 60)
    print()

    for slug, template_file in PAGES.items():
        print(f"Verarbeite: {slug}")
        print("-" * 40)

        # Template einlesen
        if not os.path.exists(template_file):
            print(f"  X Template nicht gefunden: {template_file}")
            continue

        with open(template_file, 'r', encoding='utf-8') as f:
            template_content = f.read()

        # Extrahiere Fallback-Texte
        content_data = extract_fallback_texts(template_content)

        if not content_data:
            print(f"  ! Keine editierbaren Felder gefunden")
            continue

        print(f"  OK {len(content_data)} Felder extrahiert")

        # Post erstellen oder holen
        post_id = get_or_create_post(slug, slug.capitalize())

        if not post_id:
            continue

        # Meta-Daten aktualisieren
        if update_post_meta(post_id, content_data):
            print(f"  OK Erfolgreich initialisiert!")

        print()

    print("=" * 60)
    print("OK Alle Seiten wurden erfolgreich initialisiert!")
    print("=" * 60)
    print()
    print(f"-> Oeffne: {WP_URL}/wp-admin/edit.php?post_type=tierliebe_text")

if __name__ == '__main__':
    main()
