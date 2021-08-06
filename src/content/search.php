<?php

require_once("../../data/config.php");
include_once("navBar.php");
require_once("header.php");

if (!isset($_SESSION["userLoggedIn"])){
    header("Location: ../../index.php");
}

if (!isset($_SESSION["IdProfile"])){
    header("Location: ../profile/selectProfile.php");
}
$profile=$_SESSION["IdProfile"];
$userLoggedIn = $_SESSION["userLoggedIn"];
//echo $userLoggedIn;

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

                <script >

                    (function() {
                        var profile = '<?php echo $profile; ?>';
                        var timer;

                        $(".searchInput").keyup(function(){
                            clearTimeout(timer);

                            timer= setTimeout(function(){
                                var val=$(".searchInput").val();

                                if(val != ""){
                                    $.post("ajax/getSearchResults.php", {IdProfile: profile } function(data){
                                        $(".results").html(data);     

                                    } );

                                }else{
                                    $(".results").html("");
                                }
                               
                            }, 500);
                        })
                    })
                </script>



               
               
            </div>
        </div>   
    </html>   