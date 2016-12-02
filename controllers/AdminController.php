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

        require_once(ROOT . '/views/admin/index.php');

        return true;
    }

    public function actionAuth()
    {
        // if (isset($_POST['login']) && isset($_POST['password']))

        if (Users::checkUsers("admvin", "root") == 1) {
            session_start();

            $_SESSION['auth'] = 1;
            header("Location:/admin");
        }
        else
            session_start();
        session_destroy();


        require_once(ROOT . '/views/admin/auth.php');
        return true;

    }


}