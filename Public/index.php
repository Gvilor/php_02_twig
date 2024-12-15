<?php

require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/SearchController.php";
require_once "../controllers/WayObjectCreateController.php";
require_once "../controllers/WayObjectDeleteController.php";
require_once "../controllers/WayObjectUpdateController.php";
$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true // добавляем тут debug режим
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=ways_money;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);

$router->add("/way/(?P<id>\d+)", ObjectController::class);

$router->add("/search", SearchController::class);

$router->add("/create_way", WayObjectCreateController::class);

$router->add("/way/delete", WayObjectDeleteController::class);

$router->add("/way/(?P<id>\d+)/edit", WayObjectUpdateController::class);


$router->get_or_default(Controller404::class);