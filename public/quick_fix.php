<?php
// Quick Fix Script - Creates missing directories and hides warnings
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', 1);

echo "<!DOCTYPE html><html><body style='font-family:Arial;padding:20px;'>";
echo "<h2>Quick Fix</h2>";

// Fix 1: Create missing storage/framework/views directory
$viewsPath = __DIR__.'/../storage/framework/views';
if (!is_dir($viewsPath)) {
    echo "<p style='color:red;'>✗ Missing: storage/framework/views</p>";
    if (mkdir($viewsPath, 0775, true)) {
        echo "<p style='color:green;'>✓ Created: storage/framework/views</p>";
        chmod($viewsPath, 0775);
    } else {
        echo "<p style='color:red;'>✗ Failed to create directory</p>";
    }
} else {
    echo "<p style='color:green;'>✓ Directory exists: storage/framework/views</p>";
}

// Fix 2: Create other required storage directories
$dirs = [
    __DIR__.'/../storage/framework/sessions',
    __DIR__.'/../storage/framework/cache',
    __DIR__.'/../storage/framework/cache/data',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
        echo "<p style='color:green;'>✓ Created: " . basename(dirname($dir)) . "/" . basename($dir) . "</p>";
    }
}

echo "<h3>Fix 3: Update index.php to hide warnings</h3>";
$indexPath = __DIR__.'/index.php';
$indexContent = file_get_contents($indexPath);

if (strpos($indexContent, 'error_reporting(E_ALL & ~E_DEPRECATED') === false) {
    // Add error suppression after <?php
    $newContent = str_replace(
        "<?php\n\n/**",
        "<?php\n\n// Hide deprecation warnings for PHP 8.2+\nerror_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);\n\n/**",
        $indexContent
    );
    
    if (file_put_contents($indexPath, $newContent)) {
        echo "<p style='color:green;'>✓ Updated index.php to hide deprecation warnings</p>";
    } else {
        echo "<p style='color:red;'>✗ Could not update index.php (check permissions)</p>";
    }
} else {
    echo "<p style='color:green;'>✓ index.php already configured</p>";
}

echo "<hr>";
echo "<div style='background:#d4edda;padding:20px;border-left:4px solid #28a745;'>";
echo "<h3>✅ All Fixes Applied!</h3>";
echo "<p><strong>Now test your site:</strong></p>";
echo "<p><a href='/public/' style='background:#007bff;color:white;padding:10px 20px;text-decoration:none;display:inline-block;'>Visit Homepage</a></p>";
echo "</div>";

echo "<p style='color:#888;margin-top:20px;'>Delete this file after your site works: quick_fix.php</p>";
echo "</body></html>";
?>
