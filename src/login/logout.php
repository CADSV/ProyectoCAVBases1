<?php

session_start();
session_destroy();
echo '<script language="javascript">alert("Gracias por preferir Carlevix. ¡Te esperamos pronto '.$_SESSION["userLoggedIn"].'!");window.location.href="../../index.php"</script>';

// header("Location: ../../index.php");


?>