<?php


declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Home;

class HomeController extends Controller {
    public function index(): void {
        $home = new Home();
        $data = $home->getData();
        $this->views("index", [
            "data" => $data
        ]);
    }
}