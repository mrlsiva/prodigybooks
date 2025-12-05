<?php
// Simple Test - Check if views compile
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', 1);

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

use Illuminate\Support\Facades\DB;

echo "<!DOCTYPE html><html><body style='font-family:Arial;padding:20px;'>";
echo "<h2>Testing View Rendering</h2>";

try {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $request = Illuminate\Http\Request::capture();
    $kernel->bootstrap();
    
    echo "<p>✓ Laravel loaded</p>";
    
    // Test database connection
    $categories = DB::table('categories')->count();
    echo "<p>✓ Database connected: $categories categories found</p>";
    
    // Test if view file exists
    $viewPath = base_path('resources/views/welcome.blade.php');
    if (file_exists($viewPath)) {
        echo "<p>✓ View file exists: welcome.blade.php</p>";
    }
    
    $layoutPath = base_path('resources/views/layouts/app.blade.php');
    if (file_exists($layoutPath)) {
        echo "<p>✓ Layout file exists: layouts/app.blade.php</p>";
    }
    
    // Check storage/views folder
    $compiledViewsPath = storage_path('framework/views');
    if (!is_dir($compiledViewsPath)) {
        echo "<p style='color:red;'>✗ Compiled views directory missing!</p>";
        mkdir($compiledViewsPath, 0775, true);
        echo "<p style='color:green;'>✓ Created compiled views directory</p>";
    } else {
        echo "<p>✓ Compiled views directory exists</p>";
    }
    
    // Check if it's writable
    if (is_writable($compiledViewsPath)) {
        echo "<p>✓ Compiled views directory is writable</p>";
    } else {
        echo "<p style='color:red;'>✗ Compiled views directory NOT writable!</p>";
        echo "<p>Fix: chmod 775 /home/littleprodigy/public_html/storage/framework/views</p>";
    }
    
    // Try to render the view
    echo "<h3>Attempting to render view...</h3>";
    $categories = App\Categories::all();
    $html = view('welcome', ['categories' => $categories, 'offlineUser' => ''])->render();
    
    if (!empty($html)) {
        echo "<p style='color:green;'>✓ View rendered successfully! (" . strlen($html) . " bytes)</p>";
        echo "<p>The homepage should work now!</p>";
    } else {
        echo "<p style='color:red;'>✗ View rendered but is empty</p>";
    }
    
} catch (\Exception $e) {
    echo "<h3 style='color:red;'>ERROR:</h3>";
    echo "<pre style='background:#fee;padding:10px;'>";
    echo "Message: " . $e->getMessage() . "\n\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
    echo "</pre>";
}

echo "<hr><p><a href='/public/'>← Back to homepage</a></p>";
echo "</body></html>";
?>
