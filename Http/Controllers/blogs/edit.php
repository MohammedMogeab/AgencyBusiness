<?php
use core\App;
use core\Database;
$db = App::resolve(Database::class);
$page_name = 'blogs';

if(!isset($_SESSION['user']) || $_SESSION['user']['type'] != 'admin') {
    abort( 403);
    header( "location: /login");
}


view('../views/blogs/create.php', [
    'page_name' => $page_name,
    'request' => 'edit',
    'blog' => $db->query('SELECT * FROM blogs WHERE blog_id = :id', [
        'id' => $_GET['id']
    ])->findOrFail()
]);