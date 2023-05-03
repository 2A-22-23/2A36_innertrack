<?php
include "../config.php";
session_start();


if(!isset( $_SESSION['mail'], $_SESSION['name'],$_SESSION['role'] )){
	
}

    
    $email = $_SESSION['mail'];
    $name = $_SESSION['name'];
    
   
    $role = $_SESSION['role'];

    

    include "../config.php";


    $verifuser = $pdo -> query('SELECT * FROM user');
        
        $userdata = $verifuser->fetchall();
        // echo 'cbon';
        //echo ($userdata['name']);





?>
