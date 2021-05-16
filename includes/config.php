<?php

ob_start(); 
session_start();  //indica si el usuario esta logueado o no

date_default_timezone_set("America/New_York"); //Conexion a la base de datos

 try {
     $con = new PDO("mysql:dbname=carlevix;host=localhost","root","");
     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 } catch(PDOException $e){
    exit("Connection failed: " . $e->getMessage());
 }  


?>