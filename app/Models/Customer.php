<?php

declare(strict_types=1);

namespace App\Models;

class Customer {
    private array $data;
    public function __construct() {
        $this->data = [
            [
                "id" => 1,
                "name" => "Demis",
                "email" => "demis@domain.com"
            ],

            [
                "id" => 2,
                "name" => "Haile",
                "email" => "haile@domain.com"
            ],
            [
                "id" => 3,
                "name" => "Dagm",
                "email" => "Dagm@domain.com"
            ],
        ];
    }

    public function all(): array {
        return $this->data;
    }
}