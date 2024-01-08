<?php
require_once "C:\\xampp\\htdocs\\Brief9\\model\\horaire\\HoraireDAO.php";
require_once "controller/HoraireController.php";

// Initialize HoraireController
$horaireController = new HoraireController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    // Assuming that the Horaire class is already included and instantiated before this point

    // Get the number of schedules submitted
    $numSchedules = count($_POST['hr_dep']);

    // Loop through each submitted schedule
    for ($i = 0; $i < $numSchedules; $i++) {
        $hr_dep = $_POST['hr_dep'][$i];
        $hr_arv = $_POST['hr_arv'][$i];
        $sieges_dispo = $_POST['sieges_dispo'][$i];
        $prix = $_POST['prix'][$i];
        $dt = $_POST['dt'][$i];
        $routeID = $_POST['routeID'][$i];
        $busID = $_POST['busID'][$i];

        // Create a new Horaire object with the data
        $newHoraire = new Horaire(null, $hr_dep, $hr_arv, $sieges_dispo, $prix, $dt, $routeID, $busID);

        // Call the addHoraire method
        $horaireController->addHoraire($newHoraire);
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
    <title>Add Horaire</title>
</head>
<body>

<div class="container mt-5">
    <h2>Add Horaire</h2>
    <form action="addHoraire.php" method="post" id="addHoraireForm">
        <!-- Dynamic Schedule Inputs -->
        <div class="schedule-inputs">
            <div class="form-group">
                <label for="hr_dep">Hr_dep:</label>
                <input type="text" class="form-control" name="hr_dep[]" required>
            </div>
            <div class="form-group">
                <label for="hr_arv">Hr_arv:</label>
                <input type="text" class="form-control" name="hr_arv[]" required>
            </div>
            <div class="form-group">
                <label for="sieges_dispo">Sieges_dispo:</label>
                <input type="text" class="form-control" name="sieges_dispo[]" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="text" class="form-control" name="prix[]" required>
            </div>
            <div class="form-group">
                <label for="dt">Dt:</label>
                <input type="text" class="form-control" name="dt[]" required>
            </div>
            <div class="form-group">
                <label for="routeID">RouteID:</label>
                <input type="text" class="form-control" name="routeID[]" required>
            </div>
            <div class="form-group">
                <label for="busID">BusID:</label>
                <input type="text" class="form-control" name="busID[]" required>
            </div>
        </div>

        <!-- Add Button -->
        <button type="button" class="btn btn-success" onclick="addHoraireForm()">Add Horaire</button>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    function addHoraireForm() {
        var clone = $(".schedule-inputs:first").clone();
        clone.find("input").val("");
        $("#addHoraireForm").append(clone);
    }
</script>
</body>
</html>
