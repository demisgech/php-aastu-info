<?php

use function App\Helpers\load_view_component;

?>

<section class="custom-section position-relative">
    <!-- Top-left Badge -->
    <div class="top-badge">
        <span class="badge bg-warning">Explore</span>
    </div>

    <!-- Section Header and Description -->
    <div class="container mt-5">
        <h2 class="fw-bold mb-3">Discover Your Path at AASTU Today</h2>
        <p class="text-muted mb-5">
            Explore a comprehensive selection of undergraduate programs, access detailed application resources, and
            engage with inspiring clubs and organizations through AASTU Info.
        </p>

        <!-- Responsive Card Row -->
        <div class="row g-4">
            <?php foreach ($clubs as $club): ?>
                <?php load_view_component("Clubs.feature-card", ["club" => $club]) ?>
            <?php endforeach ?>
        </div>
    </div>
</section>