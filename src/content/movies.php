<?php

require_once("../../data/config.php");
require_once("../../data/providers/previewProvider.php");
require_once("../../data/providers/contentProvider.php");
require_once("../../data/containers/categoryContainer.php");
include_once("navBar.php");
require_once("content.php");
require_once("header.php");


if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../../index.php");
}

if (!isset($_SESSION["IdProfile"])){
    header("Location: ../profile/selectProfile.php");
}

$IdProfile = $_SESSION["IdProfile"];

$userLoggedIn = $_SESSION["userLoggedIn"];
$preview = new PreviewProvider($connection, $userLoggedIn);
echo $preview->createPreviewVideo(null, 2);

$categories = new CategoryContainer($connection, $IdProfile);
echo $categories->showCategories(2);

?>
    <!DOCTYPE html>
    <html lang='es'>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport"
                content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
            <title>Carlevix</title>
            <link rel="stylesheet" type="text/css" href="../../assets/style/contentStyle.css"/> 
            <script src="https://kit.fontawesome.com/06a651c8da.js" crossorigin="anonymous"> </script>

        </head>
        <body>
            <div class="wrapper">

              
            </div>
        </div>   
    </html>         

       
