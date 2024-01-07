<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Horaires List</title>
</head>
<body>



<div class="container mt-5">
    <h2>Filter Search</h2>

    <form action="your_action_page.php" method="GET">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="companyFilter" class="form-label">Company</label>
                <select class="form-select" id="companyFilter" name="companyFilter">
                    <!-- Add options for companies -->
                    <option value="company1">Company 1</option>
                    <option value="company2">Company 2</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div class="col-md-4">
                <label for="priceFilter" class="form-label" >Price</label>
                <input type="number" class="form-control" id="priceFilter" name="priceFilter" value="40" min="40" max="200" placeholder="Enter price">
            </div>

            <div class="col-md-4">
                <label for="timeOfDayFilter" class="form-label">Time of Day</label>
                <select class="form-select" id="timeOfDayFilter" name="timeOfDayFilter">
                    <option value="anyTime">Any Time</option>
                    <option value="morning">Morning</option>
                    <option value="evening">Evening</option>
                    <option value="night">Night</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Apply Filters</button>
    </form>
</div>



<div class="container mt-5">
    <h2>List of available travels</h2>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        
        //TEST SEARCH
        // $departureCity = 404;
        // $destinationCity = 438;
        // $departureDate = "2024-1-1";
        // $numberOfTravelers = 10;
        $departureCity = $_GET['departureCity'];
        $destinationCity = $_GET['destinationCity'];
        $departureDate = $_GET['departureDate'];
        $numberOfTravelers = $_GET['numberOfTravelers'];

        // echo "<p>Departure City: " . $departureCity . "</p>";
        // echo "<p>Destination City: " . $destinationCity . "</p>";
        // echo "<p>Departure Date: " . $departureDate . "</p>";
        // echo "<p>Number of Travelers: " . $numberOfTravelers . "</p>";

        require_once 'C:\\xampp\\htdocs\\Brief9\\model\\horaire\\HoraireDAO.php';

        $horaireDAO = new HoraireDAO();
        $horaires = $horaireDAO->getFilteredHoraire($departureCity, $destinationCity, $departureDate, $numberOfTravelers);

        if (!empty($horaires)) {
            ?>
            <table class="table table-bordered mt-3">
                <thead>
                <tr>
                    <th>HR ID</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Available Seats</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Route ID</th>
                    <th>Bus ID</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($horaires as $horaire) {
                    ?>
                    <tr>
                        <td><?php echo $horaire->getHrId(); ?></td>
                        <td><?php echo $horaire->getHrDep(); ?></td>
                        <td><?php echo $horaire->getHrArv(); ?></td>
                        <td><?php echo $horaire->getSiegesDispo(); ?></td>
                        <td><?php echo $horaire->getPrix(); ?></td>
                        <td><?php echo $horaire->getDt(); ?></td>
                        <td><?php echo $horaire->getRouteID(); ?></td>
                        <td><?php echo $horaire->getBusID(); ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<p>No Horaires found for the given criteria.</p>";
        }
    }

    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
