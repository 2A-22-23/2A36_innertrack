<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InnerTrack -user Interphace</title>
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
    <span class="d-none d-lg-block">User</span>
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
        <a class="nav-link collapsed" href="../Front/index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <li class="nav-item">

        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
         
      </li><!-- End Tables Nav -->

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