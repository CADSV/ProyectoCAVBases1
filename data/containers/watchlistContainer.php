<?php

class WatchlistContainer {

    private $connection;
    private $username;

    public function __construct($connection, $username){
        $this->connection = $connection;
        $this->username = $username;
    }


    public function showWatchlist($IdProfile){
        $query = $this->connection->prepare("SELECT * FROM Watchlist WHERE (IdProfile =:IdProfile)");
        $query->bindValue(":IdProfile", $IdProfile);
        $query->execute();

        $html = "<div class = 'previewCategories noScroll watchlist'>";

        if($query->rowCount() !=0){
            $watchlist = new CategoryContainer($this->connection, $this->username);
            $html .= $watchlist->getCategoryHtml(NULL,'Mi Lista', 3, NULL, $IdProfile);
        } else {
            $html .= "<h2 class = 'watchlistAlert'>AGREGUE CONTENIDOS A SU LISTA</h2>";
        }

        return $html."</div>";
    }
}
?>