<?php

require_once("../../data/config.php");


if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../../index.php");
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

                $query1 = $this->connection->prepare(" SELECT IdUser FROM User WHERE (Username = :username)"); // Buscar IdUser del User logueado actualmente
                $query1->bindValue(":username", $username);
                $query1->execute();

                $userData = $query->fetch(PDO::FETCH_ASSOC);
                $IdUser = $userData["IdUser"];


                $query2 = $this->connection->prepare(" SELECT IdMembership FROM  issuscribed WHERE (IdUser = :IdUser)"); 
                $query2->bindValue(":IdUser", $IdUser);
                $query2->execute();


                $userIdMembership = $query2->fetch(PDO::FETCH_ASSOC);
                $IdMembership = $userIdMembership["IdMembership"];

                $query3 = $this->connection->prepare(" SELECT MembershipName, Price FROM  membership WHERE (IdMembership = :IdMembership)");
                $query3->bindValue(":IdMembership ", $IdMembership);
                $query3->execute();

                $membershipData=$query3->fetch(PDO::FETCH_ASSOC);

                $membershipName=$membershipData["MembershipName"];
                $membershipPrice=$membershipData["Price"];

                echo $membershipName;
                echo $membershipPrice;

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