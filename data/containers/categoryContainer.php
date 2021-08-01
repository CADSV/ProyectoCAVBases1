<?php

class CategoryContainer {

    private $connection;
    private $username;

    public function __construct($connection, $username){
        $this->connection = $connection;
        $this->username = $username;
    }



    public function showAllCategories() {

        $query = $this->connection->prepare("SELECT * FROM Genre");
        $query->execute();

        $html = "<div class = 'previewCategories'>";

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $html .= $this->getCategoryHtml($row, null, true, true);
        }

        return $html."</div>";
    }


    private function getCategoryHtml($sqlData, $title, $episodicContent, $featureContent){  // episodicContent y featureContent son booleanos sobre si queremos mostrar series o pelis

        $categoryId = $sqlData["IdGenre"];
        $title = $title == null ? $sqlData["GenreName"] : $title;

        if($episodicContent && $featureContent){

            $contents = ContentProvider::getIdContents($this->connection, $categoryId, 5);

        } else if ($episodicContent){
            // Obtienes las series 

        } else {
            // Obtienes las pelis
        }


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

        return $contentHtml . "<br>";

    }



}

?>