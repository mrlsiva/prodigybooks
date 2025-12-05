<?php
// Clear all Laravel caches manually
echo "<!DOCTYPE html><html><body style='font-family:Arial;padding:20px;'>";
echo "<h1>Cache Clearer</h1>";

$basePath = __DIR__.'/..';

// 1. Clear config cache
$configCache = $basePath . '/bootstrap/cache/config.php';
if (file_exists($configCache)) {
    unlink($configCache);
    echo "<p style='color:green;'>✓ Deleted config cache</p>";
} else {
    echo "<p style='color:#888;'>○ No config cache found</p>";
}

// 2. Clear routes cache
$routesCache = $basePath . '/bootstrap/cache/routes-v7.php';
if (file_exists($routesCache)) {
    unlink($routesCache);
    echo "<p style='color:green;'>✓ Deleted routes cache</p>";
} else {
    echo "<p style='color:#888;'>○ No routes cache found</p>";
}

// 3. Clear services cache
$servicesCache = $basePath . '/bootstrap/cache/services.php';
if (file_exists($servicesCache)) {
    unlink($servicesCache);
    echo "<p style='color:green;'>✓ Deleted services cache</p>";
} else {
    echo "<p style='color:#888;'>○ No services cache found</p>";
}

// 4. Clear compiled views
$viewsPath = $basePath . '/storage/framework/views';
if (is_dir($viewsPath)) {
    $files = glob($viewsPath . '/*');
    $count = 0;
    foreach ($files as $file) {
        if (is_file($file) && basename($file) != '.gitignore') {
            unlink($file);
            $count++;
        }
    }
    echo "<p style='color:green;'>✓ Deleted $count compiled views</p>";
}

// 5. Clear app cache
$cachePath = $basePath . '/storage/framework/cache/data';
if (is_dir($cachePath)) {
    $files = glob($cachePath . '/*/*');
    $count = 0;
    foreach ($files as $file) {
        if (is_file($file) && basename($file) != '.gitignore') {
            unlink($file);
            $count++;
        }
    }
    echo "<p style='color:green;'>✓ Deleted $count cache files</p>";
}

// 6. List bootstrap/cache contents
echo "<hr><h2>Bootstrap Cache Contents:</h2><ul>";
$bootstrapCache = $basePath . '/bootstrap/cache';
if (is_dir($bootstrapCache)) {
    $files = scandir($bootstrapCache);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "<li>$file</li>";
        }
    }
}
echo "</ul>";

echo "<hr>";
echo "<div style='background:#00aa00;color:white;padding:20px;'>";
echo "<h2>✅ All Caches Cleared!</h2>";
echo "<p><a href='/public/' style='color:white;font-size:18px;'>➜ Try Homepage Now</a></p>";
echo "</div>";

echo "</body></html>";
?>
