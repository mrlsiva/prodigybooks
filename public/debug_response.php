<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', 0); // Don't show errors in output

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Don't send response yet - check it first
$content = $response->getContent();
$status = $response->getStatusCode();

if (empty($content)) {
    // Response is empty - show diagnostic
    header('Content-Type: text/html');
    echo "<h1 style='color:red;'>ERROR: Empty Response</h1>";
    echo "<p>Status Code: $status</p>";
    echo "<p>Content Length: " . strlen($content) . " bytes</p>";
    
    echo "<h2>Checking Laravel Log:</h2>";
    $logPath = __DIR__.'/../storage/logs/laravel.log';
    if (file_exists($logPath)) {
        $log = file_get_contents($logPath);
        $lines = explode("\n", $log);
        $last = array_slice($lines, -50);
        echo "<pre style='background:#000;color:#0f0;padding:20px;max-height:400px;overflow:auto;'>";
        echo htmlspecialchars(implode("\n", $last));
        echo "</pre>";
    } else {
        echo "<p>No log file exists</p>";
    }
    
    echo "<h2>Check storage/logs directory permissions:</h2>";
    $logsDir = __DIR__.'/../storage/logs';
    if (!is_dir($logsDir)) {
        echo "<p style='color:red;'>✗ storage/logs directory MISSING!</p>";
        mkdir($logsDir, 0775, true);
        echo "<p style='color:green;'>✓ Created storage/logs directory</p>";
        echo "<p>Refresh the main page now!</p>";
    } else {
        $writable = is_writable($logsDir);
        echo "<p>Exists: Yes | Writable: " . ($writable ? 'Yes' : 'NO - FIX THIS') . "</p>";
        
        if (!$writable) {
            chmod($logsDir, 0775);
            echo "<p>Attempted to fix permissions</p>";
        }
    }
} else {
    // Response has content - send it
    $response->send();
}

$kernel->terminate($request, $response);
?>
