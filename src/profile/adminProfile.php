<?php
require_once("../../data/config.php");


if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../../index.php");
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
    <title>Administrar perfiles</title>
    <link rel="stylesheet" href="../../assets/style/profileStyle.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <a href="../../index.php"> 
                <img src="../../assets/images/logo.png" title="Logo" alt="Logo de la página"> 
            </a> 
            <nav class = "logout">
                <a href="../login/logout.php">Cerrar Sesión</a>
            </nav>   
        </header>
    </div>

    <section>
        <div class = "container">
            <div class = "question">
                <h1>Administrar perfiles:</h1>
            </div>

            <div class = "profilesSelection">
                <div class ="adminProfile">
                    <a href="modifysuscription.php" title = "Modificar Suscripción" alt = "Modificar Suscripción">
                        <img src="../../assets/images/profiles/editYellow.png" title="Editar Perfil" alt="Editar Perfil"  class = "profilePicture">
                    </a>
                    <h2>Alejandro</h2>
                </div>

                <div class ="adminProfile">
                    <a href="modifysuscription.php" title = "Modificar Suscripción" alt = "Modificar Suscripción">
                        <img src="../../assets/images/profiles/editBlue.png" title="Editar Perfil" alt="Editar Perfil"  class = "profilePicture">
                    </a>
                    <h2>Carlos</h2>
                </div>

                <div class ="adminProfile">
                    <a href="modifysuscription.php" title = "Modificar Suscripción" alt = "Modificar Suscripción">
                        <img src="../../assets/images/profiles/editRed.png" title="Editar Perfil" alt="Editar Perfil"  class = "profilePicture">
                    </a>
                    <h2>Vicente</h2>
                </div> 

                <div class = "newProfile">
                    <img src="../../assets/images/plus.png" title="Nuevo perfil" alt="Nuevo perfil">

                </div>
            </div>


            <div class = "readyButton">
                <a href="select_profile.php" title="Listo" alt= "Listo">LISTO</a>
            </div>
        </div>

    </section>


</body>
</html>