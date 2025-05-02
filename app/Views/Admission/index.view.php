<?php


use function App\Helpers\load_view_component;


load_view_component("Layouts.header", $data);
?>

<div>
    <?php load_view_component("Admission.admission-hero", $data) ?>
    <?php load_view_component("Admission.add-drop", $data) ?>
</div>

<?php load_view_component("Layouts.footer", $data); ?>