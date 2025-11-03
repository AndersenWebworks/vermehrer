$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host 'Upload: clear-cache.php'
$wc.UploadFile($ftpServer + $base + 'clear-cache.php', 'webworks-theme/clear-cache.php')

Write-Host 'Fertig!' -ForegroundColor Green
Write-Host ''
Write-Host 'Rufe auf: https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/clear-cache.php' -ForegroundColor Cyan
