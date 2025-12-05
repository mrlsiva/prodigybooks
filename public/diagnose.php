<?php
// Complete Diagnostic - Find the exact issue
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(30);

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Complete Diagnostic</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        .section { background: white; padding: 15px; margin: 10px 0; border-left: 4px solid #007bff; }
        .ok { color: green; }
        .error { color: red; }
        .warning { color: orange; }
        pre { background: #f4f4f4; padding: 10px; overflow-x: auto; }
    </style>
</head>
<body>
<h1>🔍 Complete Diagnostic Report</h1>

<?php
echo "<div class='section'><h2>1. PHP Environment</h2>";
echo "<p>PHP Version: <strong>" . phpversion() . "</strong></p>";
echo "<p>Server: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "<p>Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p>Script Path: " . __FILE__ . "</p>";
echo "</div>";

echo "<div class='section'><h2>2. File Structure</h2>";
$paths = [
    'Vendor' => __DIR__.'/../vendor/autoload.php',
    'Bootstrap' => __DIR__.'/../bootstrap/app.php',
    '.env' => __DIR__.'/../.env',
    'Welcome View' => __DIR__.'/../resources/views/welcome.blade.php',
    'App Layout' => __DIR__.'/../resources/views/layouts/app.blade.php',
    'Storage/views' => __DIR__.'/../storage/framework/views',
];

foreach ($paths as $name => $path) {
    $exists = file_exists($path);
    $class = $exists ? 'ok' : 'error';
    $icon = $exists ? '✓' : '✗';
    echo "<p class='$class'>$icon $name: " . ($exists ? 'Found' : 'Missing') . "</p>";
    if ($exists && is_dir($path)) {
        $writable = is_writable($path);
        $wClass = $writable ? 'ok' : 'error';
        echo "<p class='$wClass' style='margin-left:20px;'>Writable: " . ($writable ? 'Yes' : 'No') . "</p>";
    }
}
echo "</div>";

echo "<div class='section'><h2>3. Environment File</h2>";
$envPath = __DIR__.'/../.env';
if (file_exists($envPath)) {
    $envContent = file_get_contents($envPath);
    $envLines = explode("\n", $envContent);
    $important = ['APP_KEY', 'APP_DEBUG', 'APP_URL', 'DB_CONNECTION', 'DB_HOST', 'DB_DATABASE', 'DB_USERNAME'];
    
    foreach ($important as $key) {
        foreach ($envLines as $line) {
            if (strpos($line, $key.'=') === 0) {
                $value = substr($line, strlen($key)+1);
                if (in_array($key, ['DB_PASSWORD', 'APP_KEY'])) {
                    $value = substr($value, 0, 10) . '...';
                }
                echo "<p><code>$key</code> = <code>$value</code></p>";
                break;
            }
        }
    }
} else {
    echo "<p class='error'>✗ .env file not found!</p>";
}
echo "</div>";

echo "<div class='section'><h2>4. Database Connection</h2>";
try {
    // Parse .env manually
    $envLines = file($envPath);
    $env = [];
    foreach ($envLines as $line) {
        if (strpos($line, '=') !== false && strpos(trim($line), '#') !== 0) {
            list($k, $v) = explode('=', trim($line), 2);
            $env[trim($k)] = trim($v);
        }
    }
    
    $host = $env['DB_HOST'] ?? 'localhost';
    $db = $env['DB_DATABASE'] ?? '';
    $user = $env['DB_USERNAME'] ?? '';
    $pass = $env['DB_PASSWORD'] ?? '';
    
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    echo "<p class='ok'>✓ Database connection successful!</p>";
    
    $stmt = $pdo->query("SELECT COUNT(*) FROM categories");
    $count = $stmt->fetchColumn();
    echo "<p class='ok'>✓ Found $count categories</p>";
    
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    $count = $stmt->fetchColumn();
    echo "<p class='ok'>✓ Found $count users</p>";
    
} catch (Exception $e) {
    echo "<p class='error'>✗ Database error: " . $e->getMessage() . "</p>";
}
echo "</div>";

echo "<div class='section'><h2>5. Laravel Bootstrap Test</h2>";
try {
    require __DIR__.'/../vendor/autoload.php';
    echo "<p class='ok'>✓ Autoloader loaded</p>";
    
    $app = require_once __DIR__.'/../bootstrap/app.php';
    echo "<p class='ok'>✓ Bootstrap file loaded</p>";
    
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    echo "<p class='ok'>✓ Kernel created</p>";
    
    // Try to handle a simple request with timeout
    $start = microtime(true);
    
    ob_start();
    $request = Illuminate\Http\Request::capture();
    $response = $kernel->handle($request);
    $output = ob_get_clean();
    
    $duration = round(microtime(true) - $start, 2);
    
    echo "<p class='ok'>✓ Request handled in {$duration}s</p>";
    echo "<p>Response Status: <strong>" . $response->getStatusCode() . "</strong></p>";
    echo "<p>Response Size: <strong>" . strlen($response->getContent()) . " bytes</strong></p>";
    
    if (strlen($response->getContent()) == 0) {
        echo "<p class='error'>⚠️ Response is empty! This is your problem.</p>";
        echo "<p>Checking Laravel logs...</p>";
        
        $logPath = __DIR__.'/../storage/logs/laravel.log';
        if (file_exists($logPath)) {
            $logContent = file_get_contents($logPath);
            $lines = explode("\n", $logContent);
            $lastLines = array_slice($lines, -20);
            echo "<pre>" . htmlspecialchars(implode("\n", $lastLines)) . "</pre>";
        } else {
            echo "<p>No log file found</p>";
        }
    } else {
        echo "<p class='ok'>✓ Response contains content!</p>";
        echo "<p><strong>Your site should be working!</strong></p>";
    }
    
    $kernel->terminate($request, $response);
    
} catch (Exception $e) {
    echo "<p class='error'>✗ Laravel Error:</p>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
    echo "<p>File: " . $e->getFile() . " (Line " . $e->getLine() . ")</p>";
}
echo "</div>";

echo "<div class='section'><h2>6. Recommendation</h2>";
echo "<p><strong>Based on the diagnostics above:</strong></p>";
echo "<ol>";
echo "<li>If database connection failed → Fix .env credentials</li>";
echo "<li>If response is empty → Check Laravel log above for errors</li>";
echo "<li>If everything passed → Visit <a href='/public/'>your homepage</a></li>";
echo "</ol>";
echo "<p><a href='/public/' style='display:inline-block;background:#007bff;color:white;padding:10px 20px;text-decoration:none;margin-top:10px;'>← Go to Homepage</a></p>";
echo "</div>";
?>

<script>
// Auto refresh after 1 second if still loading
if (document.body.innerText.includes('Bootstrapping')) {
    setTimeout(() => location.reload(), 1000);
}
</script>
</body>
</html>
