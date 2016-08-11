<?


class RecordController{


    //выводит таблицу занятости для мастера с id и датой timestamp
    public function actionViewTable($id,$timestamp)
    {
        $nameMaster=Master::getNameMasterById($id);
        $limit_day=21;
        //количиство строк в таблице записей по рабочим дням
        if(strftime("%u",$timestamp)==6 || strftime("%u",$timestamp)==7)
            $limit_day=16;                                  //количество строк в таблице записей по выходным дням
        require_once(ROOT . '/views/record.php');

        return true;
    }
    public function actionDoRecord()
    {
        if (isset($_POST['name']) &&
            isset($_POST['date'])&&
            isset($_POST['family'])&&
            isset($_POST['phone'])&&
            isset($_POST['comment'])&&
            isset($_POST['id_time'])&&
            isset($_POST['master'])
        ) {
            //$id_master,$date_record,$id_time_record,
           // $client_name,$client_family,$client_phone,
                                   //  $client_comment)

          Record::addRecord($_POST['master'],$_POST['date'],$_POST['id_time'],$_POST['name'],
              $_POST['family'],$_POST['phone'],$_POST['comment']);
            echo "норма";

        }
        return true;
    }


}
