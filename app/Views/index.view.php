<?php

require "Layouts/header.php";

?>

<button class="btn btn-primary">Button</button>
<ul class="list-group">
    <?php foreach ($customers as $customer): ?>
        <li class="list-group-item">
            <strong><?= htmlspecialchars($customer['name']) ?></strong>
            <?= htmlspecialchars($customer['email']) ?>
        </li>
    <?php endforeach ?>
</ul>

<?php
require "Layouts/footer.php";
?>