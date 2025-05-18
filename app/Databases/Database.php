<?php

declare(strict_types=1);


namespace App\Databases;

use Config\AppConfig;

use PDO;
use PDOException;
use PDOStatement;
use RuntimeException;

class Database {
    private ?PDO $pdoConnection = null;
    private static ?Database $databaseInstance = null;
    private ?PDOStatement $statement = null;

    private function __construct() {

        try {
            $engine = AppConfig::DB_CONFIG['engine'];
            $database = AppConfig::DB_CONFIG['database'];
            $user = AppConfig::DB_CONFIG['user'];
            $password = AppConfig::DB_CONFIG['password'];

            $databaseServerName = $engine . ":" . http_build_query($database, "", ";");
            $this->pdoConnection = new PDO(
                $databaseServerName,
                $user,
                $password,
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
            $this->pdoConnection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

        } catch (PDOException $ex) {
            error_log($ex->getMessage());
            throw new RuntimeException("Connection failed!");
        }
    }

    public static function getDatabaseInstance(): static|null {
        if (static::$databaseInstance === null)
            static::$databaseInstance = new Database();
        return static::$databaseInstance;
    }

    public function destroyDatabaseInstance(): void {
        if ($this->pdoConnection !== null)
            $this->pdoConnection = null;
        if (static::$databaseInstance === null)
            static::$databaseInstance = null;
    }

    public function query(string $sql, array $params = [], array $options = []) {
        $this->statement = $this->pdoConnection->prepare($sql, $options ?? []);
        $this->statement->execute($params ?? []);
        return $this;
    }

    public function fetchAll() {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fetchOne(): mixed {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
}