<?php
// Test if we can even render a simple view
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', 1);

try {
    require __DIR__.'/../vendor/autoload.php';
    $app = require_once __DIR__.'/../bootstrap/app.php';
    
    // Boot the application
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    
    echo "<!DOCTYPE html><html><body style='font-family:Arial;padding:20px;'>";
    echo "<h1>View Test</h1>";
    
    // Test 1: Can we query the database?
    echo "<h2>Test 1: Database Connection</h2>";
    $categories = \App\Categories::count();
    echo "<p style='color:green;'>✓ Database works! Found $categories categories</p>";
    
    // Test 2: Can we render a simple view?
    echo "<h2>Test 2: View Rendering</h2>";
    try {
        $view = view('welcome')->render();
        echo "<p style='color:green;'>✓ View rendering works!</p>";
    } catch (\Exception $e) {
        echo "<p style='color:orange;'>⚠ Welcome view error: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<p>This is OK if welcome.blade.php doesn't exist.</p>";
    }
    
    // Test 3: Check if homepage view exists
    echo "<h2>Test 3: Homepage View</h2>";
    $homePath = __DIR__.'/../resources/views/homepage.blade.php';
    echo "<p>Homepage view path: $homePath</p>";
    echo "<p>Exists: " . (file_exists($homePath) ? '✓ YES' : '✗ NO') . "</p>";
    
    // Test 4: List all views
    echo "<h2>Test 4: Available Views</h2>";
    $viewsPath = __DIR__.'/../resources/views';
    $files = scandir($viewsPath);
    echo "<ul>";
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "<li>$file</li>";
        }
    }
    echo "</ul>";
    
    echo "</body></html>";
    
} catch (\Throwable $e) {
    echo "<h1 style='color:red;'>Error!</h1>";
    echo "<h3>" . htmlspecialchars($e->getMessage()) . "</h3>";
    echo "<p>File: " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
?>
