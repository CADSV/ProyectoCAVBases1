    <!DOCTYPE html>
    <html lang='es'>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport"
                content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
            <title>Carlevix</title>
            <link rel="stylesheet" type="text/css" href="assets/style/indexStyle.css"/> 
        </head>
        <body>
            <div class="wrapper">
                <div class="background">
                    <img src="assets/images/loginBackground.jpg" title="Imagen de fondo" alt="Cartelera multimedia, imagen de fondo">
                </div>
                <div class="index-header">
                    <img src="assets/images/logo.png" title="Logo" alt="Logo de la página" class = "carlevixLogo"> 
                    <a href="src/login/login.php"> 
                        <button class="button">Iniciar sesión</button>
                    </a>          
                </div>
                <div class="index-container">
                    <div class="welcome-container">

                        <div class="text-line">
                            <h1>Películas y series ilimitadas y mucho más</h1>
                        </div>
                        <div class="text-line">
                            <h2>Disfruta donde quieras. Cancela cuando quieras</h2>
                        </div>
                        <div class="text-line">
                            <h3>¿Quieres ver Carlevix ya? Crea una cuenta o renueva tu membresía de Carlevix</h3>
                        </div>
                        <a href="src/register/register1.php" class="text-line"> 
                            <button class="button">Registrarse</button>
                        </a>
                                            
                    </div>
                </div>
            </div>

            <div class ="divider"></div>
            
            <div class = "marketing">
                <div class = "background2">
                    <img src="assets/images/loginBackground2.jpg" title="Imagen de fondo" alt="Cartelera multimedia, imagen de fondo">
                </div>

                <?php
                    //include file
                    require_once ("data/imports/user_agent.php");

                    //create an instance of UserAgent class
                    $ua = new UserAgent();

                    //if site is accessed from mobile, then redirect to the mobile site.
                    if($ua->is_mobile()){;
                        
                    } else {
                        echo "<span class='PlanMessage'>Precio: jdo </span>";
                    }
                    ?>

            </div>

        </body>
    </html>