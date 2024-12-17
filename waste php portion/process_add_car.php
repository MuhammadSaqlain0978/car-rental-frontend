<?php
// Database connection parameters
include 'connection.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
}

$email = $_SESSION['username'];

// Retrieve form data
$car_plate = $_POST['car_plate'];
$car_model = $_POST['model'];

$car_body = $_POST['body_type'];
$car_make = $_POST['make'];
$capacity = $_POST['seating_capacity'];
$car_color = $_POST['color'];
$car_status = $_POST['status'];

// Prepare and execute SQL query to insert data into the 'cars' table (assuming the table name is 'cars')
$sqql = "INSERT INTO cars (car_plate,make, model, body_type, color,seating_capacity,status) VALUES ('$car_plate', '$car_make',$car_model', '$car_body', '$car_color','$capacity','$car_status')";

if ($con->query($sqql) === TRUE) {
    echo "Car details added successfully";
} else {
    echo "Error: " . $sqql . "<br>" . $con->error;
}

// Close the database connection
$con->close();
?>
