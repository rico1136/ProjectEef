<?php 
define('INCLUDE_DIR', dirname(__FILE__));  // Set INCLUDE_DIR to the root directory

// Define routing rules
$rules = array(
    'home'      => "/^\/$/",                                       // Home route '/'
    'picture'   => "/^\/picture\/([^\/]+)\/(\d+)$/",                // '/picture/some-text/51'
    'album'     => "/^\/album\/([\w\-]+)$/",                        // '/album/album-slug'
    'category'  => "/^\/category\/([\w\-]+)$/",                     // '/category/category-slug'
    'page'      => "/^\/page\/(about|contact)$/",                    // '/page/about', '/page/contact'
    'contact'   => "/^\/contact$/",                                  // '/contact'
    'post'      => "/^\/([\w\-]+)$/",                                // '/post-slug'
);

// Get the current request URI
$uri = urldecode($_SERVER['REQUEST_URI']); // Directly get the URI without rewriting

// Strip the base directory part if needed (you can use this if your app is inside a subdirectory)
$base_path = '/newImplement'; // Adjust the base path if your app is in a subdirectory
$uri = str_replace($base_path, '', $uri);

// Check if it's the home route '/newImplement/'
if ($uri === '/') {
    include INCLUDE_DIR . '/Pages/home.php';  // Directly load home.php
    exit;
}

// Check the URL against routing rules
foreach ($rules as $action => $rule) {
    if (preg_match($rule, $uri, $params)) {
        // Route matched, include appropriate file
        include INCLUDE_DIR . '/Pages/' . $action . '.php';
        exit;
    }
}

// If no route matched, include 404 page
include INCLUDE_DIR . '/Pages/404.php';
?>
