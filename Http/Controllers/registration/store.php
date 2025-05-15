<?php
use core\App;
use core\Authenticator;
use core\Database;
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$user= $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    $errors[] = 'User with this email already exists';
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}
