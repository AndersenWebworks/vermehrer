$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host 'Upload 1/4: tierliebe-menu-polish.css'
$wc.UploadFile($ftpServer + $base + 'css/tierliebe-menu-polish.css', 'css/tierliebe-menu-polish.css')

Write-Host 'Upload 2/4: tierliebe-desktop-menu.js'
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-desktop-menu.js', 'js/tierliebe-desktop-menu.js')

Write-Host 'Upload 3/4: tierliebe-keyboard-nav.js'
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-keyboard-nav.js', 'js/tierliebe-keyboard-nav.js')

Write-Host 'Upload 4/4: tierliebe-mobile-menu.js'
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-mobile-menu.js', 'js/tierliebe-mobile-menu.js')

Write-Host 'Fertig! Menu Polish uploaded' -ForegroundColor Green
