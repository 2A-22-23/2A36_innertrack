<?php
include "../config.php";

$name = $_GET['name'];
$lastname = $_GET['lastname'];
$sexe = $_GET['sexe'];
$mail = $_GET['mail'];
$number = $_GET['number'];
$address = $_GET['address'];
$password = $_GET['pass'];

$password_hached = password_hash($password,PASSWORD_DEFAULT);


try{

    
    $TestEmail = $pdo ->query('SELECT idUser FROM user WHERE email = "'.$mail.'"');

    if($TestEmail->rowCount() < 1){
        
        $query = $pdo->prepare('INSERT INTO user (name,lastName,sexe,email,password,adress,phoneNumber,role,status) VALUES (:name,:lastname,:sexe,:email,:password,:adress,:phonenumber,:role,:status)');
        $query->execute([
            'name' => $name,
            'lastname' => $lastname,
            'sexe'=> $sexe,
            'email' => $mail,
            'password' => $password_hached,
            'adress' => $address,
            'phonenumber' => $number,
            'role' => 0,
            'status' =>1
        ]);
        $return=  "Your Account has been created ";
        $return2 ="Awesome !";

    }
    else{
        //header('location:signup.php');
        $return=  "Your account already exist !";
        $return2 ="Oupss :/";
    }
    






   
}catch(PDOException $e){
    $e->getMessage();
}




$pdo = null;

?>






 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adduser</title>
    <link href="css/adduser.css" rel="stylesheet">
</head>
<body>


<div class="texte">

    <h1><?php echo($return2); ?></h1>
    <h2>
    <?php echo($return); ?>
    </h2>

    <a href="../Back/pages-login.php" class="glow-on-hover">Login</a>
</div>
 <!-- Your account has been created  -->
    
    
</body>
</html>