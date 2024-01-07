
<?php

include "nav-bar.php";


include "controller\BusController.php";
$busController = new BusController();
$busController->getBuses();


include "controller\HoraireController.php";
$horaireController = new HoraireController();
$horaireController->getHoraires();

include "controller\RouteController.php";
$routeController = new RouteController();
$routeController->getRoutes();

?>
