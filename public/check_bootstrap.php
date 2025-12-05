<?php
// Check if bootstrap/app.php has the header bug
$file = __DIR__.'/../bootstrap/app.php';
$content = file_get_contents($file);

echo "<!DOCTYPE html><html><body style='font-family:Arial;padding:20px;'>";
echo "<h1>Bootstrap/app.php Check</h1>";

// Check for the problematic header
if (strpos($content, "header('Access-Control-Allow-Headers") !== false) {
    echo "<div style='background:#ff0000;color:white;padding:20px;margin:20px 0;'>";
    echo "<h2>❌ PROBLEM FOUND!</h2>";
    echo "<p>The bootstrap/app.php file still has the problematic header() call.</p>";
    echo "<p><strong>This is causing the 500 error!</strong></p>";
    echo "</div>";
    echo "<h3>Action Required:</h3>";
    echo "<p>Edit <code>/home/littleprodigy/public_html/bootstrap/app.php</code></p>";
    echo "<p>Remove these lines:</p>";
    echo "<pre style='background:#f5f5f5;padding:10px;'>";
    echo "//header('Access-Control-Allow-Origin: *');\n";
    echo "//header('Access-Control-Allow-Methods: *');\n";
    echo "header('Access-Control-Allow-Headers: *');\n";
    echo "</pre>";
} else {
    echo "<div style='background:#00aa00;color:white;padding:20px;margin:20px 0;'>";
    echo "<h2>✓ FIXED!</h2>";
    echo "<p>Bootstrap/app.php is correct - no header() calls found.</p>";
    echo "</div>";
}

echo "<h3>Current bootstrap/app.php content:</h3>";
echo "<pre style='background:#f5f5f5;padding:15px;overflow:auto;max-height:400px;'>";
echo htmlspecialchars($content);
echo "</pre>";

echo "</body></html>";
?>
