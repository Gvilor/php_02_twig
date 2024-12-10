<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class GlampingInfoController extends GlampingController
{
    public $template = "glamping_info.twig";
    

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $context["image_url"] = '/Images/glamping.jpg';
        
        return $context;
    }
}
