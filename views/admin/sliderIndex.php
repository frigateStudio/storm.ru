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

                <a href="#" class="editButton">Изменить</a>
                <?php if (count($slides) > 1): ?>

                    <a href="deleteSlide/<?php echo $slide['id']; ?>" class="editButton">Удалить</a>
                <?php endif; ?>
            </div>

            <?php
            $i++;
        endforeach; ?>

    </div>
    <?php if (count($slides) < 10)
        echo '<a href="#formAddSlide" class="addSlide">Добавить слайд</a>';
    ?>


    <div class="formAddSlide" id="formAddSlide">
        <form enctype="multipart/form-data" id="formAdd" method="POST" action="javascript:void(null);"
              onsubmit="call()">
            <p>
                <label for="head">Заголовок</label><br>
                <input type="text" id="head" name="head"><br>
                <span id="errorHead">Пожалуйста, заполните это поле</span>
            </p>
            <p>
                <label for="desc">Текст</label><br>
                <textarea type="text" id="desc" name="desc"></textarea><br>
                <span id="errorDesc">Пожалуйста, заполните это поле</span>
            </p>
            <p>
                <input type="hidden" name="MAX_FILE_SIZE" value="21000000"/>
                <label for="imgSlide">Изображение (Рекомендуется разрешение 1200Х400)</label><br>
                <input name="imgSlide" id="file" type="file" accept="image/*"><br>
                <span id="errorFile">Пожалуйста, выберите файл</span>
            </p>
            <button id="buttonAdd">Добавить</button>
        </form>
        <a name="end"></a>

    </div>
    <div id="loader">
        Загрузка...
    </div>


</main>
<script>
    $("#loader").hide();
    var inputHead = $("#head");
    var errorHead = $("#errorHead");
    var inputDesc = $("#desc");
    var errorDesc = $("#errorDesc");
    var inputFile = $("#file");
    var errorFile = $("#errorFile");
    var files = 0;

    $(document).ready(function () {
        
        $(".addSlide").click(function () {
            $("#formAddSlide").show();
            $(".addSlide").hide();
        });

        $('input[type=file]').change(function () {
            files = this.files;
        });
    });
    function checkEmpty(input) {
        return !(input.val() == "");
    }
    function call() {
        errorHead.hide();
        errorDesc.hide();
        errorFile.hide();
        var flErrorHead = false;
        var flErrorDesc = false;
        var flErrorFile = false;


        if (!checkEmpty(inputHead)) {
            flErrorHead = true;
            errorHead.show();
        }
        if (!checkEmpty(inputDesc)) {
            flErrorDesc = true;
            errorDesc.show();
        }
        if (!checkEmpty(inputFile)) {
            flErrorFile = true;
            errorFile.show();
        }

        if (!flErrorHead && !flErrorDesc && !flErrorFile) {


// Вешаем функцию на событие
// Получим данные файлов и добавим их в переменную

            $("#loader").show();
            var formData = new FormData($('form')[0]);

            $.ajax({
                type: "POST",
                processData: false,
                contentType: false,
                url: "/addSlide",
                data: formData
            })
                .done(function (data) {

                    window.location.href = "/editSlider";
                });
        }
    }


</script>

</body>
</html>
