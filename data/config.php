<?php

ob_start(); 
session_start();  //indica si el usuario esta logueado o no, y se mantiene hasta que cierres el navegador.

date_default_timezone_set("America/New_York"); //Conexion a la base de datos

 try {
     $connection = new PDO("mysql:dbname=prueba_carlevix;host=localhost","root",""); //Aquí se conecta con la BD. Debe llamarse igual que en tu localhost
     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 } catch(PDOException $e){
    exit("Connection failed: " . $e->getMessage());
 }  


?>