<?php

declare(strict_types=1);

namespace App\Routes;

class Router {
    private array $routes = [];

    private function add(string $path, mixed $handler, string $method) {
        $this->routes[] = [
            "path" => $this->normalizePath($path),
            "controller" => $handler,
            "method" => strtoupper($method),
        ];

        return $this;
    }

    public function get(string $path, array $handler) {
        return $this->add($path, $handler, "GET");
    }

    public function post(string $path, array $handler) {
        return $this->add($path, $handler, "POST");
    }

    public function put(string $path, array $handler) {
        return $this->add($path, $handler, "PUT");
    }

    public function patch(string $path, array $handler) {
        return $this->add($path, $handler, "PATCH");
    }

    public function delete(string $path, array $handler) {
        return $this->add($path, $handler, "DELETE");
    }

    public function only(string $key) {
        // Not Implemented
    }

    public function route(string $url, string $method) {
        $path = $this->normalizePath(parse_url($url, PHP_URL_PATH));

        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $path === $route['path']) {
                if (is_array($route['controller'])) {
                    [$class, $action] = $route['controller'];
                    $controller = new $class();
                } else {
                    $class = $route['controller'];
                    $controller = new $class();
                    $action = "index"; // Default method
                }

                if (method_exists($controller, $action))
                    return $controller->$action();
                else
                    $this->abort(500); // Method doesn't exist
            }
        }
        $this->abort();
    }

    private function normalizePath(string $path): string {
        return rtrim($path, "/") ?: "/";
    }

    protected function abort(int $statusCode = 404) {
        http_response_code($statusCode);
        // Load view for corresponding to the status code
        exit();
    }
}