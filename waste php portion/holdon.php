
<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
}

               
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $car_plate = $_POST['car_plate'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $seating_capacity = $_POST['seating_capacity'];
    $color = $_POST['color'];
    $body_type = $_POST['body_type'];
    $status = $_POST['status'];
//
//    // Upload picture
    $targetDir = "car_images2/";
    $filename = basename($_FILES["picture"]["name"]);
    $targetFilePath = $targetDir . $filename;
    move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath);

    // Insert data into database
    $sql = "INSERT INTO cars (car_plate, make, model, seating_capacity, color, body_type, status, filenames)
            VALUES ('$car_plate', '$make', '$model', '$seating_capacity', '$color', '$body_type', '$status','$filename')";

    if ($con->query($sql) === TRUE) {
        //echo "Car added successfully!";
        echo "Location: hold_car.php";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
$con->close();
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Add Car</h2>
        
        <form action="#" method="post" >
<!--        <form action="hold_car.php" method="post" enctype="multipart/form-data">-->
            <label for="car_plate">Car Plate:</label>
            <input type="text" name="car_plate" required>

            <label for="make">Make:</label>
            <input type="text" name="make" required>

            <label for="model">Model:</label>
            <input type="text" name="model" required>

            <label for="seating_capacity">Seating Capacity:</label>
            <input type="number" name="seating_capacity" required>

            <label for="color">Color:</label>
            <input type="text" name="color" required>

            <label for="body_type">Body Type:</label>
            <input type="text" name="body_type" required>

            <label for="status">Status:</label>
            <select name="status" required>
                <option value="UnBooked">UnBooked</option>
            
            </select>

            <label for="picture">Upload Picture:</label>
            <input type="file" name="picture" accept="image/*" required>

            <input type="submit" value="Add Car">
                
        </form>
    </div>
                
 
</body>
</html>

----------------------------------------------------------------
