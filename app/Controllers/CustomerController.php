<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Customer;
use App\Core\Controller;

class CustomerController extends Controller {
    public function index() {
        $customer = new Customer();
        $customersData = $customer->all();

        $this->views("index", [
            "customers" => $customersData
        ]);
    }
}