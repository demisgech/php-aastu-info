<?php

use function App\Helpers\load_view_component;

load_view_component("Layouts.header", $customers);
?>
<h1>Hello world! Wolcome to customers page</h1>

<ul class="list-group">
    <?php foreach ($customers as $customer): ?>
        <li class="list-group-item">
            <strong><?= $customer['name'] ?></strong>
            <?= $customer['email'] ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php load_view_component("Layouts.footer") ?>