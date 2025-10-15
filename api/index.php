<?php

ob_start();

require  __DIR__ . "/../vendor/autoload.php";

// os headers abaixo são necessários para permitir o acesso a API
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header('Access-Control-Allow-Credentials: true'); // Permitir credenciais

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

use CoffeeCode\Router\Router;
use Source\App\Api\Users;

$route = new Router(url(),":");

$route->namespace("Source\App\Api");

/* USERS */ 
$route->group("/users");
$route->get("/", "Users:listUsers");
$route->post("/login", "Users:login"); //localhost/Sarau-Web/api/users/login
$route->post("/registration", "Users:registration");
$route->get("/findById", "Users:findById");
$route->post("/enrollment", "Users:enrollment");
$route->post("/complete_Profile", "Users:complete_Profile");
$route->group("null");

/* ENROLLMENT */
$route->group("/enrollments");
$route->get("/selectAll", "Enrollments:getEnrollments");
$route->get("/selectById/{id}", "Enrollments:selectById");
$route->get("/addApproved/{id}", "Enrollments:addApproved");
$route->post("/addDismissed", "Enrollments:addDismissed");
$route->group("null");

$route->dispatch();

/** ERROR REDIRECT */
if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

ob_end_flush();
