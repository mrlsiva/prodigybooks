<?php
// Check .env file
echo "<!DOCTYPE html><html><body style='font-family:Arial;padding:20px;'>";
echo "<h1>.ENV File Check</h1>";

$envPath = __DIR__.'/../.env';
echo "<h2>Path: $envPath</h2>";
echo "<p>Exists: " . (file_exists($envPath) ? '✓ YES' : '✗ NO') . "</p>";

if (file_exists($envPath)) {
    echo "<p>Readable: " . (is_readable($envPath) ? '✓ YES' : '✗ NO') . "</p>";
    echo "<p>Size: " . filesize($envPath) . " bytes</p>";
    
    $content = file_get_contents($envPath);
    $lines = explode("\n", $content);
    
    echo "<h3>Environment Variables (passwords hidden):</h3>";
    echo "<pre style='background:#f5f5f5;padding:15px;overflow:auto;'>";
    
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || strpos($line, '#') === 0) {
            echo htmlspecialchars($line) . "\n";
            continue;
        }
        
        // Hide sensitive values
        if (preg_match('/^([^=]+)=(.*)$/', $line, $matches)) {
            $key = $matches[1];
            $value = $matches[2];
            
            $sensitive = ['PASSWORD', 'KEY', 'SECRET', 'TOKEN'];
            $hide = false;
            foreach ($sensitive as $s) {
                if (stripos($key, $s) !== false) {
                    $hide = true;
                    break;
                }
            }
            
            if ($hide && !empty($value)) {
                echo htmlspecialchars($key) . "=***hidden***\n";
            } else {
                echo htmlspecialchars($line) . "\n";
            }
        } else {
            echo htmlspecialchars($line) . "\n";
        }
    }
    echo "</pre>";
    
    // Check critical variables
    echo "<h3>Critical Variables:</h3><ul>";
    $critical = ['APP_KEY', 'APP_DEBUG', 'APP_ENV', 'DB_CONNECTION', 'DB_HOST', 'DB_DATABASE'];
    foreach ($critical as $var) {
        $found = false;
        foreach ($lines as $line) {
            if (strpos(trim($line), $var . '=') === 0) {
                $found = true;
                break;
            }
        }
        echo "<li style='color:" . ($found ? 'green' : 'red') . ";'>" . ($found ? '✓' : '✗') . " $var</li>";
    }
    echo "</ul>";
    
} else {
    echo "<p style='color:red;font-weight:bold;'>✗ .env file is MISSING!</p>";
    
    // Check for .env.example
    $examplePath = __DIR__.'/../.env.example';
    if (file_exists($examplePath)) {
        echo "<p style='color:orange;'>Found .env.example - you need to copy it to .env</p>";
    }
}

echo "</body></html>";
?>
