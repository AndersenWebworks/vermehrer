$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host 'Upload: page-tierliebe-home.php (Buttons/Panels dynamisch aus DB)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-home.php', 'webworks-theme/page-tierliebe-home.php')

Write-Host 'Fertig!' -ForegroundColor Green
Write-Host ''
Write-Host 'WICHTIG: Cache loeschen!' -ForegroundColor Cyan
Write-Host 'https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/clear-cache.php' -ForegroundColor Yellow
