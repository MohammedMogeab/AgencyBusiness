<?php

namespace Core;

class Router
{
    private $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function route($uri, $method)
    {
        // Debug information
        error_log("Attempting to route: URI = {$uri}, Method = {$method}");
        error_log("Available routes: " . print_r($this->routes, true));

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                $controllerPath = base_path($route['controller']);
                error_log("Found matching route. Loading controller: {$controllerPath}");
                
                if (file_exists($controllerPath)) {
                    return require $controllerPath;
                } else {
                    error_log("Controller file not found: {$controllerPath}");
                    $this->abort(500);
                }
            }
        }

        error_log("No matching route found for: {$uri} {$method}");
        $this->abort();
    }

    public function abort($code = 404)
    {
        http_response_code($code);
        $errorFile = base_path("views/errors/{$code}.php");
        error_log("Aborting with code {$code}. Looking for error file: {$errorFile}");
        
        if (file_exists($errorFile)) {
            require $errorFile;
        } else {
            echo "Error {$code}: Page not found";
        }
        die();
    }
} 