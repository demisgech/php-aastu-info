<?php

use function App\Helpers\load_view_component;

?>

<div class="m-0 p-0">
    <?php load_view_component("Layouts.header"); ?>
    <?php load_view_component("StudentUnion.hero"); ?>
    <?php load_view_component("StudentUnion.office-section", ["cards" => $cards]); ?>
    <?php load_view_component("StudentUnion.profile-section", ["profiles" => $profiles]); ?>
    <?php load_view_component("Layouts.footer"); ?>
</div>