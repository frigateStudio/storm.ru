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
        //����� ��������� ������ ����
        //0 - ��� ��������� ������ ����
        $idActiveMenu = 2;
        $serviceList = Service::getServiciesList();

        $serviceListItems = Service::getServiciesListItems();
        //print_r($serviceListItems);
        require_once(ROOT . '/views/service.php');
        return true;
    }

}