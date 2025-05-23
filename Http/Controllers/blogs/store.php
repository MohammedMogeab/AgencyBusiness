<?php
use core\App;
use core\Database;
$db = App::resolve(Database::class);
$page_name = 'blogs';

if(!isset($_SESSION['user'])) {
    abort( 403);
    header( "location: /login");
}
try{

    if(!isset($_POST['blog_id'])) {
        
    $db->query("INSERT INTO blogs (title, content, user_id , image ) VALUES (:title, :content, :user_id , :image)", [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'user_id' => $_SESSION['user']['user_id'],
        'image' => (saveUpload($_FILES['image']['tmp_name'], $_FILES['image']['name'])) ? $_FILES['image']['name'] : null
    ]);
} else {
    $db->query("UPDATE blogs SET title = :title, content = :content, image = :image WHERE blog_id = :id", [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'image' => (saveUpload($_FILES['image']['tmp_name'], $_FILES['image']['name'])) ? $_FILES['image']['name'] : null,
        'id' => $_POST['blog_id']
    ]);
}
} catch (Exception $e) {
    dd($e->getMessage());
}

header("location: /blog");