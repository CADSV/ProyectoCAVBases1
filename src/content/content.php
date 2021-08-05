<?php

class Content {

    private $connection, $DATA;

    public function __construct($connection, $input){
        $this->connection = $connection;

        if (is_array ($input)){
            $this->DATA = $input;
        }
        else{
            $query = $this->connection->prepare("SELECT * FROM featurecontent WHERE IdContent= :idcontent ");
            $query->bindValue(":idcontent", $input);
            $query->execute();
            if($query->rowCount()!= 0){
                $this->DATA= $query->fetch(PDO::FETCH_ASSOC);
        
            }else{
                $query2 = $this->connection->prepare("SELECT * FROM episodiccontent WHERE IdContent= :idcontent ");
                $query2->bindValue(":idcontent", $input);
                $query2->execute();
                $this->DATA= $query2->fetch(PDO::FETCH_ASSOC);
            }
        }
        
    }

    public function getId(){
        return $this->DATA["IdContent"];
    }

    public function getTitleCont(){
        return $this->DATA["TitleCont"];
    }

    public function getContentImage(){
        return $this->DATA["ContentImage"];
    }

    public function getContentPreview(){
        return $this->DATA["ContentPreview"];
    }

    public function getContentVideo(){
        return $this->DATA["ContentVideo"];
    }

    public function getContentDescription(){
        return $this->DATA["Description"];
    }

    public function getContentGenre(){
        $query = $this->connection->prepare("SELECT Genre.IdGenre 
                                             FROM Genre 
                                             INNER JOIN IsAbout ON Genre.IdGenre = IsAbout.IdGenre
                                             WHERE IdContent =:idContent AND Relevance = 1");
        $query->bindValue(":idContent", $this->getId());
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC)["IdGenre"];
    }

    public function getContentData($idContent){

        $query2 = $this->connection->prepare("SELECT * FROM featurecontent WHERE IdContent= :idcontent");
        $query2->bindValue(":idcontent", $idContent);
        $query2->execute();

    
        if($query2->rowCount()!= 0){  
            $row = $query2->fetch(PDO::FETCH_ASSOC);          
        }
        else{
            $query3 = $this->connection->prepare("SELECT * FROM episodiccontent WHERE IdContent= :idcontent");
            $query3->bindValue(":idcontent", $idContent);
            $query3->execute();
            $row = $query3->fetch(PDO::FETCH_ASSOC);         
        }

        return $row;
    }



}

?>