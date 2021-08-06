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

    public function getAverageRating(){
        $query = $this->connection->prepare("SELECT CAST(AVG(Rating) AS DECIMAL(10,1)) FROM HasSeen WHERE IdContent =:idContent");
        $query->bindValue(":idContent", $this->getId());
        $query->execute();
        $Rating = $query->fetch(PDO::FETCH_ASSOC)["CAST(AVG(Rating) AS DECIMAL(10,1))"]; 
        return $Rating;
    }


    public function ismovie($IdContent){
        $query = $this->connection->prepare("SELECT * FROM featurecontent WHERE IdContent= :idcontent ");
            $query->bindValue(":idcontent", $IdContent);
            $query->execute();
            if($query->rowCount()!= 0){
                return 1;
            }else{
                return 0;
            }

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

    public function updateHasseen($Idprofile, $IdContent){
        $query = $this->connection->prepare("SELECT * FROM Hasseen WHERE IdProfile =:Idprofile AND IdContent=:IdContent ");
        $query->bindValue(":IdContent", $IdContent);
        $query->bindValue(":Idprofile", $Idprofile);
        $query->execute();
        
        if($query->rowCount()!= 0){  
            
            $query2 = $this->connection->prepare("UPDATE Hasseen SET TimesSeen=TimesSeen+1, LastDateWatched=CURRENT_TIMESTAMP WHERE IdProfile =:Idprofile AND IdContent=:IdContent ");
            $query2->bindValue("IdContent", $IdContent);
            $query2->bindValue(":Idprofile", $Idprofile);
            $query2->execute();
                     
        }else{
             $query2 = $this->connection->prepare("INSERT INTO  Hasseen (IdProfile, IdContent, Rating, WatchedByRecomm, TimesSeen, LastMinWatched,TimeWatchedLastTime) 
                                                    VALUES (:IdProfile, :IdContent, :Rating, :WatchedByRecomm, :TimesSeen, :LastMinWatched,:TimeWatchedLastTime)"); 
               $query2->bindValue(":IdProfile", $Idprofile);
               $query2->bindValue(":IdContent", $IdContent);
                $query2->bindValue(":Rating", NULL);
                $query2->bindValue(":WatchedByRecomm", TRUE);
                $query2->bindValue(":TimesSeen", 1);
                $query2->bindValue(":LastMinWatched", '00:00:00');
                $query2->bindValue(":TimeWatchedLastTime", '00:00:00');
                $query2->execute();

        }

    }



    public function updateHasseenOf($IdProfile, $IdContent){
        $query = $this->connection->prepare("SELECT IdGenre  FROM isabout WHERE IdContent =:IdContent");
        $query->bindValue(":IdContent", $IdContent);
        $query->execute();
        //echo $query->rowCount();
        $cont=0;
        while( $Generos=$query->fetch(PDO::FETCH_ASSOC)["IdGenre"]){
            //echo 'Hello';
            //$Generos=$query->fetch(PDO::FETCH_ASSOC)["IdGenre"];
            $query2 = $this->connection->prepare("SELECT *  FROM hasseenof WHERE IdProfile =:IdProfile AND IdGenre=:IdGenre");
            $query2->bindValue(":IdProfile", $IdProfile);
            $query2->bindValue(":IdGenre", $Generos);
            $query2->execute();
            if($query2->rowCount()!= 0){
                $query3 = $this->connection->prepare("UPDATE hasseenof SET TimesSeen=TimesSeen+1 WHERE IdProfile =:IdProfile AND IdGenre=:IdGenre ");
                $query3->bindValue(":IdProfile", $IdProfile);
                $query3->bindValue(":IdGenre", $Generos);
                $query3->execute();
                //echo 'Hello1';
            }else{
                $query3 = $this->connection->prepare("INSERT INTO hasseenof (IdProfile, IdGenre, TimesSeen, TotalSeenTime)  
                                                             VALUES (:IdProfile, :IdGenre, :TimesSeen, :TotalSeenTime)");
                $query3->bindValue(":IdProfile", $IdProfile);
                $query3->bindValue(":IdGenre", $Generos);
                $query3->bindValue(":TimesSeen", 1);
                $query3->bindValue(":TotalSeenTime",'01:40:04');
                $query3->execute();
                //echo 'Hello2';

            }

            $cont=$cont+1;
            //echo $Generos;

            if ($cont==$query->rowCount()){
                break;
            }
            
        }

    }

    public function getEpisodeVideo($idContent, $idseason, $idepisode){
        $query = $this->connection->prepare("SELECT EpisodeVideo FROM episode WHERE IdContent =:idContent AND IdSeason=:Idseason AND IdEpisode=:idepisode ");
        $query->bindValue(":idContent", $idContent);
        $query->bindValue(":Idseason", $idseason);
        $query->bindValue(":idepisode",$idepisode);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC)["EpisodeVideo"];
    }

    public function getMovieVideo($IdContent){
        $query = $this->connection->prepare("SELECT ContentVideo FROM featurecontent WHERE IdContent =:idContent");
        $query->bindValue(":idContent", $IdContent);

        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC)["ContentVideo"];
    }


    public function getStarsNames($IdContent){

        $query = $this->connection->prepare("SELECT WorkerName, WorkerLastName FROM FilmWorker
                                            WHERE (IdWorker IN (SELECT IdWorker FROM Stars 
                                                                WHERE (IdContent =:IdContent) 
                                                                ORDER BY Role ASC))");
        $query->bindValue(":IdContent", $IdContent);
        $query->execute();

        $starsNames = 'Actores: ';

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $starsNames .= $row["WorkerName"].' '.$row["WorkerLastName"].'. ';
        }

        return $starsNames;

    }


    public function getDirectorsNames($IdContent){

        $query = $this->connection->prepare("SELECT WorkerName, WorkerLastName FROM FilmWorker
                                            WHERE IdWorker IN (SELECT IdWorker FROM Directed 
                                                                WHERE (IdContent =:IdContent))");
        $query->bindValue(":IdContent", $IdContent);
        $query->execute();
        $directorNames = 'Director: ';

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $directorNames .= $row["WorkerName"].' '.$row["WorkerLastName"].'. ';
        }
        
        return $directorNames;

    }

    public function getContentRecommended($IdProfile){
        $query = $this->connection->prepare("SELECT distinct(IsAbout.IdContent)   
                                            FROM IsAbout
                                            INNER JOIN Hasseenof on HasseenOf.IdGenre = IsAbout.IdGenre
                                            WHERE Hasseenof.IdProfile = :IdProfile AND IsAbout.IdContent NOT in (SELECT Idcontent   
                                                                                                        FROM   HASseen
                                                                                                        WHERE IdProfile = :IdProfile )
                                            ORDER BY RAND() LIMIT 1");
        $query->bindValue(":IdProfile", $IdProfile);   
        $query->execute();    
        if($query->rowCount()!= 0){
           return $query->fetch(PDO::FETCH_ASSOC)["IdContent"];
        }
        return NULL;
                  
    }


    public function isInWatchlist($IdContent, $IdProfile){

        $query = $this->connection->prepare("SELECT * FROM Watchlist
                                            WHERE (IdProfile =:IdProfile) AND (IdContent =:IdContent)");
        $query->bindValue("IdProfile", $IdProfile);
        $query->bindValue("IdContent", $IdContent);
        $query->execute();

        if($query->rowCount() != 0){
            return true;
        }

        return false;
    }


    public function addRating($IdProfile, $IdContent, $Rating){

        $query = $this->connection->prepare("SELECT * FROM HasSeen
                                            WHERE (IdProfile =:IdProfile) AND (IdContent =:IdContent)");
        $query->bindValue("IdProfile", $IdProfile);
        $query->bindValue("IdContent", $IdContent);
        $query->execute();

        if($query->rowCount() == 0){
            return false;
        }

        $query2 = $this->connection->prepare("UPDATE HasSeen
                                            SET Rating =:Rating
                                            WHERE (IdProfile =:IdProfile) AND (IdContent =:IdContent)");
        $query2->bindValue("Rating", $Rating);
        $query2->bindValue("IdProfile", $IdProfile);
        $query2->bindValue("IdContent", $IdContent);
        $query2->execute();

        return true;
        
    }


}




?>