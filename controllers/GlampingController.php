<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class GlampingController extends TwigBaseController
{
    public $template = "object.twig";
    public $title = "Глэмпинг";
    

    public function getContext(): array
    {
        $context = parent::getContext();

        $context["url_title"] = "glamping";

        return $context;
    }
}
