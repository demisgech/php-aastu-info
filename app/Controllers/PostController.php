<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Forms\FileUploads\FileUploadException;
use App\Core\Forms\PostFormRequest;
use App\Core\Forms\URLIDRequest;
use App\Core\Forms\FileUploads\FileUploader;
use App\Core\Validators\ValidationException;
use App\Http\Redirect;
use App\Http\Session;
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

        $formData = [
            "title" => $_POST["title"],
            "content" => $_POST["content"],
        ];
        try {

            $imageUrl = null;
            try {
                if (isset($_FILES['image_url'])) {
                    $uploader = new FileUploader($_FILES['profile_url']);
                    $uploader->upload();

                    $imageUrl = $uploader->getRelativePath();
                }
            } catch (FileUploadException $ex) {
                Session::flash("errors", [
                    "image_url" => $ex->getMessage()
                ]);
            }

            $urlId = new URLIDRequest();
            $userId = $_SESSION['user']['id'];// Get userId from authenticated user

            $urlId->validate([
                "id" => $userId
            ]);

            $validUserId = $urlId->validData()['id'];

            $formRequest = new PostFormRequest();
            $formRequest->validate($formData);
            $validData = $formRequest->validData();
            $validData['user_id'] = $validUserId;
            $validData['image_url'] = $imageUrl;

            // echo json_encode($validData);

            $this->post->create($validData);

            Redirect::to("/posts");

        } catch (ValidationException $ex) {
            Session::flash("errors", $ex->getErrors());
            Redirect::to("/posts");
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

            Redirect::to("/posts");

        } catch (ValidationException $ex) {
            echo json_encode($ex->getErrors());
        }
    }

    public function show(string|int $id) {
        try {
            $URLId = new URLIDRequest();
            $URLId->validate([
                "id" => (int) $id
            ]);
            $validPostId = $URLId->validData()['id'];
            $post = $this->post->getPostById($validPostId);
            $this->views("Posts.show-post", [
                "post" => $post
            ]);
        } catch (ValidationException $ex) {
            Session::flash("errors", $ex->getErrors());
            Redirect::to("/posts/{id}");
        }
    }

    public function update(string|int $postId) {

        $formData = [
            "title" => $_POST['title'],
            "content" => $_POST['content']
        ];

        try {
            try {
                $imageUrl = null;
                if (isset($_FILES['image_url'])) {
                    $uploader = new FileUploader($_FILES['profile_url']);
                    $uploader->upload();

                    $imageUrl = $uploader->getRelativePath();
                }
            } catch (FileUploadException $ex) {
                Session::flash("errors", [
                    "image_url" => $ex->getMessage()
                ]);
            }
            $userId = $_SESSION['user']['id'];
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
            Redirect::to("/posts");

        } catch (ValidationException $ex) {
            Session::flash("errors", $ex->getErrors());
            Redirect::to("/posts/{id}");
        }
    }

    public function delete(string|int $postId) {

        try {
            $postIdUrl = new URLIDRequest();
            $postIdUrl->validate([
                "id" => (int) $postId
            ]);

            $validPostId = $postIdUrl->validData()['id'];

            $userId = $_SESSION['user']['id'];

            $userIdData = new URLIDRequest();
            $userIdData->validate([
                "id" => (int) $userId
            ]);

            $validUserId = $userIdData->validData()['id'];

            // echo json_encode([
            //     "post_id" => $validPostId,
            //     "user_id" => $validUserId
            // ]);

            $this->post->delete($validPostId, $validUserId);
            Redirect::to("/posts");
        } catch (ValidationException $ex) {
            Session::flash("errors", $ex->getErrors());
            Redirect::to("/posts/{id}");
        }
    }
}