<?php
include ROOT . '/views/layouts/adminHeader.php';
?>
</head>
<body>
<main>


    <a href="/admin" id="buttonBack" class="navButton">Назад</a>
    <?php
    include ROOT . '/views/admin/navButton.php';
    ?>
    <a href="/" id="buttonOnPage" class="navButton">Посмотреть на сайте</a>
    <div class="controlSlider">
        <div class="headerMenu">Редактирование слайдера</div>


        <?php $i = 1;
        foreach ($slides as $slide):?>
            <div class="slide">
                <span><?php echo $i; ?></span>
                <h3><?php echo $slide['header']; ?></h3>
                <p><?php echo $slide['content']; ?></p>
                <img src="<?php echo $slide['url_image'] ?>"><br>

                <a  href="#" class="editButton">Изменить</a>
                <?php if (count($slides)>1):?>

                <a href="deleteSlide/<?php echo $slide['id']; ?>" class="editButton">Удалить</a>
                <?php endif;?>
            </div>

            <?php
            $i++;
        endforeach; ?>

    </div>
    <?php if (count($slides) < 10)
        echo '<a href="#" class="addSlide">Добавить слайд</a>';
    ?>


</main>
</body>
</html>
