<?php

/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 02.12.16
 * Time: 21:00
 */
class AdminController
{
    public function actionIndex()
    {
        session_start();
        if (!isset($_SESSION['auth']))
            header("Location:/auth");
        $title = "Панель администратора";
        require_once(ROOT . '/views/admin/index.php');

        return true;
    }

    public function actionAuth()
    {
        $error="";
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if (Users::checkUsers($login, $password) == 1) {
                session_start();
                $_SESSION['auth'] = 1;
                header("Location:/admin");
            }
            else $error="Неверный логин или пароль";
        }
        $title = "Форма входа";
        require_once(ROOT . '/views/admin/auth.php');
        return true;

    }
    public function actionExit(){
        $error="";
        session_start();
        session_destroy();
        $title = "Форма входа";
        require_once(ROOT . '/views/admin/auth.php');
        return true;
    }


}