#!/usr/bin/env python3
"""
Migrate Tierliebe CPT content to Page post_content via WordPress REST API.
Uses Application Password for authentication.
"""

import requests
import json
import html

# Configuration
WORDPRESS_URL = "https://vm.andersen-webworks.de"
USERNAME = "EAndersen"
APP_PASSWORD = "m0jD Ot5r 4ISS byni rJvm dbZQ"

# Create session with auth
session = requests.Session()
session.auth = (USERNAME, APP_PASSWORD)
session.headers.update({
    'Content-Type': 'application/json',
    'Accept': 'application/json'
})

def get_cpt_posts():
    """Get all tierliebe_text CPT posts."""
    url = f"{WORDPRESS_URL}/wp-json/wp/v2/tierliebe_text"
    params = {'per_page': 100, 'status': 'publish', 'context': 'edit'}  # context=edit gives raw content

    response = session.get(url, params=params)

    if response.status_code == 200:
        return response.json()
    else:
        print(f"Error fetching CPT posts: {response.status_code}")
        print(response.text)
        return []

def get_page_by_slug(slug):
    """Find page by slug."""
    url = f"{WORDPRESS_URL}/wp-json/wp/v2/pages"
    params = {'slug': slug, 'per_page': 1}

    response = session.get(url, params=params)

    if response.status_code == 200:
        pages = response.json()
        return pages[0] if pages else None
    else:
        print(f"Error fetching page: {response.status_code}")
        return None

def update_page_content(page_id, content):
    """Update page post_content."""
    url = f"{WORDPRESS_URL}/wp-json/wp/v2/pages/{page_id}"

    data = {
        'content': content
    }

    response = session.post(url, json=data)

    if response.status_code == 200:
        return True
    else:
        print(f"Error updating page: {response.status_code}")
        print(response.text)
        return False

def clear_transients():
    """Clear all tierliebe transients via URL trigger."""
    url = f"{WORDPRESS_URL}/wp-admin/?tierliebe_clear_cache=1"
    try:
        session.get(url)
        print("\n[OK] Cache clear triggered")
    except Exception as e:
        print(f"\n[WARNING] Could not clear cache: {e}")

def migrate():
    """Perform migration."""
    print("=== Tierliebe CPT -> Page Content Migration ===")
    print(f"WordPress: {WORDPRESS_URL}")
    print(f"User: {USERNAME}\n")

    # Get all CPT posts
    cpt_posts = get_cpt_posts()

    if not cpt_posts:
        print("No CPT posts found!")
        return

    print(f"Found {len(cpt_posts)} CPT posts\n")

    migrated = 0
    skipped = 0

    for cpt_post in cpt_posts:
        cpt_id = cpt_post['id']
        cpt_slug = cpt_post['slug']
        # Use 'raw' content instead of 'rendered'
        cpt_content_raw = cpt_post['content']['raw'] if 'raw' in cpt_post['content'] else cpt_post['content']['rendered']

        print(f"Processing CPT: {cpt_slug} (ID: {cpt_id})")

        # Clean content if needed
        cpt_content = html.unescape(cpt_content_raw)
        # Only strip tags if it's rendered content
        if cpt_content.startswith('<'):
            cpt_content = cpt_content.replace('<p>', '').replace('</p>', '').strip()

        # Validate JSON
        try:
            json_data = json.loads(cpt_content)
            print(f"  JSON valid ({len(json_data)} keys)")
        except json.JSONDecodeError as e:
            print(f"  [ERROR] Invalid JSON: {e}")
            skipped += 1
            continue

        # Find corresponding page (pages have 'tierliebe-' prefix)
        # Special mappings
        slug_mapping = {
            'tierliebe-home': 'tierliebe-start',
            'irrtuemer': 'tierliebe-mythen'
        }

        if cpt_slug in slug_mapping:
            page_slug = slug_mapping[cpt_slug]
        elif cpt_slug.startswith('tierliebe-'):
            page_slug = cpt_slug
        else:
            page_slug = f'tierliebe-{cpt_slug}'

        page = get_page_by_slug(page_slug)

        if not page:
            print(f"  [SKIP] No page found with slug '{page_slug}'\n")
            skipped += 1
            continue

        page_id = page['id']
        page_content = page['content']['rendered']

        # Check if page already has content
        if page_content and len(page_content.strip()) > 50:
            print(f"  [WARNING] Page already has content ({len(page_content)} chars)")
            print(f"  [INFO] Overwriting with CPT content (migration already done, skipping)")
            # Auto-skip if already migrated
            skipped += 1
            continue

        # Update page
        if update_page_content(page_id, cpt_content):
            print(f"  [SUCCESS] Migrated to Page ID {page_id}\n")
            migrated += 1
        else:
            print(f"  [ERROR] Failed to update page\n")
            skipped += 1

    print("=" * 50)
    print(f"Migration complete:")
    print(f"  - Migrated: {migrated}")
    print(f"  - Skipped: {skipped}")
    print(f"  - Total: {len(cpt_posts)}")

    if migrated > 0:
        clear_transients()

if __name__ == "__main__":
    import sys

    # Check for --force flag to skip confirmation
    if '--force' not in sys.argv:
        print("\n!!! WARNING !!!")
        print("This will overwrite page post_content with CPT content.")
        print("\nRun with --force to execute without confirmation.")
        print("\nExample: python migrate-cpt-to-pages-api.py --force")
        sys.exit(0)

    migrate()
