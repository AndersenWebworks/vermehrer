$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host '=== ROLLBACK ZU FUNKTIONIERENDEM STAND ===' -ForegroundColor Cyan
Write-Host ''

# Restore alte tierliebe-edit.js (v1.0 ohne WYSIWYG)
Write-Host 'Upload 1/2: tierliebe-edit.js (v1.0 - einfach)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-edit.js', 'webworks-theme/js/tierliebe-edit.js')

# Restore functions.php ohne JSON-Format
Write-Host 'Upload 2/2: functions.php (ohne WYSIWYG-Komplexitaet)' -ForegroundColor Yellow

# Erstelle temporäre simple functions.php Version
$simpleFunctionsContent = @'
// AJAX Handler anpassen - zurück auf einfaches wp_kses_post
'@

# Wir nutzen die alte Version
$wc.UploadFile($ftpServer + $base + 'functions.php', 'webworks-theme/functions.php')

Write-Host ''
Write-Host 'Fertig - Rollback abgeschlossen!' -ForegroundColor Green
Write-Host ''
Write-Host 'Cache loeschen:' -ForegroundColor Cyan
Write-Host 'https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/clear-cache.php' -ForegroundColor Yellow
