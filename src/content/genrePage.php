<?php

require_once("../../data/config.php");
require_once("../../data/providers/previewProvider.php");
require_once("../../data/providers/contentProvider.php");
require_once("../../data/containers/categoryContainer.php");
include_once("navBar.php");
require_once("header.php");

if(!isset($_GET["id"])){ // Si no se especifica el id redirecciona a Home
    header("Location: home.php");
}

$IdGenre = $_GET["id"];

if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../../index.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];

$preview = new PreviewProvider($connection, $userLoggedIn);
echo $preview->createPreviewVideo(null);

$categories = new CategoryContainer($connection, $userLoggedIn); // Después mostrar el género del id aquí
echo $categories->showAllCategories(null);

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
            <script src="https://kit.fontawesome.com/2992031619.js" crossorigin="anonymous"></script>

        </head>
        <body>
            <div class="wrapper">

              
            </div>  
    </html>   