#!/usr/bin/env python3
"""
Remove all fallback texts from Tierliebe templates.
Replaces: <?php echo isset($content['key']) ? wp_kses_post($content['key']) : 'fallback'; ?>
With:     <?php echo wp_kses_post($content['key'] ?? ''); ?>
"""

import re
import os
import glob

def remove_fallbacks(content):
    """Remove fallback texts from PHP template content."""

    # Pattern 1: isset with wp_kses_post
    # <?php echo isset($content['key']) ? wp_kses_post($content['key']) : 'fallback'; ?>
    pattern1 = r"<\?php echo isset\(\$content\['([^']+)'\]\) \? wp_kses_post\(\$content\['\1'\]\) : '([^']*?)'; \?>"
    replacement1 = r"<?php echo wp_kses_post($content['\1'] ?? ''); ?>"
    content = re.sub(pattern1, replacement1, content)

    # Pattern 2: isset with wp_kses_post (double quotes in fallback)
    pattern2 = r'<\?php echo isset\(\$content\[\'([^\']+)\'\]\) \? wp_kses_post\(\$content\[\'\1\'\]\) : "([^"]*?)"; \?>'
    replacement2 = r"<?php echo wp_kses_post($content['\1'] ?? ''); ?>"
    content = re.sub(pattern2, replacement2, content)

    # Pattern 3: isset with wp_kses_post (multiline fallbacks)
    pattern3 = r"<\?php echo isset\(\$content\['([^']+)'\]\) \? wp_kses_post\(\$content\['\1'\]\) : '([^;]*?)'; \?>"
    replacement3 = r"<?php echo wp_kses_post($content['\1'] ?? ''); ?>"
    content = re.sub(pattern3, replacement3, content, flags=re.DOTALL)

    # Pattern 4: isset with esc_html
    pattern4 = r"<\?php echo isset\(\$content\['([^']+)'\]\) \? esc_html\(\$content\['\1'\]\) : '([^']*?)'; \?>"
    replacement4 = r"<?php echo esc_html($content['\1'] ?? ''); ?>"
    content = re.sub(pattern4, replacement4, content)

    # Pattern 5: isset with esc_url
    pattern5 = r'<\?php echo isset\(\$content\[\'([^\']+)\'\]\) \? esc_url\(\$content\[\'\1\'\]\) : \'([^\']*?)\'; \?>'
    replacement5 = r"<?php echo esc_url($content['\1'] ?? ''); ?>"
    content = re.sub(pattern5, replacement5, content)

    # Pattern 6: isset with esc_html(strip_tags())
    pattern6 = r"<\?php echo isset\(\$content\['([^']+)'\]\) \? esc_html\(strip_tags\(\$content\['\1'\]\)\) : '([^']*?)'; \?>"
    replacement6 = r"<?php echo esc_html(strip_tags($content['\1'] ?? '')); ?>"
    content = re.sub(pattern6, replacement6, content)

    return content

def process_template(filepath):
    """Process a single template file."""
    print(f"Processing: {filepath}")

    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    original_content = content
    content = remove_fallbacks(content)

    if content != original_content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"  [OK] Fallbacks removed")
        return True
    else:
        print(f"  [SKIP] No changes needed")
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
