<?php

require_once("../request/registerRequest.php");

class RegisterAccount{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;

    }

    public function register($name, $lastName, $username, $email, $email2, $password, $password2){
        $this->validateName($name);
        $this->validateLastName($lastName);
        $this->validateUsername($username);
        $this->validateEmail($email, $email2);



    }

    private function validateName($name){ // Valida la longitud del nombre
        if(strlen($name)< 2 || strlen($name)> 25){
            array_push($this->errorArray, Constants::$nameLength);
        }

    }

    private function validateLastName($lastName){ //Valida la Longitud del Apellido
        if(strlen($lastName)< 2 || strlen($lastName)> 25){
            array_push($this->errorArray, Constants::$lastNameLength);
        }

    }

    private function validateUsername($username){ 
        if(strlen($username)< 2 || strlen($username)> 25){              //Valida la Longitud del usuario
            array_push($this->errorArray, Constants::$usernameLength);
            return;
        }
        RegisterRequest :: validateUnicUsername($username);
    }

    private function validateEmail($email, $email2){
        if ($email != $email2){
            array_push($this->errorArray, Constants::$emailsDontMatch);
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindValue(":email", $email);
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