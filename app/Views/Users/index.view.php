<?php

use function App\Helpers\load_view_component;

load_view_component("Layouts.header", $users);
?>
<div class="container">
    <div class="row g-4 m-5">
        <?php foreach ($users as $user): ?>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-sm h-100">
                    <img src="<?= $user['profile_url'] ?>" class="card-img-top" alt="Profile">
                    <div class="card-body">
                        <h5 class="card-title"><?= "{$user['first_name']} {$user['last_name']}" ?></h5>
                        <p class="card-text"><?= $user['email'] ?></p>
                        <a href="/users/<?= $user['id'] ?>" class="btn btn-primary btn-sm">View Profile</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php load_view_component("Layouts.footer") ?>