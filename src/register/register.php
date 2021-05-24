<?php
require_once("includes/classes/FormSanitizer.php");
require_once("includes/config.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");

    $account= new Account($con);

    if(isset($_POST["botonEnviar"])) { // Si el botón Enviar es presionado, entonces...
       
        $nombre = FormSanitizer::sanitizeFormString($_POST["nombre"]);  //Validacion del nombre. 
        $apellido = FormSanitizer::sanitizeFormString($_POST["apellido"]);
        $nombreUsuario = FormSanitizer::sanitizeFormNombreUsuario($_POST["nombreUsuario"]);
        $correo = FormSanitizer::sanitizeFormCorreo($_POST["correo"]);
        $correo2 = FormSanitizer::sanitizeFormCorreo($_POST["correo2"]);
        $contrasena = FormSanitizer::sanitizeFormContrasena($_POST["contraseña"]);
        $contrasena2 = FormSanitizer::sanitizeFormContrasena($_POST["contraseña2"]);

        $account->register($nombre, $apellido, $nombreUsuario, $correo, $correo2, $contrasena, $contrasena2);
        
    

    }

    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenido a Carlevix</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
    </head>
    <body>
        <div class="signInContainer">
            <div class="column">

                <div class="header">
                    <img src="assets/images/logo.png" title="Logo" alt="Logo de la página"> <!-- title provee una especie de tooltip, que al poner el cursor encima de la imagen revela un texto, esto ayuda a la accesibilidad, al igual que alt cuando la imagen no cargue -->
                    <h3>Regístrese</h3>
                    <span>para continuar a Carlevix</span>
                </div>

                <form method="POST"> <!-- El método post sirve para enviar datos -->

                    <?php echo $account->getError(Constants::$firstnameCharacters);?>
                    <input type="text" name="nombre" placeholder="Nombre(s)" required> <!-- required hace que sea necesario llenar el campo antes de enviar -->

                    <?php echo $account->getError(Constants::$lastnameCharacters);?>
                    <input type="text" name="apellido" placeholder="Apellido(s)" required>
                    
                    <?php echo $account->getError(Constants::$usernameCharacters);?>        
                    <?php echo $account->getError(Constants::$usernameTaken);?>     <!-- Ususario Ocupado-->
                    <input type="text" name="nombreUsuario" placeholder="Nombre de usuario" required>

                    <?php echo $account->getError(Constants::$emailsDontMatch);?>   <!-- Los correos no coinciden-->
                    <?php echo $account->getError(Constants::$emailInvalid);?>      <!-- Correo invalido-->
                    <?php echo $account->getError(Constants::$emailTaken);?>        <!-- Correo Ocupado-->
                    <input type="email" name="correo" placeholder="Correo electrónico" required>

                    <input type="email" name="correo2" placeholder="Confirmar correo electrónico" required>

                    <input type="password" name="contraseña" placeholder="Contraseña" required>

                    <input type="password" name="contraseña2" placeholder="Confirmar contraseña" required>

                    <input type="submit" class="button" name="botonEnviar" value="ENVIAR">

                </form>

                <a href="src/login/login.php" class="signInMessage">¿Ya estás registrado? Inicia sesión aquí</a>

            </div>

        </div>

    </body>

</html>