<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class TelegrammController extends TwigBaseController
{
    public $template = "object.twig";
    public $title = "Телеграм";
    

    public function getContext(): array
    {
        $context = parent::getContext();

        $context["url_title"] = "telegramm";

        return $context;
    }
}
