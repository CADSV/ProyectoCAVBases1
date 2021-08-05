<?php

class CategoryContainer {

    private $connection;
    private $username;

    public function __construct($connection, $username){
        $this->connection = $connection;
        $this->username = $username;
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


    private function getCategoryHtml($sqlData, $title, $Category = NULL, $UsedIdContent = NULL){  // episodicContent y featureContent son booleanos sobre si queremos mostrar series o pelis

        $IdGenre = $sqlData["IdGenre"];
        $title = $title == null ? $sqlData["GenreName"] : $title;

        $contents = ContentProvider::getContents($this->connection, $IdGenre, 8, $UsedIdContent, $Category);

        if(sizeof($contents) == 0 ){
            return;
        }

        $contentHtml = "";
        $previewProvider = new PreviewProvider($this->connection, $this->username);

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