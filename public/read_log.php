<?php
// Read the Laravel log file
$logFile = __DIR__.'/../storage/logs/laravel.log';

header('Content-Type: text/html; charset=utf-8');
echo "<!DOCTYPE html><html><body style='font-family:monospace;background:#000;color:#0f0;padding:20px;'>";
echo "<h1>📋 Laravel Log File</h1>";

if (file_exists($logFile)) {
    $content = file_get_contents($logFile);
    $lines = explode("\n", $content);
    $lastLines = array_slice($lines, -100); // Last 100 lines
    
    echo "<h2>File: " . $logFile . "</h2>";
    echo "<h3>Last 100 lines:</h3>";
    echo "<pre style='background:#1e1e1e;color:#fff;padding:20px;overflow:auto;max-height:600px;border:2px solid #0f0;'>";
    echo htmlspecialchars(implode("\n", $lastLines));
    echo "</pre>";
    
    echo "<hr>";
    echo "<h3>Full file size: " . filesize($logFile) . " bytes</h3>";
} else {
    echo "<h2 style='color:#f00;'>❌ Log file not found!</h2>";
    echo "<p>Expected: " . $logFile . "</p>";
    
    // Check directory
    $logsDir = dirname($logFile);
    echo "<p>Logs directory exists? " . (is_dir($logsDir) ? 'YES' : 'NO') . "</p>";
    
    if (is_dir($logsDir)) {
        echo "<h3>Files in logs directory:</h3>";
        $files = scandir($logsDir);
        echo "<ul>";
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                echo "<li>$file</li>";
            }
        }
        echo "</ul>";
    }
}

echo "</body></html>";
?>
