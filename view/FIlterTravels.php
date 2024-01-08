<?php

// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["companyFilter"])) {
//     require_once "C:\\xampp\\htdocs\\Brief9\\controller\\HoraireController.php";
//     $horaireController = new HoraireController();

//     $idEn = $_GET["companyFilter"];
//     $prix = $_GET["priceFilter"];
//     $hr_dep = $_GET["timeOfDayFilter"];
//     $result = $horaireController->getHorairesByParameters($idEn, $prix, $hr_dep);
//     print_r($result);
// }


?>



<div class="container mt-5">
    <h2>Filter Search</h2>

    <form action="travels.php" method="GET">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="companyFilter" class="form-label">Company</label>
                <select class="form-select" id="companyFilter" name="companyFilter">
                    <?php foreach ($entreprises as $entreprise) : ?>
                        <option value="<?= $entreprise->getIdEn(); ?>"><?= $entreprise->getNomEn(); ?></option>
                    <?php endforeach; ?>
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