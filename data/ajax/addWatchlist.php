<?php
require_once("../config.php");

if(isset($_POST["IdContent"]) && isset($_POST["IdProfile"])) {
    $query = $connection->prepare("INSERT INTO Watchlist (IdProfile, IdContent)
                                    VALUES (:IdProfile, :IdContent)");

    $query->bindValue(":IdContent", $_POST["IdContent"]);
    $query->bindValue(":IdProfile", $_POST["IdProfile"]);

    $query->execute();
}
?>