<?php
session_start();


if(!isset( $_SESSION['mail'], $_SESSION['name'],$_SESSION['role'] )){
	header('location:pages-login.php');
}

    
    $email = $_SESSION['mail'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];

    

    include "../config.php";
    $var_value = $_GET['varname'];
    // echo $var_value;

    $verifuser = $pdo -> query("SELECT * FROM user WHERE email= '$var_value'");
        
        $userdata = $verifuser->fetch();
        // echo 'cbon';
        //echo ($userdata['name']);

        $idUser = $userdata['idUser'];
        $name2 = $userdata['name'];
        $lastname = $userdata['lastName'];
        $sexe = $userdata['sexe'];
        $mail = $userdata['email'];
        $number = $userdata['phoneNumber'];
        $adress = $userdata['adress'];
        $password = $userdata['password'];
        $role2 = $userdata['role'];
        $status = $userdata['status'];
    // echo $name,$lastname,$sexe,$mail;



        $pdo = null;
?>






<html lang="en">


<head>

  
    


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <link rel="stylesheet" type="text/css" href="../Back/assets/css/midifyuser.css">
</head>

<body>
   

   
<!-- multistep form -->
<form id="msform" action="modifuser_base.php" method="GET">
  
  
  <!-- fieldsets -->
  <fieldset>
    
    <h2 class="fs-title">Modify User</h2>
    
    <h3 class="fs-subtitle">______________________</h3>
    <?php echo"
    
    <input type='hidden' name='iduser' value=".$idUser."  />
    <h5 class='goleft'>Name</h5>
    <input type='text' name='name' value=".$name2." />

    <h5 class='goleft'>Last Name</h5>
    <input type='text' name='lastname' value=".$lastname." />

    <h5 class='goleft'>Email</h5>
    <input type='text' name='mail' value=".$mail."  />

    <h5 class='goleft'>Phone Number</h5>
    <input type='text' name='number' value=".$number."  />

    <h5 class='goleft'>adress</h5>
    <input type='text' name='adress' value=".$adress."  />

    <h5 class='goleft'>Role</h5>
    <input type='text' name='role' value=".$role2."  />

    <h5 class='goleft'>Password</h5>
    <input type='text' name='passnew'   />
    <input type='hidden' name='pass' value=".$password."  />




    <h5 class='goleft'>Sexe</h5>
    <input type='text' name='sexe' value=".$sexe."  />
    <input type='hidden' name='status' value=".$status."  />

    <input type='submit' name='next' class='next action-button' value='modify' />
    <input type='reset' name='next' class='next action-button' value='reset' />
  
    <button class='next action-button'><a href='userlist.php' style='text-decoration:none; color:white;'>Back to list</a></button>
   
    ";
    ?>
  </fieldset>
  
</form>

</body>
<!-- <script src="midifyuser.js"></script> -->

</html>