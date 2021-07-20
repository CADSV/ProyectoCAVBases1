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
        
        $html = '<div class ="profile">';
                /*    <a href="">
                        <img src="../../assets/images/profiles/yellowProfile.png" title="Profile" alt="Profile">
                    </a>
                    <h2><?=$username?></h2>
                </div>';*/

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $html .= $row['ProfileName'];
        }

        return $html . '</div>';

    }

}

?>