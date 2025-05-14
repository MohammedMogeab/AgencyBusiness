<?php

if (!function_exists('base_path')) {
    function base_path($path)
    {
        return BASE_PATH . '/' . $path;
    }
}

if (!function_exists('view')) {
    function view($name, $data = [])
    {
        extract($data);
        return require base_path("views/{$name}");
    }
}

if (!function_exists('redirect')) {
    function redirect($path)
    {
        header("location: {$path}");
        exit();
    }
}

if (!function_exists('old')) {
    function old($key, $default = '')
    {
        return $_SESSION['_flash']['old'][$key] ?? $default;
    }
} 