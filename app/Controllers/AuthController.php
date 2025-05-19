<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Validators\LoginFormRequest;
use App\Core\Validators\ValidationException;
use App\Http\Redirect;
use App\Http\Session;
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
        $validEmail = "";

        try {

            $formRequest = new LoginFormRequest();
            $formRequest->validate([
                "email" => $email
            ]);
            $validEmail = $formRequest->validData()['email'];

        } catch (ValidationException $ex) {
            Session::flash("errors", $ex->getErrors());
        }

        if (!$this->auth->attempt($validEmail, $password)) {
            Session::flash("errors", [
                "login_failed" => "Invalid email or password!!!"
            ]);
            Redirect::to("/login");
        }
        Redirect::to("/posts");
    }

    public function logout(): void {
        $this->auth->logout();
        Redirect::to("/login");
    }
}