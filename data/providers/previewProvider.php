<?php

class PreviewProvider {

    private $connection;
    private $username;

    public function __construct($connection, $username){
        $this->connection = $connection;
        $this->username = $username;
    }


    public function createPreviewVideo($content){
        if ($content == null){
            $content = $this->getRandomContent();
        }
        $ContentName = $content->getTitleCont();
        //echo $ContentName;
        $idContent = $content->getId();
       // echo $idContent;
        $preview = $content->getContentPreview();
        $preview = '../../'.$preview;
        //echo $preview;
        //$video = $content->getContentVideo();
        $image =  $content->getContentImage();
        $image = '../../'.$image;

        //Agregar episodio y temporada como subtítulo

        return " <div class='previewContainer'>

                    <img src='$image' class='previewImage' hidden>

                    <video autoplay muted class='previewVideo' onended='previewEnded()'>
                        <source src ='$preview' type ='video/mp4'>
                    </video>

                    <div class='previewOverlay'>
                        <div class= 'mainDetails'>
                            <h3>$ContentName</h3>
                            <div class='buttons'>

                                <button><i class = 'fas fa-play'></i>   Play</button>
                                <button onclick = 'volumeToggle(this)'><i class = 'fas fa-volume-mute'></i></button>

                            </div>

                        </div>
                    </div>

        
        
        
                </div>";


    }

    private function getRandomContent(){

        $content = ContentProvider::getIdContents($this->connection, null, 1);
        $content = $content[0];

        // $query = $this->connection->prepare("SELECT idcontent FROM content ORDER BY RAND() LIMIT 1");
        // $query->execute();

        // $row = $query->fetch(PDO::FETCH_ASSOC);
        // $idContent=$row["idcontent"];
        $idContent = $content->getId();

        $query2 = $this->connection->prepare("SELECT * FROM featurecontent WHERE IdContent= :idcontent");
        $query2->bindValue(":idcontent", $idContent);
        $query2->execute();

    
        if($query2->rowCount()!= 0){  
            $row = $query2->fetch(PDO::FETCH_ASSOC);
            $TitleContent=$row["TitleCont"];
           // echo $TitleContent;                    
           
        }else{
            $query3 = $this->connection->prepare("SELECT * FROM episodiccontent WHERE IdContent= :idcontent");
            $query3->bindValue(":idcontent", $idContent);
            $query3->execute();
            $row = $query3->fetch(PDO::FETCH_ASSOC);
            $TitleContent=$row["TitleCont"];
           // echo $TitleContent;
        }

        return new Content($this->connection, $row);
    }


}


?>