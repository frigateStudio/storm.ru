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
        $result = $db->query("SELECT header, content ,url_image FROM indexSlider");
        $i = 0;
        while ($row = $result->fetch()) {
            $sliderList[$i]['header'] = $row['header'];
            $sliderList[$i]['content'] = $row['content'];
            $sliderList[$i]['url_image'] = $row['url_image'];
            $i++;
        }
        return $sliderList;
    }
}