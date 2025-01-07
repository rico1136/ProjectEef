<?php
// Define the base directory for includes
define('INCLUDE_DIR', dirname(__FILE__));

// Get the requested URI and decode it
$uri = urldecode($_SERVER['REQUEST_URI']);

// Remove any query string parameters
$uri = strtok($uri, '?');

// Check if it's the home route '/'
if ($uri === '/') {
    include INCLUDE_DIR . '/home.php';  // Directly load home.php
    exit;
}

// Strip leading and trailing slashes
$uri = trim($uri, '/');

// Construct the path to the PHP file
$file = INCLUDE_DIR . '/' . $uri . '.php';

// Check if the file exists
if (file_exists($file)) {
    include $file;
    exit;
}

// If the file does not exist, include a 404 page
include INCLUDE_DIR . '/404.php';
?>