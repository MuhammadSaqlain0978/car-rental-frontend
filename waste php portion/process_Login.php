<?php
session_start();
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Admin WHERE username='$email' AND password='$password'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $email;
        header("Location: admin_panel.php");
    } else {
        echo "Invalid email or password. Please try again.";
    }
}

$con->close();
?>
