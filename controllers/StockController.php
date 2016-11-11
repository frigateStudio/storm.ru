<?php
/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 08.11.16
 * Time: 15:31
 */
class StockController
{

    //Action for  start-service's page
    public function actionIndex()
    {
        $idActiveMenu = 3;
        $stockList = Stock::getStockList();

        require_once(ROOT . '/views/stock/stock.php');
        return true;
    }

}