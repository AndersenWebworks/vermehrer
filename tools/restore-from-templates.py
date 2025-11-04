#!/usr/bin/env python3
"""
Extrahiert Fallback-Texte aus PHP-Templates und speichert sie als JSON direkt in post_content
"""

import json
import re
import requests
from requests.auth import HTTPBasicAuth

# WordPress-Konfiguration
WP_URL = "https://vm.andersen-webworks.de"
WP_USER = "EAndersen"
WP_APP_PASSWORD = "m0jD Ot5r 4ISS byni rJvm dbZQ"

def extract_fallback_texts(template_path):
    """Extrahiert alle Fallback-Texte aus einem PHP-Template"""
    content_data = {}

    with open(template_path, 'r', encoding='utf-8') as f:
        template_content = f.read()

    # Pattern 1: Einfache Fallbacks wie isset($content['key']) ? $content['key'] : 'fallback'
    pattern1 = r'isset\(\$content\[[\'"]([^\'"]+)[\'"]\]\)\s*\?\s*.*?:\s*[\'"]([^\'"]*(?:\\.[^\'"]*)*)[\'"]'
    matches1 = re.findall(pattern1, template_content, re.DOTALL)

    for key, fallback in matches1:
        if fallback.strip():
            content_data[key] = fallback.replace("\\'", "'").replace('\\"', '"')

    # Pattern 2: Editable Listen - <ul class="editable" data-key="key">.....</ul>
    pattern2 = r'<ul[^>]*?class="[^"]*editable[^"]*"[^>]*?data-key="([^"]+)"[^>]*?>(.*?)</ul>'
    matches2 = re.findall(pattern2, template_content, re.DOTALL)

    for key, list_content in matches2:
        # Bereinige den HTML-Content
        cleaned = re.sub(r'\s+', ' ', list_content).strip()
        content_data[key] = cleaned

    return content_data

def update_post_content(slug, json_data):
    """Updated post_content mit JSON oder erstellt neuen Post"""
    print(f"\n{'='*60}")
    print(f"Update: {slug}")
    print(f"{'='*60}")

    # Finde Post
    response = requests.get(
        f"{WP_URL}/wp-json/wp/v2/tierliebe_text",
        params={'slug': slug},
        auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
    )

    if response.status_code == 200 and response.json():
        # Post existiert - Update
        post = response.json()[0]
        post_id = post['id']
        print(f"  OK Post ID: {post_id}")
        print(f"  OK {len(json_data)} Felder gefunden")

        json_string = json.dumps(json_data, ensure_ascii=False, separators=(',', ':'))

        update_response = requests.post(
            f"{WP_URL}/wp-json/wp/v2/tierliebe_text/{post_id}",
            json={'content': json_string},
            auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
        )

        if update_response.status_code == 200:
            print(f"  OK Erfolgreich gespeichert!")
            return True
        else:
            print(f"  X Fehler: {update_response.status_code}")
            return False
    else:
        # Post existiert nicht - Erstelle neu
        print(f"  ! Post nicht gefunden - erstelle neu")
        print(f"  OK {len(json_data)} Felder gefunden")

        json_string = json.dumps(json_data, ensure_ascii=False, separators=(',', ':'))

        create_response = requests.post(
            f"{WP_URL}/wp-json/wp/v2/tierliebe_text",
            json={
                'title': slug.capitalize(),
                'slug': slug,
                'status': 'publish',
                'content': json_string
            },
            auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
        )

        if create_response.status_code == 201:
            new_post_id = create_response.json()['id']
            print(f"  OK Post erstellt (ID: {new_post_id})!")
            return True
        else:
            print(f"  X Fehler beim Erstellen: {create_response.status_code}")
            print(f"  Response: {create_response.text[:200]}")
            return False

def main():
    """Hauptfunktion"""
    print("\n" + "="*60)
    print("RESTORE: Fallback-Texte aus Templates -> JSON")
    print("="*60)

    pages = {
        'adoption': 'webworks-theme/page-tierliebe-adoption.php',
        'qualzucht': 'webworks-theme/page-tierliebe-qualzucht.php',
        'wissen': 'webworks-theme/page-tierliebe-wissen.php',
        'hunde': 'webworks-theme/page-tierliebe-hunde.php',
        'katzen': 'webworks-theme/page-tierliebe-katzen.php',
        'kleintiere': 'webworks-theme/page-tierliebe-kleintiere.php',
        'exoten': 'webworks-theme/page-tierliebe-exoten.php',
        'test': 'webworks-theme/page-tierliebe-test.php',
        'irrtuemer': 'webworks-theme/page-tierliebe-irrtuemer.php',
        'kontakt': 'webworks-theme/page-tierliebe-kontakt.php',
    }

    success_count = 0

    for slug, template_path in pages.items():
        print(f"\nExtrahiere: {template_path}")
        try:
            fallbacks = extract_fallback_texts(template_path)
            print(f"  -> {len(fallbacks)} Felder extrahiert")

            if update_post_content(slug, fallbacks):
                success_count += 1
        except Exception as e:
            print(f"  X Fehler: {e}")

    print("\n" + "="*60)
    print(f"OK Restore abgeschlossen: {success_count}/{len(pages)} erfolgreich")
    print("="*60)

if __name__ == '__main__':
    main()
