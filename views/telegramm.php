<?php

$url = $_SERVER["REQUEST_URI"];
$is_gl_info = $url == "/telegramm_info";
$is_gl_image = $url == "/telegramm_image";
?>

<h3>Здесь я вам расскажу о том что такое Telegramm и почему это хороший способ заработка.</h3> <br>

<div class="btn-group">
    <a class="btn btn-primary <?php if ($url == "/telegramm_info") { ?>active<?php } ?>" href="/telegramm_info">Описание</a>
    <a class="btn btn-primary <?php if ($url == "/telegramm_image") { ?>active<?php } ?>" href="/telegramm_image">Картинки</a>
</div>

<ul class="list-group mt-4">
    <li class="list-group-item">
    <?php
        if ($url == "/telegramm_info") {
            require "../views/telegramm_info.php";
        }  elseif ($url == "/telegramm_image") {
            require "../views/telegramm_image.php";
        }

        ?>
    </li>
</ul>