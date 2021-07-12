<?php  

class SuscriptionAccount{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;

    }

    public function suscription($name, $lastName, $cardnumber,$avenueStreet, $buildingHouse, $postalcode, $cvv, $expiredate, $username, $IdMembership){
        $this->validateName($name);
        $this->validateLastName($lastName);
        $this->validateCardnumber($cardnumber,$cvv);

        if(empty($this->errorAray)){
            return $this->insertSuscriptionDetails($name, $lastName, $cardnumber, $cvv, $expiredate, $username, $IdMembership);
        }

        return false;
    }

    private function insertSuscriptionDetails($name, $lastName, $cardnumber, $cvv, $expiredate, $username, $IdMembership){
            
        
        $query = $this->connection->prepare("INSERT INTO Paymentcard (CardNumber, CVV, OwnerName, OwnerLastname, ExpDate) 
                                        VALUES (:cardnumber, :cvv, :name, :lastName, :expiredate)");
        
        $query->bindValue(":name", $name);    
        $query->bindValue(":lastName", $lastName); 
        $query->bindValue(":cardnumber", $cardnumber); 
        $query->bindValue(":cvv", $cvv); 
        $query->bindValue(":expiredate", $expiredate); 
  
        
        if($query->execute()) {   // Retorna true si funcionó la inserción en la base de datos, false si no
            
            $query2 = $this->connection->prepare(" SELECT IdUser FROM User WHERE (Username = :username)");
            $query2->bindValue(":username", $username);
            $query2->execute();

            $IdUser = $query2;


            $query3 = $this->connection->prepare("INSERT INTO IsSuscribed (IdUser, IdMembership, CVV, CardNumber, StartDateSus)
                                                VALUES (:IdUser, :IdMembership, :CVV, :CardNumber, :StartDateSus)");
            $query3->bindValue(":IdUser", $IdUser);
            $query3->bindValue(":IdMembershio", $IdMembershio);
            $query3->bindValue(":CVV", $CVV);
            $query3->bindValue(":CardNumber", $CardNumber);
            $query3->bindValue(":StartDateSus", $StartDateSus);
            $query3->execute();

            return true;
        } 

        return false;
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

        $query = $this->connection->prepare("SELECT * FROM PaymentCard WHERE (CardNumber=:cardnumber) AND (CVV=:cvv)");
        $query->bindValue(":cardnumber", $cardnumber);
        $query->bindValue(":cvv", $cvv);
        $query->execute();

        if($query->rowCount()!= 0){                         //Valida que no exista la misma clave compuesta en la BD
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
