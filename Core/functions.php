<?php

use core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return core\session::get('old')[$key] ?? $default;
}

/**
 * Saves an uploaded file to the specified uploads directory.
 *
 * @param string $file The temporary file path of the uploaded file.
 * @param string $name The desired name for the saved file.
 * @return bool Returns true on success, or false on failure.
 */
function saveUpload($file , $name){
    return move_uploaded_file($file, base_path('public/uploads/') . $name);
}
function getUpload($file_name){
    return 'uploads/'. $file_name;
}
