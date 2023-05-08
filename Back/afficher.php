<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//require_once 'G:/xampp/htdocs/InnerTrack/InnerTrack/vendor/autoload.php';
use Stichoza\GoogleTranslate\GoogleTranslate;
require 'db.php';

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

if (isset($_GET['q'])) {
  $search_query = $_GET['q'];
  $sql = "SELECT * FROM liste WHERE name LIKE :search_query";
  $statement = $connection->prepare($sql);
  $statement->bindValue(':search_query', "%$search_query%");
} else {
$sql = 'SELECT * FROM liste';
$statement = $connection->prepare($sql);
}
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
//$translator = new Stichoza\GoogleTranslate\GoogleTranslate();
//$translator->setSource('fr')->setTarget('en');
//foreach ($people as $person) {
    //$person->description_en = $translator->translate($person->description);}

    $sql = "SELECT COUNT(*) AS total_count FROM liste";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $total_count = $result['total_count'];
    
    $sql = "SELECT COUNT(*) AS lecture_count FROM liste WHERE type_assurance = 'une année'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $lecture_count = $result['lecture_count'];
    $lecture_percentage = round(($lecture_count / $total_count) * 100, 2);
    
    $sql = "SELECT COUNT(*) AS peinture_count FROM liste WHERE type_assurance = 'six mois'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $peinture_count = $result['peinture_count'];
    $peinture_percentage = round(($peinture_count / $total_count) * 100, 2);
    
    




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
  <link href="assetes/css/style1.css" rel="stylesheet">
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
  <form class="submit" method="POST" action="search.php">
    
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
              <i class="bi bi-circle"></i><span>users Table</span>
            </a>
            <a href="patient.php">
              <i class="bi bi-circle"></i><span>Patient Table</span>
            </a>
            <a href="psy.php">
              <i class="bi bi-circle"></i><span>Psy Table</span>
            </a>
            <a href="afficher.php">
            <i class="bi bi-circle"></i><span> assurances Table</span>
            </a>
            <a href="afficherRemboursement.php">
            <i class="bi bi-circle"></i><span> Remboursement Table</span>
            </a>
            <a href="view_posts.php">
              <i class="bi bi-circle"></i><span>posts </span>
            </a>
            <a href="../shop/liste_article.php">
              <i class="bi bi-circle"></i><span>shop</span>
            </a>
            <a href="../shop/liste_achat.php">
              <i class="bi bi-circle"></i><span>Purchase</span>
            </a>
            <a href="add_posts.php">
              <i class="bi bi-circle"></i><span>add post</span></a>
              <a href="comments.php">
              <i class="bi bi-circle"></i><span>comments</span></a>
              <nav class="navbar">
           <a href="dashboard.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
  <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
</svg> <span>home</span></a>
           <a href="add_posts.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
</svg> <span>add posts</span></a>
           <a href="view_posts.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg> <span>view posts</span></a>
           <a href="admin_accounts.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
</svg> <span>accounts</span></a>
     
           
        </nav>
              </span>

              
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
      <h1>Assurance Table</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <form action="" method="get">
        <div class="form-group">
          <label for="search_query"></label>
          <input type="text" class="form-control" id="search_query" placeholder="search for an assurance" name="q" value="<?= $_GET['q'] ?? '' ?>">
        </div>
        <br>
        <center><button type="submit" class="btn btn-primary">Search</button></center>
      </form>
              <!-- Table with stripped rows -->
              <table class="table datatable">
              <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>TYPE ASSURANCE</th>
          <th>DATE EFFET </th>
          <th>DATE EXPIRATION</th>
          <th>Description</th>
          
          <th>Action</th>
        </tr>
        <?php foreach($people  as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->name; ?></td>
            <td><?= $person->mail; ?></td>
            <td><?= $person->type_assurance; ?></td>
            <td><?= $person->dateEffet; ?></td>
            <td><?= $person->dateExpiration; ?></td>
            <td><?= $person->description; ?></td>
            
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      
      <center><button type="button" class="btn btn-primary" style="background-color; black;" onclick="exportPDF()">Export PDF</button></center><br>
      <center><button type="button"  ><a class="nav-link" href="create.php">ajouter  </a></boutton>
    </div>
    
    <center> <h2>Pie chart of type assurance<h2> </center>
    <canvas id="pie-chart" style="margin-left: 350px;margin-right :300px" ></canvas>
    
              <!-- End Table with stripped rows -->

            </div>
          

  

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>InnerTrack</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="">InnerTrack group</a>
    </div>
  </footer><!-- End Footer -->
  <script src="https://unpkg.com/chart.js@3.7.0/dist/chart.min.js"></script>
  <script>
  var ctx = document.getElementById('pie-chart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'pie',
    data: {
  labels: ['six moix', 'une année'],
  datasets: [{
    label: 'Category',
    data: [<?= $peinture_percentage ?>, <?= $lecture_percentage ?>],
    backgroundColor: [
      'purple',
      'green'
    ]
  }]
    },
    options: {
  title: {
    display: true,
    text: 'Category Distribution'
  },
  legend: {
    display: true,
    position: 'bottom'
  },
  fontSize: 16
}
  });
</script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://unpkg.com/chart.js@3.7.0/dist/chart.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="pdf.js"></script>