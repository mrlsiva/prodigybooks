<?php
/**
 * cPanel Diagnostic Tool - Upload to public_html
 * Access: https://littleprodigybooks.in/cpanel_diagnostic.php
 * DELETE THIS FILE AFTER DIAGNOSING!
 */

echo "<h1>Little Prodigy Books - Diagnostic Report</h1>";
echo "<style>body{font-family:Arial;padding:20px;} .ok{color:green;} .error{color:red;} .warning{color:orange;} pre{background:#f4f4f4;padding:10px;}</style>";

// 1. PHP Version Check
echo "<h2>1. PHP Version</h2>";
$phpVersion = phpversion();
echo "<p class='" . (version_compare($phpVersion, '8.2', '>=') ? 'ok' : 'error') . "'>PHP Version: <strong>$phpVersion</strong></p>";
if (version_compare($phpVersion, '8.2', '<')) {
    echo "<p class='error'>⚠️ Laravel 10 requires PHP 8.2+. Please update PHP version in cPanel.</p>";
}

// 2. Required PHP Extensions
echo "<h2>2. Required PHP Extensions</h2>";
$requiredExtensions = [
    'PDO', 'pdo_mysql', 'mbstring', 'openssl', 'tokenizer', 
    'XML', 'ctype', 'json', 'BCMath', 'fileinfo'
];
foreach ($requiredExtensions as $ext) {
    $loaded = extension_loaded($ext);
    echo "<p class='" . ($loaded ? 'ok' : 'error') . "'>$ext: " . ($loaded ? '✓ Loaded' : '✗ Missing') . "</p>";
}

// 3. File Structure Check
echo "<h2>3. File Structure</h2>";
$currentDir = __DIR__;
echo "<p>Current Directory: <code>$currentDir</code></p>";

// Check for Laravel files
$laravelPaths = [
    'Same Level (../vendor)' => __DIR__.'/../vendor/autoload.php',
    'Custom Level (../little_prodigy_books/vendor)' => __DIR__.'/../little_prodigy_books/vendor/autoload.php',
    'Root Level (../../little_prodigy_books/vendor)' => __DIR__.'/../../little_prodigy_books/vendor/autoload.php',
];

echo "<p><strong>Searching for Laravel files:</strong></p>";
$foundPath = null;
foreach ($laravelPaths as $label => $path) {
    $exists = file_exists($path);
    echo "<p class='" . ($exists ? 'ok' : 'error') . "'>$label: <code>$path</code> - " . ($exists ? '✓ Found' : '✗ Not Found') . "</p>";
    if ($exists && !$foundPath) {
        $foundPath = $path;
    }
}

if ($foundPath) {
    echo "<div style='background:#d4edda;padding:15px;margin:10px 0;'><strong>✓ Laravel Found!</strong><br>Use this path in index.php: <code>$foundPath</code></div>";
} else {
    echo "<div style='background:#f8d7da;padding:15px;margin:10px 0;'><strong>✗ Laravel Not Found!</strong><br>Please upload Laravel files to the server.</div>";
}

// 4. Permissions Check
echo "<h2>4. Directory Permissions</h2>";
$pathsToCheck = [
    'storage' => __DIR__.'/../storage',
    'bootstrap/cache' => __DIR__.'/../bootstrap/cache',
];

if (strpos($foundPath, 'little_prodigy_books') !== false) {
    $pathsToCheck = [
        'storage' => __DIR__.'/../little_prodigy_books/storage',
        'bootstrap/cache' => __DIR__.'/../little_prodigy_books/bootstrap/cache',
    ];
}

foreach ($pathsToCheck as $label => $path) {
    if (file_exists($path)) {
        $perms = substr(sprintf('%o', fileperms($path)), -4);
        $writable = is_writable($path);
        echo "<p class='" . ($writable ? 'ok' : 'error') . "'>$label: Permissions <code>$perms</code> - " . ($writable ? '✓ Writable' : '✗ Not Writable') . "</p>";
    } else {
        echo "<p class='error'>$label: <code>$path</code> ✗ Not Found</p>";
    }
}

// 5. .env File Check
echo "<h2>5. Environment Configuration</h2>";
$envPaths = [
    __DIR__.'/../.env',
    __DIR__.'/../little_prodigy_books/.env',
];

$envFound = false;
foreach ($envPaths as $envPath) {
    if (file_exists($envPath)) {
        echo "<p class='ok'>✓ .env file found at: <code>$envPath</code></p>";
        $envFound = true;
        
        // Check critical env values (without exposing sensitive data)
        $envContent = file_get_contents($envPath);
        $checks = [
            'APP_KEY' => strpos($envContent, 'APP_KEY=base64:') !== false,
            'DB_DATABASE' => strpos($envContent, 'DB_DATABASE=') !== false,
            'DB_USERNAME' => strpos($envContent, 'DB_USERNAME=') !== false,
        ];
        
        foreach ($checks as $key => $exists) {
            echo "<p class='" . ($exists ? 'ok' : 'warning') . "'>$key: " . ($exists ? '✓ Set' : '⚠️ Missing') . "</p>";
        }
        break;
    }
}

if (!$envFound) {
    echo "<p class='error'>✗ .env file not found! Copy .env.example to .env</p>";
}

// 6. Storage Symlink Check
echo "<h2>6. Storage Symlink</h2>";
$storageLinkPath = __DIR__.'/storage';
if (file_exists($storageLinkPath)) {
    if (is_link($storageLinkPath)) {
        $target = readlink($storageLinkPath);
        echo "<p class='ok'>✓ Storage symlink exists</p>";
        echo "<p>Target: <code>$target</code></p>";
    } else {
        echo "<p class='warning'>⚠️ Storage directory exists but is NOT a symlink</p>";
    }
} else {
    echo "<p class='error'>✗ Storage symlink missing - images won't load!</p>";
}

// 7. Apache Modules
echo "<h2>7. Apache Configuration</h2>";
if (function_exists('apache_get_modules')) {
    $modules = apache_get_modules();
    $required = ['mod_rewrite'];
    foreach ($required as $mod) {
        $loaded = in_array($mod, $modules);
        echo "<p class='" . ($loaded ? 'ok' : 'error') . "'>$mod: " . ($loaded ? '✓ Enabled' : '✗ Disabled') . "</p>";
    }
} else {
    echo "<p class='warning'>⚠️ Cannot check Apache modules (might be running different server)</p>";
}

// 8. Database Connection Test
echo "<h2>8. Database Connection</h2>";
if ($envFound) {
    try {
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
        
        if ($db && $user) {
            $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            echo "<p class='ok'>✓ Database connection successful!</p>";
            echo "<p>Database: <code>$db</code></p>";
        } else {
            echo "<p class='error'>✗ Database credentials missing in .env</p>";
        }
    } catch (PDOException $e) {
        echo "<p class='error'>✗ Database connection failed: " . $e->getMessage() . "</p>";
    }
}

// 9. Recommendations
echo "<h2>9. Recommendations</h2>";
echo "<div style='background:#fff3cd;padding:15px;'>";
echo "<h3>Next Steps:</h3>";
echo "<ol>";
if ($foundPath) {
    $relativePath = str_replace(__DIR__.'/', '', $foundPath);
    echo "<li>Update <code>index.php</code> to use: <code>__DIR__.'/$relativePath'</code></li>";
}
if (!$envFound) {
    echo "<li>Create .env file from .env.example</li>";
    echo "<li>Run key generation using cpanel_setup.php</li>";
}
echo "<li>Set storage and bootstrap/cache permissions to 775 via cPanel File Manager</li>";
if (!file_exists($storageLinkPath)) {
    echo "<li>Create storage symlink using cpanel_setup.php</li>";
}
echo "<li><strong>DELETE THIS DIAGNOSTIC FILE after fixing issues!</strong></li>";
echo "</ol>";
echo "</div>";

echo "<hr><p style='color:#888;'>Generated: " . date('Y-m-d H:i:s') . "</p>";
?>
