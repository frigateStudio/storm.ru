<?php
include ROOT . '/views/layouts/adminHeader.php';
?>
</head>
<body>
<main>

    <div id="signIn">

        <form>
            <h3>Вход в панель администратора</h3>
            <div id="errorSign">Неверный логин или пароль</div>
            <label for="login">Логин</label><br> <input type="text" id="login" name="login"><br>
            <label for="password">Пароль</label> <br><input type="password" id="password" name="password"><br>
            <button id="button">Войти</button>
        </form>
    </div>

</main>
</body>
</html>