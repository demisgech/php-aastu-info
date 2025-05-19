<?php

declare(strict_types=1);

namespace App\Http\Middlewares;

class Middleware {
    private const middlewares = [
        "guest" => Guest::class,
        "auth" => Auth::class
    ];

    public static function resolve(string $key): void {
        if (!array_key_exists($key, static::middlewares))
            return;

        $middleware = static::middlewares[$key];
        (new $middleware())->handle();
    }
}