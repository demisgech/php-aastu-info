<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Forms\FileUploads\FileUploader;
use App\Core\Forms\UserRegistrationFormRequest;
use App\Core\Validators\ValidationException;
use App\Models\User;

use Uploader\Uploader;

class UserController extends Controller {
    private User $user;

    public function __construct() {
        $this->user = new User();

    }

    public function index() {
        $data = $this->user->getAll();
        $this->views("Users.index", [
            "users" => $data
        ]);
    }

    public function create() {
        $this->views("Users.create-user");
    }
    public function store() {
        // header("Content-Type: Application/json");

        $imageUrl = null;

        $uploader = new FileUploader($_FILES['profile_url']);
        $uploader->upload();

        $imageUrl = $uploader->getRelativePath();


        $formData = [
            "first_name" => $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        ];

        // echo json_encode($formData, JSON_PRETTY_PRINT);

        try {

            $userFormRequest = new UserRegistrationFormRequest();
            $userFormRequest->validate($formData);

            $validData = $userFormRequest->validData();
            $validData['profile_url'] = $imageUrl;

            // echo json_encode($validData, JSON_PRETTY_PRINT);

            $this->user->create($validData);

            header("Location: /users");
            exit(0);

        } catch (ValidationException $ex) {
            echo json_encode($ex->getErrors());
        }

    }
}