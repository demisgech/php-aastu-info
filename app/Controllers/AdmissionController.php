<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admission;


class AdmissionController extends Controller {
    public function index(): void {
        $admission = new Admission();
        $data = $admission->getData();

        $this->views("Admission.index", [
            "data" => $data
        ]);
    }
}