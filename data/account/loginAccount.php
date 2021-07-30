<?php  
error_reporting(E_ALL ^ E_WARNING);
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

    public function UpdateSessionDuration($idUser){

        $query = $this->connection->prepare(" SELECT ConStartDate FROM Session WHERE (IdUser = :idUser) AND (SessionTotalTime IS NULL)");
        $query->bindValue(":idUser", $idUser);            
        
        $query->execute();
        $sessionData = $query->fetch(PDO::FETCH_ASSOC);
        $ConStartDate = $sessionData["ConStartDate"];

        $start_date = new DateTime($ConStartDate);
        $time = new DateTime();
        $timeactual=$time->getTimestamp();
        $dt = new DateTime("@$timeactual");  // convert UNIX timestamp to PHP DateTime
        $timestamp= $dt->format('Y-m-d H:i:s'); 
   
        $since_start = $start_date->diff(new DateTime($timestamp));
        $num = (int) $since_start->h;
        $num = $num-4;
        $timefinal = $num.":".$since_start->i.":".$since_start->s;
        //echo $timefinal;
        //echo $since_start->days.' days total<br>';
        //echo $since_start->y.' years<br>';
        //echo $since_start->m.' months<br>';
        // echo $since_start->d.' days<br>';
        // echo $since_start->h.' hours<br>';
        //echo $since_start->i.' minutes<br>';
        //echo $since_start->s.' seconds<br>';

      

        $query2 = $this->connection->prepare("UPDATE Session SET SessionTotalTime = :timefinal WHERE (IdUser = :idUser) AND (SessionTotalTime IS NULL)");
        $query2->bindValue(":idUser", $idUser);  
        $query2->bindValue(":timefinal", $timefinal);           
        $query2->execute();
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
