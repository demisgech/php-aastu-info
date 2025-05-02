<?php

declare(strict_types=1);

namespace App\Models;

class Home {
    private array $data;

    public function __construct() {
        $this->data = [
            [
                "id" => 1,
                "image_url" => "/assets/images/aastu-logo.png",
                "title" => "Key Academic Programs and Opportunities",
                "description" => "Explore a diverse range of undergraduate and postgraduate programs."
            ],
            [
                "id" => 2,
                "image_url" => "/assets/images/aastu-logo.png",
                "title" => "Admissions Made Easy for Future Students",
                "description" => "Find all the information you need to apply."
            ],
            [
                "id" => 3,
                "image_url" => "/assets/images/aastu-logo.png",
                "title" => "Engage with Campus Life and Activities",
                "description" => "Get involved in clubs and organizations that inspire."
            ]
        ];
    }

    public function getData(): array {
        return $this->data;
    }
}