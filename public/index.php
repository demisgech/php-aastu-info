<?php

require_once __DIR__ . '/../vendor/autoload.php';


use function App\Routes\router;


$path = $_SERVER['REQUEST_URI'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

router()->route($path, $method);



