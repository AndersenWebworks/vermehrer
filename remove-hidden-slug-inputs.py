#!/usr/bin/env python3
"""
Remove hidden tierliebe-page-slug inputs from all templates.
They are no longer needed as JS extracts slug from URL.
"""

import re
import os
import glob

def remove_hidden_slug_input(content):
    """Remove the hidden input field for page slug."""

    # Pattern: <input type="hidden" id="tierliebe-page-slug" value="...">
    # May be wrapped in PHP condition or standalone
    patterns = [
        # Pattern 1: PHP wrapped
        r'<\?php\s+if\s*\([^)]*\)\s*\{\s*echo\s*\'<input[^>]*id="tierliebe-page-slug"[^>]*>\';\s*\}\s*\?>',
        # Pattern 2: Direct echo
        r'<\?php\s+echo\s+\'<input[^>]*id="tierliebe-page-slug"[^>]*>\';\s*\?>',
        # Pattern 3: Plain HTML
        r'<input[^>]*id="tierliebe-page-slug"[^>]*>',
        # Pattern 4: Multi-line PHP condition
        r'<\?php\s*\n\s*if\s*\([^)]*\)\s*\{\s*\n?\s*echo\s*\'<input[^>]*id="tierliebe-page-slug"[^>]*>\';\s*\n?\s*\}\s*\n?\s*\?>',
    ]

    for pattern in patterns:
        content = re.sub(pattern, '', content, flags=re.MULTILINE | re.DOTALL)

    # Also remove standalone lines with just the input
    content = re.sub(r'^\s*<input[^>]*id="tierliebe-page-slug"[^>]*>\s*$', '', content, flags=re.MULTILINE)

    return content

def process_template(filepath):
    """Process a single template file."""
    print(f"Processing: {filepath}")

    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    original_content = content
    content = remove_hidden_slug_input(content)

    if content != original_content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"  [OK] Hidden input removed")
        return True
    else:
        print(f"  [SKIP] No hidden input found")
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
