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

if (strpos($uri, 'Project') !== false) {
    $projectName = str_replace("Project-", "", $uri);
    // Read the JSON file
    $json = file_get_contents('projects.json');

    // Check if the file was read successfully
    if ($json === false) {
        error_log("Data is null", 0);

        return;
    }

    // Decode the JSON file
    $json_data = json_decode($json, true);

    // Check if the JSON was decoded successfully
    if ($json_data === null) {
        error_log("Data is null", 0);
        return;
    }

    // Check if "GoNow" exists
    if (projectExists($json_data['projects'], $projectName)) {
        $file = INCLUDE_DIR . '/project-single.php';
        // Check if the file exists
        if (file_exists($file)) {
            foreach ($json_data['projects'] as $project) {
                if ($project['id'] == $projectName) {
                    includeWithVariables($file, array('projectData' => $project));
                    return;
                }
            }


        }
    } else {
        error_log("project not found: $projectName", 0);
    }
} else {
    // Construct the path to the PHP file
    $file = INCLUDE_DIR . '/' . $uri . '.php';

// Check if the file exists
    if (file_exists($file)) {
        include $file;
        exit;
    }

    // If the file does not exist, include a 404 page
    include INCLUDE_DIR . '/404.php';
}


// Function to check if a project exists by name
function projectExists($projects, $projectName)
{
    foreach ($projects as $project) {
        if (strcasecmp($project['id'], $projectName) === 0) { // case insensitive comparison
            return true;
        }
    }
    return false;
}

function includeWithVariables($filePath, $variables = array(), $print = true)
{
    // Extract the variables to a local namespace
    extract($variables);

    // Start output buffering
    ob_start();

    // Include the template file
    include $filePath;

    // End buffering and return its contents
    $output = ob_get_clean();
    if (!$print) {
        return $output;
    }
    echo $output;
}

?>