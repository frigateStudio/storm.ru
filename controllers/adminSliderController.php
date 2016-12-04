<?php

/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 04.12.16
 * Time: 13:59
 */
class AdminSliderController
{
    public function actionIndex()
    {

        session_start();
        if (!isset($_SESSION['auth']))
            header("Location:/auth");
        $title = "Управление слайдером";
        $slides = array_reverse(Slider::getResourcesSlider());

        require_once(ROOT . '/views/admin/sliderIndex.php');
        return true;
    }

    public function actionDeleteSlide($id)
    {
        session_start();
        if (!isset($_SESSION['auth']))
            header("Location:/auth");
        
        Slider::deleteSlideById($id);
        header("Location:/editSlider");
        return true;


    }
}