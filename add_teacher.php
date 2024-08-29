<?php
include 'db_connection.php';

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $annual_salary = $_POST['annual_salary'];
    $background_check = isset($_POST['background_check']) ? 1 : 0;
    $class_id = $_POST['class_id'];

    // Insert data into the Teachers table
    $sql = "INSERT INTO Teachers (First_Name, Last_Name, Address, Phone_Number, Annual_Salary, Background_Check, Class_ID) 
            VALUES ('$first_name', '$last_name', '$address', '$phone_number', '$annual_salary', '$background_check', '$class_id')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "New teacher added successfully";
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
    <title>Add New Teacher</title>
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
        <h2>Add New Teacher</h2>
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
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="annual_salary">Annual Salary</label>
                <input type="number" class="form-control" id="annual_salary" name="annual_salary" step="0.01" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="background_check" name="background_check">
                <label class="form-check-label" for="background_check">Background Check</label>
            </div>
            <div class="form-group">
                <label for="class_id">Class ID</label>
                <input type="number" class="form-control" id="class_id" name="class_id">
            </div>
            <button type="submit" class="btn btn-primary">Add Teacher</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
