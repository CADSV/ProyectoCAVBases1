<?php  

class SuscriptionAccount{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;

    }

    public function suscription($name, $lastName, $cardnumber,$avenueStreet, $buildingHouse, $postalcode, $cvv, $expiredate){
        $this->validateName($name);
        $this->validateLastName($lastName);
        $this->validateCardnumber($cardnumber);
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

    
    private function validateCardnumber($cardnumber){
        if ($cardnumber <1000000000000000000 || $cardnumber>9999999999999999999){
            array_push($this->errorArray, Constants::$InvalidCardNumber);
            return;
        }

    }

    public function getError($error){
        if (in_array($error, $this->errorArray)){
            return "<span class='errorMessage'>$error</span>";
        }
    }

}

?>