<?php
include ROOT . '/views/layouts/adminHeader.php';
?>
</head>
<body>
<main>
    <?php
    include ROOT . '/views/admin/navButton.php';
    ?>

    <div id="mainMenu">
        <span>
            Панель администратора
        </span>
        <div id="menuContainer">
            <a href="#" id="controlRecord" class="controlButton">Записи</a>
            <a href="/editSlider" id="controlSlider" class="controlButton">Слайдер</a>
            <a href="#" id="controlAction" class="controlButton">Акции</a>
            <a href="#" id="controlService" class="controlButton">Цены</a>
            <a href="#" id="controlPhoto" class="controlButton">Фото</a>
            <a href="#" id="controlReview" class="controlButton">Отзывы</a>
            <a href="#" id="controlQuestion" class="controlButton">Вопросы</a>
            <a href="#" id="controlMasters" class="controlButton">Мастера</a>
            <a href="#" id="controlContacts" class="controlButton">Контакты</a>
        </div>


    </div>


</main>
</body>
</html>
