<?php

use function App\Helpers\load_view_component;

?>

<section class="py-5">
    <div class="container text-center mb-5">
        <h2 class="fw-bold">Explore Our Features</h2>
        <p class="text-muted">Discover the powerful tools and services we offer to help you grow and succeed.</p>
    </div>

    <div id="cardSection" class="container row mx-auto card-section">
        <?php foreach ($cards as $card): ?>
            <?php load_view_component("Clubs.card", ["card" => $card]) ?>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-4">
        <button id="toggleButton" class="btn btn-outline-primary">Show All</button>
    </div>

    <script>
        const button = document.getElementById('toggleButton');
        const cardSection = document.getElementById('cardSection');

        button.addEventListener('click', () => {
            cardSection.classList.toggle('expanded');
            button.textContent = cardSection.classList.contains('expanded') ? 'Show Less' : 'Show All';
        });
    </script>
</section>