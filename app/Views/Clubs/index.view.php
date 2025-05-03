<?php

use function App\Helpers\load_view_component;

load_view_component("Layouts.header"); ?>

<div>
    <?php load_view_component("Clubs.hero") ?>
    <?php load_view_component("Clubs.feature-card-grid", ["clubs" => $clubs]) ?>

</div>

<?php load_view_component("Clubs.clubs-card-grid", [
    "cards" => $cards
]); ?>


<?php load_view_component("Layouts.footer"); ?>