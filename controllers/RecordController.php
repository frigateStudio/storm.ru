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
        $busy=Master::getBusyTimeMasterByIdByDate($id,$timestamp);
        require_once(ROOT . '/views/record.php');

        return true;
    }
    //заносит данные в бд из масива POST
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
            Record::addRecord($_POST['master'],strftime("%Y-%m-%d",$_POST['date']),
            $_POST['id_time'],$_POST['name'],$_POST['family'],$_POST['phone'],$_POST['comment']);
        }
        return true;
    }
    


}
