<?php

use core\App;
use core\Database;
require base_path('vendor/autoload.php');
$db = App::resolve(Database::class);

// $db->query("update users set password = :password where user_id = 16", ['password' => password_hash("123456789", PASSWORD_DEFAULT)]);
// if(!isset($_SESSION['user'])) {
//     abort(403);
//     header("location: /login");
// }

//    '/forget'  to edit passwrod

/**
 * password_hash($password, PASSWORD_DEFAULT)
 * user_id int primary key auto_increment,
 * user_name varchar(50),
 * password varchar(255) not null default '1234567890',
 * email varchar(25) not null,
 * photo varchar(255),
 * user_type varchar(25),
 * verfiy_token varchar(255),
 * role varchar(255)
 */
echo "<pre><br>";
print_r($_SESSION);
echo "</pre><br>";



$user = $_SESSION['user'];

view("profile/profile.php", [
    'user' => $_SESSION['user']
]);