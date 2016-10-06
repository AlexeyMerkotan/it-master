<?php
class Model{
    private static $_db;

    public static function getInstance(){
        if(self::$_db==null)
            self::$_db=new PDO("mysql:dbname=".db_name.";host=".host,user,password);
        return self::$_db;
    }

    public function inspection($data){
        if($data)
            return true;
        else
            return false;
    }

}