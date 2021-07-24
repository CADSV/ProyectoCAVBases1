<?php  
error_reporting(E_ALL ^ E_WARNING);


class IndexAccount{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;

    }

}

?>