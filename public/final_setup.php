<?php
// Final Setup Script - Fix remaining issues
// Upload to: /home/littleprodigy/public_html/public/
// Visit once, then DELETE

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Final Setup - Database & Environment</h2>";
echo "<style>body{font-family:Arial;padding:20px;} .ok{color:green;} .error{color:red;} .warning{color:orange;}</style>";

$envPath = '/home/littleprodigy/public_html/.env';

echo "<h3>Step 1: Check .env File</h3>";
if (!file_exists($envPath)) {
    echo "<p class='error'>✗ .env file not found!</p>";
    
    $envExample = '/home/littleprodigy/public_html/.env.example';
    if (file_exists($envExample)) {
        copy($envExample, $envPath);
        echo "<p class='ok'>✓ Created .env from .env.example</p>";
    } else {
        echo "<p class='error'>✗ .env.example also not found!</p>";
        echo "<p>You need to upload .env file manually.</p>";
    }
} else {
    echo "<p class='ok'>✓ .env file exists</p>";
}

echo "<h3>Step 2: Fix APP_KEY</h3>";
if (file_exists($envPath)) {
    $envContent = file_get_contents($envPath);
    
    // Check current APP_KEY
    if (preg_match('/APP_KEY=(.*)/', $envContent, $matches)) {
        $currentKey = trim($matches[1]);
        echo "<p>Current APP_KEY: <code>" . substr($currentKey, 0, 20) . "...</code></p>";
        
        // Fix if it doesn't have base64: prefix
        if (!empty($currentKey) && strpos($currentKey, 'base64:') !== 0) {
            $envContent = preg_replace('/APP_KEY=(.*)/', 'APP_KEY=base64:' . $currentKey, $envContent);
            file_put_contents($envPath, $envContent);
            echo "<p class='ok'>✓ Added 'base64:' prefix to APP_KEY</p>";
        } elseif (empty($currentKey) || $currentKey === 'YOUR_APP_KEY_HERE') {
            // Generate new key
            $newKey = 'base64:' . base64_encode(random_bytes(32));
            $envContent = preg_replace('/APP_KEY=(.*)/', 'APP_KEY=' . $newKey, $envContent);
            file_put_contents($envPath, $envContent);
            echo "<p class='ok'>✓ Generated new APP_KEY</p>";
        } else {
            echo "<p class='ok'>✓ APP_KEY is already correct</p>";
        }
    }
    
    // Fix APP_DEBUG
    if (strpos($envContent, 'APP_DEBUG=true') !== false) {
        $envContent = str_replace('APP_DEBUG=true', 'APP_DEBUG=false', $envContent);
        file_put_contents($envPath, $envContent);
        echo "<p class='ok'>✓ Set APP_DEBUG=false for production</p>";
    }
    
    // Fix APP_URL
    if (strpos($envContent, 'APP_URL=http://') !== false || strpos($envContent, '13.234.82.129') !== false) {
        $envContent = preg_replace('/APP_URL=.*/', 'APP_URL=https://littleprodigybooks.in', $envContent);
        file_put_contents($envPath, $envContent);
        echo "<p class='ok'>✓ Updated APP_URL to https://littleprodigybooks.in</p>";
    }
}

echo "<h3>Step 3: Database Connection Test</h3>";
if (file_exists($envPath)) {
    $envLines = file($envPath);
    $envVars = [];
    foreach ($envLines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', trim($line), 2);
            $envVars[trim($key)] = trim($value);
        }
    }
    
    $host = $envVars['DB_HOST'] ?? 'localhost';
    $db = $envVars['DB_DATABASE'] ?? '';
    $user = $envVars['DB_USERNAME'] ?? '';
    $pass = $envVars['DB_PASSWORD'] ?? '';
    
    echo "<p>Database: <code>$db</code></p>";
    echo "<p>Username: <code>$user</code></p>";
    echo "<p>Host: <code>$host</code></p>";
    
    if (empty($db) || empty($user)) {
        echo "<p class='error'>✗ Database credentials are empty!</p>";
        echo "<div style='background:#fff3cd;padding:15px;margin:10px 0;'>";
        echo "<h4>Fix Database Credentials:</h4>";
        echo "<ol>";
        echo "<li>Go to cPanel → MySQL Databases</li>";
        echo "<li>Note your database name (e.g., littleprodigy_books)</li>";
        echo "<li>Note your database user (e.g., littleprodigy_books)</li>";
        echo "<li>Edit .env file via cPanel File Manager</li>";
        echo "<li>Update DB_DATABASE, DB_USERNAME, DB_PASSWORD</li>";
        echo "</ol>";
        echo "</div>";
    } else {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            echo "<p class='ok'><strong>✓ Database connection successful!</strong></p>";
            
            // Count tables
            $stmt = $pdo->query("SHOW TABLES");
            $tableCount = $stmt->rowCount();
            echo "<p class='ok'>✓ Found $tableCount tables in database</p>";
            
            if ($tableCount == 0) {
                echo "<p class='warning'>⚠️ Database is empty! Import your flip.sql file via phpMyAdmin</p>";
            }
            
        } catch (PDOException $e) {
            echo "<p class='error'><strong>✗ Database connection failed:</strong></p>";
            echo "<pre>" . $e->getMessage() . "</pre>";
            
            echo "<div style='background:#f8d7da;padding:15px;margin:10px 0;'>";
            echo "<h4>Common Fixes:</h4>";
            echo "<ul>";
            echo "<li><strong>Access denied:</strong> Wrong username or password</li>";
            echo "<li><strong>Unknown database:</strong> Database doesn't exist, create it in cPanel</li>";
            echo "<li><strong>Check cPanel MySQL Databases:</strong> Verify credentials match exactly</li>";
            echo "</ul>";
            echo "<p>Your .env shows:</p>";
            echo "<pre>DB_DATABASE=$db\nDB_USERNAME=$user\nDB_PASSWORD=" . str_repeat('*', strlen($pass)) . "</pre>";
            echo "</div>";
        }
    }
}

echo "<h3>Step 4: Clear Bootstrap Cache</h3>";
$cacheFiles = [
    '/home/littleprodigy/public_html/bootstrap/cache/config.php',
    '/home/littleprodigy/public_html/bootstrap/cache/routes.php',
    '/home/littleprodigy/public_html/bootstrap/cache/services.php',
];

$cleared = 0;
foreach ($cacheFiles as $file) {
    if (file_exists($file)) {
        unlink($file);
        $cleared++;
        echo "<p class='ok'>✓ Cleared: " . basename($file) . "</p>";
    }
}

if ($cleared == 0) {
    echo "<p>No cache files to clear</p>";
} else {
    echo "<p class='ok'>✓ Cleared $cleared cache files</p>";
}

echo "<h3>Step 5: Set Permissions</h3>";
$dirs = [
    '/home/littleprodigy/public_html/storage',
    '/home/littleprodigy/public_html/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (is_dir($dir)) {
        if (@chmod($dir, 0775)) {
            echo "<p class='ok'>✓ Set permissions: $dir</p>";
        } else {
            echo "<p class='warning'>⚠️ Could not set permissions (may need manual fix via File Manager)</p>";
        }
    }
}

echo "<hr>";
echo "<div style='background:#d4edda;padding:20px;border-left:4px solid #28a745;'>";
echo "<h3>✅ Setup Complete!</h3>";
echo "<p><strong>Next Steps:</strong></p>";
echo "<ol>";
echo "<li>Delete this file: <code>final_setup.php</code></li>";
echo "<li>Delete: <code>setup_storage_redirect.php</code></li>";
echo "<li>Delete: <code>fix_storage.php</code></li>";
echo "<li>Delete: <code>copy_storage.php</code></li>";
echo "<li>Delete: <code>cpanel_diagnostic.php</code></li>";
echo "<li>Visit: <a href='/public/' target='_blank'>https://littleprodigybooks.in/public/</a></li>";
echo "</ol>";
echo "</div>";

echo "<div style='background:#fff3cd;padding:15px;margin:20px 0;'>";
echo "<h4>⚠️ If Site Still Shows Errors:</h4>";
echo "<p>Check the Laravel log file:</p>";
echo "<code>/home/littleprodigy/public_html/storage/logs/laravel.log</code>";
echo "<p>The error message will tell you exactly what's wrong.</p>";
echo "</div>";

echo "<hr>";
echo "<p style='color:#888;'>Generated: " . date('Y-m-d H:i:s') . "</p>";
?>
