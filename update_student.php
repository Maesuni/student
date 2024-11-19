<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get the student details
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if ($student) {
        // Process form submission to update student
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $course = $_POST['course'];
            $section = $_POST['section'];

            // Update student details in the database
            $update_sql = "UPDATE students SET firstname = ?, middlename = ?, lastname = ?, age = ?, address = ?, course = ?, section = ? WHERE id = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("sssssssi", $firstname, $middlename, $lastname, $age, $address, $course, $section, $id);

            if ($stmt->execute()) {
                echo "Student updated successfully.";
                echo "<br><a href='students.php'>Back to Student List</a>";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
?>

<h2>Update Student</h2>
<form action="edit.php?id=<?php echo $id; ?>" method="POST">
    <label for="firstname">First Name:</label><br>
    <input type="text" id="firstname" name="firstname" value="<?php echo $student['firstname']; ?>" required><br><br>

    <label for="middlename">Middle Name:</label><br>
    <input type="text" id="middlename" name="middlename" value="<?php echo $student['middlename']; ?>" required><br><br>

    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="lastname" value="<?php echo $student['lastname']; ?>" required><br><br>

    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age" value="<?php echo $student['age']; ?>" required><br><br>

    <label for="address">Address:</label><br>
    <textarea id="address" name="address" required><?php echo $student['address']; ?></textarea><br><br>

    <label for="course">Course:</label><br>
    <input type="text" id="course" name="course"
