<?php

// Load the bootstrap file


use core\session;
use core\ValidationException;
define('BASE_PATH', __DIR__ . '/../');

session_start();

// require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'core/functions.php';


spl_autoload_register(function ($class) {

    $class = str_replace("\\", "/", $class);
  
    require base_path("{$class}.php");
  
  
  });

require BASE_PATH . 'bootstrap.php';

$router = new \core\Router();
require BASE_PATH . 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    session::flash('errors', $exception->errors);
    session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

Session::unflash();

