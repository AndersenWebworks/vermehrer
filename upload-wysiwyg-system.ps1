$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host '=== TIERLIEBE WYSIWYG SYSTEM UPLOAD ===' -ForegroundColor Cyan
Write-Host ''

Write-Host 'Upload 1/5: functions.php (erweiterte Markdown-Konvertierung)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'functions.php', 'webworks-theme/functions.php')

Write-Host 'Upload 2/5: tierliebe-edit.css (mit Toolbar-Styling)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'css/tierliebe-edit.css', 'webworks-theme/css/tierliebe-edit.css')

Write-Host 'Upload 3/5: tierliebe-edit-v2.js (WYSIWYG Editor)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-edit-v2.js', 'webworks-theme/js/tierliebe-edit-v2.js')

Write-Host 'Upload 4/5: page-tierliebe-home.php (dynamische Version)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-home.php', 'webworks-theme/page-tierliebe-home-NEW.php')

Write-Host 'Upload 5/5: import-all-tierliebe-texts.php (Import-Skript)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'import-all-tierliebe-texts.php', 'webworks-theme/import-all-tierliebe-texts.php')

Write-Host ''
Write-Host 'Fertig! Alle Dateien hochgeladen!' -ForegroundColor Green
Write-Host ''
Write-Host 'NEXT STEPS:' -ForegroundColor Cyan
Write-Host '1. Import-Skript ausfuehren:' -ForegroundColor White
Write-Host '   https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/import-all-tierliebe-texts.php' -ForegroundColor Yellow
Write-Host ''
Write-Host '2. Cache loeschen:' -ForegroundColor White
Write-Host '   https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/clear-cache.php' -ForegroundColor Yellow
Write-Host ''
Write-Host '3. Testen auf der Home-Seite:' -ForegroundColor White
Write-Host '   https://vm.andersen-webworks.de/tierliebe-home' -ForegroundColor Yellow
Write-Host ''
Write-Host '4. Edit-Button links klicken -> Texte bearbeiten' -ForegroundColor White
Write-Host '5. Text auswaehlen -> Toolbar erscheint mit B/I/U/Link' -ForegroundColor White
Write-Host '6. Formatieren und Speichern' -ForegroundColor White
