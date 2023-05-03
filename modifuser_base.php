<?php
session_start();


if(!isset( $_SESSION['mail'], $_SESSION['name'],$_SESSION['role'] )){
	header('location:pages-login.php');
}

    
    $email = $_SESSION['mail'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];

    

    include "../config.php";
    //include "../Controller/cuser.php";
    // $var_value = $_GET['data'];
    // echo $var_value;

    $id=$_GET['iduser'];
    $name2 = $_GET['name'];
    $lastName = $_GET['lastname'];
    $sexe = $_GET['sexe'];
    $mail = $_GET['mail'];
    $number = $_GET['number'];
    $adress = $_GET['adress'];


    echo $_GET['passnew'];
    if(!empty($_GET['passnew']))
    {
        $password = $_GET['passnew'];

        $password_hached = password_hash($password,PASSWORD_DEFAULT);
    }else{
        $password = $_GET['pass'];
        $password_hached =$password;
    }

    $role2 = $_GET['role'];
    $status = $_GET['status'];
    echo $name,$lastName,$sexe,$mail;



/*

    $verifuser2 = $pdo -> query("  UPDATE user SET  status =$status  WHERE idUser=$varid");



  
    if($verifuser2)
    {
        header('location:listuser.php');
    }
    
*/




    // create an instance of the controller
    $query = $pdo->prepare(
        'UPDATE user SET 
            name = :name, 
            lastName = :lastName, 
            adress = :adress, 
            sexe= :sexe,
            phoneNumber = :phoneNumber,
            role = :role,
            password =:password,
            email=:email,
            status=:status
        WHERE idUser= :idUser'
    );
    echo "awel";
    $query->execute([
        'idUser' => $id,
        'name' => $name2,
        'lastName' =>$lastName,
        'adress' =>$adress,
        'email' =>$mail,
        'phoneNumber' => $number,
        'sexe' =>$sexe,
        'role' =>$role2,
        'password' =>$password_hached,
        'status'=>$status,
    ]);
        

      
    session_destroy();

    if($role==1){

             session_start();



                $_SESSION['mail'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['role'] = $role;

        header('Location:userlist.php');
    }
    if($role==0){

             session_start();
  


                $_SESSION['mail'] = $mail;
                $_SESSION['name'] = $name2;
                $_SESSION['role'] = $role2;

        //header('location:customer-profile.php');
    }
        




   


        $pdo = null;
?>