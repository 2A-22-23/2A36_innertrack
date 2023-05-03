<?php
session_start();
include "../config.php";

$id = $_GET['varname'];

require '../config.php';

try{
    $verifuser = $pdo -> query('DELETE FROM user WHERE email ="'.$id.'"');
    
    
    header('location:../Back/userlist.php');

   
}catch(PDOException $e){
    $e->getMessage();
}

$pdo = null;
?>

