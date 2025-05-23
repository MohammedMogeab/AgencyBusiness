<?php
use core\App;
use core\Database;
$db = App::resolve(Database::class);
$page_name = 'blogs';

//|| $_SESSION['user']['user_type'] != 'admin'
if(!isset($_SESSION['user']) ) {
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