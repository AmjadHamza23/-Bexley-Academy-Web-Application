<?php
include 'db_connection.php';

$content = '
<h2>Classes</h2>
<a href="add_class.php" class="btn btn-primary mb-3">Add New Class</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Class ID</th>
            <th>Class Name</th>
            <th>Year</th>
            <th>Capacity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>';

$sql = "SELECT * FROM Classes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $content .= '
        <tr>
            <td>' . $row["Class_ID"] . '</td>
            <td>' . $row["Class_Name"] . '</td>
            <td>' . $row["Year"] . '</td>
            <td>' . $row["Capacity"] . '</td>
            <td>
                <a href="edit_class.php?id=' . $row["Class_ID"] . '" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_class.php?id=' . $row["Class_ID"] . '" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>';
    }
} else {
    $content .= '<tr><td colspan="5">No classes found</td></tr>';
}

$content .= '
    </tbody>
</table>';

$conn->close();
include 'layout.php';
?>
