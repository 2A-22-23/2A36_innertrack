<?php

include "../config.php";
require_once 'C:/xampp/htdocs/InnerTrack/Back/src/PHPMailer.php';
require 'C:/xampp/htdocs/InnerTrack/Back/src/SMTP.php';
require 'C:/xampp/htdocs/InnerTrack/Back/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
$mail = new PHPMailer();

echo $_GET['varname'];

$verifuser = $pdo -> query('SELECT * FROM user WHERE email ="'.$_GET['varname'].'"');
            
$userdata = $verifuser->fetch();

$forgotdate=date('d-m-y H:i:s'); 

ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_port', 587);


$req = $pdo->prepare('UPDATE user SET forgotPassDate= :forgotdate WHERE email = :mail_user ');

             $req->execute(array(
             
                    'forgotdate' => $forgotdate,
                     'mail_user' => $userdata['email']
             
                    ));



$to = "nouramhamdi36@gmail.com";
$subject= "Forget Password";
$message ="Hello ".$userdata['name'].",

Somebody requested a new password for account associated with ".$userdata['email'].".

No changes have been made to your account yet.

You can reset your password by clicking the link below:http://http://localhost/InnerTrack/Back/forgotpasslink.php?varname=".$userdata['email']."  

If you did not request a new password, please let us know immediately by replying to this email.

Yours,
Bonsai team";

$headers ="Content-Type: text/plain; charset=utf8\r\n";
$headers .="From:nouram.hamdi@esprit.tn\r\n";

    
	
    //Set mailer to use smtp
        $mail->isSMTP();
    //Define smtp host
        $mail->Host = "smtp.gmail.com";
    //Enable smtp authentication
        $mail->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
        $mail->SMTPSecure = "tls";
    //Port to connect smtp
        $mail->Port = "587";
    //Set gmail username
        $mail->Username = "nouram.hamdi@esprit.tn";
    //Set gmail password
        $mail->Password = "211JFT7882";
    //Email subject
        $mail->Subject = "message envoyée";
    //Set sender email
        $mail->setFrom('nouram.hamdi@esprit.tn');
    //Enable HTML
        $mail->isHTML(true);
    //Attachment
        //$mail->addAttachment('img/attachment.png');
    //Email body
        $mail->Body = $message;
    //Add recipient
        $mail->addAddress($userdata['email']);
    //Finally send email
        if ( $mail->send() ) {
            echo "Email Sent..!";
            //header('location:pages-login.php?varname=mailenvoyer');
        }else{
            echo "Message could not be sent. Mailer Error: ";
        }
    //Closing smtp connection
        $mail->smtpClose();
        