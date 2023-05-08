<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InnerTrack -Admin Interphace</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_new/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_new/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_new/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets_new/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets_new/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets_new/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets_new/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets_new/css/style.css" rel="stylesheet">

</head>


<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="page_admin.php" class="logo d-flex align-items-center">
    <img src="assets_new/img/logo.png" alt="">  <!-- ======= logo ======= -->
    <span class="d-none d-lg-block">Admin</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets_new/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php  echo $_SESSION['name']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php  echo $_SESSION['name']; ?></h6>
              <span>Web Developer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              
              <hr class="dropdown-divider">
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="../Back/logout.php">
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
        <a class="nav-link collapsed" href="page_admin.php">
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
          <a href="../Back/userlist.php">
              <i class="bi bi-circle"></i><span>users Table</span>
            </a>
            <a href="../Back/patient.php">
              <i class="bi bi-circle"></i><span>Patient Table</span>
            </a>
            <a href="../Back/psy.php">
              <i class="bi bi-circle"></i><span>Psy Table</span>
            </a>
            <a href="../Back/afficher.php">
            <i class="bi bi-circle"></i><span> assurances Table</span>
            </a>
            <a href="../Back/afficherRemboursement.php">
            <i class="bi bi-circle"></i><span> Remboursement Table</span>
            </a>
            <a href="../Back/view_posts.php">
              <i class="bi bi-circle"></i><span>posts </span>
            </a>
            <a href="../shop/liste_article.php">
              <i class="bi bi-circle"></i><span>shop</span>
            </a>
            <a href="../shop/liste_achat.php">
              <i class="bi bi-circle"></i><span>Purchase</span>
            </a>
            <a href="#">
            <a href="../Back/add_posts.php">
              <i class="bi bi-circle"></i><span>add post</span></a>
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
        <a class="nav-link collapsed" href="../Back/users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed" href="../Back/pages-contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../Back/signnup.php">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../Back/pages-login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>
    <!-- End Login Page Nav //////////////////////////////////////////////////////////////////////////////////-->

  </aside><!-- End Sidebar-->

  <!-- Vendor JS Files -->
  <script src="assets_new/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_new/vendor/chart.js/chart.umd.js"></script>
  <script src="assets_new/vendor/echarts/echarts.min.js"></script>
  <script src="assets_new/vendor/quill/quill.min.js"></script>
  <script src="assets_new/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets_new/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets_new/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets_new/js/main.js"></script>