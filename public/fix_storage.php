<?php
// Simple Storage Symlink Creator - No Laravel Dependencies
// Upload to: /home/littleprodigy/public_html/public/
// Visit once, then DELETE this file

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Storage Symlink Creator</h2>";
echo "<style>body{font-family:Arial;padding:20px;} .ok{color:green;} .error{color:red;}</style>";

$target = '/home/littleprodigy/public_html/storage/app/public';
$link = '/home/littleprodigy/public_html/public/storage';

echo "<h3>Step 1: Check Target Directory</h3>";
if (is_dir($target)) {
    echo "<p class='ok'>✓ Target directory exists: <code>$target</code></p>";
} else {
    echo "<p class='error'>✗ Target directory NOT found: <code>$target</code></p>";
    echo "<p>Creating directory structure...</p>";
    
    if (!is_dir('/home/littleprodigy/public_html/storage')) {
        mkdir('/home/littleprodigy/public_html/storage', 0755, true);
        echo "<p class='ok'>✓ Created /storage</p>";
    }
    if (!is_dir('/home/littleprodigy/public_html/storage/app')) {
        mkdir('/home/littleprodigy/public_html/storage/app', 0755, true);
        echo "<p class='ok'>✓ Created /storage/app</p>";
    }
    if (!is_dir($target)) {
        mkdir($target, 0755, true);
        echo "<p class='ok'>✓ Created $target</p>";
    }
}

echo "<h3>Step 2: Check/Remove Existing Link</h3>";
if (file_exists($link)) {
    if (is_link($link)) {
        $oldTarget = readlink($link);
        unlink($link);
        echo "<p class='ok'>✓ Removed old symlink (was pointing to: $oldTarget)</p>";
    } elseif (is_dir($link)) {
        echo "<p class='error'>✗ 'storage' exists as a DIRECTORY (not symlink)</p>";
        echo "<p>You need to manually rename or delete: <code>$link</code> via cPanel File Manager</p>";
        exit;
    } else {
        unlink($link);
        echo "<p class='ok'>✓ Removed existing file</p>";
    }
} else {
    echo "<p>No existing link found (this is normal)</p>";
}

echo "<h3>Step 3: Create Symlink</h3>";
if (@symlink($target, $link)) {
    echo "<p class='ok'><strong>✓ SUCCESS! Storage symlink created!</strong></p>";
    echo "<p>Target: <code>$target</code></p>";
    echo "<p>Link: <code>$link</code></p>";
    
    // Verify
    if (is_link($link)) {
        $verifyTarget = readlink($link);
        echo "<p class='ok'>✓ Verified: Symlink points to <code>$verifyTarget</code></p>";
    }
    
    echo "<hr>";
    echo "<p style='background:#fff3cd;padding:15px;'><strong>⚠️ IMPORTANT:</strong> Delete this file now! (fix_storage.php)</p>";
    echo "<p>Your images should now load correctly.</p>";
    
} else {
    echo "<p class='error'>✗ Failed to create symlink</p>";
    
    // Show detailed error
    $error = error_get_last();
    if ($error) {
        echo "<pre>Error: " . print_r($error, true) . "</pre>";
    }
    
    echo "<h4>Alternative Solutions:</h4>";
    echo "<ol>";
    echo "<li><strong>Check Permissions:</strong> Ensure PHP can create symlinks (some hosts disable this)</li>";
    echo "<li><strong>Contact Support:</strong> Ask your host to enable symlink creation</li>";
    echo "<li><strong>Copy Instead:</strong> Copy the entire <code>$target</code> folder to <code>$link</code> (not ideal but works)</li>";
    echo "</ol>";
    
    echo "<h4>Manual Copy Command (if symlink fails):</h4>";
    echo "<pre>cp -r $target $link</pre>";
    echo "<p>Run this via cPanel Terminal or create a PHP script to copy files</p>";
}

echo "<hr>";
echo "<p style='color:#888;'>Generated: " . date('Y-m-d H:i:s') . "</p>";
?>
