<?php

// Home page
// $router->get('/', 'Http/Controllers/HomeController.php');
// $router->get('/home', 'Http/Controllers/HomeController.php');

// // About page
// $router->get('/about', 'Http/Controllers/AboutController.php');

// // Blog pages
// $router->get('/blog', 'Http/Controllers/BlogController.php');

// // Contact pages
// $router->get('/contact', 'Http/Controllers/ContactController.php');
// $router->post('/contact', 'Http/Controllers/ContactController.php');

// // Projects pages
// $router->get('/projects', 'Http/Controllers/ProjectController.php');

// // Auth pages
// $router->get('/signup', 'Http/Controllers/AuthController.php');
// $router->post('/signup', 'Http/Controllers/AuthController.php');
// $router->get('/login', 'Http/Controllers/AuthController.php');
// $router->post('/login', 'Http/Controllers/AuthController.php');
// $router->post('/logout', 'Http/Controllers/AuthController.php');
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');
$router->get('/blog', 'blog.php');
$router->get('/projects', 'projects.php');
$router->get('/signup', 'registration/create.php');
$router->post('/signup', 'registration/store.php')->only('guest');
$router->get('/login', 'session/create.php')->only('guest');
$router->get('/logout', 'logout.php');
$router->get('/project', 'project/show.php');
$router->get('/project/create', 'project/create.php');

