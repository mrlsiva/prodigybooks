<?php
// Minimal Laravel bootstrap to find the exact error
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 0); // Don't log, just display

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

try {
    $request = Illuminate\Http\Request::capture();
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    echo "<h1 style='color:red;font-family:Arial;'>Fatal Error</h1>";
    echo "<h2>" . get_class($e) . "</h2>";
    echo "<h3>" . htmlspecialchars($e->getMessage()) . "</h3>";
    echo "<p><b>File:</b> " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";
    echo "<pre style='background:#f5f5f5;padding:15px;overflow:auto;'>";
    echo htmlspecialchars($e->getTraceAsString());
    echo "</pre>";
}
?>
