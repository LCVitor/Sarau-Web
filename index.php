<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");
$route->get("/", "Web:home");

$route->group("/app");
$route->get("/", "App:home");
$route->get("/perfil", "App:profile");
$route->get("/inscrições", "App:registrations");
$route->get("/eventos", "App:events");

$route->get("/logout", "App:logout"); // Rota para realizar o logout

$route->group(null);

$route->group("/admin");

$route->get("/", "Admin:home");
$route->get("/servicos", "Admin:services");
$route->get("/produtos", "Admin:products");

$route->group(null);

$route->get("/ops/{errcode}", "Web:error");

$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();