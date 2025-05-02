<?php

declare(strict_types=1);

namespace App\Routes;

use App\Controllers\AdmissionController;
use App\Controllers\CustomerController;
use App\Controllers\HomeController;

function router() {
    $router = new Router();
    $router->get("/", HomeController::class);
    $router->get("/admission", AdmissionController::class);
    $router->get("/customer", CustomerController::class);
    return $router;
}