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

}