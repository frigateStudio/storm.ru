<?php include ROOT . '/views/layouts/header.php'; ?>


    <main>
        <div class="containerDoReview">
            <div class="reviewSlider">
                <img src="../template/img/buttons/prevArrow.svg" id="prevArrow">
                <div class="bestReviews">
                    <?php foreach($reviewBestList as $reviewBestItem): ?>
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
                <form>
                    <span>Имя</span>
                    <p>
                        <input type="text" id="name" title="name">
                    </p>
                    <span>email</span>
                    <p>
                        <input type="email" id="email" title="email">
                    </p>
                    <span>Ваш отзыв</span>
                    <p>
                        <textarea  id="review" title="review" ></textarea>
                    </p>
                    <p><button  id="button">Отправить</button></p>


                </form>
            </div>
        </div>

        <div class="reviews" id="anchorReview">
            <?php foreach($reviewList as $reviewItem): ?>
            <div class="review">
                <div class="review_header">
                    <span class="review_name"><?php echo $reviewItem['name']; ?></span>
                    <span class="review_date"><?php echo Review::modelTime($reviewItem['time'],false); ?></span>
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
        $(document).ready(function() {
            var slider= $('.bestReviews');
            slider.show();
            slider.slick({
                autoplay:true,
                autoplaySpeed:3000,
                arrows:true,
                pauseOnHover:true,
                prevArrow:"#prevArrow",
                nextArrow:"#nextArrow"
            });
            var container = $(".containerDoReview");
            var divSlider =   $(".reviewSlider");
            var form = $(".formReview");
            $('#doReview').click(function(){
                slider.hide();
                slider.slick('unslick');
                container.height(600);
                container.height(600);
                divSlider.hide(300);
                form.show(300);


            });
            $("#closeForm").click(function () {

                form.hide(300);
                divSlider.show(300);
                container.height(500);
                slider.show();
                slider.slick({
                    autoplay:true,
                    autoplaySpeed:3000,
                    arrows:true,
                    pauseOnHover:true,
                    prevArrow:"#prevArrow",
                    nextArrow:"#nextArrow"
                });



            })






        });
    </script>
    <!--end slider-->


<?php include ROOT . '/views/layouts/footer.php'; ?>

</body>
</html>
