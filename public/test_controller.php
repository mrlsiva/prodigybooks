<?php
// Test just the controller logic without rendering view
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(60);

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "<!DOCTYPE html><html><body style='font-family:Arial;padding:20px;'>";
echo "<h1>Controller Test (No View Rendering)</h1>";

try {
    echo "<p>1. Getting categories...</p>";
    flush();
    
    $categories = \App\Categories::all();
    echo "<p style='color:green;'>✓ Found " . $categories->count() . " categories</p>";
    flush();
    
    echo "<p>2. Checking Auth...</p>";
    flush();
    
    $user = \Illuminate\Support\Facades\Auth::user();
    if ($user) {
        echo "<p style='color:green;'>✓ User logged in: " . $user->id . "</p>";
    } else {
        echo "<p style='color:green;'>✓ No user logged in (guest)</p>";
    }
    flush();
    
    echo "<p>3. Controller would return view 'welcome' with categories</p>";
    echo "<p style='color:green;'>✓ Controller logic works!</p>";
    
    echo "<hr><p>4. Now testing view rendering...</p>";
    flush();
    
    $startTime = microtime(true);
    $view = view('welcome', ['categories' => $categories, 'offlineUser' => '']);
    $renderTime = microtime(true) - $startTime;
    
    echo "<p style='color:orange;'>⚠ View created in " . number_format($renderTime, 3) . "s</p>";
    flush();
    
    echo "<p>5. Rendering view content...</p>";
    flush();
    
    $startRender = microtime(true);
    $content = $view->render();
    $fullRenderTime = microtime(true) - $startRender;
    
    echo "<p style='color:green;'>✓ View rendered in " . number_format($fullRenderTime, 3) . "s</p>";
    echo "<p>Content length: " . strlen($content) . " bytes</p>";
    
    echo "<hr><h2 style='color:green;'>✅ Everything works!</h2>";
    echo "<p><a href='/public/' style='font-size:20px;'>Try homepage now</a></p>";
    
} catch (\Throwable $e) {
    echo "<hr><h2 style='color:red;'>Error!</h2>";
    echo "<h3>" . htmlspecialchars($e->getMessage()) . "</h3>";
    echo "<p>File: " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}

echo "</body></html>";
?>
