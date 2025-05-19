<?php

use function App\Helpers\load_view_component;
use function App\Helpers\showErrorMessage;

load_view_component("Layouts.header");

?>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h4 class="text-center mb-4">Login</h4>
        <div><?= showErrorMessage("login_failed") ?></div>
        <form method="POST" action="/login">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <?= showErrorMessage('email') ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

<?php load_view_component("Layouts.footer"); ?>