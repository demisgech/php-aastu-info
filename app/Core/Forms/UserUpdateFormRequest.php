<?php

declare(strict_types=1);

namespace App\Core\Forms;

use App\Core\Validators\AbstractFormRequest;


class UserUpdateFormRequest extends AbstractFormRequest {
    protected function rules(): array {
        return [
            "first_name" => "sanitize:trim,strip,required|min:3|max:20",
            "last_name" => "sanitize:trim,strip,required|min:3|max:20",
        ];
    }
}