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
        $result = $db->query("SELECT id, name, description FROM masters");
        $i=0;
        while($row = $result->fetch()){
            $mastersList[$i]['id'] = $row['id'];
            $mastersList[$i]['name'] = $row['name'];
            $mastersList[$i]['description'] = $row['description'];
            $i++;
        }
        return $mastersList;
    }
}