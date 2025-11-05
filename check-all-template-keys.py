#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Check all pages: Extract expected keys from templates and verify against actual JSON.
"""
import requests
import json
import html
import sys
import re
from pathlib import Path

if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

def get_page_json(slug):
    """Get page JSON content."""
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

def extract_keys_from_template(template_file):
    """Extract all data-key attributes from template."""
    with open(template_file, 'r', encoding='utf-8') as f:
        content = f.read()

    # Find all data-key="..." patterns
    keys = re.findall(r'data-key=["\']([^"\']+)["\']', content)
    return list(set(keys))  # Remove duplicates

# Map pages to templates
pages = [
    ('tierliebe-start', 'webworks-theme/page-tierliebe-home.php'),
    ('tierliebe-test', 'webworks-theme/page-tierliebe-test.php'),
    ('tierliebe-hunde', 'webworks-theme/page-tierliebe-hunde.php'),
    ('tierliebe-katzen', 'webworks-theme/page-tierliebe-katzen.php'),
    ('tierliebe-kleintiere', 'webworks-theme/page-tierliebe-kleintiere.php'),
    ('tierliebe-exoten', 'webworks-theme/page-tierliebe-exoten.php'),
    ('tierliebe-adoption', 'webworks-theme/page-tierliebe-adoption.php'),
    ('tierliebe-qualzucht', 'webworks-theme/page-tierliebe-qualzucht.php'),
    ('tierliebe-wissen', 'webworks-theme/page-tierliebe-wissen.php'),
    ('tierliebe-kontakt', 'webworks-theme/page-tierliebe-kontakt.php'),
    ('tierliebe-mythen', 'webworks-theme/page-tierliebe-irrtuemer.php'),
]

print("=" * 80)
print("COMPLETE TEMPLATE KEY VERIFICATION")
print("=" * 80)

all_issues = []

for slug, template_path in pages:
    print(f"\n{'='*80}")
    print(f"PAGE: {slug}")
    print(f"Template: {template_path}")
    print('='*80)

    # Get expected keys from template
    template_file = Path(template_path)
    if not template_file.exists():
        print(f"  ✗ Template not found: {template_path}")
        all_issues.append((slug, "Template not found"))
        continue

    expected_keys = extract_keys_from_template(template_file)
    print(f"\n  Expected keys from template ({len(expected_keys)}):")
    for key in sorted(expected_keys):
        print(f"    - {key}")

    # Get actual JSON
    actual_json = get_page_json(slug)
    if not actual_json:
        print(f"\n  ✗ No valid JSON found in page")
        all_issues.append((slug, "No JSON"))
        continue

    actual_keys = list(actual_json.keys())
    print(f"\n  Actual keys in JSON ({len(actual_keys)}):")
    for key in sorted(actual_keys)[:10]:  # Show first 10
        value_preview = str(actual_json[key])[:60].replace('\n', ' ')
        print(f"    - {key}: {value_preview}...")
    if len(actual_keys) > 10:
        print(f"    ... and {len(actual_keys) - 10} more")

    # Check for missing keys
    missing_keys = [k for k in expected_keys if k not in actual_keys]
    empty_keys = [k for k in expected_keys if k in actual_keys and not actual_json[k].strip()]

    if missing_keys:
        print(f"\n  ⚠ MISSING KEYS ({len(missing_keys)}):")
        for key in sorted(missing_keys):
            print(f"    - {key}")
        all_issues.append((slug, f"{len(missing_keys)} missing keys"))

    if empty_keys:
        print(f"\n  ⚠ EMPTY KEYS ({len(empty_keys)}):")
        for key in sorted(empty_keys):
            print(f"    - {key}")
        all_issues.append((slug, f"{len(empty_keys)} empty keys"))

    if not missing_keys and not empty_keys:
        print(f"\n  ✓ All template keys are present and have content!")

print("\n" + "=" * 80)
print("SUMMARY")
print("=" * 80)

if all_issues:
    print(f"\n⚠ {len(all_issues)} pages need attention:\n")
    for slug, issue in all_issues:
        print(f"  {slug}: {issue}")
else:
    print("\n✓ All pages have all required keys with content!")

print(f"\nTotal pages checked: {len(pages)}")
