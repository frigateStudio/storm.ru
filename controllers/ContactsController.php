<?php
/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 02.12.16
 * Time: 12:31
 */

class ContactsController
{

    //Action for  start-contact's page
    public function actionIndex()
    {
        $idActiveMenu = 6;
        
        require_once(ROOT . '/views/contacts.php');
        return true;
    }

}