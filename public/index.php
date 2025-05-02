<?php

require_once __DIR__ . '/../vendor/autoload.php';


// use App\Controllers\HomeController;
use App\Controllers\AdmissionController;

$controller = new AdmissionController();

$controller->index();


