<?php

namespace App\Core;

class Router {
    private array $routes = [];

    public function addRoute (string $method, string $route, callable $action) {
        $route = trim($route, '/');
        $this->routes[$method][$route] = $action;
    }

    public function resolve(string $method, string $uri) {

        $uri = trim($uri, '/');

        if (isset($this->routes[$method][$uri])) {
            return call_user_func($this->routes[$method][$uri]);
        } else {
            foreach ($this->routes[$method] as $route => $action) {
                // convertimos una ruta con parametros en una con expreciones regulares
                $routePattern = preg_replace('/\{[a-zA-Z]+\}/', '([a-zA-Z0-9_.()\-]+)', $route);
                $routePattern = '@^' . $routePattern . '$@';

                // comprobamos las coincidencias y separamos las variables de la url
                if (preg_match($routePattern, $uri, $matches)) {
                    array_shift($matches);
                    return call_user_func_array($action, $matches);
                }
            }
        }


        echo "404 - Not Found";
    }
}
