<?php

namespace Source\App\Api;

use Exception;
use CoffeeCode;
use Source\Core\TokenJWT;
use Source\Models\User;
use Source\Models\Enrollment;
use Source\Support\ImageUploader;

class Users extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findById ()
    {
        $this->auth();

        $users = new User();
        $user = $users->selectById($this->userAuth->id);

        $this->back([
            "type" => "success",
            "message" => "Todas as informações",
            "user" => [
                "id" => $this->userAuth->id,
                "name" => $user->name,
                "email" => $user->email,
                "gender" => $user->gender,
                "number_phone" => $user->number_phone,
                "birth_date" => $user->birth_date,
            ]
        ]);

    }

    public function tokenValidate ()
    {
        $this->auth();

        $this->back([
            "type" => "success",
            "message" => "Token válido",
            "user" => [
                "id" => $this->userAuth->id,
                "name" => $this->userAuth->name,
                "email" => $this->userAuth->email
            ]
        ]);
    }

    public function complete_Profile(array $data)
    {
        $this->auth();
        $user = new User();

        if (!$user->complete_Profile($this->userAuth->id, $data["gender"], $data["phone"], $data["date"])) {
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => $user->getMessage()
        ]);
    }

    public function enrollment(array $data)
    {
        $this->auth();
        $enrollment = new Enrollment();
        if (!$enrollment->enrollment($this->userAuth->id, $data["presentation_time"], $data["observation"], $data["sector"])) {
            $this->back([
                "type" => "error",
                "message" => $enrollment->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => $enrollment->getMessage()
        ]);
    }

    public function registration(array $data)
    {
        if(in_array("", $data)) {
            $this->back([
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        if($data["passwordConfirm"] != $data["password"]) {
            $this->back([
                "type" => "error",
                "message" => "Senhas não conferem!"
            ]);
            return;
        }
        $id_role = 2;
        $user = new User(
            null, 
            $data["name"],
            $data["email"], 
            $data["password"], 
            null, 
            null, 
            null,
            $id_role 
        );

        $insert = $user->insert();
        
        if(!$insert){
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Usuário cadastrodo com sucesso!"
        ]);
    }

    public function listUsers ()
    {
        // $this->auth();
        $users = new User();
        $this->back($users->selectAll());
    }

    public function login(array $data) 
    {
        $user = new User();
        $path = "Sem nada por enquanto...";
        $user_type = ""; 

        if (!$user->login($data["email"], $data["password"])) {
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        switch ($user->users_join_roles($user->getId())) {
            case "PARTICIPANT":
                $path = "http://localhost/Sarau-Web/app/";
                break;
            
            case "ADMIN":
                $path = "http://localhost/Sarau-Web/admin/";
                break;

            default:
                $path = "Error!";
                break;
        }

        
        $user_type = $user->users_join_roles($user->getId());
        session_start();
        $_SESSION['user'] = [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'role' => $user_type
        ];
        
        $token = new TokenJWT();
        $this->back([
            "type" => "success",
            "message" => $user->getMessage(),
            "path" => $path,
            "user" => [
                "id" => $user->getId(),
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "userType" => $user_type, 
                "token" => $token->create([
                    "id" => $user->getId(),
                    "name" => $user->getName(),
                    "email" => $user->getEmail()
                ])
            ]
        ]);
    }

    public function updateUser(array $data)
    {

        if(!$this->userAuth){
            $this->back([
                "type" => "error",
                "message" => "Você não pode estar aqui.."
            ]);
            return;
        }

        $user = new User(
            $this->userAuth->id,
            $data["name"],
            $data["email"],
            '',
            $data["address"]
        );

        if(!$user->update()){
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => $user->getMessage(),
            "user" => [
                "id" => $user->getId(),
                "name" => $user->getName(),
                "email" => $user->getEmail()
            ]
        ]);

    }

    public function updatePhoto(array $data)
    {

        $imageUploader = new ImageUploader();
        $photo = (!empty($_FILES["photo"]["name"]) ? $_FILES["photo"] : null);

        $this->auth();

        if (!$photo) {
            $this->back([
                "type" => "error",
                "message" => "Por favor, envie uma foto do tipo JPG ou JPEG"
            ]);
            return;
        }

        $upload = $imageUploader->upload($photo);

        $user = new User(
            id: $this->userAuth->id,
            photo: $upload
        );

        if (!$user->updatePhoto()) {
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => $user->getMessage(),
            "user" => [
                "id" => $user->getId(),
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "photo" => $user->getPhoto()
            ]
        ]);

    }

    public function getPhoto (array $data)
    {
        $this->auth();

        $user = new User();
        $userPhoto = $user->selectById($this->userAuth->id);

        $this->back([
            "type" => "success",
            "message" => "Foto do usuário",
            "photo" => $userPhoto->photo
        ]);
    }

    public function setPassword(array $data)
    {
        if(!$this->userAuth){
            $this->back([
                "type" => "error",
                "message" => "Você não pode estar aqui.."
            ]);
            return;
        }

        $user = new User($this->userAuth->id);

        if(!$user->updatePassword($data["password"],$data["newPassword"],$data["confirmNewPassword"])){
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => $user->getMessage()
        ]);
    }
}