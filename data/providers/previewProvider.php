<?php

class PreviewProvider {

    private $connection;
    private $username;

    public function __construct($connection, $username){
        $this->connection = $connection;
        $this->username = $username;
    }


    public function createPreviewVideo($idContent, $Category = NULL, $idGenre = NULL){
        if ($idContent == null){
            $content = $this->getRandomContent($Category, $idGenre);
        }
        else {
            $content = new Content($this->connection, $idContent);
        }

        $ContentName = $content->getTitleCont();
        $ContentDescription = $content->getContentDescription();
        $idContent = $content->getId();
        $ismovie= $content->ismovie($idContent);

        $preview = $content->getContentPreview();
        $preview = '../../'.$preview;

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
                            <h4>$ContentDescription</h4>
                            <div class='buttons'>

                                <button onclick = 'PlayContent($idContent,$ismovie)'><i class = 'fas fa-play'></i>    Ver</button>
                                <button onclick = 'volumeToggle(this)'><i class = 'fas fa-volume-mute'></i></button>

                            </div>

                        </div>
                    </div>

        
        
        
                </div>";
    }

    public function createSeriesPreview(){

    }


    public function createContentPreviewSquare($content){

        $IdContent = $content->getId();
        $image =  $content->getContentImage();
        $image = '../../'.$image;
        $ContentName = $content->getTitleCont();

        return "<a href = '../../src/content/contentPage.php?IdContent=$IdContent'>
                    <div class = 'smallPreviewContainer'>
                        <img src='$image' title = '$ContentName'>
                    </div>
                </a>";


    }


    private function getRandomContent($Category = NULL, $idGenre = NULL){

        $content = ContentProvider::getContents($this->connection, $idGenre, 1, null, $Category, $idGenre);
        $content = $content[0];

        $idContent = $content->getId();

        $row = $content->getContentData($idContent);

        return new Content($this->connection, $row);
    }


}


?>