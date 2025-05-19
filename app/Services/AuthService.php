<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Session;
use App\Models\User;

class AuthService {

    public function attemt(string $email, string $password): bool {
        $user = (new User())->findUserByEmail($email);

        if (!($user && password_verify($password, $user['password'])))
            return false;

        $_SESSION['user'] = [
            "id" => $user['id'],
            "email" => $user['email'],
            "full_name" => "{$user['first_name']} {$user['last_name']}",
            "profile_url" => $user['profile_url']
        ];
        session_regenerate_id(delete_old_session: true);
        return true;
    }

    public function logout(): void {
        Session::destroy();
    }
}