<?php
include 'db_connection.php';

$content = '
<h2>Pupils</h2>
<a href="add_pupil.php" class="btn btn-primary mb-3">Add New Pupil</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Pupil ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Class ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>';

$sql = "SELECT * FROM Pupils";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $content .= '
        <tr>
            <td>' . $row["Pupil_ID"] . '</td>
            <td>' . $row["First_Name"] . '</td>
            <td>' . $row["Last_Name"] . '</td>
            <td>' . $row["Date_of_Birth"] . '</td>
            <td>' . $row["Class_ID"] . '</td>
            <td>
                <a href="edit_pupil.php?id=' . $row["Pupil_ID"] . '" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_pupil.php?id=' . $row["Pupil_ID"] . '" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>';
    }
} else {
    $content .= '<tr><td colspan="6">No pupils found</td></tr>';
}

$content .= '
    </tbody>
</table>';

$conn->close();
include 'layout.php';
?>
