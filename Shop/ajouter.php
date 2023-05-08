<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="assets/logo.png" />

</head>


<body>
    <?php
        include_once "connectionDB.php";
        include_once "menu_new.php";

        $sql = 'SELECT * FROM article';
                
        foreach ($con->query($sql) as $row)
            {
                $id_article = $row['id_article'];
                $nom_article = $row['nom_article'];
                $description = $row['description'];
                $prix = $row['prix'];
                $quantite = $row['quantite'];
                $marque = $row['marque'];
                $file_name = $row['filename'];
                $image = $row['image'];
            }
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($_POST["nom_article"]) &&isset($_POST["description"]) &&isset($_POST["prix"]) &&isset($_POST["quantite"]) &&isset($_POST["marque"])){
                //connexion à la base de donnée
                include_once "connectionDB.php";


               if(isset($_FILES['image'])){
                  $errors = array();
                  $file_name = $_FILES['image']['name'];
                  $file_size = $_FILES['image']['size'];
                  $file_tmp = $_FILES['image']['tmp_name'];
                  
                  
                  if(empty($errors)==true){
                      move_uploaded_file($file_tmp,"./uploads/" . $file_name);
                  }else{
                      print_r($errors);
                  }
                }
                  
                
                  








                //requête d'ajout
                $req = $con->query("INSERT INTO article (nom_article, description, prix, quantite, marque, filename) VALUES ('$nom_article', '$description', '$prix', '$quantite', '$marque', '$file_name')");
                echo $sql;
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: liste_article.php");
                }else {//si non
                    $message = "article non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?> 

        </p>
        <form action="" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" style="width: 35%;" enctype="multipart/form-data">
  
  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-shopping-bag"></i> Nom_article</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="nom_article" type="text" placeholder="Nom_article"required>
    </div>
  </div>

  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-file-text"></i> Description</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="description" type="text" placeholder="Description">
    </div>
  </div>

  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-money"></i> Prix</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="prix" type="number" placeholder="Prix"required>
    </div>
  </div>

  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-sort-amount-desc"></i> Quantite</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="quantite" type="number" placeholder="Quantite"required>
    </div>
  </div>

  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-trademark"></i> Marque</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="marque" type="text" placeholder="Marque"required>
    </div>
  </div>

  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-image"></i> Image</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="image" type="file" required>
    </div>
  </div>
  

  <input type="submit" value="Ajouter" name="button">

</form>

        
    
</body>
</html>