<?php

declare(strict_types=1);

namespace App\Http\Routes;

use App\Http\Middlewares\Middleware;

class Router {
    private array $routes = [];

    private function add(string $path, mixed $handler, string $method) {
        $this->routes[] = [
            "path" => $this->normalizePath($path),
            "controller" => $handler,
            "method" => strtoupper($method),
            "middleware" => null
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
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route(string $url, string $method) {
        $path = $this->normalizePath(parse_url($url, PHP_URL_PATH));

        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            $routePath = $route['path'];

            if ($route['middleware'])
                Middleware::resolve($route['middleware']);

            // Match dynamic segments like /users/{id}
            $pattern = preg_replace('/\{[a-zA-Z_][a-zA-Z0-9_]*\}/', '([^/]+)', $routePath);
            $pattern = "@^" . $pattern . "$@D";

            if ($route['method'] === $method && preg_match($pattern, $path, $matches)) {
                array_shift($matches); // Remove full match

                [$class, $action] = $route['controller'];
                $controller = new $class();

                return call_user_func_array([$controller, $action], $matches);
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