$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host 'Upload: debug-edit.php'
$wc.UploadFile($ftpServer + $base + 'debug-edit.php', 'webworks-theme/debug-edit.php')

Write-Host 'Fertig!' -ForegroundColor Green
Write-Host ''
Write-Host 'Debug ausfuehren:' -ForegroundColor Cyan
Write-Host 'https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/debug-edit.php' -ForegroundColor Yellow
