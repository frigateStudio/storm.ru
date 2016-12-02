<?php
/**
 * Created by PhpStorm.
 * User: alexeivolodin
 * Date: 02.12.16
 * Time: 12:31
 */

class ContactsController
{

    //Action for  start-contact's page
    public function actionIndex()
    {
        $idActiveMenu = 6;
        
        require_once(ROOT . '/views/contacts.php');
        return true;
    }
    
    public function actionAddQuestion()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $question = $_POST['question'];
        Contacts::recordQuestion($name, $email, $question);
        
        echo "Спасибо за Ваш вопрос! <br> Вы получите ответ в ближайшее время на ваш email";
        return true;
    }

}