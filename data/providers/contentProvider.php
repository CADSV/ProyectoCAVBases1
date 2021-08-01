<?php

class ContentProvider {


    // $limit indica la cantidad de contenidos que queremos obtener
    // Si $IdGenre es null, traerá todos los contenidos de todas las categorías
    public static function getIdContents($connection, $IdGenre, $limit){

        $sql = "SELECT IdContent FROM IsAbout ";

        if($IdGenre != null){

            $sql .= "(WHERE IdGenre =: IdGenre) AND (Relevance = 1) ";

        }

        $sql .= "ORDER BY RAND() LIMIT :limit";

        $query = $connection->prepare($sql);

        if($IdGenre != null) {

            $query->bindValue(":Idgenre", $IdGenre);
        }

        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = new Content($connection, $row);
        }

        return $result;

    }


}

?>