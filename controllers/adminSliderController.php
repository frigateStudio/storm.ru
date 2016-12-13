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

        unlink(Slider::deleteSlideById($id));
        header("Location:/editSlider");
        return true;

    }

    public function actionAddSlide()
    {
        session_start();
        if (!isset($_SESSION['auth']))
            header("Location:/auth");
        if (isset($_POST['head']) &&
            isset($_POST['desc']) &&
            isset($_FILES['imgSlide'])
        ) {
            $id=Slider::addSlide($_POST['head'],$_POST['desc']);

            $info = new SplFileInfo($_FILES['imgSlide']['name']);
            $exp=$info->getExtension();
            $uploadFile = "media/slider/".$id.".".$exp;
            move_uploaded_file($_FILES['imgSlide']['tmp_name'], $uploadFile);
            Slider::addImageToSlide($id,$uploadFile);
        }
           
        return true;

    }
    public function actionEditSlide($id)
    {
        session_start();
        if (!isset($_SESSION['auth']))
            header("Location:/auth");
        $title = "Редактирование слайда";
        $slide =Slider::getInfoSlide($id);
        require_once(ROOT . '/views/admin/editSlide.php');
        return true;
    }


    public function actionSaveSlide(){
        session_start();
        if (!isset($_SESSION['auth']))
            header("Location:/auth");

        if (isset($_POST['head']) &&
            isset($_POST['desc']) &&
            isset($_POST['id'])
        ) {
            Slider::saveSlide($_POST['id'],$_POST['head'],$_POST['desc']);
      }
        return true;
    }
}