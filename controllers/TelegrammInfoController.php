<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class TelegrammInfoController extends TelegrammController
{
    public $template = "telegramm_info.twig";
    

    public function getContext(): array
    {
        $context = parent::getContext();
        
        
        return $context;
    }
}
