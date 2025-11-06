# -*- coding: utf-8 -*-
import requests
from requests.auth import HTTPBasicAuth
import json

print("[1] Hole WordPress Post 617...")
r = requests.get(
    "https://vm.andersen-webworks.de/wp-json/wp/v2/tierliebe_text/617",
    auth=HTTPBasicAuth("EAndersen", "m0jD Ot5r 4ISS byni rJvm dbZQ")
)

if r.status_code != 200:
    print(f"[!] Error {r.status_code}")
    exit(1)

post = r.json()
print(f"[OK] Post geladen - Modified: {post['modified']}")

# Speichere rohen HTML-Content
with open("wp-content-raw.html", "w", encoding="utf-8") as f:
    f.write(post['content']['rendered'])
print("[OK] Raw HTML gespeichert in wp-content-raw.html")

# Versuche JSON zu extrahieren
content_html = post['content']['rendered']
print(f"\n[DEBUG] Content length: {len(content_html)} chars")
print(f"[DEBUG] Starts with: {content_html[:200]}")

# Suche nach JSON
if '{' in content_html:
    json_start = content_html.find('{')
    json_end = content_html.rfind('}') + 1
    print(f"[DEBUG] JSON found at positions {json_start} to {json_end}")

    json_part = content_html[json_start:json_end]
    with open("wp-content-json-raw.txt", "w", encoding="utf-8") as f:
        f.write(json_part)
    print("[OK] Raw JSON gespeichert in wp-content-json-raw.txt")

    # Versuche zu parsen
    import html
    json_decoded = html.unescape(json_part)
    with open("wp-content-json-decoded.txt", "w", encoding="utf-8") as f:
        f.write(json_decoded)
    print("[OK] Decoded JSON gespeichert in wp-content-json-decoded.txt")

    try:
        obj = json.loads(json_decoded)
        print(f"\n[OK] JSON erfolgreich geparst! {len(obj)} Felder")
        print("\n[CHECK] Kritische Felder:")
        print(f"  vergleich-frage: {obj.get('vergleich-frage', 'MISSING')[:80]}")
        print(f"  panel-adoption-quote: {obj.get('panel-adoption-quote', 'MISSING')[:80]}")
    except Exception as e:
        print(f"\n[!] JSON Parse Error: {e}")
        print(f"[DEBUG] First 500 chars:")
        print(json_decoded[:500])
else:
    print("[!] Kein JSON im Content gefunden!")
