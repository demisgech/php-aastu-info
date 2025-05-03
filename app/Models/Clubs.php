<?php

declare(strict_types=1);

namespace App\Models;

class Clubs {

    private array $data;
    private array $cards;

    public function __construct() {
        $this->data = [
            [
                "id" => 1,
                "image_url" => "/assets/images/cognfit.jpg",
                "title" => "Key Academic Programs and Opportunities",
                "description" => "Explore a diverse range of undergraduate and postgraduate programs."
            ],
            [
                "id" => 2,
                "image_url" => "/assets/images/cognfit.jpg",
                "title" => "Admissions Made Easy for Future Students",
                "description" => "Find all the information you need to apply."
            ],
            [
                "id" => 3,
                "image_url" => "/assets/images/cognfit.jpg",
                "title" => "Engage with Campus Life and Activities",
                "description" => "Get involved in clubs and organizations that inspire."
            ]
        ];

        $this->cards = [
            [
                'image' => "/assets/images/cognfit.jpg",
                'icon' => 'bi-star-fill',
                'label' => 'Popular Feature',
                'title' => 'Card Title 1',
                'description' => 'Short description of the feature or service offered in this card.',
                'button_text' => 'Learn More',
                'button_link' => '#',
            ],
            [
                'image' => "/assets/images/cognfit.jpg",
                'icon' => 'bi-lightning-charge-fill',
                'label' => 'Fast Service',
                'title' => 'Card Title 2',
                'description' => 'Another brief description to explain what this card is about.',
                'button_text' => 'Learn More',
                'button_link' => '#',
            ],
            [
                'image' => "/assets/images/cognfit.jpg",
                'icon' => 'bi-shield-lock-fill',
                'label' => 'Secure Access',
                'title' => 'Card Title 3',
                'description' => 'Insightful description to catch attention and drive engagement.',
                'button_text' => 'Learn More',
                'button_link' => '#',
            ],
            [
                'image' => 'https://via.placeholder.com/600x300',
                'icon' => 'bi-graph-up-arrow',
                'label' => 'Performance',
                'title' => 'Card Title 4',
                'description' => 'More features or offerings can be placed right here to extend the section.',
                'button_text' => 'Learn More',
                'button_link' => '#',
            ],
            [
                'image' => 'https://via.placeholder.com/600x300',
                'icon' => 'bi-people-fill',
                'label' => 'Team Friendly',
                'title' => 'Card Title 5',
                'description' => 'Continue to add value by showing more services or products.',
                'button_text' => 'Learn More',
                'button_link' => '#',
            ],
        ];

    }

    public function getData(): array {
        return $this->data;
    }

    public function getCardsData() {
        return $this->cards;
    }
}