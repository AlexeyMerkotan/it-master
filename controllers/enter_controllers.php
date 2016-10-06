<?php
class enter_Controllers extends \core\Controller{
    public function __construct(){
        $this->view=new \core\View();
    }
    public function  enter_method(){
        $model=new enter_Model();
        $error="";

        if(isset($_POST['email']) && isset($_POST['pass'])){
            $password=md5($_POST['pass']);
            if($model->get_user($_POST['email'],$password))
            {
                $_SESSION['flag']=true;
                $_SESSION['user']=$_POST['email'];
                $_SESSION['pass']=$_POST['pass'];
                header("Location: ?");
            }
            else{
                $select=$model->insert_user($_POST['email'],$password);
                if($select){
                    $_SESSION['flag']=true;
                    $_SESSION['user']=$_POST['email'];
                    $_SESSION['pass']=$_POST['pass'];
                    header("Location: ?");
                }
                else
                    $error=$error."Во время регистрации произошла непредвиденная ошибка";
            }

        }else
            $error=$error."Поле электронный адрес или пароль пуста";
        $this->view->demonstration('error.php',$error);
    }
}
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 05.10.16
 * Time: 17:18
 */ 