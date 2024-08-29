<?php
include 'db_connection.php';

$content = '
<h2>Parents</h2>
<a href="add_parent.php" class="btn btn-primary mb-3">Add New Parent</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Parent ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>';

$sql = "SELECT * FROM Parents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $content .= '
        <tr>
            <td>' . $row["Parent_ID"] . '</td>
            <td>' . $row["First_Name"] . '</td>
            <td>' . $row["Last_Name"] . '</td>
            <td>' . $row["Address"] . '</td>
            <td>' . $row["Email"] . '</td>
            <td>' . $row["Phone_Number"] . '</td>
            <td>
                <a href="edit_parent.php?id=' . $row["Parent_ID"] . '" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_parent.php?id=' . $row["Parent_ID"] . '" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>';
    }
} else {
    $content .= '<tr><td colspan="7">No parents found</td></tr>';
}

$content .= '
    </tbody>
</table>';

$conn->close();
include 'layout.php';
?>
