<?php
/**
 * cPanel Setup Tool - No SSH Required
 * Upload to public_html
 * Access: https://littleprodigybooks.in/cpanel_setup.php
 * DELETE THIS FILE AFTER SETUP COMPLETE!
 */

// Security: Add a simple password to prevent unauthorized access
define('SETUP_PASSWORD', 'prodigy2024'); // Change this password!

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    if ($_POST['password'] === SETUP_PASSWORD) {
        $_SESSION['authenticated'] = true;
    } else {
        $error = "Invalid password!";
    }
}

if (!isset($_SESSION['authenticated'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head><title>Setup Authentication</title></head>
    <body style="font-family:Arial;padding:50px;text-align:center;">
        <h2>Enter Setup Password</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="password" name="password" required style="padding:10px;font-size:16px;">
            <button type="submit" style="padding:10px 20px;font-size:16px;">Login</button>
        </form>
        <p style="color:#888;margin-top:30px;">Password is defined in this file (line 12)</p>
    </body>
    </html>
    <?php
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Little Prodigy Books - cPanel Setup</title>
    <style>
        body { font-family: Arial; padding: 20px; max-width: 900px; margin: 0 auto; }
        .btn { background: #007bff; color: white; padding: 10px 20px; border: none; cursor: pointer; margin: 5px; }
        .btn:hover { background: #0056b3; }
        .success { background: #d4edda; padding: 15px; margin: 10px 0; border-left: 4px solid #28a745; }
        .error { background: #f8d7da; padding: 15px; margin: 10px 0; border-left: 4px solid #dc3545; }
        .warning { background: #fff3cd; padding: 15px; margin: 10px 0; border-left: 4px solid #ffc107; }
        pre { background: #f4f4f4; padding: 10px; overflow-x: auto; }
        .section { margin: 30px 0; padding: 20px; border: 1px solid #ddd; }
    </style>
</head>
<body>

<h1>🚀 Little Prodigy Books - cPanel Setup</h1>
<p style="color:#888;">No SSH required! Perform all setup tasks from your browser.</p>

<?php

// Detect Laravel path
$laravelPaths = [
    'standard' => __DIR__.'/../little_prodigy_books',
    'direct' => __DIR__.'/..',
];

$laravelPath = null;
foreach ($laravelPaths as $key => $path) {
    if (file_exists($path.'/artisan')) {
        $laravelPath = $path;
        break;
    }
}

if (!$laravelPath) {
    echo "<div class='error'><strong>Error:</strong> Cannot find Laravel installation. Please upload Laravel files first.</div>";
    exit;
}

echo "<div class='success'><strong>✓ Laravel Found:</strong> <code>$laravelPath</code></div>";

// Action Handler
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    echo "<div class='section'>";
    
    switch ($action) {
        case 'generate_key':
            echo "<h3>Generate Application Key</h3>";
            $envPath = $laravelPath.'/.env';
            
            if (!file_exists($envPath)) {
                // Copy .env.example to .env
                if (file_exists($laravelPath.'/.env.example')) {
                    copy($laravelPath.'/.env.example', $envPath);
                    echo "<p class='success'>✓ Created .env file from .env.example</p>";
                } else {
                    echo "<p class='error'>✗ .env.example not found!</p>";
                    break;
                }
            }
            
            // Generate key
            $key = 'base64:'.base64_encode(random_bytes(32));
            $envContent = file_get_contents($envPath);
            
            // Replace APP_KEY
            if (preg_match('/APP_KEY=.*/', $envContent)) {
                $envContent = preg_replace('/APP_KEY=.*/', 'APP_KEY='.$key, $envContent);
            } else {
                $envContent .= "\nAPP_KEY=".$key;
            }
            
            file_put_contents($envPath, $envContent);
            echo "<div class='success'><strong>✓ Application key generated!</strong><br><code>$key</code></div>";
            echo "<p>Update your .env file if needed.</p>";
            break;
            
        case 'create_symlink':
            echo "<h3>Create Storage Symlink</h3>";
            $linkPath = __DIR__.'/storage';
            $targetPath = $laravelPath.'/storage/app/public';
            
            if (file_exists($linkPath)) {
                if (is_link($linkPath)) {
                    unlink($linkPath);
                    echo "<p>Removed existing symlink</p>";
                } else {
                    echo "<p class='error'>✗ A directory named 'storage' already exists. Please rename it first.</p>";
                    break;
                }
            }
            
            if (symlink($targetPath, $linkPath)) {
                echo "<div class='success'>✓ Storage symlink created successfully!</div>";
                echo "<p>Link: <code>$linkPath</code> → <code>$targetPath</code></p>";
            } else {
                echo "<div class='error'>✗ Failed to create symlink. Try this alternative:</div>";
                echo "<pre>&lt;?php\nsymlink('$targetPath', '$linkPath');\necho 'Done!';\n?&gt;</pre>";
                echo "<p>Save this code as create_link.php and run it once.</p>";
            }
            break;
            
        case 'clear_cache':
            echo "<h3>Clear Application Caches</h3>";
            $cacheFiles = [
                'config' => $laravelPath.'/bootstrap/cache/config.php',
                'routes' => $laravelPath.'/bootstrap/cache/routes.php',
                'services' => $laravelPath.'/bootstrap/cache/services.php',
            ];
            
            foreach ($cacheFiles as $name => $file) {
                if (file_exists($file)) {
                    unlink($file);
                    echo "<p class='success'>✓ Cleared $name cache</p>";
                } else {
                    echo "<p>$name cache already clear</p>";
                }
            }
            
            // Clear view cache
            $viewCachePath = $laravelPath.'/storage/framework/views';
            if (is_dir($viewCachePath)) {
                $files = glob($viewCachePath.'/*');
                $count = 0;
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file);
                        $count++;
                    }
                }
                echo "<p class='success'>✓ Cleared $count compiled views</p>";
            }
            
            echo "<div class='success'><strong>All caches cleared!</strong></div>";
            break;
            
        case 'check_permissions':
            echo "<h3>Check & Fix Permissions</h3>";
            $directories = [
                'storage' => $laravelPath.'/storage',
                'bootstrap/cache' => $laravelPath.'/bootstrap/cache',
            ];
            
            foreach ($directories as $name => $dir) {
                if (is_dir($dir)) {
                    $perms = substr(sprintf('%o', fileperms($dir)), -4);
                    echo "<p><strong>$name:</strong> Permissions <code>$perms</code></p>";
                    
                    if (chmod($dir, 0775)) {
                        echo "<p class='success'>✓ Set to 0775</p>";
                        
                        // Recursively set permissions
                        $iterator = new RecursiveIteratorIterator(
                            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
                            RecursiveIteratorIterator::SELF_FIRST
                        );
                        
                        $count = 0;
                        foreach ($iterator as $item) {
                            chmod($item, $item->isDir() ? 0775 : 0664);
                            $count++;
                        }
                        echo "<p>Updated $count files/folders</p>";
                    } else {
                        echo "<p class='warning'>⚠️ Could not change permissions automatically. Set via cPanel File Manager.</p>";
                    }
                }
            }
            break;
            
        case 'test_db':
            echo "<h3>Test Database Connection</h3>";
            $envPath = $laravelPath.'/.env';
            
            if (!file_exists($envPath)) {
                echo "<p class='error'>✗ .env file not found!</p>";
                break;
            }
            
            // Parse .env
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
            
            try {
                $conn = new PDO("mysql:host=$host", $user, $pass);
                echo "<p class='success'>✓ MySQL connection successful!</p>";
                
                // Check if database exists
                $stmt = $conn->query("SHOW DATABASES LIKE '$db'");
                if ($stmt->rowCount() > 0) {
                    echo "<p class='success'>✓ Database '<strong>$db</strong>' exists!</p>";
                    
                    // Try to connect to specific database
                    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                    
                    // Count tables
                    $stmt = $conn->query("SHOW TABLES");
                    $tableCount = $stmt->rowCount();
                    echo "<p class='success'>✓ Connected to database! Found $tableCount tables.</p>";
                } else {
                    echo "<p class='error'>✗ Database '<strong>$db</strong>' does not exist!</p>";
                    echo "<p>Create it in cPanel MySQL Databases.</p>";
                }
            } catch (PDOException $e) {
                echo "<div class='error'><strong>✗ Connection failed:</strong><br>" . $e->getMessage() . "</div>";
                echo "<p>Check your .env database credentials.</p>";
            }
            break;
            
        case 'show_env':
            echo "<h3>Environment File Preview</h3>";
            $envPath = $laravelPath.'/.env';
            
            if (file_exists($envPath)) {
                $envContent = file_get_contents($envPath);
                // Hide sensitive data
                $envContent = preg_replace('/(PASSWORD|KEY|SECRET)=.*/i', '$1=***HIDDEN***', $envContent);
                echo "<pre>$envContent</pre>";
                echo "<p><strong>Note:</strong> Passwords and keys are hidden. Edit via cPanel File Manager.</p>";
            } else {
                echo "<p class='error'>✗ .env file not found!</p>";
            }
            break;
    }
    
    echo "</div>";
    echo "<p><a href='cpanel_setup.php' class='btn'>← Back to Menu</a></p>";
    
} else {
    // Main Menu
    ?>
    <div class="section">
        <h2>Setup Tasks</h2>
        <p>Click a button to perform the setup task:</p>
        
        <a href="?action=generate_key" class="btn">1. Generate APP_KEY</a>
        <p style="margin-left:20px;color:#666;">Creates .env and generates application encryption key</p>
        
        <a href="?action=create_symlink" class="btn">2. Create Storage Symlink</a>
        <p style="margin-left:20px;color:#666;">Links /public/storage to /storage/app/public (for images)</p>
        
        <a href="?action=check_permissions" class="btn">3. Fix Permissions</a>
        <p style="margin-left:20px;color:#666;">Sets correct permissions for storage and cache directories</p>
        
        <a href="?action=clear_cache" class="btn">4. Clear All Caches</a>
        <p style="margin-left:20px;color:#666;">Clears config, route, and view caches</p>
        
        <a href="?action=test_db" class="btn">5. Test Database Connection</a>
        <p style="margin-left:20px;color:#666;">Verifies MySQL connection and database access</p>
        
        <a href="?action=show_env" class="btn">6. Show .env File</a>
        <p style="margin-left:20px;color:#666;">Preview environment configuration (passwords hidden)</p>
    </div>
    
    <div class="warning">
        <h3>⚠️ Important Security Notice</h3>
        <p><strong>DELETE THIS FILE</strong> (<code>cpanel_setup.php</code>) after completing setup!</p>
        <p>This file contains powerful functions and should not be left on a production server.</p>
    </div>
    
    <div class="section">
        <h3>Manual Steps (via cPanel)</h3>
        <ol>
            <li><strong>Upload Files:</strong> Upload Laravel to <code>/little_prodigy_books/</code> and public contents to <code>/public_html/</code></li>
            <li><strong>Update index.php:</strong> Change paths to point to <code>../little_prodigy_books/</code></li>
            <li><strong>Edit .env:</strong> Update database credentials, APP_URL, APP_DEBUG=false</li>
            <li><strong>Import Database:</strong> Use phpMyAdmin to import flip.sql</li>
            <li><strong>Run Setup Tasks:</strong> Use buttons above</li>
            <li><strong>Test:</strong> Visit <a href="/" target="_blank">https://littleprodigybooks.in</a></li>
        </ol>
    </div>
    <?php
}
?>

<hr>
<p style="color:#888;text-align:center;">Little Prodigy Books Setup Tool | <?php echo date('Y-m-d H:i:s'); ?></p>

</body>
</html>
