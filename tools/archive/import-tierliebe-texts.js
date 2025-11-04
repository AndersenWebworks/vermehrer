const fs = require('fs');
const https = require('https');

// WordPress Credentials
const WP_URL = 'https://vm.andersen-webworks.de';
const WP_USER = 'EAndersen';
const WP_APP_PASSWORD = 'm0jDOt5r4ISSbynirJvmdbZQ'; // Spaces removed

// Read the markdown file
const markdownPath = './texte/page-tierliebe-home.md';
const markdownContent = fs.readFileSync(markdownPath, 'utf8');

console.log('✓ Markdown geladen (' + markdownContent.length + ' Zeichen)');

// Prepare post data
const postData = JSON.stringify({
    title: 'Tierliebe - Home',
    content: markdownContent,
    status: 'publish',
    slug: 'tierliebe-home',
    type: 'tierliebe_text'
});

// WordPress REST API endpoint
const options = {
    hostname: 'vm.andersen-webworks.de',
    path: '/wp-json/wp/v2/tierliebe_text',
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Content-Length': Buffer.byteLength(postData),
        'Authorization': 'Basic ' + Buffer.from(WP_USER + ':' + WP_APP_PASSWORD).toString('base64')
    }
};

console.log('\nVerbinde mit WordPress...');

const req = https.request(options, (res) => {
    let data = '';

    res.on('data', (chunk) => {
        data += chunk;
    });

    res.on('end', () => {
        console.log('\nStatus Code:', res.statusCode);

        if (res.statusCode === 201) {
            const response = JSON.parse(data);
            console.log('✓ Text erfolgreich importiert!');
            console.log('Post ID:', response.id);
            console.log('Slug:', response.slug);
            console.log('URL:', response.link);
        } else {
            console.log('Fehler beim Import:');
            console.log(data);
        }
    });
});

req.on('error', (error) => {
    console.error('Connection Error:', error.message);
});

req.write(postData);
req.end();
