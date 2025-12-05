<?php
// Storage Directory Copy Script (Alternative to Symlink)
// Use this ONLY if symlink creation fails
// Upload to: /home/littleprodigy/public_html/public/

error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(300); // 5 minutes max

echo "<h2>Storage Files Copy Tool</h2>";
echo "<style>body{font-family:Arial;padding:20px;} .ok{color:green;} .error{color:red;} .warning{color:orange;}</style>";

$source = '/home/littleprodigy/public_html/storage/app/public';
$destination = '/home/littleprodigy/public_html/public/storage';

echo "<p class='warning'>⚠️ This will COPY files instead of creating a symlink.</p>";
echo "<p>This means uploaded images won't appear automatically - you'll need to re-run this script after uploading new images.</p>";
echo "<hr>";

// Recursive copy function
function copyDirectory($src, $dst) {
    if (!is_dir($src)) {
        return false;
    }
    
    if (!is_dir($dst)) {
        mkdir($dst, 0755, true);
    }
    
    $dir = opendir($src);
    $count = 0;
    
    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            $srcPath = $src . '/' . $file;
            $dstPath = $dst . '/' . $file;
            
            if (is_dir($srcPath)) {
                $count += copyDirectory($srcPath, $dstPath);
            } else {
                if (copy($srcPath, $dstPath)) {
                    $count++;
                }
            }
        }
    }
    
    closedir($dir);
    return $count;
}

echo "<h3>Copying Files...</h3>";

// Remove existing if it's a symlink
if (is_link($destination)) {
    unlink($destination);
    echo "<p>Removed existing symlink</p>";
}

// Create destination directory
if (!is_dir($destination)) {
    mkdir($destination, 0755, true);
    echo "<p class='ok'>✓ Created destination directory</p>";
}

// Copy files
$fileCount = copyDirectory($source, $destination);

if ($fileCount > 0) {
    echo "<p class='ok'><strong>✓ SUCCESS! Copied $fileCount files</strong></p>";
    echo "<p>From: <code>$source</code></p>";
    echo "<p>To: <code>$destination</code></p>";
    
    echo "<hr>";
    echo "<div style='background:#fff3cd;padding:15px;'>";
    echo "<h3>⚠️ Important Notes:</h3>";
    echo "<ul>";
    echo "<li>Files are COPIED, not linked</li>";
    echo "<li>When you upload new images via admin panel, they go to <code>$source</code></li>";
    echo "<li>You'll need to run this script again to copy new images</li>";
    echo "<li><strong>Better solution:</strong> Ask your hosting provider to enable symlink support</li>";
    echo "</ul>";
    echo "</div>";
    
    echo "<p style='background:#d4edda;padding:15px;'><strong>DELETE THIS FILE NOW!</strong> (copy_storage.php)</p>";
    
} else {
    echo "<p class='error'>✗ No files found or copy failed</p>";
    echo "<p>Check if source directory exists: <code>$source</code></p>";
}

echo "<hr>";
echo "<p style='color:#888;'>Generated: " . date('Y-m-d H:i:s') . "</p>";
?>
