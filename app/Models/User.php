<?php

declare(strict_types=1);

namespace App\Models;

use App\Databases\Database;
use Exception;

class User {
    private array $data;

    public function __construct() {
        try {
            $database = Database::getDatabaseInstance();
            $query = $database->query("SELECT * FROM users");
            $result = $query->fetchAll();
            $this->data = $result;

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getData() {
        return $this->data;
    }
}