$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host '=== FORMATTING FIX UPLOAD ===' -ForegroundColor Cyan
Write-Host ''

Write-Host 'Upload 1/2: functions.php (JSON-Format Support)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'functions.php', 'webworks-theme/functions.php')

Write-Host 'Upload 2/2: tierliebe-edit-v2.js (JSON-Save)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-edit-v2.js', 'webworks-theme/js/tierliebe-edit-v2.js')

Write-Host ''
Write-Host 'Fertig!' -ForegroundColor Green
Write-Host ''
Write-Host 'Cache loeschen und neu testen:' -ForegroundColor Cyan
Write-Host 'https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/clear-cache.php' -ForegroundColor Yellow
