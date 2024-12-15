<?php

require_once "BaseWayTwigController.php";
class SearchController extends BaseWayTwigController
{
    public $template = "search.twig";
    public function getContext(): array
    {
        $context = parent::getContext();

        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';

        $description = isset($_GET['description']) ? $_GET['description'] : '';

        if ($type === 'Все') {
            $type = '';
        }

        $sql = <<<EOL
SELECT id, title, image, description
FROM way
WHERE (:title = '' OR title LIKE CONCAT('%', :title, '%'))
    AND (:type = '' OR type = :type)
    AND (:description = '' OR description LIKE CONCAT('%', :description, '%'))
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("type", $type);
        $query->bindValue("description", $description);
        $query->execute();
        $results = $query->fetchAll();
        $context['results'] = $results;

        return $context;
    }
}