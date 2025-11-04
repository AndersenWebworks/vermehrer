#!/usr/bin/env python3
"""
Migriert alle Tierliebe-Seiten zu einheitlichem JSON-Format in post_content
- Home: Markdown → JSON
- Andere: Meta-Field tierliebe_content → post_content JSON
"""

import json
import re
import requests
from requests.auth import HTTPBasicAuth

# WordPress-Konfiguration
WP_URL = "https://vm.andersen-webworks.de"
WP_USER = "EAndersen"
WP_APP_PASSWORD = "m0jD Ot5r 4ISS byni rJvm dbZQ"

def parse_markdown_to_json(markdown):
    """Konvertiert Home-Markdown zu JSON"""
    data = {}

    # Parse sections mit ## als Delimiter
    sections = re.split(r'^## ', markdown, flags=re.MULTILINE)
    sections = [s for s in sections if s.strip()]

    for section in sections:
        lines = section.strip().split('\n')
        if not lines:
            continue

        section_title = lines[0].strip()
        section_content = '\n'.join(lines[1:]).strip()

        # Clean markdown: Entferne **bold**, "quotes"
        section_content = section_content.strip('"')
        section_content = re.sub(r'\*\*(.+?)\*\*', r'\1', section_content)
        section_content = re.sub(r'\*(.+?)\*', r'\1', section_content)

        # Key aus Section-Title
        key = section_title.lower()
        key = re.sub(r'[^a-z0-9]+', '-', key)
        key = key.strip('-')

        data[key] = section_content.strip()

    return data

def migrate_post(slug, title):
    """Migriert einen Post zu JSON"""
    print(f"\n{'='*60}")
    print(f"Migriere: {slug}")
    print(f"{'='*60}")

    # Hole Post (mit context=edit um 'raw' content zu bekommen)
    response = requests.get(
        f"{WP_URL}/wp-json/wp/v2/tierliebe_text",
        params={'slug': slug, 'context': 'edit'},
        auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
    )

    if response.status_code != 200 or not response.json():
        print(f"  X Post nicht gefunden: {slug}")
        return False

    post = response.json()[0]
    post_id = post['id']

    # Content kann 'raw' oder 'rendered' sein, oder direkt ein String
    if isinstance(post.get('content'), dict):
        current_content = post['content'].get('raw') or post['content'].get('rendered', '')
    else:
        current_content = post.get('content', '')

    print(f"  OK Post gefunden (ID: {post_id})")

    # Bestimme Datenquelle
    if slug == 'tierliebe-home':
        # Home: Markdown -> JSON
        print(f"  -> Konvertiere Markdown zu JSON...")
        try:
            json_data = parse_markdown_to_json(current_content)
            print(f"  OK {len(json_data)} Felder extrahiert")
        except Exception as e:
            print(f"  X Fehler beim Parsing: {e}")
            return False
    else:
        # Andere: Meta-Field -> JSON
        print(f"  -> Hole Meta-Field tierliebe_content...")
        if 'tierliebe_content' in post and post['tierliebe_content']:
            json_data = post['tierliebe_content']
            print(f"  OK {len(json_data)} Felder gefunden")
        else:
            print(f"  ! Keine Daten in tierliebe_content, versuche Markdown...")
            try:
                json_data = parse_markdown_to_json(current_content)
                print(f"  OK {len(json_data)} Felder extrahiert")
            except Exception as e:
                print(f"  X Fehler: {e}")
                return False

    # Konvertiere zu JSON-String
    json_string = json.dumps(json_data, ensure_ascii=False, indent=None)

    # Update Post
    print(f"  -> Speichere JSON in post_content...")
    update_response = requests.post(
        f"{WP_URL}/wp-json/wp/v2/tierliebe_text/{post_id}",
        json={
            'content': json_string
        },
        auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
    )

    if update_response.status_code == 200:
        print(f"  OK Erfolgreich migriert!")

        # Verifiziere
        verify_response = requests.get(
            f"{WP_URL}/wp-json/wp/v2/tierliebe_text/{post_id}",
            params={'context': 'edit'},
            auth=HTTPBasicAuth(WP_USER, WP_APP_PASSWORD)
        )

        if verify_response.status_code == 200:
            verify_data = verify_response.json()
            if isinstance(verify_data.get('content'), dict):
                verify_content = verify_data['content'].get('raw') or verify_data['content'].get('rendered', '')
            else:
                verify_content = verify_data.get('content', '')

            try:
                verify_json = json.loads(verify_content)
                print(f"  OK Verifiziert: {len(verify_json)} Felder gespeichert")
            except json.JSONDecodeError:
                print(f"  ! Warnung: Gespeicherter Content ist kein valides JSON")

        return True
    else:
        print(f"  X Fehler beim Speichern: {update_response.status_code}")
        print(f"  Response: {update_response.text[:200]}")
        return False

def main():
    """Hauptfunktion"""
    print("\n" + "="*60)
    print("MIGRATION: Markdown/Meta-Field -> JSON in post_content")
    print("="*60)

    # Liste aller Seiten (mit korrekten Slugs)
    pages = [
        'tierliebe-home',
        'adoption',
        'qualzucht',
        'wissen',
        'hunde',
        'katzen',
        'kleintiere',
        'exoten'
    ]

    success_count = 0

    for slug in pages:
        if migrate_post(slug, slug.capitalize()):
            success_count += 1

    print("\n" + "="*60)
    print(f"OK Migration abgeschlossen: {success_count}/{len(pages)} erfolgreich")
    print("="*60)
    print()
    print(f"-> Oeffne: {WP_URL}/wp-admin/edit.php?post_type=tierliebe_text")
    print()
    print("WICHTIG: Cache in WordPress loeschen!")
    print()

if __name__ == '__main__':
    main()
