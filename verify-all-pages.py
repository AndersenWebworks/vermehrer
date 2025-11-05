#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Verify all page JSON content against markdown source files.
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

def parse_markdown(md_file):
    """Parse markdown file to extract expected content."""
    with open(md_file, 'r', encoding='utf-8') as f:
        content = f.read()

    # Extract key content snippets for verification
    snippets = {}

    # Header title (usually after "Sektions-Titel:" or similar)
    header_match = re.search(r'\*\*(?:Sektions-)?Titel:\*\*\s*["\']([^"\']+)["\']', content)
    if header_match:
        snippets['header-titel'] = header_match.group(1)

    # Untertitel
    untertitel_match = re.search(r'\*\*Untertitel:\*\*\s*["\']([^"\']+)["\']', content)
    if untertitel_match:
        snippets['untertitel'] = untertitel_match.group(1)

    # Hero-Titel
    hero_match = re.search(r'\*\*Hero[- ]Titel:\*\*\s*["\']([^"\']+)["\']', content)
    if hero_match:
        snippets['hero-titel'] = hero_match.group(1)

    # Einleitungstext
    einleitung_match = re.search(r'\*\*Einleitungstext:\*\*\s*["\'](.+?)["\']', content, re.DOTALL)
    if einleitung_match:
        text = einleitung_match.group(1).strip()
        # Clean up line breaks
        text = re.sub(r'\s+', ' ', text)
        snippets['einleitungstext'] = text

    return snippets

# Pages to verify
pages = [
    ('tierliebe-start', 'page-tierliebe-home.md'),
    ('tierliebe-test', 'page-tierliebe-test.md'),
    ('tierliebe-hunde', 'page-tierliebe-hunde.md'),
    ('tierliebe-katzen', 'page-tierliebe-katzen.md'),
    ('tierliebe-kleintiere', 'page-tierliebe-kleintiere.md'),
    ('tierliebe-exoten', 'page-tierliebe-exoten.md'),
    ('tierliebe-adoption', 'page-tierliebe-adoption.md'),
    ('tierliebe-qualzucht', 'page-tierliebe-qualzucht.md'),
    ('tierliebe-wissen', 'page-tierliebe-wissen.md'),
    ('tierliebe-kontakt', 'page-tierliebe-kontakt.md'),
    ('tierliebe-mythen', 'page-tierliebe-irrtuemer.md'),
]

print("=== Verifying all pages against markdown sources ===\n")

issues = []

for slug, md_file in pages:
    print(f"Checking {slug}...")

    # Get page JSON
    page_json = get_page_json(slug)
    if not page_json:
        print(f"  ✗ No valid JSON found")
        issues.append((slug, "No JSON content"))
        continue

    print(f"  ✓ JSON valid ({len(page_json)} keys)")

    # Parse markdown
    md_path = Path('texte') / md_file
    if not md_path.exists():
        print(f"  ⚠ Markdown file not found: {md_file}")
        continue

    expected = parse_markdown(md_path)

    # Verify key fields
    mismatches = []
    for key, expected_value in expected.items():
        if key not in page_json:
            mismatches.append(f"Missing key: {key}")
        else:
            actual_value = page_json[key]
            # Strip HTML tags and normalize whitespace for comparison
            actual_clean = re.sub(r'<[^>]+>', '', actual_value)
            actual_clean = re.sub(r'\s+', ' ', actual_clean.strip())
            expected_clean = re.sub(r'\s+', ' ', expected_value.strip())

            if actual_clean != expected_clean:
                mismatches.append(f"{key}: Content differs")
                print(f"    ⚠ {key}:")
                print(f"      Expected: {expected_clean[:80]}...")
                print(f"      Actual:   {actual_clean[:80]}...")

    if mismatches:
        issues.append((slug, mismatches))
        print(f"  ⚠ {len(mismatches)} mismatches found")
    else:
        print(f"  ✓ All checked fields match")

    print()

# Summary
print("=" * 60)
print("VERIFICATION SUMMARY")
print("=" * 60)

if issues:
    print(f"\n⚠ {len(issues)} pages have issues:\n")
    for slug, issue_list in issues:
        print(f"  {slug}:")
        if isinstance(issue_list, str):
            print(f"    - {issue_list}")
        else:
            for issue in issue_list:
                print(f"    - {issue}")
else:
    print("\n✓ All pages verified successfully!")

print(f"\nTotal pages checked: {len(pages)}")
