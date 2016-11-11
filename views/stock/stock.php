<?php include_once ROOT . '/views/layouts/header.php'; ?>


<main class="wrapperStock">
    <div class="stock">
        <?php foreach($stockList as $stockListItem) : ?>
        <div class="cart_stock">
            <img src="<?php echo $stockListItem['urlImage']; ?>"/>
            <p><?php
                echo substr($stockListItem['text'],0,154);
                if(strlen($stockListItem['text']) > 154) echo "..."; ?></p>
                <?php if(strlen($stockListItem['text']) > 154)
                    echo "<div class='more'><a href='#'>Читать далее</a></div>"; ?>
        </div>
        <?php endforeach; ?>

<!--        <div class="cart_stock">-->
<!--            <img src="../template/img/backgrounds/backReview2.jpg"/>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque blanditiis consequatur corporis debitis-->
<!--                ducimus, error iste labore laboriosam molestiae...</p>-->
<!--            <div class="more"><a href="#">Читать далее</a></div>-->
<!--        </div>-->
<!--        <div class="cart_stock">-->
<!--            <img src="http://dummyimage.com/300x200/ff940f"/>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto, atque cupiditate delectus-->
<!--                eum eveniet facere illum labore modi... </p>-->
<!--            <div class="more"><a href="#">Читать далее</a></div>-->
<!--        </div>-->

    </div>
    <div class="pagination">
        <ul>
            <li><a href="#">1</a> </li>
            <li><a href="#">2</a> </li>
            <li class="active"><a href="#">3</a> </li>
            <li><a href="#">4</a> </li>
            <li><a href="#">5</a> </li>
            <li><a href="#">6</a> </li>
            <li><a href="#">→</a> </li>
        </ul>
    </div>

</main>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>


</body>
</html>