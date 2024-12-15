
<?php

class BaseWayTwigController extends TwigBaseController
{
    public function getContext(): array
{
    $context = parent::getContext();

    $query = $this->pdo->query("SELECT DISTINCT type FROM way ORDER BY 1");
    $types = $query->fetchAll();

    // Создаем копию массива с опцией "Все" для поиска
    $searchTypes = $types;
    array_unshift($searchTypes, ['type' => 'Все']);

    // Передаем оба массива в контекст
    $context['types'] = $types; // для навбара (без "Все")
    $context['search_types'] = $searchTypes; // для поиска (с "Все")

    return $context;
}
}