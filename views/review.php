<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="containerDoReview">
        <div class="reviewSlider">
            <img src="../template/img/buttons/prevArrow.svg" id="prevArrow">
            <div class="bestReviews">
                <?php foreach ($reviewBestList as $reviewBestItem): ?>
                    <div class="bestReview">
                        <p class="reviewText">
                            <?php echo $reviewBestItem['text']; ?>
                        </p>
                        <p class="reviewDesc">
                            <?php echo $reviewBestItem['name']; ?><br>
                            <?php echo Review::modelTime($reviewBestItem['time'], true); ?>
                        </p>

                    </div>
                <?php endforeach; ?>
            </div>
            <img src="../template/img/buttons/nextArrow.svg" id="nextArrow">
            <a href="#" id="doReview">ОСТАВИТЬ ОТЗЫВ</a>
        </div>


        <div class="formReview">
            <img src="../template/img/buttons/close.svg" id="closeForm">
            <div id="thank"></div>
            <form method="POST" id="recordReview" action="javascript:void(null);" onsubmit="call()">
                <span>Имя</span>
                <p>
                    <input type="text" id="name"  name="name">
                    <span id="erName"></span>
                </p>
                <span>email</span>
                <p>
                    <input type="email" id="email" name="email" >
                </p>
                <span>Ваш отзыв</span>
                <p>
                    <textarea id="review"  name="review" class="required"></textarea>
                </p>

                <p>
                    <button id="button">Отправить</button>
                </p>


            </form>
        </div>
    </div>

    <div class="reviews" id="anchorReview">
        <?php foreach ($reviewList as $reviewItem): ?>
            <div class="review">
                <div class="review_header">
                    <span class="review_name"><?php echo $reviewItem['name']; ?></span>
                    <span class="review_date"><?php echo Review::modelTime($reviewItem['time'], false); ?></span>
                </div>
                <p class="review_content">
                    <?php echo $reviewItem['text']; ?>
                </p>
            </div>
        <?php endforeach; ?>

        <div class="pagination">
            <!-- Постраничная навигация -->
            <?php echo $pagination->get(); ?>
        </div>
    </div>

</main>

<!--slider-->

<link rel="stylesheet" type="text/css" href="../template/slider/slick.css"/>
<script type="text/javascript" src="../template/slider/slick.min.js"></script>
<script>
    $(document).ready(function () {

        //инициализация слайдера
        var slider = $('.bestReviews');
        slider.show();
        slider.slick({
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            pauseOnHover: true,
            prevArrow: "#prevArrow",
            nextArrow: "#nextArrow"
        });

        var container = $(".containerDoReview");
        var divSlider = $(".reviewSlider");
        var form = $(".formReview");
        //обработка кликов по конпке "оставить отзыв"
        $('#doReview').click(function () {
            slider.hide();
            slider.slick('unslick');
            $("#recordReview").show();
            container.height(600);
            container.height(600);
            divSlider.hide(300);
            form.show(300);
            $('#thank').empty();


        });
        //обработка кликов по кнопке "закрыть форму"
        $("#closeForm").click(function () {

            form.hide(300);
            divSlider.show(300);
            container.height(500);
            slider.show();
            slider.slick({
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                pauseOnHover: true,
                prevArrow: "#prevArrow",
                nextArrow: "#nextArrow"
            });


        });


    });
</script>
<script>
 



</script>

<script>

    //отправление формы ajax

    function call() {
        var form = $('#recordReview');
        var msg = form.serialize();

            $.ajax({
                type: 'POST',
                url: '/addReview',
                data: msg,
                success: function (data) {
                    $("#thank").text(data);
                    $("#recordReview").hide();
                    setTimeout(function () {
                        $("#closeForm").click();
                    }, 1000);
                    $("#name").val('');
                    $("#email").val('');
                    $("#review").val('');
                }
            });


    }

</script>


<?php include ROOT . '/views/layouts/footer.php'; ?>

</body>
</html>
