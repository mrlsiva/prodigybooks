<?php
// Catch the exact error when loading homepage
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display, we'll capture it

ob_start();

try {
    require __DIR__.'/../vendor/autoload.php';
    $app = require_once __DIR__.'/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    
    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );
    
    // If we got here, get the response
    $statusCode = $response->getStatusCode();
    $content = $response->getContent();
    
    // Clean buffer
    ob_end_clean();
    
    // Send response normally
    $response->send();
    $kernel->terminate($request, $response);
    
} catch (\Throwable $e) {
    ob_end_clean();
    
    // Display the error
    header('Content-Type: text/html; charset=utf-8');
    echo "<!DOCTYPE html><html><body style='font-family:monospace;padding:20px;background:#1a1a1a;color:#fff;'>";
    echo "<h1 style='color:#ff4444;'>💥 Fatal Error Caught</h1>";
    echo "<div style='background:#2d2d2d;padding:20px;border-left:4px solid #ff4444;margin:20px 0;'>";
    echo "<h2>" . htmlspecialchars(get_class($e)) . "</h2>";
    echo "<h3 style='color:#ffaa00;'>" . htmlspecialchars($e->getMessage()) . "</h3>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
    echo "<p><strong>Line:</strong> " . $e->getLine() . "</p>";
    echo "</div>";
    
    echo "<h3>Stack Trace:</h3>";
    echo "<pre style='background:#000;padding:20px;overflow:auto;max-height:500px;border:1px solid #444;'>";
    echo htmlspecialchars($e->getTraceAsString());
    echo "</pre>";
    
    // Also check if there's a previous exception
    if ($e->getPrevious()) {
        echo "<hr style='margin:30px 0;border-color:#444;'>";
        echo "<h2 style='color:#ff4444;'>Previous Exception:</h2>";
        $prev = $e->getPrevious();
        echo "<div style='background:#2d2d2d;padding:20px;border-left:4px solid #ff4444;'>";
        echo "<h3>" . htmlspecialchars(get_class($prev)) . "</h3>";
        echo "<h4 style='color:#ffaa00;'>" . htmlspecialchars($prev->getMessage()) . "</h4>";
        echo "<p><strong>File:</strong> " . htmlspecialchars($prev->getFile()) . "</p>";
        echo "<p><strong>Line:</strong> " . $prev->getLine() . "</p>";
        echo "</div>";
    }
    
    echo "</body></html>";
}
?>
