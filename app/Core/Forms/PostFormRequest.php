<?php

declare(strict_types=1);

namespace App\Core\Forms;

use App\Core\Validators\AbstractFormRequest;

class PostFormRequest extends AbstractFormRequest {
    public function rules(): array {
        return [
            "title" => "sanitize:trim,strip,required|min:3|max:50",
            "content" => "sanitize:trim,strip,required|min:5|max:500"
        ];
    }
}