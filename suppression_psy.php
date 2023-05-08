<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Suppression du psychiatre </h1>

    <?php

						$con = mysqli_connect('localhost', 'root', '');
							if(!$con){
								echo "base de donnée introuvable";
								}
							if (!mysqli_select_db($con, 'projet_web')){
								echo "base de donnée introuvable";
								}

						     $sql2 = "DELETE from psychiatres
                                where numtel_psy = " . $_GET['Numtel_psy'] . "
                                ";

								$result1 = mysqli_query($con,$sql2);

							 if (!$result1){
							 echo "erreur de l'execution de la requete";
							} 
							else 
							{ echo "la suppression a été faite";}  
								?>


						
</body>
</html>



