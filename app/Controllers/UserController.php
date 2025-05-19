<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Forms\FileUploads\FileUploader;
use App\Core\Forms\FileUploads\FileUploadException;
use App\Core\Forms\URLIDRequest;
use App\Core\Forms\UserRegistrationFormRequest;
use App\Core\Forms\UserUpdateFormRequest;
use App\Core\Validators\ValidationException;
use App\Http\Redirect;
use App\Http\Session;
use App\Models\User;


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



        $formData = [
            "first_name" => $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        ];

        try {

            $userFormRequest = new UserRegistrationFormRequest();
            $userFormRequest->validate($formData);

            $validData = $userFormRequest->validData();

            $imageUrl = null;
            try {

                $uploader = new FileUploader($_FILES['profile_url']);
                $uploader->upload();

                $imageUrl = $uploader->getRelativePath();
            } catch (FileUploadException $ex) {
                Session::flash('errors', [
                    "profile_url" => $ex->getMessage()
                ]);
            }

            $validData['profile_url'] = $imageUrl;

            $this->user->create($validData);

            Redirect::to("/users");

        } catch (ValidationException $ex) {
            Session::flash("errors", $ex->getErrors());
            Redirect::to("/users/create");
        }
    }

    public function update(string|int $id) {
        $formData = [
            "first_name" => $_POST['first_name'],
            "last_name" => $_POST['last_name'],
        ];
        try {

            $formRequest = new UserUpdateFormRequest();
            $formRequest->validate($formData);
            $validData = $formRequest->validData();
            try {

                $uploader = new FileUploader($_FILES['profile_url']);
                $uploader->upload();

                $validData['profile_url'] = $uploader->getRelativePath();
            } catch (FileUploadException $ex) {
                Session::flash("errors", $ex->getMessage());
                Redirect::to("/users/{id}");
            }

            $urlId = new URLIDRequest();

            $urlId->validate([
                "id" => (int) $id
            ]);

            $validURLData = $urlId->validData();

            $this->user->update($validURLData['id'], $validData);

            Redirect::to("/users");

        } catch (ValidationException $ex) {
            Session::flash("errors", $ex->getErrors());
            Redirect::to("/users/{id}");
        }
    }

    public function delete(string|int $id) {
        try {
            $urlId = new URLIDRequest();
            $urlId->validate([
                "id" => (int) $id
            ]);
            $validData = $urlId->validData();
            $this->user->delete($validData['id']);

            Redirect::to("/users");

        } catch (ValidationException $ex) {
            Session::flash("errors", $ex->getErrors());
            Redirect::to("/users/{id}");
        }
    }

    public function show(string|int $id) {
        $data = [
            "id" => (int) $id
        ];

        try {

            $idRequest = new URLIDRequest();

            $idRequest->validate($data);
            $validData = $idRequest->validData();

            $user = $this->user->getById($validData['id']);

            $this->views("Users.show-user", [
                "user" => $user
            ]);

        } catch (ValidationException $ex) {
            Session::flash("errors", $ex->getErrors());
            Redirect::to("/users/{id}");
        }
    }
}