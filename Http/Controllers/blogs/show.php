<?php
use core\App;
use core\Database;
$db = App::resolve(Database::class);
$page_name = 'blogs';






view('../views/blogs/blog.php', [
    
]);