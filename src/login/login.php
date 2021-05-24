<?php
    if(isset($_POST["botonEnviar"])) { // Si el botón Enviar es presionado, entonces...
        echo "El formulario ha sido enviado con éxito";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenido a Carlevix</title>
        <link rel="stylesheet" type="text/css" href="../../assets/style/style.css"/>
    </head>
    <body>
        <div class="signInContainer">
            <div class="column">

                <div class="header">
                    <img src="../../assets/images/logo.png" title="Logo" alt="Logo de la página"> <!-- title provee una especie de tooltip, que al poner el cursor encima de la imagen revela un texto, esto ayuda a la accesibilidad, al igual que alt cuando la imagen no cargue -->
                    <h3>Inicia sesión</h3>
                    <span>para continuar a Carlevix</span>
                </div>

                <form method="POST">

                    <input type="text" name="nombreUsuario" placeholder="Nombre de usuario" required>

                    <input type="password" name="contraseña" placeholder="Contraseña" required>

                    <input type="submit" class="button" name="botonIniciarSesion" value="Iniciar sesión">

                </form>

                <a href="../../src/register/register.php" class="signUpMessage">¿No estás registrado? Regístrate aquí</a>

            </div>

        </div>

    </body>

</html>