<?php

namespace Core;

class Router
{
    protected array $routes = [];

    public function get(string $path, callable $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        echo call_user_func($callback);
    }
}
