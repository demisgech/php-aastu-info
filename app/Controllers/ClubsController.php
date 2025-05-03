<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Clubs;

class ClubsController extends Controller {

    public function index() {
        $clubs = new Clubs();
        $clubsData = $clubs->getData();
        $cardsData = $clubs->getCardsData();
        $this->views("Clubs.index", [
            "clubs" => $clubsData,
            "cards" => $cardsData
        ]);
    }

}