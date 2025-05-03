<?php

declare(strict_types=1);

namespace App\Models;

class StudentUnion {
    private array $cards;

    private array $profiles;

    public function __construct() {
        $this->cards = [
            ['title' => 'Feature 2', 'description' => 'This is a small description for feature 2.', 'button_text' => 'View Detail', 'button_link' => '#'],
            ['title' => 'Feature 1', 'description' => 'This is a small description for feature 1.', 'button_text' => 'View Detail', 'button_link' => '#'],
            ['title' => 'Feature 3', 'description' => 'This is a small description for feature 3.', 'button_text' => 'View Detail', 'button_link' => '#'],
            ['title' => 'Feature 5', 'description' => 'This is a small description for feature 5.', 'button_text' => 'View Detail', 'button_link' => '#'],
        ];

        $this->profiles = [
            [
                'photo' => '/assets/images/dagmawit.png',
                'name' => 'Dagmawit',
                'title' => 'Frontend Developer',
                'links' => [
                    'twitter' => '#',
                    'linkedin' => '#',
                    'github' => '#',
                ],
            ],
            [
                'photo' => '/assets/images/dagmawit.png',
                'name' => 'Jane Smith',
                'title' => 'UI/UX Designer',
                'links' => [
                    'twitter' => '#',
                    'linkedin' => '#',
                    'github' => '#',
                ],
            ],
            [
                'photo' => '/assets/images/alex.jpg',
                'name' => 'Alice Johnson',
                'title' => 'Backend Engineer',
                'links' => [
                    'twitter' => '#',
                    'linkedin' => '#',
                    'github' => '#',
                ],
            ],
            [
                'photo' => '/assets/images/gamachis.jpg',
                'name' => 'Bob Williams',
                'title' => 'Project Manager',
                'links' => [
                    'twitter' => '#',
                    'linkedin' => '#',
                    'github' => '#',
                ],
            ],
        ];
    }

    public function getCardsData() {
        return $this->cards;
    }

    public function getProfilesData() {
        return $this->profiles;
    }
}