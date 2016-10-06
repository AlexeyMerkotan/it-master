<?php
class sent_Model extends Model{
    private $_db=null;

    public function __construct(){
        $this->_db=Model::getInstance();
    }

    public function get_send($user,$filter){
        if(isset($filter))
            $where="`from_mail` = '".$user."' AND CONCAT(  `to_mail` ,  `date` ) LIKE  '%".$filter."%'";
        else
            $where="`from_mail`='".$user."'";
        $result=$this->_db->query("SELECT * FROM `messages` WHERE ".$where);
        $row=$result->fetchAll();
        return $row;
    }
    public function get_view($user,$id){
        $result=$this->_db->query("SELECT message FROM messages WHERE id='$id' AND from_mail='$user'");
        $row=$result->fetch();
        return $row;
    }
    public function get_delete($id){
        $result=$this->_db->query("DELETE FROM `messages` WHERE `id`='$id'");
    }
}
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 06.10.16
 * Time: 0:26
 */ 