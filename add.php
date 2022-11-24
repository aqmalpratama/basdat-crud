<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="mt-4">
            <a href="index.php" class="btn btn-primary">Back to Home</a><br /><br />
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
            </form>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
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
        }
    }
    ?>

</body>

</html>