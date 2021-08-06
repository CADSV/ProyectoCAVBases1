<?php
require_once("../config.php");

if(isset($_POST["IdContent"]) && isset($_POST["IdProfile"])) {
    $query = $connection->prepare("DELETE FROM Watchlist 
                                    WHERE (IdContent =:IdContent) AND (IdProfile =:IdProfile)");

    $query->bindValue(":IdContent", $_POST["IdContent"]);
    $query->bindValue(":IdProfile", $_POST["IdProfile"]);

    $query->execute();
}
?>