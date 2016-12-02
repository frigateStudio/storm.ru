<?php
include ROOT . '/views/layouts/header.php';
?>

<main>
    <div class="containerContacts">
        <div class="contacts">

            <address>г. Лысково, ул. Мичурина д.56</address>
            <p class="phone">
                <a href="tel:+7 (912) 052 44 07">+7 (912) 052 44 07</a><br>
                <a href="tel:+7 (912) 052 44 07">+7 (912) 052 44 07</a>
            </p>
            <div class="workTime">
                Режим работы
                <p>
                    ПН-ПТ: 8:00-20:00<br>
                    СБ-ВС: 8:00-18:00
                </p>
            </div>
            <div id="buttonQuestion">Задать вопрос</div>
            <div class="feedback">
                <form method="POST" id="recordQuestion" action="javascript:void(null);" onsubmit="call()">
                    <span>Имя</span>
                    <p>
                        <input type="text" id="name" name="name">
                    <div class="contactsFormError" id="errorname"></div>
                    </p>
                    <span>email</span>
                    <p>
                        <input type="email" id="email" name="email">
                    <div class="contactsFormError" id="erroremail"></div>
                    </p>
                    <span>Ваш вопрос</span>
                    <p>
                        <textarea id="question" name="question"></textarea>
                    <div class="contactsFormError" id="errorquestion"></div>
                    </p>
                    <p>
                        <button id="button">Отправить</button>
                    </p>
                    <div id="thank"></div>


                </form>
            </div>
        </div>


    </div>
    <script type="text/javascript" charset="utf-8" async
            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Asd5OyIh6qK2ZuzM8Uo6ZiXauGhX-RUd&amp;width=100%&amp;height=500&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>


</main>
<script type="text/javascript" src="../template/js/validator.min.js"></script>
<script>
    var recordQuestion = $("#recordQuestion");
    var containerContacts = $(".containerContacts");
    var buttonQuestion = $('#buttonQuestion');
    var thank = $("#thank");

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
    var errorName = $('#errorname');
    var inputName = document.getElementById('name');
    var inputReview = document.getElementById('question');
    var inputEmail = $("#email");
    var errorEmail = $("#erroremail");


    $(document).ready(function () {
        buttonQuestion.click(function () {
            thank.empty();
            recordQuestion.show(300);
            containerContacts.height(660);
            buttonQuestion.hide(300);
        });
        //------ВАЛИДАЦИЯ-------


        //обработка измения значения поля Имя
        inputName.oninput = function () {
            checkValidateName();
        };

        //обработка изменений review после tab
        $("#question").change(function () {
            checkEmptyInput("review");
        });


        //обработка изменений поля email после выхода из фокуса
        inputEmail.focusout(function () {
            checkValidEmail();
        });

        //Проверка на пустоту поля review и выдача сообщения
        inputReview.oninput = function () {
            var input = $("#errorquestion");
            input.text(errorMessages[0]);
            if (inputReview.value == "")
                input.text(errorMessages[1]);
        }
    });

    //проверка на пустоту всех полей формы и наличия остальных ошибок
    function checkForm() {
        checkEmptyInput("name");
        checkEmptyInput("email");
        checkEmptyInput("question");

        if (errorEmptyReview)
            $("#question").focus();
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
            case "question":
                errorEmptyReview = false;
                break;
            default:
                break;
        }
        var message = $("#" + "error" + nameInput);
        var input = $("#" + nameInput);
        message.text("");
        if (input.val() == "") {
            message.text(errorMessages[1]);
            if (nameInput == "name")
                errorEmptyName = true;
            if (nameInput == "email")
                errorEmptyEmail = true;
            if (nameInput == "question")
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
            $("#erroremail").text(errorMessages[2]);
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


    function call() {

        var form = $('#recordQuestion');
        var msg = form.serialize();


        if (checkForm()) {

            $.ajax({
                type: 'POST',
                url: '/addQuestion',
                data: msg,
                success: function (data) {

                    thank.html(data);
                    setTimeout(function () {
                        recordQuestion.hide(300);
                        buttonQuestion.show(300);
                        containerContacts.height(450);
                    }, 3000);
                    setTimeout(function () {
                        $("#name").val('');
                        $("#email").val('');
                        $("#question").val('');
                    }, 3500);

                }


            })
        }
    }

</script>

<?php
include ROOT . '/views/layouts/footer.php';
?>


</body>
</html>


