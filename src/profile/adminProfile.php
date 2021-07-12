<?php
require_once("../../data/config.php");


if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../../index.php");
}

    $username = $_SESSION["userLoggedIn"];

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
            <div class = "rightHeader">
                <a href="">
                    <img src="../../assets/images/editUserGrey.png" title="EditUser" alt="Editar usuario">   
                </a>
                <nav class = "logout">
                    <a href="../login/logout.php">Cerrar Sesión</a>
                </nav>  
            </div>  
        </header>
    </div>

    <section>
        <div class = "container">
            <div class = "question">
                <h1>Administrar perfiles:</h1>
            </div>

            <div class = "profilesSelection">
                <div class ="adminProfile">
                    <a href="" title = "Editar Perfil" alt = "Editar Perfil">
                        <img src="../../assets/images/profiles/editYellow.png" title="Editar Perfil" alt="Editar Perfil"  class = "profilePicture">
                    </a>
                    <h2><?=$username?></h2>
                </div>

                <div class ="adminProfile">
                    <a href="" title = "Modificar Suscripción" alt = "Editar Perfil">
                        <img src="../../assets/images/profiles/editBlue.png" title="Editar Perfil" alt="Editar Perfil"  class = "profilePicture">
                    </a>
                    <h2><?=$username?>2</h2>
                </div>

                <div class ="adminProfile">
                    <a href="" title = "Editar Perfil" alt = "Editar Perfil">
                        <img src="../../assets/images/profiles/editRed.png" title="Editar Perfil" alt="Editar Perfil"  class = "profilePicture">
                    </a>
                    <h2><?=$username?>3</h2>
                </div> 

                <div class = "newProfile">
                    <a href="" title = "Nuevo perfil" alt = "Nuevo perfil" >
                        <img src="../../assets/images/plus.png" title="Nuevo perfil" alt="Nuevo perfil">
                    </a>
                </div>
            </div>


            <div class = "readyButton">
                <a href="select_profile.php" title="Listo" alt= "Listo">LISTO</a>
            </div>
        </div>

    </section>


</body>
</html>