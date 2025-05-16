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
$router->get('/blog', 'blogs/show.php');
$router->get('/projects', 'projects.php');
$router->get('/signup', 'registration/create.php');
$router->post('/signup', 'registration/store.php')->only('guest');
$router->get('/logout', 'logout.php');
$router->get('/project', 'project/show.php');
$router->get('/login','sessions/create.php');
$router->post('/login', 'sessions/store.php');

$router->get('/forget','ForgetPassword/create.php');
$router->post('/forget', 'ForgetPassword/store.php');



$router->get('/project/create', 'project/create.php');
$router->get('/project_create', 'project/create.php');
$router->post('/project_create', 'project/store.php');
$router->get('/project_edit', 'project/edit.php');
$router->post('/project_edit', 'project/update.php');
$router->get('/project_delete', 'project/destroy.php');
$router->get('/aboutus', 'about.php');


$router->get('/manage', 'manage/dashboard.php');
$router->get('/blog', 'blogs/blog.php');
