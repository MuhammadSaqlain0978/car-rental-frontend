<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Establish connection to MySQL database (replace with your database credentials)
    //$con = mysqli_connect('localhost', 'root', '', 'fin');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    // Insert data into the 'contacts' table (replace with your actual table name)
    $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($con, $sql)) {
        echo "Message sent successfully. We will get in touch with you soon!";
         echo '<a href="front.php">Go back to home page</a>';
        
            
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
