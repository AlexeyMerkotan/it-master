<?php
namespace core;
class Controller{

    public function connect(){
        return imap_open('{imap.gmail.com:993/imap/ssl}INBOX',$_SESSION['user'], $_SESSION['pass']);
    }

    public function connect_smtp(){
        $config['smtp_username'] = $_SESSION['user'];
        $config['smtp_port'] = smtp_port;
        $config['smtp_host'] =  smtp_host;
        $config['smtp_password'] =  $_SESSION['pass'];
        $config['smtp_debug'] = true;
        $config['smtp_charset'] = 'utf-8';
        return $config;
    }


    public function Authcheck(){
        if($_SESSION['flag']==true)
            return true;
        else
            return false;
    }
}