<?php

namespace Source\App;

use League\Plates\Engine;

class App extends AppController
{
    private $view;

    public function __construct()
    {
        parent::__construct(); // chama a autenticação
        $this->view = new Engine(__DIR__ . "/../../themes/app","php");
    }

    public function home ()
    {
        echo $this->view->render("home",[]);
    }

    public function profile ()
    {
        echo $this->view->render("profile",[]);
    }

    public function registrations ()
    {
        echo $this->view->render("registrations", []);
    }

    public function events ()
    {
        echo $this->view->render("events", []);
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