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

        return $title . "<br>";

    }

}

?>