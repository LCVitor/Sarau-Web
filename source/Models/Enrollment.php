<?php
namespace Source\Models;

use PDOException;
use Source\Core\Connect;
use Source\Core\Model;

class Enrollment extends Model {
    private $id;
    private $observation;
    private $presentation_time;
    private $id_event;
    private $id_user;
    private $id_sector_artistic;

    private $message;

    public function __construct(
        ?int $id = null,
        ?string $observation = null,
        $presentation_time = null,
        ?int $id_event = null,
        ?int $id_user = null,
        ?int $id_sector_artistic = null,
    )
    {
        $this->id = $id;
        $this->observation = $observation;
        $this->presentation_time = $presentation_time;
        $this->id_event = $id_event;
        $this->id_user = $id_user;
        $this->id_sector_artistic = $id_sector_artistic;
        $this->entity = "enrollment";
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function enrollment(int $user_id, int $presentation_time, $observation, $sector)
    {
        $conn = Connect::getInstance();

        $query = "INSERT INTO enrollment (observation, presentation_time, id_event, id_user, id_sector_artistic)
        VALUES (:observation, :presentation_time, :id_event, :id_user, :id_sector_artistic)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":observation", $observation);

        $hours = floor($presentation_time / 60);
        $minutes = $presentation_time % 60;
        $formattedTime = sprintf("%02d:%02d:00", $hours, $minutes);
        $stmt->bindParam(":presentation_time", $formattedTime);

        $id_event = 2;
        $stmt->bindParam(":id_event", $id_event, \PDO::PARAM_INT);
        $stmt->bindParam(":id_user", $user_id, \PDO::PARAM_INT);
        $stmt->bindParam(":id_sector_artistic", $sector, \PDO::PARAM_INT);

        try {
            $stmt->execute();
            $this->message = "Inscrição realizada com sucesso!";
            return true;
        } catch (PDOException) {
            $this->message = "Por favor, informe todos os campos!";
            return false;
        }
    }

    public function addApproved(): bool 
    {
        $conn = Connect::getInstance();
        $query = "INSERT INTO approveds (date_approved, id_enrollment) VALUES (:date_approved, :id_enrollment)";
        $stmt = $conn->prepare($query);
        $date = date("Y-m-d H:i:s");
        $stmt->bindParam(":date_approved", $date);
        $stmt->bindParam(":id_enrollment", $this->id);
        
        try {
            $stmt->execute();
            $this->message = "Deferimento realizado com sucesso!";
            return true;
        } catch (PDOException) {
            $this->message = "Erro! Algo ocorreu.";
            return false;
        }
    }
    
    public function addDismissed($description): bool 
    {
        $conn = Connect::getInstance();
        $query = "INSERT INTO dismisseds (date_dismissed, description, id_enrollment) VALUES (:date_approved, :description, :id_enrollment)";
        $stmt = $conn->prepare($query);
        $date = date("Y-m-d H:i:s");
        $stmt->bindParam(":date_approved", $date);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":id_enrollment", $this->id);
        
        try {
            $stmt->execute();
            $this->message = "Indeferimento realizado com sucesso!";
            return true;
        } catch (PDOException) {
            $this->message = "Erro! Algo ocorreu.";
            return false;
        }
    }

    public function selectAll(): ?array
    {
        $conn = Connect::getInstance();

        $query = "
            SELECT 
                enrollment.id AS enrollment_id, 
                enrollment.observation AS enrollment_obs, 
                enrollment.presentation_time AS enrollment_pt, 
                events.name AS event_name, 
                events.date AS event_date, 
                users.id AS user_id, 
                users.name AS user_name, 
                sector_artistic.name AS sector_name
            FROM enrollment
            INNER JOIN events ON enrollment.id_event = events.id
            INNER JOIN users ON enrollment.id_user = users.id
            INNER JOIN sector_artistic ON enrollment.id_sector_artistic = sector_artistic.id
            LEFT JOIN approveds ON enrollment.id = approveds.id_enrollment
            LEFT JOIN dismisseds ON enrollment.id = dismisseds.id_enrollment
            WHERE events.id > 1
            AND approveds.id IS NULL
            AND dismisseds.id IS NULL
        ";

        return $conn->query($query)->fetchAll();
    }

    public function selectById(int $id): ?object
    {
        $conn = Connect::getInstance();

        $query = "
            SELECT 
                -- Dados da inscrição
                enrollment.id AS enrollment_id,
                enrollment.observation AS enrollment_observation,
                enrollment.presentation_time AS enrollment_time,

                -- Dados do usuário
                users.id AS user_id,
                users.name AS user_name,
                users.email AS user_email,
                users.number_phone AS user_phone,
                users.gender AS user_gender,
                YEAR(users.birth_date) AS user_birth_year,

                -- Dados do evento
                events.id AS event_id,
                events.name AS event_name,
                events.date AS event_date,

                -- Dados do setor artístico
                sector_artistic.id AS sector_id,
                sector_artistic.name AS sector_name

            FROM enrollment
            INNER JOIN users ON enrollment.id_user = users.id
            INNER JOIN events ON enrollment.id_event = events.id
            INNER JOIN sector_artistic ON enrollment.id_sector_artistic = sector_artistic.id
            WHERE enrollment.id = :id
            LIMIT 1
        ";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(); 

        return $result;
}
}