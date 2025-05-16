<?php

use core\App;
use core\Authenticator;
use core\Database;
//session_start();
$db = App::resolve(Database::class);
$auth = new Authenticator(); 


$errors = [];

    $email = $_POST['email'];
    $password = $_POST['password'];
    //dd($_POST);
    $user = $db->query('SELECT * FROM users Where email=:email', 
    ['email'=>$email])->find();

    print_r($user); 

  
    if($user) {
        
        if(password_verify($password, $user['user_password'])) {
        header('location: /');
        exit();
        }else{
            $errors['password'] = 'Error in  password';
            return view('session/create.view.php', [
             'errors' => $errors]);
        }
    }else
    {
        $errors['email'] = 'Error in email or password';
       return view('session/create.view.php', [
        'errors' => $errors]);;
    }


?>