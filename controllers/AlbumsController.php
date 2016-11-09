<?php


class AlbumsController
{


    public function actionIndex()
    {

        $idActiveMenu = 4;
        $albums = Albums::getAlbumsList();
        require_once(ROOT . '/views/albums.php');
        return true;
    }


}

?>