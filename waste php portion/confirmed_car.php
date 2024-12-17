<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_plate = $_POST["car_plate"];

    // Retrieve the car added by the logged-in admin
    $sql = "SELECT * FROM cars WHERE car_plate = '$car_plate'";
    $result = $con->query($sql);

    // If a car is found, fetch the data
    if ($result->num_rows > 0) {
        $carData = $result->fetch_assoc();
    } else {
        // Redirect or show a message if no cars are found
        header("Location: no_cars_found.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Same as before -->
</head>
<body>
    <nav>
        <!-- Same as before -->
    </nav>

    <div class="car-details-container">
        <h2>Your Added Car</h2>

        <?php if (!empty($carData)) : ?>
            <div class="car-item">
                <p><strong>Car Plate:</strong> <?php echo $carData['car_plate']; ?></p>
                <p><strong>Make:</strong> <?php echo $carData['make']; ?></p>
                <p><strong>Model:</strong> <?php echo $carData['model']; ?></p>
                <p><strong>Seating Capacity:</strong> <?php echo $carData['seating_capacity']; ?></p>
                <p><strong>Color:</strong> <?php echo $carData['color']; ?></p>
                <p><strong>Body Type:</strong> <?php echo $carData['body_type']; ?></p>
                <p><strong>Status:</strong> <?php echo $carData['status']; ?></p>

                <?php if (!empty($carData['filename'])) : ?>
                    <img src="uploads/<?php echo $carData['filename']; ?>" alt="Car Picture">
                <?php else : ?>
                    <p>No picture available</p>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <p>No cars found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
