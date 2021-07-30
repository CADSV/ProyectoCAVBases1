<?php  

class CityContainer{

    private $connection;
    private $errorArray = array ();

    public function __construct($connection){
        $this->connection=$connection;
    }

    public function showAllCities(){ 
        $query = $this->connection->prepare("SELECT IdCity, CityName, CountryName 
                                             FROM City
                                             INNER JOIN Country ON City.IdCountry = Country.IdCountry
                                             WHERE CountryName <>'Desconocido'");
        $query->execute();

        $countryName = '';
        $html = ''; 

        while($row = $query->fetch(PDO::FETCH_ASSOC)){ // Mostrar todos las ciudades de cada país existente
            if($row["CountryName"] != $countryName){
                if($countryName != ''){ // Si no es la primera vez, cerramos el optgroup anterior
                    $html .= '</optgroup>';
                }
                $countryName = $row["CountryName"];
                $html .= '<optgroup label="'. $countryName .'">';  // Abrimos la etiqueta de cada país              
            }
            $html .= $this->getCityHtml($row["IdCity"], $row["CityName"]);
        }

        return $html . '</optgroup><option value="1">Otra</option>'; // Le agregamos la ciudad desconocida y terminamos
    }

    private function getCityHtml($IdCity, $cityName){ // Crear código HTML para una ciudad
        return '<option value="'. $IdCity .'">'. $cityName .'</option>';
    }

}

?>