<?php


class AlbumsController
{


    public function actionIndex()
    {

        $idActiveMenu = 4;
        $serviceList = Service::getServiciesList();
        $serviceListItems = Service::getServiciesListItems();
        require_once(ROOT . '/views/service.php');
        return true;
    }


}

?>