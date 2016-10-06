<?php
class sent_Controllers extends \core\Controller{
    public function __construct(){
        $this->view=new \core\View();
    }
    public function list_method(){
        $model=new sent_Model();
        if($this->Authcheck()){
            if(isset($_POST['filter']))
                $select=$model->get_send($_SESSION['user'],$_POST['filter']);
            else
                $select=$model->get_send($_SESSION['user'],null);
            $this->view->demonstration('send.php',$select);
        }
        else
            $this->view->demonstration('403.php',null);
    }
    public function view_sent_method(){
        $model=new sent_Model();
        $id=$_POST['id'];
        $select=$model->get_view($_SESSION['user'],$id);
        echo $select['message'];
    }
    public function delete_method(){
        $model=new sent_Model();
        $json=$_POST['check'];
        foreach ($json as $id) {
            $model->get_delete($id);
        }
        echo 'ok' ;
    }
}
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 06.10.16
 * Time: 0:22
 */