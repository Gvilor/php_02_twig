<?php

require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/GlampingController.php";
require_once "../controllers/GlampingImageController.php";
require_once "../controllers/GlampingInfoController.php";
require_once "../controllers/TelegrammController.php";
require_once "../controllers/TelegrammImageController.php";
require_once "../controllers/TelegrammInfoController.php";
require_once "../controllers/Controller404.php";
$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];
$title = "";
$template = "";
$context = [];
$controller = null;

$controller = new Controller404($twig);

if ($url == "/main") {
    
    $controller = new MainController($twig);

} elseif (preg_match("#^/glamping#", $url)) {

    $is_info = $url == '/glamping/info';
    $is_image = $url == '/glamping/image';
    
    $controller = new GlampingController($twig);

    if ($is_image) {
        $controller = new GlampingImageController($twig);
    } elseif ($is_info) {
        $controller = new GlampingInfoController($twig);
    }

} elseif (preg_match("#^/telegramm#", $url)) {
    
    $is_info = $url == '/telegramm/info';
    $is_image = $url == '/telegramm/image';

    $controller = new TelegrammController($twig);

    if ($is_image) {
       $controller = new TelegrammImageController($twig);
        
    } elseif ($is_info) {
        $controller = new TelegrammInfoController($twig);
    }

}


// $context['title'] = $title;

// echo $twig->render($template, $context);


if ($controller) {
    $controller->get();
}