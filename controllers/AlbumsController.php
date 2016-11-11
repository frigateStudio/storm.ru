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

    public function actionAlbum($idAlbum)
    {
        $idActiveMenu = 4;
        $photos = Albums::getPhotoByAlbum($idAlbum);
        $nameAlbum = Albums::getNameAlbum($idAlbum);
       require_once(ROOT . '/views/album.php');
        return true;
    }

}

?>