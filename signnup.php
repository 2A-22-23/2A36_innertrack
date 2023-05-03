<?php
include "../config.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
    <link href="../Front/css/monsingin.css" rel="stylesheet">

</head>
<body>
    
    <div class="right_box ">

        <div class="title">
            <h2 >Welcome to InnerTrack inscription</h2>
            <a class="link " href="pages-login.php"><p>Already an account? Sign in</p></a>
           <!-- <p>Sign up to continue</p>-->
        </div>
        

        


        <form id="form" action="../front/adduser.php" method="get">
            <label for=""> Name  </label>
            <input type="text" name="name" placeholder="Enter Name" required>
                    
            
            <label for=""> Last Name  </label>
            <input type="text" name="lastname" placeholder="Enter lastName" required>

            <label for=""> Mail  </label>
            <input type="email" name="mail" placeholder="Enter mail" required>


            <table  >
                <tr id="error">

                </tr>
                <tr>
                    <th><h5>Man</h5></th>
                <th> <input class="sexein" type="checkbox" name="sexe" id="myCheck1" value="men" ></th>
                </th>
                
                 <th> <h5>Woman</h5> </th> 
                 <th> <input class="sexein"  type="checkbox" name="sexe" id="myCheck2" value="women" ></th>
                
            </table>
            <!--<table  >
                <tr id="error">

                </tr>
                <tr>
                    <th><h5>Admin</h5></th>
                <th> <input class="rolein" type="checkbox" name="role" id="myCheck3" value="1" ></th>
                </th>
                
                 <th> <h5>Patient</h5> </th> 
                 <th> <input class="rolein"  type="checkbox" name="role" id="myCheck4" value="0" ></th>
                
            </table>-->
           
            
            
       
            <label for=""> Number <p id="addnumber"></p> </label>
            <input type="number" name="number" placeholder="Enter Number" id="idnumber" required>
            
            <label for=""> Adress  </label>
            <input type="text" name="address" placeholder="Enter Address" required>

            <label for="" > Password <p id="addpass"></p>  </label>
            <input type="password" name="pass" placeholder="Enter Password" id="pass" required>

            
            <input type="password" name="cpass" placeholder="Confirm Password" id="cpass" required>

            <button class="btn " type="submit" >
                SIGN UP
             </button>
        </form>

    </div>

    <div class="left_box ">
    <img class="img-fluid rounded-circle mx-auto" src="../Front/img/signup.jpg" alt="">
    </div>
    <!-- <script src="../Controller/js/signup.js" type="text/javascript"></script>; -->
</body>
</html>