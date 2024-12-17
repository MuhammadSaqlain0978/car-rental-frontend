
                <?php
include 'connection.php';

    // Check connection
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


    $con->close();

?>