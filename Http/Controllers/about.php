<?php
use core\App;
use core\Database;
$db = App::resolve(Database::class);
$page_name = 'about';



view("about.view.php", [
    'heading' => 'About Us',
]);