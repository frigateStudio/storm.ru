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
    public function actionIndex($page = 1)
    {
        $idActiveMenu = 3;
        $stockList = Stock::getStockList($page);

        $total = Stock::getTotalStocks();
        $pagination = new Pagination($total, $page, Stock::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/stock/stock.php');
        return true;
    }

    public function actionView($id)
    {
        $idActiveMenu = 3;
        $stockItem = Stock::getStockItemById($id);

        $page = Stock::getPageNumber($id);

        require_once(ROOT . '/views/stock/stockItem.php');
        return true;
    }
}