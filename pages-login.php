<?php
include "../config.php";



$alerte = "";
if(isset($_GET['varname'])) // si existe
{
    if(!empty($_GET['varname'])) // n'est pas vide
    {
        if($_GET['varname']=="mdpp")
        {
            $alerte = "password is not correct !";
            echo "<script>alert('$alerte');</script>";
        }
        if($_GET['varname']=="mdp")
        {
            $alerte = "this account does not exist !";
            echo "<script>alert('$alerte');</script>";
        }
        if($_GET['varname']=="blocked")
        {
            $alerte = "your account is blocked !";
           
           echo "<script>alert('$alerte');</script>";
        }


    }
}




















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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="pages_admin.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">InnerTrack</span>
                </a>
              </div><!-- End Logo -->
              <div id="google_translate_element"></div> 
             <script type="text/javascript"> 
             function googleTranslateElementInit() { 
             new google.translate.TranslateElement({pageLanguage: 'en'},'google_translate_element'); 
              } 
          </script> 
    <script type="text/javascript"src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" id="form" novalidate action="connexion.php" method="POST"><!-- ihel connexion.php w post tebaa edhika -->

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Mail</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="mail" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                  

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> -->
                    <div class="center">
        <h1 id="captchaHeading">Captcha</h1>
        <div id="captchaBackground">
            <canvas id="captcha">captcha text</canvas>
            <input id="textBox" type="text" name="text">
            <div id="buttons">
                <input id="submitButton" >
                <input id="refreshButton" >
            </div>
            <span id="output"></span>
        </div>
    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" id="submit" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="../back/signnup.php">Create an account</a></p>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"> <a href="forgotpass.php">Forgot your password?</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">InnerTrack group</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <style>


#captchaBackground {
    height: 220px;
    width: 250px;
    background-color: #2d3748;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

#captchaHeading {
    color: white;
}

#captcha {
    height: 80%;
    width: 80%;
    font-size: 30px;
    letter-spacing: 3px;
    margin: auto;
    display: block;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}

.center {
    display: flex;
    flex-direction: column;
    align-items: center;
}

#submitButton {
    margin-top: 2em;
    margin-bottom: 2em;
    background-color: #08e5ff;
    border: 0px;
    font-weight: bold;
}

#refreshButton {
    background-color: #08e5ff;
    border: 0px;
    font-weight: bold;
}

#textBox {
    height: 25px;
}

.incorrectCaptcha {
    color: #FF0000;
}

.correctCaptcha {
    color: #7FFF00;
}

	</style>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="captcha.js"></script>

</body>

</html>