<?php
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" 
        content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
    <title>Registro 2</title>
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
                <p>PASO 1 DE 3</p>
            </div>

            <div class = "subtitleleft">
                  <p>Selecciona tu plan</p>
            </div>

            <div class = "textleft">
                </p>  <img src="../../assets/images/check_sin_circulo.png" title="check_sin_circulo" alt="check_sin_circulo" align="left">  Ve todo lo que quieras sin anuncios.</p>
                </p>  <img src="../../assets/images/check_sin_circulo.png" title="check_sin_circulo" alt="check_sin_circulo" align="left">   Recomendaciones, exclusivas para ti.</p>
                </p>   <img src="../../assets/images/check_sin_circulo.png" title="check_sin_circulo" alt="check_sin_circulo" align="left">   Puedes cambiar de plan cuando quieras.</p>
            </div>

            <div class = "container">
                <div class="formulario">
                    <form  action="register3.php" method=""> 
                        <input type="radio" name="plan" value="Basico" id="Basico" >      <label for="Basico"> Básico</label>
                        <input type="radio" name="plan" value="Estandar" id="Estandar">  <label for="Estandar">Estándar </label>
                        <input type="radio" name="plan" value="Premium" id="Premium">    <label for="Premium">Premium   </label>
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
                        <input type="submit" class="buttonContainer" name="continuarbutton" value="Continuar">  
                        <div class = "buttonOmitir">
                            
                             <a href="register4.php">Omitir</a>
                        </div>


                    </form>

                </div>

                

                 
                 
                 

                
            </div>
        </section>
</body>
</html>