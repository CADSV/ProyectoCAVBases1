<?php

require_once("../../data/config.php");
require_once("../../data/providers/previewProvider.php");
require_once("../../data/providers/contentProvider.php");
require_once("../../data/containers/categoryContainer.php");
require_once("content.php");
//include_once("navBar.php");

if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../register/register1.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];
//$preview = new previewprovider($connection, $userLoggedIn);
//echo $preview->createPreviewVideo(null);

?>



<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
        <title>Carlevix</title>
        <link rel="stylesheet" type="text/css" href="../../assets/style/contentStyle.css"/> <!-- el "../" sirve para regresar a un directorio superior, se puede colocar tantas veces sea necesario -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="../../assets/js/script.js"> </script>
    </head>
    <body>
        <div class='headerWrapper'>

        </div>
