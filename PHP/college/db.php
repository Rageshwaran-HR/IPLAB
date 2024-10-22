<?php
$servername = "localhost"; // Change if necessary
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "college_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

