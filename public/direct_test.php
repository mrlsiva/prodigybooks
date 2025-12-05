<?php
// Simple homepage test WITHOUT loading Laravel
echo "<!DOCTYPE html><html><head><title>Direct Test</title></head>";
echo "<body style='font-family:Arial;padding:20px;'>";
echo "<h1>Direct Homepage Test</h1>";
echo "<p>This bypasses Laravel completely.</p>";

// Check what files exist
echo "<h2>File Check:</h2>";
echo "<p>index.php exists: " . (file_exists(__DIR__.'/index.php') ? 'YES' : 'NO') . "</p>";
echo "<p>bootstrap/app.php exists: " . (file_exists(__DIR__.'/../bootstrap/app.php') ? 'YES' : 'NO') . "</p>";
echo "<p>.env exists: " . (file_exists(__DIR__.'/../.env') ? 'YES' : 'NO') . "</p>";

// Try to load index.php content
echo "<h2>Actual index.php content (first 50 lines):</h2>";
$indexContent = file_get_contents(__DIR__.'/index.php');
$lines = explode("\n", $indexContent);
$first50 = array_slice($lines, 0, 50);

echo "<pre style='background:#f5f5f5;padding:10px;overflow:auto;'>";
echo htmlspecialchars(implode("\n", $first50));
echo "</pre>";

echo "<hr>";
echo "<h2>Now test the REAL homepage:</h2>";
echo "<p><a href='/public/' style='font-size:20px;background:#007bff;color:white;padding:10px 20px;text-decoration:none;'>Click to load homepage via index.php</a></p>";

echo "</body></html>";
?>
