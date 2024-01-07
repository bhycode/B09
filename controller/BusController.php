<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\model\bus\modelBus.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\bus\BusDAO.php';


class BusController {

    function getBuses() {
        $busDAO = new BusDAO();
        $buses = $busDAO->getBuses();
        include "View\Bus.php" ;
    }




}



?>