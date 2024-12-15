<?php

// в кой то веки наследуемся не от TwigBaseController а от BaseController
class WayObjectUpdateController extends BaseWayTwigController {

    public $template = "way_object_edit.twig";
    public function get(array $context)
    {
        $id = $this->params['id'];


        $sql =<<<EOL
SELECT * FROM way WHERE id = :id
EOL; // сформировали запрос
        
        // выполнили
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();

        $data = $query->fetch();

        $context['object'] = $data;

        parent::get($context);
    }
    public function post(array $context) {
        $id = $this->params['id'];
        
        // Получаем текущие данные записи
        $currentDataQuery = $this->pdo->prepare("SELECT * FROM way WHERE id = :id");
        $currentDataQuery->bindValue(":id", $id);
        $currentDataQuery->execute();
        $currentData = $currentDataQuery->fetch();
        
        // Получаем значения полей с формы или используем текущие значения
        $title = !empty($_POST['title']) ? $_POST['title'] : $currentData['title'];
        $description = !empty($_POST['description']) ? $_POST['description'] : $currentData['description'];
        $type = !empty($_POST['type']) ? $_POST['type'] : $currentData['type'];
        $info = !empty($_POST['info']) ? $_POST['info'] : $currentData['info'];
        
        // Проверяем, было ли загружено новое изображение
        if (!empty($_FILES['image']['tmp_name'])) {
            $tmp_name = $_FILES['image']['tmp_name'];
            $name = $_FILES['image']['name'];
            move_uploaded_file($tmp_name, "../public/media/$name");
            $image_url = "/media/$name";
            
            // SQL запрос с обновлением изображения
            $sql = <<<EOL
            UPDATE way 
            SET title = :title, 
                description = :description, 
                type = :type, 
                info = :info, 
                image = :image_url
            WHERE id = :id
            EOL;
            
            $query = $this->pdo->prepare($sql);
            $query->bindValue("image_url", $image_url);
        } else {
            // SQL запрос без обновления изображения
            $sql = <<<EOL
            UPDATE way 
            SET title = :title, 
                description = :description, 
                type = :type, 
                info = :info
            WHERE id = :id
            EOL;
        }
    
        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        
        if (!empty($_FILES['image']['tmp_name'])) {
            $query->bindValue("image_url", $image_url);
        }
        
        $query->execute();
        
        // Перенаправляем на страницу объекта после обновления
        header("Location: /way/$id");
        exit;
    }
    
    
}
