<?php
include('db_config.php');  // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $section = $_POST['section'];

    $sql = "INSERT INTO students (firstname, middlename, lastname, age, address, course, section)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $firstname, $middlename, $lastname, $age, $address, $course, $section);

    if ($stmt->execute()) {
        echo "New student added successfully.";
        echo "<br><a href='students.php'>Go to Student List</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
