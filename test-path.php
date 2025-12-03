<?php
header('Content-Type: text/plain');
echo "Script location: " . __DIR__ . "\n";
echo "Looking for wp-load.php at: " . __DIR__ . '/../../../wp-load.php' . "\n";
echo "File exists: " . (file_exists(__DIR__ . '/../../../wp-load.php') ? 'YES' : 'NO') . "\n";
echo "\nDirectory listing:\n";
$files = scandir(__DIR__ . '/../../..');
foreach ($files as $file) {
    echo "  - $file\n";
}
