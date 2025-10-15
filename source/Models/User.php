<?php

namespace Source\Models;

use PDOException;
use Source\Core\Connect;
use Source\Core\Model;

class User extends Model {
    private $id;
    private $name;
    private $email;
    private $password;
    private $gender;
    private $number_phone;
    private $birth_date;
    private $id_role;

    private $message;

    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?string $email = null,
        ?string $password = null,
        ?string $gender = null,
        ?string $number_phone = null,
        ?string $birth_date = null,
        ?int $id_role = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
        $this->number_phone = $number_phone;
        $this->birth_date = $birth_date;
        $this->id_role = $id_role;
        $this->entity = "users";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getGender() : ?string
    {
        return $this->gender;
    }

    public function getPhone() : ?string
    {
        return $this->number_phone;
    }

    public function getBirthDate() : ?string
    {
        return $this->birth_date;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function insert(): ?int
    {

        $conn = Connect::getInstance();

        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $this->message = "E-mail Inválido!";
            return false;
        }

        $query = "SELECT * FROM users WHERE email LIKE :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();

        if($stmt->rowCount() == 1) {
            $this->message = "E-mail já cadastrado!";
            return false;
        }

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, email, password, id_role) 
                  VALUES (:name, :email, :password, :id_role)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":id_role", $this->id_role);

        try {
            $stmt->execute();
            return $conn->lastInsertId();
        } catch (PDOException) {
            $this->message = "Por favor, informe todos os campos!";
            return false;
        }
    }

    public function complete_Profile(int $id_user, $gender, $phone, $birth_date)
    {
        $conn = Connect::getInstance();
        $query = "UPDATE users SET gender = :gender, number_phone = :number_phone, birth_date = :birth_date WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":number_phone", $phone);
        $stmt->bindParam(":birth_date", $birth_date);
        $stmt->bindParam(":id", $id_user);
        
        try {
            $stmt->execute();
            $this->message = "Dados atualizados no perfil!";
            return true;
        } catch (PDOException) {
            $this->message = "Por favor, informe todos os campos!";
            return false;
        }
    }

    public function login(string $email, string $password): bool
    {
        $query = "SELECT * FROM {$this->entity} WHERE email = :email";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch();

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->message = "E-mail inválido!";
            return false;
        }

        if (!$result) {
            $this->message = "E-mail não cadastrado!";
            return false;
        }

        // if ($result->status != "active") {
        //     $this->message = "Conta inativa! Use uma válida ou crie uma nova.";
        //     return false;
        // }

        if (!password_verify($password, $result->password)) {
            $this->message = "Senha incorreta!";
            return false;
        }

        $this->setId($result->id);
        $this->setName($result->name);
        $this->setEmail($result->email);

        // $this->message = "Usuário logado com sucesso!";
        // return true;

        try {
            $stmt->execute();
            $this->message = "Usuário logado com sucesso!";
            return true;
        } catch (PDOException) {
            $this->message = "Por favor, informe todos os campos!";
            return false;
        }
    }

    public function users_join_roles ($id_user) : string
    {
        $conn = Connect::getInstance();

        $query = "SELECT roles.name FROM users INNER JOIN roles ON users.id_role = roles.id WHERE users.id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id_user);
        $stmt->execute();
        $result = $stmt->fetch();

        return $result->name ?? '';
    }

    // public function setPhoto(?string $photo): void
    // {
    //     $this->photo = $photo;
    // }

    public function update () : bool
    {
        $conn = Connect::getInstance();

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->message = "E-mail inválido!";
            return false;
        }

        $query = "SELECT * FROM users WHERE email LIKE :email AND id != :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        if($stmt->rowCount() == 1) {
            $this->message = "E-mail já cadastrado!";
            return false;
        }

        $query = "UPDATE users 
                  SET name = :name, email = :email
                  WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $this->id);

        try {
            $stmt->execute();
            $this->message = "Usuário atualizado com sucesso!";
            return true;
        } catch (PDOException $exception) {
            $this->message = "Erro ao atualizar: {$exception->getMessage()}";
            return false;
        }

    }

    public function updatePassword (string $password, string $newPassword, string $confirmNewPassword) : bool
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $result = $stmt->fetch();

        if (!password_verify($password, $result->password)) {
            $this->message = "Senha incorreta!";
            return false;
        }

        if ($newPassword != $confirmNewPassword) {
            $this->message = "As senhas não conferem!";
            return false;
        }

        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE users 
                  SET password = :password 
                  WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":password", $newPassword);
        $stmt->bindParam(":id", $this->id);

        try {
            $stmt->execute();
            $this->message = "Senha atualizada com sucesso!";
            return true;
        } catch (PDOException $exception) {
            $this->message = "Erro ao atualizar: {$exception->getMessage()}";
            return false;
        }

    }

    // public function updatePhoto (): bool
    // {
    //     // selecionar o usuário, se tiver foto, apagar para gravar nova
    //     $query = "SELECT photo FROM users WHERE id = :id";
    //     $stmt = Connect::getInstance()->prepare($query);
    //     $stmt->bindParam(":id", $this->id);
    //     $stmt->execute();
    //     $result = $stmt->fetch();
    //     // ser houver foto, apagar do diretório
    //     if ($result->photo) {
    //         unlink(__DIR__ . "/../../{$result->photo}");
    //     }

    //     $query = "UPDATE users 
    //               SET photo = :photo 
    //               WHERE id = :id";

    //     $stmt = Connect::getInstance()->prepare($query);
    //     $stmt->bindParam(":photo", $this->photo);
    //     $stmt->bindParam(":id", $this->id);

    //     try {
    //         $stmt->execute();
    //         $this->message = "Foto atualizada com sucesso!";
    //         return true;
    //     } catch (PDOException $exception) {
    //         $this->message = "Erro ao atualizar: {$exception->getMessage()}";
    //         return false;
    //     }

    // }

}