<?php
include 'db_connection.php';

$content = '
<h2>Teachers</h2>
<a href="add_teacher.php" class="btn btn-primary mb-3">Add New Teacher</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Teacher ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Annual Salary</th>
            <th>Background Check</th>
            <th>Class ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>';

$sql = "SELECT * FROM Teachers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $content .= '
        <tr>
            <td>' . $row["Teacher_ID"] . '</td>
            <td>' . $row["First_Name"] . '</td>
            <td>' . $row["Last_Name"] . '</td>
            <td>' . $row["Address"] . '</td>
            <td>' . $row["Phone_Number"] . '</td>
            <td>' . $row["Annual_Salary"] . '</td>
            <td>' . ($row["Background_Check"] ? "Yes" : "No") . '</td>
            <td>' . $row["Class_ID"] . '</td>
            <td>
                <a href="edit_teacher.php?id=' . $row["Teacher_ID"] . '" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_teacher.php?id=' . $row["Teacher_ID"] . '" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>';
    }
} else {
    $content .= '<tr><td colspan="9">No teachers found</td></tr>';
}

$content .= '
    </tbody>
</table>';

$conn->close();
include 'layout.php';
?>
