<?php
// Test if we can write to storage/logs
header('Content-Type: text/html; charset=utf-8');
echo "<!DOCTYPE html><html><body style='font-family:Arial;padding:20px;'>";
echo "<h1>🔍 Storage Permissions Test</h1>";

$logsDir = __DIR__.'/../storage/logs';
$testFile = $logsDir . '/test.txt';

echo "<h2>Logs Directory: $logsDir</h2>";
echo "<p>Exists: " . (is_dir($logsDir) ? '✓ YES' : '✗ NO') . "</p>";
echo "<p>Writable: " . (is_writable($logsDir) ? '✓ YES' : '✗ NO') . "</p>";
echo "<p>Permissions: " . substr(sprintf('%o', fileperms($logsDir)), -4) . "</p>";

echo "<hr><h2>Testing Write...</h2>";

$result = @file_put_contents($testFile, "Test write at " . date('Y-m-d H:i:s'));

if ($result === false) {
    echo "<p style='color:red;'>✗ FAILED to write to $testFile</p>";
    echo "<p>Error: " . error_get_last()['message'] . "</p>";
} else {
    echo "<p style='color:green;'>✓ Successfully wrote $result bytes to $testFile</p>";
    
    // Try to read it back
    $content = file_get_contents($testFile);
    echo "<p>Content: <code>$content</code></p>";
    
    // Clean up
    unlink($testFile);
    echo "<p>✓ Test file deleted</p>";
}

echo "<hr><h2>All Storage Directories:</h2><ul>";
$dirs = [
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
    'bootstrap/cache',
];

foreach ($dirs as $dir) {
    $path = __DIR__.'/../' . $dir;
    $exists = is_dir($path);
    $writable = $exists ? is_writable($path) : false;
    $perms = $exists ? substr(sprintf('%o', fileperms($path)), -4) : 'N/A';
    
    $status = $exists ? ($writable ? '✓' : '⚠') : '✗';
    $color = $exists ? ($writable ? 'green' : 'orange') : 'red';
    
    echo "<li style='color:$color;'>$status <strong>$dir</strong> - Perms: $perms - Writable: " . ($writable ? 'YES' : 'NO') . "</li>";
}
echo "</ul>";

echo "</body></html>";
?>
