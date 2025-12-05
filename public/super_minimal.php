<?php
// Super minimal - check each step
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(60);

echo "1. PHP works<br>";
flush();

try {
    echo "2. Loading vendor/autoload.php...<br>";
    flush();
    require __DIR__.'/../vendor/autoload.php';
    echo "3. Autoload successful!<br>";
    flush();
} catch (\Throwable $e) {
    die("AUTOLOAD ERROR: " . $e->getMessage());
}

try {
    echo "4. Loading bootstrap/app.php...<br>";
    flush();
    $app = require_once __DIR__.'/../bootstrap/app.php';
    echo "5. Bootstrap successful!<br>";
    flush();
    echo "6. App class: " . get_class($app) . "<br>";
    flush();
} catch (\Throwable $e) {
    die("BOOTSTRAP ERROR: " . $e->getMessage());
}

try {
    echo "7. Making kernel...<br>";
    flush();
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    echo "8. Kernel created!<br>";
    flush();
} catch (\Throwable $e) {
    die("KERNEL ERROR: " . $e->getMessage());
}

try {
    echo "9. Capturing request...<br>";
    flush();
    $request = Illuminate\Http\Request::capture();
    echo "10. Request captured!<br>";
    flush();
    echo "11. URL: " . $request->url() . "<br>";
    flush();
} catch (\Throwable $e) {
    die("REQUEST ERROR: " . $e->getMessage());
}

try {
    echo "12. Handling request (this may take a while)...<br>";
    flush();
    $response = $kernel->handle($request);
    echo "13. Response received!<br>";
    echo "14. Status: " . $response->getStatusCode() . "<br>";
    echo "15. Content length: " . strlen($response->getContent()) . "<br>";
    flush();
    
    if ($response->getStatusCode() >= 400) {
        echo "<hr><h2>ERROR RESPONSE:</h2>";
        echo "<pre>" . htmlspecialchars(substr($response->getContent(), 0, 5000)) . "</pre>";
    } else {
        echo "16. Sending response...<br>";
        flush();
        $response->send();
    }
} catch (\Throwable $e) {
    echo "<hr><h1>HANDLE ERROR</h1>";
    echo "<h2>" . get_class($e) . "</h2>";
    echo "<h3>" . htmlspecialchars($e->getMessage()) . "</h3>";
    echo "<p>File: " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
?>
