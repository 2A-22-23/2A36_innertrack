<?php
  //connexion a la base de données
  include_once "connectionDB.php";
  //récupération de l'id dans le lien
  $id= $_GET['id'];
  //requête de suppression
  $req = $con->query("DELETE FROM article WHERE id_article = $id");
  //redirection vers la page liste_article.php
  header("Location:liste_article.php")
?>

