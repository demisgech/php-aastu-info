<?php

declare(strict_types=1);

namespace Config;

class AppConfig {
    public const DB_CONFIG = [
        "engine" => "mysql",
        "database" => [
            "host" => "localhost",
            "port" => 3306,
            "dbname" => "aastuinfo",
            "charset" => "utf8mb4"
        ],
        "user" => "root",
        "password" => "MyPassword"
    ];
}