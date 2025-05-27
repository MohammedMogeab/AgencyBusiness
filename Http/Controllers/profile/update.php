<?php

use core\App;
use core\Database;
require base_path('vendor/autoload.php');
$db = App::resolve(Database::class);

if(!(isset($_SESSION['user']) && $_SESSION['user']['email'] == $_POST['email'])){
    abort(403);
    header('/login');
}
$useremain = $db->query('select email, user_id from users where user_id = :user_id', [
    'user_id' => $_SESSION['user']['user_id']
])->findOrFail();

if($useremain['email'] != $_POST['email'] || $useremain['email'] != $_SESSION['user']['email']){
    abort(403);
    header('/login');
}


$user_id = $_POST['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];
$role = $_POST['user_type'];
try{

    $db->query("update users set user_name = :username, user_type = :role where user_id = :user_id", [
        'user_id' => $user_id,
        'username' => $username,
        'role' => $role
    ]);
    $_SESSION['user']['user_name'] = $username;
    $_SESSION['user']['user_type'] = $role;

    if(isset($_FILES['photo']['name']) && saveUpload($_FILES['photo']['tmp_name'],$_FILES['photo']['name'])){
        $db->query("update users set photo = :photo where user_id = :user_id", [
            'user_id' => $user_id,
            'photo' => $_FILES['photo']['name']
        ]);
        $_SESSION['user']['photo'] = $_FILES['photo']['name'];
    }
    else{
        $errors['error save photo'] = 'Failed to update profile photo';
    }
    view("profile/profile.php", [
        'user' => $_SESSION['user'],
        'success' => 'Profile updated successfully',
        'errors' => $errors
    ]);
}catch(Exception $e){
    view("profile/profile.php", [
        'user' => $_SESSION['user'],
        'error' => 'Failed to update profile'
    ]);
}