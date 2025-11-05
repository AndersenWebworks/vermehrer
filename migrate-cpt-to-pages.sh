#!/bin/bash
# Migrate Tierliebe CPT content to Page post_content via WP-CLI

echo "=== Tierliebe CPT → Page Content Migration ==="
echo ""

# Get all tierliebe_text CPT posts
CPT_POSTS=$(wp post list --post_type=tierliebe_text --format=ids --allow-root)

if [ -z "$CPT_POSTS" ]; then
    echo "No CPT posts found!"
    exit 1
fi

echo "Found CPT posts: $CPT_POSTS"
echo ""

MIGRATED=0
SKIPPED=0

for CPT_ID in $CPT_POSTS; do
    # Get CPT post slug and content
    CPT_SLUG=$(wp post get $CPT_ID --field=post_name --allow-root)
    CPT_CONTENT=$(wp post get $CPT_ID --field=post_content --allow-root)

    echo "Processing CPT: $CPT_SLUG (ID: $CPT_ID)"

    # Find corresponding page by slug
    PAGE_ID=$(wp post list --post_type=page --name="$CPT_SLUG" --format=ids --allow-root)

    if [ -z "$PAGE_ID" ]; then
        echo "  [SKIP] No page found with slug '$CPT_SLUG'"
        echo ""
        ((SKIPPED++))
        continue
    fi

    # Get current page content
    PAGE_CONTENT=$(wp post get $PAGE_ID --field=post_content --allow-root)

    if [ ! -z "$PAGE_CONTENT" ] && [ ${#PAGE_CONTENT} -gt 10 ]; then
        echo "  [WARNING] Page already has content (${#PAGE_CONTENT} chars)"
        echo "  Current content: ${PAGE_CONTENT:0:50}..."
        echo -n "  Overwrite? (y/n): "
        read -r CHOICE
        if [ "$CHOICE" != "y" ]; then
            echo "  [SKIP] User chose not to overwrite"
            echo ""
            ((SKIPPED++))
            continue
        fi
    fi

    # Update page with CPT content
    wp post update $PAGE_ID --post_content="$CPT_CONTENT" --allow-root

    if [ $? -eq 0 ]; then
        echo "  [SUCCESS] Migrated to Page ID $PAGE_ID ($CPT_SLUG)"
        ((MIGRATED++))
    else
        echo "  [ERROR] Failed to update page"
        ((SKIPPED++))
    fi

    echo ""
done

echo "=================================================="
echo "Migration complete:"
echo "  - Migrated: $MIGRATED"
echo "  - Skipped: $SKIPPED"
echo ""
echo "Clear caches: wp transient delete --all --allow-root"
