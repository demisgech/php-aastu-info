<?php

use function App\Helpers\load_view_component;

?>

<section class="container my-5 py-5 px-3 shadow-lg rounded">
    <div class="text-center my-4">
        <h2 class="fw-bold">Union Members</h2>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 mb-5">
        <?php foreach ($profiles as $profile): ?>
            <?php load_view_component("StudentUnion.profile-card", ["profile" => $profile]) ?>
        <?php endforeach; ?>
    </div>
</section>