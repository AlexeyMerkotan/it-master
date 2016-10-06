<?php
class enter_Model extends Model{
    private $_db=null;
    public function __construct(){
        $this->_db=Model::getInstance();
    }
    public function insert_user($email,$pass){
        $result=$this->_db->query("INSERT INTO `users`(`login`, `password`) VALUES ('$email','$pass')");
        return $this->inspection($result);
    }
    public function get_user($email,$pass){
        $result=$this->_db->query("SELECT * FROM users WHERE login='$email' AND password='$pass'");
        $row=$result->fetch();
        return $this->inspection($row);
    }
}
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 05.10.16
 * Time: 18:30
 */ 