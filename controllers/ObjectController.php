<?php
require_once "BaseWayTwigController.php";

class ObjectController extends BaseWayTwigController {
    public $template = "object.twig"; // указываем шаблон по умолчанию

    public function getTemplate() {
        $show = $_GET['show'] ?? null;
        if ($show === 'info') 
            return 'object_info.twig';
        if ($show === 'image') 
            return 'object_image.twig';
    }

    public function getContext(): array {
        $context = parent::getContext();

        // Получаем параметр show из GET-запроса
        $show = $_GET['show'] ?? null;

        // Создаем запрос для получения данных из БД
        $query = $this->pdo->prepare("SELECT * FROM way WHERE id = :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();

        // В зависимости от параметра show, изменяем шаблон и контекст
        if ($show === 'image') {
            $this->template = "object_image.twig";
            $context['image_url'] = $data['image'];
        } elseif ($show === 'info') {
            $this->template = "object_info.twig";
            $context['info'] = $data['info'];
        } else {
            $this->template = "object.twig";
            $context['description'] = $data['description'];
        }
        $context['object'] = $data;

        return $context;
    }
}
