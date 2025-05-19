<?php

declare(strict_types=1);

namespace App\Http\Routes;

class Route {
    public function __construct(
        public string $path,
        public string $method,
        public array $controller,
        public ?string $middleware = null
    ) {

    }

    public function only(string $key) {
        $this->middleware = $key;
        return $this;
    }

    public function isDynamic(): bool {
        return strpos($this->path, '{') !== false;
    }

}