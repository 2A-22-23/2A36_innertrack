<?php
session_start();
include("connexion.php");
?>
<html>
<head>
	<title></title>
 <meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <nav>
  <ul>
    <li><a href="index.php">Login</a></li>
    <li><a href="inscription.php">Inscription</a></li>
  </ul>
  </nav>
</header>
<section>
 <h1 class="titre">Bienvenue dans notre forum</h1> 
</section>
<section id="sect1">
<?php
  /* changer le format de la date en français*/
function changedate($dt)
{
$tab = explode("-",$dt);
$nd = $tab[2]."-".$tab[1]."-".$tab[0];
return $nd;
}

$res=mysqli_query($con,"SELECT * from utilisateur,message where utilisateur.id_user=message.id_user order by id_message DESC"); 
while($data=mysqli_fetch_assoc($res))
{
  
  echo $data['nom_user'];
  echo '<br>'.$data['prenom_user'].'</div>';
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
  $id=$_SESSION['id_user'];
  $msg=$_POST['message'];
  $date=date('Y-m-d');
  $heure=date('H:i');
  $req1=mysqli_query($con,"INSERT into message values (NULL,'$msg','$date','$heure','$id')"); 
  header("location:foruum.php");
}

?>

</section>



</body>
</html>
<?php
?>
