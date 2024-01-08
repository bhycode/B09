<?php

require_once "C:\\xampp\\htdocs\\Brief9\\model\\bus\\BusDAO.php";
require_once "controller/BusController.php";

// Initialize BusController
$busController = new BusController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['busNom'])) {

    // Assuming that the Bus class is already included and instantiated before this point
    $matricule = $_POST['matricule'];
    $busNom = $_POST['busNom'];
    $capac = $_POST['capac'];
    $idEn = $_POST['idEn'];

    // Create a new Bus object with the data
    $newBus = new Bus($matricule, $busNom, $capac, $idEn);

    // Call the addBus method
    $busController->addBus($newBus);

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
    <title>Add Bus</title>
</head>
<body>

<div class="container mt-5">
    <h2>Add Bus</h2>
    <form action="addBus.php" method="post">
        <!-- Matricule Input -->
        <div class="form-group">
            <label for="matricule">Matricule:</label>
            <input type="text" class="form-control" id="matricule" name="matricule" required>
        </div>

        <!-- Bus Nom Input -->
        <div class="form-group">
            <label for="busNom">Bus Nom:</label>
            <input type="text" class="form-control" id="busNom" name="busNom" required>
        </div>

        <!-- Capac Input -->
        <div class="form-group">
            <label for="capac">Capac:</label>
            <input type="text" class="form-control" id="capac" name="capac" required>
        </div>

        <!-- IdEn Input -->
        <div class="form-group">
            <label for="idEn">IdEn:</label>
            <input type="text" class="form-control" id="idEn" name="idEn" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Bus</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
