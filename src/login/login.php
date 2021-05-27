<?php
    if(isset($_POST["botonEnviar"])) { // Si el botón Enviar es presionado, entonces...
        echo "El formulario ha sido enviado con éxito";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenido a Carlevix</title>
        <link rel="stylesheet" type="text/css" href="../../assets/style/loginStyle.css"/> <!-- el "../" sirve para regresar a un directorio superior, se puede colocar tantas veces sea necesario -->
    </head>
    <body>
        <div class="wrapper">
            <div class="background">
                <img src="../../assets/images/loginBackground.jpg" title="Imagen de fondo" alt="Cartelera multimedia, imagen de fondo">
            </div>
            <div class="login-header">
                <a href="../../index.php"> 
                    <img src="../../assets/images/logo.png" title="Logo" alt="Logo de la página"> <!-- title provee una especie de tooltip, que al poner el cursor encima de la imagen revela un texto, esto ayuda a la accesibilidad, al igual que alt cuando la imagen no cargue -->
                </a>          
            </div>
            <div class="signInContainer">
                <div class="column">

                    <div class="header">
                        <h1>Inicia sesión</h1>
                    </div>

                    <form method="POST">

                        <input type="text" name="username" placeholder="Nombre de usuario, o Email" required>

                        <input type="password" name="password" placeholder="Contraseña" required>

                        <input type="submit" class="button" name="botonIniciarSesion" value="Iniciar sesión">

                    </form>

                    <a href="../../src/register/register.php" class="signUpMessage">¿No estás registrado? Regístrate aquí</a>
                    
                </div>
            </div>
        </div>
    </body>
</html>