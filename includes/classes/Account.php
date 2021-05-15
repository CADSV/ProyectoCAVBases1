<?php

class Account{

    private $con;
    private $errorArray = array ();

    public function __construct($con){
        $this->con=$con;

    }

    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2){
        $this->validateNombre($fn);
        $this->validateApellido($ln);
        $this->validateUsuario($un);
        $this->validateCorreos($em, $em2);



    }

    private function validateNombre($fn){ // Valida la longitud del nombre
        if(strlen($fn)< 2 || strlen($fn)> 25){
            array_push($this->errorArray, Constants::$firstnameCharacters);
        }

    }

    private function validateApellido($ln){ //Valida la Longitud del Apellido
        if(strlen($ln)< 2 || strlen($ln)> 25){
            array_push($this->errorArray, Constants::$lastnameCharacters);
        }

    }

    private function validateUsuario($un){ 
        if(strlen($un)< 2 || strlen($un)> 25){              //Valida la Longitud del usuario
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
        $query->bindValue(":un", $un);
        $query->execute();

        if($query->rowCount()!= 0){                         //Valida si no existe el nombre de usuario
            array_push($this->errorArray, Constants::$usernameTaken);

        }

    }

    private function validateCorreos($em, $em2){
        if ($em != $em2){
            array_push($this->errorArray, Constants::$emailsDontMatch);
            return;
        }
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
        $query->bindValue(":em", $em);
        $query->execute();

        if($query->rowCount()!= 0){                         //Valida si no existe el nombre de usuario
            array_push($this->errorArray, Constants::$emailTaken);

        }

    }


    public function getError($error){
        if (in_array($error, $this->errorArray)){
            return $error;
        }
    }

}

?>