<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online";

// Create a new database connection
$conn = new mysqli("localhost", "root" ,"", "online");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$id_number = $_POST['id_number'];
$location = $_POST['location'];
$country = $_POST['country'];
$phone_number = $_POST['phone_number'];
$course_applying = $_POST['course_applying'];

// Prepares and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO applications (first_name, last_name, id_number, location, country, phone_number, course_applying) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $first_name, $last_name, $id_number, $location, $country, $phone_number, $course_applying);

// Execute the statement
if ($stmt->execute()) {
    echo "Application submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>