<?php
use core\App;
use core\Database;
$db = App::resolve(Database::class);
$page_name = 'blogs';


$blogs = $db->query('SELECT 
b.blog_id,
b.blog_title,
b.content,
b.date,
b.image,
u.user_name as author FROM blogs b left join users u on (b.user_id = u.user_id)'
)
->get();



view('../views/blogs/blog.php', [
    'blogs' => $blogs
]);