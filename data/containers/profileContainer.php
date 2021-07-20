<?php  

class ProfileContainer{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;
    }

    public function showAllProfiles($username){
        $query = $this->connection->prepare(" SELECT *
                                               FROM Profile
                                               WHERE IdUser IN
                                                            (SELECT IdUser
                                                             FROM User
                                                             WHERE Username = :username)"); // Buscar los datos de los perfiles asociados al usuario logueado actualmente
        $query->bindValue(":username", $username);
        $query->execute();
        
        $html = '';

        while($row = $query->fetch(PDO::FETCH_ASSOC)){ // Mostrar todos los perfiles existentes
            $html .= $this->getProfileHtml($row);
        }

        return $html; 

    }

    private function getProfileHtml($sqlData){ // Crear código HTML para un perfil
        $profileName = $sqlData["ProfileName"];
        $profilePhoto = $sqlData["ProfilePhoto"];

        $html = '<div class ="profile"><a href=""><img src="../../assets/images/profiles/';
 
        if($profilePhoto == 1){ // Se muestra la foto de perfil que corrresponde
            $html .= 'blueProfile.png"';
        }
        elseif($profilePhoto == 2){
            $html .= 'redProfile.png"';
        }
        elseif($profilePhoto == 3){
            $html .= 'yellowProfile.png"';
        }
        elseif($profilePhoto == 4){
            $html .= 'greenProfile.png"';
        }
        else{
            $html .= 'purpleProfile.png"';
        }

        return $html . 'title='. $profileName .' alt='. $profileName .'></a><h2>' . $profileName . '</h2></div>';
    }

}

?>