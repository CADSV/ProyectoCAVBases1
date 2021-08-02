<?php

class PreviewProvider {

    private $connection;
    private $username;

    public function __construct($connection, $username){
        $this->connection = $connection;
        $this->username = $username;
    }


    public function createPreviewVideo($idContent){
        if ($idContent == null){
            $content = $this->getRandomContent();
        }
        else {
            $content = new Content($this->connection, $idContent);
        }

        $ContentName = $content->getTitleCont();
        $ContentDescription = $content->getContentDescription();

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

                                <button><i class = 'fas fa-play'></i>    Ver</button>
                                <button onclick = 'volumeToggle(this)'><i class = 'fas fa-volume-mute'></i></button>

                            </div>

                        </div>
                    </div>

        
        
        
                </div>";


    }


    public function createContentPreviewSquare($content){

        $IdContent = $content->getId();
        $image =  $content->getContentImage();
        $image = '../../'.$image;
        $ContentName = $content->getTitleCont();

        return "<a href = '../../src/content/contentPage.php?id=$IdContent'>
                    <div class = 'smallPreviewContainer'>
                        <img src='$image' title = '$ContentName'>
                    </div>
                </a>";


    }


    private function getRandomContent(){

        $content = ContentProvider::getIdContents($this->connection, null, 1);
        $content = $content[0];

        $idContent = $content->getId();

        $row = $content->getContentData($idContent);

        return new Content($this->connection, $row);
    }


}


?>