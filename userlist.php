<?php
include "../config.php";
session_start();


if(!isset( $_SESSION['mail'], $_SESSION['name'],$_SESSION['role'] )){
    header('location:pages-login.php');
}

    
     $email = $_SESSION['mail'];
     $name = $_SESSION['name'];
    
   
     $role = $_SESSION['role'];

    

   

    $verifuser = $pdo -> query('SELECT * FROM user');
        
        $userdata = $verifuser->fetchall();
        // echo 'cbon';
        //echo ($userdata['name']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InnerTrack -Admin Interphace</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

    <!--*******************
        Preloader start
   
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
   
        Preloader end
    ********************-->
    <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="page_admin.php" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">  <!-- ======= logo ======= -->
    <span class="d-none d-lg-block">Admin</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="search.php">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

   
   

    <li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
  <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
  <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $name; ?></span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
  <li class="dropdown-header">
    <h6><?php echo $name; ?></h6>
    <span>Web Developper</span>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li>
    <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
      <i class="bi bi-person"></i>
      <span>My Profile</span>
    </a>
  </li>
  
 
  <li>
    <hr class="dropdown-divider">
  </li>

  <li>
    <a class="dropdown-item d-flex align-items-center" href="logout.php">
      <i class="bi bi-box-arrow-right"></i>
      <span>Sign Out</span>
    </a>
  </li>

</ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->


  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="page_admin.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="userlist.php">
          <i class="bi bi-circle active"></i><span>Users Table</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.php">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="signnup.php">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-login.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li><!-- End Login Page Nav -->

</ul>
<!-- End Login Page Nav //////////////////////////////////////////////////////////////////////////////////-->

</aside><!-- End Sidebar-->


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Users Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="page_admin.php">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
   <div class="content-body">
        
            <div class="container-fluid">
               
                <!-- traduction -->
                <div id="google_translate_element"></div> 
                <script type="text/javascript"> 
               function googleTranslateElementInit() { 
                new google.translate.TranslateElement({pageLanguage: 'en'},'google_translate_element'); 
                } 
                </script> 
               <script type="text/javascript"src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                <!-- end traduction --> 
                 <bouton> <a onclick="window.print()"> Print this page </a> </bouton>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List of Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>ID </strong></th>
                                                
                                                <th><strong>NAME</strong></th>
                                                <th><strong>MAIL</strong></th>
                                                <th><strong>ADDRESS</strong></th>
                                                <th><strong>NUMBER</strong></th>
                                                <th><strong>ROLE</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<tr>
                                                
                                                
                                                    <?php 
                                                    $nb_data = count($userdata);
                                                    for($i = 0; $i < $nb_data; $i++)
                                                    {
                                                        // Te donne le login :
                                                        if( $userdata[$i]['role']==1){
                                                            $role = 'admin';
                                                        }
                                                        if( $userdata[$i]['role']==0){
                                                            $role = 'patient';
                                                        }
                                                        if( $userdata[$i]['role']==2){
                                                            $role = 'doctor';
                                                        }

                                                        echo "<tr>
                                                        <td><strong>". $userdata[$i]['idUser']."</strong></td>
                                                        <td>". $userdata[$i]['name']."</td>
                                                        <td>". $userdata[$i]['email']."</td>
                                                        <td>". $userdata[$i]['adress']."</td>
                                                        <td>". $userdata[$i]['phoneNumber']."</td>
                                                        <td>". $role ."</td>
                                                         


                                                        
                                                        <td><a href=midifyuser.php?varname=".$userdata[$i]['email']." >Modify</a></td>
                                                          <td><a href=deleteuser.php?varname=".$userdata[$i]['email']." style='color:red;' >Delete</a></td>  
                                                       
                                                        ";
                                                        
                                                       if($userdata[$i]['status']==0){
                                                        echo " <td> <a href='status_change.php?varid=". $userdata[$i]['idUser']."'><button  style='border:0px; background-color:red;'><span class='badge light badge-danger' id='status_badge'>Blocked</span></button></a></td>";
                                                     }
                                                     if($userdata[$i]['status']==1){
                                                        echo " <td> <a href='status_change.php?varid=". $userdata[$i]['idUser']."'><button  style='border:0px; background-color:green;'><span class='badge light badge-success' id='status_badge'>Open</span></button></a></td>";
                                                     }

                                                     echo "</tr>";

                                                    }
                                                
                                                 ?>

                                                 
                                                 
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

 </body>

</html>




                    
                 