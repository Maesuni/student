<?php
include('db_config.php');

// Query to fetch all students
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

echo "<h2>Student List</h2>";

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Course</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['firstname'] . "</td>
                <td>" . $row['middlename'] . "</td>
                <td>" . $row['lastname'] . "</td>
                <td>" . $row['age'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['course'] . "</td>
                <td>" . $row['section'] . "</td>
                <td>
                    <a href='edit.php?id=" . $row['id'] . "'>Update</a> | 
                    <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No students found.";
}

$conn->close();
?>

<br>
<a href="index.php">Add New Student</a> <!-- Link to Add new student -->
