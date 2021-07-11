<?php

class RegisterRequest {

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;

    }

    private function validateUsernameIsNotTaken($username) {

        $query = $this->connection->prepare("SELECT * FROM User WHERE Username=:username");
        $query->execute();
        $query->bindValue(":username", $username);
        
        if($query->rowCount()!= 0){                         //Valida si no existe el nombre de usuario
            array_push($this->errorArray, Constants::$usernameTaken);

        }
    }


    private function validateEmailIsNotTaken($email) {

        $query = $this->connection->prepare("SELECT * FROM User WHERE EmailUser=:email");
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