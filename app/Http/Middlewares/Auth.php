<?php

declare(strict_types=1);

namespace App\Http\Middlewares;

use App\Http\Redirect;

class Auth {
    public function handle(): void {
        if (!($_SESSION['user'] ?? false))
            Redirect::to("/unauthorize");
    }
}