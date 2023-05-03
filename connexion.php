<?php
include "../config.php";
session_start();



$mail = $_POST['mail'];
$password = $_POST['pass'];


    
    if(!empty($mail) AND !empty($password)){
       
        $verifuser = $pdo -> query('SELECT * FROM user WHERE email ="'.$mail.'"');
        
        $userdata = $verifuser->fetch();
         echo 'cbon';
        // echo ($userdata['name']);

        
        
        
        if(empty($userdata))
        {
            // echo $password_hached;
            // echo "///////";
            // echo $password_hached;
             header('location:pages-login.php?varname=mdp');
            echo ('erreur');
        }else{

            
       
            if( password_verify($password,$userdata['password'])){
                //echo "password is correct";



                if($userdata['status']==0){
                
                    header('location:pages-login.php?varname=blocked');
                   
                 }
                else{

                    if($verifuser -> rowCount() == 1){
                
                        $_SESSION['mail'] = $userdata['email']; 
                        $_SESSION['name'] = $userdata['name'];
                        $_SESSION['role'] = $userdata['role'];
                    
                        if($userdata['role'] == 1)
                        {
                            header('location:page_admin.php');
                        }else if($userdata['role'] == 0) 
                        {
                            header('location:../customer.php');
                        }else 
                        {
                            header('location:../adem/DeliveryMan/Views/deliveryforyou.php');
                        }
                        // 0->customer, 1-> admin ,  2->delivaty
                    
                
                    }else{
                        $return = "identifiant invalide !";
                        header('location:pages-login.php?varname=mdpp');
                    }

                }
            }else{
                $return = "identifiant invalide !";
                        header('location:pages-login.php?varname=mdpp');
            }


            
        }
        

    }else $return = "champs manquant !";


    

  $pdo=null;

