<?
include ROOT . '/views/layouts/header.php';
?>


<main>
    <div class="containerServices">
    <div class="service">
<!--    <div class="headerService">-->
<!--Стрижки-->
<!--    </div>-->
<!--    <ul>-->
<!---->
<!--        <li>Услуга - 500₽</li>-->
<!--        <li>Услуга - 500₽</li>-->
<!--        <li>Услуга - 500₽</li>-->
<!--        <li>Услуга - 500₽</li>-->
<!--        <li>Услуга - 500₽</li>-->
<!---->
<!---->
<!--    </ul>-->

    <?php foreach ($serviceList as $serviceListItem) : ?>
        <div class="headerService">
            <?php echo $serviceListItem['name']; ?>
        </div>
                <ul>
                    <?php foreach ($serviceListItems as $serviceItem): ?>
                    <li><?php echo $serviceItem['name'] . " - " . $serviceItem['price']; ?></li>
                </ul>

    <?php endforeach; ?>




    </div>
    </div>
</main>


<?php
include ROOT . '/views/layouts/footer.php';
?>



</body>
</html>