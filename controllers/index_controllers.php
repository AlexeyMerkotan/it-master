<?php
class index_Controllers extends \core\Controller{
    private $arr=[];
    public function __construct(){
        $this->view = new core\View();
    }
    public function list_method(){
        if($this->Authcheck()){
            $data=self::incoming_mail();
            $this->view->demonstration('home.php',$data);
        }
        else
            $this->view->demonstration('page.php',null);
    }
    public function delete_method(){
        $json=$_POST['check'];
        foreach ($json as $id) {
            self::incoming_mail_delete( $id);
        }
        echo 'ok' ;
    }

    public function incoming_mail_delete( $value){
        $my_box = $this->connect();
        imap_delete($my_box,$value);
        imap_close($my_box);
    }

    public function view_sent_method(){
        $my_box = $this->connect();
        $id=$_POST['id'];
        $text=imap_fetchbody($my_box, $id, 1,2);
        imap_expunge($my_box);
        echo $text;
    }
    public function incoming_mail(){
        $my_box = $this->connect();
        $n = imap_num_msg($my_box);
        $arr=[];
        $m = 0;
        if($n != 0) {
            while($m++ < $n) {
                $array=[];
                $data="";
                $h = imap_header($my_box, $m);
                foreach ($h->from as $k =>$v) {
                    $mailbox = $v->mailbox;
                    $host = $v->host;
                    $email = $mailbox . "@" . $host;
                }
                $elements = imap_mime_header_decode($h->subject);
                for ($i=0; $i<count($elements); $i++) {
                    $data=$data."{$elements[$i]->text} ";
                }
                array_push($array,$m,$email,$data,$h->date);
                array_push($arr,$array);
            }
            imap_expunge($my_box);
        }
        return $arr;

    }
}
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 05.10.16
 * Time: 16:32
 */ 