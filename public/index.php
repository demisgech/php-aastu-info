<?php

require_once __DIR__ . '/../vendor/autoload.php';


use App\Controllers\CustomerController;

$controller = new CustomerController();

$controller->index();


