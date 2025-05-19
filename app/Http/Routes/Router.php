<?php

declare(strict_types=1);

namespace App\Http\Routes;

use App\Http\Middlewares\Middleware;

class Router {
    private array $routes = [];

    private function add(string $path, mixed $handler, string $method) {
        $route = new Route($this->normalizePath($path), strtoupper($method), $handler, null);

        $this->routes[] = $route;

        return $route;
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

        // Sort: static routes (no {param}) before dynamic routes (with {param})
        $sortedRoutes = $this->routes;
        usort($sortedRoutes, fn($a, $b) => $a->isDynamic() <=> $b->isDynamic());

        foreach ($sortedRoutes as $route) {

            $routePath = $route->path;
            // // Convert dynamic segments to regex (e.g., /users/{id} => /users/([^/]+))
            $pattern = preg_replace('/\{[a-zA-Z_][a-zA-Z0-9_]*\}/', '([^/]+)', $routePath);
            $pattern = "@^" . $pattern . "$@D";

            if ($route->method === $method && preg_match($pattern, $path, $matches)) {
                array_shift($matches); // Remove full match

                [$class, $action] = $route->controller;
                $controller = new $class();

                // ✅ Middleware should run here, after match is confirmed
                if ($route->middleware) {
                    Middleware::resolve($route->middleware);
                }

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