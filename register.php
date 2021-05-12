<?php
    if(isset($_POST["botonEnviar"])) { // Si el botón Enviar es presionado, entonces...
        echo "El formulario ha sido enviado con éxito";
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
                <form method="POST"> <!-- El método post sirve para enviar datos -->
                    <input type="text" name="nombre" placeholder="Nombre(s)" required> <!-- required hace que sea necesario llenar el campo antes de enviar -->

                    <input type="text" name="apellido" placeholder="Apellido(s)" required>

                    <input type="text" name="nombreUsuario" placeholder="Nombre de usuario" required>

                    <input type="email" name="correo" placeholder="Correo electrónico" required>

                    <input type="email" name="correo2" placeholder="Confirmar correo electrónico" required>

                    <input type="password" name="contraseña" placeholder="Contraseña" required>

                    <input type="password" name="contraseña2" placeholder="Confirmar contraseña" required>

                    <input type="submit" name="botonEnviar" value="ENVIAR">

                </form>

            </div>

        </div>

    </body>

</html>