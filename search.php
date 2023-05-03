<?php
include '../config.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet"> 

</head>
<body>

<style>
   
   .search-form form{
      display: flex;
      gap:1rem;
   }
   
   .search-form form input{
      width: 100%;
      border:var(--border);
      border-radius: .5rem;
      background-color: var(--white);
      box-shadow: var(--box-shadow);
      padding:1.4rem;
      font-size: 1.8rem;
      color:var(--black);
   }
   
   .search-form form button{
      font-size: 2.5rem;
      height: 5.5rem;
      line-height: 5.5rem;
      background-color: var(--main-color);
      cursor: pointer;
      color:var(--white);
      border-radius: .5rem;
      width: 6rem;
      text-align: center;
   }
   
   .search-form form button:hover{
      background-color: var(--black);
   }
   
   </style>
<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search_box" placeholder="search here ..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>

<section class="products" style="padding-top: 0; min-height:100vh;">

   <div class="box-container">
<?php

$host_name = "localhost";
$database = "mybd"; // Change your database name
$username = "root";          // Your database user id 
$password = "";          // Your password

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
     $select_products =$dbo->prepare("SELECT * FROM user WHERE name LIKE '%{$search_box}%'"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="search.php" method="post" class="empty">
      <input type="hidden" name="pid" value="<?= $fetch_product['idUser']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <div class="name"><?= $fetch_product['name']; ?>  exists</div>
     
      </center>

<table border="1" align="center">
<tr>

                                                <th style="width:80px;"><strong>ID </strong></th>
                                                <th><strong>NAME</strong></th>
                                                <th><strong>MAIL</strong></th>
                                                <th><strong>ADDRESS</strong></th>
                                                <th><strong>NUMBER</strong></th>
                                                <th><strong>ROLE</strong></th>
</tr>

<tr>
<td><?php echo $fetch_product['idUser']; ?></td>
<td><?php echo $fetch_product['name']; ?></td>

<td><?php echo $fetch_product['email']; ?></td>
<td><?php echo $fetch_product['adress']; ?></td>
<td><?php echo $fetch_product['phoneNumber']; ?></td>
<?php
                                                   
                                                        // Te donne le login :
                                                        if( $fetch_product['role']==1){
                                                            $role = 'admin';
                                                        }
                                                        if( $fetch_product['role']==0){
                                                            $role = 'patient';
                                                        }
                                                        if( $fetch_product['role']==2){
                                                            $role = 'doctor';
                                                        }
                                                      


echo "<td> ". $role ."</td> " ?>


</tr>

</table>

      
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">no reclamation found!</p>';
      }
   }
   ?>
   </body>
</html>