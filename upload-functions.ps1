$ftpServer = 'ftp://w018c99c.kasserver.com'
$user = 'w018c99c'
$pass = 'aUMmFsmPb8aHF2v4'
$base = '/vm.andersen-webworks.de/wp-content/themes/webworks-theme/'

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($user, $pass)

Write-Host 'Upload: functions.php'
$wc.UploadFile($ftpServer + $base + 'functions.php', 'webworks-theme/functions.php')

Write-Host 'Fertig!' -ForegroundColor Green
