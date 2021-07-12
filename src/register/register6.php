<?php
error_reporting(E_ALL ^ E_WARNING);
require_once("../../data/classes/formSanitizer.php");
require_once("../../data/config.php");
require_once("../../data/account/suscriptionAccount.php");
require_once("../../data/classes/constants.php");

    if (!isset($_SESSION["userLoggedIn"])){
        header("Location: register1.php");
    }

    $suscriptionAccount= new SuscriptionAccount($connection);

    if(isset($_POST["submitButton"])) { // Si el botón Enviar es presionado, entonces...
       
        $name = FormSanitizer::sanitizeFormString($_POST["name"]);  //Validacion del nombre. 
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $avenueStreet = FormSanitizer::sanitizeFormString($_POST["avenueStreet"]);  //Validacion del nombre. 
        $buildingHouse = FormSanitizer::sanitizeFormString($_POST["buildingHouse"]);
        $cardnumber = $_POST["cardnumber"];
        $postalcode = $_POST["postalCode"];
        $cvv = $_POST["cvv"];
        $expiredate = $_POST["expiredate"];

        $username = $_SESSION["userLoggedIn"];
        $IdMembership = $_SESSION["IdMembership"];

        $success= $suscriptionAccount->suscription($name, $lastName, $cardnumber,$avenueStreet, $buildingHouse, $postalcode, $cvv, $expiredate, $username, $IdMembership);

        if($success) {
            echo '<script language="javascript">alert("Se ha registrado y suscrito exitosamente. ¡Bienvenid@ a Carlevix!");window.location.href="../profile/select_profile.php"</script>';
            // header("Location: ../profile/select_profile.php"); // Si la inserción del usuario en la base de datos fue exitosa, continuamos a register3
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

                        <?php echo $suscriptionAccount->getError(Constants::$nameLength);?>
                        <input type="text" name="name" placeholder="Nombre" required> <!-- required hace que sea necesario llenar el campo antes de enviar -->

                        <?php echo $suscriptionAccount->getError(Constants::$lastNameLength);?>
                        <input type="text" name="lastName" placeholder="Apellido" required>
                        
                        <?php echo $suscriptionAccount->getError(Constants::$InvalidCardNumber);?>
                        <?php echo $suscriptionAccount->getError(Constants::$cardTaken);?>
                        <input type="number" name="cardnumber" placeholder="Numero de la tarjeta"  required>

                        <div class= "date">
                              
                                
                            <input type="number"  name="cvv" placeholder="CVV" id="cvv" min="000" max="999" required>
                            <label class ="titleLabel" for="expiredate">Fecha de vencimiento de la tarjeta:</label>

                            <input type="date" name="expiredate" placeholder="Fecha de vencimiento" min="2021-05-01" max="2030-12-01" id="expiredate" required>
                        </div>
                       


                        
                        <div class = "text">
                            <p>Dirección de facturamiento</p>
                        </div>
                        <input type="number" name="postalCode" placeholder="Código postal" required>
                        <input type="text" name="avenueStreet" placeholder="Avenida o calle" required>
                        <input type="text" name="buildingHouse" placeholder="Nombre de edificio o casa" required>
                        
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
