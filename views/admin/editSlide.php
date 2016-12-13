<?php
include ROOT . '/views/layouts/adminHeader.php';
?>
</head>
<body>
<main>
    <a href="/editSlider" id="buttonBack" class="navButton">Назад</a>
    <div class="formEditSlide" id="formEditSlide">
        <h3>Редактирование слайда</h3>
        <form enctype="multipart/form-data" id="formEdit" method="POST" action="javascript:void(null);"
              onsubmit="call()">
            <p>
                <label for="head">Заголовок</label><br>
                <input type="text" id="head" name="head" value="<?php echo $slide['header']; ?>"><br>
                <span id="errorHead">Пожалуйста, заполните это поле</span>
            </p>
            <p>
                <label for="desc">Текст</label><br>
                <textarea type="text" id="desc" name="desc" ><?php echo $slide['content']; ?></textarea><br>
                <span id="errorDesc">Пожалуйста, заполните это поле</span>
            </p>

            <input type="text" id="id" name="id" value="<?php echo $slide['id']; ?>" hidden >


            <button id="buttonAdd">Изменить</button>
        </form>
        <a name="end"></a>

    </div>
    <div id="loader">
        <img src="../template/img/backgrounds/load.svg">
    </div>
    <script>
        $("#loader").hide();
        var inputHead = $("#head");
        var errorHead = $("#errorHead");
        var inputDesc = $("#desc");
        var errorDesc = $("#errorDesc");


        function checkEmpty(input) {
            return !(input.val() == "");
        }

        function call() {
            errorHead.hide();
            errorDesc.hide();

            var flErrorHead = false;
            var flErrorDesc = false;


            if (!checkEmpty(inputHead)) {
                flErrorHead = true;
                errorHead.show();
            }
            if (!checkEmpty(inputDesc)) {
                flErrorDesc = true;
                errorDesc.show();
            }


            if (!flErrorHead && !flErrorDesc) {
                // Вешаем функцию на событие

                $("#loader").show();
                var form = $('#formEdit');
                var msg = form.serialize();

                $.ajax({
                    type: 'POST',
                    url: '/saveSlide',
                    data: msg,
                    success: function (data) {
                        window.location.href = "/editSlider";

                    }
                })

            }
        }


    </script>
</main>
</body>