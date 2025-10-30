$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host 'Upload 1/2: tierliebe-filter.js'
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-filter.js', 'webworks-theme/js/tierliebe-filter.js')

Write-Host 'Upload 2/2: tierliebe-pages.css'
$wc.UploadFile($ftpServer + $base + 'css/tierliebe-pages.css', 'webworks-theme/css/tierliebe-pages.css')

Write-Host 'Fertig! Filter-Animationen aktiv' -ForegroundColor Green
