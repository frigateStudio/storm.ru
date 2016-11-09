<?php

/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 09.11.16
 * Time: 21:00
 */
class AlbumController
{


    public function actionIndex()
    {
        $idActiveMenu = 4;
        $albums=Album::getAlbumsList();
        require_once(ROOT . '/views/albums.php');
        return true;
    }



}
