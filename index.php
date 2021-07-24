<?php
error_reporting(E_ALL ^ E_WARNING);
    require_once ("data/imports/user_agent.php");
    require_once("data/account/indexAccount.php");
    require_once("data/config.php");



    //create an instance of UserAgent class
    $ua = new UserAgent();
    $deviceType = 'computadoras';
    $article = 'la tuya';
    $browser = $ua -> browser();
    

    //if site is accessed from mobile, then redirect to the mobile site.
    if($ua->is_mobile()){;
     $deviceType = 'teléfonos';       
     $article = 'el tuyo';            
    }


    $indexAccount = new IndexAccount($connection);

    $venezuelaPlan = $indexAccount -> countryPlan('Venezuela');
    $belgiumPlan = $indexAccount -> countryPlan('Bélgica');
    $francePlan = $indexAccount -> countryPlan('Francia');
    $italyPlan = $indexAccount -> countryPlan('Italia');
    $germanyPlan = $indexAccount -> countryPlan('Alemania');
    $colombiaPlan = $indexAccount -> countryPlan('Colombia');
    $portugalPlan = $indexAccount -> countryPlan('Portugal');
    $lebanonPlan = $indexAccount -> countryPlan('Líbano');
    $cubaPlan = $indexAccount -> countryPlan('Cuba');
    $northKoreaPlan = $indexAccount -> countryPlan('Corea del Norte');

?>
    
    
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
                <div class = "freeMonth">
                    <h2>¡Suscríbete ahora y obtén un mes totalmente gratis!</h2>
                    <img src="assets/images/freeMonth.png" alt="Mes gratis" title = "Mes gratis">
                    <p>En cualquiera de nuestros planes. Elige y disfruta. ¡Tu momento es ahora!</p>
                </div>
            </div>


            <div class ="divider"></div>


            <div class = "marketing">
                <div class = "deviceImg">
                    <?php
                     echo "<span class='deviceMsg1'>Nuestros usarios aman y prefieren ver Carlevix en sus $deviceType </span>";
                    ?>
                    <img src="assets/images/loginBackground2.jpg" title="Dispositivos" alt="Dispositivos">
                    <?php
                     echo "<span class='deviceMsg2'>¿Qué esperas para ver todo nuestro entretenido contenido desde $article?</span>";
                    ?>
                </div>

            </div>


            <div class ="divider"></div>


            <div class = "marketingCountries">
                <h2>Estos son los planes preferidos por nuestros usuarios alrededor del mundo</h2>

                <div class = "countries">

                    <div class = "countriesColumn">

                        <div class = "country">
                            <img src="assets/images/flags/Venezuela.png" alt="Venezuela" title= "Venezuela">
                            <?php  echo "<span class='countryPlan'>$venezuelaPlan</span>"; ?>
                        </div>

                        <div class = "country">
                            <img src="assets/images/flags/France.png" alt="Francia" title= "Francia">
                            <?php  echo "<span class='countryPlan'>$francePlan</span>"; ?>
                        </div>

                        <div class = "country">
                            <img src="assets/images/flags/Germany.png" alt="Alemania" title= "Alemania">
                            <?php  echo "<span class='countryPlan'>$germanyPlan</span>"; ?>
                        </div>

                        <div class = "country">
                            <img src="assets/images/flags/Portugal.png" alt="Portugal" title= "Portugal">
                            <?php  echo "<span class='countryPlan'>$portugalPlan</span>"; ?>
                        </div>

                        <div class = "country">
                            <img src="assets/images/flags/Cuba.png" alt="Cuba" title= "Cuba">
                            <?php  echo "<span class='countryPlan'>$cubaPlan</span>"; ?>
                        </div>

                    </div>

                    <div class = "countriesColumn">

                        <div class = "country">
                            <img src="assets/images/flags/Belgium.png" alt="Bélgica" title= "Bélgica">
                            <?php  echo "<span class='countryPlan'>$belgiumPlan</span>"; ?>
                        </div>

                        <div class = "country">
                            <img src="assets/images/flags/Italy.png" alt="Italia" title= "Italia">
                            <?php  echo "<span class='countryPlan'>$italyPlan</span>"; ?>
                        </div>

                        <div class = "country">
                            <img src="assets/images/flags/Colombia.png" alt="Colombia" title= "Colombia">
                            <?php  echo "<span class='countryPlan'>$colombiaPlan</span>"; ?>
                        </div>

                        <div class = "country">
                            <img src="assets/images/flags/Lebanon.png" alt="Líbano" title= "Líbano">
                            <?php  echo "<span class='countryPlan'>$lebanonPlan</span>"; ?>
                        </div>

                        <div class = "country">
                            <img src="assets/images/flags/North_Korea.png" alt="Corea del Norte" title= "Corea del Norte">
                            <?php  echo "<span class='countryPlan'>$northKoreaPlan</span>"; ?>
                        </div>

                    </div>

                </div>




                <!-- <div class = "countryRow">

                    <div class = "country">
                        <img src="assets/images/flags/Venezuela.png" alt="Venezuela" title= "Venezuela">
                        <p>VIP</p>
                    </div>

                    <div class = "country">
                        <img src="assets/images/flags/Belgium.png" alt="Bélgica" title= "Bélgica">
                        <p>Premium</p>
                    </div>

                </div>

                <div class = "countryRow">

                    <div class = "country">
                        <img src="assets/images/flags/France.png" alt="Francia" title= "Francia">
                        <p>VIP</p>
                    </div>

                    <div class = "country">
                        <img src="assets/images/flags/Italy.png" alt="Italia" title= "Italia">
                        <p>Gold</p>
                    </div>

                </div>

                <div class = "countryRow">

                    <div class = "country">
                        <img src="assets/images/flags/Germany.png" alt="Alemania" title= "Alemania">
                        <p>VIP</p>
                    </div>

                    <div class = "country">
                        <img src="assets/images/flags/Colombia.png" alt="Colombia" title= "Colombia">
                        <p>Gold</p>
                    </div>

                </div>

                <div class = "countryRow">

                    <div class = "country">
                        <img src="assets/images/flags/Portugal.png" alt="Portugal" title= "Portugal">
                        <p>Gold</p>
                    </div>

                    <div class = "country">
                        <img src="assets/images/flags/Lebanon.png" alt="Líbano" title= "Líbano">
                        <p>Premiun</p>
                    </div>

                </div>

                <div class = "countryRow">

                    <div class = "country">
                        <img src="assets/images/flags/Cuba.png" alt="Cuba" title= "Cuba">
                        <p>Gold</p>
                    </div>

                    <div class = "country">
                        <img src="assets/images/flags/North_Korea.png" alt="Corea del Norte" title= "Corea del Norte">
                        <p>VIP</p>
                    </div>

                </div> -->

            </div>

        </body>
    </html>