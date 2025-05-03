<?php

declare(strict_types=1);

namespace App\Routes;

use App\Controllers\AcademicsController;
use App\Controllers\AdmissionController;
use App\Controllers\ClubsController;
use App\Controllers\CustomerController;
use App\Controllers\HomeController;
use App\Controllers\StudentUnionController;

function router() {
    $router = new Router();
    $router->get("/", HomeController::class);
    $router->get("/admission", AdmissionController::class);
    $router->get("/customer", CustomerController::class);
    $router->get("/academics", AcademicsController::class);
    $router->get("/clubs", ClubsController::class);
    $router->get("/student-union", StudentUnionController::class);
    return $router;
}