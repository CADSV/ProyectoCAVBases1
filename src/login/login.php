<?php
error_reporting(E_ALL ^ E_WARNING);
require_once("../../data/classes/formSanitizer.php");
require_once("../../data/config.php");
require_once("../../data/account/loginAccount.php");
require_once("../../data/classes/constants.php");

    $loginAccount= new loginAccount($connection);

    if(isset($_POST["botonIniciarSesion"])) { // Si el botón Enviar es presionado, entonces...
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

        $success = $loginAccount->login($username, $password);

        if($success) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: ../profile/selectProfile.php"); // Si la inserción del usuario en la base de datos fue exitosa, continuamos a register3
        }
    }
?>

<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
        <title>Bienvenido a Carlevix</title>
        <link rel="stylesheet" type="text/css" href="../../assets/style/loginStyle.css"/> <!-- el "../" sirve para regresar a un directorio superior, se puede colocar tantas veces sea necesario -->
        <script type="text/javascript" src="login.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="background">
                <img src="../../assets/images/loginBackground.jpg" title="Imagen de fondo" alt="Cartelera multimedia, imagen de fondo">
            </div>
            <div class="login-header">
                <a href="../../index.php"> 
                    <img src="../../assets/images/logo.png" title="Logo" alt="Logo de la página" class = "carlevixLogo"> <!-- title provee una especie de tooltip, que al poner el cursor encima de la imagen revela un texto, esto ayuda a la accesibilidad, al igual que alt cuando la imagen no cargue -->
                </a>          
            </div>
            <div class="signin-container">
                <div class="column">

                    <div class="header">
                        <h1>Inicia sesión</h1>
                    </div>

                    <form method="POST">
                        <?php echo $loginAccount->getError(Constants::$loginFailed);?>
                        <div class="input-container">
                            <input type="text" name="username" placeholder="Nombre de usuario" required>
                        </div>
                        
                        <div class="input-container">
                            <input type="password" name="password" placeholder="Contraseña" id="pwd" required>
                            <div id="eyeButton" class="eyeButton">
                                <img src="../../assets/images/eye_outline_visibility_white_24dp.png" alt="Mostrar" id="eyeImage" class="eyeImage"/>
                            </div>     
                        </div>
                        <input type="submit" class="button" name="botonIniciarSesion" value="Iniciar sesión">

                    </form>

                    <a href="../../src/register/register1.php" class="signUpMessage">¿No estás registrado? Regístrate aquí</a>
                    
                </div>
            </div>
        </div>
    </body>
</html>
