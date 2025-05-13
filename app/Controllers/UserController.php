<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $user = new User();
        $data = $user->getData();
        $this->views("Users.index", [
            "users" => $data
        ]);
    }
}