<?php

require_once("../../data/config.php");
require_once("../../data/providers/previewProvider.php");
require_once("../../data/providers/contentProvider.php");
require_once("../../data/containers/categoryContainer.php");
require_once("../../data/containers/seasonContainer.php");
include_once("navBar.php");
require_once("content.php");
require_once("header.php");

if(!isset($_GET["IdContent"])){ // Si no se especifica el id redirecciona a Home
    header("Location: home.php");
}

$IdContent = $_GET["IdContent"];

if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../../index.php");
}

if (!isset($_SESSION["IdProfile"])){
    header("Location: ../profile/selectProfile.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];

$preview = new PreviewProvider($connection, $userLoggedIn);
echo $preview->createPreviewVideo($IdContent);

$seasons = new SeasonContainer($connection, $userLoggedIn);
echo $seasons->showAllSeasons($IdContent);

$content = new Content($connection, $IdContent);

$categoryContainers = new CategoryContainer($connection, $userLoggedIn);
echo $categoryContainers->showCategory($content->getContentGenre(), 'Si te gustó "'. $content->getTitleCont() .'" te recomendamos:', $IdContent);

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

            <h2><?php echo 'Califica '.$content->getTitleCont();?> </h2>
            <div class = "ratingForm">
                <form method="POST"> 
                    <?php  echo '
                        <input type="radio" name="rating" value="1" id="1" required> <label for="1"> 1 estrella </label>
                        <input type="radio" name="rating" value="2" id="2"required> <label for="2"> 2 estrellas </label>
                        <input type="radio" name="rating" value="3" id="3"required> <label for="3"> 3 estrellas </label>
                        <input type="radio" name="rating" value="4" id="4"required> <label for="4"> 4 estrellas </label>
                        <input type="radio" name="rating" value="5" id="5"required> <label for="5"> 5 estrellas </label>';
                    ?>
                    <?php echo '<input class="button" type="submit" name="ratingButton" value="Calificar" required>'; ?>                  
                </form>
            </div>
              
            </div>  
    </html>   