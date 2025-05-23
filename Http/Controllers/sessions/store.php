<?php

use core\App;
use core\Authenticator;
use core\Database;
use core\Cookie;
//session_start();
$db = App::resolve(Database::class);
$auth = new Authenticator(); 


$errors = [];

    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;
    //dd($_POST);
    $user = $db->query('SELECT * FROM users Where email=:email', 
    ['email'=>$email])->find();

    print_r($user); 

  
    if($user) {
        
        if(password_verify($password, $user['password'])) {
            $auth->login($user);
            
            // Set remember me cookie if checked
            if ($remember) {
                // Generate a secure random token
                $token = bin2hex(random_bytes(32));
                
                // Store user info in cookie (only non-sensitive data)
                Cookie::set('user_email', $user['email']);
                Cookie::set('remember_token', $token);
                
                // Store token in database
                $db->query('INSERT INTO remember_tokens (user_id, token, expires_at) VALUES (:user_id, :token, :expires_at)', [
                    'user_id' => $user['user_id'],
                    'token' => $token,
                    'expires_at' => date('Y-m-d H:i:s', time() + (86400 * 30)) // 30 days
                ]);
            }
            
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