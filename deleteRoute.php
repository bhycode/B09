<?php

include "controller\RouteController.php";
$routeController = new RouteController();
$routeID = $_POST['routeID'];
$routeController->deleteRoute($routeID);

header("Location: adminstration.php");
exit();


?>