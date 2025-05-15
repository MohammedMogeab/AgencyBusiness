<?php
// use core\App;
// use core\Authenticator;
// use core\Database;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// require base_path('vendor/autoload.php');
// //session_start();
// $db = App::resolve(Database::class);
// $auth = new Authenticator(); 


// $errors = [];

// if($_SERVER["REQUEST_METHOD"]=="POST") {
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $user = $db->query('SELECT * FROM users Where email=:email', 
//     ['email'=>$email]);
  
//     if($user) {
//         header('location: /');
//     }else
//     {
//         $errors['email'] = 'Error in email or password';
//        return view('session/create.view.php', [
//         'errors' => $errors['email']]);;
//     }

// }

// if($_SERVER['REQUEST_METHOD']){
//     if (! empty($errors)) {
//         return view('session/create.view.php', [
//             'errors' => $errors
//         ]);
//     }
// }

// if(isset($_POST['login'])) {
    


// if(isset($_POST)){

// if (! empty($errors)) {
//     return view('session/create.view.php', [
//         'errors' => $errors
//     ]);
// }
// if (empty($email) || empty($password)) {
//     {
//         $errors['email or password'] = "email or password is empty";
//         return view('session/create.view.php', [
//             'errors' => $errors]);

//     }



   
// return view('session/create.view.php', [
//     'errors' => $errors['email']]);

//}


 view('session/create.view.php');
