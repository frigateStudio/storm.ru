<?php
/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 04.07.16
 * Time: 13:27
 */





class SiteController{



    public function actionIndex()
    {
        $masters=Master::getMasterList();        
        require_once(ROOT . '/views/index.php');
        return true;
    }
        
    
}

