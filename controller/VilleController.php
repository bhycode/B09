<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\model\ville\modelVille.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\ville\villeDAO.php';


class VilleController {

    function getCities() {
        $villeDAO = new VilleDAO();
        $cities = $villeDAO->getCities();
        include "View\TravelSearchForm.php" ;
    }




}



?>