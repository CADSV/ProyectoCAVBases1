<?php  

class LoginAccount{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;

    }

    public function login($username, $password){
        $password = hash("sha512", $password);

        $query = $this->connection->prepare("SELECT * FROM User WHERE (Username=:username) AND (PasswordUser=:password) ");
        
        $query->bindValue(":username", $username); 
        $query->bindValue(":password", $password); 

        $query->execute();
        
        if($query->rowCount() == 1) { 
            return true;                // Devuelve True si existe una fila en la BD con estos datos.
        }

        array_push($this->errorArray, Constants::$loginFailed);

        return false;
    }

    public function getError($error){
        if (in_array($error, $this->errorArray)){
            return "<span class='errorMessage'>$error</span>";
        }
    }

    public function insertSessionDetails($idUser, $idDevice){
            
       
        $query = $this->connection->prepare("INSERT INTO Session (IdUser, IdDevice, SessionTotalTime) 
                                        VALUES (:idUser, :idDevice, NULL)");
        
        $query->bindValue(":idUser", $idUser);    
        $query->bindValue(":idDevice", $idDevice); 
        $query->bindValue(NULL, NULL); 
    
        $query->execute();

        
        return true;
    }
    
    public function getIdUser($username){

        $query1 = $this->connection->prepare(" SELECT IdUser FROM User WHERE (Username = :username)"); // Buscar IdUser del User logueado actualmente
        $query1->bindValue(":username", $username);
        $query1->execute();

        $userData = $query1->fetch(PDO::FETCH_ASSOC);
        $IdUser = $userData["IdUser"];

        return $IdUser;
    }


}

?>
