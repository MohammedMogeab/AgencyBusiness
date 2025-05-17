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
$router->get('/', 'home/index.php');
$router->post('/', 'home/store.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact/contact.php');
$router->post('/contact', 'contact/send.php');
$router->get('/blog', 'blogs/show.php');
$router->get('/projects', 'projects/projects.php');
$router->get('/signup', 'registration/create.php');
$router->post('/signup', 'registration/store.php')->only('guest');
$router->get('/logout', 'logout.php');
$router->get('/project', 'project/show.php');
$router->get('/login','sessions/create.php')->only('guest');
$router->post('/login', 'sessions/store.php')->only('guest');

$router->get('/forget','ForgetPassword/create.php');
$router->post('/forget', 'ForgetPassword/store.php');
$router->get('/project/create', 'project/create.php')->only("auth");
$router->post('/project/create', 'project/store.php');
$router->post('/project/store', 'project/store.php');
$router->get('/profile', 'profile/profile.php')->only("auth");
$router->post('/profile/update', 'profile/update.php')->only("auth");
$router->get('/aboutus', 'about.php');
$router->get('/logout', 'logout.php');


$router->get('/manage', 'manage/dashboard.php')->only("auth");
$router->get('/blog', 'blogs/blog.php');
$router->get('/mohammed', 'mohammed.php');
$router->get('/invest', 'Invest/invest.php')->only("auth");
$router->post( '/createorder','Invest/createorder.php');
$router->get('/thankyou', 'Invest/thankyou.php');
$router->get('/cancel', 'Invest/cancel.php');
$router->get('/captureorder', 'Invest/captureorder.php');
