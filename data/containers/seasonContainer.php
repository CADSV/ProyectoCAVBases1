<?php

class SeasonContainer {

    private $connection;
    private $username;

    public function __construct($connection, $username){
        $this->connection = $connection;
        $this->username = $username;
    }

    public function showAllSeasons($idContent){
        $query = $this->connection->prepare("SELECT * FROM EpisodicContent WHERE IdContent =:idContent");
        $query->bindValue(":idContent", $idContent);
        $query->execute();
        
        if($query->rowCount() == 0){ // Si no es una serie, retornamos NULL
            return NULL;
        }
        //$content = new Content($this->connection, $idContent);

        $query2 = $this->connection->prepare("SELECT * FROM Season WHERE IdContent =:idContent ORDER BY IdSeason ASC");
        $query2->bindValue(":idContent", $idContent);
        $query2->execute();

        $html = "<div class = 'previewCategories'>"; 
        $contentData = $query->fetch(PDO::FETCH_ASSOC);

        while($row = $query2->fetch(PDO::FETCH_ASSOC)){
            $html .= $this->getSeasonHtml($row, $contentData);
        }

        return $html."</div>";

    }

    private function getSeasonHtml($seasonData, $contentData){ 
        $SeasonName = $seasonData["SeasonName"];
        $IdSeason = $seasonData["IdSeason"];
        $html = "<div class='genreCategory'>
                    <h2>Temporada $IdSeason";
        if ($SeasonName == NULL){ // Si la temporada no tiene nombre, se coloca simplemente "Temporada X"
            $html .= "</h2>
                      <div class = 'contents'>";
        }
        else{
            $html .= ": $SeasonName</h2>
                    <div class = 'contents'>";
        }
        
        $query = $this->connection->prepare("SELECT * FROM Episode WHERE IdSeason =:idSeason AND IdContent =:idContent ORDER BY IdEpisode ASC");
        $query->bindValue(":idSeason", $IdSeason);
        $query->bindValue(":idContent", $seasonData["IdContent"]);
        $query->execute();

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $html .= $this->getEpisodeHtml($row, $seasonData, $contentData);
        }

        return $html . "    </div>
                        </div>";
    }

    private function getEpisodeHtml($episodeData, $seasonData, $contentData){
        $EpisodeName = $episodeData["EpisodeName"];      
        $IdContent = $contentData["IdContent"];
        $IdSeason = $seasonData["IdSeason"];
        $IdEpisode = $episodeData["IdEpisode"];
        $ContentImage =  $contentData["ContentImage"];
        $ContentImage = '../../'.$ContentImage;

        // El signo de interrogación (question mark) marca el inicio de los parámetros de URL. Con "&" se puede declarar más de uno
        $html = "<a href = '../../src/content/episodePage.php?IdContent=$IdContent&IdSeason=$IdSeason&IdEpisode=$IdEpisode'>
                        <div class = 'smallPreviewContainer'>
                            <div class = 'episodeInfo' >
                                <img src='$ContentImage' title = 'Episodio $IdEpisode'>
                                <h3>E$IdEpisode: $EpisodeName</h3>
                            </div>";

        if($EpisodeName == NULL){ // Si el episodio no tiene nombre, se coloca simplemente "Temporada X"
            $html .= "'> </div> </a>";
        }
        else{
            $html .= "</div> </a>";
        }

        return $html;
    }

}


?>