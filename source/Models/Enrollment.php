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
}