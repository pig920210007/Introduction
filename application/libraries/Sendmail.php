<?php
//require_once("/var/www/Introduction/application/libraries/PHPMailer/_lib/class.phpmailer.php");
require_once 'PHPMailer/_lib/class.phpmailer.php';
class Sendmail {
    public function send($to, $subject, $body) {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = 'webbjing@gmail.com';
        $mail->Password = 'pig910107';
        $mail->From = 'webbjing@gmail.com';
        $mail->FromName = 'Webb';
        $mail->AddAddress($to);
        $mail->CharSet = "utf-8";
        $mail->Encoding = "base64";
        $mail->IsHTML(true);
        $mail->WordWrap = 50;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = "Your browser does not support HTML";
        $mail->Send();
    }
}