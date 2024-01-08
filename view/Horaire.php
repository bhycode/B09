<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>List of Horaires</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>List of Horaires</h2>
    <a href="addHoraire.php" class="btn btn-primary mb-3">Add Horaire</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Available Seats</th>
            <th>Price</th>
            <th>Date</th>
            <th>Route ID</th>
            <th>Bus ID</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($horaires as $horaire): ?>
            <tr>
                <td><?php echo $horaire->getHrId(); ?></td>
                <td><?php echo $horaire->getHrDep(); ?></td>
                <td><?php echo $horaire->getHrArv(); ?></td>
                <td><?php echo $horaire->getSiegesDispo(); ?></td>
                <td><?php echo $horaire->getPrix(); ?></td>
                <td><?php echo $horaire->getDt(); ?></td>
                <td><?php echo $horaire->getRouteID(); ?></td>
                <td><?php echo $horaire->getBusID(); ?></td>
                <td>
                    <form action="updateHoraire.php" method="post" class="d-inline">
                        <input type="hidden" name="hrID" value="<?php echo $horaire->getHrId(); ?>">
                        <button type="submit" class="btn btn-primary btn-sm mr-2">Edit</button>
                    </form>
                    <form action="deleteHoraire.php" method="post" class="d-inline">
                        <input type="hidden" name="hr_id" value="<?php echo $horaire->getHrId(); ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>