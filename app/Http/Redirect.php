<?php

declare(strict_types=1);

namespace App\Http;

class Redirect {

    /**
     * Redirect to specific url
     */
    public static function to(string $url, $statusCode = 302): never {
        http_response_code($statusCode);
        header("Location: {$url}");
        die(0);
    }

    public static function back(array $with = []) {
        // Save flash message to $_SESSION
        if (!empty($with))
            $_SESSION["_flashed"] = $with;

        // Save old input
        $_SESSION['old'] = $_POST;
        $referer = $_SERVER['HTTP_REFERER'] ?? "/";
        self::to($referer);
    }

    public static function with(string $key, mixed $value): self {
        $_SESSION["_flashed"][$key] = $value;
        return new self();
    }

    /**
     * Read flash data and remove it after first access
     */
    public static function getFlash(string $key, mixed $default = null): mixed {
        if (!isset($_SESSION['flash'][$key])) {
            return $default;
        }

        $value = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]); // Only show once
        return $value;
    }

    /**
     * Get old input (from previous form submission)
     */
    public static function old(string $key, mixed $default = ''): mixed {
        return $_SESSION['old'][$key] ?? $default;
    }
}