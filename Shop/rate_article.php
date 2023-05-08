<?php
session_start();
/*$_SESSION["role"]="azdmin";
$_SESSION["login"]="amen";
$login = $_SESSION["login"];*/
$idUser = $_SESSION['id_user'];



?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/png" href="assets/logo.png" />

    </head>
    <body>
    <div>
    <?php
             if($_SESSION['role'] == 1) {
              include("menu_new.php");}
              if($_SESSION['role'] != 1) {
    
                include("menu.php");}    
    ?>
<?php
    if($_SESSION['role'] == 1) {

        echo "<a href='ajouter.php' class='Btn_add'> <img src='images/plus.png'></a>";

        echo "<a href='generate_pdf.php'> <img src='assets/pdf.png' width=60 style='margin-left: 95%; margin-top: -5%;'></a>";
      
      }
?>
<main id="main" class="main">

  </form><br>



  
    <section class="section-articles">
    <div class="container grid grid--3-cols margin-right-md">
    
    

            <?php
                include("connectionDB.php");
                
                
                
                $id = $_GET['id'];

                $sql = "SELECT * FROM article WHERE id_article = $id";
                
              
                foreach ($con->query($sql) as $row) {
                    $id = $row['id_article'];
                    $article = $row['nom_article'];
                    $description = $row['description'];
                    $prix = $row['prix'];
                    $marque = $row['marque'];
                    $file_name = $row['filename'];
                    if($_SESSION['role'] == 1) {

                      echo "<div class='article'>
                      <img src='uploads/$file_name' style='max-width: 40%; max-height:60%; margin-left: 30%;'/>
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
                    else{echo "<div class='article' data-id='$id'>
                    
                    <img src='uploads/$file_name'/>
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

                      if($_SESSION['role'] != 1) {
                        
                        $rate = 1; 
                        $sql = "SELECT * FROM rating WHERE id_user = '$idUser'";
                        
                        foreach ($con->query($sql) as $row) {
                            $rate = $row['rate'];
                            $idArticle = $row['id_article'];

                        }
                        



                          
                       
                        
                      
                        // Add star rating system
                        switch($rate) {
                          case 1:
                            echo '<div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" checked/>
                            <label for="star1" title="text">1 star</label>
                          </div>';
                            break;
                            case 2:
                              echo '<div class="rate">
                          <input type="radio" id="star5" name="rate" value="5" />
                          <label for="star5" title="text">5 stars</label>
                          <input type="radio" id="star4" name="rate" value="4" />
                          <label for="star4" title="text">4 stars</label>
                          <input type="radio" id="star3" name="rate" value="3" />
                          <label for="star3" title="text">3 stars</label>
                          <input type="radio" id="star2" name="rate" value="2" checked/>
                          <label for="star2" title="text">2 stars</label>
                          <input type="radio" id="star1" name="rate" value="1" />
                          <label for="star1" title="text">1 star</label>
                        </div>';
                            break;
                          case 3:
                            echo '<div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" checked/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                        </div>';
                            break;  
                          case 4:
                            echo '<div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" checked/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                        </div>';
                            break;
                          case 5:
                            echo '<div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" checked/>
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                        </div>';
                            break;
                        }

                      }
                      
                    
                      if($_SESSION['role'] ==1) {
                        echo "<li class='article-attribute'>
                          <span><a href='modifier.php?id=$id'><img style='height:25px;' src='images/pen.png'></a></span>
                          <a href='supprimer.php?id=$id'><img style='height:25px;' src='images/trash.png' onclick=\"return confirm('Vous voulez vraiment supprimer cet article ?');\"></a>
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


    <script>

const articles = document.querySelectorAll('.article');
    articles.forEach(article => {

    const radioInputs = document.querySelectorAll('input[name="rate"]');
    radioInputs.forEach(input => {
      input.addEventListener('click', () => {
        const rate = input.value;
        const articleId = article.dataset.id
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'rating.php');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = () => {
          // handle server response
          console.log(xhr.responseText);
        };
        xhr.send(`rate=${rate}&id_article=${articleId}`);
      });
    });
    });



    document.getElementById('pdfBtn').addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'generate_pdf.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                window.open('generated_pdf.pdf');
            }
        };
        xhr.send('generate_pdf=true');
    });
  </script>
</html>

