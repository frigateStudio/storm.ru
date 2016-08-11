<?php
/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 05.08.16
 * Time: 14:14
 */

class Master{
    //Возвращает массив с данными мастеров из бд
    public static function getMasterList()
    {
        $mastersList=array();
        $db=Db::getConnection();
        $result = $db->query("SELECT id, name, description,holiday FROM masters");
        $i=0;
        while($row = $result->fetch()){
            $mastersList[$i]['id'] = $row['id'];
            $mastersList[$i]['name'] = $row['name'];
            $mastersList[$i]['description'] = $row['description'];
            $mastersList[$i]['holiday'] = $row['holiday'];
            $i++;
        }
        return $mastersList;
    }
    //возвращает имя мастера по id
    public static function getNameMasterById($id)
    {
        $id=intval($id);
        $db=Db::getConnection();
        $result = $db->query("SELECT name FROM masters WHERE id=".$id);
        $row = $result->fetch(PDO::FETCH_LAZY);
        return $row->name;        
    }
    //возвращает массив с занятыми id часов по id мастера и дате
    public static function getBusyTimeMasterByIdByDate($id, $timestamp)
    {
        $db=Db::getConnection();
        $result = $db->query("select id_time_record from records WHERE date_record='".
            strftime("%Y-%m-%d",$timestamp)."' AND id_master=$id;");
        $i=0;
        $busy=Array();
        while($row = $result->fetch()){
            $busy[$i]=$row['id_time_record'];
            $i++;
        }
        return $busy;
    }
}
