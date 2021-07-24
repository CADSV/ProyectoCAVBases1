<?php  
error_reporting(E_ALL ^ E_WARNING);


class IndexAccount{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;

    }


    private function globalPlan(){

        $query = $this->connection -> prepare( "SELECT IdMembership FROM IsSuscribed
                                                GROUP BY IdMembership
                                                HAVING COUNT(IdMembership) =
                                                                            (SELECT MAX(myTable.myCount)
                                                                            FROM (  SELECT COUNT(IdMembership) as myCount
                                                                                    FROM IsSuscribed
                                                                                    GROUP BY IdMembership) as myTable)
                                                ORDER BY IdMembership DESC");

        $query->execute();
        

        if($query->rowCount()== 1){ 

            $planIdData = $query->fetch(PDO::FETCH_ASSOC);
            $globalIdPlan = $planIdData["IdMembership"];

        } else {

            $planIdData = $query->fetch(PDO::FETCH_BOTH);
            $globalIdPlan = $planIdData[0];
        }
        
        $query2 = $this->connection->prepare(" SELECT MembershipName FROM Membership WHERE (IdMembership = :IdMembership)");
        $query2->bindValue(":IdMembership", $globalIdPlan);
        $query2->execute();

        $membershipData = $query2->fetch(PDO::FETCH_ASSOC);
        $globalPlanName = $membershipData["MembershipName"];


        return $globalPlanName;
    }


    public function countryPlan($countryName) {

        $query = $this->connection->prepare("SELECT CP.IdMembership
                                            FROM ( SELECT I.IdMembership
                                                    FROM Membership as M, User as U, City as Ci, Country as Co, IsSuscribed as I
                                                    WHERE (I.IdUser = U.IdUser) AND (U.IdCity = Ci.IdCity) AND (Ci.IdCountry = Co.IdCountry) AND (Co.CountryName = :countryName)
                                                    GROUP BY U.IdUser) as CP  -- CP: Country Plans
                                            GROUP BY CP.IdMembership
                                            HAVING COUNT(CP.IdMembership) =
                                                                    (SELECT MAX(myTable.myCount)
                                                                    FROM (  SELECT COUNT(CP.IdMembership) as myCount
                                                                    FROM ( SELECT I.IdMembership
                                                                            FROM Membership as M, User as U, City as Ci, Country as Co, IsSuscribed as I
                                                                            WHERE (I.IdUser = U.IdUser) AND (U.IdCity = Ci.IdCity) AND (Ci.IdCountry = Co.IdCountry) AND (Co.CountryName = :countryName)
                                                                            GROUP BY U.IdUser) as CP
                                                                    GROUP BY CP.IdMembership) as myTable)
                                            ORDER BY CP.IdMembership DESC");
        $query->bindValue(":countryName", $countryName);
        $query->execute();

        if ($query->rowCount() == 0){

            return $this->globalPlan();

        }  else if($query->rowCount()== 1){ 

            $planIdData = $query->fetch(PDO::FETCH_ASSOC);
            $countryIdPlan = $planIdData["IdMembership"];

        } else {

            $planIdData = $query->fetch(PDO::FETCH_BOTH);
            $countryIdPlan = $planIdData[0];
        }
        
        $query2 = $this->connection->prepare(" SELECT MembershipName FROM Membership WHERE (IdMembership = :IdMembership)");
        $query2->bindValue(":IdMembership", $countryIdPlan);
        $query2->execute();

        $membershipData = $query2->fetch(PDO::FETCH_ASSOC);
        $countryPlanName = $membershipData["MembershipName"];


        return $countryPlanName;


    }

}

?>