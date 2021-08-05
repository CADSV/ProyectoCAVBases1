<?php

class ContentProvider {


    // $limit indica la cantidad de contenidos que queremos obtener
    // Si $IdGenre es null, traerá todos los contenidos de todas las categorías
    // $UsedIdContent existe si se está viendo un contenido acutalmente, por lo que se excluirá de las recomendaciones
    public static function getContents($connection, $IdGenre, $limit, $UsedIdContent = NULL, $Category = NULL){

        if($Category == 1){ // Series
            $sql = "SELECT IsAbout.IdContent FROM IsAbout INNER JOIN EpisodicContent ON IsAbout.IdContent = EpisodicContent.IdContent ";
        }
        elseif($Category == 2){ // Películas
            $sql = "SELECT IsAbout.IdContent FROM IsAbout INNER JOIN FeatureContent ON IsAbout.IdContent = FeatureContent.IdContent ";
        }
        else{ // Todo
            $sql = "SELECT IdContent FROM IsAbout ";
        }

        if($IdGenre != null){

            $sql .= "WHERE (IdGenre =:IdGenre) AND (Relevance = 1) ";

            if($UsedIdContent){
                $sql .= "AND (IdContent <>:UsedIdContent) ";
            }

        }

        $sql .= "ORDER BY RAND() LIMIT :limit";

        $query = $connection->prepare($sql);

        if($IdGenre != null) {

            $query->bindValue(":IdGenre", $IdGenre);

            if($UsedIdContent){
                $query->bindValue(":UsedIdContent", $UsedIdContent);
            }
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