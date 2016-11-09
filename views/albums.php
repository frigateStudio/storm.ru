<?php
/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 09.11.16
 * Time: 21:01
 */

include ROOT . '/views/layouts/header.php';
?>
<main>

    <div class="albums">
        <div id="service-carts-container">
            <?php foreach ($albums as $album): ?>

                <div class="service-cart">
                    <a href="album/<?php echo $album['id']?>">
                        <p><?php echo mb_strtoupper($album['name'])?></p>
                        <img src="<?php echo $album['coverUrl'] ?>"/>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</main>

<?php
include ROOT . '/views/layouts/footer.php';
?>

