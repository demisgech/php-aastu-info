<?php

declare(strict_types=1);

namespace App\Models;

class Academics {
    private array $data = [];

    public function __construct() {
        $this->data = [
            [
                "id" => 1,
                "title" => "Bachelor of Science degree in Architecture",
                "tag" => "Development",
                "description" => "The Architecture Department at AASTU provides an extensive education in architecture, emphasizing design principles, construction techniques, and sustainable practices in the built environment.",
                "location" => "Addis Ababa",
                "year" => "5 years"
            ],
            [
                "id" => 2,
                "title" => "Bachelor of Science degree in Mining Engineering",
                "tag" => "Development",
                "description" => "The Mining Engineering Department at AASTU offers a comprehensive education in mining engineering, focusing on mineral exploration, extraction techniques, and sustainable practices in resource management. The program emphasizes practical applications and innovation, preparing students for successful careers in the mining industry.",
                "location" => "Addis Ababa",
                "year" => "5 years"
            ],
            [
                "id" => 3,
                "title" => "Bachelor of Science degree in Software Engineering",
                "tag" => "Technology",
                "description" => "The Software Engineering Department offers a dynamic program designed to equip students with the skills required to develop software systems, focusing on programming, systems design, and cutting-edge technologies such as machine learning and cloud computing.",
                "location" => "Addis Ababa",
                "year" => "4 years"
            ],
            [
                "id" => 4,
                "title" => "Bachelor of Science degree in Electrical and Electromechanical Engineering",
                "tag" => "Engineering",
                "description" => "This program combines electrical engineering with mechanical systems, focusing on the design, development, and maintenance of electromechanical systems, and prepares students for roles in robotics, automation, and energy systems.",
                "location" => "Addis Ababa",
                "year" => "5 years"
            ],
            [
                "id" => 5,
                "title" => "Bachelor of Science degree in Chemical Engineering",
                "tag" => "Engineering",
                "description" => "The Chemical Engineering Department provides an interdisciplinary education that covers processes for the production of chemicals, materials, and energy, with a strong emphasis on sustainability and environmental impact.",
                "location" => "Addis Ababa",
                "year" => "5 years"
            ]
        ];
    }

    public function all() {
        return $this->data;
    }
}
