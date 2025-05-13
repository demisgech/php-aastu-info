<?php

declare(strict_types=1);

namespace App\Core\Validators;

class LoginFormRequest extends AbstractFormRequest {

    public function rules(): array {
        return [
            "email" => "sanitize:trim,strip,email|required|email",
            "password" => "sanitize:trim,strip"
        ];
    }
}