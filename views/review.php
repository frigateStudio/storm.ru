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

    var errorMessages = ["",
        "Пожалуйста, заполните это поле",
        "Пожалуйста, введите корректный email адрес",
        "Количество слов должно быть не более 3х",
        "Ошибка ввода! Допускаются только русские символы"];

    var codeErrorName = 0;
    var codeErrorEmail = 0;
    var errorEmptyName = false;
    var errorEmptyEmail = false;
    var errorEmptyReview = false;
    var errorName = $('#nameError');
    var inputName = document.getElementById('name');
    var inputReview = document.getElementById('review');
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

        //обработка изменений review после tab
        $("#review").change(function () {
            checkEmptyInput("review");
        });


        //обработка изменений поля email после выхода из фокуса
        inputEmail.focusout(function () {
            checkValidEmail();
        });

        //Проверка на пустоту поля review и выдача сообщения
        inputReview.oninput = function () {
            var input = $("#reviewError");
            input.text(errorMessages[0]);
            if (inputReview.value == "")
                input.text(errorMessages[1]);
        }
    });


    //проверка на пустоту всех полей формы и наличия остальных ошибок
    function checkForm() {
        checkEmptyInput("name");
        checkEmptyInput("email");
        checkEmptyInput("review");

        if (errorEmptyReview)
            $("#review").focus();
        if (errorEmptyEmail)
            inputEmail.focus();
        if (errorEmptyName)
            $("#name").focus();


        if (!errorEmptyEmail) {
            if (!checkValidEmail())
                $("#email").focus();
        }
        if (!errorEmptyName) {
            if (codeErrorName != 0) {
                checkValidateName();
                $("#name").focus();
            }
        }
        return (!errorEmptyName && codeErrorName == 0 && !errorEmptyEmail && !errorEmptyReview && codeErrorEmail == 0);
    }

    //проверка на пустоту поля с именем nameInput
    //и выдача сообщения об ошибке в span #nameInputError
    function checkEmptyInput(nameInput) {
        switch (nameInput) {
            case "name":
                errorEmptyName = false;
                break;
            case "email":
                errorEmptyEmail = false;
                break;
            case "review":
                errorEmptyReview = false;
                break;
            default:
                break;
        }
        var message = $("#" + nameInput + "Error");
        var input = $("#" + nameInput);
        message.text("");
        if (input.val() == "") {
            message.text(errorMessages[1]);
            if (nameInput == "name")
                errorEmptyName = true;
            if (nameInput == "email")
                errorEmptyEmail = true;
            if (nameInput == "review")
                errorEmptyReview = true;
            return false;
        }
        else {
            return true;
        }
    }
    //проверка email на валидность и выдача сообщения об ошибке
    function checkValidEmail() {
        codeErrorEmail = 0;
        errorEmail.text(errorMessages[0]);
        if (!validator.isEmail($("#email").val())) {
            $("#emailError").text(errorMessages[2]);
            codeErrorEmail = 1;
            return false;
        }
        return true;
    }

    //проверка на валидность имени
    function checkValidateName() {
        $("#name").focus();
        errorName.text(errorMessages[0]);
        codeErrorName = 0;
        if (inputName.value == "") {
            errorName.text(errorMessages[1]);
            codeErrorName = 3;// поле не заполнено
            return;
        }
        var arrName = inputName.value.split(" ");
        if (arrName.length > 3) {
            errorName.text(errorMessages[3]);
            codeErrorName = 1;//Больше 3х слов
            return;
        }

        for (var i = 0; i < arrName.length; i++) {
            if (arrName[i] == "")
                break;
            if (!validator.isAlpha(arrName[i], 'ru-RU')) {
                errorName.text(errorMessages[4]);
                codeErrorName = 2;//Неверный язык
                break;

            }
            else
                codeErrorName = 0;
        }
        if (inputName.value == "") {
            errorName.text(errorMessages[0]);
            errorEmptyName = true;

        }

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
                    }, 1500);
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
