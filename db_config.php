<?php
$servername = "localhost";
$username = "mae";   // your database username
$password = "12345678";       // your database password
$dbname = "db_config"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
