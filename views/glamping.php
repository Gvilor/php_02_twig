<?php

$url = $_SERVER["REQUEST_URI"];
$is_gl_info = $url == "/glamping_info";
$is_gl_image = $url == "/glamping_image";
?>

<h3>Здесь я вам расскажу о том что такое Глэмпинг и почему это хороший способ заработка.</h3> <br>

<div class="btn-group">
    <a class="btn btn-primary <?php if ($url == "/glamping_info") { ?>active<?php } ?>" href="/glamping_info">Описание</a>
    <a class="btn btn-primary <?php if ($url == "/glamping_image") { ?>active<?php } ?>" href="/glamping_image">Картинки</a>
</div>

<ul class="list-group mt-4">
    <li class="list-group-item">
    <?php
        if ($url == "/glamping_info") {
            require "../views/glamping_info.php";
        }  elseif ($url == "/glamping_image") {
            require "../views/glamping_image.php";
        }

        ?>
    </li>
</ul>