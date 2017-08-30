<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPHPmailers {
    public function __construct(){
        require_once('PHPMailer/class.phpmailer.php');
    }
    public function sendMail($data){
        $mail=new PHPMailer();
        
        $mail->IsSMTP(); // enable SMTP
        //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = "codiga.mx";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "codiga@codiga.mx";
        $mail->Password = "codiga1234";
        $mail->SetFrom("codiga@codiga.mx",'NO-REPLY CODIGA INFO');
        $mail->AddReplyTo("codiga@codiga.mx","NO-REPLY CODIGA INFO");  //A quien debe ir dirigida la respuesta
        $mail->AddBCC("paconoeacevedo@gmail.com","Admin CODIGA");
        
        $mail->Subject = $data['inssue'];  //Asunto del mensaje
        $mail->AddAddress($data['email_destination'], $data['name_destination']);
        $mail->IsHTML(true);
        
        $text=$data['body'];
        $body= str_replace('content', $text, $data['body']);
        $mail->MsgHTML($body);
        
        $mail->charSet = "UTF-8";
        
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            return true;
        }
    }
    
}
