<?php
class message_Model extends Model{
    private $_db=null;
    public function __construct(){
        $this->_db=Model::getInstance();
    }
    public function get_message($user,$title,$mail,$text){
        $result=$this->_db->query("INSERT INTO `messages`(`from_mail`, `to_mail`, `title`, `message`, `date`) VALUES ('$user','$mail','$title','$text',NOW())");
        return $this->inspection($result);
    }
}
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 05.10.16
 * Time: 19:26
 */ 