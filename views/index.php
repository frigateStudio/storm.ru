<?
include ROOT.'/views/layouts/header.php';
?>
<main>

    <div class="slider">
        <div>
            <div class="slide_desc">
                <h3>ЗАГОЛОВОК</h3>
                <p>Текст акции или предложения с 50% скидкой!</p>
            </div>
            <img src="http://dummyimage.com/1500x500/329456">


        </div>
        <div>
            <div class="slide_desc">
                <h3>ЗАГОЛОВОК</h3>
                <p>Текст акции или предложения с 50% скидкой!</p>
            </div>
            <img src="http://dummyimage.com/1500x500/423456">
        </div>
        <div>
            <div class="slide_desc">
                <h3>ЗАГОЛОВОК</h3>
                <p>Текст акции или предложения с 50% скидкой!</p>
            </div>
            <img src="http://dummyimage.com/1500x500/399096" >

        </div>
        <div>
            <div class="slide_desc">
                <h3>ЗАГОЛОВОК</h3>
                <p>Текст акции или предложения с 50% скидкой!</p>
            </div>
            <img src="http://dummyimage.com/1500x500/320300"></div>
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
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Asd5OyIh6qK2ZuzM8Uo6ZiXauGhX-RUd&amp;width=100%&amp;height=500&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>

</main>
<!--подключение футера -->
<?
    include ROOT.'/views/layouts/footer.php';
?>

<!--Для слайдера-->
<link rel="stylesheet" type="text/css" href="../template/slider/slick.css"/>
<link rel="stylesheet" type="text/css" href="../template/slider/slick-theme.css"/>
<script type="text/javascript" src="../template/slider/slick.min.js"></script>
<script type="text/javascript" src="../template/js/sliderIndex.js"></script>
<!--Добавление класса active для активного пункта меню-->
<script>
    $(document).ready(function() {
        $('.ulMenu-<?echo $idActiveMenu?>').addClass('active');
    });





</script>




</body>
</html>
