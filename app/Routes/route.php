<?php

declare(strict_types=1);

namespace App\Routes;

use App\Controllers\AcademicsController;
use App\Controllers\AdmissionController;
use App\Controllers\ClubsController;
use App\Controllers\CustomerController;
use App\Controllers\HomeController;
use App\Controllers\StudentUnionController;
use App\Controllers\UserController;

function router() {
    $router = new Router();
    $router->get("/", [HomeController::class, "index"]);
    $router->get("/admission", [AdmissionController::class, "index"]);
    $router->get("/customer", [CustomerController::class, "index"]);
    $router->get("/academics", [AcademicsController::class, "index"]);
    $router->get("/clubs", [ClubsController::class, "index"]);
    $router->get("/student-union", [StudentUnionController::class, "index"]);
    $router->get("/users", [UserController::class, "index"]);
    $router->get("/users/create", [UserController::class, "create"]);
    $router->post("/users/store", [UserController::class, "store"]);
    return $router;
}