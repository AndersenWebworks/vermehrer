$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host 'Upload: tierliebe-pages.css (Nav Font-Size Fix)'
$wc.UploadFile($ftpServer + $base + 'css/tierliebe-pages.css', 'webworks-theme/css/tierliebe-pages.css')

Write-Host 'Fertig! Mobile Nav jetzt 16px' -ForegroundColor Green
