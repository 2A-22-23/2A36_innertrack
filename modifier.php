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
        include_once "menu.php";
        
        //on récupère le id dans le lien
         $id = $_GET['id'];

        $sql = "SELECT * FROM article WHERE id_article = $id";
        
        foreach ($con->query($sql) as $row)
            {
                $id_article = $row['id_article'];
                $nom_article = $row['nom_article'];
                $description = $row['description'];
                $prix = $row['prix'];
                $quantite = $row['quantite'];
                $marque = $row['marque'];
                $reference = $row['ref'];
            }


          //requête pour afficher les infos d'un article
          //$req = $con->query("SELECT * FROM article WHERE id_article = $id");
          //$row = $req->fetch(PDO::FETCH_ASSOC);

       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($_POST["nom_article"]) &&isset($_POST["description"]) &&isset($_POST["prix"]) &&isset($_POST["quantite"]) &&isset($_POST["marque"])){
            //requête de modification
               
               $req = $con->query("UPDATE article SET nom_article = '$nom_article' , description = '$description' , prix = '$prix', prix = '$quantite', marque = '$marque' WHERE id_article = $id_article");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: liste_article.php");
                }else {//si non
                    $message = "Article non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>

    <div class="form">
        <a href="liste_article.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="w3-center">Modifier l'article : <?=$row['nom_article']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>

         <form action="" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
  
  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-shopping-bag"></i> Nom_article</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" value="<?php echo $nom_article?>" name="nom_article" type="text" placeholder="Nom article">
    </div>
  </div>

  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-file-text"></i> Description</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" value="<?php echo $description?>" name="description" type="text" placeholder="Description">
    </div>
  </div>

  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-money"></i> Prix</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" value="<?php echo $prix?>" name="prix" type="number" placeholder="Prix">
    </div>
  </div>

  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-sort-amount-desc"></i> Quantite</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" value="<?php echo $quantite?>" name="quantite" type="number" placeholder="Quantite">
    </div>
  </div>

  <div class="w3-row w3-section">
    <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-trademark"></i> Marque</span></label>
    <div class="w3-rest">
      <input class="w3-input w3-border" value="<?php echo $marque?>" name="marque" type="text" placeholder="Marque">
    </div>
  </div>

  <input type="submit" value="Modifier" name="button">

</form>

    </div>
</body>
</html>