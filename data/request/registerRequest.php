<?php

class RegisterRequest {

    private function validateUnicUsername($username) {

        $query = $this->connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindValue(":username", $username);
        $query->execute();

        if($query->rowCount()!= 0){                         //Valida si no existe el nombre de usuario
            array_push($this->errorArray, Constants::$usernameTaken);

        }
    }
}


?>