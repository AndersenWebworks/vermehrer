#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Final check: Spot-check critical fields on all pages.
"""
import requests
import json
import html
import sys

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

def get_page_data(slug):
    """Get page JSON."""
    r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages',
              params={'slug': slug, 'context': 'edit'})
    if r.status_code != 200:
        return None
    page = r.json()[0]
    content = html.unescape(page['content']['raw'])
    try:
        return json.loads(content)
    except json.JSONDecodeError:
        return None

# Specific checks based on MD files
checks = {
    'tierliebe-start': {
        'header-titel': 'Du liebst Tiere?',
        'untertitel': 'Dann lies hier nicht, was du hören willst',
    },
    'tierliebe-test': {
        'header-titel': '✨ Bin ich bereit für ein Tier?',
    },
    'tierliebe-hunde': {
        'header-titel': '🐶 Hunde',
        'header-untertitel': 'Mythen vs. Fakten',
    },
    'tierliebe-katzen': {
        'header-titel': '🐱 Katzen',
        'mythos1-header': '💔 Mythos 1: "Katzen sind Einzelgänger',
    },
    'tierliebe-kleintiere': {
        'header-titel': '🐰 Kleintiere',
        'header-untertitel': 'Die Wahrheit über \'einfache\' Haustiere',
    },
    'tierliebe-exoten': {
        'section-title': '🦜 Vögel & Exoten',
        'section-subtitle': 'Für 99% ungeeignet',
    },
    'tierliebe-adoption': {
        'hero-titel': '❤️ Adoption rettet Leben',
    },
    'tierliebe-qualzucht': {
        'hero-titel': '⚠️ Überzüchtung',
    },
    'tierliebe-wissen': {
        'hero-titel': '📚 Wissen, das rettet',
        'tab-3-button': 'Wenn\'s nicht klappt',
    },
    'tierliebe-kontakt': {
        'section-titel': '📧 Über & Kontakt',
        'section-subtitle': 'Wer steckt dahinter?',
    },
    'tierliebe-mythen': {
        'hero-titel': '💭 Die größten Irrtümer über Haustiere',
    },
}

print("=== Final Verification: Spot-checking critical fields ===\n")

issues = []

for slug, expected in checks.items():
    print(f"Checking {slug}...")
    data = get_page_data(slug)

    if not data:
        print(f"  ✗ No JSON")
        issues.append(slug)
        continue

    has_issues = False
    for key, expected_text in expected.items():
        actual = data.get(key, '')

        # Check if expected_text is a substring (for long texts)
        if expected_text not in actual:
            print(f"  ⚠ {key}:")
            print(f"    Expected (substring): {expected_text}")
            print(f"    Actual: {actual[:100]}")
            has_issues = True

    if has_issues:
        issues.append(slug)
    else:
        print(f"  ✓ OK")

print("\n" + "="*60)
print("SUMMARY")
print("="*60)

if issues:
    print(f"\n⚠ {len(issues)} pages need attention:")
    for slug in issues:
        print(f"  - {slug}")
else:
    print("\n✓ All pages verified!")

print(f"\nTotal checked: {len(checks)}")
