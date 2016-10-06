<?php
class message_Controllers extends \core\Controller{
    public function __construct(){
        $this->view = new core\View();
    }
    public function list_method(){
        $error='';
            $title=$_POST['title'];
            $email=$_POST['email'];
            $text=$_POST['text'];
            if(isset($_POST['title']) && isset($_POST['email']) && isset($_POST['text'])){
                $model= new  message_Model();
                $select=$model->get_message($_SESSION['user'],$title,$email,$text);
                if($select)
                {
                    $header="From: ".$_SESSION['user']."\r\nReaply-to: ".$_SESSION['user']."\r\nContent-type: text/plain; charset=utf-8\r\n";
                    $mail=self::smtpmail($_POST['email'], $_POST['email'], $_POST['title'],$_POST['text'],$header);
                    //mail($email, $title, $text, $header);
                    if($mail)
                        header('Location: ?');
                    else
                        $error=$error.'Во время отправления соосбщения на email произошла ошибка';
                }
                else
                    $error=$error.'Во время добавлению соосбщения в историю произошла ошибка';
            }
            else
                $error=$error.'Поля, отмеченные знаком были не заполненный';
        $this->view->demonstration('incorrect.php',$error);
    }


    function smtpmail($to, $mail_to, $subject, $message, $headers) {

        $config=$this->connect_smtp();
        $SEND =	"Date: ".date("D, d M Y H:i:s") . " UT\r\n";
        $SEND .= 'Subject: =?'.$config['smtp_charset'].'?B?'.base64_encode($subject)."=?=\r\n";
        if ($headers) $SEND .= $headers."\r\n\r\n";
        else
        {
            $SEND .= "Reply-To: ".$config['smtp_username']."\r\n";
            $SEND .= "To: \"=?".$config['smtp_charset']."?B?".base64_encode($to)."=?=\" <$mail_to>\r\n";
            $SEND .= "MIME-Version: 1.0\r\n";
            $SEND .= "Content-Type: text/html; charset=\"".$config['smtp_charset']."\"\r\n";
            $SEND .= "Content-Transfer-Encoding: 8bit\r\n";
            $SEND .= "From: \"=?".$config['smtp_charset']."?B?=?=\" <".$config['smtp_username'].">\r\n";
            $SEND .= "X-Priority: 3\r\n\r\n";
        }
        $SEND .=  $message."\r\n";
        if( !$socket = fsockopen($config['smtp_host'], $config['smtp_port'], $errno, $errstr, 30) ) {
            if ($config['smtp_debug']) echo $errno."<br>".$errstr;
            return false;
        }

        fputs($socket, "HELO " . $config['smtp_host'] . "\r\n");

        fputs($socket, "AUTH LOGIN\r\n");

        fputs($socket, base64_encode($config['smtp_username']) . "\r\n");

        fputs($socket, base64_encode($config['smtp_password']) . "\r\n");

        fputs($socket, "MAIL FROM: <".$config['smtp_username'].">\r\n");

        fputs($socket, "RCPT TO: <" . $mail_to . ">\r\n");

        fputs($socket, "DATA\r\n");

        fputs($socket, $SEND."\r\n.\r\n");

        fputs($socket, "QUIT\r\n");
        fclose($socket);
        return TRUE;
    }
}
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 05.10.16
 * Time: 19:26
 */ 