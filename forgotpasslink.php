<?php
include "../config.php";
session_start();
$mailusertochange=$_GET['varname'];

$verifuser = $pdo -> query('SELECT * FROM user WHERE email ="'.$mailusertochange.'"');
            
$userdata = $verifuser->fetch();






 

// echo $userdata['forgotPassDate'];



$sendtime=$userdata['forgotPassDate'];

// echo "mail Sent date : ".$sendtime."";





$endTime = date("y-m-d H:i:s",strtotime('+1 minutes',strtotime($sendtime)));
// echo "<br>";
//  echo "expire date :".$endTime."";
//  echo "<br>";

$current_date=date("d-m-y H:i:s");
// echo "current date:".$current_date."";


if($current_date > $endTime)
{
     session_destroy();
     header('location:404.html');
    // echo "ici";
    
}else{

    if(isset($_POST['newpass']))
    {
        if(!empty($_POST['newpass']))
        {
            //  $sql='UPDATE user SET password="'.$_POST['newpass']." WHERE name="'.$name.'"'; 

           
            $password_hached = password_hash($_POST['newpass'],PASSWORD_DEFAULT);

             $req = $pdo->prepare('UPDATE user SET password= :newpass WHERE email = :mail_user ');

             $result = $req->execute(array(
             
                    'newpass' => $password_hached,
                     'mail_user' => $mailusertochange
             
                    ));
                    
                   


                        
                    
            if($result===True){
                $pdo=null;
                session_destroy();
                header('location:logout.php');
            }







            //  if ($pdo->query($sql) === TRUE) {
            //      echo "Record updated successfully";
            //    } else {
            //      echo "Error updating record: ";
            //    }
              
        }
    }


}

$pdo=null;


?>

























<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width" name="viewport" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="forgotpasslink.js" ></script>
               












    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }
        table, td, tr {
            vertical-align: top;
            border-collapse: collapse;
        }
        * {
            line-height: inherit;
        }
        a[x-apple-data-detectors=true] {
            color: inherit !important;
            text-decoration: none !important;
        }


        .modif1{
            position: relative;
            top:100px;
        }
        .modif2{
           background-color: #d7bf37;
        }

       


    </style>
    <style id="media-query" type="text/css">
        @media (max-width: 670px) {
            .block-grid,
            .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
            }
            .block-grid {
                width: 100% !important;
            }
            .col {
                width: 100% !important;
            }
            .col_cont {
                margin: 0 auto;
            }
            img.fullwidth, img.fullwidthOnMobile {
                max-width: 100% !important;
            }
            .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
            }
            .no-stack.two-up .col {
                width: 50% !important;
            }
            .no-stack .col.num2 {
                width: 16.6% !important;
            }
            .no-stack .col.num3 {
                width: 25% !important;
            }
            .no-stack .col.num4 {
                width: 33% !important;
            }
            .no-stack .col.num5 {
                width: 41.6% !important;
            }
            .no-stack .col.num6 {
                width: 50% !important;
            }
            .no-stack .col.num7 {
                width: 58.3% !important;
            }
            .no-stack .col.num8 {
                width: 66.6% !important;
            }
            .no-stack .col.num9 {
                width: 75% !important;
            }
            .no-stack .col.num10 {
                width: 83.3% !important;
            }
            .video-block {
                max-width: none !important;
            }
            .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
            }
            .desktop_hide {
                display: block !important;
                max-height: none !important;
            }
        }
    </style>
    <style id="icon-media-query" type="text/css">
        @media (max-width: 670px) {
            .icons-inner {
                text-align: center;
            }
            .icons-inner td {
                margin: 0 auto;
            }
        }
    </style>
</head>
<body class="clean-body modif1" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%;" onload=display_ct();>
    <table bgcolor="#000000" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #000000; width: 100%;" valign="top" width="100%">
        <tbody>
            <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top;" valign="top">
                    
                    <div  style="background-color:white;">
                        <div class="block-grid modif2" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #dabd19; ">
                            <div style=" border-collapse: collapse;display: table;width: 100%;background-color:#f5d41d;background-image:url('images/bg-white-rombo.png');background-position:top left;background-repeat:no-repeat ">
                                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px; ">
                                    <div class="col_cont" style="width:100% !important; ">
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:45px; padding-bottom:0px; padding-right: 0px; padding-left: 0px; ">
                                            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                                <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;" valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" valign="top" width="100%">
                                                                <tbody>
                                                                    <tr style="vertical-align: top;" valign="top">
                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                            <div align="center" class="img-container center fixedwidth" style="padding-right: 20px;padding-left: 20px;">
                                                <div style="font-size:1px;line-height:20px"></div>
                                                <!-- <img align="center" alt="Forgot your password?" border="0" class="center fixedwidth" src="images/lock4.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 325px; display: block;" title="Forgot your password?" width="325" /> -->
                                                <span id='ct7' style="background-color: none"></span>
                                                
                                                <div style="font-size:1px;line-height:20px"></div>
                                            </div>
                                            <div align="center" class="img-container center fixedwidth" style="padding-right: 20px;padding-left: 20px;">
                                                <div style="font-size:1px;line-height:20px"></div>
                                                <!-- <img align="center" alt="Forgot your password?" border="0" class="center fixedwidth" src="images/lock4.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 325px; display: block;" title="Forgot your password?" width="325" /> -->
                                                <h5>Expire date:  <?php echo $endTime; ?></h5>
                                                
                                                <div style="font-size:1px;line-height:20px"></div>
                                            </div>
                                            <table cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                                                <tr style="vertical-align: top;" valign="top">
                                                    <td align="center" style="word-break: break-word; vertical-align: top; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; padding-top: 35px; text-align: center; width: 100%;" valign="top" width="100%">
                                                        <h1 style="color:black;direction:ltr;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:28px;font-weight:normal;letter-spacing:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0;">
                                                            <strong>Forgot your password?</strong>
                                                        </h1>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div style="color:black;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:1.5;padding-top:10px;padding-right:45px;padding-bottom:10px;padding-left:45px;">
                                                <div class="txtTinyMce-wrapper" style="line-height: 1.5; font-size: 12px; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; text-align: center; color: black; mso-line-height-alt: 18px;">
                                                    <span style="font-size: 13px; color: black; mso-ansi-font-size: 14px;">
                                                        If you did make this request just click the button below:
                                                    </span>
                                                </div>
                                            </div>
                                            <form action="" method="POST">
                                            <div style="color:black;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:1.5;padding-top:10px;padding-right:45px;padding-bottom:10px;padding-left:45px;">
                                                <div class="txtTinyMce-wrapper" style="line-height: 1.5; font-size: 12px; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; text-align: center; color: black; mso-line-height-alt: 18px;">
                                                    <span style="font-size: 13px; color: black; mso-ansi-font-size: 14px;">

                                                    
                                                    <input type="text" name="newpass">
                                                    
                                                    
                                                    

                                                    </span>
                                                </div>
                                            </div>



                                            <div align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                            
                                             <a href="" dis style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #1b1a15; border-radius: 0px; -webkit-border-radius: 0px; -moz-border-radius: 0px; width: auto; width: auto; border-top: 1px solid #1b1a15; border-right: 1px solid #1b1a15; border-bottom: 1px solid #1b1a15; border-left: 1px solid #1b1a15; padding-top: 0px; padding-bottom: 0px; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;" target="_blank" disabled> 
                                               
                                                <span style="padding-left:0px;padding-right:0px;font-size:14px;display:inline-block;letter-spacing:undefined;">
                                                    
                                                    <span style="font-size: 16px; line-height: 2; word-break: break-word; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; mso-line-height-alt: 32px;">
                                                           
                                                        
                                                            <span  data-mce-style="font-size: 14px; line-height: 28px;" style="font-size: 14px; line-height: 28px;">
                                                               <input type="submit" value=" RESET MY PASSWORD" style="background:none; color:white; border:0px; padding:15px;">
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                            </form>
                                            <div style="color:#393d47;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:15px;padding-left:10px;">
                                                <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; color: #393d47; mso-line-height-alt: 14px;">
                                                    <p style="font-size: 10px; line-height: 1.2; word-break: break-word; text-align: center; font-family: 'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif; mso-line-height-alt: 12px; margin: 0;">
                                                        <span style="font-size: 10px; color: #1b1a15;">
                                                            <span style="">
                                                                If you didn't request to change your brand password,
                                                            </span>
                                                            <span style="">
                                                                you don't have to do anything. So that's easy.
                                                            </span>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div style="color:#393d47;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:20px;padding-left:10px;">
                                                <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                                                    <p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;">
                                                        <!-- <span style="color: #8a3b8f;">&copy; 2021 ASK me</span> -->
                                                    </p>
                                                </div>
                                            </div>
                                            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                                <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;" valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" valign="top" width="100%">
                                                                <tbody>
                                                                    <tr style="vertical-align: top;" valign="top">
                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>


