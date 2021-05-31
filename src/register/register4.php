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
        <title>Bienvenid@ a Carlevix</title>
        <link rel="stylesheet" type="text/css" href="../../assets/style/loginStyle.css"/>
    </head>
    <body>
        <div class="signInContainer">
            <div class="column">

                <div class="header">
                    <img src="../../assets/images/logo.png" title="Logo" alt="Logo de la página"> <!-- title provee una especie de tooltip, que al poner el cursor encima de la imagen revela un texto, esto ayuda a la accesibilidad, al igual que alt cuando la imagen no cargue -->
                    <h3>Regístrese</h3>
                    <span>para continuar a Carlevix</span>
                </div>

                <form method="POST"> <!-- El método post sirve para enviar datos -->

                    <?php echo $registerAccount->getError(Constants::$nameLength);?>
                    <input type="text" name="name" placeholder="Nombre(s)" required> <!-- required hace que sea necesario llenar el campo antes de enviar -->

                    <?php echo $registerAccount->getError(Constants::$lastNameLength);?>
                    <input type="text" name="lastName" placeholder="Apellido(s)" required>
                    
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

                    <input type="submit" class="button" name="submitButton" value="ENVIAR">

                </form>

                <a href="../../src/login/login.php" class="signInMessage">¿Ya estás registrado? Inicia sesión aquí</a>

            </div>

        </div>

    </body>

</html>