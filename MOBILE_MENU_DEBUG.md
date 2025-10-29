# Mobile Menu Z-Index Debugging

## Problem
Der Backdrop liegt IMMER über dem Menu, egal welche z-index Werte gesetzt werden.

## Alle bisherigen Versuche:

### Version 4.0.1
- Backdrop: 998, Menu: 1001, Toggle: 1002
- **Ergebnis:** Backdrop über Menu

### Version 4.0.2
- Backdrop: 998, Menu: 1001, Toggle: 1002, pointer-events entfernt
- **Ergebnis:** Backdrop über Menu

### Version 4.0.3
- Backdrop: right: 300px (nur linker Bereich)
- **Ergebnis:** Backdrop zu schmal

### Version 4.0.4
- Backdrop: 900, Menu: 1001, Toggle: 1002, volle Breite
- **Ergebnis:** Backdrop über Menu

### Version 4.0.5
- Header: 1100, Backdrop: 1099, Menu: 1101, Toggle: 1102
- **Ergebnis:** Backdrop über Menu

### Version 4.0.6
- Header: 1050, Backdrop: 1100, Menu: 1101, Toggle: 1102
- **Ergebnis:** Backdrop über Menu

### Version 4.0.7
- Menu z-index global gesetzt (nicht nur Mobile)
- Header: 1050, Backdrop: 1100, Menu: 1101, Toggle: 1102
- **Ergebnis:** Backdrop über Menu

### Version 4.1.0 (CURRENT)
- Header: 1050, Backdrop: 1098, Menu: 1099, Toggle: 1100
- **Ergebnis:** Backdrop IMMER NOCH über Menu

## Hypothesen warum es nicht funktioniert:

1. **CSS Spezifität Problem?**
   - Backdrop: `body.menu-open::before`
   - Menu: `.main-nav`
   - Beide haben klare z-index Werte

2. **Stacking Context Problem?**
   - Header: `position: sticky, z-index: 1050`
   - Menu: `position: fixed` (im Mobile) - bricht aus Header aus
   - Backdrop: `position: fixed` auf body - eigener Context
   - **Sollte eigentlich funktionieren!**

3. **CSS wird nicht geladen?**
   - Version in functions.php synchronisiert: 4.1.0
   - CSS hochgeladen via FTP

4. **Browser Cache?**
   - Hard-Refresh nötig?
   - CSS-Version-Parameter sollte Cache brechen

5. **JavaScript Problem?**
   - `.active` Klasse wird nicht gesetzt?
   - `.menu-open` Klasse wird nicht auf body gesetzt?

## Nächste Debugging-Schritte:

1. **Browser DevTools prüfen:**
   - Welcher z-index wird tatsächlich computed?
   - Ist `.menu-open` Klasse auf body?
   - Ist `.active` Klasse auf `.main-nav`?
   - Existiert `body.menu-open::before` im DOM?

2. **CSS Override prüfen:**
   - Gibt es andere CSS-Dateien die z-index überschreiben?
   - WordPress/YOOtheme Styles?

3. **Alternative Lösung:**
   - Menu als direktes Child von body rendern (nicht im Header)
   - Backdrop mit `pointer-events: none` außer auf linkem Bereich
   - Backdrop als separates Element statt ::before

## Wichtige Erkenntnis:

**Das Menu ist ein CHILD des Headers im DOM!**
Wenn der Header `position: sticky` hat, könnte das Menu trotz `position: fixed`
im Header-Stacking-Context gefangen sein.

**Test benötigt:** Menu im HTML aus dem Header rausnehmen und direkt in body platzieren.
