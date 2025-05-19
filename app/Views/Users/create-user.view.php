<?php

use App\Http\Session;
use function App\Helpers\load_view_component;
use function App\Helpers\showErrorMessage;
load_view_component("Layouts.header");

?>

<div class="container">
    <div class="container m-auto my-5 w-50">
        <form action="/users" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
                <?= showErrorMessage("first_name") ?>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
                <?= showErrorMessage("last_name") ?>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <?= showErrorMessage("email") ?>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <?= showErrorMessage("password") ?>
            </div>

            <div class="mb-3">
                <label for="profile_url" class="form-label">Profile</label>
                <input type="file" class="form-control" id="profile_url" name="profile_url">
                <?= showErrorMessage("profile_url") ?>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>

<?php load_view_component("Layouts.footer"); ?>