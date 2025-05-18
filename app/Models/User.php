<?php

declare(strict_types=1);

namespace App\Models;

use App\Databases\Database;
use Exception;

class User {
    private Database $database;

    public function __construct() {
        try {
            $this->database = Database::getDatabaseInstance();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function create(array $data = []) {
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        $sql = <<<SQL
            INSERT INTO users(first_name,last_name,email,password,profile_url)
            VALUES (:first_name,:last_name,:email,:password,:profile_url);
        SQL;

        return $this->database->query($sql, [
            "first_name" => $data['first_name'],
            "last_name" => $data['last_name'],
            "email" => $data['email'],
            "password" => $hashedPassword,
            "profile_url" => $data['profile_url']
        ]);
    }

    public function getAll(): array {
        $sql = <<<SQL
            SELECT * FROM users
        SQL;

        return $this->database->query($sql)->fetchAll();
    }

    public function getById(int $id): array {
        $sql = <<<SQL
            SELECT * FROM users
            WHERE id = :id;
        SQL;

        return $this->database->query($sql, [
            "id" => $id
        ])->fetchOne();
    }

    public function update(
        int $id,
        string $firstName,
        string $lastName,
        string $password,
        string $profileUrl
    ) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = <<<SQL
            UPDATE users SET first_name = :first_name,
                            last_name = :last_name,
                            password = :password,
                            profile_url = :profile_url
            WHERE id = :id;
        SQL;
        return $this->database->query($sql, [
            "first_name" => $firstName,
            "last_name" => $lastName,
            "password" => $hashedPassword,
            "profile_url" => $profileUrl,
            "id" => $id
        ]);
    }

    public function delete(int $id) {
        $sql = <<<SQL
            DELETE FROM users
            WHERE id = :id;
        SQL;

        return $this->database->query($sql, [
            "id" => $id
        ]);
    }


    public function __destruct() {
        $this->database->destroyDatabaseInstance();
    }
}