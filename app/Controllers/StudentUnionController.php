<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\StudentUnion;

class StudentUnionController extends Controller {

    public function index() {

        $studentUnion = new StudentUnion();
        $cardsData = $studentUnion->getCardsData();
        $profiles = $studentUnion->getProfilesData();
        $this->views("StudentUnion.index",
            [
                "cards" => $cardsData,
                "profiles" => $profiles
            ]
        );
    }
}