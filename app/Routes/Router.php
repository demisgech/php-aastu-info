<?php

declare(strict_types=1);

namespace App\Routes;

class Router {
    private array $routes = [];

    private function add(string $path, mixed $controller, string $method) {
        $this->routes[] = [
            "path" => $path,
            "controller" => $controller,
            "method" => $method
        ];

        return $this;
    }

    public function get(string $path, mixed $controller) {
        return $this->add($path, $controller, "GET");
    }

    public function post(string $path, mixed $controller) {
        return $this->add($path, $controller, "POST");
    }

    public function put(string $path, mixed $controller) {
        return $this->add($path, $controller, "PUT");
    }

    public function patch(string $path, mixed $controller) {
        return $this->add($path, $controller, "PATCH");
    }

    public function delete(string $path, mixed $controller) {
        return $this->add($path, $controller, "DELETE");
    }

    public function only(string $key) {
        // Not Implemented
    }

    public function route(string $url, string $method) {
        $path = parse_url($url, PHP_URL_PATH);
        $method = strtoupper($method);

        $controllerMatched = true;

        foreach ($this->routes as $route) {
            if ($route['method'] === $method
                && ($path === $route['path'] || str_starts_with($path, $route['path'] . "/"))
            ) {
                $controller = new $route['controller']();

                // Get the remaining part of the path after the main path
                $action = trim(str_replace($route['path'], "", $path), "/");

                $action = $action === "" ? "index" : $action;
                if (method_exists($controller, $action))
                    return $controller->$action();

                $controllerMatched = true;

            }
        }

        if (!$controllerMatched)
            $this->abort(500);// method not found
        $this->abort();
    }

    protected function abort(int $statusCode = 404) {
        http_response_code($statusCode);
        // Load view for corresponding to the status code
        exit();
    }
}