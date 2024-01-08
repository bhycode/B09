<?php

require_once "C:\\xampp\\htdocs\\Brief9\\model\\horaire\\HoraireDAO.php";
require_once "controller/HoraireController.php";

// Initialize HoraireController
$horaireController = new HoraireController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hr_dep'])) {

    // Assuming that the Horaire class is already included and instantiated before this point
    $hr_id = $_POST['hr_id'];
    $hr_dep = $_POST['hr_dep'];
    $hr_arv = $_POST['hr_arv'];
    $sieges_dispo = $_POST['sieges_dispo'];
    $prix = $_POST['prix'];
    $dt = $_POST['dt'];
    $routeID = $_POST['routeID'];
    $busID = $_POST['busID'];

    // Create a new Horaire object with the data
    $newHoraire = new Horaire($hr_id, $hr_dep, $hr_arv, $sieges_dispo, $prix, $dt, $routeID, $busID);

    // Call the addHoraire method
    $horaireController->addHoraire($newHoraire);

    // Redirect to some page after adding
    header("Location: adminstration.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Horaire</title>
</head>
<body>

<div class="container mt-5">
    <h2>Add Horaire</h2>
    <form action="addHoraire.php" method="post">
        <!-- Hr_id Input (if needed) -->
        <!-- <div class="form-group">
            <label for="hr_id">Hr_id:</label>
            <input type="text" class="form-control" id="hr_id" name="hr_id" required>
        </div> -->

        <!-- Hr_dep Input -->
        <div class="form-group">
            <label for="hr_dep">Hr_dep:</label>
            <input type="text" class="form-control" id="hr_dep" name="hr_dep" required>
        </div>

        <!-- Hr_arv Input -->
        <div class="form-group">
            <label for="hr_arv">Hr_arv:</label>
            <input type="text" class="form-control" id="hr_arv" name="hr_arv" required>
        </div>

        <!-- Sieges_dispo Input -->
        <div class="form-group">
            <label for="sieges_dispo">Sieges_dispo:</label>
            <input type="text" class="form-control" id="sieges_dispo" name="sieges_dispo" required>
        </div>

        <!-- Prix Input -->
        <div class="form-group">
            <label for="prix">Prix:</label>
            <input type="text" class="form-control" id="prix" name="prix" required>
        </div>

        <!-- Dt Input -->
        <div class="form-group">
            <label for="dt">Dt:</label>
            <input type="text" class="form-control" id="dt" name="dt" required>
        </div>

        <!-- RouteID Input -->
        <div class="form-group">
            <label for="routeID">RouteID:</label>
            <input type="text" class="form-control" id="routeID" name="routeID" required>
        </div>

        <!-- BusID Input -->
        <div class="form-group">
            <label for="busID">BusID:</label>
            <input type="text" class="form-control" id="busID" name="busID" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Horaire</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
