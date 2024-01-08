<?php
require_once "C:\\xampp\\htdocs\\Brief9\\model\\route\\RouteDAO.php";
require_once "controller/RouteController.php";

// Initialize RouteController
$routeController = new RouteController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    // Assuming that the Routee class is already included and instantiated before this point

    // Get the number of routes submitted
    $numRoutes = count($_POST['distance']);

    // Loop through each submitted route
    for ($i = 0; $i < $numRoutes; $i++) {
        $distance = $_POST['distance'][$i];
        $duree = $_POST['duree'][$i];
        $villeDep = $_POST['villeDep'][$i];
        $villeDes = $_POST['villeDes'][$i];

        // Create a new Routee object with the data
        $newRoute = new Routee(null, $distance, $duree, $villeDep, $villeDes);

        // Call the addRoute method
        $routeController->addRoute($newRoute);
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
    <title>Add Route</title>
</head>
<body>

<div class="container mt-5">
    <h2>Add Route</h2>
    <form action="addRoute.php" method="post" id="addRouteForm">
        <!-- Dynamic Route Inputs -->
        <div class="route-inputs">
            <div class="form-group">
                <label for="distance">Distance:</label>
                <input type="text" class="form-control" name="distance[]" required>
            </div>
            <div class="form-group">
                <label for="duree">Duree:</label>
                <input type="text" class="form-control" name="duree[]" required>
            </div>
            <div class="form-group">
                <label for="villeDep">VilleDep:</label>
                <input type="text" class="form-control" name="villeDep[]" required>
            </div>
            <div class="form-group">
                <label for="villeDes">VilleDes:</label>
                <input type="text" class="form-control" name="villeDes[]" required>
            </div>
        </div>

        <!-- Add Button -->
        <button type="button" class="btn btn-success" onclick="addRouteForm()">Add Route</button>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    function addRouteForm() {
        var clone = $(".route-inputs:first").clone();
        clone.find("input").val("");
        $("#addRouteForm").append(clone);
    }
</script>
</body>
</html>
