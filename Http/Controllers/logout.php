<?php

use core\App;
use core\Database;
use core\Cookie;
require base_path('vendor/autoload.php');

// Delete remember me cookies if they exist
if (Cookie::has('remember_token')) {
    $db = App::resolve(Database::class);
    
    // Delete the token from database
    $db->query('DELETE FROM remember_tokens WHERE token = :token', [
        'token' => Cookie::get('remember_token')
    ]);
    
    // Delete the cookies
    Cookie::delete('remember_token');
    Cookie::delete('user_email');
}

session_start();
session_destroy();
header("Location: /");
