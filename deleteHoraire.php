<?php

include "controller\HoraireController.php";
$horaireController = new HoraireController();
$hr_id = $_POST['hr_id'];
$horaireController->deleteHoraire($hr_id);

header("Location: adminstration.php");
exit();


?>