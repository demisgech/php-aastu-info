<?php

use function App\Helpers\load_view_component;

load_view_component("Layouts.header", $users);
?>
<h1>Hello world! Wolcome to users page</h1>

<ul class="list-group">
    <?php foreach ($users as $user): ?>
        <li class="list-group-item">
            <strong><?= $user['first_name'] ?></strong>
            <?= $user['email'] ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php load_view_component("Layouts.footer") ?>