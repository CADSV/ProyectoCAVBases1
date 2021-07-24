<?php  
error_reporting(E_ALL ^ E_WARNING);


class IndexAccount{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;

    }


    public function globalPlan(){

        $query = $this->connection -> prepare( "SELECT IdMembership FROM IsSuscribed
                                                GROUP BY IdMembership
                                                HAVING COUNT(IdMembership) =
                                                                            (SELECT MAX(myTable.myCount)
                                                                            FROM (  SELECT COUNT(IdMembership) as myCount
                                                                                    FROM IsSuscribed
                                                                                    GROUP BY IdMembership) as myTable)
                                                ORDER BY IdMembership");

        $query->execute();
        $planIdData = $query->fetch(PDO::FETCH_ASSOC);

        if($query->rowCount()== 1){ 

            $globalIdPlan = $planIdData["IdMembership"];

        } else {

            $fila = mysql_fetch_row($planIdData);
            $globalIdPlan = $fila[(rowCount())-1];
        }
        
        $query2 = $this->connection->prepare(" SELECT MembershipName FROM Membership WHERE (IdMembership = :IdMembership)");
        $query2->bindValue(":IdMembership", $globalIdPlan);
        $query2->execute();

        $membershipData = $query2->fetch(PDO::FETCH_ASSOC);
        $globalPlanName = $membershipData["MembershipName"];


        return $globalPlanName;
    }

}

?>