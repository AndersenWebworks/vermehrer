#!/usr/bin/env python3
"""
Check all templates for hardcoded content that should come from CPT.
Reports all instances of text that is not wrapped in PHP output.
"""

import re
import os
import glob

def check_hardcoded_content(filepath):
    """Check a template file for hardcoded content."""

    with open(filepath, 'r', encoding='utf-8') as f:
        lines = f.readlines()

    issues = []

    for line_num, line in enumerate(lines, start=1):
        # Skip lines that are comments or PHP-only
        if line.strip().startswith('<!--') or line.strip().startswith('//') or line.strip().startswith('<?php'):
            continue

        # Check for hardcoded list items
        if '<li>' in line and '<?php' not in line:
            issues.append(f"Line {line_num}: Hardcoded <li> element")

        # Check for hardcoded div/span with text content
        match = re.search(r'<(div|span)[^>]*class="(?!.*editable)[^"]*"[^>]*>([^<]+)', line)
        if match and len(match.group(2).strip()) > 5:  # Ignore very short strings
            if not match.group(2).strip().startswith('<?php'):
                issues.append(f"Line {line_num}: Hardcoded text in {match.group(1)}: {match.group(2)[:50]}")

    return issues

def main():
    template_dir = "webworks-theme"
    pattern = os.path.join(template_dir, "page-tierliebe-*.php")
    templates = glob.glob(pattern)

    print(f"Checking {len(templates)} templates for hardcoded content...\n")

    total_issues = 0
    for template in sorted(templates):
        issues = check_hardcoded_content(template)
        if issues:
            print(f"\n{template}:")
            for issue in issues:
                print(f"  {issue}")
            total_issues += len(issues)

    if total_issues == 0:
        print("\n[OK] No hardcoded content found!")
    else:
        print(f"\n[WARNING] Found {total_issues} instances of hardcoded content")

if __name__ == "__main__":
    main()
