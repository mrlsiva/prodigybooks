<?php
// Show PHP Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Checking Laravel error log...<br><br>";

$logPath = __DIR__.'/../storage/logs/laravel.log';

if (file_exists($logPath)) {
    $log = file_get_contents($logPath);
    $lines = explode("\n", $log);
    
    // Get last 100 lines
    $recent = array_slice($lines, -100);
    
    echo "<h2>Last Error in Laravel Log:</h2>";
    echo "<pre style='background:#000;color:#0f0;padding:20px;overflow:auto;max-height:500px;'>";
    echo htmlspecialchars(implode("\n", $recent));
    echo "</pre>";
} else {
    echo "<p style='color:red;'>No log file found at: $logPath</p>";
    echo "<p>Trying to trigger an error to see what happens...</p>";
    
    try {
        require __DIR__.'/../vendor/autoload.php';
        $app = require_once __DIR__.'/../bootstrap/app.php';
        $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
        $response = $kernel->handle(
            $request = Illuminate\Http\Request::capture()
        );
        $response->send();
    } catch (Exception $e) {
        echo "<h2 style='color:red;'>ERROR CAUGHT:</h2>";
        echo "<pre style='background:#fee;padding:20px;'>";
        echo $e->getMessage() . "\n\n";
        echo "File: " . $e->getFile() . "\n";
        echo "Line: " . $e->getLine() . "\n\n";
        echo $e->getTraceAsString();
        echo "</pre>";
    }
}
?>
