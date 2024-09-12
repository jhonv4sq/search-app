<?php

namespace App\Core;

class Router {
    private array $routes = [];

    public function addRoute (string $method, string $route, callable $action) {

        $this->routes[$method][$route] = $action;
    }

    public function resolve(string $method, string $uri) {
        
        $uri = trim($uri, '/');

        if (isset($this->routes[$method][$uri])) {
            return call_user_func($this->routes[$method][$uri]);
        }

        echo "404 - Not Found";
    }
}
