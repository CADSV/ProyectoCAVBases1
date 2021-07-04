<?php
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" 
        content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
    <title>Modificar Suscripción</title>
    <link rel="stylesheet" type="text/css" href="../../assets/style/modifysuscriptionStyle.css">
</head>
<body>
    <div class="wrapper">
        <div class="background">
        </div>
            <header>
                <div class="login-header">
                    <a href="../../index.php"> 
                        <img src="../../assets/images/logo.png" title="Logo" alt="Logo de la página"> 
                    </a>          
                </div>
                
            </header>
        
        <div class = "line"></div>
            <div class ="information-container">
                <div class = "personalinformation-container">
                    <h3>Alejandro Carlevix</h3>
                    <h3>alejandro@carlevix.com</h3> 
                    <h3>Contraseña: *********</h3>
                    <h3>Telefono: +58 412 0555556</h3>
                </div>

                <div class ="">
                    <h3>Alejandro Carlevix</h3>
                    <h3>alejandro@carlevix.com</h3> 
                    <h3>Contraseña: *********</h3>
                    <h3>Telefono: +58 412 0555556</h3>
                </div>
            </div>

        <div class = "line"></div>
        <div class="modifyplan-container">
            <div class="welcome-container">

                 <div class="text-line">
                    <h1>Informacion de plan</h1>
                </div>
                <div class="plan-container">
                    <form  action="register3.php" method=""> 
                                    <input type="radio" name="plan" value="Basico" id="Basico" required >      <label for="Basico"> Básico</label>
                                    <input type="radio" name="plan" value="Estandar" id="Estandar"required>  <label for="Estandar">Estándar </label>
                                    <input type="radio" name="plan" value="Premium" id="Premium"required>    <label for="Premium">Premium   </label>
                                    <input class="button" type="submit" name="plan" value="Cambiar plan" id="Plan"required>    <label for="Premium">   </label>                                                                 
                    </form>
                </div>
                                           
            </div>
        </div>


                

    </div>
       
    
</body>
</html>