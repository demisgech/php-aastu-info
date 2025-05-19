<?php

namespace App\Helpers;
use App\Http\Session;

function view(string $viewName, array $data) {
    extract($data);
    // Define the path to the views directory
    $basePath = dirname(__DIR__) . '/Views/';
    $viewFile = $basePath . str_replace(".", DIRECTORY_SEPARATOR, $viewName) . ".view.php";

    if (file_exists($viewFile))
        require($viewFile);
    else
        die("View {$viewFile} is not found!!!");
}


function load_view_component(string $viewName, array $data = []) {

    $basePath = dirname(__DIR__) . '/Views/';
    $viewFile = $basePath . str_replace(".", DIRECTORY_SEPARATOR, $viewName) . ".php";

    if (!file_exists($viewFile))
        die("{$viewFile} is not found!!!");

    extract($data);
    require($viewFile);
}

function getBasePath(string $path) {
    $path_url = dirname(__DIR__) . "/{$path}";
    if (file_exists($path_url))
        return $path_url;
    else
        exit("{$path_url} is not found!!");
}

function old(string $key, mixed $default = '') {
    return htmlspecialchars($_POST[$key]) ?? $default;
}

function showErrorMessage(string $name) {
    if (array_key_exists("_flashed", $_SESSION)) {
        if (isset(Session::get("errors")[$name])): ?>
            <div class="mb-3">
                <?php if (is_array(Session::get("errors")[$name])): ?>
                    <?php foreach (Session::get("errors")[$name] as $error): ?>
                        <p class="text-danger"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-danger"><?= Session::get("errors")[$name] ?></p>
                <?php endif; ?>
            </div>
        <?php endif;
    }
}
function showFlashedData(string $name) {
    if (array_key_exists("_flashed", $_SESSION)) {
        if (isset($_SESSION['_flashed'][$name])): ?>
            <div class="mb-3 alert alert-danger">
                <p class="text-danger"><?= $_SESSION['_flashed'][$name] ?></p>
            </div>
        <?php endif;
    }
}