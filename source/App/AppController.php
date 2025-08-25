<?php
namespace Source\App;

class AppController
{
    public function __construct()
    {
        $this->auth();
    }

    protected function auth()
    {
        session_start();
        if (empty($_SESSION['user'])) {
            header("Location: http://localhost/Sarau-Web/");
            exit;
        }
    }
}