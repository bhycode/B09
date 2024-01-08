<?php

require_once "C:\\xampp\\htdocs\\Brief9\\model\\horaire\\modelHoraire.php";
require_once "controller/HoraireController.php";

// Initialize HoraireController
$horaireController = new HoraireController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['prix'])) {

    // Assuming that the Horaire class is already included and instantiated before this point
    $hr_id = $_POST['hrID'];
    $hr_dep = $_POST['hr_dep'];
    $hr_arv = $_POST['hr_arv'];
    $sieges_dispo = $_POST['sieges_dispo'];
    $prix = $_POST['prix'];
    $dt = $_POST['dt'];
    $routeID = $_POST['routeID'];
    $busID = $_POST['busID'];

    // Create a new Horaire object with the updated data
    $updatedHoraire = new Horaire($hr_id, $hr_dep, $hr_arv, $sieges_dispo, $prix, $dt, $routeID, $busID);

    // Call the updateHoraire method
    $horaireController->updateHoraire($updatedHoraire);

    // Redirect to some page after updating
    header("Location: adminstration.php");
    exit();
}

// Assume $horaire is an instance of the Horaire class
$horaire = new Horaire($_POST['hrID'], "", "", 0, 0, "", 0, 0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Horaire</title>
</head>
<body>

<div class="container mt-5">
    <h2>Update Horaire</h2>
    <form action="updateHoraire.php" method="post">
        <!-- hrID Input -->
        <div class="form-group">
            <label for="hr_id">Hr_id:</label>
            <input type="text" class="form-control" id="hrID" name="hrID" value="<?php echo $horaire->getHrId(); ?>" required readonly>
        </div>

        <!-- Hr_dep Input -->
        <div class="form-group">
            <label for="hr_dep">Hr_dep:</label>
            <input type="text" class="form-control" id="hr_dep" name="hr_dep" value="<?php echo $horaire->getHrDep(); ?>" required>
        </div>

        <!-- Hr_arv Input -->
        <div class="form-group">
            <label for="hr_arv">Hr_arv:</label>
            <input type="text" class="form-control" id="hr_arv" name="hr_arv" value="<?php echo $horaire->getHrArv(); ?>" required>
        </div>

        <!-- Sieges_dispo Input -->
        <div class="form-group">
            <label for="sieges_dispo">Sieges_dispo:</label>
            <input type="text" class="form-control" id="sieges_dispo" name="sieges_dispo" value="<?php echo $horaire->getSiegesDispo(); ?>" required>
        </div>

        <!-- Prix Input -->
        <div class="form-group">
            <label for="prix">Prix:</label>
            <input type="text" class="form-control" id="prix" name="prix" value="<?php echo $horaire->getPrix(); ?>" required>
        </div>

        <!-- Dt Input -->
        <div class="form-group">
            <label for="dt">Dt:</label>
            <input type="text" class="form-control" id="dt" name="dt" value="<?php echo $horaire->getDt(); ?>" required>
        </div>

        <!-- RouteID Input -->
        <div class="form-group">
            <label for="routeID">RouteID:</label>
            <input type="text" class="form-control" id="routeID" name="routeID" value="<?php echo $horaire->getRouteID(); ?>" required>
        </div>

        <!-- BusID Input -->
        <div class="form-group">
            <label for="busID">BusID:</label>
            <input type="text" class="form-control" id="busID" name="busID" value="<?php echo $horaire->getBusID(); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Horaire</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
