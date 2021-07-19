<?php

require_once("../../data/config.php");
include_once("navBar.php");

/*if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../register/register1.php");
}*/

$userLoggedIn = $_SESSION["userLoggedIn"];

?>


    <!DOCTYPE html>
    <html lang='es'>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport"
                content="width=device-width, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, user-scalable=no">
            <title>Carlevix</title>
            <link rel="stylesheet" type="text/css" href="../../assets/style/contentStyle.css"/> 
            <script src="https://kit.fontawesome.com/06a651c8da.js" crossorigin="anonymous"> </script>

        </head>
        <body>
            <div class="wrapper">
            <div class="textboxContainer">
                 <input type="text" class="searchInput" placeholder="Buscar contenido">
            </div>
            <div class="results"> </div>

            <script language="javascript">

                (function() {
                    var username = '<?php echo $userLoggedIn; ?>';
                    var timer;

                    $(".searchInput").keyup(function(){
                        clearTimeout(timer);

                        timer= setTimeout(function(){
                            var val=$(".searchInput").val();
                            console.log(val);
                        }, 500);
                    })
                })
            </script>



               
               
            </div>
        </div>   
    </html>   