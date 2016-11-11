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
                    echo "<div class='more'><a href='/stock/" . $stockListItem['id'] . "'>Читать далее</a></div>"; ?>
        </div>
        <?php endforeach; ?>


    </div>
    <div class="pagination">
        <!-- Постраничная навигация -->
        <?php echo $pagination->get(); ?>
    </div>

</main>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>


</body>
</html>