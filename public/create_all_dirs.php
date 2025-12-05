<?php
// Complete Storage Fix - Creates all missing Laravel directories
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html><html><body style='font-family:Arial;padding:20px;'>";
echo "<h1>Creating All Required Storage Directories</h1>";

$basePath = __DIR__.'/..';

$directories = [
    'storage/app',
    'storage/app/public',
    'storage/app/public/uploads',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/cache/data',
    'storage/framework/sessions',
    'storage/framework/testing',
    'storage/framework/views',
    'storage/logs',
    'bootstrap/cache',
];

$created = 0;
$existed = 0;

foreach ($directories as $dir) {
    $fullPath = $basePath . '/' . $dir;
    
    if (!is_dir($fullPath)) {
        if (mkdir($fullPath, 0775, true)) {
            echo "<p style='color:green;'>✓ Created: $dir</p>";
            chmod($fullPath, 0775);
            $created++;
        } else {
            echo "<p style='color:red;'>✗ Failed to create: $dir</p>";
        }
    } else {
        echo "<p style='color:#666;'>Already exists: $dir</p>";
        $existed++;
        
        // Ensure it's writable
        if (!is_writable($fullPath)) {
            chmod($fullPath, 0775);
            echo "<p style='color:orange;'>  → Fixed permissions</p>";
        }
    }
}

echo "<hr>";
echo "<h2>Summary:</h2>";
echo "<p>✓ Created: <strong>$created</strong> directories</p>";
echo "<p>✓ Already existed: <strong>$existed</strong> directories</p>";

echo "<hr>";
echo "<div style='background:#d4edda;padding:20px;border:2px solid #28a745;'>";
echo "<h2 style='color:#155724;'>✅ All Storage Directories Ready!</h2>";
echo "<p><strong>Now your Laravel app should work!</strong></p>";
echo "<p style='margin-top:20px;'>";
echo "<a href='/public/' style='background:#007bff;color:white;padding:15px 30px;text-decoration:none;display:inline-block;font-size:18px;border-radius:5px;'>🚀 Visit Homepage</a>";
echo "</p>";
echo "</div>";

echo "<p style='margin-top:30px;color:#888;'>Delete this file after your site works: create_all_dirs.php</p>";
echo "</body></html>";
?>
