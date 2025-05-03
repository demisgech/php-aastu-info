<?php

use function App\Helpers\load_view_component;

?>
<section class="container mt-5">
    <!-- Section Header and Description -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">Discover Our Amazing Features</h2>
        <p class="text-muted">Explore a wide range of features we offer to help you succeed. Click on each feature for
            more details.</p>
    </div>

    <!-- Card Section -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($cards as $card): ?>
            <?php load_view_component("StudentUnion.card", ["card" => $card]) ?>
        <?php endforeach; ?>
    </div>
</section>