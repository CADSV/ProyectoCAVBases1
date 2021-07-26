<?php

require_once("../../data/classes/formSanitizer.php");
require_once("../../data/config.php");
require_once("../../data/containers/profileContainer.php");
require_once("../../data/account/profileAccount.php");
require_once("../../data/classes/constants.php");

if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../../index.php");
}

    $username = $_SESSION["userLoggedIn"];

    $profileContainer = new ProfileContainer($connection);
    $profileAccount= new ProfileAccount($connection);

    if(isset($_POST["submitButton"])){
        $profileName = FormSanitizer::sanitizeFormProfileName($_POST["profileName"]); 
        $profilePhoto = $_POST["profilePhoto"];

        $success = $profileAccount->registerProfile($username, $profileName, $profilePhoto);

        if($success) {
            header("Location: selectProfile.php"); // Si la inserción del usuario en la base de datos fue exitosa, continuamos a selectProfile
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
    <title>Crea Tu Perfil</title>
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
        <div class = "containerC">
            <div class = "question">
                <h1>Crear Nuevo Perfil</h1>
            </div>

            <div class = "dataForm">
                    <form method="POST"> 
                        <?php echo $profileAccount->getError(Constants::$profileNameLength);?>
                        <input type="text" name="profileName" placeholder="Nombre del Perfil" required>
                        <div class = "question">
                            <h4>Selecciona una imagen de perfil</h4>
                        </div>
                        <div class = "profilesSelection">
                            <?php echo $profileContainer->showAllProfiles($username, 3); ?>
                        </div>
                        <div class="inputContainer">
                            <div class = "buttonContainer">
                                <a href="selectProfile.php" alt = "Cancelar">Cancelar</a>
                            </div>
                            <input type="submit" name="submitButton" value="Crear">
                        </div>
                    </form>
            </div>


            
        </div>

    </section>


</body>
</html>