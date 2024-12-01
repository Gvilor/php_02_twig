<ul class="list-group">
    <li class="list-group-item">
        <div class="btn-group">
            <a class="btn btn-primary active" aria-current="page" href="/glamping">Глэмпинг</a>
            <a class="btn btn-primary" href="/glamping_info">Описание</a>
            <a class="btn btn-primary">Картинка</a>
        </div>
    </li>
    <li class="list-group-item">
        <div class="btn-group">
            <a class="btn btn-primary active" aria-current="page" href="/telegramm">Телеграмм</a>
            <a class="btn btn-primary">Описание</a>
            <a class="btn btn-primary">Картинка</a>
        </div>
    </li>
</ul>


<div class="container">
    <?php 
    $url = $_SERVER["REQUEST_URI"];
    if ($url == "/glamping") {
        require "../views/glamping.php";
    } elseif ($url == "/telegramm") {
        require "../views/telegramm.php";
    } 
    ?>
</div>
