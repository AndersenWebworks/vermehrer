const mysql = require('mysql2/promise');
const fs = require('fs');

// DB Config
const dbConfig = {
    host: 'w018c99c.kasserver.com',
    user: 'd0435109',
    password: 'kvXc2VmwxheamdqsSNE2',
    database: 'd0435109'
};

// Read markdown
const markdownPath = './texte/page-tierliebe-home.md';
const markdownContent = fs.readFileSync(markdownPath, 'utf8');

console.log('✓ Markdown geladen (' + markdownContent.length + ' Zeichen)');

async function importText() {
    let connection;

    try {
        connection = await mysql.createConnection(dbConfig);
        console.log('✓ DB-Verbindung erfolgreich');

        // Get table prefix
        const [rows] = await connection.execute(
            "SELECT SUBSTRING_INDEX(TABLE_NAME, 'posts', 1) AS prefix FROM information_schema.TABLES WHERE TABLE_SCHEMA = ? AND TABLE_NAME LIKE '%posts' LIMIT 1",
            [dbConfig.database]
        );

        const prefix = rows[0]?.prefix || 'wp_';
        console.log('✓ Table Prefix:', prefix);

        // Check if post already exists
        const [existing] = await connection.execute(
            `SELECT ID FROM ${prefix}posts WHERE post_name = ? AND post_type = ?`,
            ['tierliebe-home', 'tierliebe_text']
        );

        if (existing.length > 0) {
            // Update existing
            const postId = existing[0].ID;
            await connection.execute(
                `UPDATE ${prefix}posts SET post_content = ?, post_modified = NOW(), post_modified_gmt = UTC_TIMESTAMP() WHERE ID = ?`,
                [markdownContent, postId]
            );
            console.log('✓ Text aktualisiert (ID: ' + postId + ')');
        } else {
            // Insert new
            const now = new Date().toISOString().slice(0, 19).replace('T', ' ');

            await connection.execute(
                `INSERT INTO ${prefix}posts (
                    post_author,
                    post_date,
                    post_date_gmt,
                    post_content,
                    post_title,
                    post_status,
                    post_name,
                    post_type,
                    post_modified,
                    post_modified_gmt
                ) VALUES (1, NOW(), UTC_TIMESTAMP(), ?, ?, 'publish', ?, 'tierliebe_text', NOW(), UTC_TIMESTAMP())`,
                [markdownContent, 'Tierliebe - Home', 'tierliebe-home']
            );

            console.log('✓ Text erfolgreich importiert');
        }

    } catch (error) {
        console.error('Fehler:', error.message);
    } finally {
        if (connection) {
            await connection.end();
        }
    }
}

importText();
