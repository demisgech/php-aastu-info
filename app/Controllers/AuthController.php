<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Validators\LoginFormRequest;
use App\Http\Redirect;
use App\Services\AuthService;

class AuthController extends Controller {

    private AuthService $auth;

    public function __construct() {
        $this->auth = new AuthService();
    }

    public function index(): void {
        $this->views("Auth.login", []);
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $formRequest = new LoginFormRequest();
        $formRequest->validate([
            "email" => $email
        ]);
        $validEmail = $formRequest->validData()['email'];

        if (!$this->auth->attemt($validEmail, $password))
            Redirect::back([
                "error" => "Invalid email or password!!"
            ]);

        Redirect::to("/");
    }

    public function logout(): void {
        $this->auth->logout();
        Redirect::to("/login");
    }
}