<?php
/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 05.08.16
 * Time: 14:14
 */

class Master{
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
    public static function getNameMasterById($id)
    {
        $id=intval($id);
        $db=Db::getConnection();
        $result = $db->query("SELECT name FROM masters WHERE id=".$id);
        $row = $result->fetch(PDO::FETCH_LAZY);
        return $row->name;


        
    }
}
