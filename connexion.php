<?php

$con = mysqli_connect('localhost', 'root', '');
    if(!$con){
        echo "base de donnée introuvable";
        }
    if (!mysqli_select_db($con, 'projet_web')){
        echo "base de donnée introuvable";
        }
?>