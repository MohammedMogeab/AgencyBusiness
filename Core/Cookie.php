<?php

namespace core;

class Cookie
{
    public static function set($name, $value, $expiry = 0)
    {
        if ($expiry === 0) {
            $expiry = time() + (86400 * 30); // 30 days
        }
        
        return setcookie(
            $name,
            $value,
            [
                'expires' => $expiry,
                'path' => '/',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Lax'
            ]
        );
    }

    public static function get($name, $default = null)
    {
        return $_COOKIE[$name] ?? $default;
    }

    public static function delete($name)
    {
        return setcookie($name, '', [
            'expires' => time() - 3600,
            'path' => '/',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }

    public static function has($name)
    {
        return isset($_COOKIE[$name]);
    }
} 