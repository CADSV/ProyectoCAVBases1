<?php  

class ProfileAccount{
    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;
    }

    public function registerProfile($username, $profileName, $profilePhoto){
        $this->validateProfileName($profileName);

        if(empty($this->errorAray)){
            return $this->insertProfileDetails($username, $profileName, $profilePhoto);
        }

        return false;
    }

    private function insertProfileDetails($username, $profileName, $profilePhoto){
        $query = $this->connection->prepare(" SELECT IdUser FROM User WHERE (Username = :username)"); // Buscar IdUser del User logueado actualmente
        $query->bindValue(":username", $username);
        $query->execute();
        $userData = $query->fetch(PDO::FETCH_ASSOC);
        $IdUser = $userData["IdUser"];
        
        $query = $this->connection->prepare("INSERT INTO Profile (IdUser, ProfileName, ProfilePhoto) 
                                             VALUES (:IdUser, :profileName, :profilePhoto)");     
        $query->bindValue(":IdUser", $IdUser);    
        $query->bindValue(":profileName", $profileName); 
        $query->bindValue(":profilePhoto", $profilePhoto); 
   
        if ($query->execute()){ // Retorna true si funcionó la inserción en la base de datos, false si no
            return true;
        }
        return false;
    }

    private function validateProfileName($profileName){ // Valida la longitud del nombre de perfil
        if(strlen($profileName)< 2 || strlen($profileName)> 20){
            array_push($this->errorArray, Constants::$nameLength);
        }
    }

    public function getError($error){
        if (in_array($error, $this->errorArray)){
            return "<span class='errorMessage'>$error</span>";
        }
    }
}

?>
