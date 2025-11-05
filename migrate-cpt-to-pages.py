#!/usr/bin/env python3
"""
Migrate Tierliebe CPT content to Page post_content.
Copies JSON from tierliebe_text CPT posts to corresponding pages.
"""

import mysql.connector
import json
import html

# Database configuration
DB_CONFIG = {
    'host': 'localhost',
    'user': 'your_db_user',
    'password': 'your_db_password',
    'database': 'your_db_name'
}

def get_db_connection():
    """Create database connection."""
    return mysql.connector.connect(**DB_CONFIG)

def migrate_content():
    """Migrate content from CPT to Pages."""
    conn = get_db_connection()
    cursor = conn.cursor(dictionary=True)

    print("=== Tierliebe CPT → Page Content Migration ===\n")

    # Find all tierliebe_text CPT posts
    cursor.execute("""
        SELECT ID, post_name, post_content
        FROM wp_posts
        WHERE post_type = 'tierliebe_text'
        AND post_status = 'publish'
    """)

    cpt_posts = cursor.fetchall()
    print(f"Found {len(cpt_posts)} CPT posts\n")

    migrated_count = 0
    skipped_count = 0

    for cpt_post in cpt_posts:
        cpt_id = cpt_post['ID']
        cpt_slug = cpt_post['post_name']
        cpt_content = cpt_post['post_content']

        print(f"Processing CPT: {cpt_slug} (ID: {cpt_id})")

        # Find corresponding page by slug
        cursor.execute("""
            SELECT ID, post_name, post_content
            FROM wp_posts
            WHERE post_type = 'page'
            AND post_name = %s
            AND post_status IN ('publish', 'draft')
        """, (cpt_slug,))

        page = cursor.fetchone()

        if not page:
            print(f"  [SKIP] No page found with slug '{cpt_slug}'\n")
            skipped_count += 1
            continue

        page_id = page['ID']
        page_slug = page['post_name']
        page_content = page['post_content']

        # Check if page already has content
        if page_content and len(page_content.strip()) > 10:
            print(f"  [WARNING] Page already has content ({len(page_content)} chars)")
            print(f"  Overwrite? (y/n): ", end='')
            choice = input().strip().lower()
            if choice != 'y':
                print(f"  [SKIP] User chose not to overwrite\n")
                skipped_count += 1
                continue

        # Clean CPT content (decode HTML entities, strip tags)
        clean_content = html.unescape(cpt_content)
        clean_content = clean_content.replace('<p>', '').replace('</p>', '')

        # Validate JSON
        try:
            json_data = json.loads(clean_content)
            print(f"  [OK] JSON valid ({len(json_data)} keys)")
        except json.JSONDecodeError as e:
            print(f"  [ERROR] Invalid JSON: {e}")
            skipped_count += 1
            continue

        # Update page with CPT content
        cursor.execute("""
            UPDATE wp_posts
            SET post_content = %s
            WHERE ID = %s
        """, (clean_content, page_id))

        conn.commit()

        print(f"  [SUCCESS] Migrated to Page ID {page_id} ({page_slug})\n")
        migrated_count += 1

    cursor.close()
    conn.close()

    print("=" * 50)
    print(f"Migration complete:")
    print(f"  - Migrated: {migrated_count}")
    print(f"  - Skipped: {skipped_count}")
    print(f"  - Total: {len(cpt_posts)}")

if __name__ == "__main__":
    print("\n!!! WARNING !!!")
    print("This will overwrite page post_content with CPT content.")
    print("Make sure you have a database backup before continuing.")
    print("\nAlso update DB_CONFIG with your database credentials first!")
    print("\nContinue? (yes/no): ", end='')

    choice = input().strip().lower()
    if choice == 'yes':
        migrate_content()
    else:
        print("Migration cancelled.")
