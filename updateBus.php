<?php

// Include the Bus class and BusController
include "C:\\xampp\\htdocs\\Brief9\\model\\bus\\modelBus.php";
include "controller/BusController.php";

// Initialize BusController
$busController = new BusController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['busNom'])) {

    // Assuming that the Bus class is already included and instantiated before this point
    $matricule = $_POST['matricule'];
    $busNom = $_POST['busNom'];
    $capac = $_POST['capac'];
    $idEn = $_POST['idEn'];

    // Create a new Bus object with the updated data
    $updatedBus = new Bus($matricule, $busNom, $capac, $idEn);

    // Call the updateBus method
    $busController->updateBus($updatedBus);

    // Redirect to adminstration.php after updating
    header("Location: adminstration.php");
    exit();
}



?>



<?php
// Assume $bus is an instance of the Bus class
$bus = new Bus($_POST['matricule'], "", 0, "");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Bus</title>
</head>
<body>

<div class="container mt-5">
    <h2>Update Bus</h2>
    <form action="updateBus.php" method="post">
        <!-- Matricule Input -->
        <div class="form-group">
            <label for="matricule">Matricule:</label>
            <input type="text" class="form-control" id="matricule" name="matricule" value="<?php echo $bus->getMatricule(); ?>" required readonly>
        </div>

        <!-- Bus Nom Input -->
        <div class="form-group">
            <label for="busNom">Bus Nom:</label>
            <input type="text" class="form-control" id="busNom" name="busNom" value="<?php echo $bus->getBusNom(); ?>" required>
        </div>

        <!-- Capac Input -->
        <div class="form-group">
            <label for="capac">Capac:</label>
            <input type="text" class="form-control" id="capac" name="capac" value="<?php echo $bus->getCapac(); ?>" required>
        </div>

        <!-- IdEn Input -->
        <div class="form-group">
            <label for="idEn">IdEn:</label>
            <input type="text" class="form-control" id="idEn" name="idEn" value="<?php echo $bus->getIdEn(); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Bus</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
