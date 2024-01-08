<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\model\horaire\modelHoraire.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\horaire\HoraireDAO.php';


class HoraireController {

    function getHoraires() {
        $horaireDAO = new HoraireDAO();
        $horaires = $horaireDAO->getHoraires();
        include "View\Horaire.php" ;
    }

    function deleteHoraire($hr_id) {
        $horaireDAO = new HoraireDAO();
        $delteResult = $horaireDAO->deleteHoraire($hr_id);
    }

    function updateHoraire($horaire) {
        $horaireDAO = new HoraireDAO();
        $horaireDAO->updateHoraire($horaire);
    }

    function addHoraire($horaire) {
        $horaireDAO = new HoraireDAO();
        $horaireDAO->addHoraire($horaire);
    }




}



?>