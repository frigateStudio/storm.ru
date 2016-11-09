<?php

/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 09.11.16
 * Time: 21:00
 */
class AlbumsController
{


    public function actionIndex()
    {
        $idActiveMenu = 4;
        $albums=Albums::getAlbumsList();
        require_once(ROOT . '/views/albums.php');
        return true;
    }


}