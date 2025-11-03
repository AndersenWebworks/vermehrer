$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host '=== LINK-NAVIGATION FIX ===' -ForegroundColor Cyan
Write-Host ''

Write-Host 'Upload 1/2: tierliebe-edit.js (Links via JavaScript blockiert)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-edit.js', 'webworks-theme/js/tierliebe-edit.js')

Write-Host 'Upload 2/2: tierliebe-edit.css (nur visuelles Feedback)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'css/tierliebe-edit.css', 'webworks-theme/css/tierliebe-edit.css')

Write-Host ''
Write-Host 'Fertig! Links werden jetzt korrekt blockiert!' -ForegroundColor Green
Write-Host ''
Write-Host 'Im Edit-Mode:' -ForegroundColor Cyan
Write-Host '- Links funktionieren NICHT (preventDefault)' -ForegroundColor White
Write-Host '- Editierbare Bereiche FUNKTIONIEREN' -ForegroundColor White
