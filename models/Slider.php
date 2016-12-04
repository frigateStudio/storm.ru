<?php
/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 01.11.16
 * Time: 16:02
 */

class Slider
{
    //Возвращает массив с данными мастеров из бд
    public static function getResourcesSlider()
    {
        $sliderList = array();
        $db = Db::getConnection();
        $result = $db->query("SELECT id,header, content ,url_image FROM indexSlider");
        $i = 0;
        while ($row = $result->fetch()) {
            $sliderList[$i]['id'] = $row['id'];
            $sliderList[$i]['header'] = $row['header'];
            $sliderList[$i]['content'] = $row['content'];
            $sliderList[$i]['url_image'] = $row['url_image'];
            $i++;
        }
        return array_reverse($sliderList);
    }
    public static function deleteSlideById($id){
        $db = Db::getConnection();
        $sql = "DELETE FROM indexSlider WHERE id=?";
        $result = $db->prepare($sql);
      return $result->execute(array($id));
          
    }
}