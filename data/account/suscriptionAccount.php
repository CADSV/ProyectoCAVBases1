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
        $this->validateCardnumber($cardnumber,$cvv);

        if(empty($this->errorAray)){
            return $this->insertSuscriptionDetails($name, $lastName, $cardnumber, $cvv, $expiredate);
        }

        return false;
    }

    private function insertSuscriptionDetails($name, $lastName, $cardnumber, $cvv, $expiredate){
            
        
        $query = $this->connection->prepare("INSERT INTO Paymentcard (CardNumber, CVV, OwnerName, OwnerLastname, ExpDate) 
                                        VALUES (:cardnumber, :cvv, :name, :lastName, :expiredate)");
        
        $query->bindValue(":name", $name);    
        $query->bindValue(":lastName", $lastName); 
        $query->bindValue(":cardnumber", $cardnumber); 
        $query->bindValue(":cvv", $cvv); 
        $query->bindValue(":expiredate", $expiredate); 
  
        
        return $query->execute(); // Retorna true si funcionó la inserción en la base de datos, false si no
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

    
    private function validateCardnumber($cardnumber,$cvv){
        if ($cardnumber <1000000000000000000 || $cardnumber>9999999999999999999){
            array_push($this->errorArray, Constants::$InvalidCardNumber);
            return;
        }

        $query = $this->connection->prepare("SELECT * FROM PaymentCard WHERE CardNumber=:cardnumber AND CVV=:cvv");
        $query->bindValue(":cardnumber", $cardnumber);
        $query->bindValue(":cvv", $cvv);
        $query->execute();

        if($query->rowCount()!= 0){                         //Valida si no existe el nombre de usuario
            array_push($this->errorArray, Constants::$cardTaken);
        }


    }

    public function getError($error){
        if (in_array($error, $this->errorArray)){
            return "<span class='errorMessage'>$error</span>";
        }
    }

}

?>