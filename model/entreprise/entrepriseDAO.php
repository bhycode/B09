<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\entreprise\modelEntreprise.php';

class EntrepriseDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getEntreprises(){
        $query = "SELECT * FROM Entreprise;";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $entrepriseData = $stmt->fetchAll();
        $entrepriseList = array();
        foreach ($entrepriseData as $entreprise) {
            $entrepriseList[] = new Entreprise(
                $entreprise["idEn"],
                $entreprise["nomEn"],
                $entreprise["img"]
            );
        }
        return $entrepriseList;
    }



    

}





?>