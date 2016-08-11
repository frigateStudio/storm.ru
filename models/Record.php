<?php
/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 11.08.16
 * Time: 0:59
 */
class Record{
    public static function addRecord($id_master,$date_record,$id_time_record,$client_name
    ,$client_family,$client_phone,$client_comment){
        $db=Db::getConnection();
        $result = $db->query("INSERT INTO records (id_master,date_record, id_time_record,client_name, ".
            "client_family,client_phone, client_comment) VALUES ".
            "('$id_master', '$date_record', '$id_time_record', '$client_name',".
            " '$client_family', '$client_phone', '$client_comment')");
        
    }
}