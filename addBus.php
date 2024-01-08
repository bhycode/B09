<?php
require_once "C:\\xampp\\htdocs\\Brief9\\model\\bus\\BusDAO.php";
require_once "controller/BusController.php";

// Initialize BusController
$busController = new BusController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    // Assuming that the Bus class is already included and instantiated before this point

    // Get the number of buses submitted
    $numBuses = count($_POST['matricule']);

    // Loop through each submitted bus
    for ($i = 0; $i < $numBuses; $i++) {
        $matricule = $_POST['matricule'][$i];
        $busNom = $_POST['busNom'][$i];
        $capac = $_POST['capac'][$i];
        $idEn = $_POST['idEn'][$i];

        // Create a new Bus object with the data
        $newBus = new Bus($matricule, $busNom, $capac, $idEn);

        // Call the addBus method
        $busController->addBus($newBus);
    }

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
    <form action="addBus.php" method="post" id="addBusForm">
        <!-- Dynamic Bus Inputs -->
        <div class="bus-inputs">
            <div class="form-group">
                <label for="matricule">Matricule:</label>
                <input type="text" class="form-control" name="matricule[]" required>
            </div>
            <div class="form-group">
                <label for="busNom">Bus Nom:</label>
                <input type="text" class="form-control" name="busNom[]" required>
            </div>
            <div class="form-group">
                <label for="capac">Capac:</label>
                <input type="text" class="form-control" name="capac[]" required>
            </div>
            <div class="form-group">
                <label for="idEn">IdEn:</label>
                <input type="text" class="form-control" name="idEn[]" required>
            </div>
        </div>

        <!-- Add Button -->
        <button type="button" class="btn btn-success" onclick="addBusForm()">Add Bus</button>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    function addBusForm() {
        var clone = $(".bus-inputs:first").clone();
        clone.find("input").val("");
        $("#addBusForm").append(clone);
    }
</script>
</body>
</html>
