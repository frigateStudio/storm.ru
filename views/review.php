<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="containerDoReview">
        <div class="reviewSlider">
            <img src="../template/img/buttons/prevArrow.svg" id="prevArrow">
            <div class="bestReviews">
                <?php foreach ($reviewBestList as $reviewBestItem): ?>
                    <div class="bestReview">
                        <p class="reviewText">
                            <?php echo $reviewBestItem['text']; ?>
                        </p>
                        <p class="reviewDesc">
                            <?php echo $reviewBestItem['name']; ?><br>
                            <?php echo Review::modelTime($reviewBestItem['time'], true); ?>
                        </p>

                    </div>
                <?php endforeach; ?>
            </div>
            <img src="../template/img/buttons/nextArrow.svg" id="nextArrow">
            <a href="#" id="doReview">ОСТАВИТЬ ОТЗЫВ</a>
        </div>


        <div class="formReview">
            <img src="../template/img/buttons/close.svg" id="closeForm">
            <div id="thank"></div>
            <form method="POST" id="recordReview" action="javascript:void(null);" onsubmit="call()">
                <span>Имя</span>
                <p>
                    <input type="text" id="name" name="name">
                    <span id="nameError"></span>
                </p>
                <span>email</span>
                <p>
                    <input type="email" id="email" name="email">
                    <span id="emailError"></span>
                </p>
                <span>Ваш отзыв</span>
                <p>
                    <textarea id="review" name="review"></textarea>
                    <span id="reviewError"></span>
                </p>

                <p>
                    <button id="button">Отправить</button>
                </p>


            </form>
        </div>
    </div>

    <div class="reviews" id="anchorReview">
        <?php foreach ($reviewList as $reviewItem): ?>
            <div class="review">
                <div class="review_header">
                    <span class="review_name"><?php echo $reviewItem['name']; ?></span>
                    <span class="review_date"><?php echo Review::modelTime($reviewItem['time'], false); ?></span>
                </div>
                <p class="review_content">
                    <?php echo $reviewItem['text']; ?>
                </p>
            </div>
        <?php endforeach; ?>

        <div class="pagination">
            <!-- Постраничная навигация -->
            <?php echo $pagination->get(); ?>
        </div>
    </div>

</main>

<!--slider-->

<link rel="stylesheet" type="text/css" href="../template/slider/slick.css"/>
<script type="text/javascript" src="../template/slider/slick.min.js"></script>
<script type="text/javascript" src="../template/js/validator.min.js"></script>
<script>
    var flErrorName = false; //общие ошибки
    var flErrorEmail = false;
    var errorName = $('#nameError');
    var inputName = document.getElementById('name');
    var inputEmail = $("#email");
    var errorEmail = $("#emailError");

    $(document).ready(function () {


        var slider = $('.bestReviews');
        var container = $(".containerDoReview");
        var divSlider = $(".reviewSlider");
        var form = $(".formReview");
        //инициализация слайдера
        slider.show();
        slider.slick({
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            pauseOnHover: true,
            prevArrow: "#prevArrow",
            nextArrow: "#nextArrow"
        });


        //обработка кликов по конпке "оставить отзыв"
        $('#doReview').click(function () {
            slider.hide();
            slider.slick('unslick');
            $("#recordReview").show();
            container.height(600);
            container.height(600);
            divSlider.hide(300);
            form.show(300);
            $('#thank').empty();
        });

        //обработка кликов по кнопке "закрыть форму"
        $("#closeForm").click(function () {
            form.hide(300);
            divSlider.show(300);
            container.height(500);
            slider.show();
            slider.slick({
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                pauseOnHover: true,
                prevArrow: "#prevArrow",
                nextArrow: "#nextArrow"
            })
        });
        //------ВАЛИДАЦИЯ-------


        //обработка измения значения поля Имя
        inputName.oninput = function () {
         checkValidateName();

        };
        //обработка изменений поля email после выхода из фокуса
        inputEmail.change(function () {
            flErrorEmail=false;
            errorEmail.text("");
            if (!validator.isEmail(inputEmail.val())) {
                errorEmail.text("Введите корректный email адрес");
                flErrorEmail = true;
            }
            else
                flErrorEmail = false;

        });


    });


    //проверка на пустоту всех полей формы и наличия остальных ошибок
    function checkForm() {

        checkEmptyInput("name");
        checkEmptyInput("email");
        checkEmptyInput("review");

        return checkEmptyInput("name") && checkEmptyInput("email") && checkEmptyInput("review")
            && checkValidEmail() && checkValidateName() && !flErrorEmail && !flErrorName;

    }

    //проверка на пустоту поля с именем nameInput
    //и выдача сообщения об ошибке в span #nameInputError
    function checkEmptyInput(nameInput) {
        var message = $("#" + nameInput + "Error");
        var input = $("#" + nameInput);
        message.text("");
        if (input.val() == "") {
            message.text("Пожауйста, заполните это поле");
            input.focus();
            return false;
        }
        else return true;
    }
    function checkValidEmail() {
        if (!validator.isEmail($("#email").val())) {
            $("#emailError").text("Введите корректный email адрес");

            return false;

        }
        flErrorEmail=false;
        return true;
    }
    function checkValidateName() {
        errorName.text("");
        flErrorName = false;
        var arrName = inputName.value.split(" ");
        if (arrName.length > 3) {
            errorName.text("Коилчество слов должно быть не более 3х");
            flErrorName=true;
            return;
        }

        for (var i = 0; i < arrName.length; i++) {
            if (arrName[i] == "")
                break;
            else if (!validator.isAlpha(arrName[i], 'ru-RU')) {
                errorName.text("Ошибка ввода! Допускаются только русские символы");
                flErrorName = true;
                break;
            }
            else
                flErrorName = false;
        }
        if (inputName.value == "") {
            errorName.text("");
            flErrorName = true;
        }
        return true;
    }
    //------конец валидации------
    //------отправление формы ajax-------
    function call() {

        var form = $('#recordReview');
        var msg = form.serialize();
        if (checkForm()) {
            $.ajax({
                type: 'POST',
                url: '/addReview',
                data: msg,
                success: function (data) {
                    $("#thank").text(data);
                    $("#recordReview").hide();
                    setTimeout(function () {
                        $("#closeForm").click();
                    }, 1000);
                    $("#name").val('');
                    $("#email").val('');
                    $("#review").val('');
                }
            });


        }
    }

</script>


<?php include ROOT . '/views/layouts/footer.php'; ?>

</body>
</html>
