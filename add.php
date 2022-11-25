<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Page</title>
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

            <h3 class="mb-3">Add New Mahasiswa</h3>
            <form action="add.php" method="post" name="form1">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="religion" class="form-label">Religion</label>
                    <select class="form-select" name="religion" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Male" name="gender" checked>
                        <label class="form-check-label">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Female" name="gender">
                        <label class="form-check-label">
                            Female
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Study Program</label>
                    <input type="text" class="form-control" name="study_program" placeholder="Enter your study program">
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                <a href="index.php" class="btn btn-outline-primary">Back to Home</a>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php
    $post = $_POST;
    if (isset($post['submit'])) {
        $name = $post['name'];
        $email = $post['email'];
        $religion = $post['religion'];
        $gender = $post['gender'];
        $study_program = $post['study_program'];

        include_once("config.php");

        $error = false;
        if (empty($email)) {
            $error = true;
            echo '<script>alert("Email is required")</script>';
        }

        $checkEmail = mysqli_query($mysqli, "SELECT * FROM mahasiswa_main WHERE email_address='$email'");
        if (mysqli_num_rows($checkEmail) > 0) {
            $error = true;
            echo '<script>alert("Email already exists")</script>';
        }

        if (!$error) {
            $result = mysqli_query($mysqli, "INSERT INTO mahasiswa_main(name, religion, gender, email_address, study_program) VALUES('$name', '$religion', '$gender', '$email', '$study_program')");
            echo '<script>alert("Data added successfully")</script>';
            echo '<script>window.location.href = "index.php"</script>';
        }
    }
    ?>

</body>

</html>