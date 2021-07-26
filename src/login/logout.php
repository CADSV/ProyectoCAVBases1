<?php
error_reporting(E_ALL ^ E_WARNING);
require_once("../../data/classes/formSanitizer.php");
require_once("../../data/config.php");
require_once("../../data/account/loginAccount.php");
require_once("../../data/classes/constants.php");

    $loginAccount= new loginAccount($connection);
    $username = $_SESSION["userLoggedIn"];
    $Iduser=$loginAccount->getIdUser($username);
    $success=$loginAccount->UpdateSessionDuration($Iduser);
//session_start();
session_destroy();
echo '<script language="javascript">alert("Gracias por preferir Carlevix. ¡Te esperamos pronto '.$_SESSION["userLoggedIn"].'!");window.location.href="../../index.php"</script>';

// header("Location: ../../index.php");


?>