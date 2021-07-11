<?php
error_reporting(E_ALL ^ E_WARNING);
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
        $phoneNumber = $_POST["phoneNumber"];
        $gender = $_POST["gender"];
        $city = $_POST["city"];

        $success = $registerAccount->register($name, $lastName, $username, $email, $email2, $password, $password2, $phoneNumber, $gender, $city);

        if($success) {
            // Guardaremos la sesión aquí
            header("Location: register3.php"); // Si la inserción del usuario en la base de datos fue exitosa, continuamos a register3
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
                    <p>PASO 1 DE 3</p>
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

                        <div class = "dropdowns">
                            <div class = "genderDropdown">
                                <label class = "titleLabel" for="gender">Elige un género:</label>
                                <select class = "dropdown" id="gender" name="gender" required>
                                    <option value="">Elige</option>
                                    <option value="M">Hombre</option>
                                    <option value="F">Mujer</option>
                                    <option value="N/A">N/A</option>                                   
                                </select>
                            </div>

                            <div class = "cityDropdown">
                                <label class ="titleLabel" for="city">Elige tu ciudad:</label>
                                <select class = "dropdown" id="city" name="city" required>
                                    <option value="">Elige</option>
                                    <optgroup label="Alemania">
                                        <option value="14">Berlín</option>
                                        <option value="16">Köln</option>
                                        <option value="15">Münich</option>
                                    </optgroup>
                                    <optgroup label="Bélgica">
                                        <option value="5">Bruselas</option>
                                        <option value="6">Charleroi</option>
                                        <option value="7">Vlamerting</option>
                                    </optgroup>
                                    <optgroup label="Colombia">
                                        <option value="17">Bogotá</option>
                                        <option value="18">Cali</option>
                                        <option value="19">Medellín</option>
                                    </optgroup>
                                    <optgroup label="Corea del Norte">
                                        <option value="30">Kaesong</option>
                                        <option value="29">Piongyang</option>
                                        <option value="31">Sinuiju</option>
                                    </optgroup>
                                    <optgroup label="Cuba">
                                        <option value="28">Cienfuegos</option>
                                        <option value="26">La Habana</option>
                                        <option value="27">Varadero</option>
                                    </optgroup>
                                    <optgroup label="Francia">
                                        <option value="10">Lyon</option>
                                        <option value="9">Montpellier</option>
                                        <option value="8">París</option> 
                                    </optgroup>
                                    <optgroup label="Italia">
                                        <option value="12">Milán</option>
                                        <option value="11">Roma</option>
                                        <option value="13">Venecia</option>
                                    </optgroup>
                                    <optgroup label="Líbano">
                                        <option value="23">Beirut</option>
                                        <option value="25">Sidón</option>
                                        <option value="24">Tripoli</option>
                                    </optgroup>
                                    <optgroup label="Portugal">
                                        <option value="21">Funchal</option>
                                        <option value="20">Lisboa</option>
                                        <option value="22">Porto</option>
                                    </optgroup>
                                    <optgroup label="Venezuela">
                                        <option value="3">Barquisimeto</option>
                                        <option value="2">Caracas</option>
                                        <option value="4">Valencia</option>
                                    </optgroup>
                                    <option value="1">Otra</option>
                                </select>
                            </div>

                        </div>

                        <?php echo $registerAccount->getError(Constants::$emailsDontMatch);?>   <!-- Los correos no coinciden-->
                        <?php echo $registerAccount->getError(Constants::$emailInvalid);?>      <!-- Correo invalido-->
                        <?php echo $registerAccount->getError(Constants::$emailTaken);?>        <!-- Correo Ocupado-->
                        <input type="email" name="email" placeholder="Correo electrónico" required>

                        <input type="email" name="email2" placeholder="Confirmar correo electrónico" required>

                        <?php echo $registerAccount->getError(Constants::$passwordLength);?> 
                        <?php echo $registerAccount->getError(Constants::$passwordsDontMatch);?> 
                        <input type="password" name="password" placeholder="Contraseña" required>

                        <input type="password" name="password2" placeholder="Confirmar contraseña" required>
                        
                        <?php echo $registerAccount->getError(Constants::$phoneNumberincorrect);?> 
                        <input type="number" name="phoneNumber" placeholder="Numero de teléfono" required>

                        <input type="submit" class="buttonContainer" name="submitButton" value="Continuar">

                    </form>
                </div>

            </div>
        </section>

    </body>

</html>