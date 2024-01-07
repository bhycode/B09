<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\ville\modelVille.php';

class VilleDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getCities(){
        $query = "SELECT * FROM Ville;";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $citiesData = $stmt->fetchAll();
        $citiesList = array();
        foreach ($citiesData as $city) {
            $citiesList[] = new Ville(
                $city["villeID"],
                $city["villeNom"]
            );
        }
        return $citiesList;
    }



    

}





?>