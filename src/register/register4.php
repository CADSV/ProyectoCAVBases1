<?php

require_once("../../data/config.php");


    if (!isset($_SESSION["userLoggedIn"])){
        header("Location: register1.php");
    }

    if(isset($_POST["submitButton"])){

        $IdMembership = $_POST["membership"];

        $_SESSION["IdMembership"] = $IdMembership;
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" 
        content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
    <title>Registro 4</title>
    <link rel="stylesheet" type="text/css" href="../../assets/style/registerStyle.css">
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
            <div class = "titleleft">
                <p>PASO 2 DE 3</p>
            </div>

            <div class = "subtitleleft">
                  <p>Selecciona tu plan</p>
            </div>

            <div class = "textleft">
                </p>  <img src="../../assets/images/check_sin_circulo.png" title="check_sin_circulo" alt="check_sin_circulo" align-self="left">  Ve todo lo que quieras sin anuncios.</p>
                </p>  <img src="../../assets/images/check_sin_circulo.png" title="check_sin_circulo" alt="check_sin_circulo" align-self="left">   Recomendaciones, exclusivas para ti.</p>
                </p>   <img src="../../assets/images/check_sin_circulo.png" title="check_sin_circulo" alt="check_sin_circulo" align-self="left">   Puedes cambiar de plan cuando quieras.</p>
            </div>

            <div class = "container">
                <div class="formulario">
                    <form method="POST"> 
                        <input type="radio" name="plan" value="1" id="membership" required >      <label for="Basico">Básico</label>
                        <input type="radio" name="plan" value="2" id="membership"required>  <label for="Estandar">Premiun</label>
                        <input type="radio" name="plan" value="3" id="membership"required>    <label for="Premium">VIP</label>
                        <div class= "columnas">  
                        <p> Precio Mensual</p>
                        <p>  USD 7,99  </p>
                        <p>  USD 10,99 </p>
                        <p>  USD 13,99</p>
                        <div class = "lineplanes"></div>

                        <p> Calidad de video</p>
                        <p>  Regular  </p>
                        <p>  Buena </p>
                        <p>  Excelente</p>
                        <div class = "lineplanes"></div>

                        <p> Resolución</p>
                        <p>  480p  </p>
                        <p>  1080p </p>
                        <p>  4K+HDR</p>
                        <div class = "lineplanes"></div>

                        <p> Dispositivos que pueden visualizar contenido a la vez</p>
                        <p>  1  </p>
                        <p>  2 </p>
                        <p>  4</p>
                        <div class = "lineplanes"></div>
                        </div>
                        <div class="textdown">
                        <p>La disponibilidad del contenido en HD (720p), Full HD (1080p), Ultra HD (4K) y HDR depende de tu servicio de internet y del dispositivo en uso. No todo el contenido está disponible en todas las resoluciones. Consulta nuestros Términos de uso para obtener más información. </p>
                        </div> 
                        <div class = "buttons">
                            <div class = "buttonContainer">
                                <div class = "marginbutton">
                                <input type="submit" class="marginbuttonRedPlan" name="submitButton" value="Continuar">
                                </div>
                            </div>
                                
                        </div>
                    </form>

                 

                 <div class = "buttons">
                    
                        <div class = "buttonOmitir">
                            <div class = "marginbuttonGray">  
                                <a href="../profile/select_profile.php">Omitir</a>
                            </div>
                        </div>
                 </div>
                
            </div>
        </section>
</body>
</html>
