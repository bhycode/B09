<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\model\horaire\modelHoraire.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\horaire\HoraireDAO.php';


class HoraireController {

    function getHoraires() {
        $horaireDAO = new HoraireDAO();
        $horaires = $horaireDAO->getHoraires();
        include "View\Horaire.php" ;
    }




}



?>