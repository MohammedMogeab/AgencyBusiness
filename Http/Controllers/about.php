<?php
use core\App;
use core\Database;
$db = App::resolve(Database::class);
$page_name = 'about';

$developers = $db->query(
    "SELECT * FROM cite_developers")->get();

view("about.view.php", [
    'heading' => 'About Us',
    'page_name' => $page_name,
    'developers' => $developers
]);