<?php
/**
 * Created by PhpStorm.
 * User: Fandu
 * Date: 01.11.2016
 * Time: 21:39
 */

class ServiceController
{

    //Action for  start-service's page
    public function actionIndex()
    {
        //Список категорий
        $serviceList = Service::getServiciesList();

        $serviceListItems = Service::getServiciesListItems($serviceList['id_services']);

        require_once(ROOT . '/views/index.php');
        return true;
    }

}