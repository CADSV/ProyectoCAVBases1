<?php

class Account{

    private $con;
    private $errorArray = array ();

    public function __construct($con){
        $this->con=$con;

    }

    public function validateNombre($fn){
        if(strlen($fn)< 2 || strlen($fn)> 25){
            array_push($this->errorArray, Constants::$firstnameCharacters);
        }

    }

    public function getError($error){
        if (in_array($error, $this->errorArray)){
            return $error;
        }
    }

}

?>