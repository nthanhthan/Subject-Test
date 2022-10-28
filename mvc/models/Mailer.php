<?php
include "./mvc/PHPMailer/src/PHPMailer.php";
include "./mvc/PHPMailer/src/Exception.php";
include "./mvc/PHPMailer/src/OAuth.php";
include "./mvc/PHPMailer/src/POP3.php";
include "./mvc/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class Mailer
 */
class Mailer
{
    /**
     * Send mail
     * @param $title
     * @param $content
     * @param $address
     * @param $name
     * @return int
     * @throws Exception
     */
    function sendMail($title, $content, $address, $name)
    {
        $nFrom = 'Hệ thống thi trắc nghiệm';
        $mFrom = 'myle10032001@gmail.com';// not run because mail private
        $mPass = '160473';
        $mail             = new PHPMailer();
        $mail->isSMTP();
        // $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "STARTTLS";
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 587;
        $mail->Username   = $mFrom;
        $mail->Password   = $mPass;
        $mail->CharSet   = "UTF-8";
        $mail->isHTML(true);
        $mail->addAddress($address, $name);
        $mail->setFrom($mFrom, $nFrom);
        $mail->Subject    = $title;
        $mail->msgHTML($content);
        $mail->addReplyTo($mFrom, $nFrom);
        if(!$mail->Send()) {
            return false;
        } else {
            return true;
        }
    }
}