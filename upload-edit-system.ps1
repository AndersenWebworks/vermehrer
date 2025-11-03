$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host '=== TIERLIEBE EDIT SYSTEM UPLOAD ===' -ForegroundColor Cyan
Write-Host ''

Write-Host 'Upload 1/4: page-tierliebe-home.php (NEW VERSION)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-home.php', 'webworks-theme/page-tierliebe-home-NEW.php')

Write-Host 'Upload 2/4: tierliebe-edit.css' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'css/tierliebe-edit.css', 'webworks-theme/css/tierliebe-edit.css')

Write-Host 'Upload 3/4: tierliebe-edit.js' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'js/tierliebe-edit.js', 'webworks-theme/js/tierliebe-edit.js')

Write-Host 'Upload 4/4: functions.php (mit Edit-System)' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'functions.php', 'webworks-theme/functions.php')

Write-Host ''
Write-Host 'Fertig! Alle Dateien hochgeladen!' -ForegroundColor Green
Write-Host ''
Write-Host 'NEXT STEPS:' -ForegroundColor Cyan
Write-Host '1. Gehe zu https://vm.andersen-webworks.de/tierliebe-home' -ForegroundColor White
Write-Host '2. Als Admin siehst du links einen EDIT-Button (Stift-Icon)' -ForegroundColor White
Write-Host '3. Klicke drauf -> alle Texte werden editierbar' -ForegroundColor White
Write-Host '4. Aendere was du willst, dann auf SPEICHERN' -ForegroundColor White
Write-Host '5. Die Aenderungen landen in der DB und lokal in der PHP bleibt alles gleich' -ForegroundColor White
