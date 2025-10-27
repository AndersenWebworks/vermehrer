# FTP Upload Script
$ftpServer = "ftp://w018c99c.kasserver.com"
$ftpUsername = "w018c99c"
$ftpPassword = "aUMmFsmPb8aHF2v4"
$remotePath = "/vm.andersen-webworks.de/wp-content/themes/"

# Get workspace root
$workspaceRoot = Split-Path -Parent $PSScriptRoot

# Get all modified and staged files from git
$modifiedFiles = git -C $workspaceRoot diff --name-only
$stagedFiles = git -C $workspaceRoot diff --cached --name-only
$allFiles = ($modifiedFiles + $stagedFiles) | Select-Object -Unique

if ($allFiles.Count -eq 0) {
    Write-Host "Keine Dateien zum Hochladen gefunden" -ForegroundColor Yellow
    exit 0
}

Write-Host "Gefunden: $($allFiles.Count) Datei(en) zum Hochladen" -ForegroundColor Cyan

foreach ($file in $allFiles) {
    if ($file -match '\.git|\.vscode|node_modules|\.map$') {
        continue
    }

    $localFile = Join-Path $workspaceRoot $file
    if (Test-Path $localFile) {
        $remoteFile = $remotePath + $file.Replace('\', '/')
        $ftpUri = $ftpServer + $remoteFile

        Write-Host "Uploading: $file -> $remoteFile"

        try {
            $webclient = New-Object System.Net.WebClient
            $webclient.Credentials = New-Object System.Net.NetworkCredential($ftpUsername, $ftpPassword)
            $webclient.UploadFile($ftpUri, $localFile)
            Write-Host "Uploaded: $file" -ForegroundColor Green
        }
        catch {
            Write-Host "Failed to upload $file : $_" -ForegroundColor Red
        }
    }
}
