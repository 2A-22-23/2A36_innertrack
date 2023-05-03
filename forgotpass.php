<?php

include "../config.php";


if(isset($_GET['mail']))
{

    $mail = $_GET['mail'];

    if(!empty($mail))
    {
        $verifuser = $pdo -> query('SELECT * FROM user WHERE email ="'.$mail.'"');
            
        $userdata = $verifuser->fetch();
        if(!empty($userdata)){

            header('location:envoiMail.php?varname='.$mail.'');





        }else echo"compte nexiste pas!";
    }
}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgotpass</title>
    <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/monsingin.css" rel="stylesheet">
</head>
<body>
    
    <div class="right_box ">

        <div class="title">
            <h2 >Forgot Password</h2>
            <p>Enter your email address below and we'll send you an email with <br> instructions on how to change your password</p>
        </div>
        


        <form action="" method="get">
            

            <label for=""> Mail  </label>
            <input type="mail" name="mail" placeholder="Enter mail" id="mail" required>
           
           

            <button class="btn " type="submit" >
                Send
             </button>

             <a class="link" href="pages-login.php"><p>Already an account? Sign in</p></a>
             
        </form>

    </div>

    <div class="left_box ">
    <img class="img-fluid rounded-circle mx-auto" src="../Front/img/forgot-password.jpg" alt="">
    </div>
</body>
</html>

