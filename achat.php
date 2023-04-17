<?php
session_start();
$_SESSION["login"]="amen";
$login = $_SESSION["login"];
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
    <title>Achat</title>
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
            
       

       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
            $quantite_achat = $_POST['quantite'];
            $adr = $_POST['addresse'];
            $phone = $_POST['phone_number'];

            //requête de modification
               $req = $con->query("INSERT INTO achat (id_article, quantite_achat, adress_achat,login,phone_number) VALUES ($id_article, $quantite_achat, '$adr','$login','$phone')");
                //echo "INSERT INTO achat (id_article, quantite_achat, adress_achat,login,phone_number) VALUES ($id_article, $quantite_achat, '$adr','$login','$phone')";
           
       }
    
    ?>

    <div class="form">
        <a href="liste_article.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="w3-center">Commander l'article : <?=$row['nom_article']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>

         <form action="" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
  
            <div class="w3-row w3-section">
               <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-file-text"></i> Description</span></label>
            </div>
            
            <p style="color: black;"> <?php echo $description?> </p>
            <div class="w3-row w3-section">
               <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-money"></i> Prix article</span></label>
             </div>

             <p style="color: black;"> <?php echo $prix?> DT</p>

             
             
            <div class="w3-row w3-section">
               <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-sort-amount-desc"></i> Quantite</span></label>
               <div class="w3-rest">
                 <input class="w3-input w3-border" id="quantite" name="quantite" type="number" placeholder="Quantite" required>
               </div>
            </div>

            <div class="w3-row w3-section">
               <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-cubes"></i> Total</span></label>
             </div>
            
             <span style="color: black;" id="output"> 0 DT</span>
           
             <div class="w3-row w3-section">
               <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-truck"></i> Adresse</span></label>
               <div class="w3-rest">
                 <input class="w3-input w3-border" name="addresse" type="text" placeholder="addresse" required>
               </div>
             </div>

             <div class="w3-row w3-section">
               <label><span style="font-weight: bold;"><i class="w3-xxlarge fa fa-phone"></i> Téléphone</span></label>
               <div class="w3-rest">
                 <input class="w3-input w3-border" id="phone_number" name="phone_number" type="number" min="10000000" max="99999999" placeholder="Numéro de téléphone" required>
               </div>
            </div>
             
            <input type="submit" value="Commander" name="button">

        </form>	


    </div>
</body>


<script>
    const quantite = document.getElementById('quantite');
    const output = document.getElementById('output');
    const multiplier = <?php echo $prix ?>;
    
    quantite.addEventListener('keyup', () => {
      const inputValue = quantite.value;
      const result = inputValue * multiplier;
      const resultStr = result + " DT";
      output.textContent = resultStr;
    });
</script>
</html>