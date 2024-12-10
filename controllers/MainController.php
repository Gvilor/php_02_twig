<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext(): array {

        $context = parent::getContext();

        $context['menu_items'] = [
            [
                "title" => "Глэмпинг",
                "url_title" => "glamping"
            ],
            [
                "title" => "Телеграм",
                "url_title" => "telegramm"
            ]
        ];
        return $context;
    }
    
}
