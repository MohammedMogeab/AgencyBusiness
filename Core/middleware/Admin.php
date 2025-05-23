<?php

namespace core\middleware;

class Admin
{
    public function handle()
    {
        if (!$_SESSION['user']['role']== 'admin' ?? false) {
            header('location: /');
            exit();
        }
    }
}