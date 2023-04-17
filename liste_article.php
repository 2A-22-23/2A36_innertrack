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
    ?>
<?php
    if($_SESSION['role'] == 'admin') {

        echo "<a href='ajouter.php' class='Btn_add'> <img src='images/plus.png'></a>";}
?>
<main>
<?php


?>

  
    <section class="section-articles">
    <div class="container grid grid--3-cols margin-right-md">
    

            <?php
                include("connectionDB.php");
                $test=5;
                $sql = 'SELECT * FROM article';
                
                foreach ($con->query($sql) as $row) {
                    $id = $row['id_article'];
                    $article = $row['nom_article'];
                    $description = $row['description'];
                    $prix = $row['prix'];
                    $marque = $row['marque'];
                    $reference = $row['ref'];
                    if($_SESSION['role'] == 'admin') {

                      echo "<div class='article'>
                      <img src='assets/$reference'/>
                      <div class='article-content'>
                        <div class='article-tags'>
                          <span class='tag tag--vegetarian'>$marque</span>
                        </div>
                        <p class='article-title'>$article</p>
                        <ul class='article-attributes'>
                          
                          <li style=margin-top:-7%;' class='article-attribute'>
                
                            <span><strong>$prix DT</strong></span>
                          </li>
                          <li class='article-attribute'>
                            <span>$description</span>
                          </li>";                    
                    }
                    else{echo "<div class='article'>
                    
                    <img src='assets/$reference'/>
                    <div class='article-content'>
                      <div class='article-tags'>
                        <span class='tag tag--vegetarian'>$marque</span>
                      </div>
                      <p class='article-title'>$article</p>
                      <ul class='article-attributes'>
                        
                        <li style=margin-top:-7%;' class='article-attribute'>
              
                          <span><strong>$prix DT</strong></span>
                        </li>
                        <li class='article-attribute'>
                          <span>$description</span>
                        </li>";
                      }       

                      if($_SESSION['role'] != 'admin') {
                          
                        echo "<li class='article-attribute'>
                        <span><a href='achat.php?id=$id'><img style='height:25px;' src='images/chariot.png'></a></span>";}
                        
                      
                      

                        if($_SESSION['role'] == 'admin') {
                          
                          echo "<li class='article-attribute'>
                            <span><a href='modifier.php?id=$id'><img style='height:25px;' src='images/pen.png'></a></span>
                            <a href='supprimer.php?id=$id'>
                            <img style='height:25px;' src='images/trash.png' onclick=\"return confirm('Vous voulez vraiment supprimer cet article ?');\"></a></td>
                          </li>";
                        }
                        echo ' </ul>
                        </div>
                      </div>';
                      
                    
                }
            ?>






        </div>
    </section>


    
    </main>
    
    

    
    </body>
</html>

