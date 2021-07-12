<?php
error_reporting(E_ALL ^ E_WARNING);
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

    if($IdMembership){
        $membershipData = $suscriptionAccount->getMembershipData($IdMembership);
        $membershipName=$membershipData["MembershipName"];
        $membershipPrice=$membershipData["Price"]." $";
    }else{
        $membershipName="No asignado";
        $membershipPrice="No disponible";
    }
    
  

    if(isset($_POST["changeSuscriptionButton"])) {

        $username = $_SESSION["userLoggedIn"];
        $IdMembership = $_POST["membership"];

        $success= $suscriptionAccount->modifySuscription($username, $IdMembership);
        if(!$success){
            header("Location: ../register/register4.php");
        }
        echo '<script language="javascript">alert("Ha cambiado de plan exitosamente");window.location.href="select_profile.php"</script>';
    }

    if(isset($_POST["cancelSuscriptionButton"])) {

        $username = $_SESSION["userLoggedIn"];

        $success= $suscriptionAccount->cancelSuscription($username);
        echo '<script language="javascript">alert("Ha eliminado su plan, y ya no está suscrito");window.location.href="select_profile.php"</script>';
    }

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
            <header>
                <a href="../../index.php"> 
                    <img src="../../assets/images/logo.png" title="Logo" alt="Logo de la página" class = "carlevixLogo"> 
                </a>          
                <nav class = "back">
                    <a href="select_profile.php">Volver a perfiles</a>
                 </nav>
            </header>
        
        <div class = "line"></div>       

            <div class="text-line">
                <h1>Informacion de suscripción</h1>
            </div>

            <div class="edit-container">  
                 <!--            
                <form  action="select_profile.php" method="">                            
                    <input class="buttonEdit" type="submit" name="plan" value="Guardar" id="Plan"required>    <label for="Premium">   </label>                                                                                            
                </form>
                <div class = "buttonCancel">
                     <a href="select_profile.php">Cancelar</a>                                          
                </div>
                        -->
            </div>

            <div class ="information-container">
            <?php  
                     echo "<span class='PlanMessage'>Usuario: $username</span>";

                     echo "<span class='PlanMessage'>Plan: $membershipName</span>";
                     
                     echo "<span class='PlanMessage'>Precio: $membershipPrice </span>";
                                

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
                        <form method="POST"> 
                                <input type="radio" name="membership" value="1" id="Basico" required >      <label for="Basico"> Básico 7,99</label>
                                <input type="radio" name="membership" value="2" id="Premium"required>  <label for="Premium">Premium 10,99 </label>
                                <input type="radio" name="membership" value="3" id="VIP"required>    <label for="VIP">VIP 13,99  </label>
                                <input class="button" type="submit" name="changeSuscriptionButton" value="Cambiar membresía" required> 
                            
                        </form>
                    </div>
                    <form method="POST"> <input class="buttonCancel" type="submit" name="cancelSuscriptionButton" value="Cancelar suscripción" required> </form>           
                </div>                                          
            </div>
        </div>
    </div>
</body>
</html>