<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>List of Routes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>List of Routes</h2>
    <a href="addRoute.php" class="btn btn-primary mb-3">Add Route</a>
    <table class="table">
        <thead>
        <tr>
            <th>Route ID</th>
            <th>Distance</th>
            <th>Duration</th>
            <th>Departure City</th>
            <th>Destination City</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($routes as $route): ?>
            <tr>
                <td><?php echo $route->getRouteID(); ?></td>
                <td><?php echo $route->getDistance(); ?></td>
                <td><?php echo $route->getDuree(); ?></td>
                <td><?php echo $route->getVilleDep(); ?></td>
                <td><?php echo $route->getVilleDes(); ?></td>
                <td>
                    <form action="updateRoute.php" method="post" class="d-inline">
                        <input type="hidden" name="routeID" value="<?php echo $route->getRouteID(); ?>">
                        <button type="submit" class="btn btn-primary btn-sm mr-2">Edit</button>
                    </form>
                    <form action="deleteRoute.php" method="post" class="d-inline">
                        <input type="hidden" name="routeID" value="<?php echo $route->getRouteID(); ?>">
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