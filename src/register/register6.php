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

        // echo $genre = FormSanitizer::sanitizeFormString($_POST["genre"]);
        // echo $city = FormSanitizer::sanitizeFormString($_POST["city"]);

        // $registerAccount->register($name, $lastName, $username, $email, $email2, $password, $password2);
        // Mientras no hay back.
    

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
                    <p>PASO 3 DE 3</p>
                </div>
                <div class = "subtitle">
                    <p>Configura tu tarjeta de crédito</p>
                   
                </div>
                <div class = "text">
                    <p>¡Falta poco para terminar!</p>
                </div>

                <div class = "dataForm">
                    <form method="POST"> <!-- El método post sirve para enviar datos -->

                        <?php echo $registerAccount->getError(Constants::$nameLength);?>
                        <input type="text" name="name" placeholder="Nombre" required> <!-- required hace que sea necesario llenar el campo antes de enviar -->

                        <?php echo $registerAccount->getError(Constants::$lastNameLength);?>
                        <input type="text" name="lastName" placeholder="Apellido" required>
                        
                        <?php echo $registerAccount->getError(Constants::$usernameLength);?>        
                        <?php echo $registerAccount->getError(Constants::$usernameTaken);?>     <!-- Ususario Ocupado-->
                        <input type="number" name="cardnumber" placeholder="Numero de la tarjeta" required>

                        <div class= "date">
                              
                                
                            <input type="number"  name="cvv" placeholder="CVV" id="cvv" min="000" max="999" required>
                            <label class ="titleLabel" for="expiredate">Fecha de vencimiento de la tarjeta:</label>

                            <input type="month" name="expiredate" placeholder="Fecha de vencimiento" min="2021-05" max="2030-12" id="expiredate" required>
                        </div>
                       

                        <?php echo $registerAccount->getError(Constants::$emailsDontMatch);?>   <!-- Los correos no coinciden-->
                        <?php echo $registerAccount->getError(Constants::$emailInvalid);?>      <!-- Correo invalido-->
                        <?php echo $registerAccount->getError(Constants::$emailTaken);?>        <!-- Correo Ocupado-->
                        

                        <input type="text" name="direccion" placeholder="Direccion de facturación" required>

                        <input type="number" name="phonenumber" placeholder="Numero de teléfono" required>
                        <input type="submit" class="buttonContainer" name="submitButton" value="Iniciar Suscripción">
                        
                        </form>
                </div>

                <div class = "buttons">
                    <div class = "buttonOmitir">
                        <div class = "marginbuttonGray">
                            <a href="register4.php">Cambiar Plan</a>
                        </div>
                    </div>
                   

            </div>
        </section>

    </body>

</html>