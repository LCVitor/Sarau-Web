<?php

namespace Source\App;

use League\Plates\Engine;

class Admin extends AppController
{
    private $view;

    public function __construct()
    {
        parent::__construct();
        $this->view = new Engine(__DIR__ . "/../../themes/adm","php");
    }

    public function home ()
    {
        echo $this->view->render("home",[]);
    }

    public function events (): void
    {
        echo $this->view->render("events",[]);
    }

    public function profile (): void
    {
        echo $this->view->render("profile",[]);
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        header("Location: http://localhost/Sarau-Web/");
        exit;
    }

}