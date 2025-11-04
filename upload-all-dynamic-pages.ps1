$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host '=== ALLE DYNAMISCHEN SEITEN HOCHLADEN ===' -ForegroundColor Cyan
Write-Host ''

# 1. Import-Script
Write-Host '1/11: import-all-tierliebe-texts.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'import-all-tierliebe-texts.php', 'webworks-theme/import-all-tierliebe-texts.php')

# 2-11. Alle Seiten
Write-Host '2/11: page-tierliebe-kleintiere.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-kleintiere.php', 'webworks-theme/page-tierliebe-kleintiere.php')

Write-Host '3/11: page-tierliebe-exoten.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-exoten.php', 'webworks-theme/page-tierliebe-exoten.php')

Write-Host '4/11: page-tierliebe-hunde.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-hunde.php', 'webworks-theme/page-tierliebe-hunde.php')

Write-Host '5/11: page-tierliebe-katzen.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-katzen.php', 'webworks-theme/page-tierliebe-katzen.php')

Write-Host '6/11: page-tierliebe-qualzucht.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-qualzucht.php', 'webworks-theme/page-tierliebe-qualzucht.php')

Write-Host '7/11: page-tierliebe-adoption.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-adoption.php', 'webworks-theme/page-tierliebe-adoption.php')

Write-Host '8/11: page-tierliebe-wissen.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-wissen.php', 'webworks-theme/page-tierliebe-wissen.php')

Write-Host '9/11: page-tierliebe-test.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-test.php', 'webworks-theme/page-tierliebe-test.php')

Write-Host '10/11: page-tierliebe-irrtuemer.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-irrtuemer.php', 'webworks-theme/page-tierliebe-irrtuemer.php')

Write-Host '11/11: page-tierliebe-kontakt.php' -ForegroundColor Yellow
$wc.UploadFile($ftpServer + $base + 'page-tierliebe-kontakt.php', 'webworks-theme/page-tierliebe-kontakt.php')

Write-Host ''
Write-Host 'Fertig!' -ForegroundColor Green
Write-Host ''
Write-Host 'NAECHSTE SCHRITTE:' -ForegroundColor Cyan
Write-Host '1. Import ausfuehren:' -ForegroundColor White
Write-Host '   https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/import-all-tierliebe-texts.php' -ForegroundColor Yellow
Write-Host ''
Write-Host '2. Cache loeschen:' -ForegroundColor White
Write-Host '   https://vm.andersen-webworks.de/wp-content/themes/webworks-theme/clear-cache.php' -ForegroundColor Yellow
Write-Host ''
Write-Host '3. Test: Edit-Modus auf allen Seiten testen!' -ForegroundColor White
Write-Host ''
