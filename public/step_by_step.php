<?php
// Force enable error display and turn off output buffering
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

// Disable any output buffering
while (ob_get_level()) {
    ob_end_clean();
}

echo "Starting Laravel...<br>";
flush();

try {
    echo "Loading autoload...<br>";
    flush();
    require __DIR__.'/../vendor/autoload.php';
    
    echo "Loading bootstrap...<br>";
    flush();
    $app = require_once __DIR__.'/../bootstrap/app.php';
    
    echo "Creating kernel...<br>";
    flush();
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    
    echo "Capturing request...<br>";
    flush();
    $request = Illuminate\Http\Request::capture();
    
    echo "Handling request...<br>";
    flush();
    $response = $kernel->handle($request);
    
    echo "Sending response...<br>";
    flush();
    $response->send();
    
    $kernel->terminate($request, $response);
    
} catch (\Throwable $e) {
    echo "<hr>";
    echo "<h1 style='color:red;'>Error Caught!</h1>";
    echo "<h2>" . get_class($e) . "</h2>";
    echo "<h3>" . htmlspecialchars($e->getMessage()) . "</h3>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
?>
