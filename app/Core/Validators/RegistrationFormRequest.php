<?php

declare(strict_types=1);

namespace App\Core\Validators;

class RegistrationFormRequest extends AbstractFormRequest {
    public function rules(): array {
        return [
            "username" => "sanitize:trim,strip,required|min:5|max:20",
            "email" => "sanitize:trim,strip,email|required|email",
            "password" => "sanitize:trim,strip|min:8|max:20"
        ];
    }
}
