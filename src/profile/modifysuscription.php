<?php

require_once("../../data/config.php");
require_once("../../data/account/suscriptionAccount.php");
require_once("../../data/classes/constants.php");


    if (!isset($_SESSION["userLoggedIn"])){
        header("Location: ../../index.php");
    }

    $suscriptionAccount= new SuscriptionAccount($connection);

    $username = $_SESSION["userLoggedIn"];

    $IdUser = $suscriptionAccount->getIdUser($username);
    $IdMembership = $suscriptionAccount->getIdMembership($IdUser);
    $membershipData = $suscriptionAccount->getMembershipData($IdMembership);
    
    $membershipName=$membershipData["MembershipName"];
    $membershipPrice=$membershipData["Price"];

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
                        <img src="../../assets/images/logo.png" title="Logo" alt="Logo de la página" class = "carlevixLogo"> 
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
                             
                <form  action="adminProfile.php" method="">                            
                    <input class="buttonEdit" type="submit" name="plan" value="Guardar" id="Plan"required>    <label for="Premium">   </label>                                                                                            
                </form>
                <div class = "buttonCancel">
                     <a href="adminProfile.php">Cancelar</a>                                          
                </div>
            </div>

            <div class ="information-container">
            <?php  
                     echo "<span class='PlanMessage'>Usuario: $username</span>";

                     echo "<span class='PlanMessage'>Plan: $membershipName</span>";
                     
                     echo "<span class='PlanMessage'>Precio: $membershipPrice $</span>";
                                

            ?>
            </div>

        <div class = "line"></div>
        <div class="modifyplan-container">
            <div class="welcome-container">
                 <div class="text-line">
                    <h1>Planes disponibles</h1>
                </div>
                <div class="plan-container">
                    <div>
                        <form  action="adminProfile.php" method=""> 
                                <input type="radio" name="plan" value="Basico" id="Basico" required >      <label for="Basico"> Básico 7,99</label>
                                <input type="radio" name="plan" value="Estandar" id="Estandar"required>  <label for="Estandar">Estándar 10,99 </label>
                                <input type="radio" name="plan" value="Premium" id="Premium"required>    <label for="Premium">Premium 13,99  </label>
                                <input class="button" type="submit" name="plan" value="Cambiar plan" id="Plan"required>    <label for="Premium">   </label>                                                                 
                            
                        </form>
                    </div>
                    <div class = "buttonCancelar">
                            <a href="adminProfile.php">Cancelar</a>                                          
                    </div>
              
                </div>
                                           
            </div>
        </div>


                

    </div>
       
    
</body>
</html>