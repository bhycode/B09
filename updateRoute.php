<?php

require_once "C:\\xampp\\htdocs\\Brief9\\model\\route\\RouteDAO.php";
require_once "controller/RouteController.php";

// Initialize RouteController
$routeController = new RouteController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['distance'])) {

    // Assuming that the Routee class is already included and instantiated before this point
    $routeID = $_POST['routeID'];
    $distance = $_POST['distance'];
    $duree = $_POST['duree'];
    $villeDep = $_POST['villeDep'];
    $villeDes = $_POST['villeDes'];

    // Create a new Routee object with the updated data
    $updatedRoute = new Routee($routeID, $distance, $duree, $villeDep, $villeDes);

    // Call the updateRoute method
    $routeController->updateRoute($updatedRoute);

    // Redirect to some page after updating
    header("Location: adminstration.php");
    exit();
}

// Assume $route is an instance of the Routee class
$route = new Routee($_POST['routeID'], 0, 0, "", "");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Route</title>
</head>
<body>

<div class="container mt-5">
    <h2>Update Route</h2>
    <form action="updateRoute.php" method="post">
        <!-- RouteID Input -->
        <div class="form-group">
            <label for="routeID">RouteID:</label>
            <input type="text" class="form-control" id="routeID" name="routeID" value="<?php echo $route->getRouteID(); ?>" required readonly>
        </div>

        <!-- Distance Input -->
        <div class="form-group">
            <label for="distance">Distance:</label>
            <input type="text" class="form-control" id="distance" name="distance" value="<?php echo $route->getDistance(); ?>" required>
        </div>

        <!-- Duree Input -->
        <div class="form-group">
            <label for="duree">Duree:</label>
            <input type="text" class="form-control" id="duree" name="duree" value="<?php echo $route->getDuree(); ?>" required>
        </div>

        <!-- VilleDep Input -->
        <div class="form-group">
            <label for="villeDep">VilleDep:</label>
            <input type="text" class="form-control" id="villeDep" name="villeDep" value="<?php echo $route->getVilleDep(); ?>" required>
        </div>

        <!-- VilleDes Input -->
        <div class="form-group">
            <label for="villeDes">VilleDes:</label>
            <input type="text" class="form-control" id="villeDes" name="villeDes" value="<?php echo $route->getVilleDes(); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Route</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
