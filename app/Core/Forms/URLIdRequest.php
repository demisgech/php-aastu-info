<?php

declare(strict_types=1);

namespace App\Core\Forms;

use App\Core\Validators\AbstractFormRequest;


class URLIDRequest extends AbstractFormRequest {
    protected function rules(): array {
        return [
            "id" => "sanitize:trim,strip,escape"
        ];
    }
}