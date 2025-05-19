<?php

declare(strict_types=1);

namespace App\Http\Routes;

use App\Controllers\AcademicsController;
use App\Controllers\AdmissionController;
use App\Controllers\AuthController;
use App\Controllers\ClubsController;
use App\Controllers\CustomerController;
use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\StudentUnionController;
use App\Controllers\UnauthorizedController;
use App\Controllers\UserController;

function router() {
    $router = new Router();
    $router->get("/", [HomeController::class, "index"]);
    $router->get("/admission", [AdmissionController::class, "index"]);
    $router->get("/customer", [CustomerController::class, "index"]);
    $router->get("/academics", [AcademicsController::class, "index"]);
    $router->get("/clubs", [ClubsController::class, "index"]);
    $router->get("/student-union", [StudentUnionController::class, "index"])->only('guest');

    $router->get("/unauthorize", [UnauthorizedController::class, "index"])->only('guest');


    $router->get("/users", [UserController::class, "index"]);//->only('auth');

    $router->post("/users", [UserController::class, "store"])->only('guest');
    $router->get("/users/create", [UserController::class, "create"])->only('guest');
    $router->get("/users/{id}", [UserController::class, "show"])->only("auth");

    // $router->get("/users/{id}/posts", [UserController::class, "notImplemented"]);
    // $router->get("/users/{user_id}/posts/{post_id}", [UserController::class, "notImplemented"]);

    $router->put("/users/{id}", [UserController::class, "update"])->only('auth');
    $router->delete("/users/{id}", [UserController::class, "delete"])->only('auth');

    $router->get("/posts", [PostController::class, "index"])->only('auth');
    $router->post("/posts", [PostController::class, "store"])->only('auth');

    // $router->get("/posts/{user_id}", [PostController::class, "getPostByUser"]);
    $router->get("/posts/{id}", [PostController::class, "show"])->only("auth");
    $router->put("/posts/{id}", [PostController::class, "update"])->only('auth');
    $router->delete("/posts/{id}", [PostController::class, "delete"])->only('auth');


    $router->get("/login", [AuthController::class, "index"])->only('guest'); // Login page
    $router->post("/login", [AuthController::class, "login"])->only('guest');
    $router->delete("/logout", [AuthController::class, "logout"]);

    return $router;
}