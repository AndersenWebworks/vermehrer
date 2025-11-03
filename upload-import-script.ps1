$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host 'Upload: import-tierliebe-home.php'
$wc.UploadFile($ftpServer + $base + 'import-tierliebe-home.php', 'webworks-theme/import-tierliebe-home.php')

Write-Host 'Fertig!' -ForegroundColor Green
Write-Host ''
Write-Host 'Rufe jetzt auf: https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/import-tierliebe-home.php' -ForegroundColor Cyan
