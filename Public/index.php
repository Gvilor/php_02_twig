<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" />

</head>

<body>


    <?php
    $url = $_SERVER["REQUEST_URI"];
    // объявили переменную, которая True если адрес совпадает с адресом с страницы с картинкой
    $is_main = $url == "/main"; 
    $is_glamping = $url == "/glamping";
    $is_telegramm = $url == "/telegramm";
    ?>




    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-sharp fa-solid fa-fire"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($url== "/main") { ?>active<?php } ?>" aria-current="page" href="/main">
                            Главная
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($url== "/glamping") { ?>active<?php } ?>" href="/glamping">
                        Глэмпинг
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($url== "/telegramm") { ?>active<?php } ?>" href="/telegramm">
                        Телеграмм
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <div class="container">
        <?php

        $url = $_SERVER["REQUEST_URI"];


        if ($url == "/main") {
            require "../views/main.php";
        } elseif (preg_match("#^/glamping#", $url)) {
            require "../views/glamping.php";
        } elseif (preg_match("#^/telegramm#", $url)) {
            require "../views/telegramm.php";
        }

        ?>


    </div>



    <header>
        <!-- place navbar here -->
    </header>
    <main></main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>