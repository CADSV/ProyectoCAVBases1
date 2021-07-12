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
            return $this->insertSuscriptionDetails($name, $lastName, $cardnumber, $cvv, $expiredate, $username, $IdMembership, $postalcode, $avenueStreet, $buildingHouse);
        }

        return false;
    }

    public function modifySuscription($username, $IdMembership){
        $query = $this->connection->prepare(" SELECT IdUser FROM User WHERE (Username = :username)"); // Buscar IdUser del User logueado actualmente
        $query->bindValue(":username", $username);
        $query->execute();
        $userData1 = $query->fetch(PDO::FETCH_ASSOC);
        $IdUser = $userData1["IdUser"];

        $query2 = $this->connection->prepare("SELECT CardNumber, CVV FROM IsSuscribed WHERE (IdUser = :IdUser)"); // Buscar CardNumber y CVV vigentes
        $query2->bindValue(":IdUser", $IdUser);
        $query2->execute();
        $userData2 = $query2->fetch(PDO::FETCH_ASSOC);
        $CardNumber = $userData2["CardNumber"];
        $CVV = $userData2["CVV"];

        $query3 = $this->connection->prepare("UPDATE IsSuscribed SET EndDateSus = CURRENT_TIMESTAMP WHERE (IdUser = :IdUser)"); // Terminar la suscripción actual
        $query3->bindValue(":IdUser", $IdUser);
        $query3->execute();

        $query4 = $this->connection->prepare("INSERT INTO IsSuscribed (IdUser, IdMembership, CVV, CardNumber) VALUES (:IdUser, :IdMembership, :CVV, :CardNumber)"); // Empezar nueva suscripción
        $query4->bindValue(":IdUser", $IdUser);
        $query4->bindValue(":IdMembership", $IdMembership);
        $query4->bindValue(":CVV", $CVV);
        $query4->bindValue(":CardNumber", $CardNumber);
        $query4->execute();

    }

    private function insertSuscriptionDetails($name, $lastName, $cardnumber, $cvv, $expiredate, $username, $IdMembership, $postalcode, $avenueStreet, $buildingHouse){
            
        
        $query = $this->connection->prepare("INSERT INTO Paymentcard (CardNumber, CVV, OwnerName, OwnerLastname, ExpDate) 
                                        VALUES (:cardnumber, :cvv, :name, :lastName, :expiredate)");
        
        $query->bindValue(":name", $name);    
        $query->bindValue(":lastName", $lastName); 
        $query->bindValue(":cardnumber", $cardnumber); 
        $query->bindValue(":cvv", $cvv); 
        $query->bindValue(":expiredate", $expiredate); 
  
        
        if($query->execute()) {   // Retorna true si funcionó la inserción en la base de datos, false si no
            
            $query2 = $this->connection->prepare(" SELECT IdUser FROM User WHERE (Username = :username)"); // Buscar IdUser del User logueado actualmente
            $query2->bindValue(":username", $username);
            
            $query2->execute();

            $userData = $query2->fetch(PDO::FETCH_ASSOC);
            $IdUser = $userData["IdUser"];
            
            $query3 = $this->connection->prepare("INSERT INTO IsSuscribed (IdUser, IdMembership, CVV, CardNumber) 
                                                VALUES (:IdUser, :IdMembership, :CVV, :CardNumber)"); // No se inserta la fecha de inicio ya que es current_timestamp por default
            $query3->bindValue(":IdUser", $IdUser);
            $query3->bindValue(":IdMembership", $IdMembership);
            $query3->bindValue(":CVV", $cvv);
            $query3->bindValue(":CardNumber", $cardnumber);
            $query3->execute();

            $query4 = $this->connection->prepare("UPDATE User SET UserIsSuscribed = 1, UserPostalCode = :postalcode, UserAvenueStreet= :avenueStreet, UserBuildingHouse= :buildingHouse 
                                                 WHERE (Username = :username)"); 
            $query4->bindValue(":username", $username);     // Para indicar que está suscrito
            $query4->bindValue(":postalcode", $postalcode);
            $query4->bindValue(":avenueStreet", $avenueStreet);
            $query4->bindValue(":buildingHouse", $buildingHouse);
            
            $query4->execute();

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
