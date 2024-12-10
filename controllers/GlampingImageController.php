<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class GlampingImageController extends GlampingController
{
    public $template = "object_image.twig";
    

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $context["image_url"] = '/Images/glamping.jpg';

        return $context;
    }
}
