<?php
// Ultra basic check - find out what's breaking
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "1. PHP is working<br>";

$vendorPath = __DIR__.'/../vendor/autoload.php';
echo "2. Checking vendor: " . $vendorPath . "<br>";
echo "3. Vendor exists? " . (file_exists($vendorPath) ? 'YES' : 'NO') . "<br>";

if (file_exists($vendorPath)) {
    echo "4. Requiring vendor...<br>";
    require $vendorPath;
    echo "5. Vendor loaded successfully!<br>";
}

$appPath = __DIR__.'/../bootstrap/app.php';
echo "6. Checking bootstrap: " . $appPath . "<br>";
echo "7. Bootstrap exists? " . (file_exists($appPath) ? 'YES' : 'NO') . "<br>";

if (file_exists($appPath)) {
    echo "8. Requiring bootstrap...<br>";
    $app = require_once $appPath;
    echo "9. Bootstrap loaded successfully!<br>";
    echo "10. App object: " . get_class($app) . "<br>";
}

echo "<hr><h2>✓ All basic checks passed!</h2>";
echo "<p>If you see this, the problem is in the kernel/request handling.</p>";
?>
