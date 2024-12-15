<?php
require_once "BaseWayTwigController.php";

class MainController extends BaseWayTwigController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext(): array {

        $context = parent::getContext();


        if (isset($_GET['type'])) {
            $query = $this->pdo->prepare("SELECT * FROM way WHERE type = :type");
            $query->bindValue("type", $_GET['type']);
            $query->execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM way");
        }
        

        $context['way'] = $query->fetchAll();

        $context['menu_items'] = [
            [
                
            ]
        ];
        return $context;
    }
    
}
