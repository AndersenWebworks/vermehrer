$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host 'Upload: tierliebe-edit.js (Button/Panel Keys gefixt)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-edit.js', 'webworks-theme/js/tierliebe-edit.js')

Write-Host 'Fertig!' -ForegroundColor Green
Write-Host ''
Write-Host 'Jetzt speichern Buttons/Panels mit richtigen Keys!' -ForegroundColor Cyan
Write-Host 'Cache loeschen und testen!' -ForegroundColor Yellow
