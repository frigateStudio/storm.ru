<?php
include ROOT . '/views/layouts/adminHeader.php';
?>
</head>
<body>
<main>

    <div id="signIn">

        <form method="post" action="/auth">
            <div><a href="/" id="backToSite">Вернуться на сайт</a></div>
            <h3>Вход в панель администратора</h3>
            <div id="errorSign"><?php echo $error; ?></div>
            <label for="login">Логин</label><br> <input type="text" id="login" name="login"><br>
            <label for="password">Пароль</label> <br><input type="password" id="password" name="password"><br>
            <button id="button">Войти</button>
        </form>
    </div>

</main>
</body>
</html>