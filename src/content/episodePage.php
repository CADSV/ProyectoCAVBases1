<?php

require_once("../../data/config.php");
require_once("../../data/providers/previewProvider.php");
require_once("../../data/providers/contentProvider.php");
require_once("../../data/containers/categoryContainer.php");
require_once("../../data/containers/seasonContainer.php");
//include_once("navBar.php");
require_once("header.php");

/*if(!isset($_GET["IdContent"]) || !isset($_GET["IdSeason"]) || !isset($_GET["IdEpisode"])){ // Si no se especifica algún id redirecciona a Home
    header("Location: home.php");
}*/

if(!isset($_GET["IdSeason"])){
    $IdSeason=1;
    $IdEpisode=1;
}else{
    $IdSeason= $_GET["IdSeason"];
    $IdEpisode = $_GET["IdEpisode"];
}



$IdContent = $_GET["IdContent"];

$IdProfile = $_SESSION["IdProfile"];


if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../../index.php");
}

if (!isset($_SESSION["IdProfile"])){
    header("Location: ../profile/selectProfile.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];

$preview = new PreviewProvider($connection, $userLoggedIn);
$content = new Content($connection, $_GET["IdContent"]);
$content->updateHasseen($IdProfile, $IdContent);
$content->updateHasseenOf($IdProfile, $IdContent);
//echo $preview->createPreviewVideo($IdContent);
$video='../../'.$content->getEpisodeVideo($IdContent, $IdSeason, $IdEpisode);

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
            
            <div class="watchContainer">

            <div class="videoControls watchNav">
                <button class="iconButton" onclick="goBack(<?php echo $content->getId();?>)">  <i class="fas fa-arrow-left"></i>  </button>
                <h1> <?php echo $content->getTitleCont().' T:'.$IdSeason.' E:'.$IdEpisode;?>            </div> 
            
            <video autoplay controls  '>
                        <source src ='<?php echo $video;?>' type ='video/mp4'>
            </video>
                
            </div>

              
            
    </html>   

    <script>
        initVideo()

    </script>