<?php

require_once("data/config.php");

/*if (!isset($_SESSION["userLoggedIn"])){
    header("Location: register1.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];*/

?>
    <!DOCTYPE html>
    <html lang='es'>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport"
                content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
            <title>Carlevix</title>
            <link rel="stylesheet" type="text/css" href="assets/style/headerStyle.css"/> 

        </head>
        <body>
            <div class="wrapper">

                <div class="topBar">
                    <div class="logoContainer">
                        <a href="index.php">
                        <img src="assets/images/logo.png" title="Logo" alt="Logo de la página" class = "carlevixLogo">
                        </a>

                    </div>

                    <ul class= "navLinks">
                        <li>  <a href="index.php">Home </a> </li>
                        <li>  <a href="src/content/series.php">Series </a> </li>
                        <li>  <a href="src/content/movies.php">Películas </a> </li>
                    </ul>

                    <div class="rightItems">
                         <a href="search.php">

                         </a>
                         <a href="profile/adminProfile.php.php"> 
                        
                        </a>
                    </div>

                </div>
            </div>
        </div>   
    </html>          

