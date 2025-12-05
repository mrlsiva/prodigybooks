<?php
// Error Display - Shows what's breaking
// Upload to: /home/littleprodigy/public_html/public/
// DELETE after viewing error!

// Hide deprecation warnings from PHP 8.4
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Laravel Diagnostic</title></head><body>";
echo "<h2>Loading Laravel...</h2>";
echo "<style>body{font-family:monospace;padding:20px;background:#000;color:#0f0;}</style>";

try {
    echo "<p>1. Loading autoloader...</p>";
    require __DIR__.'/../vendor/autoload.php';
    echo "<p style='color:#0f0;'>✓ Autoloader loaded</p>";
    
    echo "<p>2. Loading Laravel app...</p>";
    $app = require_once __DIR__.'/../bootstrap/app.php';
    echo "<p style='color:#0f0;'>✓ Laravel app loaded</p>";
    
    echo "<p>3. Creating kernel...</p>";
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    echo "<p style='color:#0f0;'>✓ Kernel created</p>";
    
    echo "<p>4. Handling request...</p>";
    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );
    echo "<p style='color:#0f0;'>✓ Request handled</p>";
    
    echo "<hr><p style='color:#fff;'>Laravel is working! Sending response...</p><hr>";
    
    $response->send();
    
    $kernel->terminate($request, $response);
    
} catch (\Exception $e) {
    echo "<hr><h2 style='color:#f00;'>ERROR FOUND:</h2>";
    echo "<pre style='color:#ff0;background:#300;padding:20px;'>";
    echo "Message: " . $e->getMessage() . "\n\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n\n";
    echo "Stack Trace:\n" . $e->getTraceAsString();
    echo "</pre>";
    
    echo "<hr><h3>Common Fixes:</h3>";
    echo "<ul style='color:#fff;'>";
    echo "<li>Check .env file exists and has correct values</li>";
    echo "<li>Check APP_KEY is set</li>";
    echo "<li>Check database credentials</li>";
    echo "<li>Check storage/logs folder is writable</li>";
    echo "<li>Clear cache: delete files in bootstrap/cache/</li>";
    echo "</ul>";
}
?>
