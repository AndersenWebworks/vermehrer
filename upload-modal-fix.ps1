$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host '=== URL-EDITING MODAL (kein Alert mehr!) ===' -ForegroundColor Cyan
Write-Host ''

Write-Host 'Upload 1/2: tierliebe-edit.css (Modal-Styling)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'css/tierliebe-edit.css', 'webworks-theme/css/tierliebe-edit.css')

Write-Host 'Upload 2/2: tierliebe-edit.js (Modal statt Prompt)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-edit.js', 'webworks-theme/js/tierliebe-edit.js')

Write-Host ''
Write-Host 'Fertig! Jetzt mit schoener Modal!' -ForegroundColor Green
Write-Host ''
Write-Host 'RECHTSKLICK auf Button/Link -> Schoenes Modal oeffnet sich!' -ForegroundColor Cyan
