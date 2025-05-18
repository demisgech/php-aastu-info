<?php

declare(strict_types=1);

namespace App\Core\Forms;

use App\Core\Validators\AbstractFormRequest;


class UserRegistrationFormRequest extends AbstractFormRequest {
    protected function rules(): array {
        return [
            "first_name" => "sanitize:trim,strip,required|min:3|max:20",
            "last_name" => "sanitize:trim,strip,required|min:3|max:20",
            "email" => "sanitize:trim,strip,email|required|email",
            "password" => "sanitize:trim,strip,required|min:8|max:20",
            "profile_url" => "file|mimes:jpg,jpeg,png|max:2048"
        ];
    }
}