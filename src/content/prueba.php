<?php


require_once("header.php");

//include_once("navBar.php");

if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../register/register1.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];
$preview = new previewprovider($connection, $userLoggedIn);
echo $preview->createPreviewVideo(null);

?>

