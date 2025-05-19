<?php

use function App\Helpers\load_view_component;

load_view_component("Layouts.header");
?>

<div class="container">
    <div class="text-center m-auto my-5">
        <div class="card p-5 rounded-4">
            <div class="mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                    class="bi bi-shield-lock text-danger" viewBox="0 0 16 16">
                    <path
                        d="M5.5 8a.5.5 0 0 1 .5.5v1.707a1.5 1.5 0 1 0 1 0V8.5a.5.5 0 0 1 1 0v1.707a1.5 1.5 0 1 0 1 0V8.5a.5.5 0 0 1 1 0v1.707a2.5 2.5 0 1 1-2 0V8.5a.5.5 0 0 1 .5-.5zm3.5 6.25V14a1 1 0 0 1-2 0v-.25a6.5 6.5 0 0 1-5-6.5V3.018a1 1 0 0 1 .583-.91l6-2.5a1 1 0 0 1 .834 0l6 2.5a1 1 0 0 1 .583.91V7.5a6.5 6.5 0 0 1-5 6.5z" />
                </svg>
            </div>
            <h1 class="display-6 text-danger">403 - Unauthorized</h1>
            <p class="lead">You do not have permission to access this page.</p>
            <span>
                <a href="/" class="btn btn-outline-primary mt-3">Go Home</a>
            </span>
        </div>
    </div>
</div>

<?php load_view_component("Layouts.footer"); ?>