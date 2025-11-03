$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host '=== BUTTONS & PANELS EDITIERBAR ===' -ForegroundColor Cyan
Write-Host ''

Write-Host 'Upload 1/2: page-tierliebe-home.php (mit editierbaren Buttons/Panels)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-home.php', 'webworks-theme/page-tierliebe-home.php')

Write-Host 'Upload 2/2: tierliebe-edit.js (erweitert fuer Buttons/Panels)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-edit.js', 'webworks-theme/js/tierliebe-edit.js')

Write-Host ''
Write-Host 'Fertig!' -ForegroundColor Green
Write-Host ''
Write-Host 'WICHTIG: Cache loeschen!' -ForegroundColor Cyan
Write-Host 'https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/clear-cache.php' -ForegroundColor Yellow
Write-Host ''
Write-Host 'Dann testen auf:' -ForegroundColor Cyan
Write-Host 'https://vm.andersen-webworks.de/tierliebe-home' -ForegroundColor Yellow
