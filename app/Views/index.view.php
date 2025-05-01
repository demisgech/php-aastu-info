<?php

require "Layouts/header.php";

?>
<div>
    <?php require("Layouts/hero.php") ?>
    <?php require("Layouts/feature-grid.php") ?>
    <?php require("Layouts/chatbot-section.php") ?>

    <!-- <ul class="list-group">
        <?php foreach ($customers as $customer): ?>
            <li class="list-group-item">
                <strong><?= htmlspecialchars($customer['name']) ?></strong>
                <?= htmlspecialchars($customer['email']) ?>
            </li>
        <?php endforeach ?>
    </ul> -->

</div>
<?php
require "Layouts/footer.php";
?>