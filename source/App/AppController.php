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

        $currentRoute = $_SERVER['REQUEST_URI'];
        $role = $_SESSION['user']['role'];

        // Bloquear acesso indevido
        if (str_starts_with($currentRoute, "/Sarau-Web/admin") && $role !== "ADMIN") {
            header("Location: http://localhost/Sarau-Web/app");
            exit;
        }

        if (str_starts_with($currentRoute, "/Sarau-Web/app") && $role !== "PARTICIPANT") {
            header("Location: http://localhost/Sarau-Web/admin");
            exit;
        }
    }
}