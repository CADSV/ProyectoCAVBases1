<?php  

class ProfileContainer{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;
    }

    public function showAllProfiles($username, $op){ // Si op es 1 es selectProfile, si op es 2 es adminProfile
        $query = $this->connection->prepare(" SELECT *
                                               FROM Profile
                                               WHERE IdUser IN
                                                            (SELECT IdUser
                                                             FROM User
                                                             WHERE Username = :username)"); // Buscar los datos de los perfiles asociados al usuario logueado actualmente
        $query->bindValue(":username", $username);
        $query->execute();
        
        $html = '';

        if($op == 1) {
            while($row = $query->fetch(PDO::FETCH_ASSOC)){ // Mostrar todos los perfiles existentes
                $html .= $this->getProfileHtml($row);
            }
        }
        elseif($op == 2) {
            while($row = $query->fetch(PDO::FETCH_ASSOC)){ // Mostrar la administración de todos los perfiles existentes
                $html .= $this->getAdmProfileHtml($row);
            }
        }
        elseif($op == 3) {
            $profilePhotos = [1, 2, 3, 4, 5]; // Números de las imágenes de perfil
            $usedProfilePhotos = array();
            while($row = $query->fetch(PDO::FETCH_ASSOC)){ // Agregar a la lista profilePhotos cada imagen de perfil utilizada
                array_push($usedProfilePhotos, $row["ProfilePhoto"]); 
            }
            $remainingProfilePhotos = array_diff($profilePhotos, $usedProfilePhotos); // Obtener las imágenes de perfil disponibles
            foreach($remainingProfilePhotos as $remainingProfilePhoto){ // Crear código html para cada una de las imágenes de perfil disponibles
                $html .= $this->getProfileInputHtml($remainingProfilePhoto);
            }
            
        }

        return $html; 

    }

    private function getProfileHtml($sqlData){ // Crear código HTML para un perfil
        $profileName = $sqlData["ProfileName"];
        $profilePhoto = $sqlData["ProfilePhoto"];
        $idProfile = $sqlData["IdProfile"];

        $html = '<div class ="profile"><input type="submit" name="profile" value='. $idProfile .' id="'. $profilePhoto .'" required><label for="'. $profilePhoto .'"><img src="../../assets/images/profiles/';
 
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

    private function getAdmProfileHtml($sqlData){ // Crear código HTML para un administración de perfil
        $profileName = $sqlData["ProfileName"];
        $profilePhoto = $sqlData["ProfilePhoto"];
        $idProfile = $sqlData["IdProfile"];

        $html = '<div class ="profile"><input type="submit" name="profile" value='. $idProfile .' id="'. $profilePhoto .'" required><label for="'. $profilePhoto .'"><img src="../../assets/images/profiles/';
 
        if($profilePhoto == 1){ // Se muestra la foto de perfil que corrresponde
            $html .= 'editBlue.png"';
        }
        elseif($profilePhoto == 2){
            $html .= 'editRed.png"';
        }
        elseif($profilePhoto == 3){
            $html .= 'editYellow.png"';
        }
        elseif($profilePhoto == 4){
            $html .= 'editGreen.png"';
        }
        else{
            $html .= 'editPurple.png"';
        }

        return $html . 'title= Administrar'. $profileName .' alt= Administrar'. $profileName .'></a><h2>' . $profileName . '</h2></div>';
    }

    private function getProfileInputHtml($profilePhoto){ // Crear código HTML para inputs de imágenes de perfil
        $html = '<div class ="profile"><input type="radio" name="profilePhoto" value='. $profilePhoto .' id="'. $profilePhoto .'" required><label for="'. $profilePhoto .'"><img src="../../assets/images/profiles/';
 
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

        return $html . '></label></div>';
    }

}

?>