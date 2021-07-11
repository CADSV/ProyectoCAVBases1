<?php

require_once("../../data/config.php");


if (!isset($_SESSION["userLoggedIn"])){
    header("Location: register1.php");
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" 
        content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
    <title>Registro 3</title>
    <link rel="stylesheet" type="text/css" href="../../assets/style/registerStyle.css">
</head>
<body>
    <div class="wrapper">

        <header>
            <div class="login-header">
                <a href="../../index.php"> 
                    <img src="../../assets/images/logo.png" title="Logo" alt="Logo de la página"> 
                </a>          
            </div>
            <nav class = "login">
                <a href="../login/login.php">Inicia Sesión</a>
            </nav>
        </header>
        <div class = "line"></div>
    </div>
        <section>
            <div class = "container">
                <div class = "logo">
                    <img src="../../assets/images/lock.png" title="candado" alt="candado">
                </div>
                <div class = "title">
                    <p>PASO 3 DE 3</p>
                </div>
                <div class = "subtitle">
                    <p>Configura tu pago</p>
                </div>
                <div class = "text">
                    <p>Tu mes gratis empieza en cuanto configures el pago.</p>
                    <p>Sin compromisos.</p>
                    <p>Cancela online cuando quieras.</p>
                </div>
                <div class = "buttonContainer">
                    <div class = "marginbutton">
                        <a href="register6.php">Continuar</a>
                    </div>
                </div>
            </div>
        </section>
    
</body>
</html>

