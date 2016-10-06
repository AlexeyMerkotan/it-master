<?php
class exit_Controllers extends \core\Controller{
    public function __construct(){
        $this->view=new \core\View();
    }
    public function list_method(){
        unset($_SESSION['flag']);
        header("Location: ?");
    }
}
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 05.10.16
 * Time: 19:13
 */ 