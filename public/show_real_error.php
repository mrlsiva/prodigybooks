<?php
// Show the ACTUAL Laravel error
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', 1);

echo "<!DOCTYPE html><html><body style='font-family:monospace;padding:20px;background:#1e1e1e;color:#fff;'>";
echo "<h1>🔍 Laravel Error Detection</h1>";

// Capture output
ob_start();

try {
    require __DIR__.'/../vendor/autoload.php';
    $app = require_once __DIR__.'/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    
    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );
    
    $content = $response->getContent();
    $statusCode = $response->getStatusCode();
    
    echo "<h2>Response Status: <span style='color:".($statusCode == 200 ? '#0f0' : '#f00')."'>$statusCode</span></h2>";
    echo "<h3>Content Length: " . strlen($content) . " bytes</h3>";
    
    if (empty($content)) {
        echo "<div style='background:#ff0000;color:#fff;padding:20px;margin:20px 0;'>";
        echo "<h2>⚠️ EMPTY RESPONSE!</h2>";
        echo "<p>Laravel returned NO content. Checking logs...</p>";
        echo "</div>";
        
        // Check latest log
        $logFile = __DIR__.'/../storage/logs/laravel.log';
        if (file_exists($logFile)) {
            $logs = file_get_contents($logFile);
            $lastLines = array_slice(explode("\n", $logs), -50);
            
            echo "<h3>📋 Last 50 lines of laravel.log:</h3>";
            echo "<pre style='background:#000;padding:20px;overflow:auto;max-height:400px;'>";
            echo htmlspecialchars(implode("\n", $lastLines));
            echo "</pre>";
        } else {
            echo "<p style='color:#f00;'>Log file doesn't exist yet!</p>";
        }
        
    } else {
        echo "<h3>✓ Got content! First 500 chars:</h3>";
        echo "<pre style='background:#000;padding:20px;overflow:auto;'>";
        echo htmlspecialchars(substr($content, 0, 500));
        echo "</pre>";
    }
    
    $kernel->terminate($request, $response);
    
} catch (\Throwable $e) {
    echo "<div style='background:#ff0000;color:#fff;padding:20px;margin:20px 0;'>";
    echo "<h2>💥 EXCEPTION CAUGHT!</h2>";
    echo "<h3>Error: " . htmlspecialchars($e->getMessage()) . "</h3>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
    echo "<p><strong>Line:</strong> " . $e->getLine() . "</p>";
    echo "<h3>Stack Trace:</h3>";
    echo "<pre style='background:#000;padding:10px;overflow:auto;max-height:300px;'>";
    echo htmlspecialchars($e->getTraceAsString());
    echo "</pre>";
    echo "</div>";
}

$output = ob_get_clean();
echo $output;

echo "</body></html>";
?>
