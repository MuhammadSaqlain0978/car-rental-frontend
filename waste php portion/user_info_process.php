<?php
// Assuming you have a database connection
include 'connection.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

 // Get car ID from the form
    $car_id = $_POST['car_id'];

    // Update the status to 'booked'
    $sql = "UPDATE cars SET status='Booked' WHERE car_id='$car_id'";

//    if ($con->query($sql) === TRUE) {
//        echo "Car booked successfully!";
//    } else {
//        echo "Error updating status: " . $con->error;
//    }

 if ($con->query($sql) === TRUE) {
     echo "";
      //echo "Location: user.php";
    } else {
       echo "Error updating status: " . $con->error;
   }


// Get form data
$firstName = $_POST['Fname'];
$lastName = $_POST['Lname'];
$number = $_POST['Numb'];
$email = $_POST['Email'];
$duration = $_POST['duration'];





$sql = "INSERT INTO users (FName, LName, number,  Email, Duration) VALUES ('$firstName', '$lastName','$number', '$email', '$duration')";

if ($con->query($sql) === TRUE) {
  
        header("Location: thankyou.php");
} else {
        echo "Error updating car status: " . $con->error;
    }
// $sql = " $sql = "UPDATE cars SET user_id='' WHERE car_id='$car_id'";
//WHERE car_id='$car_id'";
// $sql = "UPDATE cars SET status='Booked' WHERE car_id='$car_id'";
//
//
//if ($con->query($sql) === TRUE) {
//  
//        header("Location: thankyou.php");
//} else {
//        echo "Error updating car status: " . $con->error;
//    }


// Insert data into the 'users' table
//$sql = "INSERT INTO users (FName, LName, number,  Email, Duration) VALUES ('$firstName', '$lastName','$number', '$email', '$duration')";
//
//if ($con->query($sql) === TRUE) {
//    // Get the ID of the last inserted user
//    $lastUserId = $con->insert_id;
//
//    // Update the status of the booked car in the 'cars' table
//    $carIdToBook = $_POST['car_id']; // Assuming you have a hidden input field in your form with the car_id
//    $sqlUpdateCar = "UPDATE cars SET status = 'Booked', user_id = $lastUserId WHERE car_id = $carIdToBook";
//
//    if ($con->query($sqlUpdateCar) === TRUE) {
//        header("Location: book_car.php");
//    } else {
//        echo "Error updating car status: " . $con->error;
//    }
//} else {
//    echo "Error inserting user data: " . $con->error;
//}

$con->close();
?>







