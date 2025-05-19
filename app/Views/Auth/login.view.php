<?php

use function App\Helpers\load_view_component;

load_view_component("Layouts.header");

?>


<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h4 class="text-center mb-4">Login</h4>

        <?php //if (!empty($error)): ?>
        <div class="alert alert-danger"><?//= htmlspecialchars($error) ?></div>
        <?php //endif; ?>

        <form method="POST" action="/login">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <? php// if (isset($errors['email'])): ?>
                <div class="invalid-feedback">
                    <?php // htmlspecialchars($errors['email']) ?>
                </div>
                <? php// endif; ?>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control <?//= isset($errors['password']) ? 'is-invalid' : '' ?>"
                    id="password" name="password" required>
                <? php// if (isset($errors['password'])): ?>
                <div class="invalid-feedback">
                    <? php// htmlspecialchars($errors['password']) ?>
                </div>
                <? php// endif; ?>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

<?php load_view_component("Layouts.footer") ?>