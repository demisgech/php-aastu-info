<?php

declare(strict_types=1);

namespace App\Models;

use App\Databases\Database;

use Exception;


class Post {
    private Database $database;

    public function __construct() {
        try {
            $this->database = Database::getDatabaseInstance();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Fetch all posts with user data.
     */
    public function getAll(): array {
        $sql = <<<SQL
            SELECT 
                posts.id AS post_id,
                posts.title,
                posts.content,
                posts.image_url,
                posts.published_at,
                users.id AS user_id,
                users.first_name,
                users.last_name,
                users.profile_url
            FROM posts
            INNER JOIN users ON posts.user_id = users.id
            ORDER BY posts.published_at DESC
        SQL;
        return $this->database
            ->query($sql)
            ->fetchAll();
    }

    public function create(array $data = []) {
        $sql = <<<SQL
                INSERT INTO posts(user_id,title,content,image_url)
                VALUES (:user_id, :title, :content, :image_url);
            SQL;

        return $this->database->query($sql, [
            "title" => $data['title'],
            "content" => $data['content'],
            "image_url" => $data['image_url'],
            "user_id" => $data['user_id']
        ]);
    }

    /**
     * Fetch all posts for specific user
     * @param int $userId
     * @return array
     */
    public function getPostByUserId(int $userId): array {
        $sql = <<<SQL
            SELECT 
                posts.id AS post_id,
                posts.title,
                posts.content,
                posts.image_url,
                posts.published_at,
                users.id AS user_id,
                users.first_name,
                users.last_name,
                users.profile_url
            FROM posts
            INNER JOIN users ON posts.user_id = users.id
            WHERE posts.user_id = :user_id
            ORDER BY posts.published_at DESC
        SQL;
        return $this->database
            ->query($sql, [
                "user_id" => $userId
            ])->fetchAll();
    }

    public function getPostById(int $id) {
        $sql = <<<SQL
                SELECT * FROM posts 
                WHERE id = :post_id;
            SQL;
        return $this->database
            ->query($sql, [
                "post_id" => $id
            ])->fetchOne();
    }

    public function update(int $postId, array $data = []) {
        $sql = <<<SQL
            UPDATE posts 
            SET title = :title, 
                content = :content, 
                image_url = :image_url
            WHERE user_id = :user_id AND id = :post_id;
        SQL;
        return $this->database->query($sql, [
            "title" => $data['title'],
            "content" => $data['content'],
            "image_url" => $data['image_url'],
            "user_id" => $data['user_id'],
            "post_id" => $postId
        ]);
    }

    public function delete(int $postId, int $userId) {
        $sql = <<<SQL
            DELETE FROM posts 
            WHERE user_id = :user_id AND id = :post_id;
        SQL;
        return $this->database->query($sql, [
            "user_id" => $userId,
            "post_id" => $postId
        ]);
    }

}