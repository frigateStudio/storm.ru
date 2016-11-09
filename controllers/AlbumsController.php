<?php


class AlbumsController
{


    public function actionIndex()
    {

        $idActiveMenu = 4;
        $albums = Service::getAlbumsList();
        require_once(ROOT . '/views/albums.php');
        return true;
    }


}

?>