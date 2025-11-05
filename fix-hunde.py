import requests, json, html, re

s = requests.Session()
s.auth = ('EAndersen', 'm0jD Ot5r 4ISS byni rJvm dbZQ')

# Get CPT content
r = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/tierliebe_text/623', params={'context': 'edit'})
content = html.unescape(r.json()['content']['raw'])

# Manual fixes for known issues
fixes = [
    ('"mythos1-header":"🐕 Mythos 1: "Hunde können', '"mythos1-header":"🐕 Mythos 1: \\"Hunde können'),
    ('Stunden allein sein – Hauptsache, sie', 'Stunden allein sein - Hauptsache, sie'),  # Replace problematic dash
]

for old, new in fixes:
    content = content.replace(old, new)

try:
    data = json.loads(content)
    print(f'✓ JSON fixed: {len(data)} keys')
   
    # Update page
    r2 = s.get('https://vm.andersen-webworks.de/wp-json/wp/v2/pages', params={'slug': 'tierliebe-hunde'})
    page_id = r2.json()[0]['id']
    r3 = s.post(f'https://vm.andersen-webworks.de/wp-json/wp/v2/pages/{page_id}', json={'content': json.dumps(data, ensure_ascii=False)})
    print(f'✓ Updated page {page_id}: {r3.status_code}')
except json.JSONDecodeError as e:
    print(f'✗ Still invalid: {e}')
    print(f'Error at pos {e.pos}: ...{content[max(0,e.pos-30):e.pos+30]}...')
