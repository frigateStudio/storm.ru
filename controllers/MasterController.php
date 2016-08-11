<?php
/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 04.08.16
 * Time: 22:40
 */
class MasterController{

    public function actionInfo($p1=1)
    {

        if (isset($_POST['name']))
             echo $_POST['name'];



       

        return true;
    }
}