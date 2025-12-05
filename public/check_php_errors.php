<?php
// Check PHP error log
echo "<!DOCTYPE html><html><body style='font-family:monospace;background:#000;color:#0f0;padding:20px;'>";
echo "<h1>PHP Error Log Check</h1>";

// Common PHP error log locations
$possibleLogs = [
    ini_get('error_log'),
    '/home/littleprodigy/public_html/error_log',
    __DIR__ . '/error_log',
    __DIR__ . '/../error_log',
    '/var/log/php_errors.log',
    '/usr/local/apache/logs/error_log',
];

echo "<h2>Checking for error logs:</h2><ul>";
foreach ($possibleLogs as $log) {
    if ($log && file_exists($log)) {
        echo "<li style='color:#0f0;'>✓ Found: $log</li>";
        
        // Read last 100 lines
        $content = file_get_contents($log);
        $lines = explode("\n", $content);
        $lastLines = array_slice($lines, -100);
        
        echo "<h3>Last 100 lines of: $log</h3>";
        echo "<pre style='background:#1a1a1a;padding:15px;overflow:auto;max-height:500px;border:2px solid #0f0;'>";
        echo htmlspecialchars(implode("\n", $lastLines));
        echo "</pre>";
        break;
    } else {
        echo "<li style='color:#666;'>✗ Not found: $log</li>";
    }
}
echo "</ul>";

// Also check phpinfo for error_log location
echo "<hr><h2>PHP Configuration:</h2>";
echo "<p><strong>error_log:</strong> " . ini_get('error_log') . "</p>";
echo "<p><strong>display_errors:</strong> " . ini_get('display_errors') . "</p>";
echo "<p><strong>log_errors:</strong> " . ini_get('log_errors') . "</p>";
echo "<p><strong>error_reporting:</strong> " . ini_get('error_reporting') . "</p>";
echo "<p><strong>max_execution_time:</strong> " . ini_get('max_execution_time') . "s</p>";
echo "<p><strong>memory_limit:</strong> " . ini_get('memory_limit') . "</p>";

echo "</body></html>";
?>
