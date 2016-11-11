<?php include_once ROOT . '/views/layouts/header.php'; ?>

<main>
    <a href="/stock/page-<?php echo $page; ?>" id="backToStock">Назад к акциям</a>
    <div class="oneStock">

        <img src="<?php echo $stockItem['urlImage']; ?>"/>
        <p><?php echo $stockItem['text']; ?></p>

    </div>


</main>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>


</body>
</html>
