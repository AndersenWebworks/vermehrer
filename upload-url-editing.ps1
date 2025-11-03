$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host '=== URL-EDITING FEATURE ===' -ForegroundColor Cyan
Write-Host ''

Write-Host 'Upload 1/2: page-tierliebe-home.php (mit URL-Editing)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-home.php', 'webworks-theme/page-tierliebe-home.php')

Write-Host 'Upload 2/2: tierliebe-edit.js (Rechtsklick fuer URLs)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-edit.js', 'webworks-theme/js/tierliebe-edit.js')

Write-Host ''
Write-Host 'Fertig!' -ForegroundColor Green
Write-Host ''
Write-Host 'SO FUNKTIONIERT ES:' -ForegroundColor Cyan
Write-Host '1. Edit-Mode aktivieren' -ForegroundColor White
Write-Host '2. RECHTSKLICK auf Button/Link' -ForegroundColor Yellow
Write-Host '3. URL im Prompt aendern' -ForegroundColor White
Write-Host '4. Speichern' -ForegroundColor White
Write-Host ''
Write-Host 'Cache loeschen und testen!' -ForegroundColor Yellow
