<?php
// One-time script to create storage symlink
// Upload this to: /home/littleprodigy/public_html/public/rename_and_symlink.php
// Then visit: https://littleprodigybooks.in/rename_and_symlink.php

$target = '/home/littleprodigy/public_html/storage/app/public';
$link = '/home/littleprodigy/public_html/public/storage';

// Remove existing storage directory/link if exists
if (is_link($link)) {
    unlink($link);
    echo "Removed existing symlink<br>";
} elseif (is_dir($link)) {
    echo "Warning: 'storage' is a directory, not a symlink. Please rename it manually first.<br>";
    exit;
}

// Create symlink
if (symlink($target, $link)) {
    echo "✅ Symlink created successfully!<br>";
    echo "Target: $target<br>";
    echo "Link: $link<br>";
    echo "<br>Now test: <a href='/storage/uploads/book/book_415/0008.jpg' target='_blank'>https://littleprodigybooks.in/storage/uploads/book/book_415/0008.jpg</a><br>";
    echo "<br><strong>Delete this file after testing!</strong>";
} else {
    echo "❌ Failed to create symlink. Check folder permissions or contact hosting support.<br>";
    echo "You may need to use cPanel 'Symlink Manager' or contact support to enable symlinks.";
}
?>
