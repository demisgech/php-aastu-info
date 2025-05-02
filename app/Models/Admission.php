<?php

declare(strict_types=1);

namespace App\Models;

class Admission {
    private array $data;

    public function __construct() {
        $this->data = [
            [
                "id" => 1,
                "title" => "Regular Program Admission",
                "description" => "Complete high school education. Achieve necessary pass marks in the Ethiopian Higher Education Entrance Examination (EHEE) or an equivalent examination.
                Meet any additional criteria set by the Ministry of Education (MOE) or AASTU."
            ],
            [
                "id" => 2,
                "title" => "Continuing Education Program Admission",
                "description" => "programs are managed through academic units, in coordination with the university registrar and Continuing Education Program (CEP), according to MOE policies."
            ],
            [
                "id" => 3,
                "title" => "Other Admission Cases",
                "description" => "AASTU may admit students in collaboration with affiliated universities or institutes, with processing allowed at any time during the academic calendar."
            ],
            [
                "id" => 4,
                "title" => "Readmission",
                "description" => "Students withdrawing officially can request readmission: Applications are accepted for the same program only. Academic dismissals meeting cut-off points are eligible. Readmission is subject to space and budget availability."
            ]
        ];
    }

    public function getData(): array {
        return $this->data;
    }
}