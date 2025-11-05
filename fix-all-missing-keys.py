#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Fix all missing/empty keys across all pages.
"""
import requests
import json
import html
import sys

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

def update_page(slug, updates):
    """Update page with new/fixed keys."""
    r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
              params={'slug': slug, 'context': 'edit'})
    if r.status_code != 200:
        return False

    page = r.json()[0]
    data = json.loads(html.unescape(page['content']['raw']))

    # Apply updates
    for key, value in updates.items():
        data[key] = value

    # Save
    r2 = s.post(
        f'https://vm.andersen-webworks.de/wp-json/wp/v2/pages/{page["id"]}',
        json={'content': json.dumps(data, ensure_ascii=False)}
    )

    return r2.status_code == 200

print("=" * 80)
print("FIXING ALL MISSING/EMPTY KEYS")
print("=" * 80)

fixes = []

# tierliebe-start: Empty sektion key
print("\n1. tierliebe-start...")
if update_page('tierliebe-start', {
    'sektion-bin-ich-bereit-fur-ein-tier': 'Bin ich bereit für ein Tier?'
}):
    print("   ✓ Fixed")
    fixes.append('tierliebe-start')

# tierliebe-katzen: Missing wissen-highlight
print("\n2. tierliebe-katzen...")
if update_page('tierliebe-katzen', {
    'wissen-highlight': '<strong>Wichtig:</strong> Selbst bei bester Pflege kann eine Krankheit auftreten – gutes Wissen minimiert aber das Risiko erheblich.'
}):
    print("   ✓ Fixed")
    fixes.append('tierliebe-katzen')

# tierliebe-kleintiere: Missing verhalten/charakter paragraphs
print("\n3. tierliebe-kleintiere...")
if update_page('tierliebe-kleintiere', {
    'hamster-verhalten-p1': 'Hamster sind Einzelgänger – aber sozial mit dem Menschen (bei Geduld).',
    'ratten-charakter-p1': 'Ratten sind extrem intelligent, sozial und reinlich. Sie bauen enge Bindungen auf und brauchen tägliche Beschäftigung.'
}):
    print("   ✓ Fixed")
    fixes.append('tierliebe-kleintiere')

# tierliebe-exoten: Missing kernaussage-p2
print("\n4. tierliebe-exoten...")
if update_page('tierliebe-exoten', {
    'kernaussage-p2': 'Reptilien und Fische leben in hochkomplexen Ökosystemen, die wir im Wohnzimmer niemals nachbilden können.'
}):
    print("   ✓ Fixed")
    fixes.append('tierliebe-exoten')

# tierliebe-qualzucht: Missing icons and subtitle
print("\n5. tierliebe-qualzucht...")
if update_page('tierliebe-qualzucht', {
    'hero-subtitle': 'Schönheit ist oft teuer bezahlt – und das nicht nur mit Geld. Viele Tiere, die wir \'süß\' oder \'Edelrassen\' nennen, leiden ihr Leben lang.',
    'definition-quote': '💔 Schönheit darf nicht weh tun – auch nicht bei Tieren.',
    'cta-button': 'Zur Adoption →',
    'rasse1-icon': '🐶',
    'rasse2-icon': '🐱',
    'rasse3-icon': '🐰',
    'rasse4-icon': '🐦',
    'rasse5-icon': '🐠',
    'rasse6-icon': '🦎',
    'rasse7-icon': '🐢',
    'rasse8-icon': '🐭'
}):
    print("   ✓ Fixed")
    fixes.append('tierliebe-qualzucht')

# tierliebe-wissen: Missing glossar-inhalt
print("\n6. tierliebe-wissen...")
glossar_content = """<div class="glossar-item"><strong>Adoption:</strong> Übernahme eines Tieres aus dem Tierschutz statt Kauf</div>
<div class="glossar-item"><strong>Artgerechte Haltung:</strong> Haltung, die den natürlichen Bedürfnissen der Tierart entspricht</div>
<div class="glossar-item"><strong>Einzelhaltung:</strong> Haltung ohne Artgenossen – bei den meisten Tieren Tierquälerei</div>
<div class="glossar-item"><strong>Kastration:</strong> Operative Entfernung der Keimdrüsen zur Verhinderung von Nachwuchs</div>
<div class="glossar-item"><strong>Qualzucht:</strong> Zucht mit gesundheitlichen Beeinträchtigungen</div>
<div class="glossar-item"><strong>Sozialisierung:</strong> Gewöhnung an Menschen, Artgenossen und Umwelt</div>"""

if update_page('tierliebe-wissen', {
    'glossar-inhalt': glossar_content
}):
    print("   ✓ Fixed")
    fixes.append('tierliebe-wissen')

# tierliebe-mythen: Missing cta-button
print("\n7. tierliebe-mythen...")
if update_page('tierliebe-mythen', {
    'cta-button': 'Zum Test →'
}):
    print("   ✓ Fixed")
    fixes.append('tierliebe-mythen')

# Clear cache
print("\n" + "=" * 80)
s.get('https://vm.andersen-webworks.de/wp-admin/?tierliebe_clear_cache=1')
print("✓ Cache cleared")

print("\n" + "=" * 80)
print("SUMMARY")
print("=" * 80)
print(f"\n✓ Fixed {len(fixes)} pages:")
for slug in fixes:
    print(f"  - {slug}")
