<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Academics;

class AcademicsController extends Controller {
    public function index() {
        $academics = new Academics();
        $academicsData = $academics->all();

        $this->views("Academics.index", [
            "academics" => $academicsData
        ]);
    }

}