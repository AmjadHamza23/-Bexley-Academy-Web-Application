<?php
include 'db_connection.php';

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $class_name = $_POST['class_name'];
    $year = $_POST['year'];
    $capacity = $_POST['capacity'];

    // Insert data into the Classes table
    $sql = "INSERT INTO Classes (Class_Name, Year, Capacity) VALUES ('$class_name', '$year', '$capacity')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "New class added successfully";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Class</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Bexley Academy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="classes.php">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teachers.php">Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pupils.php">Pupils</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="parents.php">Parents</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
    <div class="container mt-5">
        <h2>Add New Class</h2>
        <?php
        if ($success_message) {
            echo '<div class="alert alert-success">' . $success_message . '</div>';
        }
        if ($error_message) {
            echo '<div class="alert alert-danger">' . $error_message . '</div>';
        }
        ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="class_name">Class Name</label>
                <input type="text" class="form-control" id="class_name" name="class_name" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <select class="form-control" id="year" name="year" required>
                    <option value="">Select Year</option>
                    <option value="Reception">Reception</option>
                    <option value="Year One">Year One</option>
                    <option value="Year Two">Year Two</option>
                    <option value="Year Three">Year Three</option>
                    <option value="Year Four">Year Four</option>
                    <option value="Year Five">Year Five</option>
                    <option value="Year Six">Year Six</option>
                </select>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Class</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
