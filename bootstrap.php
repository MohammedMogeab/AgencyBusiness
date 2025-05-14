<?php

// Define the base path
define('BASE_PATH', __DIR__);

// Load configuration
require_once BASE_PATH . '/config.php';

// Load helper functions
require_once BASE_PATH . '/Core/helpers.php';

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Create Router instance
$router = new \Core\Router();

// Load routes
require_once BASE_PATH . '/routes.php';

// Get the current URI and method
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method); 