<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
}

// Check if the form is submitted for car removal
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['car_id'])) {
        $car_id_to_remove = $_POST['car_id'];

        // Perform the deletion
        $delete_sql = "DELETE FROM cars WHERE car_id = '$car_id_to_remove'";
        if ($con->query($delete_sql) === TRUE) {
            echo '<script>alert("Car removed successfully.");</script>';
        } else {
            echo '<script>alert("Error removing car: ' . $con->error . '");</script>';
        }
    }
}

// Retrieve all cars from the database
$sql = "SELECT * FROM cars";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Cars</title>
    <link rel="stylesheet" href="car_remove.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="admin_panel.php">Go Back</a></li>
            <li><a href="front.php">View Cars</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            
        </ul>
    </nav>

    <div class="card-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<img src="car_images2/' . $row['filenames'] . '" alt="' . $row['make'] . ' ' . $row['model'] . '">';
                echo '<div class="card-content">';
                echo '<h3>' . $row['make'] . ' ' . $row['model'] . '</h3>';
                echo '<p><strong>Color:</strong> ' . $row['color'] . '</p>';
                echo '<p><strong>Seating Capacity:</strong> ' . $row['seating_capacity'] . '</p>';
                echo '<p><strong>Plate Number:</strong> ' . $row['car_plate'] . '</p>';
                echo '<p><strong>Body Type:</strong> ' . $row['body_type'] . '</p>';
                echo '<p><strong>Status:</strong> ' . $row['status'] . '</p>';
                
                echo '<form action="#" method="post">';
                echo '<input type="hidden" name="car_id" value="' . $row['car_id'] . '">';
                echo '<input type="submit" class="remove-car-btn" value="Remove Car">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No cars found in the database.</p>';
        }
        ?>
    </div>
</body>
</html>