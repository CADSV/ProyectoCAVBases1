<?php
require_once("../../data/classes/formSanitizer.php");
require_once("../../data/config.php");
require_once("../../data/account/registerAccount.php");
require_once("../../data/classes/constants.php");

    $registerAccount= new RegisterAccount($connection);

    if(isset($_POST["submitButton"])) { // Si el botón Enviar es presionado, entonces...
       
        $name = FormSanitizer::sanitizeFormString($_POST["name"]);  //Validacion del nombre. 
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $registerAccount->register($name, $lastName, $username, $email, $email2, $password, $password2);
        
    

    }

    
?>

<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
        <title>Complete sus datos</title>
        <link rel="stylesheet" type="text/css" href="../../assets/style/registerStyle.css"/>
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
                <div class = "title">
                    <p>PASO 2 DE 3</p>
                </div>
                <div class = "subtitle">
                    <p>Crea un usuario para que empieces tu</p>
                    <p>experiencia Carlevix.</p>
                </div>
                <div class = "text">
                    <p>¡Unos pasos más y listo!</p>
                </div>

                <div class = "dataForm">
                    <form method="POST"> <!-- El método post sirve para enviar datos -->

                        <?php echo $registerAccount->getError(Constants::$nameLength);?>
                        <input type="text" name="name" placeholder="Nombre" required> <!-- required hace que sea necesario llenar el campo antes de enviar -->

                        <?php echo $registerAccount->getError(Constants::$lastNameLength);?>
                        <input type="text" name="lastName" placeholder="Apellido" required>
                        
                        <?php echo $registerAccount->getError(Constants::$usernameLength);?>        
                        <?php echo $registerAccount->getError(Constants::$usernameTaken);?>     <!-- Ususario Ocupado-->
                        <input type="text" name="username" placeholder="Nombre de usuario" required>

                        <?php echo $registerAccount->getError(Constants::$emailsDontMatch);?>   <!-- Los correos no coinciden-->
                        <?php echo $registerAccount->getError(Constants::$emailInvalid);?>      <!-- Correo invalido-->
                        <?php echo $registerAccount->getError(Constants::$emailTaken);?>        <!-- Correo Ocupado-->
                        <input type="email" name="email" placeholder="Correo electrónico" required>

                        <input type="email" name="email2" placeholder="Confirmar correo electrónico" required>

                        <input type="password" name="password" placeholder="Contraseña" required>

                        <input type="password" name="password2" placeholder="Confirmar contraseña" required>

                        <input type="submit" class="buttonContainer" name="submitButton" value="Continuar">

                    </form>
                </div>

            </div>
        </section>

    </body>

</html>