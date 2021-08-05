<?php
require_once("header.php");
if(!isset($_GET["IdContent"]) || !isset($_GET["IdSeason"]) || !isset($_GET["IdEpisode"])){ // Si no se especifica algún id redirecciona a Home
    header("Location: home.php");
}

$content = new Content($connection, $_GET["IdContent"]);
?>