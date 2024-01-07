<?php

include "controller\BusController.php";
$busController = new BusController();
$matricule = $_POST['matricule'];
$busController->deleteBus($matricule);

header("Location: adminstration.php");
exit();


?>