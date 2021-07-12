<?php  

class RegisterAccount{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;

    }

    public function register($name, $lastName, $username, $email, $email2, $password, $password2, $phoneNumber, $gender, $city){
        $this->validateName($name);
        $this->validateLastName($lastName);
        $this->validateUsername($username);
        $this->validateEmail($email, $email2);
        $this->validatePasswords($password, $password2);
        $this->validatePhonenumber($phoneNumber);

        if(empty($this->errorAray)){
            return $this->insertUserDetails($name, $lastName, $username, $email, $password, $phoneNumber, $gender, $city);
        }

        return false;
    }

    private function insertUserDetails($name, $lastName, $username, $email, $password, $phoneNumber, $gender, $city){
            
        $password = hash("sha512", $password);
        $query = $this->connection->prepare("INSERT INTO User (NameUser, LastNameUser, Username, EmailUser, PasswordUser, UserPhone, UserGender, IdCity) 
                                        VALUES (:name, :lastName, :username, :email, :password, :phoneNumber, :gender, :city)");
        
        $query->bindValue(":name", $name);    
        $query->bindValue(":lastName", $lastName); 
        $query->bindValue(":username", $username); 
        $query->bindValue(":email", $email); 
        $query->bindValue(":password", $password); 
        $query->bindValue(":phoneNumber", $phoneNumber); 
        $query->bindValue(":gender", $gender); 
        $query->bindValue(":city", $city);    
        

        if ($query->execute()){ // Retorna true si funcionó la inserción en la base de datos, false si no

            $query2 = $this->connection->prepare(" SELECT IdUser FROM User WHERE (Username = :username)"); // Buscar IdUser del User logueado actualmente
            $query2->bindValue(":username", $username);
            $query2->execute();

            $userData = $query2->fetch(PDO::FETCH_ASSOC);
            $IdUser = $userData["IdUser"];

            $query3 = $this->connection->prepare("INSERT INTO Profile (IdUser, ProfilePhoto, ProfileName)    
                                                VALUES ( :IdUser, :ProfilePhoto, :ProfileName) ");       //Profile 1
            $query3->bindValue(":IdUser", $IdUser);
            $query3->bindValue(":ProfilePhoto", 3);
            $query3->bindValue(":ProfileName", $username);
            $query3->execute();


            $query4 = $this->connection->prepare("INSERT INTO Profile (IdUser, ProfilePhoto, ProfileName)    
                                                VALUES ( :IdUser, :ProfilePhoto, :ProfileName) ");       //Profile 2
            $query4->bindValue(":IdUser", $IdUser);
            $query4->bindValue(":ProfilePhoto", 1);
            $query4->bindValue(":ProfileName", $username."2");
            $query4->execute();


            $query5 = $this->connection->prepare("INSERT INTO Profile (IdUser, ProfilePhoto, ProfileName)    
                                                VALUES ( :IdUser, :ProfilePhoto, :ProfileName) ");       //Profile 3
            $query5->bindValue(":IdUser", $IdUser);
            $query5->bindValue(":ProfilePhoto", 2);
            $query5->bindValue(":ProfileName", $username."3");
            $query5->execute();


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

    private function validateUsername($username){ 
        if(strlen($username)< 2 || strlen($username)> 25){              //Valida la Longitud del usuario
            array_push($this->errorArray, Constants::$usernameLength);
            return;
        }
        $query = $this->connection->prepare("SELECT * FROM User WHERE Username=:username");        
        $query->bindValue(":username", $username);
        $query->execute();
        
        if($query->rowCount()!= 0){                         //Valida si no existe el nombre de usuario
            array_push($this->errorArray, Constants::$usernameTaken);

        }
    }

    private function validateEmail($email, $email2){
        if ($email != $email2){
            array_push($this->errorArray, Constants::$emailsDontMatch);
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->connection->prepare("SELECT * FROM User WHERE EmailUser=:email");
        $query->bindValue(":email", $email);
        $query->execute();

        if($query->rowCount()!= 0){                         //Valida si no existe el nombre de usuario
            array_push($this->errorArray, Constants::$emailTaken);
        }

    }

    private function validatePasswords($password, $password2){
        if ($password != $password2){
            array_push($this->errorArray, Constants::$passwordsDontMatch);
            return;
        }
        if(strlen($password)< 5 || strlen($password)> 25){
            array_push($this->errorArray, Constants::$passwordLength);
        }

    }

    private function validatePhonenumber($phoneNumber){
        if ($phoneNumber <1000000000 || $phoneNumber>9999999999){
            array_push($this->errorArray, Constants::$phoneNumberincorrect);
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
