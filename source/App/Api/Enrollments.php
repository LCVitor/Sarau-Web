<?php

namespace Source\App\Api;

use Exception;
use CoffeeCode;
use Source\Core\TokenJWT;
use Source\Models\User;
use Source\Models\Enrollment;

class Enrollments extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getEnrollments()
    {
        $this->auth();
        $enrollment = new Enrollment();
        $this->back($enrollment->selectAll());
    }

    public function selectById(array $data) : void
    {
        $this->auth();
        $enrollment = new Enrollment();
        $this->back($enrollment->selectById($data["id"]));
        // RETURN:      
            // "id": depende,
            // "observation": "Algo aqui",
            // "presentation_time": "00:00:00",
            // "id_event": number,
            // "id_user": number,
            // "id_sector_artistic": number

    }
    
    public function addApproved(array $data) : void
    {
        $this->auth();
        $enrollment = new Enrollment($data["id"]);
        $this->back($enrollment->addApproved());
        // RETURN:      
            // message padrão!

    }

    public function addDismissed(array $data) : void
    {
        $this->auth();
        $enrollment = new Enrollment($data["id"]);
        $this->back($enrollment->addDismissed());
        // RETURN:      
            // message padrão!

    }

}