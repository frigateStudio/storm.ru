<?php

/**
 * Created by PhpStorm.
 * User: Fandu
 * Date: 11.11.2016
 * Time: 13:38
 */
class Stock
{
    public static function getStockList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id, text, urlImage FROM orchid.stock');

        $i = 0;
        $stockList = array();
        while ($row = $result->fetch())
        {
            $stockList[$i]['id'] = $row['id'];
            $stockList[$i]['text'] = $row['text'];
            $stockList[$i]['urlImage'] = $row['urlImage'];
            $i++;
        }

        return $stockList;
    }


    public static function getStockItemById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT id, text, urlImage FROM orchid.stock WHERE stock.id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
}