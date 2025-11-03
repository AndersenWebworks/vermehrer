$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host 'Upload: tierliebe-edit.css (Links im Edit-Mode deaktiviert)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'css/tierliebe-edit.css', 'webworks-theme/css/tierliebe-edit.css')

Write-Host 'Fertig!' -ForegroundColor Green
