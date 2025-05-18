<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Forms\PostFormRequest;
use App\Core\Forms\URLIDRequest;
use App\Core\Forms\FileUploads\FileUploader;
use App\Core\Validators\ValidationException;
use App\Models\Post;

class PostController extends Controller {
    private Post $post;

    public function __construct() {
        $this->post = new Post();
    }
    public function index(): void {
        $postData = $this->post->getAll();

        $this->views("Posts.index", [
            "posts" => $postData
        ]);
    }

    public function store() {
        // header("Content-Type: application/json");
        $imageUrl = null;

        if (isset($_FILES['image_url'])) {
            $uploader = new FileUploader($_FILES['profile_url']);
            $uploader->upload();

            $imageUrl = $uploader->getRelativePath();
        }

        $formData = [
            "title" => $_POST["title"],
            "content" => $_POST["content"],
        ];
        try {
            $urlId = new URLIDRequest();
            $userId = 13; // Till user authentication

            $urlId->validate([
                // "id" => $_GET['user_id']
                "id" => $userId
            ]);
            $validIDData = $urlId->validData();

            $formRequest = new PostFormRequest();
            $formRequest->validate($formData);
            $validData = $formRequest->validData();
            $validData['user_id'] = $validIDData['id'];
            $validData['image_url'] = $imageUrl;

            echo json_encode($validData);

            $this->post->create($validData);

            header("Location: /posts");
            exit(0);

        } catch (ValidationException $ex) {
            echo json_encode($ex->getErrors());
        }
    }

    public function getPostByUser(string|int $userId) {
        // header("Content-Type:Application/json");
        try {
            $userIdData = new URLIDRequest();
            $userIdData->validate([
                "id" => (int) $userId
            ]);
            $validUserId = $userIdData->validData()['id'];

            $posts = $this->post->getPostByUserId($validUserId);
            // echo json_encode($posts);

            // header("Location: /posts");
            // exit(0);

        } catch (ValidationException $ex) {
            echo json_encode($ex->getErrors());
        }
    }

    public function show(string|int $id) {
        $URLId = new URLIDRequest();
        $URLId->validate([
            "id" => (int) $id
        ]);
        $validPostId = $URLId->validData()['id'];
        $post = $this->post->getPostById($validPostId);
        $this->views("Posts.show-post", [
            "post" => $post
        ]);
    }

    public function update(string|int $postId) {
        header("Content-Type: application/json");
        $imageUrl = null;

        if (isset($_FILES['image_url'])) {
            $uploader = new FileUploader($_FILES['profile_url']);
            $uploader->upload();

            $imageUrl = $uploader->getRelativePath();
        }

        $formData = [
            "title" => $_POST['title'],
            "content" => $_POST['content']
        ];

        try {
            $userId = 13;

            $urlUserId = new URLIDRequest();
            $urlUserId->validate([
                'id' => (int) $userId
            ]);
            $validUserId = $urlUserId->validData()['id'];

            $urlID = new URLIDRequest();
            $urlID->validate([
                'id' => (int) $postId
            ]);
            $validPostid = $urlID->validData()['id'];

            $formRequest = new PostFormRequest();
            $formRequest->validate($formData);
            $validData = $formRequest->validData();
            $validData['post_id'] = $validPostid;
            $validData['user_id'] = $validUserId;
            $validData['image_url'] = $imageUrl;

            echo json_encode($validData);

            $this->post->update($validPostid, $validData);
            header("Location: /posts");
            exit(0);

        } catch (ValidationException $ex) {
            echo json_encode($ex->getErrors());
        }

    }

    public function delete(string|int $postId) {
        header("Content-Type: application/json");
        try {
            $postIdUrl = new URLIDRequest();
            $postIdUrl->validate([
                "id" => (int) $postId
            ]);

            $validPostId = $postIdUrl->validData()['id'];

            $userId = 13;

            $userIdData = new URLIDRequest();
            $userIdData->validate([
                // "id"=>$_SESSION['user_id'], if user is authenticated
                "id" => (int) $userId
            ]);

            $validUserId = $userIdData->validData()['id'];

            // echo json_encode([
            //     "post_id" => $validPostId,
            //     "user_id" => $validUserId
            // ]);

            $this->post->delete($validPostId, $validUserId);
            header("Location: /posts");
            exit(0);

        } catch (ValidationException $ex) {
            echo json_encode($ex->getErrors());
        }
    }
}