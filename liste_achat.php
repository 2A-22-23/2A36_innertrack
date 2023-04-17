<?php
session_start();
$_SESSION["role"]="admin";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/png" href="assets/logo.png" />

    </head>
    <body>
    
    <?php
      include("menu.php");
      include_once "connectionDB.php";

      $sql = 'SELECT * FROM achat';          
      $rows = array();
      foreach ($con->query($sql) as $row) {
          $rows[] = $row;
      }
    ?>

<div class="form">
        <a href="liste_article.php" class="back_btn"><img src="images/back.png"> Retour</a>
</div>
<table style="margin-left: 20%;">
  <thead>
    <tr>
      <th>login</th>
      <th>article</th>
      <th>quantite</th>
      <th>adress</th>
      <th>telephone</th>
      
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      foreach ($rows as $row) {
        $id_achat = $row['id_achat'];
        $id_article = $row['id_article'];
        $quantite_achat = $row['quantite_achat'];
        $adress_achat = $row['adress_achat'];
        $login = $row['login'];
        $phone_number = $row['phone_number'];
        echo "<tr>";
        echo "<td>$login</td>";
        echo "<td>$id_article</td>";
        echo "<td>$quantite_achat</td>";
        echo "<td>$adress_achat</td>";
        echo "<td>$phone_number</td>";
        echo "</tr>";
    }?>
    </tr>
   
</main>
    
    </body>
</html>

