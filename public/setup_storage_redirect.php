<?php
// Upload Redirect Setup - No Symlink Required
// This creates a storage folder structure that redirects to the real storage location
// Upload to: /home/littleprodigy/public_html/public/

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Storage Setup (No Symlink Required)</h2>";
echo "<style>body{font-family:Arial;padding:20px;} .ok{color:green;} .error{color:red;}</style>";

$storageDir = '/home/littleprodigy/public_html/public/storage';
$htaccessContent = '# Disable directory browsing
Options -Indexes

# Rewrite engine
<IfModule mod_rewrite.c>
    RewriteEngine On
    
    # If the requested file doesn\'t exist, route through index.php
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php [QSA,L]
</IfModule>

# Serve images and files directly if they exist
<FilesMatch "\.(jpg|jpeg|png|gif|svg|webp|pdf|mp3|mp4|css|js)$">
    Require all granted
</FilesMatch>';

$indexContent = '<?php
// Storage Path Redirector
$requestedFile = $_SERVER[\'REQUEST_URI\'];
$requestedFile = str_replace(\'/public/storage/\', \'\', $requestedFile);
$requestedFile = str_replace(\'/storage/\', \'\', $requestedFile);
$requestedFile = ltrim($requestedFile, \'/\');

$actualPath = \'/home/littleprodigy/public_html/storage/app/public/\' . $requestedFile;

if (strpos($requestedFile, \'..\') !== false) {
    header("HTTP/1.0 403 Forbidden");
    exit(\'Access denied\');
}

if (!file_exists($actualPath)) {
    header("HTTP/1.0 404 Not Found");
    exit(\'File not found: \' . htmlspecialchars($requestedFile));
}

if (is_dir($actualPath)) {
    header("HTTP/1.0 403 Forbidden");
    exit(\'Directory listing not allowed\');
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($finfo, $actualPath);
finfo_close($finfo);

header(\'Content-Type: \' . $mimeType);
header(\'Content-Length: \' . filesize($actualPath));
header(\'Cache-Control: public, max-age=31536000\');

readfile($actualPath);
exit;
?>';

echo "<h3>Step 1: Create Storage Directory</h3>";
if (!is_dir($storageDir)) {
    if (mkdir($storageDir, 0755, true)) {
        echo "<p class='ok'>✓ Created: $storageDir</p>";
    } else {
        echo "<p class='error'>✗ Failed to create directory</p>";
        exit;
    }
} else {
    // Check if it's a symlink
    if (is_link($storageDir)) {
        echo "<p class='error'>✗ Storage is a symlink. Need to remove it first.</p>";
        unlink($storageDir);
        mkdir($storageDir, 0755, true);
        echo "<p class='ok'>✓ Removed symlink and created directory</p>";
    } else {
        echo "<p class='ok'>✓ Directory already exists</p>";
    }
}

echo "<h3>Step 2: Create .htaccess</h3>";
$htaccessPath = $storageDir . '/.htaccess';
if (file_put_contents($htaccessPath, $htaccessContent)) {
    echo "<p class='ok'>✓ Created: .htaccess</p>";
} else {
    echo "<p class='error'>✗ Failed to create .htaccess</p>";
}

echo "<h3>Step 3: Create index.php Redirector</h3>";
$indexPath = $storageDir . '/index.php';
if (file_put_contents($indexPath, $indexContent)) {
    echo "<p class='ok'>✓ Created: index.php</p>";
} else {
    echo "<p class='error'>✗ Failed to create index.php</p>";
}

echo "<h3>Step 4: Create Upload Directories</h3>";
$uploadDirs = [
    '/home/littleprodigy/public_html/storage/app/public/uploads',
    '/home/littleprodigy/public_html/storage/app/public/uploads/img',
    '/home/littleprodigy/public_html/storage/app/public/uploads/audio',
    '/home/littleprodigy/public_html/storage/app/public/uploads/books',
];

foreach ($uploadDirs as $dir) {
    if (!is_dir($dir)) {
        if (mkdir($dir, 0755, true)) {
            echo "<p class='ok'>✓ Created: $dir</p>";
        }
    } else {
        echo "<p>✓ Already exists: $dir</p>";
    }
}

echo "<hr>";
echo "<div style='background:#d4edda;padding:15px;border-left:4px solid #28a745;'>";
echo "<h3>✓ SUCCESS!</h3>";
echo "<p>Storage is now set up WITHOUT symlinks!</p>";
echo "<p><strong>How it works:</strong></p>";
echo "<ul>";
echo "<li>Files are uploaded to: <code>/home/littleprodigy/public_html/storage/app/public/</code></li>";
echo "<li>When accessed via URL, index.php redirects to the actual file</li>";
echo "<li>This works even though symlink() is disabled</li>";
echo "</ul>";
echo "</div>";

echo "<h3>Testing:</h3>";
echo "<p>Create a test file to verify it works:</p>";
$testFile = '/home/littleprodigy/public_html/storage/app/public/test.txt';
file_put_contents($testFile, 'Storage redirect is working!');
echo "<p class='ok'>✓ Created test file</p>";
echo "<p>Visit: <a href='/public/storage/test.txt' target='_blank'>https://littleprodigybooks.in/public/storage/test.txt</a></p>";
echo "<p>If you see 'Storage redirect is working!' - it's working!</p>";

echo "<hr>";
echo "<p style='background:#fff3cd;padding:15px;'><strong>DELETE THIS FILE:</strong> setup_storage_redirect.php</p>";
echo "<p style='color:#888;'>Generated: " . date('Y-m-d H:i:s') . "</p>";
?>
