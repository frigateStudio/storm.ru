<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Салон Орхидея</title>
    <link href="../template/styles/styles.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Poiret+One&subset=cyrillic" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!--preLoader-->
    <style>
        #page-preLoader {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: #7F2906 url('../template/img/backgrounds/backLoad.svg') center no-repeat;
            z-index: 100;
        }
    </style>
    <script>
        $(window).on('load', function () {
            var $preLoader = $('#page-preLoader'),
                $spinner   = $preLoader.find('.spinner');
            $spinner.fadeOut();
            $preLoader.delay(350).fadeOut('slow');

        });

    </script>
</head>
<!--endPreLoader-->
<body>
<div id="page-preLoader"></div>

<header>
    <address>г. Лысково, ул. Мичурина д.56</address>
    <a id ="phone" href="tel:+7 (912) 052 44 07">+7 (912) 052 44 07</a>
    <img id="logo" src="../template/img/logo.png">
    <menu>
        <ul>
            <li><a href="/" class="ulMenu-1">ГЛАВНАЯ</a></li>
            <li><a href="/service/" class="ulMenu-2">УСЛУГИ</a></li>
            <li><a href="stock.html" class="ulMenu-3">АКЦИИ</a></li>
            <li><a href="gallery.html" class="ulMenu-4">ГАЛЕРЕЯ</a></li>
            <li><a href="review.html" class="ulMenu-5">ОТЗЫВЫ</a></li>
            <li><a href="contacts.html" class="ulMenu-6">КОНТАКТЫ</a></li>
        </ul>
    </menu>
</header>

