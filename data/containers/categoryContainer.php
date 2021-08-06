<?php

class CategoryContainer {

    private $connection;
    private $idProfile;

    public function __construct($connection, $idProfile){
        $this->connection = $connection;
        $this->idProfile = $idProfile;
    }



    public function showCategories($Category = NULL, $idGenre = NULL) {
        $sql = "SELECT * FROM Genre";

        if($idGenre){
            $sql .= " WHERE IdGenre =:idGenre";
        }

        $query = $this->connection->prepare($sql);

        if($idGenre){
            $query->bindValue(":idGenre", $idGenre);
        }

        $query->execute();

        $html = "<div class = 'previewCategories'>";

        if(!$Category){
            $html .= $this->getRecommendations($this->idProfile);
        }

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $html .= $this->getCategoryHtml($row, NULL, $Category);
        }

        return $html."</div>";
    }

    public function showCategory($idGenre, $title = NULL, $UsedIdContent){
        $query = $this->connection->prepare("SELECT * FROM Genre WHERE IdGenre =:idGenre");
        $query->bindValue(":idGenre", $idGenre);
        $query->execute();

        $html = "<div class = 'previewCategories noScroll'>";

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $html .= $this->getCategoryHtml($row, $title, NULL, $UsedIdContent);
        }

        return $html."</div>";
    }

    private function getRecommendations($idProfile, $Category = NULL, $UsedIdContent = NULL){
        // Obtener los 3 géneros más vistos por el perfil
        $query = $this->connection->prepare("SELECT IdGenre 
                                             FROM HasSeenOf 
                                             WHERE IdProfile =:idProfile
                                             ORDER BY TimesSeen DESC
                                             LIMIT 3");
        $query->bindValue(":idProfile", $idProfile);
        $query->execute();

        if(empty($query)){
            return NULL;
        }

        $rContents = array();

        // Obtener el contenido con mejor rating de cada género obtenido anteriormente
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $query2 = $this->connection->prepare("SELECT IsAbout.IdContent, AVG(Rating)
                                                  FROM IsAbout
                                                  INNER JOIN HasSeen ON IsAbout.IdContent = HasSeen.IdContent
                                                  WHERE IdGenre =:idGenre AND Relevance = 1
                                                  GROUP BY IsAbout.IdContent
                                                  ORDER BY AVG(Rating) DESC
                                                  LIMIT 1");
            $query2->bindValue(":idGenre", $row["IdGenre"]);
            $query2->execute();

            if(!empty($query2)){
                array_push($rContents, $query2->fetch(PDO::FETCH_ASSOC)["IdContent"]);
            }      
        }

        $previewProvider = new PreviewProvider($this->connection, $this->idProfile);

        $html = "<div class='genreCategory'>
                    <h2>Contenidos Recomendados</h2>
                    <div class = 'contents'>";

        $contentHtml = '';

        // Crear html para cada contenido obtenido anteriormente
        if(!empty($rContents)){ 
            foreach($rContents as $IdContent){
                $content = new Content($this->connection, $IdContent);
                $contentHtml .= $previewProvider->createContentPreviewSquare($content);
            }
            return $html . $contentHtml . "</div></div>";
        }
        else{
            return NULL;
        }
    }

    private function getCategoryHtml($sqlData, $title, $Category = NULL, $UsedIdContent = NULL){  // episodicContent y featureContent son booleanos sobre si queremos mostrar series o pelis

        $IdGenre = $sqlData["IdGenre"];
        $title = $title == null ? $sqlData["GenreName"] : $title;

        $contents = ContentProvider::getContents($this->connection, $IdGenre, 8, $UsedIdContent, $Category);

        if(sizeof($contents) == 0 ){
            return;
        }

        $contentHtml = "";
        $previewProvider = new PreviewProvider($this->connection, $this->idProfile);

        foreach($contents as $content) {
            $IdContent = $content->getId(); // Primero obtienes el ID
            $contentData = $content->getContentData($IdContent);    // Luego a partir del Id obtienes la data
            $content = new Content($this->connection, $contentData);    // Con la data creas el objeto Content
            // $contentHtml .= $content->getTitleCont();   // Y ahora si puedes operar con él

            $contentHtml .= $previewProvider->createContentPreviewSquare($content);



        }

        $html = "<div class='genreCategory'>
                    <a href='../../src/content/genrePage.php?IdGenre=$IdGenre";

        if($Category){
            $html .= "&Category=$Category";
        }

        return $html . "'>
                                <h2>$title</h2>
                            </a> 
                            <div class = 'contents'>
                                $contentHtml
                            </div>
                        </div>";


    }



}

?>