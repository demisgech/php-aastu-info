<?php

namespace App\Helpers;

function view(string $viewName, array $data) {
    extract($data);
    // Define the path to the views directory
    $basePath = dirname(__DIR__) . '/Views/';
    $viewFile = $basePath . str_replace(".", DIRECTORY_SEPARATOR, $viewName) . ".view.php";

    if (file_exists($viewFile))
        require($viewFile);
    else
        die("{$viewFile} is not found!!!");
}


function load_view_component(string $viewName, array $data = []) {
    extract($data);

    $basePath = dirname(__DIR__) . '/Views/';
    $viewFile = $basePath . str_replace(".", DIRECTORY_SEPARATOR, $viewName) . ".php";

    if (file_exists($viewFile))
        require($viewFile);
    else
        die("{$viewFile} is not found!!!");

}