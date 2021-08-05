<?php

require_once("../../data/config.php");
require_once("../../data/containers/profileContainer.php");


if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../../index.php");
}

    if(isset($_POST["profile"])){

        $IdProfile = $_POST["idProfile"];

        $_SESSION["IdProfile"] = $IdProfile;

        header("Location: configurateProfile.php");
    }

    $username = $_SESSION["userLoggedIn"];

    $profileContainer = new ProfileContainer($connection);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
    <title>Administrar Perfiles</title>
    <link rel="stylesheet" href="../../assets/style/profileStyle.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <a href="../../index.php"> 
                <img src="../../assets/images/logo.png" title="Logo" alt="Logo de la página"> 
            </a> 
            <div class = "rightHeader">
                <a href="../user/modifySuscription.php">
                    <img src="../../assets/images/editUserGrey.png" title="EditUser" alt="Editar usuario">   
                </a>
                <nav class = "logout">
                    <a href="../login/logout.php">Cerrar Sesión</a>
                </nav>  
            </div>  
        </header>
    </div>

    <section>
        <div class = "containerS">
            <div class = "question">
                <h1>Administrar Perfiles</h1>
            </div>

            <div class = "profilesSelection">
                <form method="POST"> 
                    <?php echo $profileContainer->showAllProfiles($username, 2); ?>
                    
                    <div class = "newProfile">
                        <a href="createProfile.php" title = "Nuevo perfil" alt = "Nuevo perfil" >
                            <img src="../../assets/images/plus.png" title="Crear Nuevo Perfil" alt="Crear Nuevo Perfil">
                        </a>
                    </div>
                </form> 
            </div>


            <div class = "readyButton">
                <a href="selectProfile.php" title="Listo" alt= "Listo">LISTO</a>
            </div>
        </div>

    </section>


</body>
</html>