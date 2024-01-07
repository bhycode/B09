<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\model\entreprise\entrepriseDAO.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\entreprise\modelEntreprise.php';



class EntrepriseController {

    function getEntreprises() {
        $entrepriseDAO = new EntrepriseDAO();
        $entreprises = $entrepriseDAO->getEntreprises();
        include "C:\\xampp\\htdocs\\Brief9\\View\\FIlterTravels.php";
    }



}



?>