<?php
$servername = "localhost";
$username = "root"; // default username for XAMPP/WAMP
$password = ""; // default password for XAMPP/WAMP
$dbname = "bexley_academy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
