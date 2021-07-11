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
                <nav class = "login">
                    <a href="adminProfile.php">Volver a perfil</a>
                 </nav>
                
            </header>
        
        <div class = "line"></div>       

            <div class="text-line">
                <h1>Informacion de suscripción</h1>
            </div>

            <div class="edit-container">  
                             
                <form  action="register3.php" method="">                            
                    <input class="buttonEdit" type="submit" name="plan" value="Guardar" id="Plan"required>    <label for="Premium">   </label>                                                                                            
                </form>
                <div class = "buttonCancel">
                     <a href="../../index.php">Cancelar</a>                                          
                </div>
            </div>

            <div class ="information-container">
                <div class = "personalinformation-container">
                    <h3>Alejandro Carlevix</h3>
                    <h3>alejandro@carlevix.com</h3> 
                    <h3>Contraseña: *********</h3>
                    <h3>Telefono: +58 412 0555556</h3>
                </div>

                <div class ="personalinformation-container">
                    <h3>Direccion</h3>
                    <h3>Residencias Morichal Apto 3-A , Los Chaguaramos </h3>
                    <h3>Caracas, Venezuela</h3> 
                    <div class = "line"></div>
                    <h3>VISA **** **** **** 5896</h3>
                    <h3>Fecha de pago: </h3>
                </div>
            </div>

        <div class = "line"></div>
        <div class="modifyplan-container">
            <div class="welcome-container">
                 <div class="text-line">
                    <h1>Planes disponibles</h1>
                </div>
                <div class="plan-container">
                    <div>
                        <form  action="register3.php" method=""> 
                                <input type="radio" name="plan" value="Basico" id="Basico" required >      <label for="Basico"> Básico 7,99</label>
                                <input type="radio" name="plan" value="Estandar" id="Estandar"required>  <label for="Estandar">Estándar 10,99 </label>
                                <input type="radio" name="plan" value="Premium" id="Premium"required>    <label for="Premium">Premium 13,99  </label>
                                <input class="button" type="submit" name="plan" value="Cambiar plan" id="Plan"required>    <label for="Premium">   </label>                                                                 
                            
                        </form>
                    </div>
                    <div class = "buttonCancelar">
                            <a href="../../index.php">Cancelar</a>                                          
                    </div>
              
                </div>
                                           
            </div>
        </div>


                

    </div>
       
    
</body>
</html>