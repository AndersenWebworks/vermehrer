$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host '=== EDITABLE-FIX: 5 Seiten hochladen ===' -ForegroundColor Cyan
Write-Host ''

Write-Host '1/5: page-tierliebe-adoption.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-adoption.php', 'webworks-theme/page-tierliebe-adoption.php')

Write-Host '2/5: page-tierliebe-wissen.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-wissen.php', 'webworks-theme/page-tierliebe-wissen.php')

Write-Host '3/5: page-tierliebe-test.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-test.php', 'webworks-theme/page-tierliebe-test.php')

Write-Host '4/5: page-tierliebe-irrtuemer.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-irrtuemer.php', 'webworks-theme/page-tierliebe-irrtuemer.php')

Write-Host '5/5: page-tierliebe-kontakt.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-kontakt.php', 'webworks-theme/page-tierliebe-kontakt.php')

Write-Host ''
Write-Host 'Fertig! Alle Seiten haben jetzt .editable Klassen!' -ForegroundColor Green
Write-Host ''
Write-Host 'WICHTIG: Keys verwenden jetzt Bindestriche:' -ForegroundColor Cyan
Write-Host 'hero_title -> hero-titel' -ForegroundColor White
Write-Host 'zoofach_title -> zoofach-titel' -ForegroundColor White
Write-Host ''
Write-Host 'Cache loeschen:' -ForegroundColor Yellow
Write-Host 'https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/clear-cache.php' -ForegroundColor White
