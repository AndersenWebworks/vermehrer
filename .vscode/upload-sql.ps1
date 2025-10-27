# FTP Upload für SQL Import-Datei
$ftpServer = "ftp://w018c99c.kasserver.com"
$ftpUsername = "w018c99c"
$ftpPassword = "aUMmFsmPb8aHF2v4"
$remotePath = "/streunerhilfe-plau.de/"

$workspaceRoot = Split-Path -Parent $PSScriptRoot
$localFile = Join-Path $workspaceRoot "import-utm-data.sql"

if (-not (Test-Path $localFile)) {
    Write-Host "Fehler: import-utm-data.sql nicht gefunden!" -ForegroundColor Red
    exit 1
}

$remoteFile = $remotePath + "import-utm-data.sql"
$ftpUri = $ftpServer + $remoteFile

Write-Host "Uploading: import-utm-data.sql -> $remoteFile" -ForegroundColor Cyan

try {
    $webclient = New-Object System.Net.WebClient
    $webclient.Credentials = New-Object System.Net.NetworkCredential($ftpUsername, $ftpPassword)
    $webclient.UploadFile($ftpUri, $localFile)
    Write-Host "Uploaded: import-utm-data.sql erfolgreich!" -ForegroundColor Green
    Write-Host ""
    Write-Host "Naechste Schritte:" -ForegroundColor Yellow
    Write-Host "1. Einloggen in phpMyAdmin" -ForegroundColor White
    Write-Host "2. Datenbank 'w018c99c_streunerhilfe' auswaehlen" -ForegroundColor White
    Write-Host "3. Tab 'Import' klicken" -ForegroundColor White
    Write-Host "4. Datei 'import-utm-data.sql' vom Server auswaehlen" -ForegroundColor White
    Write-Host "5. 'Ausfuehren' klicken" -ForegroundColor White
}
catch {
    Write-Host "Failed to upload: $_" -ForegroundColor Red
    exit 1
}
