<?php
include "G:/xampp/htdocs/InnerTrack/InnerTrack/config.php";
include 'G:/xampp/htdocs/InnerTrack/InnerTrack/components/connect.php';

session_start();

if(!isset( $_SESSION['mail'], $_SESSION['name'],$_SESSION['role'] )){
   header('location:pages-login.php');
}

   
    $email = $_SESSION['mail'];
    $name = $_SESSION['name'];
   
  
    $role = $_SESSION['role'];
    $verifuser = $pdo -> query('SELECT * FROM user where email= "'.$email.'"');
 
    $userdata = $verifuser->fetch();
    $user_id = $userdata['idUser'];

   

  



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>InnerTrack - Psychology Website </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <!-- <link href="img/favicon.ico" rel="icon"> --> 

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/styless.css" rel="stylesheet">
</head>

<body style="bottom:100px;">
    <!-- Topbar Start -->
   
    <!-- Topbar End -->
    

   <!-- Navbar Start -->
   <div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary"><img src="img/logo.png" alt="">InnerTrack</h1><!-- il faut mettre logo -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    
                    <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="service.php" class="nav-item nav-link">Service</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0" style="font-size:20px;">
                            <a href="posts.php" class="dropdown-item">Posts </a>
                                <a href="foruum.php" class="dropdown-item">Forum</a>
                                <a href="searchh.php" class="dropdown-item">Search</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <div class="pt-2.5">
                    <a href="logout.php" class="btn btn-primary rounded-pill py-3 px-4 ">Logout</a>
                </div>
                </div>
            </div>
           
            
        </nav>
    </div>
</div>
<!-- Navbar End -->




    <!-- Blog Start -->
     <!-- traduction -->
    
    
<section>
 <h1 class="titre">Bienvenue dans notre forum</h1> 
</section>
<section id="sect1" style="font-family:Arial;font-size:20px">
<?php
  /* changer le format de la date en français*/
function changedate($dt)
{
$tab = explode("-",$dt);
$nd = $tab[2]."-".$tab[1]."-".$tab[0];
return $nd;
}
$con = mysqli_connect('localhost', 'root', '');
    if(!$con){
        echo "base de donnée introuvable";
        }
    if (!mysqli_select_db($con, 'innertrack')){
        echo "base de donnée introuvable";
        }
$res=mysqli_query($con,"SELECT * from user,message where user.idUser=message.id_user order by id_message DESC"); 
while($data=mysqli_fetch_assoc($res))
{
  
  echo $data['name'];
  echo '<br>'.$data['lastName'].'</div>';
  echo '<div id="div2">Posté le : '.changedate($data['date_message']);
  echo ' à '.$data['heure_message'];
  echo '<br>'.$data['texte_message'].'</div>';
 
}

?>

<form action="" method="post">
<textarea name="message"  placeholder="Votre message" id="zmessage"></textarea>
<input type="submit" name="envoyer" value="Envoyer" class="btn2">
</form>
<?php
if(isset($_POST['envoyer']))
{
  $id=$userdata['idUser'];
  $msg=$_POST['message'];
  $date=date('Y-m-d');
  $heure=date('H:i');
  $req1=mysqli_query($con,"INSERT into message values (NULL,'$msg','$date','$heure','$id')"); 
 
}

?>

</section>



</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</html>
<?php
?>
