<?php
include ROOT . '/views/layouts/header.php';
?>
<main>
<div id="albumName"><?php echo $nameAlbum; ?></div>
    <div class="album">
        <?php foreach ($photos as $photo): ?>

            <div>
                <img src="<?php echo $photo['url']; ?>"/>
            </div>
        <?php endforeach; ?>
    </div>

    <img src="../template/img/buttons/prevArrowOrange.svg" id="prevArrowNav">

    <div class="albumNav">
        <?php foreach ($photos as $photo): ?>

            <div>
                <img src="<?php echo $photo['url']; ?>"/>
            </div>
        <?php endforeach; ?>
    </div>

    <img src="../template/img/buttons/nextArrowOrange.svg" id="nextArrowNav">
    <a href="/albums" class="backToAlbums">Назад к альбомам</a>
</main>
<?php
include ROOT . '/views/layouts/footer.php';
?>

<!-- Слайдер -->
<link rel="stylesheet" type="text/css" href="../template/slider/slick.css"/>
<script type="text/javascript" src="../template/slider/slick.min.js"></script>
<script>
    $(document).ready(function() {

        $('.album').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.albumNav'
        });
        $('.albumNav').slick({
            asNavFor: '.album',
            centerMode: true,
            centerPadding: '70px',
            slidesToShow: 5,
            slidesToScroll: 5,
            focusOnSelect: true,
            variableWidth: true,
            prevArrow:"#prevArrowNav",
            nextArrow:"#nextArrowNav"


        });



    });
</script>



</body>
</html>

