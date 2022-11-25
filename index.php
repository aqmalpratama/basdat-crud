<?php

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa_main ORDER BY id desc");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>HomePage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">My App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="mt-4">
            <a href="add.php" class="btn btn-primary">Add New Mahasiswa</a><br /><br />
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Religion</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Study Program</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 0;
                while ($data_mhs = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $data_mhs['name']; ?></td>
                        <td><?= $data_mhs['email_address']; ?></td>
                        <td><?= $data_mhs['religion']; ?></td>
                        <td><?= $data_mhs['gender']; ?></td>
                        <td><?= $data_mhs['study_program']; ?></td>
                        <td>
                            <a href="delete.php?id=<?= $data_mhs['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php $i++;
                endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>