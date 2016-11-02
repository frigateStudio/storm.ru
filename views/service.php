<?
include ROOT . '/views/layouts/header.php';
?>


<main>


    <div class="containerServices">
    <?php foreach ($serviceList as $serviceListItem) : ?>
        <div class="service">
        <div class="headerService">
            <?php echo $serviceListItem['name']; ?>
        </div>
                <ul>
                    <?php foreach ($serviceListItems as $serviceItem):?>
                    <?php if($serviceItem['id_services'] == $serviceListItem['id_services'])
                            echo '<li>' . $serviceItem['name'] . " - " . $serviceItem['price'] .
                                ' р. </li>'; ?>
                    <?php endforeach; ?>
                </ul>
    </div>
    <?php endforeach; ?>





    </div>
</main>


<?php
include ROOT . '/views/layouts/footer.php';
?>



</body>
</html>