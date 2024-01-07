<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>List of Buses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>List of Buses</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Matricule</th>
            <th>Bus Name</th>
            <th>Capacity</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($buses as $bus): ?>
            <tr>
                <td><?php echo $bus->getMatricule(); ?></td>
                <td><?php echo $bus->getBusNom(); ?></td>
                <td><?php echo $bus->getCapac(); ?></td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
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