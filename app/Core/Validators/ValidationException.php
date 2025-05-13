<?php

declare(strict_types=1);

namespace App\Core\Validators;

use Exception;

class ValidationException extends Exception {
    private array $errors;
    public function __construct(string $message = "", array $errors = []) {
        parent::__construct(message: $message);
        $this->errors = $errors;
    }

    public function getErrors(): array {
        return $this->errors;
    }
}