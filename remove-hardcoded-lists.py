#!/usr/bin/env python3
"""
Remove all hardcoded <li> elements from editable lists in Tierliebe templates.
Replaces hardcoded list items with PHP code to load from CPT.
"""

import re
import os
import glob

def remove_hardcoded_lists(content):
    """Remove hardcoded <li> elements from editable <ul> tags."""

    # Pattern: Find <ul class="editable" data-key="X"> with hardcoded <li> items
    # Replace all <li>...</li> inside with <?php echo wp_kses_post($content['X'] ?? ''); ?>
    pattern = r'(<ul[^>]*class="[^"]*editable[^"]*"[^>]*data-key="([^"]+)"[^>]*>)\s*(?:<li>.*?</li>\s*)+\s*(</ul>)'

    def replacer(match):
        opening_ul = match.group(1)
        data_key = match.group(2)
        closing_ul = match.group(3)

        return f"{opening_ul}\n            <?php echo wp_kses_post($content['{data_key}'] ?? ''); ?>\n        {closing_ul}"

    content = re.sub(pattern, replacer, content, flags=re.DOTALL)

    return content

def process_template(filepath):
    """Process a single template file."""
    print(f"Processing: {filepath}")

    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    original_content = content
    content = remove_hardcoded_lists(content)

    if content != original_content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"  [OK] Hardcoded lists removed")
        return True
    else:
        print(f"  [SKIP] No hardcoded lists found")
        return False

def main():
    template_dir = "webworks-theme"
    pattern = os.path.join(template_dir, "page-tierliebe-*.php")
    templates = glob.glob(pattern)

    print(f"Found {len(templates)} templates\n")

    modified_count = 0
    for template in sorted(templates):
        if process_template(template):
            modified_count += 1

    print(f"\n{modified_count}/{len(templates)} templates modified")

if __name__ == "__main__":
    main()
