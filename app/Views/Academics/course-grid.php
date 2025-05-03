<?php

use function App\Helpers\load_view_component;

?>

<section class="custom-section position-relative mb-2">
    <div class="container">
        <span class="top-badge rounded bg-primary p-1 text-white">Explore</span>
        <h2 class="section-heading my-3">Availabel Courses</h2>
        <p class="section-description my-3">
            Discover top-tier education in Engineering and Applied Sciences that shapes the future across multiple
            disciplines.
        </p>

        <!-- Filter Tabs -->
        <ul class="nav nav-pills mb-4" id="filterTabs" role="tablist">
            <li class="nav-item"><button class="nav-link active" data-category="All">All</button></li>
            <li class="nav-item"><button class="nav-link" data-category="Engineering">Engineering</button></li>
            <li class="nav-item"><button class="nav-link" data-category="Science">Applied Science</button></li>
        </ul>

        <!-- Cards Container -->
        <div class="row row-cols-1 row-cols-md-2 g-4" id="programCards">
            <?php foreach ($academics as $program): ?>
                <?php load_view_component("Academics.card", ["program" => $program]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>