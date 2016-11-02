<?php
include ROOT . '/views/layouts/header.php';
?>
<main>
    <div class="slider">
        <?php foreach ($slides as $slide): ?>

            <div>
                <div class="slideText">
                    <h3><?php echo $slide['header']; ?></h3>
                    <p><?php echo $slide['content']; ?></p>
                </div>
                <img src="<?php echo $slide['url_image'] ?>">
            </div>

        <?php endforeach; ?>
    </div>


    <a href="#" id="doRecord">ЗАПИСАТЬСЯ ОНЛАЙН</a>

    <div id="service-carts-container">

        <div class="service-cart">
            <p>СТРИЖКИ</p>
            <img src="http://dummyimage.com/295x280/329456"/>
        </div>
        <div class="service-cart">
            <p>ПРИЧЕСКИ</p>
            <img src="http://dummyimage.com/295x280/329456"/>
        </div>
        <div class="service-cart">
            <p>МАНИКЮР</p>
            <img src="http://dummyimage.com/295x280/329456"/>
        </div>
        <div class="service-cart">
            <p>СОЛЯРИЙ</p>
            <img src="http://dummyimage.com/295x280/329456"/>
        </div>
    </div>
    <!--YandexMaps-->
    <script type="text/javascript" charset="utf-8" async
            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Asd5OyIh6qK2ZuzM8Uo6ZiXauGhX-RUd&amp;width=100%&amp;height=500&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>

</main>
<!--подключение футера -->
<?php
include ROOT . '/views/layouts/footer.php';
?>

<!--Для слайдера-->
<link rel="stylesheet" type="text/css" href="../template/slider/slick.css"/>
<link rel="stylesheet" type="text/css" href="../template/slider/slick-theme.css"/>
<script type="text/javascript" src="../template/slider/slick.min.js"></script>
<script type="text/javascript" src="../template/js/sliderIndex.js"></script>


</body>
</html>
